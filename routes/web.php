<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Event;

Route::get('/', function () {
    $events = Event::where([
        ['is_private', 0],
        ['end_date', '>=', today(),]
    ])->limit(6)->get();
    $categories = \App\Category::get();
    return view('welcome', compact('events', 'categories'));
});

Auth::routes();

Route::get('/home', function () {
    return redirect('dashboard');
});


Route::get('/events', 'EventController@index');
Route::get('/events/create', 'EventController@create');
Route::post('/create-event', 'EventController@store');
Route::get('/view-event/{id}', 'EventController@show');
Route::get('/delete-event/{id}', function($id){
    \App\Category::find($id)->delete();
    return back();

});

Route::post('/add-ticket', 'EventController@addTicket');

Route::post('/make-payment', 'EventController@makePayment');
Route::get('/make-vendor', 'EventController@makeVendor');

Route::get('/view-category', 'CategoryController@index');

Route::post('/store-category', 'CategoryController@store');
Route::get('/category/{id}', 'EventController@category');


Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::post('/search', 'EventController@search');

require __DIR__ . '/profile/profile.php';
require __DIR__ . '/users/users.php';
require __DIR__ . '/roles/roles.php';
require __DIR__ . '/roles/permissions.php';
require __DIR__ . '/modules/modules.php';
