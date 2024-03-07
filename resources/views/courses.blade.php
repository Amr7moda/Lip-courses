@extends('layout/master')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
@endsection

@section('content')
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2 style="color: white">Courses</h2>
                <p style="color: white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt vero dolorem voluptatibus ratione quia
                    culpa, est assumenda ea velit adipisci, reprehenderit repellendus eaque reiciendis perspiciatis
                    laboriosam delectus at minima? Eaque. </p>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <img src="{{ $course->getFirstMediaUrl('images') }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $course->name }}</h4>
                                        <p class="price">{{ $course->price }}</p>
                                    </div>

                                    <h3><a href="{{ route('course.details', $course->id) }}">{{ $course->name }}</a></h3>
                                    <p>{{ $course->description }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="{{ $course->Instructor->getFirstMediaUrl('image') }}"
                                                class="img-fluid" alt="">
                                            <span>{{ $course->Instructor->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Courses Section -->

    </main>
    <!-- End #main -->
@endsection
