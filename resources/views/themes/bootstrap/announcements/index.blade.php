{{-- Updated for Bootstrap --}}
@extends('theme::layouts.app')

@section('content')

    <div class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li><span>Announcements</span></li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <h1 class="mt-4">Announcements</h1>

                <dl class="uk-description-list pt-4 pb-4">

                    @foreach($announcements as $announcement)

                        <dt><a href="{{ route('wave.announcement', $announcement->id) }}">{{ $announcement->title }}</a></dt>
                         <dd>{{ $announcement->description }}</dd>

                    @endforeach

                </dl>

            </div>
        </div>
    </div>

@endsection