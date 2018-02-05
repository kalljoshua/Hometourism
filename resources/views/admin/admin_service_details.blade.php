@extends('layouts.adminLayout')
@section('title')
    <title>Service Hunt Admin : Services</title>
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
      <li><a href="#">Tables</a></li>
      <li class="active">All Services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('flash::message')
    <div class="row">
<!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="page-section" style="padding-top:10px;">
                    <h4 class="page-section-heading">Service</h4>
                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Overview</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="item">
                                            <div class="media media-clearfix-xs-min">
                                                <div class="media-left">
                                                    <img src="/images/properties/featured_slider_370x202/"
                                                         alt="" class="media-object" />
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading" style="text-transform: capitalize">{{$service->title}}</h4>
                                                    <div class="meta"><span><i class="fa fa-calendar-o fa-fw"></i>
                                                            {{$service->created_at->format('d M Y')}} </span>
                                                        <span><i class="fa fa-map-marker fa-fw"></i>{{$service->address}}</span></div>
                                                    <p>{{$service->description}}</p>
                                                    <p>
                                                        @if($service->active == 0)
                                                            <span class="label label-warning">Not active</span>
                                                        @endif
                                                        @if($service->active == 1)
                                                            <span class="label label-success">active</span>
                                                        @endif

                                                        @if($service->expired == 1)
                                                            <span class="label label-danger">expired</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        {{--</div>--}}
                    </div>

                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><strong>Details</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-3">
                                            <table>
                                                <tr>
                                                    <td>Title: </td>
                                                    <td style="text-transform: capitalize"><strong>{{$service->title}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Property ID: </td>
                                                    <td><strong>{{$service->id}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Status: </td>
                                                    <td>
                                                        @if($service->featured == 1)
                                                            <?php $status = 'Featured';?>
                                                        @else
                                                            <?php $status = 'Unfeatured';?>
                                                        @endif
                                                        <strong>{{$status}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created at: </td>
                                                    <td><strong>{{$service->created_at->format('d M Y')}}</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{--</div>--}}
                    </div>

                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5><strong>Address</strong></h5>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-3">
                                        <table>
                                            <tr>
                                                <td>Address: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$service->address}}</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-transform: capitalize">District: </td>
                                                <td>
                                                    &nbsp;<strong>{{$service->district}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Town: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$service->town}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Country: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$service->country}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--</div>--}}
                    </div>

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5><strong>Gallery</strong></h5>
                            </div>
                            <div class="panel-body">
                                <div class="owl-basic">

                                        <div class="item">
                                            <a>
                                                <img src="/images/properties/latest_home_and_best_property_355x240/"
                                                     alt="photo" class="img-responsive" />
                                            </a>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>



                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5><strong>Agent</strong></h5>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <table>
                                        <tr>
                                            <td>Name: </td>
                                            <td style="text-transform: capitalize">&nbsp;
                                              <strong>{{$service->user->last_name}}</strong> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-default btn-sm">Agent</a>
                        </div>
                    </div>
                </div>


                </div>

            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
    @endsection
