{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

	<div class="container settings mt-4">
		<div class="row">
		    <div class="col-md-4">
		        <div class="card card-default card-nav mb-4">
		        	<div class="card-header">
		        		<h5>Settings</h5>
		        	</div>
		        	<div class="card-body">

			        	<ul class="settings-links">
				            <li class="@if(Request::is('settings/profile')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'profile') }}" class="setting-link"><i class="fa fa-user-o"></i> Profile</a></li>
				            <li class="@if(Request::is('settings/security')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'security') }}" class="setting-link"><i class="fa fa-lock"></i> Security</a></li>
				            <li class="@if(Request::is('settings/api')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'api') }}" class="setting-link"><i class="fa fa-code"></i> API Keys</a></li>
				        </ul>
				    </div>
		        </div>

		        <div class="card card-default card-nav">
		        	<div class="card-header">
		        		<h5>Subscriptions</h5>
		        	</div>
		        	<div class="card-body">

			        	<ul class="settings-links">
				            <li class="@if(Request::is('settings/plans')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'plans') }}" class="setting-link"><i class="fa fa-refresh"></i> Plans</a></li>
				            <li class="@if(Request::is('settings/payment-information')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'payment-information') }}" class="setting-link"><i class="fa fa-credit-card"></i> Payment Info</a></li>
				            <li class="@if(Request::is('settings/invoices')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'invoices') }}" class="setting-link"><i class="fa fa-file-o"></i>  Invoices</a></li>
				        </ul>
				    </div>
		        </div>


		    </div>
		    <div class="col-md-8">

		        <div class="card card-default mb-4 card-settings-content">
		        	<div class="card-header">
		        		<h5><i class="fa fa-user-o"></i> @if(isset($section_title)){{ $section_title }}@else{{ Auth::user()->name . '\'s' }} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') . ' Settings' }}@endif</h5>
		        	</div>
		        	<div class="card-body">
		        		@include('theme::settings.partials.' . $section)
		        	</div>
		        </div>
		    </div>
		</div>
	</div>

@endsection

@section('javascript')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
	<script>

			var uploadCropEl = document.getElementById('upload-crop');

			if(uploadCropEl){

				var uploadCropOptions = {
					viewport: {
						width: 220,
						height: 220,

						type: 'square'
					},
					enableExif: true,
				};

				var uploadCrop = new Croppie(document.getElementById('upload-crop'), uploadCropOptions);


				function readFile(input) {
		 			if (input.files && input.files[0]) {
			            var reader = new FileReader();

			            reader.onload = function (e) {
							//$('.upload-demo').addClass('ready');
			            	uploadCrop.bind({
							    url: e.target.result,
							    orientation: 4
							}).then(function(){
								uploadCrop.setZoom(0);
							});
			            }

			            reader.readAsDataURL(input.files[0]);
			        }
			        else {
				        alert("Sorry - you're browser doesn't support the FileReader API");
				    }
				}
			}
	</script>
@endsection