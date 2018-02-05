<header id="masthead" class="site-header" role="banner">
    <div class="site-header-head clearfix">
        <div class="container header-user h-card">
            @if(Auth::guard('user')->user() )
            <div class="header-tour-package pull-right">
                <a href="{{route('user.profile')}}">
                <span>{{Auth::guard('user')->user()->name}}</span>
                <i class="fa fa-user"></i></a>
                <section class="header-tour-listing clearfix">
                    <article class="header-tour clearfix">
                        <div class="contents">
                            <span class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.user.edit.form',['id'=>Auth::guard('user')->user()->id])}}"
                                       class="btn btn-info btn-flat">Profile</a>
                                </div>
                            </span>
                            <span class="user-footer">
                                <div class="pull-right">
                                    <a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                                       class="btn btn-danger btn-flat">Sign out</a>
                                </div>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                      style="display: none;">
                            {{ csrf_field() }}</form>
                            </span>
                        </div>
                    </article>

                </section>
            </div>
            @else
                <div class="header-tour-package pull-right">
                    <span><a href="{{route('user.login')}}"><i class="lnr lnr-enter"></i> Login/Signup</a></span>&nbsp;
                    <i class="fa fa-user"></i>
                </div>

            @endif
            <div class="header-user-tel pull-right">
                <i class="fa fa-mobile-phone fa-lg"></i>
                <span class="tel">+256-775745803</span>
            </div>

            <div class="header-user-email pull-right">
                <i class="fa fa-envelope-o"></i>
                <a class="u-url" href="mailto:info@shatsi.com" >info@shatsi.com</a>
            </div>
        </div>
    </div>
    <div class="site-branding">
        <div class="container">
            <h1 class="site-title pull-left" style="color: red; font-style: italic;">
                <a href="/" rel="home">
                    {{--<img src="/assets/images/logo.png" alt="logo"/>--}}
                    HomeTourism
                </a>
            </h1>
            <nav class="main-nav pull-right" role="navigation">
                <div class="menu-primary-menu-container">
                    <ul id="menu-primary-menu" class="main-menu">

                        <li><a class="btn btn-danger btn-post" href="{{route('company.create')}}">
                                <span class="fa fa-plus-circle"></span> <b>Become a Host</b></a></li>

                        {{--<li>
                            <a href="blog.html">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="single.html">Single</a></li>
                            </ul>
                        </li>--}}

                    </ul>
                </div>
            </nav>
        </div><!-- .container -->
    </div><!-- .site-branding -->
</header><!-- .site-header -->