@extends('theme::layouts.app')

@section('content')

	<div class="uk-container-small uk-align-center uk-text-center">
		<h2>You no longer have an active subscription</h2>
		<p>Please <a href="{{ route('wave.settings', 'plans') }}">Subscribe to a Plan</a> to continue using {{ setting('site.title') }}. Thanks!</p>
		<a href="{{ route('wave.settings', 'plans') }}" class="uk-button uk-button-primary">View Plans</a>
	</div>

@endsection