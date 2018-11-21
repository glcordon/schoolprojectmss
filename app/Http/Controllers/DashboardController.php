<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where([
            ['is_private', 0],
            ['end_date', '<=', today(),]
        ])->get();
        $categories = Category::get();
        return view('dashboard', compact('events', 'categories'));
    }
}
