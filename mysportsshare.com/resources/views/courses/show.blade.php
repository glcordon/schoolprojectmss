@extends('layouts.generic')

@section('content')

@can('edit', $course)
<div><a href="/courses/{{ $course->id }}/create">Edit</a></div>
@endcan    
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
        <div class="container">
          <h1>Bootstrap 4 Vertical Nav Tabs</h1>
        <hr>
        <div class="row">
          <div class="col-md-2 mb-3">
              <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
      </ul>
          </div>
          <!-- /.col-md-4 -->
              <div class="col-md-10">
            <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h2>Home</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <h2>Profile</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
        </div>
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
    