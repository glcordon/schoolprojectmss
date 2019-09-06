<?php
namespace App\Http\Middleware;
use Closure;
use App\Site as Tenant;
class CheckTenant
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
        // Extract the subdomain from URL.
        list($subdomain) = explode('.', $request->getHost(), 2);
        // Retrieve requested tenant's info from database. If not found, abort the request.
        $tenant = Tenant::where('site_slug', $subdomain)->first();
        
        // Store the tenant info into session.
        if($tenant)
        {
         $request->session()->put('tenant', $tenant);   
        }else{
            $request->session()->put('tenant', null);
        }
        
        return $next($request);
    }
}