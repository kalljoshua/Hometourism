@extends('...layouts.user_layout')
@section('title')
  <title>HomeTourism : Blog Listings</title>
@endsection
@section('content')
    <!--start section page body-->
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
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="blog-page clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        @foreach($posts as $post)
                        <article class="blog-post animatedParent clearfix">
                            <figure class="blog-feature-img text-center animated fadeInLeftShort">
                                <a href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                                    <img src="/images/blog/user_810x400/{{$post->image}}" alt="Image"/></a>
                            </figure>
                            <div class="entry-contents animated fadeInRightShort clearfix">
                                <h4 class="entry-title">
                                    <a href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                                        {{$post->title}}</a></h4>
                                <p>{!! str_limit($post->body, $limit = 250, $end = '...') !!}</p>
                                <div class="post-meta clearfix">
                                    <span class="date pull-left"><i class="fa fa-clock-o"></i>
                                        &nbsp; {{ $post->created_at->format('M d, Y \a\t h:i a') }}  &nbsp; | &nbsp; &nbsp;</span>
                                    <span class="author pull-left">
                                        <i class="fa fa-user"></i>&nbsp; By {{$post->author->username}}</span>
                                    <span class="comment-count pull-right">{{$post->comments->count()}} Comments</span>
                                </div>
                            </div>
                            <a class="read-more animated rotateIn slow"
                               href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                                <i class="fa fa-angle-right"></i></a>
                        </article>
                        @endforeach
                        <div id="pagination" class="text-center animatedParent clearfix">
                            <?php echo $posts->render(); ?>
                        </div>
                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection
