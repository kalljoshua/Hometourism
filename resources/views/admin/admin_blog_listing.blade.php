@extends('layouts.adminLayout')
@section('title')
    <title>ServiceHunt Admin : Blog Listings</title>
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
                            <!-- Progress table -->
                            <div class="table-responsive">
                                <table class="table" width="600px" >
                                    <thead>
                                    <tr>
                                        <th>Date added</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Body</th>
                                        <th>Active</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="responsive-table-body">
                                    <?php $i = 1; ?>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td><span class="label label-default">{{$post->created_at->format('M-d-Y')}}</span></td>
                                            <td>
                                                <img src="/images/blog/admin_listing_99x99/{{$post->image}}"
                                                     width="40" class="img-circle" />
                                            </td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->slug}}</td>
                                            <td width="250">{!! str_limit($post->body, $limit = 40, $end = '...') !!}</td>
                                            <td>
                                                @if($post->active == 0)
                                                    <span class="label label-warning">Not active</span>
                                                @endif
                                                @if($post->active == 1)
                                                    <span class="label label-success">active</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.post.edit.form',['id'=>$post->id])}}"
                                                   class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                                                   title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('admin.post.delete',['id'=>$post->id])}}"
                                                   class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                                                   title="Delete"><i
                                                            class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i = $i+1; ?>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- // Progress table -->
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
