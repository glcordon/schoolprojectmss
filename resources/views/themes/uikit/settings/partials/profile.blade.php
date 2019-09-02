<form action="{{ route('wave.settings.profile.put') }}" method="POST" enctype="multipart/form-data">
	<div class="uk-text-left" uk-grid>
		<div class="uk-width-1-4 uk-text-left">
			<div id="new_image">
				<img id="preview" src="{{ Voyager::image(auth()->user()->avatar) }}">
				<div uk-form-custom>
				    <input type="file" id="upload">
				    <input type="hidden" id="uploadBase64" name="avatar">
				    <button class="uk-button uk-button-default uk-padding-remove-left uk-padding-remove-right uk-width-1-1 uk-margin-top"><span uk-icon="icon: camera" class="uk-icon"></span></button>
				</div>
			</div>
		</div>
		<div class="uk-width-3-4">
			<div>
				<label class="uk-form-label">Name</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="name" type="text" placeholder="Name" value="{{ Auth::user()->name }}">
		        </div>
		    </div>
		    <div class="uk-margin-top">
		        <label class="uk-form-label">Email Address</label>
				<div class="uk-form-controls">
		            <input class="uk-input" name="email" type="text" placeholder="Email Address" value="{{ Auth::user()->email }}">
		        </div>
		    </div>
		    <div class="uk-margin-top">
		        <label class="uk-form-label">About</label>
				<div class="uk-form-controls">
					{!! profile_field('text_area', 'about') !!}
				</div>
		    </div>
		</div>
	</div>

	{{ csrf_field() }}

	<button class="uk-button uk-button-primary uk-align-right uk-margin-top" dusk="update-profile-button">Save</button>

</form>

<!-- Upload Modal -->
<div id="upload-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-crop">
    	<button class="uk-modal-close uk-modal-close-default uk-close uk-icon" type="button" uk-close></button>
    	<div class="uk-modal-header">
            <h2 class="uk-modal-title">Position and resize your photo</h2>
        </div>
    	<div class="uk-modal-body">
	        <h2 class="uk-modal-title"></h2>
	        <div id="upload-crop-container">
				<div id="upload-crop"></div>
			</div>
		</div>
		<div class="uk-modal-footer uk-text-right uk-padding-small">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary uk-button-small" id="apply-crop" type="button">Apply</button>
        </div>
    </div>

</div>