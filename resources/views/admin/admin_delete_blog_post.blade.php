@extends('layouts.adminLayout')
@section('title')
    <title>ServiceHunt Admin : Delete Blog Post</title>
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog posts
                <small>table</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Blog posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Blog posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

                                    <h4 class="page-section-heading">Delete Blog Post</h4>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p style="text-align: center;">Are you sure you want to delete the post?</p>
                                            <table class="table" >
                                                <tr>
                                                    <td>
                                                        <img src="/images/blog/admin_listing_99x99/{{$post->image}}"
                                                             width="40" class="img-circle" />
                                                        {{$post->title}}
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                           onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>

                                                        <form id="delete-form" action="{{ route('admin.post.destroy') }}"
                                                              method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$post->id}}" name="id">
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

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
