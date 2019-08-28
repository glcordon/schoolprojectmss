
    <div class="card mx-2" style="text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
        <a href="/courses/show/{{ $course->id }}">
            <img class="card-img" src="{{ $course->course_video_thumb ?? asset('img/baseball-field.jpg') }}" alt="Card image cap" >
        </a>
        <div class="card-body">
            
            <h4 class="card-title">{{$course->course_title}}</h4>
        </div>  
        <div class="card-footer">
            <a href="/courses/show/{{ $course->id }}" class="card-link btn btn-primary pull-right col-md-12">View Course</a>
            
                <div class="d-flex justify-content-between col-12 px-0 py-1">
                <div><a href="/courses/{{ $course->id }}/create" class="btn btn-warning">Edit</a></div>
                <div><a href="/courses/{{ $course->id }}/delete" class="btn btn-danger"  onclick="return confirm('Are you sure?')">Delete</a></div>
        
            </div>
            
        </div>
    </div>  