@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : Profile</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                @include('user.search')
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="tour-page clearfix">
            <div class="container">

                <div class="row">
                    @include('user.left_bar')
                    <div class="col-sm-9 page-content">
                        <div class="inner-box">
                            <div class="welcome-msg">
                                <h3 class="page-sub-header2 clearfix no-padding">Hello {{$user->name}} </h3>
                                <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM
                                    [UK time (GMT + 6:00hrs)]</span>
                            </div>
                            <div id="accordion" class="panel-group" style="background-color: #F8F8F8">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <h4 class="panel-title"> <a href="account-home.html#collapseB1" data-toggle="collapse">
                                                <b>My details</b> </a> </h4>
                                    </div>
                                    <div class="panel-collapse collapse in" id="collapseB1">
                                        <div class="panel-body" style="background-color: #F8F8F8">
                                            <form role="form" action="{{route('user.edit.submit')}}" method="post"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                                 style="width: 200px; height: 150px;">
                                                                <img src="/images/users/profile_330x330/{{$user->image}}" alt=""/>
                                                            </div>
                                                            <div>
                                                            <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">
                                                            Change profile image </span>
                                                            <span class="fileinput-exists">
                                                            Change </span>
                                                            <input type="file" name="edit_photo">
                                                            </span>
                                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                    Remove </a>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Full Name</label>
                                                    <input class="form-control" value="{{$user->name}}" name="name"
                                                           type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Country</label>
                                                    <input class="form-control" value="{{$user->country}}" name="country"
                                                           type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input class="form-control" value="{{$user->email}}" name="email"
                                                           type="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Phone" class="control-label">Phone</label>
                                                    <input class="form-control" value="{{$user->phone}}" name="phone"
                                                           id="Phone" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Phone" class="control-label">Address</label>
                                                    <input class="form-control" value="{{$user->address}}" name="address"
                                                           id="Phone" type="text">
                                                </div>
                                                <div class="form-group hide">
                                                    <label class="control-label">Facebook account map</label>
                                                    <div class="form-control"> <a class="link"
                                                                                  href="#">Jhone.doe</a>
                                                        <a class=""> <i class="fa fa-minus-circle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-common">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <h4 class="panel-title"> <a aria-expanded="false" class="collapsed"
                                                                    href="account-home.html#collapseB2"
                                                                    data-toggle="collapse"> <b>Settings</b> </a> </h4>
                                    </div>
                                    <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                                        <div class="panel-body" style="background-color: #F8F8F8">
                                            <form role="form" method="post" action="{{route('user.update.submit')}}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input class="form-control" id="oldpass" name="oldpass"
                                                           placeholder="Old Password" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input class="form-control" id="newpass" name="newpass"
                                                           placeholder="New Password" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-common">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>



    </div><!-- .site-content -->

@endsection

