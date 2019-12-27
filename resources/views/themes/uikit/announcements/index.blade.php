@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav uk-margin-bottom">
        <div class="uk-container">
            <ul class="uk-breadcrumb">
                <li><span>Announcements</span></li>
            </ul>
        </div>
    </div>

    <div class="uk-container uk-container-small">

        <h1>Announcements</h1>

        <dl class="uk-description-list">

            @foreach($announcements as $announcement)

                <dt><a href="{{ route('wave.announcement', $announcement->id) }}">{{ $announcement->title }}</a></dt>
                 <dd>{{ $announcement->description }}</dd>

            @endforeach

        </dl>

    </div>

@endsection