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
                <h4 class="text-uppercase">Room overview</h4>
                <p>For the weekend at lorem soft members. Each running financing of fear, a lot of time free vulputate</p>
            </div>

            <div class="container">
                <div class="row">
                    @foreach($roomtypes as $roomtype)
                    <div class="col-md-6 col-sm-12">
                        <div class="room-box">
                            <div class="box-cover no-overlay">
                                <span class="price-box">from <span class="amount">${{  $roomtype->base_price }}</span>/per day</span>
                                <img src="{{  asset($roomtype->image_thumbnail) }}" alt="room cover" />
                            </div>

                            <div class="box-body">
                                <h3 class="box-title align-center">
                                    <a href="single-room.html">{{  $roomtype->name }}</a>
                                </h3>

                                <ul class="clean-list services-list">
                                    @foreach($roomtype->amenities->take(5) as $amenities)
                                    <li><span>{{  $amenities->name }}</span></li>
{{--                                    <li><span>people</span>max 4 people</li>--}}
{{--                                    <li><span>Service</span>24-hour room service</li>--}}
{{--                                    <li><span>Tv</span>International tv</li>--}}
{{--                                    <li><span>Air conditioning</span></li>--}}
{{--                                    <li><span>smoke</span>free</li>--}}
                                        @endforeach
                                </ul>

                                <a href="{{  route('single_room', $roomtype->slug) }}" class="btn">Check details</a>
                            </div>
                        </div>
                    </div>
                        @endforeach
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