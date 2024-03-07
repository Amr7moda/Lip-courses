@extends('layout/master')

@section('page-script')
    <script>
        const signUpButton = document.getElementById("signUp");
        const signInButton = document.getElementById("signIn");
        const container = document.getElementById("container");

        const instructorForm = document.getElementById("instructorForm");
        const studentForm = document.getElementById("studentForm");


        signUpButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
            instructorForm.classList.remove('d-none');
            studentForm.classList.add('d-none');
        });

        signInButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
            instructorForm.classList.add('d-none');
            studentForm.classList.remove('d-none');

        });

        function addTopicField() {
            const container = document.getElementById('topicFieldsContainer');
            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mb-3';

            const inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.className = 'form-control m-0';
            inputField.name = 'materials_names[]';
            inputField.required = true;

            const appendButton = document.createElement('div');
            appendButton.className = 'input-group-append';

            const removeButton = document.createElement('button');
            removeButton.className = 'btn btn-outline-danger';
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.setAttribute('style', 'padding:10px !important');
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

@section('content')
    <div class="container apply-form" id="container">
        <div class="form-container sign-up-container py-3">
            <!-- Display general form submission error, if any -->
            @if (count($errors) != 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Display success message after successful form submission -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('formSubmit') }}" method="POST" id="instructorForm">
                @csrf
                <h1 style="color: black">{{trans('Apply as Instructor')}} </h1>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">{{ trans('name') }}</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-group col">
                        <label for="email">{{ trans('email') }}</label>
                        <input type="email" name="email" id="email" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="phone">{{ trans('phone') }}</label>
                        <input type="text" name="phone" id="phone" />
                    </div>

                    <div class="form-group col">
                        <label for="universty">{{ trans('universty') }}</label>
                        <input type="text" id="universty" name="universty" />
                    </div>
                </div>
                <button>{{trans('Sign Up')}} </button>
            </form>
        </div>

        <div class="form-container sign-in-container py-3">
            <!-- Display general form submission error, if any -->
            @if (count($errors) != 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Display success message after successful form submission -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('formSubmit') }}" method="POST" id="studentForm">
                @csrf
                <h1 style="color: black">{{trans('Apply as Student')}} </h1>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">{{ trans('name') }}</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-group col">
                        <label for="email">{{ trans('email') }}</label>
                        <input type="email" name="email" id="email" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="phone">{{ trans('phone') }}</label>
                        <input type="text" name="phone" id="phone" />
                    </div>

                    <div class="form-group col">
                        <label for="universty">{{ trans('universty') }}</label>
                        <input type="text" id="universty" name="universty" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="country">{{ trans('country') }}</label>
                        <input type="text" id="country" name="country" />
                    </div>

                    <div class="form-group col">
                        <label for="faculty">{{ trans('faculty') }}</label>
                        <input type="text" id="faculty" name="faculty" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="materials_names">{{ trans('materials') }}</label>
                        <div id="topicFieldsContainer">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control m-0" name="materials_names[]" required>
                                <div class="input-group-append">
                                    <button class="btn " type="button" style="padding: 10px !important;"
                                        onclick="addTopicField()">{{ trans('add.material') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col" style="text-align: start">
                        <label for="">{{ trans('course.type') }}</label>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="courseType1" name="courseType" class="custom-control-input">
                                <label class="custom-control-label" for="courseType1">{{ trans('private') }}</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="courseType2" name="courseType" class="custom-control-input">
                                <label class="custom-control-label" for="courseType2">{{ trans('group') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col" style="text-align: start">
                        <label for="">{{ trans('material.type') }}</label>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="materialType1" name="materialType"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="materialType1">{{ trans('full') }}</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="materialType2" name="materialType"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="materialType2">{{ trans('part') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="year">{{ trans('year') }}</label>
                        <input type="text" id="year" name="year" />
                    </div>

                    <div class="form-group col">
                        <label for="age">{{ trans('age') }}</label>
                        <input type="number" id="age" name="age" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="nationalty">{{ trans('nationalty') }}</label>
                        <input type="text" id="nationalty" name="nationalty" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="gender1" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="gender1">{{ trans('male') }}</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="gender2" name="gender" class="custom-control-input">
                                <label class="custom-control-label" for="gender2">{{ trans('female') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="whats">{{ trans('whatsapp.number') }}</label>
                        <input type="text" id="whats" name="whats" />
                    </div>

                    <div class="form-group col">
                        <label for="telegram">{{ trans('telegram.number') }}</label>
                        <input type="text" id="telegram" name="telegram" />
                    </div>
                </div>

                <button>{{trans('Sign Up')}} </button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>{{trans('Hello, Friend!')}} </h1>
                    <p>{{trans('Enter your personal details and start journey with us')}} </p>
                    <button class="ghost" id="signIn">{{trans('Apply as Student')}} ? </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>{{trans('Hello, Friend!')}}</h1>
                    <p>{{trans('Enter your personal details and start journey with us')}}</p>
                    <button class="ghost" id="signUp">{{trans('Apply as Instructor')}} ?</button>
                </div>
            </div>
        </div>
    </div>
@endsection
