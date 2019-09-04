<?php

return [

	'profile_fields' => [
		'about'
	],

	'api' => [
		'auth_token_expires' 	=> 60,
		'key_token_expires'		=> 1,
	],

	'auth' => [
		'min_password_length' => 5,
	],

	'user_model' => App\User::class,
	'show_docs' => env('WAVE_SHOW_DOCS', true),

	'billing' => 'stripe',

];