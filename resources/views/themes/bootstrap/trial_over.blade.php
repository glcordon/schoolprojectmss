{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

	<div class="container text-center mt-4">
		<h2>Your trial has ended</h2>
		<p>Please <a href="{{ route('wave.settings', 'plans') }}">Subscribe to a Plan</a> to continue using {{ setting('site.title') }}. Thanks!</p>
		<a href="{{ route('wave.settings', 'plans') }}" class="uk-button uk-button-primary">View Plans</a>
	</div>

@endsection