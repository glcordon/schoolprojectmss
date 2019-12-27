
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>My Sports Share</title>
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <meta content="" name="keywords">
          <meta content="" name="description">
        
          <!-- Favicons -->
          <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
          <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
        
          <!-- Bootstrap CSS File -->
          <link href="{{ asset('assets/lib/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        
          <!-- Libraries CSS Files -->
          <link href="{{ asset('assets/lib/animate/css/animate.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        
          <!-- Main Stylesheet File -->
          <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        
          <!-- =======================================================
            Theme Name: DevFolio
            Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
            Author: BootstrapMade.com
            License: https://bootstrapmade.com/license/
          ======================================================= -->
        </head>
        
        <body id="page-top">
        
          <!--/ Nav Star /-->
          <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
            <div class="container p-r">
              <a class="navbar-brand js-scroll" href="index.html">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
              </a>
              <div class="menu-item">
                <ul>
                  <li><a href="course-name.html" class="js-scroll">Courses</a></li>
                  <li><a href="subscribed-partner.html">Login</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <!--/ Nav End /-->
        
          <div class="app">
                @yield('content') 
             </div>
          
          <!--/ Footer Star /-->
            <footer>
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="copyright-box">
                      <span class="copyright">&copy; Copyright My Sport Share. All Rights Reserved</span>
                      </div>
                    </div>
                  <div class="col-sm-6 text-right">
                    <div class="footer-links">
                      <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Press</a></li>
                        <li><a href="">Become a Partner</a></li>
                      </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </footer>
          <!--/ footer End /-->
        
          <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->
        <!--   <div id="preloader">
            <div class="words words-1">
              <span>M</span>
              <span>Y</span>
              <span>S</span>
              <span>p</span>
              <span>o</span>
              <span>r</span>
              <span>t</span>
              <span>s</span>
              <span>h</span>
              <span>a</span>
              <span>r</span>
              <span>e</span>
            </div>
          </div> -->
        
          <!-- JavaScript Libraries -->
          <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
          <script src="{{ asset('assets/lib/jquery/jquery-migrate.min.js') }}"></script>
          <script src="{{ asset('assets/lib/popper/popper.min.js') }}"></script>
          <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
          <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
          <script src="{{ asset('assets/lib/animate/js/wow.min.js') }}"></script>
          <script src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
        
          <!-- Template Main Javascript File -->
          <script src="{{ asset('assets/js/main.js') }}"></script>
        
        </body>
        </html>
        