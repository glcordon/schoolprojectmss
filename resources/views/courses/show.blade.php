@extends('layouts.generic')

@section('content')
    <div class="container" style="padding:50px 0px">
        <h1>{{ $course->course_title }}</h1>
        <iframe src="{{ $course->course_intro_video }}"
        width="560" height="315" frameborder="0" allowfullscreen></iframe>
        <div>
            {{ $course->course_description }}
        </div>
    </div>
@endsection 
    