<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>@yield('title', "AutoMach | Find Your Perfect Car - Buy & Sell Cars in the UK")</title>
    <meta name="description" content="Discover the best deals on new and used cars in the UK. Find your perfect car by brand, model, body type, and more. Trusted by car buyers and sellers nationwide.">
    <meta name="keywords" content="buy cars UK, sell cars UK, car brands UK, car models UK, car dealership UK, used cars, new cars, car marketplace">
    <meta name="author" content="AutoMach UK">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('frontend/app/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/app/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/app/css/custom.css') }}">

    <!-- Open Graph (OG) Meta Tags for Social Media -->
    <meta property="og:title" content="@yield('title', "AutoMach | Find Your Perfect Car - Buy & Sell Cars in the UK")">
    <meta property="og:description" content="Buy and sell new or used cars in the UK. Browse by brand, model, or type and get the best offers.">
    <meta property="og:image" content="@yield('ogimage', asset('frontend/logo/ogimage.jpg'))">
    <meta property="og:url" content="http://automach.co.uk">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Find Your Perfect Car - AutoMach UK">
    <meta name="twitter:description" content="Discover and sell cars across the UK. Get the best deals today.">
    <meta name="twitter:image" content="@yield('ogimage', asset('frontend/logo/ogimage.jpg'))">


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
