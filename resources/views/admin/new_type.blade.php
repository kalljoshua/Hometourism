@extends('layouts.adminLayout')
@section('title')
    <title>Service Hunt Admin : Types</title>
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
                <li class="active">New Type</li>
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
                        <h3 class="box-title">Add New Type</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('admin.new.type.submit') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Type Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" style="border-radius: 4px"
                                    placeholder="Enter type name"class="form-control" >
                                </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
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
