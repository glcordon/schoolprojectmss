@extends('theme::layouts.app')

@section('content')

<div class="uk-section-default uk-section uk-flex uk-flex-middle uk-padding-small uk-padding-remove-bottom uk-margin-small-top" style="box-sizing: border-box;">
	<div class="uk-width-1-1">
		<div class="uk-container">

			<div class="uk-grid-large uk-flex-middle uk-grid-margin-large uk-grid uk-padding-bottom@m" uk-grid="">

				<div class="uk-width-expand@m uk-first-column uk-animation-slide-left-small">

					<h1 class="uk-text-left@m uk-text-center uk-h6 uk-scrollspy-inview uk-animation-slide-left-medium" uk-scrollspy-class="">{{ theme('home_headline') }}</h1>
					<h2 class="uk-width-xlarge uk-margin-auto uk-text-left@m uk-text-center uk-h1 uk-scrollspy-inview uk-animation-slide-left-medium" uk-scrollspy-class="">{{ theme('home_subheadline') }}</h2>
					<div class="uk-margin uk-text-left@m uk-text-center uk-scrollspy-inview uk-animation-slide-left-medium" uk-scrollspy-class="">{{ theme('home_description') }}</div>
					<div class="uk-margin-medium uk-text-left@m uk-text-center uk-scrollspy-inview uk-animation-slide-left-medium" uk-scrollspy-class="" style="">
						<a class="el-content uk-button uk-button-primary" href="{{ theme('home_cta_url') }}" title="{{ theme('home_cta') }}">
							{{ theme('home_cta') }}
						</a>
					</div>

				</div>

				<div class="uk-width-expand@m uk-animation-slide-right-small">

					<div class="uk-margin uk-text-center uk-scrollspy-inview uk-animation-slide-right" uk-scrollspy-class="uk-animation-slide-right" style="">
						<img src="{{ Voyager::image(theme('home_promo_image')) }}" class="el-image" alt="" style="max-height:550px">
					</div>

				</div>
			</div>
		</div>

	</div>

</div>

