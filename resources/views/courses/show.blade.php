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
       @if (session('message'))
            <div class="alert alert-success">
                Your Quiz Results {{ session('message') }}
            </div>
        @endif
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
            <a class="nav-link" id="lesson_{{ $loop->iteration }}-tab" data-toggle="tab" href="#lesson_{{ $loop->iteration }}" role="tab" aria-controls="lesson_{{ $loop->count }}" aria-selected="false">
                
                {{ $lesson->lesson_title }}
            </a>
          </li>
          @endforeach
        @endif
        @if($course->quiz && $course->quiz->questions->count())
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
            <div class="tab-pane fade" id="lesson_{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lesson_{{ $loop->iteration }}-tab">
              <h2>{{ $lesson->lesson_title }}</h2>
              {!!  $lesson->lesson_video !!}    
              <p>
                <strong><small>Description:</small></strong> <br>
                {{ $lesson->lesson_description }}
              </p>        
            </div>
          @endforeach
        @endif
        @if($course->quiz && $course->quiz->questions->count())
        <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
        <h2>Quiz</h2>
        
        <form action="/courses/score-quiz" method="POST">
          {{ csrf_field() }}
          @foreach($course->quiz->questions as $question)
            <div class="card my-3">
              <div class="card-header">{{ $loop->iteration }}. {{ $question->question_text }}</div>
              <div class="card-body">
                <fieldset id="group_{{ $loop->iteration }}">
                <select size="4" name="question[]" class="form-control">
                @foreach(collect($question->answers)->shuffle() as $answers)
                  @continue($answers->answer_text == '')
                    {{--  <input type="radio" radiogroup="answer_question_{{ $question->id. '_'.$loop->iteration }}"id="answer_{{ $answers->id }}question_{{ $loop->iteration }}">   --}}
                    <option id="answer_{{ $answers->id }}question_{{ $loop->iteration }}" value="{{ $answers->id }}">{{ $answers->answer_text }}</option>
                @endforeach
                </select>
                </fieldset>
              </div>
            </div> 
          @endforeach
          <button type="submit" class="btn btn-primary">Submit Quiz</button>
            
        
        </form>
          
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
    