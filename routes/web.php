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
use Illuminate\Support\Facades\Auth;

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
Route::post('/create-event2', 'EventController@edit')->name('event.edit');

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

// Route::get('/my-profile', 'profile\ProfileController@MyProfile');
// Route::get('/profile/{id}', 'profile\ProfileController@viewPublicProfile')->name('view.profile');
// Route::get('/profile-create', function(){
//     $user = Auth::user();
//     return view('profile.create-profile', compact('user'));
// });

// Route::post('/store-profile', 'profile\ProfileController@storeMyProfile');

Route::domain('test.localhost')->group(function () {
    Route::get('test', function () {
        //
        return 'success';
    });
});
Route::domain('test.159.65.178.155')->group(function () {
    Route::get('test', function () {
        //
        return 'success';
    });
});

Route::get('/courses/create', 'CoursesController@create');

require __DIR__ . '/profile/profile.php';
require __DIR__ . '/users/users.php';
require __DIR__ . '/roles/roles.php';
require __DIR__ . '/roles/permissions.php';
require __DIR__ . '/modules/modules.php';
