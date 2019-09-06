@extends('theme::layouts.app')


@section('content')

	<div class="uk-container uk-margin-top settings">

		<h1 class="uk-text-center"><span uk-icon="icon: bell; ratio: 2" ></span> All Notifications</h1>
		<div class="uk-align-center">
			@include('theme::partials.notifications', ['show_all_notifications' => true])
		</div>

	</div>

@endsection