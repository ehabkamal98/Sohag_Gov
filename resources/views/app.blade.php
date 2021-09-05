<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free/css/all.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <!-- Owl Carousel Default CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl.css')}}">

    <title>@yield('title') - محافظة سوهاج </title>

    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>

<!-- Start Preloader -->
@include('inc.loader')
<!-- End Preloader -->

<!-- Start Top Header Area -->
@include('inc.top_header')
<!-- End Top Header Area -->

<!-- Start Navbar Area -->
@include('inc.navbar')
<!-- End Navbar Area -->

@yield('content')

<!-- Start Footer Area -->
@include('inc.footer')
<!-- End Footer Area -->



<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
</div>
<!-- End Go Top Area -->

<!-- Jquery Slim JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('assets/js/nice-select.min.js')}}"></script>
<!-- Ajaxchimp JS -->
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator JS -->
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<!-- Wow JS -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
