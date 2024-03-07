@extends('layout/master')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
@endsection

@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs page-banner-section" data-aos="fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-content">
                            <h2 class="text-white text-capitalize">
                                {{ $course->name }}
                            </h2>
                            <div class="page-breadcrumb">
                                <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="{{ route('home') }}" class="hide-title">{{ trans('home') }}</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="{{ route('courses') }}" class="hide-title"
                                                title="null">{{ trans('courses') }}</a>
                                        </li>
                                        <li class="breadcrumb-item text-capitalize active" aria-current="page">
                                            {{ $course->name }}
                                            <h1 class="d-none">{{ $course->name }}</h1>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        <video width="640" height="360" controls muted loop>
                            <source src="{{ $course->getFirstMediaUrl('videos') }}" type="video/mp4">
                        </video>
                        <h3>{{ $course->name }}</h3>
                        <p>
                            {{ $course->description }}
                        </p>
                    </div>
                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>{{ trans('instructor') }} </h5>
                            <p><a>{{ $course->instructor->name }}</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>{{ trans('price') }} </h5>
                            <p>{{ $course->price }}</p>
                        </div>

                        <a href="">
                            <button class="btn btn-primary">{{ trans('buyNow') }} </button>
                        </a>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Cource Details Section -->

        <!-- ======= Cource Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-3 details">
                        <h3>{{trans('topics')}} :</h2>
                            <ul class="nav nav-tabs flex-column">
                                @foreach ($course->topics as $topic)
                                    <li class="nav-item">
                                        <a class="nav-link active show">{{ $topic->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>{{trans('instructor')}} </h3>
                                        <p class="fst-italic">{{trans('name')}} : {{ $course->instructor->name }}</p>

                                        <h5>CV:</h5>
                                        <a href="{{ $course->instructor->getFirstMediaUrl('cv') }}" target="_blank"
                                            class="btn btn-info">View CV</a>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ $course->instructor->getFirstMediaUrl('image') }}"
                                            alt="{{ $course->instructor->name }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Cource Details Tabs Section -->

    </main>
@endsection
