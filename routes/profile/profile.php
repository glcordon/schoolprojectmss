<?php
use \App\Profile as MyProfile;

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'profile\ProfileController@MyProfile');
Route::get('/profile/{id}', 'profile\ProfileController@viewPublicProfile')->name('view.profile');
Route::get('/profile-create', 'profile\ProfileController@createMyProfile');

Route::post('/store-profile', 'profile\ProfileController@storeMyProfile');

    Route::group(['namespace' => 'Profile'], function() {

        Route::view('/profile', 'profile.profile')->middleware('permission:read-profile');
        Route::view('/password', 'profile.password')->middleware('permission:read-profile-password');

        // api
        Route::group(['prefix' => 'api/profile'], function() {
            Route::get('/getAuthUser', 'ProfileController@getAuthUser')->middleware('permission:read-profile');
            Route::put('/updateAuthUser', 'ProfileController@updateAuthUser')->middleware('permission:update-profile');
            Route::put('/updatePasswordAuthUser', 'ProfileController@updatePasswordAuthUser')->middleware('permission:update-profile-password');
            Route::post('/uploadAvatarAuthUser', 'ProfileController@uploadAvatarAuthUser')->middleware('permission:update-profile');
            Route::post('/removeAvatarAuthUser', 'ProfileController@removeAvatarAuthUser')->middleware('permission:update-profile');
            Route::get('/my-profile', 'ProfileController@MyProfile');
        });
    });
});
