@extends('layouts.adminLayout')
@section('title')
    <title>HomeTourism Admin : Companies</title>
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
                <li class="active">All Companies</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All available Popular Destinations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Features</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td><span class="label label-info">{{$company->created_at->format('M-d-Y')}}</span></td>
                                        <td><img src="/images/services/featured_slider_370x202/{{$company->image}}"
                                                 class="img-square" width="40"/>
                                            {{ str_limit($company->title, $limit = 40, $end = '...') }}
                                        </td>
                                        <td>{{$company->category->name}}</td>
                                        <td> {{$company->features->count()}}</td>


                                        <td class="text-right">
                                            <a href="{{route('admin.company.show',['id'=>$company->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip"
                                               data-placement="top" title="View">
                                                <i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.company.delete',['id'=>$company->id])}}"
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Features</th>
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
