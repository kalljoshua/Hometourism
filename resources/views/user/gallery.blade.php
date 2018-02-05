
<!-- Modal -->
<div id="pop-login{{$property->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$property->title}}</h4>
            </div>
            <div class="modal-body">
                <div class="widget-body">

                        <?php $images = App\PropertyImage::where('property_id',$property->id)->get();?>
                        @if(sizeof($images)>0)
                                <div class="property-widget-slider">
                                    <div class="item">
                                        <div class="figure-block">
                                            <figure class="item-thumb">
                                                <a href="#" class="hover-effect">
                                                    <img src="/images/properties/our_location_370x370/{{$property->image}}" alt="thumb">
                                                </a>
                                            </figure>
                                        </div>
                                    </div>
                        @foreach($images as $images_property)

                            <div class="item">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <a href="#" class="hover-effect">
                                            <img src="/images/properties/our_location_370x370/{{$images_property->image}}" alt="thumb">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                                </div>
                        @else
                            <div class="text-center">
                                <a href="/property-details/{{$property->id}}">
                                    <img src="/images/properties/our_location_370x370/{{$property->image}}" alt="thumb">
                                </a>
                            </div>

                        @endif

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
