@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Community Discussion</title>
@endsection
@section('content')
    <!--start section page body-->
    <section id="section-body">

        <!--start detail content-->
        <section class="section-detail-content blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                        <div class="article-main">
                            @foreach($posts as $post)
                                <article class="blog-article">
                                    <div class="article-media">
                                        <img src="/images/blog/user_810x400/{{$post->image}}" alt="Blog Image" width="810" height="400">
                                    </div>
                                    <div class="article-detail">
                                        <h1>{{$post->title}}</h1>
                                        <p>{!! str_limit($post->body, $limit = 250, $end = '...') !!}</p>
                                    </div>
                                    <div class="article-footer">

                                        <ul class="author-meta">
                                            <li>
                                                <img src="/images/agents/contact_agent_74x74/{{$post->author->profile_picture}}" alt="Auther Image" width="40" height="40" class="meta-image">
                                                by {{$post->author->username}}
                                            </li>
                                            <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('M d,Y \a\t h:i a') }} </li>
                                        </ul>

                                        <div class="article-footer-right">
                                            <a href="{{route('user.show.posts',['slug'=>$post->slug])}}" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            <hr>
                            <!--start pagination-->
                                <div class="text-center">
                                    <?php echo $posts->render(); ?>
                                </div>
                            <!--end pagination-->
                        </div>
                    </div>
                    @include('users.right_bar')
                </div>
            </div>
        </section>
        <!--end detail content-->

    </section>
    <!--end section page body-->
@endsection
