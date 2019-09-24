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
       {{--  @dump($course)  --}}
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
          <li class="nav-item" id="myStopClickButton">
            <a class="nav-link" id="lesson_{{ $loop->count }}-tab" data-toggle="tab" href="#lesson_{{ $loop->count }}" role="tab" aria-controls="lesson_{{ $loop->count }}" aria-selected="false">
                <span class="fa-stack">
                    <!-- The icon that will wrap the number -->
                    <span class="fa fa-circle-o fa-stack-2x"></span>
                    <!-- a strong element with the custom content, in this case a number -->
                    <strong class="fa-stack-1x">
                        <strong>{{ $loop->count }} </strong>
                    </strong>
                </span>
                {{ $lesson->lesson_title }}
            </a>
          </li>
          @endforeach
        @endif
        <li class="nav-item">
            <a class="nav-link " id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="true">Quiz</a>
          </li>
          
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
        <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
        <h2>Quiz</h2>
          @foreach($course->quiz->questions as $question)
            <div class="card my-3">
              <div class="card-header">{{ $loop->iteration }}. {{ $question->question_text }}</div>
              <div class="card-body">
                <ol>
                @foreach(collect($question->answers)->shuffle() as $answers)
                
                  <li> 
                    <input type="radio" radiogroup="answer_question_{{ $question->id }}" name="answer_question_{{ $question->id  }}" id="answer_{{ $answers->id }}question_{{ $loop->iteration }}"> 
                    <label for="answer_{{ $answers->id }}question_{{ $loop->iteration }}">{{ $answers->answer_text }} - {{ $answers->is_correct }}</label>
                  </li>
                
                
                @endforeach
                </ol>
              </div>
            </div> 
          @endforeach
        </div>
      </div>
          </div>
          <!-- /.col-md-8 -->
        </div>
        
        
        
      </div>
      <!-- /.container -->
    </div>
    <script>
        $('.player').click(function(){
          $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        });
    </script>
@endsection 
    