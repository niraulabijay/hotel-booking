<?php

namespace App\Http\Controllers\admin;

use App\Amenity;
use App\RoomType;
use App\RoomTypeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomtypeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function room_type_add(){
        $amenities = Amenity::all();
        return view('admin.room-type.add-room-type',compact('amenities'));
    }
    public function room_type_view(){
        $room_type = RoomType::all();
        return view('admin.room-type.view-room-type',compact('room_type'));
    }
    public function post_room_type(Request $request){
//        dd($request);
        $roomtype = new RoomType();
        $roomtype->name = $request->name;
        $roomtype->short_code = $request->short_code;
        $roomtype->description = $request->description;
        $roomtype->base_occupancy = $request->base_occupancy;
        $roomtype->higher_occupancy = $request->higher_occupancy;
        $roomtype->child_occupancy = $request->child_occupancy;
        $roomtype->extra_bed = $request->extra_bed;
        $roomtype->base_price = $request->base_price;
        $roomtype->extra_person_price = $request->extra_person_price;
        $roomtype->extra_bed_price = $request->extra_bed_price;
        $roomtype->status = 1;

        if ($request->hasFile('image_thumbnail')) {
            $image = $request->file('image_thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/roomtype/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $roomtype->image_thumbnail = $db_filename;
        }


        $roomtype->save();
        if (isset($request->amenities)) {
//            foreach ($request->amenities as $ams) {
                $roomtype->amenities()->sync($request->amenities);
//            }
        }



        if ($request->hasFile('image')) {
            $counter = 1;
            foreach ($request->file('image') as $image) {
                $picture = new RoomTypeImage();
                $filename = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
                $upload_path = "admin/images/roomtype/";
                $db_filename = $upload_path . $filename;
                $image->move($upload_path, $filename);
                $picture->image = $db_filename;
                $picture->roomtype_id = $roomtype->id;

                $counter = $counter + 1;

                $picture->save();
            }
        }
        return redirect('/view-room-type')->with('success','Room Type Successfully Added');

    }

    public function confirm_room_type($id){
        dd($id);
    }

    public function room_type_edit($id){
        $amenities = Amenity::all();
        $roomtype = RoomType::findOrFail($id);
        return view('admin.room-type.edit-room-type',compact('roomtype','amenities'));
    }

    public function post_room_type_edit(Request $request,$id){
//        dd($request);
        $roomtype = RoomType::findOrFail($id);
        $roomtype->name = $request->name;
        $roomtype->short_code = $request->short_code;
        $roomtype->description = $request->description;
        $roomtype->base_occupancy = $request->base_occupancy;
        $roomtype->higher_occupancy = $request->higher_occupancy;
        $roomtype->child_occupancy = $request->child_occupancy;
        $roomtype->extra_bed = $request->extra_bed;
        $roomtype->base_price = $request->base_price;
        $roomtype->extra_person_price = $request->extra_person_price;
        $roomtype->extra_bed_price = $request->extra_bed_price;
        $roomtype->status = 1;

        if ($request->hasFile('image_thumbnail')) {
            if(file_exists(public_path().'/'.$roomtype->image_thumbnail)) {
                unlink(public_path() . '/' . $roomtype->image_thumbnail);
            }
            $image = $request->file('image_thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/roomtype/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $roomtype->image_thumbnail = $db_filename;
        }
        $roomtype->save();

        if (isset($request->amenities)) {
//            foreach ($request->amenities as $ams) {
            $roomtype->amenities()->sync($request->amenities);
//            }
        }

        return redirect('/view-room-type')->with('success','Room Type Successfully Edited');
    }

}
