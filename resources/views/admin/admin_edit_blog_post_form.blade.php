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
                <small>Edit post</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit post</li>
            </ol>
        </section>

    @include('flash::message')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Edit post</h3>
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
                                  action="{{ route('admin.post.edit.submit') }}" method="post"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="inputEmail3" value="{{$post->title}}" name="title">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           id="inputEmail3" value="{{$post->slug}}" name="slug">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group">
                                <textarea id="editor1" name="blog-editor" rows="10" cols="80">
                                            {!!  $post->body !!}
                                </textarea>
                                </div>
                                <div class="text-right">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$post->id}}" />
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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