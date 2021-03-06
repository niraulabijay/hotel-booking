<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Riverside</title>
    <meta name="description" content="Hotel & Resort HTML5 Template" />
    <meta name="author" content="TeslaThemes" />
    <link rel="shortcut icon" href="{{  asset('front/img/favicon.png') }}" type="image/x-icon" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asap:400,400italic,700,700italic%7CAmatic+SC" />
    <link rel="stylesheet" href="{{  asset('front/css/vendors/icomoon.css') }}" />
    <link rel="stylesheet" href="{{  asset('front/css/screen.css') }}" />
    @yield('header')
</head>
<body id="page">
<!-- Page Content -->
<div class="page-wrapper">
    <!-- Main Header -->
    <header class="main-header sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-9">
                    <a href="index.html" class="brand-wrapper">
                        <img src="{{  asset('front/img/logo.png') }}" alt="site brand" />
                    </a>
                </div>

                <div class="col-md-12 col-xs-6">
                    <span class="mobile-menu-toggle">Menu</span>

                    <nav class="main-nav">
                        <ul>
                            <li class="current-menu-item">
                                <a href="{{  route('index') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul>
                                    <li>
                                        <a href="404.html">Error page</a>
                                    </li>
                                    <li>
                                        <a href="spa.html">Spa</a>
                                    </li>
                                    <li>
                                        <a href="meetings.html">Meetings</a>
                                    </li>
                                    <li>
                                        <a href="single-event-page.html">Events</a>
                                    </li>
                                    <li>
                                        <a href="offer.html">Best Offers</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="room-types.html">Rooms</a>
                                        <ul>
                                            <li>
                                                <a href="room-types.html">Room overview</a>
                                            </li>
                                            <li>
                                                <a href="single-room.html">Single Room</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="restaurants.html">Restaurant</a>
                                <ul>
                                    <li>
                                        <a href="restaurants.html">Restaurants</a>
                                    </li>
                                    <li>
                                        <a href="single-restaurant.html">Single Restaurant</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-6 col-xs-9">
                    <div class="weather-block">
                        <i class="weather-icon" data-weather-icon></i>

                        <div class="weather-meta-block">
                            <span class="degrees"></span>
                            <div class="location-block">
                                <span class="location"></span>
                                <span class="date"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map-toggle-wrapper">
            <a href="https://www.google.com/maps/place/Hotel+Arts+Barcelona/@41.3865033,2.1914496,16z/data=!4m2!3m1!1s0x12a4a30f13665d1b:0xff3ebc6ba79f4055?hl=en" target="_blank" class="map-toggle">
                <i class="icon-location4"></i>
                <span class="text">Find us on map</span>
            </a>
        </div>
    </header>

@yield('content')

    <footer class="main-footer">
        <div class="container">
            <form class="subcsribe-form center-block">
                <input type="text" class="form-input check-value" placeholder="Newsletter subscribe" />
                <i class="form-icon icon-envelope"></i>
                <button class="form-submit">
                    <i class="state-waiting icon-pencil22"></i>
                    <i class="state-ready icon-circle-check"></i>
                </button>
            </form>

            <div class="footer-widget-area">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget widget_about">
                            <img src="{{  asset('front/img/indentity.png') }}" alt="site identity" />
                            <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-offset-1">
                        <div class="widget widget_links">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Rooms</a>
                                </li>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Contacts</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="widget widget_links">
                            <ul>
                                <li>
                                    <a href="#">Cuisine</a>
                                </li>
                                <li>
                                    <a href="#">Spa</a>
                                </li>
                                <li>
                                    <a href="#">Pool</a>
                                </li>
                                <li>
                                    <a href="#">Category</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="widget widget_meta">
                            <ul class="meta-list">
                                <li>
                                    <p><span>Call:</span> 0125 4587 898</p>
                                </li>
                                <li>
                                    <p><span>Mail:</span> <a href="mailto:riverside@gmail.com">Riverside@gmail.com</a></p>
                                </li>
                                <li>
                                    <p><span>Address:</span> Yuppy, LA8549</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5">
                        <div class="widget widget_social">
                            <ul class="clean-list social-block">
                                <li>
                                    <a href="#">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="partners-block">
                <!--<img src="img/partner-1.png" alt="partner logo" class="partner-image" />-->
                <!--<img src="img/partner-2.png" alt="partner logo" class="partner-image" />-->
            </div>

            <p class="copy-rights align-center text-uppercase">copyright 2019 developed by <a href="https://www.nextnepal.com/" target="_blank">Next Nepal</a></p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="http://www.geoplugin.net/javascript.gp"></script>
<script src="{{  asset('front/js/vendors/jquery.js') }}"></script>
<script src="{{  asset('front/js/vendors/jquery-ui.js') }}"></script>
<script src="{{  asset('front/js/vendors/modernizr.js') }}"></script>
<script src="{{  asset('front/js/vendors/slick.js') }}"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="{{  asset('front/js/options.js') }}"></script>

{{--sweetalert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

</body>
</html>