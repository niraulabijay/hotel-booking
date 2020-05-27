<?php

namespace App\Http\Controllers\admin;

use App\Booking;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class BookingController extends Controller
{
    public function index(){
        $room_types=RoomType::all();
        $rooms=Room::all();
        return view('admin.booking.add_booking_manual', compact('room_types','rooms'));
    }
    public function post_manual_booking(Request $request)
    {
//        return response()->json(['success',$request->all()]);
        $check_in=date('Y-m-d', strtotime($request->check_in));
        $check_out=date('Y-m-d', strtotime($request->check_out));
        $room_type=RoomType::findorfail($request->room_type);
//        return response()->json($room_type->rooms);
        if(isset($room_type->rooms))
        {
//            return response()->json($room_type->rooms);
            foreach($room_type->rooms as $room)
            {
                foreach ($room->bookings as $booking)
                {
                    if ($booking->check_in > $check_in && $booking->check_out > $check_in && $booking->check_in > $check_out && $booking->check_out > $check_out  || $booking->check_in < $check_in && $booking->check_out < $check_in && $booking->check_in < $check_out && $booking->check_out < $check_out )
                    {
                        $booking_id[]=$booking->room->number;
                    }
                }

            }
        }
        if(!empty($booking_id))
        {
            foreach ($room_type->rooms as $room)
            {
                foreach ($booking_id as $booked_room)
                {
                    if ($room->number!=$booked_room)
                    {
                        $rooms[]=$room;
                    }
                }

            }
        }
        else{
            $rooms = $room_type->rooms;
        }
        if(empty($rooms)){
            $rooms = "";
            return response()->json(['error' => "No rooms available for ".$room_type->name."."],400);
        }
        elseif ($rooms->isEmpty()){
            return response()->json(['error' => "No rooms available for ".$room_type->name."."],400);
        }
        else {
            $room_numbers = $rooms->pluck('number');
            return response()->json(['rooms' => $room_numbers], 200);
        }
        //        dd($rooms);

//        return view('admin.booking.add_booking_manual', compact('booking_id'));


    }

    public function check_available(){
        $roomtypes = RoomType::all();
        $events = Booking::all();
//        dd($events);
        $event_list = [];
        foreach ($events as $event) {
            $color="";
            if($event->status == 0){
                $color ="red";
            }
            else{
                if($event->paid == 1){
                    $color="green";
                }
                else{
                    $color="blue";
                }
            }
            $event_list[] = Calendar::event(
                'Room no - '.$event->room->number.'(' . $event->room->roomtype->name  .')',
                true,
                $event->check_in,
                $event->check_out.'+1 day',
                $event->id,
                [
                    'color' => $color,
                    'url' => '#',
                    'description' => "Event Description",
                    'textColor' => 'white'
                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        return view('admin.calendar.view-calendar',compact('calendar_details','roomtypes'));
    }

    public function post_roomtype(Request $request){
        $roomtypes = RoomType::all();
        if($request->show_cancelled == 1){
            $events = Booking::all();
        }
        else{
            $events = Booking::where('status',1)->get();
        }
//        dd($events);
        $event_list = [];
        foreach ($events as $event) {
            $color = "";
            if($event->status == 0){
                $color ="red";
            }
            else{
                if($event->paid == 1){
                    $color="green";
                }
                else{
                    $color="blue";
                }
            }
            if($event->room_type->id == $request->roomtype) {
                $event_list[] = Calendar::event(
                    'Room no - '.$event->room->number.'(' . $event->room->roomtype->name  .')',
                    true,
                    $event->check_in,
                    $event->check_out . '+1 day',
                    $event->id,
                    [
                        'color' => $color,
                        'url' => '#',
                        'description' => "Event Description",
                        'textColor' => 'white'
                    ]
                );
            }
        }
//        dd($request->roomtype);
        $title = RoomType::find($request->roomtype)->name;
        $calendar_details = Calendar::addEvents($event_list);
        return view('admin.calendar.view-calendar',compact('calendar_details','roomtypes','title'));
    }

    public function view_all_bookings(){
        $bookings = Booking::all();
        return view('admin.booking.all_bookings',compact('bookings'));
    }
}
