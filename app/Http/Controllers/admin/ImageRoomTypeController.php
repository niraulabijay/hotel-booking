<?php

namespace App\Http\Controllers\admin;

use App\RoomType;
use App\RoomTypeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageRoomTypeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function delete($id)
    {
        $image = RoomTypeImage::findOrFail($id);
        $filename = $image->image;
        unlink(public_path() . '/' . $filename);
        $image->delete();
        return response()->json(['success' => 'Image has been deleted successfully!']);
    }

    public function store(Request $request, $id)
    {
        $image = new RoomTypeImage();
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fullName = $file->getClientOriginalName();
            $name = explode('.', $fullName)[0];
            $filename = $name . "-".rand(000,999)."-room_type" . "." . $file->getClientOriginalExtension();
            $location = "admin/images/roomtype/";
            $file->move(public_path($location), $filename);
            $db_filename = $location . $filename;


            $image->roomtype_id = $id;
            $image->image = $db_filename;
            $image->save();
            return response()->json(['success' => 'Image successfully uploaded']);
        } else {
            return response()->json(['error' => 'Image not uploaded']);
        }
    }

}
