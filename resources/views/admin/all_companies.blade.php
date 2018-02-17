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
                            <h3 class="box-title">All available companys</h3>
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
                                    <th>Status</th>
                                    <th>Suspend</th>
                                    <th>Feature</th>
                                    {{--<th>Random</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td><span class="label label-info">{{$company->created_at->format('M-d-Y')}}</span></td>
                                        <td><img src="/images/services/featured_slider_370x202/{{$company->image}}"
                                                 class="img-square" width="40"/>
                                            {{ str_limit($company->name, $limit = 40, $end = '...') }}
                                        </td>
                                        <td>{{$company->user->name}}</td>
                                        <td> {{$company->type->name}}</td>
                                        <td>
                                            @if($company->active==1)
                                                <a class="btn btn-primary btn-xs">Approved</a>
                                            @else
                                                <a class="btn btn-warning btn-xs">Pending</a>
                                            @endif
                                        </td>
                                        <td style="text-transform: lowercase">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" id="sus-check-company{{$company->id}}"
                                                       data-property-id="{{$company->id}}"
                                                       onchange="suspendcompany({{$company->id}});">
                                                <div class="slider round"></div>
                                            </label>
                                        </td>
                                        <td style="text-transform: lowercase">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" id="rec-check-company{{$company->id}}"
                                                       data-property-id="{{$company->id}}"
                                                       onchange="recommendcompany({{$company->id}});">
                                                <div class="slider round"></div>
                                            </label>
                                        </td>
                                        {{--<td style="text-transform: lowercase">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" id="rand-check-company{{$company->id}}"
                                                       data-property-id="{{$company->id}}"
                                                       onchange="randomcompany({{$company->id}});">
                                                <div class="slider round"></div>
                                            </label>
                                        </td>--}}
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
                                    <th>Owner</th>
                                    <th>SubCategory</th>
                                    <th>Status</th>
                                    <th>Suspend</th>
                                    <th>Feature</th>
                                    {{--<th>Random</th>--}}
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
