<form action="{{ route('wave.settings.api.post') }}" method="POST">
	<h4>Create a new API Key</h4>
	<div class="form-group text-right">
        <input class="form-control" name="key_name" type="text" placeholder="Key Name">
        <button type="submit" class="btn btn-primary mt-2">Create New Key</button>
    </div>
	{{ csrf_field() }}
</form>
<hr>
@if(count(auth()->user()->apiKeys) > 0)
	<h4>Current API Keys</h4>

	<table class="table table-striped">
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
					<td class="text-right">
						<button class="btn btn-default viewapikey" data-key="{{ $apiKey->key }}" data-name="{{ $apiKey->name }}" data-toggle="modal" data-target="#viewApiKey"><i class="fa fa-info"></i></button>
						<button class="btn btn-default editapikey" data-action="{{ route('wave.settings.api.put', $apiKey->id) }}" data-name="{{ $apiKey->name }}" data-toggle="modal" data-target="#editApiKey"><i class="fa fa-cog"></i></button>
						<button class="btn btn-default deleteapikey" data-action="{{ route('wave.settings.api.delete', $apiKey->id) }}" data-name="{{ $apiKey->name }}" data-toggle="modal" data-target="#deleteApiKey"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Modal -->
	<div class="modal fade" id="viewApiKey" tabindex="-1" role="dialog" aria-labelledby="viewApiKeyLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">API Key (<span id="viewKeyName"></span>)</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" readonly="readonly" onfocus="this.select();" class="form-control" value="" id="viewKeyValue">
					<p>This API Key can be used to gain an <code>access_token</code>, which can then be used to interact with the API.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="editApiKey" tabindex="-1" role="dialog" aria-labelledby="editApiKeyLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">API Key Name (<span id="editKeyName"></span>)</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="" id="editKeyForm" method="POST">
		      <div class="modal-body">
					<p>Change the name of this API Key</p>
		        	<input type="text" class="form-control" name="key_name" id="editKeyInput">
		        	<input type="hidden" name="_method" value="PUT">
			        {{ csrf_field() }}
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Update</button>
		      </div>
		     </form>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteApiKey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Delete this API Key?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	      	<p>Are you sure you want to delete API Key: <code><span id="deleteKeyName"></span></code></p>

	      </div>
	      <div class="modal-footer">
	      	<form action="" id="deleteKeyForm" method="POST">
	      		<input type="hidden" name="_method" value="DELETE">
	      		{{ csrf_field() }}
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	       		<button type="submit" class="btn btn-primary">Delete</button>
	       	</form>
	      </div>
	    </div>
	  </div>
	</div>


@else
	<p class="uk-text-center">No API Keys Created Yet.</p>
@endif
