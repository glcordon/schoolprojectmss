@extends('layouts.generic')

@section('content')
@dump($courses)
    <div class="container" style="padding:50px 0px">
        <h2>{{ isset(Session::get('tenant')->site_name) ? Session::get('tenant')->site_name : "My Sports Share" }}</h2>
        <div class="d-flex flex-wrap" id="courses">
            @foreach($courses as $course)
                @include('courses.partials.course-card')
            @endforeach
        </div>
    </div>
@endsection
    