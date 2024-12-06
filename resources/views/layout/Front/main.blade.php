<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#1c1e27">
   
    <title>FCFM | @yield('pagetitle')</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets/images/favicons/apple-touch-icon.png')}}"/>
    <link rel="android-chrine-512x512" sizes="512x512" href="{{asset('front/assets/images/favicons/android-chrome-512x512.png')}}"/>
    <link rel="android-chrome-192x192" sizes="192x192" href="{{asset('front/assets/images/favicons/android-chrome-192x192.png')}}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/images/favicons/favicon-32x32.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/images/favicons/favicon-16x16.png')}}"/>
    <link rel="manifest" href="{{asset('front/assets/images/favicons/site.webmanifest')}}"/>
    <meta name="description" content="Facultad de Ciencias Físico Matemáticas"/>
    <meta name="tags" content="@yield('tagspage')">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('front/assets/vendors/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/animate/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/animate/custom-animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/fontawesome/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/jarallax/jarallax.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/nouislider/nouislider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/nouislider/nouislider.pips.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/odometer/odometer.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/swiper/swiper.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/icomoon-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/vendors/reey-font/stylesheet.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/vendors/twentytwenty/twentytwenty.css')}}"/>
@yield('stylespage')
<!-- template styles -->
    <link rel="stylesheet" href="{{asset('front/assets/css/zilom.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/css/zilom-responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/assets/css/styles.css')}}"/>

    
</head>

<body>

<div class="preloader">
    <img class="preloader__image" width="60" src="{{asset('front/assets/images/loader.png')}}" alt=""/>
</div>

<!-- /.preloader -->
<div class="page-wrapper">

    @include('layout.Front.menu')

    @yield('content')

    @include('layout.Front.footer')





</div><!-- /.page-wrapper -->
@include('layout.Front.menuMobile')

<!-- /.mobile-nav__wrapper -->


<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">Buscar...</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Escriba para buscar..."/>
            <button type="submit" aria-label="search submit" class="thm-btn2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->


<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="{{asset('front/assets/vendors/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/wow/wow.js')}}"></script>
<script src="{{asset('front/assets/vendors/isotope/isotope.js')}}"></script>
<script src="{{asset('front/assets/vendors/countdown/countdown.min.js')}}"></script>
<script src="{{asset('front/assets/vendors/twentytwenty/twentytwenty.js')}}"></script>
<script src="{{asset('front/assets/vendors/twentytwenty/jquery.event.move.js')}}"></script>
@yield('scriptspage')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

<!-- template js -->
<script src="{{asset('front/assets/js/zilom.js')}}"></script>
<script src="{{asset('front/assets/js/darkmode.js')}}"></script>

</body>

</html>
