@extends('layouts.adminLayout')
@section('title')
    <title>HomeTourism Admin : Users</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

        @include('flash::message')
            <!-- right column -->
            <div class="col-md-9" style="position: absolute">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('admin.user.edit.submit') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-6">
                                    <input type="text" name="firstname" style="border-radius: 4px" class="form-control" id="inputEmail3" value="{{$user->firstname}}">
                                    <input type="hidden" name="id" value="{{$user->id}}" />
                                </div>
                            </div><div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-6">
                                    <input type="text" name="lastname" style="border-radius: 4px" class="form-control" id="inputEmail3" value="{{$user->lastname}}">
                                </div>
                            </div><div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" style="border-radius: 4px" class="form-control" id="inputEmail3" value="{{$user->username}}">
                                </div>
                            </div><div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" name="email" style="border-radius: 4px" class="form-control" id="inputEmail3" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="old_password" style="border-radius: 4px"  class="form-control" id="inputEmail3" placeholder="Old Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" style="border-radius: 4px" class="form-control" id="inputPassword3" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Sign in</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->

        </section>

    </div>
@endsection