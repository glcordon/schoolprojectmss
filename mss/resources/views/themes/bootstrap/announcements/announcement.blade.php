{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wave.announcements') }}">Announcements</a></li>
                <li class="breadcrumb-item"><span>{{ $announcement->title }}</span></li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">

                <article id="announcement-{{ $announcement->id }}" class="uk-article post-{{ $announcement->id }} mt-4">

                    <meta property="name" content="{{ $announcement->title }}">
                    <meta property="author" typeof="Person" content="admin">
                    <meta property="dateModified" content="{{ Carbon\Carbon::parse($announcement->updated_at)->toIso8601String() }}">
                    <meta property="datePublished" content="{{ Carbon\Carbon::parse($announcement->created_at)->toIso8601String() }}">

                    <div class="text-center">
                        <h1 class="mb-0">{{ $announcement->title }}</h1>
                        <p>Written on <time datetime="{{ Carbon\Carbon::parse($announcement->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($announcement->created_at)->toFormattedDateString() }}</time>. </p>
                    </div>

                    <div class="py-4">

                        {!! $announcement->body !!}

                    </div>

                    @include('theme::partials.comments')

                </article>

            </div>
        </div>
    </div>

@endsection