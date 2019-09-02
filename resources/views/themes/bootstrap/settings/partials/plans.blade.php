@php $plans = Wave\Plan::all() @endphp

<div id="select-plan">

	@if( auth()->user()->onTrial(auth()->user()->role->name) )
		<p>You are currently on a trial subscription</p>
	@endif

	@if(auth()->user()->subscribed('main'))
		<h5>Switch Plans</h5>
	@else
		<h5>Select a Plan</h5>
	@endif

	<form id="@if(auth()->user()->subscribed('main')){{ 'update-plan-form' }}@else{{ 'payment-form' }}@endif" role="form" method="POST" action="@if(auth()->user()->subscribed('main')){{ route('wave.update_plan') }}@else{{ route('wave.subscribe') }}@endif">
		@include('theme::partials.plans')

		@if(!auth()->user()->subscribed('main'))
			<h5 class="mt-4">Add Your Payment Info</h5>
			<div class="form-group text-right">
				@include('theme::partials.payment-form')
				<button class="btn btn-primary mt-3">Submit</button>
			</div>
		@else
			@if(auth()->user()->subscription('main')->onGracePeriod())
				@include('theme::partials.reactivate')
			@else
				@include('theme::partials.cancel')
			@endif
		@endif

		{{ csrf_field() }}
	</form>

</div>