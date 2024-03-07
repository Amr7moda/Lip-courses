@extends('admin/layout/master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Video Details</h5>
        </div>
        <div class="card-body">
            <h4>Name: {{ $video->name }}</h4>

            <div class="mb-4">

                <video width="640" height="360" controls autoplay muted loop >
                    <source src="{{ $video->getFirstMediaUrl('videos') }}" type="video/mp4">
                </video>
            </div>

            <div class="mt-3">
                <a href="{{ route('admin.video') }}" class="btn btn-primary">Back to Videos</a>
            </div>
        </div>
    </div>
@endsection
