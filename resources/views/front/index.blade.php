@extends('front.layout.master')

@section('title','Title')
@section('description','Description')
@section('keyword','Keyword')

@section('header')

    @endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main Slider -->
        <div class="main-slider tt-slider" data-arrow="true" data-dots="false" data-speed="900" data-fade="true" data-infinite="true" data-autoplay="true" data-autoplay-speed="3200">
            <div class="slider-content align-center">
                <h4 class="text-uppercase">Welcome to Riverside hotel</h4>
                <p class="text-uppercase">We are waiting for you</p>
            </div>

            <ul class="clean-list slides-list">
                <li class="slide">
                    <img src="{{  asset('front/img/slide-bg-1.jpg') }}" alt="slide background" />
                </li>
                <li class="slide">
                    <img src="{{  asset('front/img/slide-bg-2.jpg') }}" alt="slide background" />
                </li>
                <li class="slide">
                    <img src="{{  asset('front/img/slide-bg-3.jpg') }}" alt="slide background" />
                </li>
                <li class="slide">
                    <img src="{{  asset('front/img/slide-bg-4.jpg') }}" alt="slide background" />
                </li>
            </ul>
        </div>

        <!-- Reservation Block -->
        <div class="reservation-block-wrapper">
            <div class="container">
                <h1 class="align-center text-uppercase">We are happy to meet you</h1>
                <p class="align-center">For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate. Fusce condimentum, how great, but Pellentesque congue justo ultricies eget. Phones in the basin but not chat time. Suspendisse rhoncus pulvinar magna sed posuere. Gluten. Eu free chat warm and ecological. Lorem of the boat, carton at magna real estate, but Bureau lion. Lorem ipsum dolor sit amet, consectetur adipiscing elit. To pot but there is always the fear of playing casino.</p>

                <h4 class="align-center text-uppercase">Make a reservation</h4>

                <div class="reservation-block">
                    <form class="reservation-form">
                        <div class="row">
                            <div class="col-lg-22 col-lg-offset-1">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-input-wrapper">
                                                    <span class="form-input-heading">Check in</span>
                                                    <span class="form-input calendar">
                                                <input type="text" readonly="readonly" placeholder="mm/dd/yyyy" class="check-value" />

                                                <span class="calendar" id="calendar-checkin"></span>
                                             </span>
                                                </label>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-input-wrapper">
                                                    <span class="form-input-heading">Check out</span>
                                                    <span class="form-input calendar">
                                                <input type="text" readonly="readonly" placeholder="mm/dd/yyyy" class="check-value" />

                                                <span class="calendar" id="calendar-checkout"></span>
                                             </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-input-wrapper">
                                            <span class="form-input-heading">Room type</span>
                                            <span class="form-input select-box">
                                          <input type="text" readonly="readonly" placeholder="Classic" class="check-value" />
                                          <span class="clean-list select-values">
                                             <span class="select-value">Brompton</span>
                                             <span class="select-value">Club</span>
                                             <span class="select-value">Classic</span>
                                             <span class="select-value">Family</span>
                                          </span>
                                       </span>
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-input-wrapper">
                                            <span class="form-input-heading">Adults</span>
                                            <span class="form-input select-box">
                                          <input type="text" readonly="readonly" placeholder="2" class="check-value" />
                                          <span class="clean-list select-values">
                                             <span class="select-value">1</span>
                                             <span class="select-value">2</span>
                                             <span class="select-value">3</span>
                                             <span class="select-value">3+</span>
                                          </span>
                                       </span>
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-input-wrapper">
                                            <span class="form-input-heading">Children</span>
                                            <span class="form-input select-box">
                                          <input type="text" readonly="readonly" placeholder="1" class="check-value" />
                                          <span class="clean-list select-values">
                                             <span class="select-value">1</span>
                                             <span class="select-value">2</span>
                                             <span class="select-value">3</span>
                                          </span>
                                       </span>
                                        </label>
                                    </div>

                                    <div class="col-md-4">
                                        <button class="form-submit btn template-btn-1">Book now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Offers Section -->
        <section class="section section-offer">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">Special Offers</h4>
                <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate  </div>

            <div class="container">
                <div class="row row-fit">
                    <div class="col-md-12">
                        <div class="offer-box">
                            <a href="#" class="offer-box-wrapper">
                                <div class="text-box align-center text-uppercase">
                                    <span class="heading">Features</span>
                                    <h5>meeting room</h5>
                                </div>

                                <img src="{{  asset('front/img/offer-cover-1.jpg') }}" alt="offer box cover" />
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row row-fit">
                            <div class="col-sm-12 col-xs-24">
                                <div class="offer-box">
                                    <a href="#" class="offer-box-wrapper">
                                        <div class="text-box align-center text-uppercase">
                                            <span class="heading">Restaurant</span>
                                            <h5>Best cuisine</h5>
                                        </div>

                                        <img src="{{  asset('front/img/offer-cover-2.jpg') }}" alt="offer box cover" />
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-24">
                                <div class="offer-box">
                                    <a href="#" class="offer-box-wrapper">
                                        <div class="text-box align-center text-uppercase">
                                            <span class="heading">Gym</span>
                                            <h5>Sport</h5>
                                        </div>

                                        <img src="{{  asset('front/img/offer-cover-3.jpg') }}" alt="offer box cover" />
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-24">
                                <div class="offer-box wide">
                                    <a href="#" class="offer-box-wrapper">
                                        <div class="text-box align-center text-uppercase">
                                            <span class="heading">Health</span>
                                            <h5>Spa &amp; Pool</h5>
                                        </div>

                                        <img src="{{  asset('front/img/offer-cover-4.jpg') }}" alt="offer box cover" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="offer-box wide">
                            <a href="#" class="offer-box-wrapper">
                                <div class="text-box align-center text-uppercase">
                                    <span class="heading">transport</span>
                                    <h5>Airport transportation</h5>
                                </div>

                                <img src="{{  asset('front/img/offer-cover-5.jpg') }}" alt="offer box cover" />
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="offer-box wide">
                            <a href="#" class="offer-box-wrapper">
                                <div class="text-box align-center text-uppercase">
                                    <span class="heading">Services</span>
                                    <h5>Valet</h5>
                                </div>

                                <img src="{{  asset('front/img/offer-cover-6.jpg') }}" alt="offer box cover" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Rooms Section -->
        <section class="section section-rooms">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">Rooms</h4>
                <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate</p>
            </div>

            <div class="container">
                <div class="tt-carousel rooms-carousel" data-dots="false" data-items-to-slide="2" data-infinite="true">
                    <ul class="carousel-items clean-list responsive">
                        @foreach($roomtypes as $roomtype)
                        <li class="carousel-item">
                            <div class="room-box">
                                <div class="box-cover">
                                    <a href="{{  route('single_room', $roomtype->slug) }}">
                                        <img src="{{  asset($roomtype->image_thumbnail) }}" alt="room cover" />
                                    </a>
                                </div>

                                <div class="box-body align-center">
                                    <h3 class="box-title">
                                        <a href="{{  route('single_room', $roomtype->slug) }}">{{  $roomtype->name }}</a>
                                    </h3>
                                    <p>Fusce condimentum, how great, but Pellentesque congue justo ultricies eget. </p>
                                </div>

                            </div>
                        </li>
                            @endforeach

                    </ul>
                </div>

                <div class="align-center">
                    <a href="room-types.html" class="btn template-btn-1">View all types</a>
                </div>
            </div>
        </section>

        <!-- Offer Block -->
        <div class="offer-block" data-parallax-bg="img/special-offer-bg.jpg">
            <div class="box-img-wrapper">
                <div class="box-img">
                    <span></span>
                </div>
            </div>

            <div class="container">
                <div class="offer-block-inner align-center">
                    <h2 class="text-uppercase italic">Special offer</h2>

                    <span class="offer-percentage">
                        <span class="text"><span class="italic">Save</span><br />25%</span>
                     </span>

                    <p>Fusce condimentum, how great, but Pellentesque congue justo ultricies eget. </p>

                    <a href="#" class="btn offer-btn">View the offer</a>
                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <section class="section section-pricing">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">trip organizer</h4>
                <p> For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate.</div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="pricing-table" data-table-bg="img/pricing-tb-1.jpg">
                            <div class="table-header">
                                <span class="table-type">Basic</span>
                                <span class="table-price">$99.00</span>
                                <p class="table-description">Dedicated wedding website for the bride and groom to customise with details</p>
                            </div>

                            <div class="table-body align-right">
                                <ul class="table-options clean-list">
                                    <li>Welcome drink on arrival</li>
                                    <li>Three-course meal with tea and coffee</li>
                                    <li>Half a bottle of selected wine with the meal</li>
                                    <li>Glass of sparkling wine for the toast</li>
                                </ul>
                                <a href="#" class="btn table-btn template-btn-1">Buy now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="pricing-table" data-table-bg="img/pricing-tb-2.jpg">
                            <div class="table-header">
                                <span class="table-type">Popular</span>
                                <span class="table-price">$150.00</span>
                                <p class="table-description"> For the weekend at lorem soft members.</p>
                            </div>

                            <div class="table-body align-right">
                                <ul class="table-options clean-list">
                                    <li>Lorem ipsum pain</li>
                                    <li>Proin vitae elit</li>
                                    <li>To macro volleyball</li>
                                    <li>And my chat with arrows</li>
                                </ul>
                                <a href="#" class="btn table-btn template-btn-1">Buy now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="pricing-table special" data-table-bg="img/pricing-tb-3.jpg">
                            <div class="table-header">
                                <span class="table-type">Vip</span>
                                <span class="table-price">$295.00</span>
                                <p class="table-description">For the weekend at lorem soft members.</p>
                            </div>

                            <div class="table-body align-right">
                                <ul class="table-options clean-list">
                                    <li>Lorem ipsum pain</li>
                                    <li>Proin vitae elit</li>
                                    <li>To macro volleyball</li>
                                    <li>And my chat with arrows</li>
                                </ul>
                                <a href="#" class="btn table-btn template-btn-1">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="section section-blog no-margin">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">Recent news</h4>
                <p> For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate.</div>

            <div class="custom-blog-area">
                <div class="complex-blog-row">
                    <!-- Big Column -->
                    <div class="big-column">
                        <div class="blog-post-box big-post">
                            <div class="blog-post-cover">
                                <span class="post-date">19 jan</span>
                                <img src="{{  asset('front/mg/blog-post-cover-1.jpg') }}i" alt="blog post cover" />
                            </div>

                            <div class="blog-post-body">
                                <span class="post-comments">2</span>
                                <h2 class="post-title">
                                    <a href="single-post-page.html">All our guests are satisfied with our services</a>
                                </h2>
                                <p class="post-excerpt">Fusce condimentum, how great, but Pellentesque congue justo ultricies eget. </p>
                                <a class="post-url" href="single-post-page.html">Read more</a>
                            </div>
                        </div>
                    </div>

                    <!-- Small Column -->
                    <div class="small-column">
                        <div class="blog-post-box cover-right">
                            <div class="blog-post-body">
                                <h3 class="post-title">
                                    <a href="single-post-page.html">All our guests are satisfied with our services</a>
                                </h3>
                                <p class="post-excerpt">Fusce condimentum, how great, but Pellentesque congue justo ultricies eget.</p>

                                <div class="post-meta">
                                    <a href="single-post-page.html" class="post-url">Read more</a>
                                    <span class="post-comments">2</span>
                                </div>

                                <span class="post-arrow direction-left"></span>
                            </div>

                            <div class="blog-post-cover">
                                <span class="post-date">19 jan</span>
                                <a href="single-post-page.html">
                                    <img src="{{  asset('front/img/blog-post-cover-2.jpg') }}" alt="post page" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Small Column -->
                    <div class="small-column">
                        <div class="blog-post-box cover-right">
                            <div class="blog-post-body">
                                <h3 class="post-title">
                                    <a href="single-post-page.html">All our guests are satisfied with our services</a>
                                </h3>
                                <p class="post-excerpt">Fusce condimentum, how great, but Pellentesque congue justo ultricies eget.</p>

                                <div class="post-meta">
                                    <a href="single-post-page.html" class="post-url">Read more</a>
                                    <span class="post-comments">2</span>
                                </div>

                                <span class="post-arrow direction-left"></span>
                            </div>

                            <div class="blog-post-cover">
                                <span class="post-date">19 jan</span>
                                <a href="single-post-page.html">
                                    <img src="{{  asset('front/img/blog-post-cover-3.jpg') }}" alt="post page" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Small Column -->
                    <div class="small-column">
                        <div class="blog-post-box cover-left">
                            <div class="blog-post-body">
                                <h3 class="post-title">
                                    <a href="single-post-page.html">All our guests are satisfied with our services</a>
                                </h3>
                                <p class="post-excerpt">Fusce condimentum, how great, but Pellentesque congue justo ultricies eget.</p>

                                <div class="post-meta">
                                    <a href="single-post-page.html" class="post-url">Read more</a>
                                    <span class="post-comments">2</span>
                                </div>

                                <span class="post-arrow direction-left"></span>
                            </div>

                            <div class="blog-post-cover">
                                <span class="post-date">19 jan</span>
                                <a href="single-post-page.html">
                                    <img src="{{  asset('front/mg/blog-post-cover-4.jpg') }}i" alt="post page" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Small Column -->
                    <div class="small-column">
                        <div class="blog-post-box cover-left">
                            <div class="blog-post-body">
                                <h3 class="post-title">
                                    <a href="single-post-page.html">All our guests are satisfied with our services</a>
                                </h3>
                                <p class="post-excerpt">Fusce condimentum, how great, but Pellentesque congue justo ultricies eget. que sem ultricies eget.</p>

                                <div class="post-meta">
                                    <a href="single-post-page.html" class="post-url">Read more</a>
                                    <span class="post-comments">2</span>
                                </div>

                                <span class="post-arrow direction-left"></span>
                            </div>

                            <div class="blog-post-cover">
                                <span class="post-date">19 jan</span>
                                <a href="single-post-page.html">
                                    <img src="{{  asset('front/img/blog-post-cover-5.jpg') }}" alt="post page" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')

    @endsection