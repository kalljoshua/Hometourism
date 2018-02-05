@extends('layouts.adminLayout')
@section('title')
    <title>ServiceHunt Admin : All-Categories</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Services
      <small>table</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Dashboard</a></li>
      <li class="active">All Categories</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('flash::message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">All available Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Sub-Categories</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                  <td><span class="label label-info">{{$category->created_at->format('M-d-Y')}}</span></td>
                  <td>
                    {{$category->name}}
                  </td>
                  <td>{{$category->sub_category->count()}}</td>
                  <td class="text-left">
                      <a href="{{route('admin.category.edit',['id'=>$category->id])}}"
                         class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                         title="Edit"><i class="fa fa-pencil"></i></a>
                      <a href="{{route('admin.category.delete',['id'=>$category->id])}}"
                         class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                         title="Delete"><i
                                  class="fa fa-times"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Sub-categories</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
