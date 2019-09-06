@extends('theme::layouts.app')

@section('content')

<div id="border-top"></div>
@if(!Request::is('blog'))
<div class="breadcrumb-nav uk-margin-bottom">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('wave.blog') }}">Blog</a></li>
                @if(isset($category))
                	<li class="uk-disabled"><span>{{ $category->name }}</span></li>
                @endif
            </ul>
        </div>
    </div>
@endif
<div class="uk-container uk-container-small">

	<div class="uk-text-center uk-margin-large-bottom uk-margin-medium-top">
		<h1 class="uk-heading-line"><span>Our Awesome Blog</span></h1>
		<ul class="uk-subnav uk-subnav-divider" uk-margin>
			<li class="first-cat">Categories:</li>
			@foreach($categories as $cat)
				<li class="@if(isset($category) && isset($category->slug) && ($category->slug == $cat->slug)){{ 'uk-active' }}@endif"><a href="{{ route('wave.blog.category', $cat->slug) }}">{{ $cat->name }}</a></li>
			@endforeach
		</ul>
	</div>


	<div class="uk-text-left" uk-grid>
		@foreach($posts as $post)

			<div class="uk-width-1-2@s uk-width-1-3@l">
				<article id="post-{{ $post->id }}" class="uk-article uk-margin-medium-bottom" typeof="Article">

					<meta property="name" content="{{ $post->title }}">
					<meta property="author" typeof="Person" content="admin">
					<meta property="dateModified" content="{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}">
					<meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">

					<div class="uk-margin-bottom">
						<a href="{{ $post->link() }}"><img width="1200" height="800" src="{{ $post->image() }}" alt="{{ $post->title }}" srcset="{{ $post->image() }}"></a>
					</div>

					<div class="uk-margin-bottom uk-container uk-container-small">

						<h2 class="uk-article-title uk-margin-remove-top"><a class="uk-link-reset" href="{{ $post->link() }}">{{ $post->title }}</a></h2>

						<p class="uk-article-meta">Written on <time datetime="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>. Posted in <a href="{{ route('wave.blog.category', $post->category->slug) }}" rel="category">{{ $post->category->name }}</a>.</p>

					</div>

					<div class="uk-container uk-container-small">

						<div property="text">
							<p>{{ substr(strip_tags($post->body), 0, 200) }}@if(strlen(strip_tags($post->body)) > 200){{ '...' }}@endif</p>
						</div>

						<p class="uk-margin-medium">
							<a class="uk-button uk-button-text" href="{{ $post->link() }}">Continue reading</a>
						</p>
					</div>

				</article>
			</div>

		@endforeach
	</div>


	<ul class="uk-pagination uk-margin-large uk-flex-center">
		{{ $posts->links() }}
		<!--li class="uk-active"><span aria-current="page" class="page-numbers current">1</span></li>
		<li><a class="page-numbers" href="https://demo.yootheme.com/themes/wordpress/2017/copper-hill/?paged=2&amp;page_id=92">2</a></li>
		<li><a class="next page-numbers" href="https://demo.yootheme.com/themes/wordpress/2017/copper-hill/?paged=2&amp;page_id=92"><span uk-pagination-next="" class="uk-pagination-next uk-icon"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" ratio="1"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li-->
	</ul>
</div>

@endsection