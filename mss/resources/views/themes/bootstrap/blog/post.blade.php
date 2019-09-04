{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wave.blog') }}">Blog</a></li>
                <li class="breadcrumb-item"><a href="{{ route('wave.blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                <li class="breadcrumb-item"><span>{{ $post->title }}</span></li>
            </ol>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-10 offset-md-1">

                <article id="post-{{ $post->id }}" class="upost-{{ $post->id }} mt-4 post">

                    <meta property="name" content="{{ $post->title }}">
                    <meta property="author" typeof="Person" content="admin">
                    <meta property="dateModified" content="{{ Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}">
                    <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">

                    <img width="1200" height="640" src="{{ $post->image() }}" alt="{{ $post->title }}" class="img-fluid">

                    <div class="text-center mt-3 mb-4">
                        <h1 class="article-title">{{ $post->title }}</h1>
                        <p class="article-meta">Written on <time datetime="{{ Carbon\Carbon::parse($post->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>. Posted in <a href="{{ route('wave.blog.category', $post->category->slug) }}" rel="category">{{ $post->category->name }}</a>.</p>
                    </div>

                    <div class="uk-container uk-container-small uk-text-left">

                        {!! $post->body !!}

                    </div>

                    @include('theme::partials.comments')


                </article>

            </div>
        </div>

    </div>

@endsection