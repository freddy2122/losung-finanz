<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
@php
    $googleTagManagerId = trim((string) (defined('GOOGLE_TAG_MANAGER_ID') ? GOOGLE_TAG_MANAGER_ID : ''));
    $googleAdsId = trim((string) (defined('GOOGLE_ADS_ID') ? GOOGLE_ADS_ID : ''));
@endphp

<head>
    @if ($googleTagManagerId)
        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',@json($googleTagManagerId));
        </script>
        <!-- End Google Tag Manager -->
    @endif
    @if ($googleAdsId)
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ rawurlencode($googleAdsId) }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', @json($googleAdsId));
        </script>
    @endif

    <!-- meta tag -->
    <meta charset="utf-8">
    <title>{{ site_title() }}</title>
    <meta name="description" content="">

    {!! social_meta_tags() !!}

    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="{{ site_favicon() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ site_favicon() }}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('bootstrap.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('font-awesome.min.css') }}">
    <!-- Uicons Regular Rounded css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('uicons-regular-rounded.css') }}">
    <!-- flaticon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('animate.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('owl.carousel.css') }}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('off-canvas.css') }}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('magnific-popup.css') }}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{ asset_css('rsmenu-main.css') }}">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/preview.css') }}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('rs-spacing.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('style.css') }}">
    <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('responsive.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{ asset_css('custom.css') }}">
</head>

<body class="defult-home">
    @if ($googleTagManagerId)
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ rawurlencode($googleTagManagerId) }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif

    <div class="offwrap"></div>

    @if (ALLOW_WEBPAGE_LOADER)
		<!--Preloader start here-->
	   	<div id="pre-load">
	        <div id="loader" class="loader">
	            <div class="loader-container">
	                <div class="loader-icon">
	                	<img src="{{ site_favicon() }}">
	                </div>
	            </div>
	        </div>
	    </div>
		<!--Preloader area end here-->
	@endif

    <!-- Main content Start -->
    <div class="main-content">

        <!--Full width header Start-->
        <div class="full-width-header">
            <!--Header Start-->
            <header id="rs-header" class="rs-header">

                <!-- Toolbar Area Start -->
                <div class="toolbar-area topbar-style1 hidden-md">
                    <div class="container">
                        <div class="row rs-vertical-middle">
                            <div class="col-lg-7">
                                <div class="toolbar-contact">
                                    <ul class="rs-contact-info">
                                        <li>
                                            <i class="fi fi-rr-envelope-plus"></i>
                                            <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="toolbar-sl-share">
                                    <ul class="clearfix">
                                        <li><a href="{{ routeWithLocale('site.contact_us') }}"><i
                                                    class="fa fa-support"></i> <span
                                                    class="text-white">{{ translate(96) }}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Toolbar Area End -->

                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    @php
                        $siteLanguages = [
                            'fr' => '🇫🇷',
                            'de' => '🇦🇹',
                        ];
                        $currentLocale = app()->getLocale();
                    @endphp
                    <div class="container">
                        <div class="row-table">
                            <div class="col-cell header-logo">
                                <div class="logo-area">
                                    <x-site-logo variant="header" />
                                </div>
                            </div>
                            <div class="col-cell header-menu-desktop hidden-md">
                                <div class="rs-menu-area">
                                    <div class="main-menu">
                                        <nav class="rs-menu hidden-md">
                                            <ul class="nav-menu">
                                                <!-- <li>
                                                    <a
                                                        href="{{ routeWithLocale('site.index') }}">{{ translate(69) }}</a>
                                                </li> -->
                                               
                                                <li class="menu-item-has-children">
                                                    <a
                                                        href="{{ routeWithLocale('site.loan_offers') }}">{{ translate(113) }}</a>
                                                    <x-loan-listing class="sub-menu"></x-loan-listing>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a
                                                        href="{{ routeWithLocale('site.assurances') }}">{{ translate(311) }}</a>
                                                    <x-insurances-listing class="sub-menu"></x-insurances-listing>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ routeWithLocale('site.contact_us') }}">{{ translate(73) }}</a>
                                                </li>
                                            </ul> <!-- //.nav-menu -->
                                        </nav>
                                    </div> <!-- //.main-menu -->
                                </div>
                            </div>
                            <div class="col-cell header-lang-mobile">
                                <label class="header-lang-switcher">
                                    <select
                                        class="header-lang-select"
                                        aria-label="{{ strtoupper($currentLocale) }}"
                                        onchange="if (this.value) { window.location.href = this.value; }"
                                    >
                                        @foreach($siteLanguages as $lang => $flag)
                                            <option value="/{{ $lang }}" @selected($lang === $currentLocale)>
                                                {{ $flag }} {{ strtoupper($lang) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-cell header-actions">
                                <div class="expand-btn-inner">
                                    <ul>
                                        <li class="btn-quote">
                                            <a class="quote-button"
                                                href="{{ routeWithLocale('site.obtain_financing') }}">{{ translate(204) }}</a>
                                        </li>
                                        <li class="humburger">
                                            <a id="nav-expander" class="nav-expander bar" href="#">
                                                <div class="bar">
                                                    <span class="dot1"></span>
                                                    <span class="dot2"></span>
                                                    <span class="dot3"></span>
                                                    <span class="dot4"></span>
                                                    <span class="dot5"></span>
                                                    <span class="dot6"></span>
                                                    <span class="dot7"></span>
                                                    <span class="dot8"></span>
                                                    <span class="dot9"></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->

                <!-- Canvas Menu start -->
                <nav class="right_menu_togle menu-wrap-off hidden-md">
                    <div class="close-btn">
                        <a id="nav-close" class="nav-close">
                            <div class="line">
                                <span class="line1"></span>
                                <span class="line2"></span>
                            </div>
                        </a>
                    </div>
                    <div class="rs-offcanvas-inner">
                        <div class="canvas-logo">
                            <x-site-logo variant="canvas" />
                        </div>
                        <div class="offcanvas-text">
                            <p>{{ translate(297) }}</p>
                        </div>
                        <div class="canvas-contact">
                            <div class="address-area">
                                <div class="address-list">
                                    <div class="info-icon">
                                        <i class="flaticon-location"></i>
                                    </div>
                                    <div class="info-content">
                                        <h4 class="title">{{ translate(272) }}</h4>
                                        <em>{!! SITE_ADDRESS !!}</em>
                                    </div>
                                </div>
                                <div class="address-list">
                                    <div class="info-icon">
                                        <i class="flaticon-email"></i>
                                    </div>
                                    <div class="info-content">
                                        <h4 class="title">{{ translate(250) }}</h4>
                                        <em><a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a></em>
                                    </div>
                                </div>
                                <div class="address-list">
                                    <div class="info-icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="info-content">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Canvas Menu end -->

                <!-- Canvas Mobile Menu start -->
                <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
                    <div class="close-btn">
                        <a id="nav-close2" class="nav-close">
                            <div class="line">
                                <span class="line1"></span>
                                <span class="line2"></span>
                            </div>
                        </a>
                    </div>
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ routeWithLocale('site.index') }}">{{ translate(69) }}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="lang-flag">
                                    {{ $siteLanguages[$currentLocale] ?? '🌐' }}
                                    {{ strtoupper($currentLocale) }}
                                </span>
                            </a>
                            <ul class="sub-menu">
                                @foreach($siteLanguages as $lang => $flag)
                                    @if($lang !== $currentLocale)
                                        <li>
                                            <a href="/{{ $lang }}">
                                                {{ $flag }} {{ strtoupper($lang) }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ routeWithLocale('site.loan_offers') }}">{{ translate(113) }}</a>
                            <x-loan-listing class="sub-menu"></x-loan-listing>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ routeWithLocale('site.assurances') }}">{{ translate(311) }}</a>
                            <x-insurances-listing class="sub-menu"></x-insurances-listing>
                        </li>
                        <li>
                            <a href="{{ routeWithLocale('site.contact_us') }}">{{ translate(73) }}</a>
                        </li>
                    </ul> <!-- //.nav-menu -->
                    <!-- //.nav-menu -->

                    <!-- //.nav-menu -->
                    <div class="canvas-contact">
                        <div class="address-area">
                            <div class="address-list">
                                <div class="info-icon">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="title">{{ translate(272) }}</h4>
                                    <em>{!! SITE_ADDRESS !!}</em>
                                </div>
                            </div>
                            <div class="address-list">
                                <div class="info-icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="title">{{ translate(250) }}</h4>
                                    <em><a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a></em>
                                </div>
                            </div>
                            <div class="address-list">
                                <div class="info-icon">
                                    <i class="flaticon-call"></i>
                                </div>
                                <div class="info-content">
                                    <h4 class="title">{{ translate(271) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Canvas Menu end -->
            </header>
            <!--Header End-->
        </div>
        <!--Full width header End-->

        @yield('content')
    </div>
    <!-- Main content End -->







    <!-- Footer Start -->
    <footer id="rs-footer" class="rs-footer footer-main-home">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 md-mb-20">
                        <h3 class="footer-title">{{ translate(71) }}</h3>
                        <div class="textwidget mb-33">
                            {{ translate(297) }}
                            <div class="mt-10">
                                <img src="{{ asset_img('icons/trustpilot.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 pl-76 md-pl-15 md-mb-10">
                        <h3 class="footer-title">{{ translate(87) }}</h3>
                        <ul class="address-widget">
                            <li>
                                <i class="fi fi-rr-map-marker-home"></i>
                                <div class="desc">{!! SITE_ADDRESS !!}</div>
                            </li>
                            <li>
                                <i class="fi fi-rr-envelope-plus"></i>
                                <div class="desc">
                                    <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 md-pl-15 md-mb-10">
                        <h3 class="footer-title">{{ translate(65) }}</h3>
                        <x-useful-links class="site-map site-map-grid" contactLink="true" privacyLink="true"></x-useful-links>
                    </div>
                    <div class="col-lg-2">
                        <h3 class="footer-title">{{ translate(256) }}</h3>
                        <p>
                            <input type="email" autocomplete="nope" name="email"
                                placeholder="{{ translate(171) }}" required="">
                            <input type="submit" value="{{ translate(303) }}">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>{!! site_copyright() !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- modernizr js -->
    <script src="{{ asset_js('modernizr-2.8.3.min.js') }}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset_js('jquery.min.js') }}"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="{{ asset_js('bootstrap.min.js') }}"></script>
    <!-- op nav js -->
    <script src="{{ asset_js('jquery.nav.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset_js('owl.carousel.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset_js('wow.min.js') }}"></script>
    <!-- Skill bar js -->
    <script src="{{ asset_js('skill.bars.jquery.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset_js('imagesloaded.pkgd.min.js') }}"></script>
    <!-- waypoints.min js -->
    <script src="{{ asset_js('waypoints.min.js') }}"></script>
    <!-- counterup.min js -->
    <script src="{{ asset_js('jquery.counterup.min.js') }}"></script>
    <!-- Nivo slider js -->
    <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
    <!-- tilt js -->
    <script src="{{ asset_js('tilt.jquery.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset_js('jquery.magnific-popup.min.js') }}"></script>
    <!-- contact form js -->
    <script src="{{ asset_js('contact.form.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset_js('main.js') }}"></script>
    @stack('scripts')
    <x-crisp-chat></x-crisp-chat>
</body>

</html>