<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg{fill:#1683FB;}
	</style>
	<g id="wave" transform="translate(720.000000, 75.000000) scale(1, -1) translate(-720.000000, -75.000000) " fill-rule="nonzero">
        <path class="wave-svg" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#0069FF" opacity="0.519587054"></path>
        <path class="wave-svg" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#0069FF" opacity="0.347991071"></path>
        <path class="wave-svg" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<div class="uk-width-1-1" id="features">
	<div class="uk-container">
		<h2>Awesome Features</h2>
		<p class="uk-text-center uk-margin-remove-top uk-align-center uk-margin-remove-bottom" style="color:#ffffff; opacity:0.8;">Wave has some cool features to help you rapidly build your Software as a Service.<br> Here are a few awesome features you're going to love!</p>
		<div class="uk-grid">
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-large-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/authentication.png') }}">
				<h4>Authentication</h4>
				<p>Fully loaded authentication, email verification, and password reset. Authentication in a snap!</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-large-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/profile.png') }}">
				<h4>User Profiles</h4>
				<p>Customizable user profiles. Allow your users to enter data and easily customize their user profiles.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-large-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/impersonation.png') }}">
				<h4>User Impersonation</h4>
				<p>With user impersonations you can login as another user and resolve an issue or troubleshoot a bug.</p>
			</div>

			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/subscriptions.png') }}">
				<h4>Subscriptions</h4>
				<p>Allow users to pay for your service and signup for a subscription using Stripe or Braintree Payments.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/plans.png') }}">
				<h4>Subscription Plans</h4>
				<p>Create new plans with different features and intrigue your users to subscribe to any plan.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/roles.png') }}">
				<h4>User Roles</h4>
				<p>Grant user permissions based on roles, you can then assign a role to a specific plan.</p>
			</div>

			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/notifications.png') }}">
				<h4>Notifications</h4>
				<p>Ready-to-use Notification System which integrates with the default Laravel notification feature.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/announcements.png') }}">
				<h4>Announcements</h4>
				<p>Create user announcements to notify users about new features or updates in your application.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/blog.png') }}">
				<h4>Blog</h4>
				<p>Equipped with a fully-functional blog. Write posts related to your product to gain free SEO traffic.</p>
			</div>

			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-margin-medium-bottom uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/api.png') }}">
				<h4>Fully Functional API</h4>
				<p>Ready-to-consume API for your application. Create API tokens with role specific permissions.</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-margin-medium-bottom uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/admin.png') }}">
				<h4>Voyager Admin</h4>
				<p>Wave has been crafted using  Laravel & Voyager, which makes administering your app a breeze!</p>
			</div>
			<div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1 uk-margin-medium-top uk-margin-medium-bottom uk-text-center" uk-scrollspy="cls:uk-animation-slide-bottom">
				<img src="{{ theme_folder_url('/images/themes.png') }}">
				<h4>Themes</h4>
				<p>Fully configurable themes. Choose from a few starter themes to begin configuring to make it your own.</p>
			</div>

		</div>
	</div>
</div>

<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 156" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg{fill:#1683FB;}
	</style>
	<g id="wave" fill-rule="nonzero">
        <path class="wave-svg" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#0069FF" opacity="0.519587054"></path>
        <path class="wave-svg" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#0069FF" opacity="0.347991071"></path>
        <path class="wave-svg" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<div id="testimonials">
	<div class="uk-container uk-margin-small-top">
		<h2>Example Testimonials</h2>
		<p class="uk-text-center uk-margin-remove-top">Here are some example testimonials that you can configure for your SAAS</p>

			<div class="uk-position-relative uk-visible-toggle uk-dark" uk-slider="autoplay: true;">
				<ul class="uk-slider-items uk-child-width-1-1">
			        <li class="testimonial uk-text-center">
			            <img src="{{ theme_folder_url('/images/testimonial-1.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Scottie Harp</p>
						<blockquote uk-slider-parallax="x: 100,-100">Using Wave I was able to build the SAAS of my dreams. It was so easy to get started and customize. Now, I'm living off of the income that my Software as a Service has generated.</blockquote>
			        </li>
			        <li class="testimonial uk-text-center">
			            <img src="{{ theme_folder_url('/images/testimonial-2.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Josh Hudson</p>
						<blockquote uk-slider-parallax="x: 100,-100">Creating a Software as a Service is now easier than ever with Wave.<br> I was able to save my development team hundreds of hours of work!</blockquote>
			        </li>
			        <li class="testimonial uk-text-center">
			            <img src="{{ theme_folder_url('/images/testimonial-3.jpg') }}" alt="Testimonial 1" uk-slider-parallax="x: 200,-200">
			            <p uk-slider-parallax="x: 200,-200">Jim Fullerton</p>
						<blockquote uk-slider-parallax="x: 100,-100">I wish I had known about Wave sooner! It's the best solution for creating the Software as a Service of your dreams.</blockquote>
			        </li>
			    </ul>

		    	<a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    			<a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
            	<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
	</div>
</div>

<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
	<style type="text/css">
		.wave-svg-light{fill:#f9f9fc;}
	</style>
	<g id="wave" transform="translate(720.000000, 75.000000) scale(1, -1) translate(-720.000000, -75.000000) " fill-rule="nonzero">
        <path class="wave-svg-light" d="M694,94.437587 C327,161.381336 194,153.298248 0,143.434189 L2.01616501e-13,44.1765618 L1440,27 L1440,121 C1244,94.437587 999.43006,38.7246898 694,94.437587 Z" id="Shape" fill="#0069FF" opacity="0.519587054"></path>
        <path class="wave-svg-light" d="M686.868924,95.4364002 C416,151.323752 170.73341,134.021565 1.35713663e-12,119.957876 L0,25.1467017 L1440,8 L1440,107.854321 C1252.11022,92.2972893 1034.37894,23.7359827 686.868924,95.4364002 Z" id="Shape" fill="#0069FF" opacity="0.347991071"></path>
        <path class="wave-svg-light" d="M685.6,30.8323303 C418.7,-19.0491687 170.2,1.94304528 0,22.035593 L0,118 L1440,118 L1440,22.035593 C1252.7,44.2273621 1010,91.4098622 685.6,30.8323303 Z" id="Shape" fill="url(#linearGradient-1)" transform="translate(720.000000, 59.000000) scale(1, -1) translate(-720.000000, -59.000000) "></path>
    </g>
</svg>

<div id="pricing">
	<div class="uk-container">
		<h2 class="uk-margin-top-large">Example Pricing</h2>
		<p class="uk-text-center uk-margin-remove-top uk-margin-medium-bottom">It's easy to customize the pricing of your Software as a Service</p>

		@php $plans = Wave\Plan::all() @endphp
		<div class="uk-child-width-1-{{ count($plans) }}@m uk-grid-small uk-grid-match" uk-grid>
	 	    @foreach($plans as $plan)
		    	@php $features = explode(',', $plan->features); @endphp
		    	<div>
			        <div class="uk-card uk-card-default uk-card-body uk-card-plan @if($plan->default){{ 'selected' }}@endif">
			            <h3 class="uk-card-title uk-text-center">{{ $plan->name }}</h3>
			            <p class="uk-text-center uk-text-muted">{{ $plan->price }}</p>
			            <ul class="uk-padding-remove-left uk-text-center uk-list">
			            	@foreach($features as $feature)
			            		<li><span class="uk-margin-small-right" uk-icon="check"></span> {{ $feature }}</li>
			            	@endforeach
			            </ul>
			            <div class="uk-text-center">
			            	<a class="uk-button uk-button-primary" href="{{ theme('home_cta_url') }}">Select Plan</a>
			            </div>
			        </div>
			    </div>
	 		@endforeach
	 	</div>

	 	<p class="uk-text-center uk-margin-medium"><span class="uk-margin-small-right" uk-icon="settings"></span> All plans are fully configurable in the Admin Area.</p>

	</div>
</div>

@endsection