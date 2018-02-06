@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : ABOUT SHATSI HOST HOMES</title>
@endsection
@section('content')

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                <h2 class="template-title p-name"><strong>ABOUT SHATSI HOST HOMES</strong></h2>
            </div>
            <div class="breadcrumb-wrapper clearfix">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="/" >Home</a></li>
                        <li class="active">ABOUT SHATSI HOST HOMES</li>
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

                            <div class="entry-contents animatedParent clearfix">
                                <h4 class="entry-title animated fadeInUpShort">
                                    <a href="#">ABOUT SHATSI HOST HOMES</a></h4>
                                <p class="animated fadeInUpShort">
                                    Shatsi Host Homes is an online market place where you can Search and Rent
                                    a homes for temporally accommodation during tour or study trips, vacations, or honeymoons.</p>
                                    <p>No matter what kind of home or room you have to share, Shatsi Host Homes
                                        makes it simple and secure to earn money and reach millions of travelers
                                        looking for unique places to stay, just like yours.</p>
                                    <p>With Shatsi Host Homes, you’re in full control of your availability,
                                        prices, house rules, and how you interact with guests.
                                        You can set check-in times and handle the process however you like.</p>
                                    <p>Shatsi Host Homes offers tools, hospitality tips, 24/7 support, and an online
                                        community of experienced hosts for questions and sharing ideas for success.
                                    Shatsi Host Homes is a Company of Shatsi Group LTD
                                </p>

                                <h4>CONTACTS</h4>

                                <p>Email: info@shatsi.com</p>
                                <p>Mobile: +256-775745803</p>
                                <p>WhatsApp: +256-779641269</p>
                                <p>Location: Plot 1-2 Jobiah Road Mukono Kampala Uganda.</p>

                            </div>
                        </article>


                    </div>
                    @include('user.right_bar')
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection
