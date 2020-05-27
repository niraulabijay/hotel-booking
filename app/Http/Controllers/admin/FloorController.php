<?php

namespace App\Http\Controllers\admin;

use App\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function view_floor(){
        $floors = Floor::all();
        return view('admin.floor.view-floor',compact('floors'));
    }
    public function post_floor(Request $request){
        $floor = new Floor();
        $floor->name = $request->name;
        $floor->status = 1;
        $floor->number = $request->number;

        $floor->save();
        return redirect()->back()->with('status','The floor was successfully Added');
    }

}
