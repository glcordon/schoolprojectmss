@extends('theme::layouts.app')


@section('content')

	<div class="uk-container uk-margin-top settings">
		<div class="uk-text-left" uk-grid>
		    <div class="uk-width-1-4@m">
		        <div class="uk-card uk-card-default uk-card-nav">
		        	<div class="uk-card-header">
		        		<h5>Settings</h5>
		        	</div>
		        	<div class="uk-card-body">

			        	<ul class="settings-links">
				            <li class="@if(Request::is('settings/profile')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'profile') }}" class="setting-link"> <span uk-icon="icon: user" class="uk-icon"></span>Profile</a></li>
				            <li class="@if(Request::is('settings/security')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'security') }}" class="setting-link"><span uk-icon="icon: lock" class="uk-icon"></span>Security</a></li>
				            <li class="@if(Request::is('settings/api')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'api') }}" class="setting-link"><span uk-icon="icon: code" class="uk-icon"></span>API Keys</a></li>
				        </ul>
				    </div>
		        </div>

		        <div class="uk-card uk-card-default uk-card-nav uk-margin-top">
		        	<div class="uk-card-header">
		        		<h5>Subscriptions</h5>
		        	</div>
		        	<div class="uk-card-body">

			        	<ul class="settings-links">
				            <li class="@if(Request::is('settings/plans')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'plans') }}" class="setting-link"><span uk-icon="icon: future" class="uk-icon"></span>Plans</a></li>
				            <li class="@if(Request::is('settings/payment-information')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'payment-information') }}" class="setting-link"><span uk-icon="icon: credit-card" class="uk-icon"></span>Payment Info</a></li>
				            <li class="@if(Request::is('settings/invoices')){{ 'active' }}@endif tablink"><a href="{{ route('wave.settings', 'invoices') }}" class="setting-link"><span uk-icon="icon: cloud-download" class="uk-icon"></span>Invoices</a></li>
				        </ul>
				    </div>
		        </div>


		    </div>
		    <div class="uk-width-3-4@m uk-margin-medium-bottom">

		        <div class="uk-card uk-card-default">
		        	<div class="uk-card-header">
		        		<h5><span uk-icon="icon: user" class="uk-icon"></span>@if(isset($section_title)){{ $section_title }}@else{{ Auth::user()->name . '\'s' }} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') . ' Settings' }}@endif</h5>
		        	</div>
		        	<div class="uk-card-body">
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
					enableExif: true
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



				document.getElementById('upload').addEventListener('change', function () { UIkit.modal(document.getElementById('upload-modal')).show(); readFile(this); });

				UIkit.util.on(document, 'hidden', '#upload-modal', function(){
					document.getElementById('upload').value = '';
				});

				UIkit.util.on('#apply-crop', 'click', function (e) {
					uploadCrop.result({type:'base64',size:'original',format:'png',quality:1}).then(function(base64) {
						//console.log(window.URL.createObjectURL(new Blob([blob])));
						UIkit.modal(document.getElementById('upload-modal')).hide();
						document.getElementById('preview').src = base64;
						document.getElementById('uploadBase64').value = base64;
					});
				});
			}

	</script>
@endsection