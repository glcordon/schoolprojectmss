<form action="{{ route('wave.settings.security.put') }}" method="POST" enctype="multipart/form-data">
	<div class="uk-text-left" uk-grid>
		<div class="uk-width-1-1">
			<div>
				<label class="uk-form-label">Current Password</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="current_password" type="password" placeholder="Current Password">
		        </div>
		    </div>
		    <div class="uk-margin-top">
		        <label class="uk-form-label">New Password</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="password" type="password" placeholder="New Password">
		        </div>
		    </div>
		    <div class="uk-margin-top">
		        <label class="uk-form-label">Confirm New Password</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="password_confirmation" type="password" placeholder="Confirm New Password">
		        </div>
		    </div>
		    <input type="hidden" name="_method" value="PUT">
		    {{ csrf_field() }}
		    <button class="uk-button uk-button-primary uk-align-right uk-margin-top">Update</button>
		</div>
	</div>

</form>