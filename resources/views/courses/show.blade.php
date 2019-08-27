@extends('layouts.generic')

@section('content')
    <div class="container" style="padding:50px 0px">
        <div class="col-12 text-center">
            <h1 class="display-4">{{ $course->course_title }}</h1>
            <h4>Difficulty: {{ $course->course_difficulty }}</h4>
            
            {!! $course->embed_url !!}
            <div>
               <h5>Description:</h5> 
                {{ $course->course_description }}
            </div>
        </div>
        <div>
            @if($course->has('lessons'))
                @foreach($course->lessons->all() as $lesson)
                <div class="card my-5">
                        <div class="row no-gutters">
                          <div class="col-md-6">
                                {!!  $lesson->lesson_video !!}
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <h5 class="card-title">{{ $lesson->lesson_title }}</h5>
                              <p class="card-text">
                                {{ $lesson->lesson_description }}
                            </p>
                              {{--  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>  --}}
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
            @endif
        </div>
        {{--  <div class="col-3">
            
        </div>  --}}
    </div>
@endsection 
    