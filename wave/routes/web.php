<?php

Route::impersonate();

Route::get('/', '\Wave\Http\Controllers\HomeController@index')->name('wave.home');
Route::get('@{username}', '\Wave\Http\Controllers\ProfileController@index')->name('wave.profile');

// Additional Auth Routes
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('user/verify/{verification_code}', 'Auth\RegisterController@verify')->name('verify');
Route::post('register/subscribe', '\Wave\Http\Controllers\RegisterController@register')->name('wave.register-subscribe');

Route::get('blog', '\Wave\Http\Controllers\BlogController@index')->name('wave.blog');
Route::get('blog/{category}', '\Wave\Http\Controllers\BlogController@category')->name('wave.blog.category');
Route::get('blog/{category}/{post}', '\Wave\Http\Controllers\BlogController@post')->name('wave.blog.post');

/***** Pages *****/
Route::get('p/{page}', '\Wave\Http\Controllers\PageController@page');

/***** Billing Webhook *****/
Route::post('/billing/webhook', '\Wave\Http\Controllers\WebhookController@handleWebhook');

Route::group(['middleware' => 'wave'], function () {
	Route::get('dashboard', '\Wave\Http\Controllers\DashboardController@index')->name('wave.dashboard');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('settings/{section?}', '\Wave\Http\Controllers\SettingsController@index')->name('wave.settings');

	Route::post('settings/profile', '\Wave\Http\Controllers\SettingsController@profilePut')->name('wave.settings.profile.put');
	Route::put('settings/security', '\Wave\Http\Controllers\SettingsController@securityPut')->name('wave.settings.security.put');

	Route::post('settings/api', '\Wave\Http\Controllers\SettingsController@apiPost')->name('wave.settings.api.post');
	Route::put('settings/api/{id}', '\Wave\Http\Controllers\SettingsController@apiPut')->name('wave.settings.api.put');
	Route::delete('settings/api/{id}', '\Wave\Http\Controllers\SettingsController@apiDelete')->name('wave.settings.api.delete');

	Route::get('settings/invoices/{invoice}', '\Wave\Http\Controllers\SettingsController@invoice')->name('wave.invoice');

	Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
	Route::get('announcements', '\Wave\Http\Controllers\AnnouncementController@index')->name('wave.announcements');
	Route::get('announcement/{id}', '\Wave\Http\Controllers\AnnouncementController@announcement')->name('wave.announcement');
	Route::post('announcements/read', '\Wave\Http\Controllers\AnnouncementController@read')->name('wave.announcements.read');
	Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
	Route::post('notification/read/{id}', '\Wave\Http\Controllers\NotificationController@delete')->name('wave.notification.read');

	Route::post('subscribe', '\Wave\Http\Controllers\SubscriptionController@subscribe')->name('wave.subscribe');
	Route::get('subscription/cancel', '\Wave\Http\Controllers\SubscriptionController@cancel')->name('wave.cancel');
	Route::get('subscription/reactivate', '\Wave\Http\Controllers\SubscriptionController@reactivate')->name('wave.reactivate');
	Route::post('plans/update', '\Wave\Http\Controllers\SubscriptionController@update_plans')->name('wave.update_plan');
	Route::post('update_credit_card', '\Wave\Http\Controllers\SubscriptionController@update_credit_card')->name('wave.update_credit_card');
	Route::view('trial_over', 'theme::trial_over')->name('wave.trial_over');
	Route::view('cancelled', 'theme::cancelled')->name('wave.cancelled');
});