<!DOCTYPE html>
<html class="no-js" lang="en" data-assets-path="{{ asset('/assets') . '/' }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Savecut</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="{{ asset('assets/img/favicon/favicon.ico') }}"
    />
    <!-- Place favicon.ico in the root directory -->

    <!-- ======== CSS here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/main.css') }}" />
  </head>
  <body>

    <!-- ======== preloader start ======== -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- preloader end -->

    <!-- ======== header start ======== -->
    <header class="header">
      <div class="navbar-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{asset('assets/img/landing/logop.png')}}" alt="Logo" />
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                </button>

                <div
                  class="collapse navbar-collapse sub-menu-bar"
                  id="navbarSupportedContent"
                >
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="page-scroll active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#about">About</a>
                    </li>

                    <li class="nav-item">
                      <a class="page-scroll" href="#why">Why</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="page-scroll btn btn-warning btn-lg fw-bold " href="{{url('auth/login')}}"><span> JOIN </span></a>
                    </li> -->
                  </ul>
                </div>
                <!-- navbar collapse -->
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->
    </header>
    <!-- ======== header end ======== -->

    <!-- ======== hero-section start ======== -->
    <section id="home" class="hero-section">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="col-lg-6">
            <div class="hero-content">
              <h1 class="wow fadeInUp" data-wow-delay=".4s">
                Tired of waiting for your turn at the salon?
              </h1>
              <p class="wow fadeInUp" data-wow-delay=".6s">
                Look no further! We have a good news for you...
              </p>
              <a
                href="{{url('auth/login')}}"
                class="main-btn border-btn btn-hover wow fadeInUp"
                data-wow-delay=".6s"
              >Get Started</a>
              <a href="#features" class="scroll-bottom">
                <i class="lni lni-arrow-down"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
              <img src="{{asset('assets/img/landing/handphone.png')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======== hero-section end ======== -->

    <!-- ======== feature-section start ======== -->
    <section id="features" class="feature-section pt-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-8 col-sm-10">
            <div class="single-feature">
              <div class="icon">
                <i class="lni lni-book"></i>
              </div>
              <div class="content">
                <h3>Easy Booking</h3>
                <p>
                  Browse available time slots and select your desired services with just a few clicks.
                  Say goodbye to long phone calls and waiting on hold!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-8 col-sm-10">
            <div class="single-feature">
              <div class="icon">
                <i class="lni lni-cut"></i>
              </div>
              <div class="content">
                <h3>Salon Profile</h3>
                <p>
                 You can choose the best option to style your beautiful hair!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-8 col-sm-10">
            <div class="single-feature">
              <div class="icon">
                <i class="lni lni-comments-alt"></i>
              </div>
              <div class="content">
                <h3>Trusted Reviews</h3>
                <p>
                  Explore reviews from our customers about the quality of service from our selected salons!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======== feature-section end ======== -->

    <!-- ======== about-section start ======== -->
    <section id="about" class="about-section pt-150">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 col-lg-6">
            <div class="about-img">
              <img src="{{asset('assets/img/landing/homepage.png')}}" alt="" class="w-100" />
              <img
                src="{{asset('assets/img/landing/about-left-shape.svg')}}"
                alt=""
                class="shape shape-1"
              />
              <img
                src="{{asset('assets/img/landing/left-dots.svg')}}"
                alt=""
                class="shape shape-2"
              />
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="about-content">
              <div class="section-title mb-30">
                <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                  Perfect Solution for Salon Booking!
                </h2>
                <p class="wow fadeInUp" data-wow-delay=".4s">
                  With Savecut, you can book your favorite salon services without queueing for a long time!
                  Just open our website and you can enjoy the fast and easy booking salon experience!

                </p>
              </div>
              <!-- <a
                href="javascript:void(0)"
                class="main-btn btn-hover border-btn wow fadeInUp"
                data-wow-delay=".6s"
                >Discover More</a
              > -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======== about-section end ======== -->


    <!-- ======== feature-section start ======== -->
    <section id="why" class="feature-extended-section pt-100">
      <div class="feature-extended-wrapper">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-9">
              <div class="section-title text-center mb-30">
                <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                  Why Choose Savecut
                </h2>
                <!-- <p class="wow fadeInUp" data-wow-delay=".4s">
                  Imagine, you can arrive at the salon and getting the services that you want,
                  without waiting for hours!
                </p> -->
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-display"></i>
                </div>
                <div class="content">
                  <h3>Easy to Use</h3>
                  <p>
                    Just by a few clicks, you can swiftly look through a selection of salons and book an appointment
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-checkmark-circle"></i>
                </div>
                <div class="content">
                  <h3>Trusted</h3>
                  <p>
                    Our salon provides real reviews from previous customer and a salon profile page
                    so you can see which fits your needs the best
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-alarm-clock"></i>
                </div>
                <div class="content">
                  <h3>Time Saving</h3>
                  <p>
                    Save your time by avoiding long waits for an appointment.
                    Book your appointment in advance and receive service promptly upon your arrival
                  </p>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-javascript"></i>
                </div>
                <div class="content">
                  <h3>Vanilla JS</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-layers"></i>
                </div>
                <div class="content">
                  <h3>Essential Sections</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature-extended">
                <div class="icon">
                  <i class="lni lni-rocket"></i>
                </div>
                <div class="content">
                  <h3>Highly Optimized</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore
                  </p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <!-- ======== feature-section end ======== -->

    <!-- ======== subscribe-section start ======== -->
    <section id="contact" class="subscribe-section pt-120">
      <div class="container">
        <div class="subscribe-wrapper img-bg">
          <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
              <div class="section-title mb-15 text-center">
                <h2 class="text-white fw-bold">SAVE YOUR TIME, ELEVATE YOUR STYLE</h2>
                <p class="text-white fw-lighter pr-5">
                  WITH SAVECUT
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======== subscribe-section end ======== -->

    <!-- ======== footer start ======== -->
    <footer class="footer">
      <div class="container">
        <div class="widget-wrapper">
          <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="footer-widget">
                <div class="footer-brand">
                  <a href="{{url('/')}}">
                    <img src="{{ asset('assets/img/landing/logop3.png') }}" alt="" />
                  </a>
                </div>
                <p class="desc mt-20 mb-10 text-white">
                  Save your time,
                  <br>
                  Elevate your style
                  <br><br>
                  Contact us on :
                </p>
                <ul class="socials">
                  <li>
                    <a href="https://www.tiktok.com/@savecut.id">
                      <svg fill="#ffffff" width="16" height="16" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_412_113)"><path d="M33.4133 0.0533333C36.9067 0 40.3733 0.0266667 43.84 0C44.0533 4.08 45.52 8.24 48.5067 11.12C51.4933 14.08 55.7067 15.44 59.8133 15.8933V26.64C55.9733 26.5067 52.1067 25.7067 48.6133 24.0533C47.0933 23.36 45.68 22.48 44.2933 21.5733C44.2667 29.36 44.32 37.1467 44.24 44.9067C44.0267 48.64 42.8 52.3467 40.64 55.4133C37.1467 60.5333 31.0933 63.8667 24.88 63.9733C21.0667 64.1867 17.2533 63.1467 14 61.2267C8.61334 58.0533 4.82668 52.24 4.26668 46C4.21334 44.6667 4.18668 43.3333 4.24001 42.0267C4.72001 36.96 7.22668 32.1067 11.12 28.8C15.5467 24.96 21.7333 23.12 27.52 24.2133C27.5733 28.16 27.4133 32.1067 27.4133 36.0533C24.7733 35.2 21.68 35.44 19.36 37.04C17.68 38.1333 16.4 39.8133 15.7333 41.7067C15.1733 43.0667 15.3333 44.56 15.36 46C16 50.3733 20.2133 54.0533 24.6933 53.6533C27.68 53.6267 30.5333 51.8933 32.08 49.36C32.5867 48.48 33.1467 47.5733 33.1733 46.5333C33.44 41.76 33.3333 37.0133 33.36 32.24C33.3867 21.4933 33.3333 10.7733 33.4133 0.0533333Z"/></g><defs><clipPath id="clip0_412_113"><rect width="64" height="64" fill="white"/></clipPath></defs></svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/savecut.id/">
                      <i class="lni lni-instagram-original"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6">
              <div class="footer-widget">
                <h3>About Us</h3>
                <ul class="links">
                  <li><a href="#home">Home</a></li>
                  <li><a href="#features">Feature</a></li>
                  <li><a href="#about">About</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </footer>
    <!-- ======== footer end ======== -->

    <!-- ======== scroll-top ======== -->
    <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ======== JS here ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/mainl.js')}}"></script>
  </body>
</html>
