@extends('layouts.generic')

@section('content')
<div class="container" style="padding:50px 0px; min-height:70vh">
    <a href="/courses/show/{{ $course->id }}">Preview</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>Add/Edit Course</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="active"><a class="nav-link active" id="intro-tab" data-toggle="tab" href="#intro" role="tab" aria-controls="intro" aria-selected="true">Intro</a></li>
        <li><a class="nav-link" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab" aria-controls="lessons" aria-selected="false">Lessons</a></li>
        <li><a class="nav-link" id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="false">Quiz </a></li>
    </ul>
     <form method="POST" action="/create-course/{{ $course->id ?? '' }}/store" accept-charset="UTF-8" enctype="multipart/form-data" class="ajax gf">
        <input type="hidden" name="courseId" id="courseId" value="{{ $course->id }}">
        <div class="tab-content">
        <div class="tab-pane fade show active" id="intro" role="tabpanel" aria-labelledby="intro-tab">
           <input name="_token" type="hidden" value="{{ csrf_token()}}">
            <input type="hidden" name="id" value="{{ $course->id ?? '' }}">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="title" class="control-label required">Course Title</label>
                                    <input class="form-control" value="{{ old('course_title') ?? $course->course_title  }}" placeholder="My Course Title" name="course_title" type="text" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="course_intro_video" class="control-label required">Course Intro Video</label>
                                    <input class="form-control" value="{{ $course->course_intro_video ?? '' }}" placeholder="My Course Intro Video" name="course_intro_video" type="text" id="course_intro_video">
                                </div>
                                <div class="form-group">
                                    <label for="course_intro_video" class="control-label required">Course Intro Thumbnail</label>
                                    <input class="form-control" value="{{ $course->course_image ?? '' }}" accept="image/*" placeholder="My Course Intro Thumb" name="course_intro_thumb" type="file" id="course_intro_thumb">
                                    @if($course->course_image)
                                        <img src="{{ Storage::url($course->course_image) }}" width="200px">
                                    @endif
                                </div>
                    
                                <div class="form-group custom-theme">
                                    <label for="description" class="control-label required">Course Description</label><br />
                                    <textarea class="form-control  editable" rows="5" name="course_description" cols="50" id="course-description" >{{ $course->course_description ?? '' }}</textarea>
                                </div>
                                <div class="row">
                                    
                                </div>
                                
                        
                </div>
                <div class="col-md-3" style="background-color:#eee; border:1px solid #aaa">
                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select</option>
                            
                            @foreach ($categories->all() as $category )
                            <option value="{{ $category['id'] }}" {{ $category['id']   == $course->category ? 'selected' : '' }}>{{$category['name']}}</option>
                                
                            @endforeach
                        </select>
                        <br>
                        <label for="course_difficulty">Difficulty</label>
                        <select name="course_difficulty" id="course_difficulty" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="novice"   {{ $course->course_difficulty == 'novice' ? 'selected' : '' }}>Novice</option>
                            <option value="intermediate"   {{ $course->course_difficulty == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="pro"   {{ $course->course_difficulty == 'pro' ? 'selected' : '' }}>pro</option>
                            <option value="expert"   {{ $course->course_difficulty == 'expert' ? 'selected' : '' }}>expert</option>
                        </select>
                        <br>
                    </div>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="lessons" role="tabpanel" aria-labelledby="lessons-tab">
            <div class="row">
                <div class="col-12">
                    @if($course->has('lessons'))
                        @foreach($course->lessons->all() as $lesson)
                        <div class="col-12 border border-dark my-3 p-2" style="padding:20px 10px" >
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index }}">
                                            <span class="fas fa-minus-square"></span> 
                                        </button>
                                        <button id="remove_course_div" lesson_id="{{ $lesson->id }}"><i class="fas fa-times-circle" style="color:red"></i></button> 
                                    
                                    </div>
                                    <div id="collapse{{ $loop->index }}" class="collapse show" aria-labelledby="collapse{{ $loop->index }}">
                                        <h4>Add Lesson</h4>
                                        <label>Lesson Title</label>
                                        <input type="hidden" name="lesson_id[]" value="{{ $lesson->id }}">
                                        <input type="text" id="lesson_title_field" placeholder="Lesson Title" value="{{ $lesson->lesson_title ?? '' }}" name="lesson[]" class="form-control my-2" />
                                        {{--  <select id="video_insert_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="upload">Upload</option>
                                            <option value="embed">Embed</option>
                                        </select>  --}}
                                        {{--  <input type="file" id="upload_lesson_video" placeholder="Lesson Video"  value="https://mysporsshare.com" name="lesson_video_upload[]" class="my-2 col-12">  --}}
                                        <label>Lesson Video</label>
                                        <input type="text" placeholder="Lesson Video" id="embed_lesson_video" value="{{ $lesson->embed_url ?? '' }}" name="lesson_video[]" class="form-control my-2 col-12">
                                        Lesson Description
                                        <textarea name="lesson_description[]" class="form-control">{{ $lesson->lesson_description ?? '' }}</textarea>
                                    </div>
                            </div> 
                        @endforeach
                    @endif
                    <div id="add_course"></div> 
                    
                </div>
            </div>
                <button id="add_course_button" class="col-12 pb-2 pt-2 mt-2 mb-2">Add New Lesson</button>
        </div>

    </form>
        <div  class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
           <div id="quizSection">
                <h2>Quiz</h2>
                <small><em>
                    (always make the first answer the correct one... the system will shuffle the answers)<br />
                </em></small> 
                @if($course->quiz->questions->count() > 0)
                @foreach($course->quiz->questions as $question)
                <div class="mt-3 mb-3 p-3" style="border:1px solid #ccc">
                        <label>Question</label>
                        <input type="text" id='question' class="form-control" value="{{ $question->question_text ?? '' }}" placeholder="Question">
                        <input type="hidden" name="thisQuestion" value="{{ $question->id ?? ''}}">
                        <hr>
                        <label>Correct Answer:</label>
                        @foreach(collect($question->answers) as $answers)
                        {{--  @continue($answers->answer_text == '')  --}}
                        <input type="text" id="answer" value="{{ $answers->answer_text ?? '' }}" class="form-control my-sm-1" placeholder="Answer"><br />
                        @endforeach
                     <button id="updateQuestion">Update Question</button> <button id="deleteQuestion" data-id="{{ $question->id ?? '' }}"><span class="fas fa-trash-o"></span></button>
                    </div>
                @endforeach
                @endif
           </div>
           <button  class="col-12 pb-2 pt-2 mt-2 mb-2" id="addQuestion">Add Question <span class="fas fa-plus"></span></button>
        </div>
                <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
                <input class="btn btn-success" type="submit" value="Create course">
        
        </div>
