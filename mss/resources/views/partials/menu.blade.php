<style>
                .navbar-dark .navbar-nav .nav-link {
                        color: rgba(255,255,255,1);
                    }
</style>
<nav class="navbar navbar-dark bg-dark" style="background-color:black !important">
                <a href="{{ url('/') }}"><img src="{{ theme('logo') }}" alt="" style="width:auto"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    {{--  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/courses') }}">View All Courses <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/courses/create">Add New Course</a>
                    </li>  --}}
                    <li class="nav-item dropdown">
                      {{--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Courses
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">  --}}
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item"> 
                                <a class="nav-link"  href="{{ url('/courses') }}">View All Courses</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link"  href="/courses/create" class="btn btn-primary btn-sm mx-1">Add New Course</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link"  href="{{ url('/my-profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                        </li>
                      {{--  </div>  --}}
                    @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
            

                 @endif
                  </ul>
                  
                </div>
              </nav>
    {{--  <div class="topnav align-items-center" id="myTopnav">
                <a href="{{ url('/') }}"><img src="{{ asset('img/mss-logo.png')"alt=""></a> }}
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
              </div>  --}}
