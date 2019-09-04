@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav uk-margin-bottom">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('wave.blog') }}">Blog</a></li>
                <li><a href="{{ route('wave.blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                <li><span>{{ $post->title }}</span></li>
            </ul>
        </div>
    </div>

    <div class="uk-container uk-container-small">
        <article id="post-{{ $post->id }}" class="uk-article post-{{ $post->id }} uk-text-center uk-margin-large-bottom">
            
            <meta property="name" content="{{ $post->title }}">
            <meta property="author" typeof="Person" content="admin">
            <meta property="dateModified" content="{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}">
            <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">
            
            <div class="uk-margin-large-bottom">
                <img width="1200" height="640" src="{{ $post->image() }}" alt="{{ $post->title }}" srcset="{{ $post->image() }}">
            </div>
            
            <div class="uk-margin-medium-bottom uk-container uk-container-small uk-text-center">    
                <h1 class="uk-article-title uk-margin-remove-top">{{ $post->title }}</h1>
                <p class="uk-article-meta">Written on <time datetime="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>. Posted in <a href="{{ route('wave.blog.category', $post->category->slug) }}" rel="category">{{ $post->category->name }}</a>.</p>       
            </div>
                
            <div class="uk-container uk-container-small uk-text-left">
                
                {!! $post->body !!}
                
            </div>

            @include('theme::partials.comments')

            
        </article>
    </div>

@endsection