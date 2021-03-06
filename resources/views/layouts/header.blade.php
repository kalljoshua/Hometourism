<header id="masthead" class="site-header" role="banner">

    <div class="site-branding">
        <div class="container">
            <h1 class="site-title pull-left" style="color: red;">
                <a href="/" rel="home">
                    {{--<img src="/assets/images/logo.png" alt="logo"/>--}}
                    <b> ShatsiBed</b>

                </a>
            </h1>
            <nav class="main-nav pull-right" role="navigation">
                <div class="menu-primary-menu-container">
                    <ul id="menu-primary-menu" class="main-menu">
                        <li>
                            <a class="btn btn-default btn-post" href="#" data-toggle="modal"
                               data-target="#booking-popup" style="color: black">
                                <span class="fa fa-clipboard"></span> REQUEST A HOST HOME</a>
                        </li>
                        <li><a class="btn btn-danger btn-post" href="{{route('company.create')}}">
                                <span class="fa fa-plus-circle"></span> <b>Become a Host</b></a></li>
                        @if(Auth::guard('user')->user() )
                        <li><a class="btn btn-default btn-post" href="{{route('user.profile')}}"
                               style="color: black">
                                <span class="fa fa-user"></span> <b> My Account</b></a></li>
                            <li><a class="btn btn-default btn-post" href="{{route('user.logout')}}"
                                   style="color: black">
                                    <span class="fa fa-lock"></span> <b> Logout</b></a></li>
                        @else
                            <li>
                                <a class="btn btn-default btn-post" href="{{route('user.login')}}"
                                style="color: black">
                                    <span class="fa fa-user"></span> Login | Signup</a>
                            </li>
                        @endif

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