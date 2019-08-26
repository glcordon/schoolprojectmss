
    <div class="card mx-2" style="text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
        <a href="/view-course/{{ $course->id }}">
            <img class="card-img" src="{{ $course->course_video_thumb ?? asset('img/baseball-field.jpg') }}" alt="Card image cap" >
        </a>
        <div class="card-body">
            
            <h4 class="card-title">{{$course->course_title}}</h4>
        </div>  
        <div class="card-footer">
            <a href="/view-course/{{ $course->id }}" class="card-link btn btn-primary pull-right col-md-12">View Course</a>
        </div>
    </div>  