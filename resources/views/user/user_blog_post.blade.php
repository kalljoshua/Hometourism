@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Discusion Post</title>
@endsection
@section('content')
        <!--start detail content-->
        <section class="section-detail-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title breadcrumb-top">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ol class="breadcrumb">
                                        <li><a href="/"><i class="fa fa-home"></i></a></li>
                                        <li><a href="#">Construction</a></li>
                                        <li class="active">{{ $posts->title }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                        <div class="article-main">
                            <article class="blog-article">
                                <div class="page-title">
                                    <h2><a href="{{ url('/'.$posts->slug) }}">{{ $posts->title }}</a></h2>
                                    <ul class="author-meta">
                                        <li class="name">
                                            by <a href="#">{{ $posts->author->firstname }} {{ $posts->author->lastname }}</a>
                                        </li>
                                        <li><i class="fa fa-calendar"></i> {{ $posts->created_at->format('M d,Y \a\t h:i a') }} </li>
                                        <li><i class="fa fa-bookmark-o"></i> <a href="#" rel="category tag">Construction</a></li>
                                        <li><i class="fa fa-comments-o"></i> {{ $comments->count() }}</li>
                                    </ul>
                                </div>

                                <div class="article-media">
                                    <img width="810" height="430" src="/images/blog/user_810x400/{{$posts->image}}" alt="Learn The Truth About Real Estate Industry">
                                </div>


                                <div class="article-detail">
                                    <p>{!! $posts->body!!}</p>

                                </div>
                            </article><!--
                            <div class="next-prev-block next-prev-blog blog-section clearfix">
                                <div class="prev-box pull-left">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h3 class="media-heading"><a href="#"> Previous post</a></h3>
                                            <h4><a href="#">Villa For Sale</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="next-box pull-right">
                                    <div class="media">
                                        <div class="media-body media-middle text-right">
                                            <h3 class="media-heading"><a href="#">Next post</a></h3>
                                            <h4><a href="#">Villa For Sale</a></h4>
                                        </div>
                                        <div class="media-right">
                                            <a href="#"><i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="blog-section">
                                <h3 class="blog-section-title">Join The Discussion</h3>
                                @if(Auth::guard('agent')->check())
                                <div class="comments-form">
                                    <form method="post" action="{{route('user.comment.submit')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="on_post" value="{{ $posts->id }}">
                                    <input type="hidden" name="slug" value="{{ $posts->slug }}">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea name = "body" placeholder="Your Comments" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" name='post_comment' class="btn btn-primary">Post Comments</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <a href="{{route('agent.login.form')}}">
                                <p style="color: red;">Login to comment on this Post</p>
                                </a>
                                @endif
                            </div>

                            <div class="blog-section">
                                <h3 class="blog-section-title">Comments</h3>
                                @if ( !$comments->count() )
                                <p>No comments added yet!</p>
                                @else
                                <div class="comments-block">
                                @foreach($comments as $comment)
                                    <div class="media author-comment-this">
                                        <div class="comment-banner"></div>
                                        <div class="media-left">
                                            <figure>
                                                <a href="#"><img src="/images/agents/home_71x71/{{$comment->author->profile_picture}}" alt="img" width="60" height="60" class="img-circle"></a>
                                            </figure>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="heading">{{ $comment->author->first_name }} {{ $comment->author->last_name }}</h3>
                                            <h4 class="subheading">{{ $comment->created_at->format('M d,Y \a\t h:i a') }} </h4>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                @endif
                            </div>
                            <!--
                            <div class="blog-section">
                                <h3 class="blog-section-title">Related posts</h3>
                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="post-card-item">
                                            <figure class="item-thumb">
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/350x235" alt="chicago-05" height="235" width="350">
                                                </a>
                                                <div class="thumb-caption clearfix">
                                                    <div class="file-type pull-left"><i class="fa fa-file"></i></div>
                                                    <div class="comment-count pull-right">
                                                        <span class="count">2</span>
                                                        <i class="fa fa-comments-o"></i>
                                                    </div>
                                                </div>
                                            </figure>
                                            <div class="post-card-body">

                                                <div class="post-card-description">
                                                    <ul class="list-inline">
                                                        <li><i class="fa fa-calendar"></i>  </li>
                                                        <li><i class="fa fa-bookmark-o"></i> <a href="#" rel="category tag"Construction</a>, <a href="#" rel="category tag">Real Estate</a></li>
                                                    </ul>
                                                    <h3>Skills That You Can Learn In The Real Estate Market</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec...</p>
                                                    <a href="#" class="read">Continue reading <i class="fa fa-caret-right"></i></a>
                                                </div>
                                                <div class="post-card-author">
                                                    <div class="author-image">
                                                        <img src="http://placehold.it/40x40" class="img-circle" alt="Author Image" height="40" width="40">
                                                    </div>
                                                    <div class="author-name">
                                                        <span>by admin</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>-->

                        </div>
                    </div>
                    @include('users.right_bar')
                </div>
            </div>
        </section>
        <!--end detail content-->
    @endsection
