@extends('layout/master')


@section('content')
    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container">
            <!-- Display success message after successful form submission -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">{{trans('contact')}} </h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('message')}}'" placeholder="{{trans('message')}} "></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('name')}} '"
                                        placeholder="{{trans('name')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('email')}} '"
                                        placeholder="{{trans('email')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('subject')}}'"
                                        placeholder="{{trans('subject')}} ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{trans('send')}} </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-home"></i></span>
                        <div class="media-body">
                            <h3>Egypt, Cairo</h3>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-phone"></i></span>
                        <div class="media-body">
                            <h3>+20 1028283736</h3>
                            <p>Sat to Fri 9am to 8pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-pen"></i></span>
                        <div class="media-body">
                            <h3>lipcourses20@gmail.com</h3>
                            <p>Send us your message anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
@endsection
