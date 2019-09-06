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
						<p class="card-text py-3">
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
						<p class="card-text py-3"></p>
						
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection