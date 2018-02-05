<footer id="colophon" class="site-footer animatedParent" role="contentinfo">
    <div class="footer-wrapper clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <section class="widget widget_pages animated flipInX slower clearfix">
                        <h5 class="widget-title">Navigation</h5>
                        <ul>
                            <li class="page_item page-item-17"><a href="/">Home</a></li>
                            <li class="page_item page-item-19">
                                <a href="{{route('user.about')}}">About Us</a></li>
                            <li class="page_item page-item-7">
                                <a href="home-var-two.html#">Contacts</a></li>
                            <li class="page_item page-item-32">
                                <a href="{{route('services.all')}}">Host Homes</a></li>
                            <li class="page_item page-item-12">
                                <a href="{{route('user.faq')}}">FAQ</a></li>
                            <li class="page_item page-item-11">
                                <a href="{{route('user.blog.posts')}}">Blog</a></li>
                        </ul>
                    </section>
                </div>
                <div class="col-sm-4">
                    <section class="widget widget_mc4wp_widget animated flipInX slower clearfix">
                        <h5 class="widget-title">stay in the tourism</h5>
                        <div id="mc4wp-form-1" class="form mc4wp-form clearfix">
                            <p>Receive monthly cool ideas, inspiring stories,
                                great reviews and offers.</p>
                            <form action="/subscribe-to-newsletter" method="post" class="clearfix">
                                {{ csrf_field() }}
                                <input type="email" id="mc4wp_email" name="email" placeholder="Your email address" required="">
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                        <!-- / MailChimp for WP Plugin -->
                    </section>
                </div>
                <div class="col-sm-4">
                    <div class="widget">
                        <h5 class="widget-title">Latest Reviews</h5>
                        <div class="twitter-content clearfix">
                            <ul class="twitter-list">
                                @foreach(App\Review::orderBy('created_at','DESC')->take(2)->get() as $review)
                                    <li class="clearfix">
                                  <span>
                                      {{str_limit($review->review, $limit = 40, $end = '...')}} via
                                      @<a href="/{{$review->company->slug}}">{{$review->company->name }}</a>
                                      by @if(sizeof($review->user)>0) {{$review->user->first_name}} @else anonymus @endif
                                  </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-info animated pulse col-md-12" style="background-color: black">
                <div class="pull-left col-sm-8" style="background-color: black">
                    <p>Copyright © <?php echo date('Y');?> Reserved by- Shatsi Group LTD.</p>
                </div>
                <div class="pull-right col-sm-4" style="background-color: black">
                    <a href="{{route('user.termsofUse')}}">Terms of Use</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{route('user.privacy')}}">Privacy Policy</a>
                </div>
    </div><!-- .site-info -->
</footer><!-- .site-footer -->