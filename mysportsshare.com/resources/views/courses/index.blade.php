@extends('layouts.generic')

@section('content')
    <div class="container" style="padding:50px 0px">
        <h2>{{ Session::get('tenant')->site_name }}</h2>
        <div class="d-flex flex-wrap" id="courses">
            @foreach($courses as $course)
                @include('courses.partials.course-card')
            @endforeach
        </div>
        
        
    
    </div>
@endsection
    