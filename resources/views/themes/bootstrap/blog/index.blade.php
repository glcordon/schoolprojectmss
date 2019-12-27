{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

@if(!Request::is('blog'))
	<div class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
            	<li class="breadcrumb-item"><a href="{{ route('wave.blog') }}">Blog</a></li>
                @if(isset($category))
                	<li class="breadcrumb-item"><span>{{ $category->name }}</span></li>
                @endif
            </ol>
        </div>
    </div>
@endif

<div class="container">

	<div class="text-center mt-3 mb-4">
		<h1 class="mb-0">Our Awesome Blog</h1>
		<ul class="nav justify-content-center">
			<li class="nav-item"><a href="#" class="nav-link disabled">Categories:</a></li>
			<li class="divider">/</li>
			@foreach($categories as $cat)
				<li class="@if(isset($category) && isset($category->slug) && ($category->slug == $cat->slug)){{ 'active' }}@endif nav-item"><a href="{{ route('wave.blog.category', $cat->slug) }}" class="nav-link">{{ $cat->name }}</a></li>
				@if(!$loop->last)
					<li class="divider">/</li>
				@endif
			@endforeach
		</ul>
	</div>


	<div class="row">
		@foreach($posts as $post)

			<div class="col-lg-4 col-md-6 col-sm-12 mb-5">

				<article id="post-{{ $post->id }}" typeof="Article">

					<meta property="name" content="{{ $post->title }}">
					<meta property="author" typeof="Person" content="admin">
					<meta property="dateModified" content="{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}">
					<meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">

					<div class="card" style="width: 18rem;">
						<a href="{{ $post->link() }}"><img class="card-img-top" src="{{ $post->image() }}" alt="{{ $post->title }}"></a>
						<div class="card-body">
							<h5 class="card-title text-truncate mb-1"><a href="{{ $post->link() }}">{{ $post->title }}</a></h5>
							<small><time datetime="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>. Posted in <a href="{{ route('wave.blog.category', $post->category->slug) }}" rel="category">{{ $post->category->name }}</a>.</small>
							<p class="card-text mt-2">{{ substr(strip_tags($post->body), 0, 80) }}@if(strlen(strip_tags($post->body)) > 200){{ '...' }}@endif</p>
							<a href="{{ $post->link() }}" class="btn btn-primary">Continue Reading</a>
						</div>
					</div>

				</article>
			</div>

		@endforeach
	</div>


	<ul class="uk-pagination uk-margin-large uk-flex-center">
		{{ $posts->links() }}
	</ul>
</div>

@endsection