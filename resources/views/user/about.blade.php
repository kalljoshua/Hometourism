@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : About Us</title>
@endsection
@section('content')

<!--start section page body-->
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i></a></li>
                        <li class="active">About e-NYUMBANI</li>
                    </ol>
                    <div class="page-title-left">
                        <h2>About e-NYUMBANI</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                <div class="page-main">
                    <div class="article-detail">
                        <p><strong>
                          The word "Nyumbani" is a swahili word meaning "HOME".</strong> <br/> e-Nyumbani is the online platform that helps rent, sell or buy property online everywhere anytime!
                          Founded in September of 2017 and based in Kampala, Uganda, e-Nyumbani is a trusted community marketplace for people to list, sell, buy, rent and discuss Real Estate in Uganda — online from a mobile phone or tablet.
                          Whether you want an apartment, a or house, or a villa for a month, or a single room or a plot of land, e-Nyumbani connects you to the right property owners and agents.

                        </p>
                        <hr>
                        <h3>Meet our team</h3>

                        <div class="about-team-main">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="about-team-block">
                                        <figure>
                                            <img class="aligncenter" src="/uploads/Nakana.png" alt="agent-3" width="300" height="300">
                                            <div>
                                                <strong>Nakana Joshua</strong><br>
                                                Co-Founder/C.E.O
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="about-team-block">
                                        <figure>
                                            <img class="aligncenter" src="/uploads/Moses.png" alt="agent-3" width="300" height="300">
                                            <div>
                                                <strong>Moses Ruraara</strong><br>
                                                Co-founder/C.O.O
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="about-team-block">
                                        <figure>
                                            <img class="aligncenter" src="/uploads/Nabuka.png" alt="agent-3" width="300" height="300">
                                            <div>
                                                <strong>Nabuka Joshua</strong><br>
                                                Lead Developer/C.T.O
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="about-team-block">
                                        <figure>
                                            <img class="aligncenter" src="/uploads/Akena.png" alt="agent-3" width="300" height="300">
                                            <div>
                                                <strong>Akena Kenedy</strong><br>
                                                Lead Developer
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('users.right_bar')
        </div>
    </div>
</section>
<!--end section page body-->
@endsection
