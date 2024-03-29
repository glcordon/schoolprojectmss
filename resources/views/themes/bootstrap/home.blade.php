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
				<!--/ Section choose course /-->
				<section id="choose-course" class="choose-course route p-r section-padding-80 col-12">
				  <div class="container">
					<div class="row">
					  <div class="col-sm-10 offset-md-1 text-left">
						<div class="title-box text-center mb-0">
						  <h3 class="title-a wow fadeInDown transform-up animated" data-wow-delay="1s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInDown;">
							Choose Your Course
						  </h3>
						</div>
					  </div>
					  <div class="search-course-box">
						<form>
						  <input type="text" name="" placeholder="I am looking for...">
						  <button><i class="icon-magnifying-glass"></i></button>
						</form>
					  </div>
					</div>
					<div class="row">
						  @foreach($sites as $site)
					  <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="0.3s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image:url({{ Storage::url($site->user_cover) }});"></div>
						  <div class="course-top-content">
							{{-- <span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span> --}}
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">{{ $site->site_name }}</h3>
							<div class="review">
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							</div>
						  </div> 
						  <div class="card-btn-holder">
							<a href="http://{{ $site->site_slug }}.mysportsshare.com" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="http://{{ $site->site_slug }}.mysportsshare.com" class="more-info-btn">More Info</a>
						  </div>
						</div>
					  </div>
					  @endforeach
					  {{-- <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="0.6s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
						  <div class="course-top-content">
							<span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span>
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">Ground Up Baseball</h3>
							<div class="review">
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							</div>
						  </div> 
						  <div class="card-btn-holder">
							<a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="subscribed-partner.html" class="more-info-btn">More Info</a>
						  </div>
						</div>
					  </div>
					  <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="0.9s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
						  <div class="course-top-content">
							<span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span>
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">Wise Basketball Training</h3>
							<div class="review">
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-star"></i>
							</div>
						  </div> 
						  <div class="card-btn-holder">
							<a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="subscribed-partner.html" class="more-info-btn">More Info</a>
						  </div>
						</div>
					  </div>
					  <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="1.2s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
						  <div class="course-top-content">
							<span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span>
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">Prospeak</h3>
							<div class="review">
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							</div>
						  </div>
						  <div class="card-btn-holder">
							<a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="subscribed-partner.html" class="more-info-btn">More Info</a>
						  </div> 
						</div>
					  </div>
					  <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="1.5s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
						  <div class="course-top-content">
							<span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span>
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">Transition Performance</h3>
							<div class="review">
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							</div>
						  </div> 
						  <div class="card-btn-holder">
							<a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="subscribed-partner.html" class="more-info-btn">More Info</a>
						  </div>
						</div>
					  </div>
					  <div class="col-lg-4 col-sm-6">
						<div class="course-box p-r wow zoomIn" data-wow-delay="1.8s" data-wow-duration="1s">
						  <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
						  <div class="course-top-content">
							<span class="category-name">Sports</span>
							<span class="price-month">$xx/Mo.</span>
						  </div>
						  <div class="course-bottom-content">
							<h3 class="s-title">Real Training Focus</h3>
							<div class="review">
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
							  <i class="icon-star"></i>
							  <i class="icon-star"></i>
							</div>
						  </div> 
						  <div class="card-btn-holder">
							<a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
							<a href="subscribed-partner.html" class="more-info-btn">More Info</a>
						  </div>
						</div>
					  </div> --}}
					</div>
				  </div>
				</section>
				<!--/ Section choose course/-->
			   
				@endif
			
		</div>

	</div>
</div>

@endsection