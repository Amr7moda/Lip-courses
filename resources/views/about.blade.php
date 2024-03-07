@extends('layout/master')

@section('content')
    <!-- About Us Start-->
    <div class="single-slider slider-height2" style="margin-top: 150px">
        <div class="container">
            <div class="row" style="justify-content: center;align-items:center">
                <div class="col-12 col-md-5">
                    <div class="hero__caption hero__caption2">
                        <h1 data-animation="bounceIn" data-delay="0.2s" style="font-size: 60px;font-weight: bolder;">
                            {{ trans('about') }}
                        </h1>
                        <h4 style="font-size:30px">{{ trans('aboutPage') }} </h4>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="right-img">
                        <img width="100%" src="{{ asset('assets/img/icon/undraw_engineering_team_a7n2.svg') }}"
                            alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->

    <!-- about Start -->
    <div class="brief-section my-5">
        <div class="content">
            <!-- card -->
            <div class="card">
                <div class="icon">
                    <i class="material-icons md-36"></i>
                </div>
                <p class="title">{{ trans('Our History') }} </p>
                <p class="text">{{trans('history')}} </p>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="card">
                <div class="icon">
                    <i class="material-icons md-36"></i>
                </div>
                <p class="title">{{ trans('Our Mission') }} </p>
                <p class="text">{{trans('mission')}} </p>
            </div>
            <!-- end card -->
            <!-- card -->
            <div class="card">
                <div class="icon">
                    <i class="material-icons md-36"></i>
                </div>
                <p class="title">{{ trans('Our Vision') }} </p>
                <p class="text">{{trans('vision')}} </p>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- About End -->

    <!-- About Area Start -->
    <section class="about-area3 fix my-5">
        <div class="support-wrapper align-items-center">
            <div class="right-content3">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ asset('assets/img/icon/undraw_learning_sketching_nd4f.svg') }}" alt="" />
                </div>
            </div>
            <div class="left-content3">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Learner outcomes on courses you will take</h2>
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
        </div>
    </section>
    <!-- About Area End -->
@endsection
