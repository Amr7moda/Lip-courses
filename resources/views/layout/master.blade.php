<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>LIP Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo.png') }}" />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('page-style')
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header">
                <div class="header-bottom">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img width="80px" height="80px"
                                            src="{{ asset('assets/img/logo/Logo.png') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li class="active">
                                                    <a href="{{ route('home') }}">{{ trans('home') }}</a>
                                                </li>
                                                <li><a href="{{ route('courses') }}">{{ trans('courses') }}</a></li>
                                                <li><a href="{{ route('about') }}">{{ trans('about') }}</a></li>
                                                <li><a href="{{route('contact')}}">{{ trans('contact') }}</a></li>
                                                <!-- Button -->
                                                <li class="button-header margin-left">
                                                    <a href="{{ route('apply') }}"
                                                        class="btn">{{ trans('join') }}</a>
                                                </li>
                                                <li class="margin-left">
                                                    <form method="GET" action="{{ route('change.language') }}">
                                                        @csrf
                                                        <select class="custom-select" style="height: unset"
                                                            name="locale" onchange="this.form.submit()">
                                                            <option value="en"
                                                                {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                                                                English
                                                            </option>
                                                            <option value="ar"
                                                                {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>
                                                                Arabic
                                                            </option>
                                                        </select>
                                                    </form>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        @yield('content')
    </main>


    <footer>
        <div class="footer-wrappper footer-bg">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-25 text-center">
                                        <img width="150px" height="150px"
                                            src="{{ asset('assets/img/logo/Logo.png') }}" alt="" />
                                    </div>
                                    <div class="footer-tittle text-center">
                                        <div class="footer-pera">
                                            <p>
                                                {{trans('footerSe')}}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- social -->
                                    <div class="social-container">
                                        <ul class="social-icons">
                                            <li>
                                                <a href="https://x.com/CoursesLip?t=y54tb1AJZqcJKUgDGT3LCg&s=08">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://www.facebook.com/profile.php?id=100063749454666&mibextid=ZbWKwL">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.tiktok.com/@lipcourses?_t=8iRPpwdnCnF&_r=1">
                                                    <i class="fa-brands fa-tiktok"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://www.snapchat.com/add/lip_courses?share_id=AzuQDeUneC4&locale=en-EG">
                                                    <i class="fab fa-snapchat"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/lipcourses?igsh=OGQ5ZDc2ODk2ZA==p">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle text-center">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="{{ route('home') }}">{{ trans('home') }}</a></li>
                                        <li><a href="{{ route('about') }}">{{ trans('about') }}</a></li>
                                        <li><a href="{{ route('contact') }}">{{ trans('contact') }}</a></li>
                                        <li><a href="{{ route('apply') }}">{{ trans('join') }}</a></li>
                                        <li><a href="{{ route('courses') }}">{{ trans('courses') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle text-center">
                                    <h4>{{trans('contact')}} </h4>
                                    <ul style="color: white">
                                        <li>
                                            <svg style="height: 2rem" class="svg-inline--fa fa-earth-americas"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="earth-americas" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5v39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9v39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7v-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1H257c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z">
                                                </path>
                                            </svg>
                                            <span class="fw-bold">Egypt - Cairo</span>
                                        </li>
                                        <li>
                                            <svg style="height: 2rem" class="svg-inline--fa fa-envelope"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="envelope" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z">
                                                </path>
                                            </svg>
                                            <span class="fw-bold"> lipcourses20@gmail.com </span>
                                        </li>
                                        <li>
                                            <i style="font-size: 25px" class="fab fa-whatsapp"></i>
                                            <span class="fw-bold"> +20 1028283736 </span>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                        All rights reserved
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>
    </footer>


    <a href="https://wa.me/+201028283736" class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <a href="https://t.me/+201028283736" class="float" target="_blank"
        style=" background-color: #0088cc; right:110px">
        <i class="fab fa-telegram my-float" aria-hidden="true"></i>
    </a>

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    @yield('page-script')
</body>

</html>
