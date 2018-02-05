<!DOCTYPE html>
<html lang="en">
<head>

@yield('title')
<!--Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font Styles -->
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans:400,500,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/assets/js/tropical.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script src="/assets/js/form-components.js"></script>
<script language="javascript" type="text/javascript" src="/js/starrr.js"></script>

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

</body>
</html>
