@extends('theme::layouts.app')

@section('content')
<style>
		.card-img-overlay {
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			padding: $card-img-overlay-padding;
		  }
		  #pricing
		  {
			  background-color: black !important;
			  color:black !important;
		  }
		  
</style>		  
<!--/ Intro Skew Star /-->
<section id="home">
  <div class="home-banner">
	  <div class="intro route" style="background-image: url({{ asset('assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg') }})">
		<div class="overlay-itro"></div>
		<div class="intro-content display-table">
		  <div class="table-cell">
			<div class="container">
			  <div class="banner-container">
				<p class="Courses-avilability wow fadeInDown" data-wow-delay=".25s" data-wow-duration="1s">Available Now</p>
				<h1 class="intro-title wow fadeInDown" data-wow-delay=".80s" data-wow-duration="1s">Elite Sports Training, <span>Mentorship</span> & Events</h1>
				<div class="banner-slider-content">
				  <a class="btn btn-primary wow zoomIn" data-wow-delay="1.50s" data-wow-duration="2s" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
				  <span class="wow fadeInRight" data-wow-delay="3s" data-wow-duration="1s">New Content Monthly</span>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="intro route" style="background-image: url({{ asset('assets/img/court-prather-Nka1wVAQWa4-unsplash.jpg') }})">
		<div class="overlay-itro"></div>
		<div class="intro-content display-table">
		  <div class="table-cell">
			<div class="container">
			  <div class="banner-container">
				<p class="Courses-avilability">Available Now</p>
				<h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
				<div class="banner-slider-content">
				  <a class="btn btn-primary" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
				  <span>New Content Monthly</span>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="intro route" style="background-image: url(assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg)">
		<div class="overlay-itro"></div>
		<div class="intro-content display-table">
		  <div class="table-cell">
			<div class="container">
			  <div class="banner-container">
				<p class="Courses-avilability">Available Now</p>
				<h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
				<div class="banner-slider-content">
				  <a class="btn btn-primary" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
				  <span>New Content Monthly</span>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </div>
</section>
<!--/ Intro Skew End /-->


<!--/ Section Road to pro /-->
<section id="service" class="services-mf route p-r section-padding-80">
  <div class="container">
	<div class="row">
	  <div class="col-sm-12">
		<div class="title-box text-center">
		  <h3 class="title-a wow zoomIn" data-wow-delay="2s" data-wow-duration="1s">
			Road to Pro
		  </h3>
		</div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-4">
		<div class="service-box wow zoomIn" data-wow-delay="1s" data-wow-duration="1s">
		  <div class="service-ico">
			<span class="ico-circle"><i class="icon-coach"></i></span>
		  </div>
		  <div class="service-content">
			<h2 class="s-title">Elite Training Courses</h2>
			<p class="s-description text-center">
			  We have identified the best and most enthusiastic trainers around the country bringing you the same information that have taken hundreds of athletes pro.
			</p>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<div class="service-box wow zoomIn" data-wow-delay="1.3s" data-wow-duration="1s">
		  <div class="service-ico">
			<span class="ico-circle"><i class="icon-online"></i></span>
		  </div>
		  <div class="service-content">
			<h2 class="s-title">Pro Mentors</h2>
			<p class="s-description text-center">
			  We have brought a unique and exclusive opportunity to be mentored directly by professional athletes through live streams and conference calls. 
			</p>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<div class="service-box wow zoomIn" data-wow-delay="1.6s" data-wow-duration="1s">
		  <div class="service-ico">
			<span class="ico-circle"><i class="icon-calendar"></i></span>
		  </div>
		  <div class="service-content">
			<h2 class="s-title">Exclusive Camps & Events</h2>
			<p class="s-description text-center">
			  We have partnered with camps, tournaments, and professional exposure events to make sure you always know your next opportunity near you to grow or be seen. 
			</p>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
<!--/ Section Road to pro/-->


<div style="background-color:black; padding:4rem 0; color:white;">
	<div class="container">

		<h2 class="mt-0 py-4 text-uppercase text-body">{{ isset(Session::get('tenant')->site_name) ? Session::get('tenant')->site_name. "'s Courses" : 'Our Partners' }}</h2>

			<div class="row">
				@if(isset(Session::get('tenant')->site_name))
							@foreach($sites->courses->toArray() as $course)
								@if($course['course_title'] !== '') 
								<div class="col-sm-4 my-4">
									<div class="card shadow-sm overlay" 
										style="text-align:left; height:15rem; background-image:url({{ $course['course_image'] ? Storage::url($course['course_image'])  ?? asset('img/baseball-field.jpg') : asset('img/baseball-field.jpg') }}); background-size:cover;">
										{{--  {{ dd($courses) }}  --}}
										<a href="/courses/show/{{ $course['id'] }}" class="text-white" style="display:block; background-color:rgba(0,0,0,0.4); height:100%; width:100%;">
											<div class="card-body" style="position:absolute; bottom:0;">
												<h6 class="card-title text-white">{{ $course['course_title'] }}</h6>
											</div>
										</a>
								</div> 
								</div>
								@endif
							@endforeach 
				@else
					@foreach($sites as $site)
					<div class="col-sm-4 my-4">
						<div class="card shadow-sm overlay" 
							style="text-align:left; height:15rem; background-image:url({{ Storage::url($site->user_cover) }}); background-size:cover;">
							{{--  {{ dd($courses) }}  --}}
							<a href="http://{{ $site->site_slug }}.mysportsshare.com" class="text-white" style="display:block; background-color:rgba(0,0,0,0.4); height:100%; width:100%;">
								<div class="card-body" style="position:absolute; bottom:0;">
									<h6 class="card-title text-white">{{ $site->site_name }}</h6>
								</div>
							</a>
						</div>  
					</div>
					{{--  <div class="col-3">
						<div class="card bg-dark text-white">
							<img src="{{ Storage::url($site->user_cover) }}"> 
							<a href="http://{{ $site->site_slug }}.mysportsshare.com">
								<div class="card-img-overlay">
									<div class="card-text border-0 bg-semitransparent text-center text-white">
										{{ $site->site_name }}
									</div>
								</div>
							</a>
						</div>
					</div>  --}}
					@endforeach
				@endif
			
		</div>

	</div>
</div>

<!-- WAVE SVG GRAPHIC
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
</svg> -->

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

<!-- WAVE SVG GRAPHIC 
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
</svg>-->
@if(Auth::guest())
<!-- PRICING -->

<div id="pricing" >
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
						<a href="/register" class="btn btn-lg btn-block btn-dark">Sign Up</a>
					</div>
				</div>
			@endforeach
		</div>

	</div>
</div>
@endif
@endsection