<?php

namespace App\Http\Controllers\admin;

use App\Floor;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function view_room(){
        $rooms = Room::all();
        $roomtypes = RoomType::all();
        $floors = Floor::all();
        return view('admin.room.view-room',compact('rooms','roomtypes','floors'));
    }
    public function add_room(){
        $roomtypes = RoomType::all();
        $floors = Floor::all();
        return view('admin.room.add-room',compact('roomtypes','floors'));
    }
    public function post_room(Request $request){
//        dd($request);
        $room = new Room();
        $room->number = $request->number;
        $room->roomtype_id = $request->room_type;
        $room->floor_id = $request->floor_number;
        $room->status = 1;

        $room->save();
        return redirect('/view-room')->with('success','Your Room is Successfully Added');
    }
    public function confirm_room($id){
//        dd($id);
        $room = Room::findOrFail($id);
        if($room->status == 0){
            $room->status =1;
            $room->update();
        }
        else{
            $room->status =0;
            $room->update();
        }
        return redirect('/view-room')->with('success','Room Status Changed');
    }

    public function edit_room(Request $request, $id){
//        dd($request);
        $room = Room::findOrFail($id);
        $room->number = $request->number;
        $room->roomtype_id = $request->room_type;
        $room->floor_id = $request->floor_number;
        $room->status = 1;
        $room->update();
        return redirect('/view-room')->with('success','Your Room is Successfully Edited');
    }
}
