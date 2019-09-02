@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav uk-margin-bottom">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('wave.announcements') }}">Announcements</a></li>
                <li><span>{{ $announcement->title }}</span></li>
            </ul>
        </div>
    </div>

    <div class="uk-container uk-container-small">
        <article id="announcement-{{ $announcement->id }}" class="uk-article post-{{ $announcement->id }} uk-text-center uk-margin-large-bottom">

            <meta property="name" content="{{ $announcement->title }}">
            <meta property="author" typeof="Person" content="admin">
            <meta property="dateModified" content="{{ Carbon\Carbon::parse($announcement->updated_at)->toIso8601String() }}">
            <meta class="uk-margin-remove-adjacent" property="datePublished" content="{{ Carbon\Carbon::parse($announcement->created_at)->toIso8601String() }}">

            <div class="uk-margin-medium-bottom uk-container uk-container-small uk-text-center">
                <h1 class="uk-article-title uk-margin-remove-top">{{ $announcement->title }}</h1>
                <p class="uk-article-meta">Written on <time datetime="{{ Carbon\Carbon::parse($announcement->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($announcement->created_at)->toFormattedDateString() }}</time>. </p>
            </div>

            <div class="uk-container uk-container-small uk-text-left">

                {!! $announcement->body !!}

            </div>

            @include('theme::partials.comments')


        </article>
    </div>

@endsection