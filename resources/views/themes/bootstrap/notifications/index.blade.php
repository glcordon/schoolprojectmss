@extends('theme::layouts.app')


@section('content')

	<div class="container notification-page mt-4 mb-2">

		<h1 class="text-center"><i class="fa fa-bell"></i> All Notifications</h1>
		@include('theme::partials.notifications', ['show_all_notifications' => true])

	</div>

@endsection