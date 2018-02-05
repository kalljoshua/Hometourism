@extends('layouts.adminLayout')
@section('title')
<title>ServiceHunt Admin : New Letter</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Dashboard</a></li>
      <li class="active">Newsletter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('flash::message')
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">NewsLetter
              <small>Create New Newsletter</small>
            </h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form action="{{route('admin.create.news.letter.submit')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" class="form-control"
                id="inputEmail3" name="title" placeholder="Title">
              </div>
              <div class="form-group">
              <textarea id="editor1" name="news-letter-editor" rows="15" cols="80">
                This is my textarea to be replaced with CKEditor.
              </textarea>
              </div>
              <div class="text-right">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">Send Letter</button>
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
<!-- /.content-wrapper -->
@endsection
