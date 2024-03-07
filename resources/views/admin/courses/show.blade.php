@extends('admin/layout/master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Course Details</h1>
        </div>
        <div class="card-body">
            <h2 style="color: #4c71dd;">Course</h2>
            <p> Name: {{ $course->name }}</p>
            <p>Price: {{ $course->price }}</p>
            <p>Description: {{ $course->description }}</p>

            <div class="mb-4">
                <h5>Course Image:</h5>
                <img src="{{ $course->getFirstMediaUrl('images') }}" alt="{{ $course->name }}" class="img-fluid">
            </div>

            <div class="mb-4">
                <h5>Course Video:</h5>
                <video width="640" height="360" controls muted loop>
                    <source src="{{ $course->getFirstMediaUrl('videos') }}" type="video/mp4">
                </video>
            </div>

            <div class="mb-4">
                <h2 style="color: #4c71dd;">Instructor Details:</h2>
                <p>Name: {{ $course->instructor->name }}</p>
            </div>

            <div class="mb-4">
                <h5>Image:</h5>
                <img src="{{ $course->instructor->getFirstMediaUrl('image') }}" alt="{{ $course->instructor->name }}"
                    class="img-fluid">

                <h5>CV:</h5>
                <a href="{{ $course->instructor->getFirstMediaUrl('cv') }}" target="_blank" class="btn btn-info">View CV</a>
            </div>


            <div class="mb-4">
                <h2 style="color: #4c71dd;">Topics:</h2>
                <ul>
                    @foreach ($course->topics as $topic)
                        <li>{{ $topic->name }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- <h5>Related Files:</h5>
            <ul>
                @foreach ($course->getMedia('related_files') as $file)
                    <li>
                        <a href="{{ $file->getUrl() }}" target="_blank">{{ $file->name }}</a>
                    </li>
                @endforeach
            </ul> --}}

            <div class="mt-3">
                <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
            </div>
        </div>
    </div>
@endsection
