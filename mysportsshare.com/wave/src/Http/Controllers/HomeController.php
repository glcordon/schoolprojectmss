<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Course;
use Illuminate\Support\Facades\Session;

class HomeController extends \App\Http\Controllers\Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('tenant'))
        {
            return redirect('http://mysportsshare.com');
        }
        
        if(Session::get('tenant') == 'home')
        {
            $sites = Site::get();
        }else{
            $sites = Site::find(Session::get('tenant')->id)->with('courses');
        }
        
        // dd(Session::get('tenant'));
        
    	if(setting('auth.dashboard_redirect', true) != "null"){
    		if(!\Auth::guest()){
    			return redirect('dashboard');
    		}
    	}

        $seo = [

            'title'         => setting('site.title', 'Laravel Wave'),
            'description'   => setting('site.description', 'Software as a Service Starter Kit'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'

        ];

        return view('theme::home', compact('seo', 'sites'));
    }
}
