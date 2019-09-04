<div id="invoices">

	<h5 class="uk-margin-small-bottom">Invoices</h5>


	@if(auth()->user()->subscribed('main'))
		<table class="uk-table uk-table-striped">
		    @foreach (auth()->user()->invoices() as $invoice)
		        <tr>
		            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
		            <td>{{ $invoice->total() }}</td>
		            <td><a href="{{ route('wave.invoice', $invoice->id) }}">Download</a></td>
		        </tr>
		    @endforeach
		</table>
	@else
		<p class="uk-text-muted">When you subscribe to a plan, this is where you will be able to download your invoices.</p>
		<a href="{{ route('wave.settings', 'plans') }}" class="uk-button uk-button-primary">View Plans</a>
	@endif

</div>