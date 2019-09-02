<?php

namespace Wave\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Wave\Plan;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{

    /**
     * Subscribe user to a plan
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {

        if(config('wave.billing') == 'stripe'){
            $token = $request->stripeToken;
        } else {
            $token = $request->payment_method_nonce;
        }

        try{
            try {

                $plan = Plan::where('name', '=', $request->plan)->first();

                if(!isset($plan->id)){
                    return back()->withInput($request->all())->with(['note' => 'Invalid Plan Selected', 'note_type' => 'error']);;
                }

                $userSubscription = auth()->user()->newSubscription('main', $request->plan)->create($token, ['email' => auth()->user()->email]);

            } catch(\Stripe\Error\Card $e) {
                $error_message = 'Something went wrong with your card. Please make sure you are entering it correctly';
                if(isset($e->getJsonBody()['error']['message'])){
                   $error_message = 'Sorry, there was an error with your card: ' . $error_body['error']['message'];
                }
                return back()->with(array('note' => $error_message, 'note_type' => 'error'));
            }
        } catch(\Exception $e){
            return back()->with(array('message' => $e->getMessage(), 'message_type' => 'danger'));
        }

        auth()->user()->role_id = $plan->role_id;
        auth()->user()->trial_ends_at = NULL;
        auth()->user()->save();

        return back()->with(['message' => 'Successfully upgraded your account. Thanks for becoming a subscriber!', 'message_type' => 'success']);

    }

    public function update_plans(Request $request){

        $plan = Plan::where('name', '=', $request->plan)->first();

        if(!isset($plan->id)){
            return back()->withInput($request->all())->with(['note' => 'Invalid Plan Selected', 'note_type' => 'error']);;
        }

        auth()->user()->subscription('main')->swap($plan->plan_id);
        auth()->user()->role_id = $plan->role_id;
        auth()->user()->save();

        return back()->with(['message' => 'Successfully Switched Subscription Plan.', 'message_type' => 'success']);

    }

    public function update_credit_card(Request $request)
    {

        if(config('wave.billing') == 'stripe'){
            $token = $request->stripeToken;
        } else {
            $token = $request->payment_method_nonce;
        }

        try {

            auth()->user()->updateCard($token);

            return back()->with(array('message' => 'Your card has been successfully updated. Thanks.', 'message_type' => 'success'));

        } catch (Exception $e) {
            return back()->with(array('message' => 'Sorry, there was an error with your card: ' . $e->getMessage(), 'message_type' => 'error'));
        }
    }

    public function cancel(Request $request){

        auth()->user()->subscription('main')->cancel();
        return back()->with(array('message' => 'Your subscription has been cancelled.', 'message_type' => 'info'));

    }

    public function reactivate(Request $request){

        auth()->user()->subscription('main')->resume();
        return back()->with(array('message' => 'You have successfully reactivated your account.', 'message_type' => 'success'));

    }

}
