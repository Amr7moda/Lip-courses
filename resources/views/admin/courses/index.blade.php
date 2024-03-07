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
            <h6 class="m-0 font-weight-bold text-primary">Courses</h6>

            <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
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
                            <th>Price</th>
                            <th>Description</th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->description }}</td>

                                <td class="d-flex">
                                    <a href="{{ route('courses.show', $course->id) }}">
                                        <button class="btn btn-secondry p-3 mx-1">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
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

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Course Name:</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Course Price:</label>
                            <input class="form-control" type="text" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Course Description:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Course Image:</label>
                            <input class="form-control" type="file" name="image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="video">Course Video:</label>
                            <input class="form-control" type="file" name="video" accept="video/*" required>
                        </div>
                        <div class="form-group">
                            <label for="instructor_name">Instructor Name:</label>
                            <input class="form-control" type="text" name="instructor_name" required>
                        </div>
                        <div class="form-group">
                            <label for="instructor_image">Instructor Image:</label>
                            <input class="form-control" type="file" name="instructor_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="instructor_cv">Instructor CV:</label>
                            <input class="form-control" type="file" name="instructor_cv" accept=".pdf,.doc,.docx"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="topic_names">Topics:</label>
                            <div id="topicFieldsContainer">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="topic_names[]" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="addTopicField()">Add Topic</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function addTopicField() {
            const container = document.getElementById('topicFieldsContainer');
            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mb-3';

            const inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.className = 'form-control';
            inputField.name = 'topic_names[]';
            inputField.required = true;

            const appendButton = document.createElement('div');
            appendButton.className = 'input-group-append';

            const removeButton = document.createElement('button');
            removeButton.className = 'btn btn-outline-danger';
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', function() {
                container.removeChild(inputGroup);
            });

            appendButton.appendChild(removeButton);
            inputGroup.appendChild(inputField);
            inputGroup.appendChild(appendButton);

            container.appendChild(inputGroup);
        }
    </script>
@endsection
