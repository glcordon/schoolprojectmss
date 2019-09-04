
<div class="credit-card-data">
	@if(auth()->user()->subscribed('main') && auth()->user()->card_last_four)
		<div id="current_card">
			<h5>Current Card On File</h5>
			<p><span uk-icon="credit-card"></span>Card Ending in {{ auth()->user()->card_last_four }}</p>
		</div>
		<hr>
		<h5>Update Your Payment Information</h5>

		<form action="{{ route('wave.update_credit_card') }}" id="payment-form" method="POST">
			@include('theme::partials.payment-form')
			{{ csrf_field() }}
			<button class="uk-button uk-button-primary uk-align-right uk-margin-top">Update</button>
		</form>
	@else
		<p>Please <a href="{{ route('wave.settings', 'plans') }}">Subscribe to a Plan</a> in order to update your payment information.</p>
		<a href="{{ route('wave.settings', 'plans') }}" class="uk-button uk-button-primary">View Plans</a>
	@endif
</div>