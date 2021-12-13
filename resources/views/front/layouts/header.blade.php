<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Om Web Solution</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('front/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">

    </style>
</head>

<body>
<?php 
$actual_link = "$_SERVER[REQUEST_URI]";
$link_array = explode('/',$actual_link);
$page = end($link_array);

$userdata = Session::get('userdata');
?>

  <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="mailto:omwebsolution001@gmail.com">omwebsolution001@gmail.com</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+91 7283963745</span>
                </i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">

                <a href="https://twitter.com/OMWebSolution1" class="twitter">
                    <i class="bi bi-twitter"></i>
                </a>

                <a href="https://www.facebook.com/OM-Web-Solution-113122047255578/?ref=pages_you_manage" class="facebook">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="https://www.linkedin.com/company/omwebsolution/?viewAsMember=true" class="linkedin">
                    <i class="bi bi-linkedin"></i>
                </a>

                <a href="https://www.youtube.com/channel/UCcJiFutM0FKKXHddMKhR0UA?view_as=subscriber?sub_confirmation=1" class="linkedin">
                    <i class="bi bi-youtube"></i>
                </a>

                <a href="t.me/omwebsolution" class="linkedin">
                    <i class="bi bi-telegram"></i>
                </a>

                <a href="live:.cid.aeedf0696bb11006" class="linkedin">
                  <i class="bi bi-skype"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <img src="{{asset('front/assets/img/logo.png')}}" alt="om web solution" width="" height="75">

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto @if(empty($page)) active @endif" href="{{route('index')}}">Home</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'about') active @endif" href="{{route('about')}}">About</a>
                    </li>
                      <!-- <li><a class="nav-link scrollto @if($page == 'service') active @endif" href="{{route('service')}}">Services</a></li> -->
                    <li>
                        <a class="nav-link scrollto @if($page == 'portfolios') active @endif" href="{{route('portfolio')}}">Portfolio</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'project') active @endif" href="{{route('project')}}">Project</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'career') active @endif" href="{{route('career')}}">Career</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="#">Blog</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="#">Privacy Policy</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto @if($page == 'contact') active @endif" href="{{route('contact')}}">Contact</a>
                    </li>

                    @if(!empty($userdata))
                        <li>
                            <a class="nav-link scrollto @if($page == 'userlogout') active @endif" href="{{route('userlogout')}}">Logout</a>
                        </li>
                    @else
                        <li>
                            <a class="nav-link scrollto @if($page == 'signin') active @endif" href="{{route('signin')}}">Login / Register</a>
                        </li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>BizLand<span>.</span></h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('about')}}">About</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('portfolio')}}">Portfolio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{route('career')}}">Career</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Web Development</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Product Management</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>

                        <div class="social-links mt-3">

                            <a href="https://twitter.com/OMWebSolution1" class="twitter"><i class="bx bxl-twitter"></i>
                            </a>

                            <a href="https://www.facebook.com/OM-Web-Solution-113122047255578/?ref=pages_you_manage" class="facebook"><i class="bx bxl-facebook"></i>
                            </a>
                  
                            <a href="https://www.linkedin.com/company/omwebsolution/?viewAsMember=true" class="linkedin"><i class="bx bxl-linkedin"></i>
                            </a>

                            <a href="https://www.youtube.com/channel/UCcJiFutM0FKKXHddMKhR0UA?view_as=subscriber?sub_confirmation=1" class="youtube"><i class="bx bxl-youtube"></i>
                            </a>

                            <a href="t.me/omwebsolution" class="telegram"><i class="bx bxl-telegram"></i>
                            </a>

                            <a href="live:.cid.aeedf0696bb11006" class="skype"><i class="bx bxl-skype"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Start Login Register Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            
        </div>
        <div class="loginmodal-container">
                <h1>Login to Your Account</h1><br>
              <form action="{{route('userlogin')}}" method="post">
                @csrf
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
              </form>
                
              <div class="login-help">
                <a href="{{route('signin')}}">Register</a>
              </div>
            </div>
    </div>
    <!-- End Login Register Modal -->

    <!-- Vendor JS Files -->
    <script src="{{asset('front/assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('front/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <!-- <script src="{{asset('front/assets/vendor/php-email-form/validate.js')}}"></script> -->

    <!-- Template Main JS File -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>

</body>
</html>