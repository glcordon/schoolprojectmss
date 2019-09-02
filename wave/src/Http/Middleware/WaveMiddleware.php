<?php

namespace Wave\Http\Middleware;

use Closure;
use Wave\User;
use TCG\Voyager\Models\Role;

class WaveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(config('wave.billing') == 'stripe'){
            $this->setStripeKey();
        }

        if(!$this->updateRole()){
            if( $request->route()->getName() != 'wave.cancelled' ){
                return redirect()->route('wave.cancelled');
            }
        }
        return $next($request);
    }

    private function setStripeKey(){
        // Verify Billing
        if(env('STRIPE_MODE', 'test') == 'live'){
            User::setStripeKey( env('STRIPE_LIVE_SECRET') );
        } else {
            User::setStripeKey( env('STRIPE_TEST_SECRET') );
        }
    }

    private function updateRole()
    {

        if(!auth()->guest() && !auth()->user()->subscribed('main') && !auth()->user()->onTrial() && auth()->user()->role->name != 'admin' && (auth()->user()->subscribed('main') && !auth()->user()->subscription('main')->onGracePeriod()) && auth()->user()->role->name != 'cancelled' ){
            $inactive_user_role = Role::where('name', '=', 'cancelled')->first();
            auth()->user()->role_id = $inactive_user_role->id;
            auth()->user()->save();
            return false;
        }

        if(!auth()->guest() && !auth()->user()->subscribed('main') && auth()->user()->role->name != 'admin' && !auth()->user()->onTrial() && auth()->user()->role->name != 'cancelled'){
            $inactive_user_role = Role::where('name', '=', 'cancelled')->first();
            auth()->user()->role_id = $inactive_user_role->id;
            auth()->user()->save();
            return false;
        }

        return true;

    }
}
