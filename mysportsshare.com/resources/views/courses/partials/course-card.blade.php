
    <div class="card mx-2" style="text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
@dump($course->site)
        <a href="/courses/show/{{ $course['id'] }}">
            @if($course['course_image'])
            <img class="card-img" src="{{ Storage::url($course['course_image'])  ?? asset('img/baseball-field.jpg') }}" alt="Card image cap" >
            @else
            <img class="card-img" src="{{ asset('img/baseball-field.jpg') }}" alt="Card image cap" >

            @endif
        </a>
        <div class="card-body">
            <h4 class="card-title">{{ $course['course_title'] }}</h4>
        </div>  
        <div class="card-footer">
            <a href="/courses/show/{{ $course['id'] }}" class="card-link btn btn-primary pull-right col-md-12">View Course</a>
            @can('edit', \App\Course::first())
                <div class="d-flex justify-content-between col-12 px-0 py-1">
                    <div><a href="/courses/{{ $course['id'] }}/create" class="btn btn-warning">Edit</a></div>
                    <div><a href="/courses/{{ $course['id'] }}/delete" class="btn btn-danger"  onclick="return confirm('Are you sure?')">Delete</a></div>
                </div>
            @endcan
        </div>
    </div>  