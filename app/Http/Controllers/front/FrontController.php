<?php

namespace App\Http\Controllers\front;

use App\Contact;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert;

class FrontController extends Controller
{
    //
    public function index(){
        $roomtypes = RoomType::all();
        return view('front.index',compact('roomtypes'));
    }
    public  function room_overview(){
        $roomtypes = RoomType::all();
        return view('front.room-overview',compact('roomtypes'));

    }
    public function single_room($slug){
        $roomtype = RoomType::where('slug',$slug)->first();
        return view('front.single-room',compact('roomtype'));
    }
    public function contact(){
        return view('front.contact');
    }
    public function post_contact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->string;
        $contact->message = $request->message;
        $contact->status = 0;

        $contact->save();
    }
    public function admin_login(){
        return view('authentication.admin_login');
    }
}
