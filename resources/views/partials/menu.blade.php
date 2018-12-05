<div class="row">
        <div class="topbar col-md-12" style="background-color:#036; padding:5px 10px;" >
        <div class="col-md-6"><a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/mss-logo.png')}}" alt=""> </a></div>
        <div class="col-md-6 top-right links">
                <ul class="nav justify-content-end">
                        @if (Route::has('login'))
        
            @auth
            <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/home') }}">Dashboard</a>
            </li>
            @else
            <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
            <li class="nav-item">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Add New</button>
            </li>
    @endif
                      </ul>
        </div>

    </div>
    </div>