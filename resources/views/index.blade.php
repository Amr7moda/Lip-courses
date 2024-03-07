@extends('layout/master')

@section('page-script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var video = document.getElementById("videoPlayer");
            var volumeIcon = document.getElementById("volume");
            var isMuted = true;

            volumeIcon.addEventListener("click", function() {
                // Toggle the video sound
                isMuted = !isMuted;
                video.muted = isMuted;

                // Update the volume icon class based on the muted state
                if (isMuted) {
                    volumeIcon.classList.remove("fa-volume-up");
                    volumeIcon.classList.add("fa-volume-off");
                } else {
                    volumeIcon.classList.remove("fa-volume-off");
                    volumeIcon.classList.add("fa-volume-up");
                }
            });
        });

        let valueDisplays = document.querySelectorAll(".num");
        let interval = 4000;
        valueDisplays.forEach((valueDisplay) => {
            let startValue = 0;
            let endValue = parseInt(valueDisplay.getAttribute("data-val"));
            let duration = Math.floor(interval / endValue);
            let counter = setInterval(function() {
                startValue += 1;
                valueDisplay.textContent = startValue;
                if (startValue == endValue) {
                    clearInterval(counter);
                }
            }, duration);
        });
    </script>
@endsection


@section('content')
    <!-- slider Area Start-->
    <section class="slider-area">
        <video width="100%" autoplay muted loop id="videoPlayer">
            <source src="{{ $video->getFirstMediaUrl('videos') }}" type="video/mp4">
        </video>
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">
                                    Online learning<br />
                                    platform
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">
                                    {{ trans('All Courses will Be Easy Now') }}
                                </p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.7s">{{ trans('joinForFree') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div data-v-69ce8d7b="" class="volumenUp">
            <i data-v-69ce8d7b="" id="volume" class="fa fa-volume-off" aria-hidden="true"></i>
        </div>
    </section>

    <!-- Rate Section Start-->
    <div class="wrapper rate-area">
        <div class="container shadow" data-aos="flip-left" data-aos-duration="0.1">
            <img height="110px" src="{{ asset('assets/img/icon/undraw_reading_book_re_kqpk.svg') }}" alt="">
            <span class="text">{{ trans('students') }} </span>
            <span class="num" data-val="400">000</span>
        </div>
        <div class="container shadow" data-aos="flip-left" data-aos-duration="0.2">
            <img height="110px" src="{{ asset('assets/img/icon/undraw_professor_re_mj1s.svg') }}" alt="">
            <span class="text">{{ trans('instructors') }} </span>
            <span class="num" data-val="340">000</span>
        </div>
        <div class="container shadow" data-aos="flip-left" data-aos-duration="0.3">
            <img height="110px" src="{{ asset('assets/img/icon/undraw_season_change_f99v.svg') }}" alt="">
            <span class="text">{{ trans('hours') }} </span>
            <span class="num" data-val="225">000</span>
        </div>
        <div class="container shadow" data-aos="flip-left" data-aos-duration="0.4">
            <img height="110px" src="{{ asset('assets/img/icon/undraw_reviews_lp8w.svg') }}" alt="">
            <span class="text">{{ trans('rating') }} </span>
            <span class="num" data-val="280">000</span>
        </div>
    </div>
    <!-- slider Area End-->

    <!--  services-area -->
    <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon1.svg" alt="" />
                        </div>
                        <div class="features-caption">
                            <h3>60+ UX courses</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon2.svg" alt="" />
                        </div>
                        <div class="features-caption">
                            <h3>Expert instructors</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="assets/img/icon/icon3.svg" alt="" />
                        </div>
                        <div class="features-caption">
                            <h3>Life time access</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses area start -->
    <div class="container-wrapper courses-section">
        <div class="row m-0">
            @foreach ($courses as $course)
                <div class="card">
                    <div class="face face1">
                        <div class="content">
                            <img src="{{ $course->getFirstMediaUrl('images') }}">
                            <h3>{{ $course->name }}</h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content text-truncate text-center">
                            <p>{{ $course->description }}</p>
                            <a href="{{ route('course.details', $course->id) }}">{{ trans('Read More') }} </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="text-center mt-3">
            <a href="{{ route('courses') }}">
                <button class="btn btn-primary">
                    {{ trans('showMore') }}
                </button>
            </a>
        </div>
    </div>
    <!-- Courses area End -->

    <!-- About Area-1 Start -->
    <section class="about-area1 fix pt-10 my-5" style="margin-bottom: 10rem !important">
        <div class="support-wrapper align-items-center">
            <div class="left-content1" data-aos="fade-right">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Learn new skills online with top educators</h2>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="" />
                    </div>
                    <div class="features-caption">
                        <p>
                            Techniques to engage effectively with vulnerable children and
                            young people.
                        </p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="" />
                    </div>
                    <div class="features-caption">
                        <p>
                            Join millions of people from around the world learning
                            together.
                        </p>
                    </div>
                </div>

                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="" />
                    </div>
                    <div class="features-caption">
                        <p>
                            Join millions of people from around the world learning
                            together. Online learning is as easy and natural.
                        </p>
                    </div>
                </div>
            </div>
            <div class="right-content1" data-aos="fade-left">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ asset('assets/img/icon/undraw_online_learning_re_qw08.svg') }}" alt="" />

                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Gallary Start -->
    <div class="reviews p-4 my-3">
        <div class="reviews-header">
            <h1 style="color: white">{{ trans('studentsExperts') }} </h1>
        </div>
        <div class="gallery">
            <div class="gallery_line">
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.12 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.12 AM (2).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.12 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.16 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.16 AM (2).jpeg') }}" />
                <!-- need to reapeat images to infinit animation -->
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (2).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (3).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (4).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.13 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (1).jpeg') }}" />
            </div>
            <div class="gallery_line">
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (3).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (4).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (5).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.12 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.12 AM (2).jpeg') }}" />
                <!-- need to reapeat images to infinit animation -->
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.16 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (2).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (3).jpeg') }}" />
            </div>
            <div class="gallery_line">
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.16 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.16 AM (2).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (2).jpeg') }}" />
                <!-- need to reapeat images to infinit animation -->
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.13 AM.jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.14 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.13 AM (1).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (3).jpeg') }}" />
                <img src="{{ asset('assets/img/review/WhatsApp Image 2023-12-15 at 2.10.15 AM (4).jpeg') }}" />
            </div>
        </div>
    </div>
    <!-- Gallary End -->

    {{-- Ag-courses Start --}}
    <div class="container">
        <div class="ag-courses_box">
            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        UI/Web&amp;Graph design for teenagers 11-17&#160;years old
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        UX/UI Web-Design&#160;+ Mobile Design
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Annual package "Product+UX/UI+Graph designer&#160;2022"
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Graphic Design
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            04.11.2022
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Motion Design
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            30.11.2022
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Front-end development&#160;+ jQuery&#160;+ CMS
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg">
                    </div>
                    <div class="ag-courses-item_title">
                        Digital Marketing
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a href="#" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Interior Design
                    </div>

                    <div class="ag-courses-item_date-box">
                        Start:
                        <span class="ag-courses-item_date">
                            31.10.2022
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- Ag-courses End --}}

    <!-- Brands Slider Start -->
    <div class="brands-slider my-5 py-5">
        <div class="slide-track">
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259002.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259032.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259065.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259098.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259130.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259164.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259199.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259232.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259264.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259297.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259329.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259367.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259404.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155799.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155828.svg') }}" height="90%" width="60%" alt="" />
            </div>
        </div>

        <div class="slide-track">
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259446.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259486.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259516.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259546.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707427259576.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869312.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869340.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869367.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869392.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869419.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869446.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869473.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869500.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155854.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155877.svg') }}" height="90%" width="60%" alt="" />
            </div>
        </div>

        <div class="slide-track">
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869527.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869554.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869581.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869608.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869634.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869660.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869700.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869727.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869755.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869780.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869808.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429869836.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707429912941.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155901.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155925.svg') }}" height="90%" width="60%" alt="" />
            </div>
        </div>

        <div class="slide-track">
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155027.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155052.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155075.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155101.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155124.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155149.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155172.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155199.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155223.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155250.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155272.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155300.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155327.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155952.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155975.svg') }}" height="90%" width="60%" alt="" />
            </div>
        </div>

        <div class="slide-track">
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155357.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155386.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155419.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155458.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155486.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155529.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155559.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155595.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155642.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155679.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155714.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155747.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516155771.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516156002.svg') }}" height="90%" width="60%" alt="" />
            </div>
            <div class="slide">
                <img src="{{ asset('assets/img/slider/1707516156025.svg') }}" height="90%" width="60%" alt="" />
            </div>
        </div>
    </div>
    <!-- Brands Slider End -->
@endsection
