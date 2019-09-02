@extends('theme::layouts.app')


@section('content')

	<div class="uk-container uk-margin-top profile">
		<div class="uk-text-left" uk-grid>
		    <div class="uk-width-1-2@s uk-width-1-3@m">
		        <div class="uk-card uk-card-default uk-card-nav">
		        	<div class="uk-card-body">
		        		<div class="user_image">
		        			<img class="uk-border-circle" src="{{ Voyager::image($user->avatar) }}">
			        	</div>
			        	<h3 class="uk-card-title">{{ $user->name }}</h3>
			        	<p class="username">{{ '@' . $user->username }}</p>
			        	<div class="uk-label uk-label-success uk-label-plan uk-margin-small-top" style="background:#{{ stringToColorCode($user->role->display_name) }}">{{ $user->role->display_name }}</div>
				    	<p class="about">{{ $user->profile('about') }}</p>
				    </div>
		        </div>
		    </div>
		    <div class="uk-width-1-2@s uk-width-2-3@m">

		        <div class="uk-card uk-card-default">

		        	<div class="uk-card-body">
		        		<p>Your application info about {{ $user->name }} here</p>
		        		<p>You can edit this template inside of <code>resources/views/{{ theme_folder('/profile.blade.php') }}</code></p>
		        	</div>

		        </div>
		    </div>
		</div>
	</div>

@endsection