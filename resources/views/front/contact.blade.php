@extends('front.layout.master')

@section('title','Title')
@section('description','Description')
@section('keyword','Keyword')

@section('header')

@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Contact Section -->
        <section class="section contact-section">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">Contacts</h4>
                <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate</p>
            </div>

            <div class="container">
{{--                <!-- Map -->--}}
{{--                <div class="map-wrapper">--}}
{{--                    <div id="map-canvas" class="contact-map" data-options='{--}}
{{--                        "marker": "img/map-marker.png",--}}
{{--                        "marker_coord": {--}}
{{--                           "lat": "40.717483",--}}
{{--                           "lon": "-73.994255"--}}
{{--                        },--}}
{{--                        "map_center": {--}}
{{--                           "lat": "40.717548",--}}
{{--                           "lon": "-73.991723"--}}
{{--                        },--}}
{{--                        "zoom": "15"--}}
{{--                     }'></div>--}}
{{--                </div>--}}

                <!-- Contact Form -->
                <form class="contact-form" method="post" action="{{  route('post_contact') }}">
                    <label class="input-line">
                        <span class="line-title">Message</span>
                        <textarea class="form-input check-value" name="message"></textarea>
                    </label>

                    <label class="input-line">
                        <span class="line-title">Name</span>
                        <input type="text" class="form-input check-value" name="name" />
                    </label>

                    <label class="input-line">
                        <span class="line-title">E-mail</span>
                        <input type="text" class="form-input check-value" name="email"/>
                    </label>

                    <div class="input-line">
                        <input type="submit" value="write" class="form-submit btn template-btn-1" />
                    </div>
                </form>
            </div>

            <!-- Contact Widget -->
            <div class="big-contact-widget">
                <div class="section-header container align-center">
                    <h4 class="text-uppercase">Our contact info</h4>
                    <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate</p>
                </div>

                <div class="container">
                    <div class="clean-list big-contact-options">
                        <img src="img/contact-options-bg.png" class="bg-img" alt="options background" />
                        <div class="contact-option">
                            <span class="option-title">phone number (contact us)</span>
                            <p class="option-body">123 455 777</p>
                        </div>

                        <div class="contact-option">
                            <span class="option-title">e-mail (write us)</span>
                            <p class="option-body"><a href="mailto:riverside@gmail.com">riverside@gmail.com</a></p>
                        </div>
                    </div>

                    <div class="clean-list social-platforms">
                        <div class="platform">
                            <a href="https://www.instagram.com/teslathemes/" target="_blank">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>

                        <div class="platform">
                            <a href="https://www.facebook.com/TeslaThemes/" target="_blank">
                                <i class="icon-facebook"></i>
                            </a>
                        </div>

                        <div class="platform">
                            <a href="https://twitter.com/TeslaThemes" target="_blank">
                                <i class="icon-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

@endsection




