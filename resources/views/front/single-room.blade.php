@extends('front.layout.master')

@section('title','Title')
@section('description','Description')
@section('keyword','Keyword')

@section('header')

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Rooms Section -->
        <section class="section section-rooms">
            <div class="section-header container align-center">
                <h4 class="text-uppercase">{{  $roomtype->name }}</h4>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-14">
                        <div class="room-box single-room-box">
                            <div class="box-cover no-overlay">
                                <span class="price-box">from <span class="amount">{{  $roomtype->base_price }}</span>/per day</span>
                                <div class="tt-slider tt-custom-cover-slider" data-arrow="true" data-dots="true" data-speed="750" data-fade="true" data-infinite="true">
                                    <ul class="clean-list slides-list">
                                        @foreach($roomtype->images as $image)
                                        <li class="slide">
                                            <img src="{{  asset($image->image) }}" alt="slide background" />
                                        </li>
                                            @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="box-body">
                                <ul class="clean-list services-list">
                                    <li><span>Bed</span>2 king beds</li>
                                    <li><span>people</span>max 4 people</li>
                                    <li><span>Service</span>24-hour room service</li>
                                    <li><span>Tv</span>International tv</li>
                                    <li><span>Air conditioning</span></li>
                                    <li><span>smoke</span>free</li>
                                </ul>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac urna ac est et lectus congue elementum, nor does not trigger. Vulputate soccer sightseeing and soft lorem need. Vestibulum nibh propaganda, realized the need of customers and. Even the main pot protein that gate. Present makeup Maecenas, who has been running any fear. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vulputate soccer and chili, from ut Cum. Textile timing and no warm-up time. Even before the deductible-free, Bureau just need a warm-up. From the congue mauris et, fermentum justo a, vestibulum felis. For the players the weekend layer hairstyle. To-morrow than a bow, so that in the pregnant dolor, gravida ac tortor. Sed eleifend, lorem nec commodo iaculis, until he had first condimentum nulla, consectetur dictum lacus lacus id metus Sed congue. Unfortunately, important to condi eros tellus pede to help you.</p>

                                <p>Morbi hendrerit, turpis eget blandit aliquet, from the felis hendrerit purus, quis Sed Sed nec neque nec tristique. Vestibulum lorem orci, pretium convallis unless you do not, imperdiet convallis elit. A soccer invest dolor eu maximum temperature. Even my quiver volleyball or nutrition is not a lot of time. Now stress sightseeing, Bureau never ends, long or alcohol. Bananas in the refrigerator. Maecenas porta tortor nulla. Maecenas ends of the developers said. Tomorrow members of the Bureau region, the members of the ecological ugly. Suspendisse consequat in mauris mi, iaculis ut vulputate nec, luctus felis at times. Curabitur pulvinar, and hath not been brought about his throat, but the bow is made to the just, is not of a kind of ferment Reserved. But the price is always players life, my makeup. The latest look at ugly.</p>

                                <div class="clean-list social-platforms align-left-important">
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
                    </div>

                    <div class="col-lg-9 col-lg-offset-1 col-md-10">
                        <aside class="main-sidebar room-sidebar">
                            <div class="widget widget_room_book">
                                <div id="calendar-target" data-booked-rooms='["8/3/2016", "18/3/2016", "28/3/2016", "29/3/2016", "1/4/2016", "2/4/2016", "13/4/2016", "14/4/2016", "24/4/2016", "10/5/2016", "12/5/2016", "25/5/2016", "26/5/2016", "27/5/2016", "22/5/2016", "7/6/2016", "8/6/2016", "9/6/2016", "15/6/2016", "16/6/2016", "26/6/2016", "27/6/2016", "28/6/2016"]'></div>

                                <div class="calendar-map">
                                    <div class="calendar-map-item">
                                        <span class="color orange"></span>
                                        <span class="text">Booked</span>
                                    </div>

                                    <div class="calendar-map-item">
                                        <span class="color blue"></span>
                                        <span class="text">Pending</span>
                                    </div>

                                    <div class="calendar-map-item">
                                        <span class="color white"></span>
                                        <span class="text">Available</span>
                                    </div>
                                </div>

                                <h4 class="align-center booking-form-title">Make a reservation</h4>

                                <form class="booking-form">
                                    <label class="input-line">
                                        <span class="title">First Name</span>
                                        <input type="text" class="form-input check-value" value="" placeholder="" />
                                    </label>

                                    <label class="input-line">
                                        <span class="title">Last Name</span>
                                        <input type="text" class="form-input check-value" value="" placeholder="" />
                                    </label>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="input-line">
                                                <span class="title">Email</span>
                                                <input type="text" class="form-input check-value" value="" placeholder="" />
                                            </label>
                                        </div>

                                        <div class="col-sm-12">
                                            <label class="input-line">
                                                <span class="title">Phone</span>
                                                <input type="text" class="form-input check-value" value="" placeholder="" />
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="input-line select-box">
                                                <span class="title">Adults</span>
                                                <input type="text" class="form-input check-value" value="" placeholder="" readonly />
                                                <span class="select-values">
                                             <span class="select-value">1</span>
                                             <span class="select-value">2</span>
                                             <span class="select-value">3</span>
                                             <span class="select-value">3+</span>
                                          </span>
                                            </label>
                                        </div>

                                        <div class="col-sm-12">
                                            <label class="input-line select-box">
                                                <span class="title">Children</span>
                                                <input type="text" class="form-input check-value" value="" placeholder="" readonly />
                                                <span class="select-values">
                                             <span class="select-value">1</span>
                                             <span class="select-value">2</span>
                                             <span class="select-value">3</span>
                                          </span>
                                            </label>
                                        </div>
                                    </div>

                                    <label class="input-line">
                                        <span class="title">Details</span>
                                        <textarea class="form-input check-value" placeholder=""></textarea>
                                    </label>

                                    <label class="input-line check-box">
                                        <input type="checkbox" />
                                        <span class="text">I accept terms &amp; conditions</span>
                                    </label>

                                    <label class="input-line verification">
                                        <input type="text" class="form-input check-value" value="" placeholder="" />
                                        <span class="verification-code">YUC8</span>
                                    </label>

                                    <input type="button" class="btn template-btn-1 form-submit" value="Send" />
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

        <!-- Offer Block -->
        <div class="offer-block no-margin" data-parallax-bg="img/special-offer-bg-3.jpg">
            <div class="box-img-wrapper">
                <div class="box-img">
                    <span></span>
                </div>
            </div>

            <div class="container">
                <div class="offer-block-inner align-center">
                    <h2 class="text-uppercase italic">SPECIAL ROOMS AND REQUESTS</h2>
                    <p class="big">We'll do our best to accomodate your special requests, such as a specialy quiet room, a baby cot/crib, extra toiletries, EU and US electrical sockets, interconecting rooms or an extra bed at no additional charge for a child under four sharing with two adults</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection