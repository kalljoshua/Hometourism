@extends('...layouts.user_layout')
@section('title')
  <title>HomeTourism : {{ $posts->title }}</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                @include('user.search')
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li><a href="{{route('user.blog.posts')}}" >Blog</a></li>
                        <li class="active">{{ $posts->title }}</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="blog-single clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <article class="blog-post">
                            <figure class="feature-img">
                                <img src="/images/blog/user_810x400/{{$posts->image}}" alt="Image"/>
                            </figure>
                            <div class="entry-contents animatedParent clearfix">
                                <h4 class="entry-title animated fadeInUpShort">
                                    <a href="#">{{ $posts->title }}</a></h4>
                                <p class="animated fadeInUpShort">{!! $posts->body!!}</p>
                                <div class="post-meta animated flipInX clearfix">
                                    <span class="date pull-left">
                                        <i class="fa fa-clock-o"></i>&nbsp;
                                        {{ $posts->created_at->format('M d, Y \a\t h:i a') }}  &nbsp; | &nbsp; &nbsp;</span>
                                    <span class="author pull-left">
                                        <i class="fa fa-user"></i>&nbsp; By {{$posts->author->username}}</span>
                                    <span class="comment-count pull-right">{{$posts->comments->count()}} Comments</span>
                                </div>
                            </div>
                        </article>
                        <section class="comments animatedParent clearfix">
                            @if ( $comments->count()<1 )
                                <p>No comments added yet!</p>
                            @else
                            <h3 class="comments-title">{{$posts->comments->count()}} comments</h3>
                                @foreach($comments as $comment)
                                    <?php $user = App\User::where('id',$comment->user_id)->first();?>
                                    <article class="clearfix animated fadeInUpShort">
                                        <div class="comment-wrap clearfix">
                                            <a class="avatar" href="single.html#">
                                                <img alt="avatar" src="/assets/images/avatar.jpg">
                                                <time datetime="2007-08-29T13:58Z" >
                                                {{ $comment->created_at->format('M d, Y \a\t h:i a') }}</time>
                                            </a>
                                            <div class="comment-detail-wrap clearfix">
                                                <div class="comment-meta clearfix">
                                                    {{--<a class="comment-reply-link" href="single.html#"
                                                       aria-label="Reply to Lloyd Budd"><i class="fa fa-reply"></i>&nbsp; Reply</a>--}}
                                                    <h5 class="author fn"> <a href="single.html#" class="url">
                                                            {{ $user->name }}</a>  </h5>

                                                </div>

                                                <div class="comment-body entry-content">
                                                    <p>{{ $comment->body }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            @endif
                        </section>
                        <section id="respond" class="contact-from animatedParent clearfix">
                            <h3 class="respond-title animated growIn slower">leave a reply</h3>
                            @if(Auth::guard('user')->check())
                                <form method="post" action="{{route('user.comment.submit')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="on_post" value="{{ $posts->id }}">
                                    <input type="hidden" name="slug" value="{{ $posts->slug }}">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <textarea name = "body"
                                                          placeholder="Your Comments" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" id="submit" class="btn btn-common">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <a href="{{route('user.login')}}">
                                    <p style="color: red;">Login to comment on this Post</p>
                                </a>
                            @endif
                        </section>
                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
    @endsection
