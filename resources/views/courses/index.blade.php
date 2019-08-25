@extends('layouts.generic')

@section('content')
    <div class="container" style="padding:50px 0px">
        <h2>Nick Duffy Golf</h2>
        @foreach($courses as $course)
          @include('courses.partials.course-card')
        @endforeach
    
    </div>
@endsection
    