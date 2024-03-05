<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PinkPadel</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Zoyothemes" />

    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico')}}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css')}}" />

    <!-- Materialdesign icon Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/materialdesignicons.min.css')}}" />
    <!-- Pe 7 icon Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pe-icon-7-stroke.css')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css')}}" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-default navbar-custom navbar-light">
        <div class="container">
            <a class="navbar-brand logo" href="index.html">Juora</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('frontend/about.html')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('frontend/services.html')}}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('frontend/work.html')}}">Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('frontend/blog.html')}}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('frontend/contact.html')}}">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pages
                         </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{asset('frontend/work-detail.html')}}">Work detail</a>
                              <a class="dropdown-item" href="{{asset('frontend/blog-single.html')}}">blog single</a>
                            </div>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <section class="bg-page-title">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="text-center">
                                <h2 class="home-page text-white">Founded and based in <span>Spain</span>, we are Juora, a design and branding agency with partners worldwide.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- START MAIN-CONTENT -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="main-content bg-white p-5">

                        <!-- SECTION FILTER
                ================================================== -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="portfolioFilter text-center">
                                    <a href="#" data-filter="*" class="current waves-effect waves-success">All</a>
                                    <a href="#" data-filter=".natural" class="waves-effect waves-success">Natural</a>
                                    <a href="#" data-filter=".creative" class="waves-effect waves-success">Creative</a>
                                    <a href="#" data-filter=".personal" class="waves-effect waves-success">Personal</a>
                                    <a href="#" data-filter=".photography" class="waves-effect waves-success">Photography</a>
                                </div>
                            </div>
                        </div>

                        <div class="port portfolio-masonry m-b-30">
                            <div class="portfolioContainer row">
                                <div class="col-lg-4 natural personal">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img1.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Media, Icons</p>
                                                <h4>Open Imagination</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 creative personal photography">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img2.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations</p>
                                                <h4>Locked Steel Gate</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img3.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Graphics, UI Elements</p>
                                                <h4>Mac Sunglasses</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 personal photography">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img5.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Icons, Illustrations</p>
                                                <h4>Morning Dew</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 creative photography">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img6.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>UI Elements, Media</p>
                                                <h4>Console Activity</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural personal">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img4.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Graphics</p>
                                                <h4>Sunset Bulb Glow</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img7.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 creative photography">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img8.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>UI Elements, Media</p>
                                                <h4>Console Activity</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img9.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img10.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img2.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img6.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 natural creative">
                                    <a href="">
                                        <div class="portfolio-box">
                                            <div class="portfolio-box-img">
                                                <img src="{{asset('frontend/images/works/img10.jpg')}}" class="img-fluid" alt="member-image">
                                            </div>
                                            <div class="portfolio-box-detail">
                                                <p>Illustrations, Graphics</p>
                                                <h4>Shake It!</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <!-- end portfoliocontainer-->
                        </div>
                        <!-- End row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center margin-t-30">
                                    <a href="work.html" class="btn btn-dark btn-rounded">More works</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end container -->
    </section>

    <!-- END MAIN-CONTENT -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">

            <div class="row vertical-content">

                <div class="col-lg-4">
                    <div class="footer-content text-center mt-4">
                        <div class="footer-icon">
                            <i class="pe-7s-map-marker"></i>
                        </div>
                        <h4 class="mt-4">Office Address</h4>
                        <p class="mt-3 text-muted">4474 Briarhill Lane, OH 44311</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="footer-content text-center mt-4">
                        <div class="footer-icon">
                            <i class="pe-7s-phone"></i>
                        </div>
                        <h4 class="mt-4">Mobile Number</h4>
                        <p class="mt-3 text-muted">765-635-8671, 330-235-4200
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="footer-content text-center mt-4">
                        <div class="footer-icon">
                            <i class="pe-7s-mail-open"></i>
                        </div>
                        <h4 class="mt-4">Email Address</h4>
                        <p class="mt-3 text-muted">MorganAGregory@teleworm.us</p>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="text-center">

                        <ul class="list-inline social-circle mb-0 mt-4">
                            <li class="list-inline-item">
                                <a href=""> <i class="mdi mdi-facebook"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""> <i class="mdi mdi-twitter"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""> <i class="mdi mdi-google-plus"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""> <i class="mdi mdi-apple"></i> </a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""> <i class="mdi mdi-instagram"></i> </a>
                            </li>
                        </ul>

                        <p class="mt-4 text-muted">
                            © Juora 2018 All Right Reserved
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <!-- END FOOTER -->
   <!-- JAVASCRIPTS -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- isotope filter plugin -->
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/portfolio-filter.js')}}"></script>
    <script src="{{asset('frontend/js/app.js')}}"></script>
</body>

</html>