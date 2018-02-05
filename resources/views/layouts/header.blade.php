<header id="masthead" class="site-header" role="banner">

    <div class="site-branding">
        <div class="container">
            <h1 class="site-title pull-left" style="color: red;">
                <a href="/" rel="home">
                    {{--<img src="/assets/images/logo.png" alt="logo"/>--}}
                    <b>HomeTourism</b>

                </a>
            </h1>
            <nav class="main-nav pull-right" role="navigation">
                <div class="menu-primary-menu-container">
                    <ul id="menu-primary-menu" class="main-menu">
                        @if(Auth::guard('user')->user() )
                        <li><a class="btn btn-default btn-post" href="{{route('user.profile')}}">
                                <span class="fa fa-user"></span> <b>My Account</b></a></li>
                            <li><a class="btn btn-default btn-post" href="{{route('user.logout')}}">
                                    <span class="fa fa-lock"></span> <b>Logout</b></a></li>
                        @else
                            <li>
                                <a class="btn btn-default btn-post" href="{{route('user.login')}}">
                                    <span class="fa fa-user"></span><b>Login|Signup</b></a>
                            </li>
                        @endif
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