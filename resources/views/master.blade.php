<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <link rel="icon" href="public/source/assets/dest/img/icon.png" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title') | LUXURY WATCH</title>

    <!-- Icon css link -->
    <link href="public/source/assets/dest/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/source/assets/dest/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/source/assets/dest/vendors/elegant-icon/style.css" rel="stylesheet">
    <link href="public/source/assets/dest/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link href="public/source/assets/dest/css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="public/source/assets/dest/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="public/source/assets/dest/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="public/source/assets/dest/vendors/revolution/css/navigation.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="public/source/assets/dest/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="public/source/assets/dest/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">

    <link href="public/source/assets/dest/css/style.css" rel="stylesheet">
    <link href="public/source/assets/dest/css/util.css" rel="stylesheet">
    <link href="public/source/assets/dest/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('header')
@yield('content')
@include('footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="public/source/assets/dest/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/source/assets/dest/js/popper.min.js"></script>
<script src="public/source/assets/dest/js/bootstrap.min.js"></script>
<script src="public/source/assets/dest/js/demo.js"></script>


<!-- Rev slider js -->
<script src="public/source/assets/dest/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="public/source/assets/dest/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<!-- Extra plugin css -->
<script src="public/source/assets/dest/vendors/counterup/jquery.waypoints.min.js"></script>
<script src="public/source/assets/dest/vendors/counterup/jquery.counterup.min.js"></script>
<script src="public/source/assets/dest/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="public/source/assets/dest/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
<script src="public/source/assets/dest/vendors/image-dropdown/jquery.dd.min.js"></script>
<script src="public/source/assets/dest/js/smoothscroll.js"></script>
<script src="public/source/assets/dest/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="public/source/assets/dest/vendors/isotope/isotope.pkgd.min.js"></script>
<script src="public/source/assets/dest/vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
<script src="public/source/assets/dest/vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
<script src="public/source/assets/dest/vendors/jquery-ui/jquery-ui.js"></script>
<script src="public/source/assets/dest/js/theme.js"></script>
<script>
    $(document).ready(function ($) {
        $(window).scroll(function () {
                if ($(this).scrollTop() > 185) {
                    $(".nav-menu").addClass('fixNav')
                } else {
                    $(".nav-menu").removeClass('fixNav')
                }
            }
        )
    })
</script>
</body>
</html>