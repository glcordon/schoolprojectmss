@extends('layouts.generic')

@section('content')
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
      background-color: #333;
    }
    a.nav-link{color:black}
</style>
@can('edit', $course)
<div class="jumbotron-fluid" style="min-height:24vh; background:black; color:white">
  <a href="/courses/{{ $course->id }}/create">Edit</a>
  <div class="container text-center py-5" style="color:white">
      <h1>{{ $course->course_title }}</h1> <h4>Difficulty: {{ $course->course_difficulty }}</h4>
    <hr>
  </div>
</div>
@endcan    
<div class="container" style="padding:50px 0px">
       {{--  @dump($course)  --}}
        <div class="container">
        <div class="row">
          <div class="col-md-4 mb-3">
              <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
        <li class="nav-item border border-dark rounded">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Intro</a>
        </li>
        @if($course->has('lessons'))
          @foreach($course->lessons->all() as $lesson)
          <li class="nav-item border border-dark rounded my-1" id="myStopClickButton">
            <a class="nav-link" id="lesson_{{ $loop->count }}-tab" data-toggle="tab" href="#lesson_{{ $loop->count }}" role="tab" aria-controls="lesson_{{ $loop->count }}" aria-selected="false">
                
                {{ $lesson->lesson_title }}
            </a>
          </li>
          @endforeach
        @endif
        @if($course->quiz->questions->count())
        <li class="nav-item ">
            <a class="nav-link border border-dark rounded" id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="true">Quiz</a>
          </li>
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
        @if($course->quiz->questions->count())
        <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
        <h2>Quiz</h2>
          @foreach($course->quiz->questions as $question)
            <div class="card my-3">
              <div class="card-header">{{ $loop->iteration }}. {{ $question->question_text }}</div>
              <div class="card-body">
                <ol>
                @foreach(collect($question->answers)->shuffle() as $answers)
                  @continue($answers->answer_text == '')
                  <li> 
                    <input type="radio" radiogroup="answer_question_{{ $question->id }}" name="answer_question_{{ $question->id  }}" id="answer_{{ $answers->id }}question_{{ $loop->iteration }}"> 
                    <label for="answer_{{ $answers->id }}question_{{ $loop->iteration }}">{{ $answers->answer_text }} - {{ $answers->is_correct }}</label>
                  </li>
                @endforeach
                </ol>
              </div>
            </div> 
          @endforeach
          
            Submit Quiz
          
        </div>
        @endif
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
    