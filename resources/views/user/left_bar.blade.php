<div class="col-md-3 col-sm-4 animatedParent">
    <section class="advance-tour-filter animated fadeInRightShort clearfix">
        <h5 class="widget-title">filter the result</h5>
        <div class="search widget clearfix">
            <form method="get"  class="search-form" action="where-we-go.html#">
                <div>
                    <input type="text" value="" name="s" class="search-text">
                    <input type="submit" class="search-submit" value="">
                    <i class="fa fa-search"></i>
                </div>
            </form>
        </div>
        <fieldset>
            <div class="collapse-box">
                <h5 class="collapset-title no-border">My Classified
                    <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified">
                        <i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                    <ul class="acc-list">
                        <li class="active">
                            <a href="{{route('user.profile')}}">
                                <i class="fa fa-home"></i> Personal Home</a>
                        </li>

                        <li class="">
                            <a href="#" data-toggle="modal"
                               data-target="#modal-default-experience">
                                <i class="fa fa-briefcase"></i> User Experience</a>
                        </li>


                        <li class="">
                            <a href="{{route('user.profile.edit')}}">
                                <i class="fa fa-user"></i> user Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="collapse-box">
                <h5 class="collapset-title">My Listings <a aria-expanded="true"
                                                           class="pull-right" data-toggle="collapse"
                                                           href="account-home.html#myads">
                        <i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                    <ul class="acc-list">
                        <li>
                            <a href="{{route('user.profile')}}">
                                <i class="fa fa-credit-card"></i> My Ads</a>
                        </li>
                        <li>
                            <a href="{{route('user.favourites',['userId' => Auth::guard('user')->id()])}}">
                                <i class="fa fa-heart-o"></i> Favourite Ads</a>
                        </li>
                        <li>
                            <a href="{{route('user.pending',['userId' => Auth::guard('user')->id()])}}">
                                <i class="glyphicon glyphicon-hourglass"></i> Pending Approval </a>
                        </li>
                    </ul>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <div class="collapse-box">
                <h5 class="collapset-title">Listing Orders <a aria-expanded="true" class="pull-right"
                                                              data-toggle="collapse" href="#orders">
                        <i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="orders" class="panel-collapse collapse in">
                    <ul class="acc-list">
                        <?php
                        $orders = App\ServiceRequest::where('type',1)->get();
                        ?>
                        @foreach($orders as $order)
                            @if($order->company->user_id == Auth::guard('user')->id())
                                <li>
                                    <a href="#" data-toggle="modal"
                                       data-target="#modal-default-order">
                                        <i class="fa fa-clipboard"></i> {{$order->name}}</a>
                                </li>

                            @endif

                                <div class="modal fade" id="modal-default-order">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <span class="text-center"><h4><b>Booking Details</b></h4></span>
                                            <aside class="panel panel-body panel-details" style="padding-left: 70px">

                                                <p class="no-margin"><strong>Client Name:</strong>
                                                    <a href="#"> {{$order->name}} </a></p></li>

                                                <p class="no-margin"><strong>Client Contact:</strong>
                                                    <a href="#">{{$order->contact}}</a> </p>

                                                <p class="no-margin"><strong>Client Age:</strong>
                                                    <a href="#">{{$order->age}}</a> </p>

                                                <p class="no-margin"><strong>Period of Stay:</strong>
                                                    <a href="#">{{$order->period}}</a> </p>

                                                <p class=" no-margin "><strong>Email
                                                        Address:</strong>
                                                    <a href="#">{{$order->email}}</a></p>

                                                <p class="no-margin"><strong>Number of Guests:</strong>
                                                    <a href="#">{{$order->guests}}</a> </p>

                                                <p class="no-margin"><strong>Preferred Location:</strong>
                                                    <a href="#">{{$order->location}}</a></p>

                                                <p class="no-margin"><strong>Order Date:</strong>
                                                    <a href="#">{{$order->created_at}}</a></p>

                                                <p class="no-margin"><strong>Expectations:</strong>
                                                    <a href="#">{{$order->expectations}}</a></p>

                                            </aside>
                                            <div class="modal-footer">
                                                <button type="button" class="btn-sm btn-danger pull-left"
                                                        data-dismiss="modal">
                                                    X
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                        @endforeach
                    </ul>
                </div>
            </div>
        </fieldset>
        <fieldset class="range-filter">
            <div class="collapse-box">
                <h5 class="collapset-title">Terminate Account
                    <a aria-expanded="true" class="pull-right" data-toggle="collapse"
                       href="account-home.html#close"><i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                    <ul class="acc-list">
                        <li>
                            <a href="{{route('account.close')}}"><i class="fa fa-close"></i>
                                Close Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </fieldset>
    </section>
</div>



<div class="modal fade" id="modal-default-experience">
    <div class="modal-dialog">
        <div class="modal-content col-md-12">
            <form method="post" action="{{route('submit.experience')}}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title">User Experience</h5>
                </div>
                <div class="modal-body col-md-12 col-sm-12">
                    <div class="form-group">
                        <div class="input-icon">
                            <input name="user_id" value="{{Auth::guard('user')->id()}}"
                                   type="hidden"/>
                            <label>User Experience: </label>
                            <textarea rows="3" class="form-control" name="details"
                                      placeholder="Enter request info" type="text">User Experience....
                                                                </textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-sm btn-danger pull-left"
                            data-dismiss="modal">
                        X
                    </button>
                    <input type="submit" class="btn-sm btn-primary" value="Submit"></input>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

