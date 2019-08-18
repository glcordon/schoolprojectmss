@extends('layouts.generic')

@section('content')
<div class="container" style="padding:50px 0px">
    <h1>Add/Edit Course</h1>
    <form method="POST" action="/create-event" accept-charset="UTF-8" enctype="multipart/form-data" class="ajax gf"><input name="_token" type="hidden" value="{{ csrf_token()}}">
        
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title" class="control-label required">Course Title</label>
                                <input class="form-control" value="{{ $course->course_title ?? '' }}" placeholder="My Course Title" name="course-title" type="text" id="title">
                            </div>
    
                            <div class="form-group custom-theme">
                                <label for="description" class="control-label required">Course Description</label><br />
                                <textarea class="form-control  editable" rows="5" name="course-description" cols="50" id="course-description" >{{ $course->course_description ?? '' }}</textarea>
                            </div>
                            <div class="row">
                                
                            </div>
                            
                    
            </div>
            <div class="col-md-3" style="background-color:#eee; border:1px solid #aaa">
                <div class="form-group">
                    <label for="category" class="control-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select</option>
                        
                        {{--  @foreach ($categories->all() as $category )
                        <option value="{{ $category['id'] }}" {{ $category == $category['id ']? 'selected' : '' }}>{{$category['name']}}</option>
                            
                        @endforeach  --}}
                    </select>
                    <br>
                    <label for="course_difficulty">Difficulty</label>
                    <select name="course_difficulty" id="course_difficulty" class="form-control" required>
                        <option value="">Select One</option>
                        <option value="novice" {{ isset($course) ? $course->course_difficulty = 'novice' ? 'selected' : '' : ''}}>Novice</option>
                        <option value="intermediate" {{ isset($course) ? $course->course_difficulty = 'intermediate' ? 'selected' : '' : ''}}>Intermediate</option>
                        <option value="pro" {{ isset($course) ? $course->course_difficulty = 'pro' ? 'selected' : '' : ''}}>pro</option>
                        <option value="expert" {{ isset($course) ? $course->course_difficulty = 'expert' ? 'selected' : '' : ''}}>expert</option>
                    </select>
                    <br>
                    <button id="add_course_button" class="col-12">Add New Lesson</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="add_course"></div> 
            </div>
        </div>
            <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
            <input class="btn btn-success" type="submit" value="Create course">
                
    </form>
</div>
    <script>
        $(document).ready(function(){
            let count = 1
            $('#add_course_button').on('click', function(e){
                e.preventDefault();
                
                var course_div = `<div class="col-12 border border-dark my-3 p-2" style="padding:20px 10px" >
                    <span id="remove_course_div"><i class="fas fa-minus-square"></i><h4></span> Add Lesson ${count}</h4>
                <input type="text" placeholder="Course Title" value="" name="course_name[]" class="form-control">
                <input type="text" placeholder="Course Video" value="" name="course_video[]" class="form-control my-2">
                <textarea name="course_description[]" class="form-control"></textarea>
                </div> `
                $('#add_course').append(course_div);
                count +=1
            });
            $(document).on('click', '#remove_course_div', function(){
                if(confirm('You Are about to Delete this lesson'))
                {
                    $(this).parent().remove() 
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
    