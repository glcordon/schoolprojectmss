<div class="row">
        <div class="topbar col-md-12" style="background-color:#000; padding:5px 10px;" >
        <div class="col-md-6"><a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/mss-logo.png')}}" alt=""> </a></div>
        <div class="col-md-6 top-right links">
                <ul class="nav justify-content-end">
                        <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/courses') }}"><li class="nav-item">View All Courses</a>

                        </li>
                        @if (Route::has('login'))
        
            @auth
            <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/my-profile') }}"><li class="nav-item">{{ Auth::user()->name }}</a>
            </li> 
           <li class="nav-item">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add New Event</button>
            </li>
            <li class="nav-item">
                <a href="/courses/create" class="btn btn-primary btn-sm mx-1">Add New Course</a>
            </li>
            @else
            <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
            

                 @endif
                      </ul>
        </div>

    </div>
    </div>