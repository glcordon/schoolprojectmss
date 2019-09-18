@extends('layouts.generic')

@section('content')
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
      background-color: black;
    }
    a.nav-link{color:black}
</style>
@can('edit', $course)
<div><a href="/courses/{{ $course->id }}/create">Edit</a></div>
@endcan    
<div class="container" style="padding:50px 0px">
       
        <div class="container">
          <h1>{{ $course->course_title }}</h1> <h4>Difficulty: {{ $course->course_difficulty }}</h4>
        <hr>
        <div class="row">
          <div class="col-md-4 mb-3">
              <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Intro</a>
        </li>
        @if($course->has('lessons'))
          @foreach($course->lessons->all() as $lesson)
          <li class="nav-item">
            <a class="nav-link" id="lesson_{{ $loop->count }}-tab" data-toggle="tab" href="#lesson_{{ $loop->count }}" role="tab" aria-controls="lesson_{{ $loop->count }}" aria-selected="false">
                <span class="fa-stack">
                    <!-- The icon that will wrap the number -->
                    <span class="fa fa-circle-o fa-stack-1x"></span>
                    <!-- a strong element with the custom content, in this case a number -->
                    <strong class="fa-stack-1x">
                        <strong>{{ $loop->count }} </strong>
                    </strong>
                </span> - 
                {{ $lesson->lesson_title }}
            </a>
          </li>
          @endforeach
        @endif
      </ul>
          </div>
          <!-- /.col-md-4 -->
              <div class="col-md-8">
            <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h2>Intro</h2>
        {!! $course->embed_url !!}        
        </div>
        @if($course->has('lessons'))
          @foreach($course->lessons->all() as $lesson)
            <div class="tab-pane fade" id="lesson_{{ $loop->count }}" role="tabpanel" aria-labelledby="lesson_{{ $loop->count }}-tab">
              <h2>{{ $lesson->lesson_title }}</h2>
              {!!  $lesson->lesson_video !!}    
              <p>
                <strong><small>Description:</small></strong> <br>
                {{ $lesson->lesson_description }}
              </p>        
            </div>
          @endforeach
        @endif
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <h2>Contact</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
        
        </div>
      </div>
          </div>
          <!-- /.col-md-8 -->
        </div>
        
        
        
      </div>
      <!-- /.container -->
    </div>
@endsection 
    