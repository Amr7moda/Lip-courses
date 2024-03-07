@extends('admin/layout/master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3"
            style="display: flex;
        justify-content: space-between;
        align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Videos</h6>

            <button class="btn btn-primary" data-toggle="modal" data-target="#addVideoModal">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                Add New
            </button>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $video->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.video.show', $video->id) }}">
                                        <button class="btn btn-secondry p-3 mx-1">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('admin.video.detach', $video->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn p-3 mx-1 btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Video Modal-->
    <div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.video.attach') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="video">Upload Video:</label>
                            <input class="form-control" type="file" name="video" accept="video/*" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Upload Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
