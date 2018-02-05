@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Login</title>
@endsection
@section('content')

    <link rel="stylesheet" href="/assets/css/login.css" type="text/css" media="all">
    <div id="tropical-banner" class=" text-center clearfix">
        <img src="assets/images/banner.jpg" alt="banner"/>
        <div class="container banner-contents clearfix">
            <h2 class="template-title p-name"><strong>Login/Register</strong></h2>
        </div>
        <div class="breadcrumb-wrapper clearfix">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/" >Home</a></li>
                    <li class="active">Login/Register</li>
                </ol>
            </div>
        </div>
        <span class="overlay"></span>
    </div>
    @include('flash::message')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="{{route('user.login.submit')}}" method="post"
                                      role="form" style="display: block;">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email Address" required tabindex="1"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2"
                                               class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" tabindex="4"
                                                       class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="{{route('user.submit')}}" method="post" role="form"
                                      style="display: none;" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" name="name" id="username" tabindex="1" class="form-control"
                                               placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                               placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="email" tabindex="1" class="form-control"
                                               placeholder="Phone Contact" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="country" id="email" tabindex="1" class="form-control"
                                               placeholder="Country of Origin" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" name="address" id="email" tabindex="1" class="form-control"
                                                  required>Full Address</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                       tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection