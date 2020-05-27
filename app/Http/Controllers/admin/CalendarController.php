<?php

namespace App\Http\Controllers\admin;

use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function view_calendar(){
        $roomtypes = RoomType::all();
        $counter = 1;
        return view('admin.calendar.view-calendar',compact('roomtypes','counter'));
    }
}
