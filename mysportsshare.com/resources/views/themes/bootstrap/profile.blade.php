@extends('theme::layouts.app')


@section('content')

	<div class="container mt-4 profile">
		<div class="row">
		    <div class="col-md-4 first-column">
		        <div class="card card-default card-nav">
		        	<div class="card-body">
		        		<div class="user_image">
		        			<img class="border-circle" src="{{ Voyager::image($user->avatar) }}">
			        	</div>
			        	<h3 class="card-title">{{ $user->name }}</h3>
			        	<p class="username">{{ '@' . $user->username }}</p>
			        	<div class="badge badge-success label-plan mt-2" style="background:#{{ stringToColorCode($user->role->display_name) }}">{{ $user->role->display_name }}</div>
				    	<p class="about">{{ $user->profile('about') }}</p>
				    </div>
		        </div>
		    </div>
		    <div class="col-md-8">

		        <div class="card card-default">

		        	<div class="card-body">
		        		<p>Your application info about {{ $user->name }} here</p>
		        		<p>You can edit this template inside of <code>resources/views/{{ theme_folder('/profile.blade.php') }}</code></p>
		        	</div>

		        </div>
		    </div>
		</div>
	</div>

@endsection