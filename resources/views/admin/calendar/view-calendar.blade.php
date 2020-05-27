@extends('admin.layout.master')

@section('styles')
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{  asset('admin_lte//plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{  asset('admin_lte//plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

{{--    <div class="content-wrapper">--}}
<!-- Main content -->
@section('content')
    {{--    @dd($calendar_details)--}}
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('post_calendar') }}" method="post">
                @csrf
                    <h4>Room Type</h4>
                    <div class="form-group">
                        <select id="room_type" name="roomtype" required>
                            <option value="" selected disabled>Select A Roomtype</option>
                            @foreach($roomtypes as $roomtype)
                                <option value="{{ $roomtype->id }}">{{ $roomtype->name }}</option>
                            @endforeach
                        </select>
                        <span>Include Cancelled</span>
                        <input type="checkbox" name="show_cancelled" value="1">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Check</button>
                    </div>
                <!-- /. box -->
            </form>
        </div>
        <!-- /.col -->
    </div>
    <div class="card panel panel-primary">
        <div class="card-header panel-heading justify-content-center">
            <h3 class="">{{ isset($title) ? $title.' Bookings' : 'All Bookings' }} </h3>
        </div>
        <div class="pull-right">
            <ul style="list-style-type: none;">
                <li><button class="btn btn-sm btn-danger"></button>Cancelled</li>
                <li><button class="btn btn-primary btn-sm"></button>Booked</li>
                <li><button class="btn btn-sm btn-success"></button>Paid</li>
            </ul>
        </div>
        <div class="card-body panel-body">
            {!! $calendar_details->calendar() !!}
        </div>
    </div>

