{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

	<div class="container mt-4">

		<div class="row">
			<div class="col-lg-6 col-md-12 mb-3">

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-2 text-center mr-0">
								<i class="fa fa-smile-o card-icon"></i>
							</div>
							<div class="col-md-8 pl-0">
								<h5 class="card-title mb-0 mt-2">Welcome to your Dashboard</h5>
								<p>Learn More Below</p>
							</div>
						</div>
						<p class="card-text py-3">This is your application <a href="#">dashboard</a> you can customize this view inside of the <code>{{ theme_folder('/dashboard/index.blade.php') }}</code> file.<br><br> (All themes are located inside of the <code>resources/views/themes</code> folder)</p>
						<a href="/docs" target="_blank" class="btn btn-primary">Read the docs to learn more</a>
					</div>
				</div>

			</div>
			<div class="col-lg-6 col-md-12 mb-3">

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-2 text-center mr-0">
								<i class="fa fa-play-circle-o card-icon"></i>
							</div>
							<div class="col-md-8 pl-0">
								<h5 class="card-title mb-0 mt-2">Learn more about Wave</h5>
								<p>Are you more of a visual learner?</p>
							</div>
						</div>
						<p class="card-text py-3">Make sure to head on over to the Wave Video Tutorials to learn more how to use and customize Wave.<br><br>Click on the button below to checkout the video tutorials.</p>
						<a href="https://devdojo.com/series/wave" target="_blank" class="btn btn-primary">Watch the Videos</a>
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection