<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
        <link rel="manifest" href="/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>MSS</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
         <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .m-b-xl {
                margin-bottom: 60px;
            }
            .hero{
                height:70vh;
                background-size:cover;
                color:#fff;
                background: url({{ asset('img/baseball-field.jpg') }});
            }
            .top-right.links a{color:white}
            .card-img {
                object-fit: none; /* Do not scale the image */
                object-position: center; /* Center the image within the element */
                width: 100%;
                max-height: 150px;
                margin-bottom: 1rem;
              }
            .text-divider{margin: 1em 0 1.5em; line-height: 0; text-align: left;}
            .text-divider span{background-color: #fff; padding: 0.4em;}
            .text-divider:before{ content: " "; display: block; border-top: 1px solid #e3e3e3; border-bottom: 1px solid #f7f7f7;}
        </style>
    </head>
    <body>
            @include('partials.menu')
            
        <div class="flex-center position-ref hero">
       
           
            <div class="content">
                <div class="title m-b-md">
                Discover Sports Events, Mentors &amp; Trainers
                <form action="/search" class="form-inline" method="POST">
                    {{ @csrf_field() }}
                    <input type="text" class="form-control col-md-6" placeholder="Search" name="search">
                    <select name="category" id="category" class="form-control col-md-4">
                            <option value="">Select</option>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                
                            @endforeach
                        </select>
                    <button class="btn btn-primary col-md-2">Search</button>
                </form>
                </div>
            </div>
        </div>
        <div class="content">
            
                <div class="container" style="padding-top:20px">
                    <div class="row">
                        <div class="col-md-9" style="text-align:left">
                                <h3 class="text-divider"><span>Courses</span></h3>
                        </div>
                        <div class="col-md-3"><a href="/view-all"> Browse All &raquo;</a> </div>
                    </div>
                     <div class="row" style="padding-top:10px">
                        <div class="card-deck">
                        @foreach ($events as $event )
                            @include('partials.event-card')
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                    <div class="container" style="padding-top:10px; text-align:left">
                        
                            <h3 class="text-divider"><span>Categories</h3> 
                        <div class="row" style="padding-top:40px; text-align:left">
                            <div class="card-deck">
                            @foreach ($categories as $category )
                                <a href="/category/{{$category->id}}" style="position:relative;">
                                    <div class="card bg-dark text-white"  style="align:flex;text-align:left;max-width: 22rem; min-width:18rem; margin-bottom:20px;">
                                        <img class="card-img" src="{{ Storage::url($category->image_url) }}" alt="Card image">
                                        <div class="card-img-overlay" style="align-items: center;width:100%; height:100%; background-color:rgba(0,0,0,0.5); position:absolute; top:0; left:0;">
                                            <h5 class="card-title" style="font-weight: bold; text-transform: uppercase;">
                                              <span style=" align-items: center;justify-content: center;flex-direction: column"> {{$category->category_name }}</span> 
                                            </h5>
                                            <p class="card-text"></p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @auth
           @include('events.event-create')
            @else
             Please Register first
        @endauth
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<footer style="width:100%; min-height:20vh; background-color:black; margin-bottom:0; margin-top:30px; color:#fff">
        hey
</footer>
    </body>

</html>