</div>
<script>
        $(document).ready(function(){
            let count = 0;
            $('#addQuestion').on('click', function(e){
                count++;
                e.preventDefault();
                var quizDiv = `
                    <div class="mt-3 mb-3 p-3" style="border:1px solid #ccc">
                        <label>Question</label>
                        <input type="text" id='question' class="form-control" value=" " placeholder="Question">
                        <hr>
                        <label>Correct Answer:</label>
                        <input type="text" id="answer" class="form-control my-sm-1" placeholder="Answer"><br />
                        <input type="text" id="answer" class="form-control my-sm-1" placeholder="Answer"><br />
                        <input type="text" id="answer" class="form-control my-sm-1" placeholder="Answer"><br />
                        <input type="text" id="answer" class="form-control my-sm-1" placeholder="Answer"><br />
                        <button id="saveQuestion">Save Question</button> <button id="deleteQuestion" data-id="{{ $course->quiz->questions->count() ? $question->id : '' }}"><span class="fas fa-trash-o"></span></button>
                    </div>
                `;
                $('#quizSection').append(quizDiv);
            })
            $(document).on('click', "#saveQuestion", function(e){
                e.preventDefault()
                var question = $(this).parent().find('#question').val() 
                if(question === ' ')
                {
                    alert('Please Add A Question Please')
                    return;
                }
                var questionArray = [];
                $(this).parent().find('input#answer').each(function(key, index){
                    questionArray.push($(this).val());
                })
                var token = '{{ csrf_token() }}'
                var id = $('#courseId').val()
                axios.post('/courses/add-question', {
                    id:id,
                    token:token,
                    answers: questionArray,
                    question: question
                })
                .then(function(response){
                    $(this).addClass('btn').addClass('btn-success')
                    console.log(response.data)
                })
                .catch(function(error){
                    console.log(error)
                })
            })
            $(document).on('click', '#deleteQuestion', function(e){
                e.preventDefault()
                var token = '{{ csrf_token() }}'
                if(confirm('You Are about to Delete this question... are you sure?'))
                {
                axios.post('/courses/delete-question', {
                    id: $(this).attr('data-id'),
                    token:token
                })
                .then(function(response){
                    return false;
                })
                $(this).parent().fadeOut()
            }else{
                return false;
            }

            })
        })
