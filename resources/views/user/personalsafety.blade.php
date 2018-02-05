@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Personal Safety</title>
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
                            <li class="active">Personal Safety</li>
                        </ol>
                        <div class="page-title-left">
                            <h2>Personal Safety</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                    <div class="page-main">
                        <div class="article-detail">
                          <h4>Personal Safety Precautions</h4>
                            <p>The overwhelming majority of e-Nyumbani users are trustworthy and well-intentioned.
                            With billions of human interactions facilitated, the incidence of violent crime is extremely low.
                            However, please take common sense precautions online as you would offline.
                            When meeting someone for the first time, please remember to:</p>
                            <ul>
                              <li>Insist on a public meeting place like a café or office</li>
                              <li>Do not meet in a secluded place, or invite strangers into your home.</li>
                              <li>Be especially careful buying/selling highly personalized services and property</li>
                              <li>Consider making high-value exchanges at your local police station or in the lawyer’s presence</li>
                              <li>Tell a friend or family member where you're going.</li>
                              <li>Take your cell phone along if you have one.</li>
                              <li>Consider having a friend accompany you. </li>
                              <li>Trust your instincts.</li>
                            </ul>
                            <p>Taking these simple precautions helps make e-Nyumbani safer for everyone. For any frauds and spam incidents,
                              please contact us at info@nyumbaniuganda.com</p>
                            <p>For more information about personal safety online, check out these resources:</p>
                            <ul>
                              <li><a href="http://www.staysafeonline.org/" target="_blank">http://www.staysafeonline.org/</a></li>
                              <li><a href="http://www.onguardonline.gov/" target="_blank">http://www.onguardonline.gov/</a></li>
                              <li><a href="http://getsafeonline.org" target="_blank">http://getsafeonline.org</a></li>
                              <li><a href="http://wiredsafety.org" target="_blank">http://wiredsafety.org</a></li>
                            </ul>
                            <p>Enjoy the Safer Real Estate Trading!</p>

                        </div>
                    </div>
                </div>
                @include('users.right_bar')
            </div>
        </div>
    </section>
    <!--end section page body-->

@endsection
