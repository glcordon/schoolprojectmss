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
use Illuminate\Http\Request;

// Authentication routes
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Include Wave Routes
Wave::routes();
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
Route::get('/courses', 'CoursesController@index');
Route::get('/courses/create', 'CoursesController@create');
Route::get('/courses/show/{id}', 'CoursesController@show');
Route::get('/courses/{id}/create', 'CoursesController@edit');
Route::get('/courses/{id}/delete', 'CoursesController@destroy');
Route::post('/create-course/{id}/store', 'CoursesController@update');

Route::post('/lesson/delete', function(Request $request){
    App\Lessons::find($request->id)->delete();
});


Route::post('/courses/add-question', 'CoursesController@addQuestion');
Route::post('/courses/update-question', 'CoursesController@updateQuestion');
Route::post('/courses/delete-question', 'CoursesController@deleteQuestion');
Route::post('/courses/score-quiz', 'CoursesController@scoreQuiz');
