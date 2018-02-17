@extends('...layouts.user_layout')
@section('title')
    <title>HomeTourism : New Home</title>
@endsection
@section('content')

    <style rel="stylesheet" >
        .drop-area{
            width:100px;
            height:25px;
            border: 1px solid #999;
            text-align: center;
            padding:10px;
            cursor:pointer;
        }
        #dvPreview img{
            width:100px;
            height:100px;
            margin:5px;
        }
        canvas{
            border:1px solid red;
        }
        </style>

    <div id="content" class="site-content">
        <div id="tropical-banner" class=" text-center clearfix">
            <img src="/assets/images/banner.jpg" alt="banner"/>
            <div class="container banner-contents clearfix">
                @include('user.search')
            </div>
            <span class="overlay"></span>
        </div>
        @include('flash::message')
        <section class="checkout-page">
            <div class="container" >
                <div class="row" style="align-items: center; padding-left: 1%; ">
                    <div class="col-md-12 col-sm-12" style="align-content: center;">
                        <form action="{{route('company.submit')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3 class="entry-title title">give tour details</h3>
                            <section class="contact-from clearfix animatedParent">
                                <p class="form-address">
                                    <label for="address">Home Name <span class="required">*</span></label>
                                    <input id="address" name="name" type="text" value="" required="required">
                                </p>
                                <p class="form-name">
                                    <label for="fname">Address <span class="required">*</span></label>
                                    <input id="fname" name="address" type="text" value="" required="required">
                                </p>
                                <p class="form-name">
                                    <label for="lname">Price/Cost <span class="required">*</span></label>
                                    <input id="lname" placeholder="Price in USD" name="price" type="text" value=""
                                           required="required">
                                </p>
                                <p class="form-email">
                                    <label for="email">Number Of Rooms <span class="required">*</span></label>
                                    <select name="rooms" required>
                                        <option value="">Number of rooms</option>
                                        <option value="1">1 Room</option>
                                        <option value="2">2 Rooms</option>
                                        <option value="3">3 Rooms</option>
                                        <option value="4">4 Rooms</option>
                                        <option value="5">5 Rooms</option>
                                    </select>
                                </p>
                                <p class="form-email">
                                    <label for="email">Select Type <span class="required">*</span></label>
                                    <select name="type" required>
                                        <option value="">Select Home Type</option>
                                        @foreach(App\Type::all() as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </p>

                                <p class="form-name">
                                    <label for="lname">Country <span class="required">*</span></label>
                                    <input id="lname" name="country" list="countries" type="text" value="" required="required">
                                </p>
                                <p class="form-comment">
                                    <label for="comment">Description</label>
                                    <textarea id="comment" name="description" cols="45" rows="5"></textarea>
                                </p>

                                <p class="form-comment">
                                    <label for="comment">Listing Images</label>

                                <?php for($i=1; $i<=4; $i++){?>
                                <div class="form-group ">
                                    <div class="col-md-3">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                 style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                            </div>
                                            <div>
													<span class="btn btn-default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="image[]">
													</span>
                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>

                                </p>

                            </section>
                            <div class="fields-wrap animatedParent clearfix">
                                <h5 class="title animated fadeInUpShort">extra services</h5>
                                <fieldset class="checkout-select clearfix animated fadeInDownShort">
                                    <label for="extra">how many Adults</label>
                                    <select name="adults" id="extra">
                                        <option value="">No Adults</option>
                                        <option value="1">1 Adult</option>
                                        <option value="2">2 Adults</option>
                                        <option value="3">3 Adults</option>
                                        <option value="4">4 Adults</option>
                                        <option value="5">5 Adults</option>
                                        <option value="6">6 Adults</option>
                                        <option value="7">7 Adults</option>
                                    </select>
                                </fieldset>
                                <fieldset class="checkout-select clearfix animated fadeInDownShort">
                                    <label for="c-service">how many Children</label>
                                    <select name="children" id="c-service">
                                        <option value="">No Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                        <option value="4">4 Children</option>
                                        <option value="5">5 Children</option>
                                        <option value="6">6 Children</option>
                                        <option value="7">7 Children</option>
                                    </select>
                                </fieldset>
                                <fieldset class="checkout-select clearfix animated fadeInDownShort">
                                    <label for="extra">Bathrooms</label>
                                    <select name="bathrooms" id="extra">
                                        <option selected value="">No Bathrooms</option>
                                        <option value="1">1 Bathroom</option>
                                        <option value="2">2 Bathroom</option>
                                        <option value="3">3 Bathroom</option>
                                        <option value="4">4 Bathroom</option>
                                        <option value="5">5 Bathroom</option>
                                    </select>
                                </fieldset>
                                <fieldset class="checkout-select clearfix animated fadeInDownShort">
                                    <label for="c-service">Toilets</label>
                                    <select name="toilets" id="c-service">
                                        <option selected value="">No Toilets</option>
                                        <option value="1">1 Toilet</option>
                                        <option value="2">2 Toilets</option>
                                        <option value="3">3 Toilets</option>
                                        <option value="4">4 Toilets</option>
                                        <option value="5">5 Toilets</option>
                                    </select>
                                </fieldset>
                            </div>
                            <fieldset class="checkout-checkbox animatedParent clearfix">
                                <label class="animated fadeInUpShort">Features/Neighbourhood</label>
                                <ul class="checkbox-radio-listing animated fadeInDownShort">
                                    <li>
                                        <input type="checkbox" id="d0" name="features[]" value="wifi">
                                        <label for="d0"><span></span>Wifi</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d1" name="features[]" value="mall">
                                        <label for="d1"><span></span>Shopping Mall</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d2" name="features[]" value="hospital">
                                        <label for="d2"><span></span>Hospital</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d3" name="features[]" value="water">
                                        <label for="d3"><span></span>Water Access</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d4" name="features[]" value="lake">
                                        <label for="d4"><span></span>Lake/River</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d5" name="features[]" value="mountain">
                                        <label for="d5"><span></span>Mountain</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d6" name="features[]" value="park">
                                        <label for="d6"><span></span>National Park</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="d7" name="features[]" value="swamp">
                                        <label for="d7"><span></span>Swamp</label>
                                    </li>
                                </ul>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">More Features</label>
                                            <div class="input-group">
                                                <input type="text" name="more_features[]" id="ContactNo" class="form-control"
                                                       placeholder="Enter more features">
                                                <span class="input-group-btn add_field_button">
                                                                    <button class="btn btn-info" type="button">+</button>
                                                               </span>
                                            </div>
                                            <div class="input_fields_wrap">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-md-3 col-sm-4 pull-right">
                                <p>
                                <div class="booking-proceed">
                                    <input class="t-btn btn-red" type="submit" value="proceed to Submit"/>
                                </div>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>



    </div><!-- .site-content -->
@endsection
