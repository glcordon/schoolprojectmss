<form action="{{ route('wave.settings.api.post') }}" method="POST">
	<div class="uk-text-left" uk-grid>
		<div class="uk-width-1-1">
			<h4>Create a new API Key</h4>
			<div>
				<div class="uk-form-controls">
		            <input class="uk-input" name="key_name" type="text" placeholder="Key Name">
		            <button type="submit" class="uk-button uk-button-primary uk-align-right uk-margin-small-top">Create New Key</button>
		        </div>
		    </div>
		</div>
	</div>
	{{ csrf_field() }}
</form>
<hr>
@if(count(auth()->user()->apiKeys) > 0)
	<h4>Current API Keys</h4>

	<table class="uk-table uk-table-striped">
		<thead>
	        <tr>
	            <th>Name</th>
	            <th>Created</th>
	            <th>Last Used</th>
	            <th></th>
	        </tr>
	    </thead>
	   	<tbody>

			@foreach(auth()->user()->apiKeys as $apiKey)
				<tr>
					<td>{{ $apiKey->name }}</td>
					<td>{{ $apiKey->created_at }}</td>
					<td>@if(is_null($apiKey->last_used)){{ 'Never Used' }}@else{{ $apiKey->last_used }}@endif</td>
					<td>
						<button class="uk-button uk-button-default uk-button-small deleteapikey" data-action="{{ route('wave.settings.api.delete', $apiKey->id) }}" data-name="{{ $apiKey->name }}" uk-toggle="target: #deleteApiKey"><span uk-icon="trash"></span></button>
						<button class="uk-button uk-button-default uk-button-small editapikey" data-action="{{ route('wave.settings.api.put', $apiKey->id) }}" data-name="{{ $apiKey->name }}" uk-toggle="target: #editApiKey"><span uk-icon="cog"></span></button>
						<button class="uk-button uk-button-default uk-button-small viewapikey" data-key="{{ $apiKey->key }}" data-name="{{ $apiKey->name }}" uk-toggle="target: #viewApiKey"><span uk-icon="info"></span></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div id="viewApiKey" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body">
	    	<button class="uk-modal-close-default" type="button" uk-close></button>
	        <h2 class="uk-modal-title">API Key (<span id="viewKeyName"></span>)</h2>
	        <input type="text" readonly="readonly" onfocus="this.select();" class="uk-input" value="" id="viewKeyValue">
	        <p>This API Key can be used to gain an <code>access_token</code>, which can then be used to interact with the API.</p>
	    </div>
	</div>

	<div id="editApiKey" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body">
	        <h2 class="uk-modal-title">API Key Name (<span id="editKeyName"></span>)</h2>
	        <p>Change the name of this API Key</p>
	        <form action="" id="editKeyForm" method="POST">
	        	<input type="text" class="uk-input" name="key_name" id="editKeyInput">
	        	<input type="hidden" name="_method" value="PUT">
		        <p class="uk-text-right">
		            <button class="uk-button uk-button-default uk-modal-close">Cancel</button>
		            <button class="uk-button uk-button-primary" type="submit">Update</button>
		        </p>
		        {{ csrf_field() }}
	    	</form>
	    </div>
	</div>

	<div id="deleteApiKey" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body">
	        <h2 class="uk-modal-title">Delete this API Key?</h2>
	        <p>Are you sure you want to delete API Key: <code><span id="deleteKeyName"></span></code></p>
	        <form action="" id="deleteKeyForm" method="POST">
	        	<input type="hidden" name="_method" value="DELETE">
		        <p class="uk-text-right">
		            <button class="uk-button uk-button-default uk-modal-close">Cancel</button>
		            <button class="uk-button uk-button-danger uk-text-white" type="submit">Delete</button>
		        </p>
		        {{ csrf_field() }}
		    </form>
	    </div>
	</div>

@else
	<p class="uk-text-center">No API Keys Created Yet.</p>
@endif
