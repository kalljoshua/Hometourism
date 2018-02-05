<div id="search-row-wrapper">
    <div class="container">
        <div class="search-inner">

            <div class="row search-bar">
                <div class="advanced-search">
                    <form class="search-form" method="get" action="{{route('users.search')}}">
                        {{--<div class="col-md-3 col-sm-6 search-col">
                            <div class="input-group-addon search-category-container">
                                <select class="dropdown-product selectpicker"  name="subcategory">
                                    <option value="">All Sub Categories</option>
                                </select>
                                <i class="fa fa-search"></i>
                            </div>
                        </div>--}}
                        <div class="col-md-4 col-sm-6 search-col">
                            <div class="input-group">
                                <input class="form-control" type="text" name="town" list="districts"
                                       placeholder="Enter your Location">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-map-marker"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-6 search-col">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control"
                                       placeholder="Enter Keyword">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 search-col">
                            <button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Search box -->

        </div>
    </div>
</div>
