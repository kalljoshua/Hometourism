<div class="col-lg-3 col-sm-4">
    <aside class="sidebar">
        <section class="widget recent-post-widget animatedParent">
            <h5 class="widget-title animated fadeInDownShort">Recent Blog Post</h5>
            @foreach(App\Post::orderBy('created_at', 'DESC')->take(2)->get() as $post)
            <article class="post blog-post-widget clearfix animated fadeInUpShort">
                <figure class="blog-feature-img pull-right">
                    <img src="/images/blog/user_810x400/{{$post->image}}" alt="Blog Image"/>
                </figure>
                <h6 class="title"><a href="{{route('user.show.posts',['slug'=>$post->slug])}}">
                        {{$post->title}}</a></h6>
                <time datetime="2007-08-29T13:58Z"  class="post-meta">
                    <i class="fa fa-clock-o"></i> {{ $post->created_at->format('M d, Y \a\t h:i a') }}</time>
            </article>
            @endforeach

        </section>
        <section class="widget widget-text animatedParent">
            <h5 class="widget-title animated fadeInDownShort">Featured Homes</h5>
            @foreach(App\Company::where('featured', 1)->take(2)->get() as $featured)
                <article class="post blog-post-widget clearfix animated fadeInUpShort">
                    <figure class="blog-feature-img pull-right">
                        <img src="/images/services/featured_slider_370x202/{{$featured->image}}" alt="Blog Image"/>
                    </figure>
                    <h6 class="title"><a href="/{{$featured->slug}}">
                            {{$featured->name}}</a></h6>
                    <time datetime="2007-08-29T13:58Z"  class="post-meta">
                        <i class="fa fa-clock-o"></i> {{ $featured->created_at->format('M d, Y \a\t h:i a') }}</time>
                </article>
            @endforeach
        </section>
        <section class="widget contact-widget clearfix animatedParent">
            <h5 class="widget-title animated fadeInDownShort">Contact us</h5>
            <address class="animated fadeInUpShort">
                <strong> Address:</strong> Plot 1-2 Jobiah Road,
                Mukono Kampala Uganda.
            </address>
            <p class="phone-number animated fadeInUpShort"><strong>Phone:</strong>+256-775745803</p>
            <p class="email animated fadeInUpShort"><strong>Email:</strong> info@shatsi.com </p>
            <ul class="social-nav text-center clearfix animated fadeInUpShort">
                <li><a href="single-where-we-go.html#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="single-where-we-go.html#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="single-where-we-go.html#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="single-where-we-go.html#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="single-where-we-go.html#"><i class="fa fa-dribbble"></i></a></li>
            </ul>
        </section>
    </aside>
</div>