@endsection
{{--@section('script')--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}
{{--<script src="{{  asset('admin_lte//plugins/fullcalendar/fullcalendar.min.js') }}"></script>--}}
{{--<!-- Page specific script -->--}}
{{--<script>--}}
{{--$('#room_type').on('change',function () {--}}
{{--var selected = $('#room_type').val();--}}
{{--console.log(selected);--}}
{{--$(function () {--}}

{{--/* initialize the external events--}}
{{-------------------------------------------------------------------*/--}}
{{--function ini_events(ele) {--}}
{{--ele.each(function () {--}}

{{--// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)--}}
{{--// it doesn't need--}}
{{--// to have a start or end--}}
{{--var eventObject = {--}}
{{--title: $.trim($(this).text()) // use the element's text as the event title--}}
{{--}--}}

{{--// store the Event Object in the DOM element so we can get to it later--}}
{{--$(this).data('eventObject', eventObject)--}}

{{--// make the event draggable using jQuery UI--}}
{{--$(this).draggable({--}}
{{--zIndex: 1070,--}}
{{--revert: true, // will cause the event to go back to its--}}
{{--revertDuration: 0  //  original position after the drag--}}
{{--})--}}

{{--})--}}
{{--}--}}

{{--ini_events($('#external-events div.external-event'))--}}

{{--/* initialize the calendar--}}
{{-------------------------------------------------------------------*/--}}
{{--//Date for the calendar events (dummy data)--}}
{{--var date = new Date();--}}
{{--// console.log(Date(y, m, d));--}}
{{--var d = date.getDate(),--}}
{{--m = date.getMonth(),--}}
{{--y = date.getFullYear();--}}
{{--var selected = $('#room_type').val();--}}
{{--$('#calendar').fullCalendar({--}}
{{--header: {--}}
{{--left: 'prev,next today',--}}
{{--center: 'title',--}}
{{--right: 'month,agendaWeek,agendaDay'--}}
{{--},--}}
{{--buttonText: {--}}
{{--today: 'today',--}}
{{--month: 'month',--}}
{{--week: 'week',--}}
{{--day: 'day'--}}
{{--},--}}
{{--//Random default events--}}
{{--events: [--}}
{{--@foreach($roomtypes as $roomtype)--}}
{{--@php $roomtype = \App\RoomType::where('name','@endphp+selected+@php')->first()@endphp--}}
{{--@php $counter = 0; @endphp--}}
{{--                        @for($counter=0; $counter<9; $counter++)--}}
{{--@for($counter; $counter<100; $counter++)--}}
{{--{--}}
{{--title: selected,--}}
{{--start: new Date(y, m, d + parseInt({{$counter}})),--}}
{{--// end            : new Date(y, m, d + 2),--}}
{{--backgroundColor: '#f56954', //red--}}
{{--borderColor: '#f56954', //red--}}
{{--allDay: false,--}}
{{--time: false,--}}

{{--},--}}
{{--@endfor--}}
{{--@endif--}}
{{--@endforeach--}}


{{--],--}}


{{--editable: true,--}}
{{--droppable: true, // this allows things to be dropped onto the calendar !!!--}}
{{--drop: function (date, allDay) { // this function is called when something is dropped--}}

{{--// retrieve the dropped element's stored Event Object--}}
{{--var originalEventObject = $(this).data('eventObject')--}}

{{--// we need to copy it, so that multiple events don't have a reference to the same object--}}
{{--var copiedEventObject = $.extend({}, originalEventObject)--}}

{{--// assign it the date that was reported--}}
{{--copiedEventObject.start = date--}}
{{--copiedEventObject.allDay = allDay--}}
{{--copiedEventObject.backgroundColor = $(this).css('background-color')--}}
{{--copiedEventObject.borderColor = $(this).css('border-color')--}}

{{--// render the event on the calendar--}}
{{--// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)--}}
{{--$('#calendar').fullCalendar('renderEvent', copiedEventObject, true)--}}

{{--// is the "remove after drop" checkbox checked?--}}
{{--if ($('#drop-remove').is(':checked')) {--}}
{{--// if so, remove the element from the "Draggable Events" list--}}
{{--$(this).remove()--}}
{{--}--}}

{{--},--}}
{{--})--}}
{{--});--}}
{{--});--}}
{{--var counter = 1;--}}
{{--$(function () {--}}

{{--/* initialize the external events--}}
{{-------------------------------------------------------------------*/--}}
{{--function ini_events(ele) {--}}
{{--ele.each(function () {--}}

{{--// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)--}}
{{--// it doesn't need--}}
{{--// to have a start or end--}}
{{--var eventObject = {--}}
{{--title: $.trim($(this).text()) // use the element's text as the event title--}}
{{--}--}}

{{--// store the Event Object in the DOM element so we can get to it later--}}
{{--$(this).data('eventObject', eventObject)--}}

{{--// make the event draggable using jQuery UI--}}
{{--$(this).draggable({--}}
{{--zIndex: 1070,--}}
{{--revert: true, // will cause the event to go back to its--}}
{{--revertDuration: 0  //  original position after the drag--}}
{{--})--}}

{{--})--}}
{{--}--}}

{{--ini_events($('#external-events div.external-event'))--}}

{{--/* initialize the calendar--}}
{{-------------------------------------------------------------------*/--}}
{{--//Date for the calendar events (dummy data)--}}
{{--var date = new Date();--}}
{{--// console.log(Date(y, m, d));--}}
{{--var d = date.getDate(),--}}
{{--m = date.getMonth(),--}}
{{--y = date.getFullYear();--}}
{{--var selected = $('#room_type').val();--}}
{{--$('#calendar').fullCalendar({--}}
{{--header: {--}}
{{--left: 'prev,next today',--}}
{{--center: 'title',--}}
{{--right: 'month,agendaWeek,agendaDay'--}}
{{--},--}}
{{--buttonText: {--}}
{{--today: 'today',--}}
{{--month: 'month',--}}
{{--week: 'week',--}}
{{--day: 'day'--}}
{{--},--}}
{{--//Random default events--}}
{{--events: [--}}
{{--@foreach($roomtypes as $roomtype)--}}
{{--@if($roomtype->name == "<script>selected</script>")--}}
{{--@php $counter = 0; @endphp--}}
{{--                        @for($counter=0; $counter<9; $counter++)--}}
{{--@for($counter; $counter<100; $counter++)--}}
{{--{--}}
{{--title: '{{  $roomtype->name }}',--}}
{{--start: new Date(y, m, d + parseInt({{$counter}})),--}}
{{--// end            : new Date(y, m, d + 2),--}}
{{--backgroundColor: '#f56954', //red--}}
{{--borderColor: '#f56954', //red--}}
{{--allDay: false,--}}
{{--time: false,--}}

{{--},--}}
{{--@endfor--}}
{{--@endif--}}
{{--@endforeach--}}


{{--],--}}


{{--editable: true,--}}
{{--droppable: true, // this allows things to be dropped onto the calendar !!!--}}
{{--drop: function (date, allDay) { // this function is called when something is dropped--}}

{{--// retrieve the dropped element's stored Event Object--}}
{{--var originalEventObject = $(this).data('eventObject')--}}

{{--// we need to copy it, so that multiple events don't have a reference to the same object--}}
{{--var copiedEventObject = $.extend({}, originalEventObject)--}}

{{--// assign it the date that was reported--}}
{{--copiedEventObject.start = date--}}
{{--copiedEventObject.allDay = allDay--}}
{{--copiedEventObject.backgroundColor = $(this).css('background-color')--}}
{{--copiedEventObject.borderColor = $(this).css('border-color')--}}

{{--// render the event on the calendar--}}
{{--// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)--}}
{{--$('#calendar').fullCalendar('renderEvent', copiedEventObject, true)--}}

{{--// is the "remove after drop" checkbox checked?--}}
{{--if ($('#drop-remove').is(':checked')) {--}}
{{--// if so, remove the element from the "Draggable Events" list--}}
{{--$(this).remove()--}}
{{--}--}}

{{--},--}}
{{--})--}}
{{--});--}}
{{--</script>--}}

{{--@endsection--}}

@section('script')

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar_details->script() !!}


@endsection
