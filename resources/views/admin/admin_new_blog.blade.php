@extends('layouts.adminLayout')
@section('title')
    <title>Service Hunt Admin : Create-Blog</title>
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

    @include('flash::message')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">CK Editor
                                <small>Advanced and full of features</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                        data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <form ole="form"
                                  action="{{route('admin.create.post.submit')}}" method="post"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="inputEmail3" name="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="inputEmail3" name="slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="photo">
                                </div>

                                <div class="form-group col-sm-12">
                                    <div class="radio radio-primary">
                                        <input style="padding-right: 40%;" type="radio" name="active" id="radio12" value="1" checked>
                                        <label for="radio12">Activate</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="active" id="radio11" value="0">
                                        <label for="radio11">Deactivate</label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                <textarea id="editor1" name="blog-editor" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                                </textarea>
                                </div>
                                <div class="text-right">
                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-primary">Submit Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection