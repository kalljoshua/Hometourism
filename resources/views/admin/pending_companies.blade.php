@extends('layouts.adminLayout')
@section('title')
    <title>ServiceHunt Admin : Pending Companies</title>
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Companies
                <small>table</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">All Companiess</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All available Companies</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>SubCategory</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td><span class="label label-info">{{$company->created_at->format('M-d-Y')}}</span></td>
                                        <td><img src="/images/services/featured_slider_370x202/{{$company->image}}" class="img-circle" width="40"/>
                                            {{$company->name}}
                                        </td>
                                        <td>{{$company->user->name}}</td>
                                        <td> {{$company->type->name}}</td>
                                        <td>
                                            <div class="timeline-footer">
                                                <a href="{{route('admin.company.approve',['id'=>$company->id])}}" class="btn btn-info btn-xs">Approve</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>SubCategory</th>
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
