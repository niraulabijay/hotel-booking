@extends('admin.layout.master')
@section('headers')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>

@endsection
@section('content')
    <div class="col-md-12">
        <section class="content" style="padding: 10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="success alert-success">{{ session('success') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header" style="background-color: #5e91bb">

                        <div style="font-weight: bold; font-size: 30px;">Booking</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{  route('post_room_type') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <label for=""><i class="fa fa-calendar"> Check In: </i>
                                        <input id="dp1" type="text" class="form-control clickable input-md "
                                               style="cursor: pointer;" placeholder="&#xf133;  Check-In"></label>


                                    <label for=""><i class="fa fa-calendar"> Check Out: </i>
                                        <input id="dp2" type="text" class="form-control clickable input-md"
                                               style="cursor: pointer" placeholder="&#xf133;  Check-Out"></label>


                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Room Type</label>
                                        <select name="room_type" id="room_type" class="js-example-basic-single"
                                                style="width: 100%">
                                            <option value=""></option>
                                            @foreach($room_types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <button class="btn btn-info" id="check_room">Check Availability</button>
                                </div>
                            </div>
                            <div class="no_room alert alert-danger center" style="display: none">

                            </div>
                            <div class="post_check" style="display: none;">
                                <hr>
                                <div class="form-group">
                                    <label for="">Room</label>
                                    <select name="room" id="room_numbers" class="js-example-basic-single" style="width: 100%">
                                        <option value=""></option>
                                        {{--@foreach($rooms as $room)--}}
                                            {{--<option value="{{$room->number}}">{{$room->number}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="adult">First Name</label>
                                            <input type="text" class="form-control" name="first_name">
                                        </fieldset>
                                    </div>
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="higher_occupancy">Last Name</label>
                                            <input type="text" class="form-control" name="first_name">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class=" form-group">
                                            <label for="">Country</label>
                                            <select class="js-example-basic-single countrypicker" style="width: 100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Room Type</label>
                                            <select name="room_type" id="" class="js-example-basic-single"
                                                    style="width: 100%">
                                                <option value=""></option>
                                                @foreach($room_types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="adult">Adults</label>
                                            <input type="number" class="form-control" id="adult" name="base_occupancy"
                                                   min="0">
                                        </fieldset>
                                    </div>
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="higher_occupancy">Children</label>
                                            <input type="number" class="form-control" id="higher_occupancy"
                                                   name="higher_occupancy"
                                                   min="0">
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="base_occupancy">Start Date</label>
                                            <input type="number" class="form-control" id="base_occupancy"
                                                   name="base_occupancy" min="0">
                                        </fieldset>
                                    </div>
                                    <div class="col">
                                        <fieldset class="form-group">
                                            <label for="higher_occupancy">Checkout Date</label>
                                            <input type="number" class="form-control" id="higher_occupancy"
                                                   name="higher_occupancy"
                                                   min="0">
                                        </fieldset>
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dp1').datepicker({

            beforeShowDay: function (date) {
                return date.valueOf() >= now.valueOf();
            },
            autoclose: true

        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

                var newDate = new Date(ev.date);
                newDate.setDate(newDate.getDate() + 1);
                checkout.datepicker("update", newDate);

            }
            $('#dp2')[0].focus();
        });


        var checkout = $('#dp2').datepicker({
            beforeShowDay: function (date) {
                if (!checkin.datepicker("getDate").valueOf()) {
                    return date.valueOf() >= new Date().valueOf();
                } else {
                    return date.valueOf() > checkin.datepicker("getDate").valueOf();
                }
            },
            autoclose: true

        }).on('changeDate', function (ev) {
        });

    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="{{asset('admin/js/countrypicker.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#check_room').click(function (e) {

            e.preventDefault();
            $.ajax({
                url: "{{route('post_booking_manual')}}",
                type: 'post',
                data: {
                    'check_in': $("#dp1").val(),
                    'check_out': $("#dp2").val(),
                    'room_type': $("#room_type").val(),
                },
                success: function (response) {
                    $('.post_check').show();
                    $('.no_room').hide();
                    // console.log(response.responseJSON.success);
                    // data = JSON.parse(response);
                    // console.log(response);
                    $.each(response, function(key, value) {
                        $('#room_numbers')
                            .append($("<option></option>")
                                .attr("value",key)
                                .text(value));
                    });
                },
                error: function (response) {
                    $('.post_check').hide();
                    console.log(response);
                    $('.no_room').show();
                    $('.no_room').text(response.responseJSON.error);
                }
            });
        });


    </script>

@endsection