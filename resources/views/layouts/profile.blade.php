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
         <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
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
                text-align: leftf;
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
                height:40vh;
                background-size:cover;
                color:#fff;
                background: url(
                    @if (isset($myProfile))
                        {{ Storage::disk('public')->url($myProfile->cover_img) }}
                    @else
                        {{ asset('img/baseball-field.jpg') }}
                    @endif
                    );
            }
            .top-right.links a{color:white}
            .card-img {
                object-fit: none; /* Do not scale the image */
                object-position: center; /* Center the image within the element */
                width: 100%;
                max-height: 150px;
                margin-bottom: 1rem;
              }
              .hidden
              {
                  display:none;
              }
              .card {
                font-size: 1em;
                overflow: hidden;
                padding: 0;
                border: none;
                border-radius: .28571429rem;
                box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
            }
            
            .card-block {
                font-size: 1em;
                position: relative;
                margin: 0;
                padding: 1em;
                border: none;
                border-top: 1px solid rgba(34, 36, 38, .1);
                box-shadow: none;
            }
            
            .card-img-top {
                display: block;
                width: 100%;
                height: auto;
            }
            
            .card-title {
                font-size: 1.28571429em;
                font-weight: 700;
                line-height: 1.2857em;
            }
            
            .card-text {
                clear: both;
                margin-top: .5em;
                color: rgba(0, 0, 0, .68);
            }
            
            .card-footer {
                font-size: 1em;
                position: static;
                top: 0;
                left: 0;
                max-width: 100%;
                padding: .75em 1em;
                color: rgba(0, 0, 0, .4);
                border-top: 1px solid rgba(0, 0, 0, .05) !important;
                background: #fff;
            }
            
            .card-inverse .btn {
                border: 1px solid rgba(0, 0, 0, .05);
            }
            
            .profile {
                position: absolute;
                top: -12px;
                display: inline-block;
                overflow: hidden;
                box-sizing: border-box;
                width: 25px;
                height: 25px;
                margin: 0;
                border: 1px solid #fff;
                border-radius: 50%;
            }
            
            .profile-avatar {
                display: block;
                width: 100%;
                height: auto;
                border-radius: 50%;
            }
            
            .profile-inline {
                position: relative;
                top: 0;
                display: inline-block;
            }
            
            .profile-inline ~ .card-title {
                display: inline-block;
                margin-left: 4px;
                vertical-align: top;
            }
            
            .text-bold {
                font-weight: 700;
            }
            
            .meta {
                font-size: 1em;
                color: rgba(0, 0, 0, .4);
            }
            
            .meta a {
                text-decoration: none;
                color: rgba(0, 0, 0, .4);
            }
            
            .meta a:hover {
                color: rgba(0, 0, 0, .87);
            }
            .image-placeholder {
                background-color: #eee;
                display: flex;
                height: 100%;
                margin: 5px;
                width: auto;
            }
            
            .image-placeholder > h4 {
                align-self: center;
                text-align: center;
                width: 100%;
            }
        </style>
    </head>
    <body>
            @include('partials.menu')
        <div class="col-md-12" style="position:relative">

        <div class="flex-center position-ref hero">
           <h1>{{ $myProfile->users->name ?? 'My Name' }}</h1>
        </div>
        
        </div>
        <div class="content">
                <div class="container">
                   @yield('content') 
                </div>
        </div>
    
         <footer style="width:100%; min-height:20vh; background-color:black; margin-bottom:0; margin-top:80px; color:#fff">
                
        </footer>
</body>
</html>
