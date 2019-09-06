<form action="{{ route('wave.settings.profile.put') }}" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-3 text-left">
			<div id="new_image">
				<img id="preview" src="{{ Voyager::image(auth()->user()->avatar) }}">
				<div class="form-custom">
				    <input type="file" id="upload">
				    <input type="hidden" id="uploadBase64" name="avatar">
				    <button class="btn"><i class="fa fa-camera"></i></button>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				<label for="name">Name</label>
		        <input class="form-control" name="name" type="text" placeholder="Name" value="{{ Auth::user()->name }}">
		    </div>
		    <div  class="form-group">
		        <label for="email">Email Address</label>
		        <input class="form-control" name="email" type="text" placeholder="Email Address" value="{{ Auth::user()->email }}">
		    </div>
		    <div  class="form-group">
		        <label class="uk-form-label">About</label>
				<div class="uk-form-controls">
					{!! profile_field('text_area', 'about') !!}
				</div>
		    </div>
		</div>
	</div>

	{{ csrf_field() }}

	<div class="form-group text-right mb-0 mt-2">
		<button class="btn btn-primary">Save</button>
	</div>

</form>

<!-- Modal -->
<div class="modal fadeIn" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-crop">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Position and resize your photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="upload-crop-container">
			<div id="upload-crop"></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="apply-crop">Apply</button>
      </div>
    </div>
  </div>
</div>