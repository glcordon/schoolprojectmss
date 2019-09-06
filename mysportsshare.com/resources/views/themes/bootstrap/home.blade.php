@extends('theme::layouts.app')

@section('content')

<!-- HERO -->
<div class="pt-5 mb-2 home-hero">
	<div class="container">
		<div class="row">

			<div class="col-md-6 mt-5 pr-4">
				<h1 class="text-left h6 mt-5">{{ theme('home_headline') }}</h1>
				<h2 class="text-left h1 mb-3">{{ theme('home_subheadline') }}</h2>
				<p>{{ theme('home_description') }}</p>
				<div class="uk-margin-medium uk-text-left@m uk-text-center uk-scrollspy-inview uk-animation-slide-left-medium">
					<a class="el-content uk-button uk-button-primary" href="{{ theme('home_cta_url') }}" title="{{ theme('home_cta') }}">
						{{ theme('home_cta') }}
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="uk-margin uk-text-center uk-scrollspy-inview uk-animation-slide-right" uk-scrollspy-class="uk-animation-slide-right" style="">
					<img src="{{ Voyager::image(theme('home_promo_image')) }}" class="el-image" alt="" style="max-height:550px">
				</div>
			</div>

		</div>
	</div>
</div>

<!-- WAVE SVG GRAPHIC -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg{fill:#000000;}
	</style>
	<g id="wave" transform="translate(720.000000, 75.000000) scale(1, -1) translate(-720.000000, -75.000000) " fill-rule="nonzero">
        <path class="wave-svg" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#000000" opacity="0.519587054"></path>
        <path class="wave-svg" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#000000" opacity="0.347991071"></path>
        <path class="wave-svg" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<div id="features" style="background-color:black;">
	<div class="container">

		<h2 class="mt-0">Our Partners</h2>
		<p class="text-center mt-4" style="color:#ffffff; opacity:0.8;">
			Description
		</p>

		<div class="row">
			@foreach($sites as $site)
			<div class="col-md-4 my-4 text-center">
				<a href="http://{{ $site->site_slug }}.mysportsshare.com">
					<img src="{{ Storage::url($site->user_cover) }}">
					<h4>{{ $site->site_name }}</h4>
				</a>
			</div>
			@endforeach
		</div>

	</div>
</div>

<!-- WAVE SVG GRAPHIC -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 156" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg{fill:#000000;}
	</style>
	<g id="wave" fill-rule="nonzero">
        <path class="wave-svg" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#000000" opacity="0.519587054"></path>
        <path class="wave-svg" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#000000" opacity="0.347991071"></path>
        <path class="wave-svg" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<!-- TESTIMONIALS 
<div id="testimonials">
	<div class="container mt-2">
		<h2>Example Testimonials</h2>
		<p class="text-center mt-2">Here are some example testimonials that you can configure for your SAAS</p>


		<div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#testimonialCarousel" data-slide-to="1"></li>
				<li data-target="#testimonialCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active testimonial">
					<img src="{{ theme_folder_url('/images/testimonial-1.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Scottie Harp</p>
						<blockquote uk-slider-parallax="x: 100,-100">Using Wave I was able to build the SAAS of my dreams. It was so easy to get started and customize. Now, I'm living off of the income that my Software as a Service has generated.</blockquote>
				</div>
				<div class="carousel-item testimonial">
					<img src="{{ theme_folder_url('/images/testimonial-2.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Josh Hudson</p>
						<blockquote uk-slider-parallax="x: 100,-100">Creating a Software as a Service is now easier than ever with Wave.<br> I was able to save my development team hundreds of hours of work!</blockquote>
				</div>
				<div class="carousel-item testimonial">
					<img src="{{ theme_folder_url('/images/testimonial-3.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Jim Fullerton</p>
						<blockquote uk-slider-parallax="x: 100,-100">I wish I had known about Wave sooner! It's the best solution for creating the Software as a Service of your dreams.</blockquote>
				</div>
			</div>
			<a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>


	</div>
</div>-->

<!-- WAVE SVG GRAPHIC -->
<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg-light{fill:#f9f9fc;}
	</style>
	<g id="wave" transform="translate(720.000000, 75.000000) scale(1, -1) translate(-720.000000, -75.000000) " fill-rule="nonzero">
        <path class="wave-svg-light" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#000000" opacity="0.519587054"></path>
        <path class="wave-svg-light" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#000000" opacity="0.347991071"></path>
        <path class="wave-svg-light" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<!-- PRICING -->
<div id="pricing">
	<div class="container">
		<h2>Get Started Now!</h2>
		<p class="text-center mb-5 mt-3">Join Now</p>

		@php $plans = Wave\Plan::all() @endphp
		<div class="card-deck">
			@foreach($plans as $plan)
				@php $features = explode(',', $plan->features); @endphp
				<div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
					</div>
					<div class="card-body">
						<h5 class="card-title pricing-card-title">{{ $plan->price }}</h5>
						<ul class="list-unstyled mt-3 mb-4">
							@foreach($features as $feature)
			            		<li><i class="fa fa-check"></i> {{ $feature }}</li>
			            	@endforeach
						</ul>
						<button type="button" href="{{ theme('home_cta_url') }}" class="btn btn-lg btn-block btn-primary">Select Plan</button>
					</div>
				</div>
			@endforeach
		</div>

	</div>
</div>
@dump(Session::get('tenant'))
@endsection