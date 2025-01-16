<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>AutoDeal - Car Dealer, Rental & Listing HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('frontend/app/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/app/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/app/css/custom.css') }}">


    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/logo/Favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/assets/images/logo/Favicon.png') }}">
    @stack('styles')
</head>

<body class="body header-fixed">

    <!-- preload -->
    <div class="preload preload-container">
        <div class="middle">
        </div>
    </div>

    <!-- /preload -->
    <div id="wrapper">
        <div id="pagee" class="clearfix">

            @yield('content')
            @include('frontend.components.footer')
        </div>
    </div>
    @include('frontend.components.modal')
    <!-- Javascript -->
    <script src="{{ asset('frontend/app/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/app/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/app/js/plugin.js') }}"></script>
    <script src="{{ asset('frontend/app/js/shortcodes.js') }}"></script>
    <script src="{{ asset('frontend/app/js/main.js') }}"></script>

    <!-- Javascript -->
    <script src="{{ asset('frontend/app/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/app/js/swiper.js') }}"></script>
    <script src="{{ asset('frontend/app/js/jquery-validate.js') }}"></script>
    <script src="{{ asset('frontend/app/js/price-ranger.js') }}"></script>
    @stack('scripts')

</body>

</html>
