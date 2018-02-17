@extends('layouts.adminLayout')
@section('title')
    <title>HomeTourism Admin : Edit Types</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit
                <small>{{$type->name}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$type->name}}</li>
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
                        <h3 class="box-title">Edit {{$type->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('admin.type.edit.submit') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Type Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" style="border-radius: 4px"
                                    value="{{$type->name}}" >
                                    <input type="hidden" name="id" value="{{$type->id}}">
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
