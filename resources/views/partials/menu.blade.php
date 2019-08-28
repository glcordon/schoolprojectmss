{{--  <div class="row">
        <div class="topnav col-md-12" style="background-color:#000; padding:5px 10px;" >
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
                {{ --<buttonclass="btnbtn-primarybtn-sm"data-toggle="modal"data-target="#exampleModalCenter">AddNewEvent</button> }} 
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
    </div>  --}}
    <div class="topnav align-items-center" id="myTopnav">
                <a href="{{ url('/') }}"><img src="{{asset('img/mss-logo.png')}}" alt=""> </a>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/courses') }}">View All Courses</a>
                <a href="/courses/create" class="btn btn-primary btn-sm mx-1">Add New Course</a>
                <a href="{{ url('/my-profile') }}">{{ Auth::user()->name }}</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
            

                 @endif
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>