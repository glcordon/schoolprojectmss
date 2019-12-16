<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <script src="https://kit.fontawesome.com/f42913f22f.js"></script>
        
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
                height:0vh;
                color:#fff; 
                background:black  url(
                    @if (isset($course->course_image))
                        {{ Storage::url($course->course_image) }}
                    @elseif (isset($siteData->user_cover))
                        {{ Storage::url($siteData->user_cover) }}
                    @else
                        {{ asset('img/baseball-field.jpg') }}
                    @endif
                    );
		background-size:contain;
		box-shadow: 1px 1px 5px #888888;
               
                
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
              .topnav {
                overflow: hidden;
                background-color: #333;
                display: flex;
              }
              
              .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
              }
              
              .topnav a:hover {
                background-color: #ddd;
                color: black;
              }
              
              .topnav a.active {
                background-color: #4CAF50;
                color: white;
              }
              
              .topnav .icon {
                display: none;
              }
              
              @media screen and (max-width: 600px) {
                .topnav a:not(:first-child) {display: none;}
                .topnav a.icon {
                  float: right;
                  display: block;
                }
              }
              
              @media screen and (max-width: 600px) {
                .topnav.responsive {position: relative;}
                .topnav.responsive .icon {
                  position: absolute;
                  right: 0;
                  top: 0;
                }
                .topnav.responsive a {
                  float: none;
                  display: block;
                  text-align: left;
                }
              }
              
              </style>
        </style>
    </head>
    <body>
            @include('partials.menu')
             
        <div class="flex-center position-ref hero">
           
        </div>
        <div class="content">
                <div>
                   @yield('content') 
                </div>
            
         </div>
        </div></div>
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
        
          <!--/ Intro Skew Star /-->
          <section id="home">
            <div class="home-banner">
                <div class="intro route" style="background-image: url({{ asset('assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg') }})">
                  <div class="overlay-itro"></div>
                  <div class="intro-content display-table">
                    <div class="table-cell">
                      <div class="container">
                        <div class="banner-container">
                          <p class="Courses-avilability wow fadeInDown" data-wow-delay=".25s" data-wow-duration="1s">Available Now</p>
                          <h1 class="intro-title wow fadeInDown" data-wow-delay=".80s" data-wow-duration="1s">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                          <div class="banner-slider-content">
                            <a class="btn btn-primary wow zoomIn" data-wow-delay="1.50s" data-wow-duration="2s" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
                            <span class="wow fadeInRight" data-wow-delay="3s" data-wow-duration="1s">New Content Monthly</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="intro route" style="background-image: url({{ asset('assets/img/court-prather-Nka1wVAQWa4-unsplash.jpg') }})">
                  <div class="overlay-itro"></div>
                  <div class="intro-content display-table">
                    <div class="table-cell">
                      <div class="container">
                        <div class="banner-container">
                          <p class="Courses-avilability">Available Now</p>
                          <h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                          <div class="banner-slider-content">
                            <a class="btn btn-primary" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
                            <span>New Content Monthly</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="intro route" style="background-image: url(assets/img/vienna-reyes-qCrKTET_09o-unsplash.jpg)">
                  <div class="overlay-itro"></div>
                  <div class="intro-content display-table">
                    <div class="table-cell">
                      <div class="container">
                        <div class="banner-container">
                          <p class="Courses-avilability">Available Now</p>
                          <h1 class="intro-title">Elite Sports Training, <span>Mentorship</span> & Events</h1>
                          <div class="banner-slider-content">
                            <a class="btn btn-primary" href="elite-program.html">Learn More <i class="icon-right-arrow1"></i></a>
                            <span>New Content Monthly</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </section>
          <!--/ Intro Skew End /-->
        
        
          <!--/ Section Road to pro /-->
          <section id="service" class="services-mf route p-r section-padding-80">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box text-center">
                    <h3 class="title-a wow zoomIn" data-wow-delay="2s" data-wow-duration="1s">
                      Road to Pro
                    </h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="service-box wow zoomIn" data-wow-delay="1s" data-wow-duration="1s">
                    <div class="service-ico">
                      <span class="ico-circle"><i class="icon-coach"></i></span>
                    </div>
                    <div class="service-content">
                      <h2 class="s-title">Elite Training Courses</h2>
                      <p class="s-description text-center">
                        We have identified the best and most enthusiastic trainers around the country bringing you the same information that have taken hundreds of athletes pro.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="service-box wow zoomIn" data-wow-delay="1.3s" data-wow-duration="1s">
                    <div class="service-ico">
                      <span class="ico-circle"><i class="icon-online"></i></span>
                    </div>
                    <div class="service-content">
                      <h2 class="s-title">Pro Mentors</h2>
                      <p class="s-description text-center">
                        We have brought a unique and exclusive opportunity to be mentored directly by professional athletes through live streams and conference calls. 
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="service-box wow zoomIn" data-wow-delay="1.6s" data-wow-duration="1s">
                    <div class="service-ico">
                      <span class="ico-circle"><i class="icon-calendar"></i></span>
                    </div>
                    <div class="service-content">
                      <h2 class="s-title">Exclusive Camps & Events</h2>
                      <p class="s-description text-center">
                        We have partnered with camps, tournaments, and professional exposure events to make sure you always know your next opportunity near you to grow or be seen. 
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!--/ Section Road to pro/-->
        
        
            <!--/ Section choose course /-->
          <section id="choose-course" class="choose-course route p-r section-padding-80">
            <div class="container">
              <div class="row">
                <div class="col-sm-10 offset-md-1 text-left">
                  <div class="title-box text-center mb-0">
                    <h3 class="title-a wow fadeInDown transform-up animated" data-wow-delay="1s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInDown;">
                      Choose Your Course
                    </h3>
                  </div>
                </div>
                <div class="search-course-box">
                  <form>
                    <input type="text" name="" placeholder="I am looking for...">
                    <button><i class="icon-magnifying-glass"></i></button>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="0.3s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Nick Duffy Golf</h3>
                      <div class="review">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                      </div>
                    </div> 
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="0.6s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Ground Up Baseball</h3>
                      <div class="review">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                      </div>
                    </div> 
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="0.9s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Wise Basketball Training</h3>
                      <div class="review">
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-star"></i>
                      </div>
                    </div> 
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="1.2s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Prospeak</h3>
                      <div class="review">
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                      </div>
                    </div>
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div> 
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="1.5s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Transition Performance</h3>
                      <div class="review">
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                      </div>
                    </div> 
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                  <div class="course-box p-r wow zoomIn" data-wow-delay="1.8s" data-wow-duration="1s">
                    <div class="couse-bg-thumb" style="background-image: url(assets/img/chris-chow-BhwRQr08PcM-unsplash.jpg)"></div>
                    <div class="course-top-content">
                      <span class="category-name">Sports</span>
                      <span class="price-month">$xx/Mo.</span>
                    </div>
                    <div class="course-bottom-content">
                      <h3 class="s-title">Real Training Focus</h3>
                      <div class="review">
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-ui"><span class="path1"></span><span class="path2"></span></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                      </div>
                    </div> 
                    <div class="card-btn-holder">
                      <a href="partners.html" class="subscribe-btn">Subscribe <i class="icon-right-arrow1 arrow-one"></i><i class="icon-right-arrow1 arrow-two"></i></a>
                      <a href="subscribed-partner.html" class="more-info-btn">More Info</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!--/ Section choose course/-->
         
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
        