</script>
    <script>
        $(document).ready(function(){
            let count = 1
            $('#add_course_button').on('click', function(e){
                e.preventDefault();
                
                var course_div = `<div class="col-12 border border-dark my-3 p-2" style="padding:20px 10px" >
                    <div class="d-flex justify-content-between">
                         <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${count}">
                                 <span class="fas fa-minus-square"></span> 
                            </button>
                            <div id="remove_course_div"><i class="fas fa-times-circle" style="color:red"></i></div> 
                           
                        </div>
                        <input type="hidden" name="lesson_id[]" value="">
                          <div id="collapse${count}" class="collapse show" aria-labelledby="collapse${count}">
                            <h4>Add Lesson</h4>
                            <label>Lesson Title</label>
                            <input type="text" id="lesson_title_field" placeholder="Lesson Title" value="" name="lesson[]" class="form-control my-2" />
                            {{--  <select id="video_insert_type" class="form-control">
                                <option value="">Select</option>
                                <option value="upload">Upload</option>
                                <option value="embed">Embed</option>
                            </select>  --}}
                            {{--  <input type="file" id="upload_lesson_video" placeholder="Lesson Video"  value="https://mysporsshare.com" name="lesson_video[]" class="my-2 col-12">  --}}
                            <label>Lesson Video</label>

                            <input type="text" placeholder="Lesson Video" id="embed_lesson_video" value="" name="lesson_video[]" class="form-control my-2 col-12">
                            Lesson Description
                            <textarea name="lesson_description[]" class="form-control"></textarea>
                          </div>
                </div> `
                $('#add_course').append(course_div);
                count +=1
            });
            
            $(document).on('change', '#video_insert_type', function(){
                {{--  console.log($(this).children("option:selected").val())  --}}
                if($(this).children("option:selected").val() == 'upload')
                {
                    $(this).parent().find('#embed_lesson_video').hide();
                }else if($(this).children("option:selected").val() == 'embed')
                {
                    $(this).parent().find('#upload_lesson_video').hide();
                }
            });
            
            $(document).on('click', '#remove_course_div', function(e){
                e.preventDefault();
                
                

                if(confirm('You Are about to Delete this lesson'))
                {
                    $(this).parent().parent().remove()
                    var id = $(this).attr('lesson_id');
                    var token = '{{ csrf_token() }}'
                    axios.post('/lesson/delete', {
                       id:id,
                       token:token, 
                    })
                    .then(function(response){
                        console.log(response.data)
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                }else{
                    return false;
                }
               
            })
            $('#event_type').on('change', function(){
                var online = $(this).children("option:selected").val();
               if(online == 'Online')
               {
                $('#physical').fadeOut();
                $('#online').fadeIn();
               }
               else
               {
                   $('#physical').fadeIn();
                   $('#online').fadeOut();
               }
                
            });
        });
    </script>
    @endsection
    
