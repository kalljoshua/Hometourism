<!DOCTYPE html>
<html lang="en">
<head>

@yield('title')
<!--Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font Styles -->
    <link href='https://fonts.googleapis.com/css?family=Fira+Sans:400,500,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    <!--Stylesheets -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/select2.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" media="all">
    <link rel="stylesheet" href="/assets/css/datepicker.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/fullcalendar.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/slicknav.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/animate.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/responsive.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="/assets/css/animations-ie-fix.css" type="text/css" media="all">
    <script src="/assets/js/html5shiv.min.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->

    <style>
        /* The switch - the box around the slider */
        .switch1 {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 27px;
        }

        /* Hide default HTML checkbox */
        .switch1 input {
            display: none;
        }

        /* The slider */
        .slider1 {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider1:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider1 {
            background-color: #2196F3;
        }

        input:focus + .slider1 {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider1:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider1.round {
            border-radius: 34px;
        }

        .slider1.round:before {
            border-radius: 50%;
        }
    </style>

</head>
<body>
<div id="page" class="hfeed site">

    @include('layouts.header')

    <div id="content" class="site-content">

        @yield('content')

    </div><!-- .site-content -->

    @include('user.site_footer')

</div><!-- .site -->

<script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
<script src="/js/full-booking.js"></script>
<script type="text/javascript" src="/assets/js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/respond.min.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/select2.full.min.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/moment.min.js"></script>
<script type="text/javascript" src="/assets/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="/assets/js/css3-animate-it.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/js/tropical.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script src="/assets/js/form-components.js"></script>
{{--<script src="/assets/js/maps.js"></script>--}}
<script language="javascript" type="text/javascript" src="/js/starrr.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjFuJk-Zshqzlhbrq9UyzNimehnm480oM&callback=initMap"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(0.3121065,32.582237),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        google.maps.event.addListener(map, 'click', function (e) {
            loadWeather(e.latLng.lat()+','+e.latLng.lng());
            //load weather using your lat/lng coordinates
        });

        $(document).ready(function() {
            loadWeather('Kampala',''); //@params location, woeid
        });

        function loadWeather(location, woeid) {
            $.simpleWeather({
                location: location,
                woeid: woeid,
                unit: 'f',
                success: function(weather) {
                    html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
                    html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
                    html += '<li class="currently">'+weather.currently+'</li>';
                    html += '<li>'+weather.alt.temp+'&deg;C</li></ul>';

                    html += '<ul><li> Pressure: '+weather.pressure+' '+weather.units.pressure+'</li>';
                    html += '<li class="currently">High: '+weather.low+'&deg;'+weather.units.temp+'</li>';
                    html += '<li>Low: '+weather.high+'&deg;'+weather.units.temp+'</li></ul>';

                    $("#weather").html(html);
                },
                error: function(error) {
                    $("#weather").html('<p>'+error+'</p>');
                }
            });
        }
    }
</script>

<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(1500);

    //login/register form js
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

    //form wizard js

    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

    $(function () {
        $("#fileupload").change(function () {
            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#dvPreview");
                dvPreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = $("<img />");
                            img.attr("style", "height:100px;width: 100px");
                            img.attr("src", e.target.result);
                            dvPreview.append(img);
                        }
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        dvPreview.html("");
                        return false;
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-group">'+
                    '<input type="text" name="more_features[]" placeholder="Enter another Feature" class="form-control">'+
                    '<span class="remove_field input-group-btn">'+
                    '<button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>'+
                    '</span></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });


</script>


</body>
</html>
