@extends('theme::layouts.app')


@section('content')

	<div class="uk-container">


		<div class="uk-child-width-1-2@m uk-grid-match uk-margin-top" uk-grid>
			<div>

				<div class="uk-card uk-card-default">
				    <div class="uk-card-header">
				        <div class="uk-grid-small uk-flex-middle" uk-grid>
				            <div class="uk-width-auto">
				                <div uk-icon="icon: happy; ratio: 2.8" class="welcome-icon"></div>
				            </div>
				            <div class="uk-width-expand">
				                <h3 class="uk-card-title uk-margin-remove-bottom uk-blue">Welcome to your Dashboard</h3>
				                <p class="uk-text-meta uk-margin-remove-top">Learn More Below</p>
				            </div>
				        </div>
				    </div>
				    <div class="uk-card-body">
				        <p>This is your application <a href="#">dashboard</a> you can customize this view inside of the <code>{{ theme_folder('/dashboard/index.blade.php') }}</code> file.<br><br> (All themes are located inside of the <code>resources/views/themes</code> folder)</p>
				    </div>
				    <div class="uk-card-footer">
				        <a href="/docs" target="_blank" class="uk-button uk-button-text">Read the docs to learn more</a>
				    </div>
				</div>
			</div>

			<div>

				<div class="uk-card uk-card-default">
				    <div class="uk-card-header">
				        <div class="uk-grid-small uk-flex-middle" uk-grid>
				            <div class="uk-width-auto">
				                <div uk-icon="icon: play-circle; ratio: 2.8" class="welcome-learn-more-icon"></div>
				            </div>
				            <div class="uk-width-expand">
				                <h3 class="uk-card-title uk-margin-remove-bottom uk-blue"> Learn more about Wave</h3>
				                <p class="uk-text-meta uk-margin-remove-top uk-light-text">Are you more of a visual learner?</p>
				            </div>
				        </div>
				    </div>
				    <div class="uk-card-body">
				        <p>Make sure to head on over to the Wave Video Tutorials to learn more how to use and customize Wave.<br><br>Click on the button below to checkout the video tutorials.</p>
				    </div>
				    <div class="uk-card-footer">
				        <a href="https://devdojo.com/series/wave" target="_blank" class="uk-button uk-button-text">Watch the Videos</a>
				    </div>
				</div>
			</div>


		</div>

	</div>

@endsection