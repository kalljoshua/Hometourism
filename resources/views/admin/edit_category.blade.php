@extends('layouts.adminLayout')
@section('title')
<title>Service Hunt Admin : Category</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit
      <small>{{$category->name}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Category</li>
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
          <h3 class="box-title">Edit Category</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('admin.category.edit.submit') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Type Name</label>
              <div class="col-sm-6">
                <input type="text" name="name" style="border-radius: 4px"
                value="{{$category->name}}" class="form-control" >
                <input name="id" type="hidden" value="{{$category->id}}"/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Textarea</label>
              <div class="col-sm-6">
                <textarea style="border-radius: 4px" class="form-control" name="description" rows="3">{{$category->description}}
                </textarea>
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
