@extends('layouts.adminLayout')
@section('title')
    <title>Service Hunt Admin : Users</title>
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
                <li class="active">Newsletter Subsribers</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          @include('flash::message')
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Newsletter Subsribers</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                <?php $i = 1; ?>
                                @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><span class="label label-default">{{$subscriber->created_at->format('M-d-Y')}}</span></td>
                                    <td style="text-transform: lowercase">{{$subscriber->email}}</td>

                                    <td class="text-left">
                                        <a href="#"
                                           class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                                           title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#"
                                           class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                                           title="Delete"><i
                                                    class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                    <?php $i = $i+1; ?>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
    </section>

    </div>
    @endsection
