@extends('layouts.generic')

@section('content')
    <div class="container" style="padding:50px 0px">
        <iframe src="{{ $course->course_intro_video }}"
        width="560" height="315" frameborder="0" allowfullscreen></iframe>
    </div>
@endsection 
    