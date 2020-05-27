<?php

namespace App\Http\Controllers\admin;

use App\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{
    public function add_amenity()
    {
        $amenities = Amenity::all();
        return view('admin.amenity.add-amenity', compact('amenities'));
    }

    public function post_amenity(Request $request)
    {
        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->status = 0;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/amenity/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $amenity->image = $db_filename;
        }

        $amenity->save();
        return redirect()->back()->with('success', 'Amenity succefully added.');
    }

    public function confirm_amenity($id)
    {
        $amenity = Amenity::findorfail($id);
        if ($amenity->status == 0) {
            $amenity->status = 1;
        } else {
            $amenity->status = 0;
        }
        $amenity->save();

        return redirect()->back()->with('success', 'Status successfully changed.');
    }

    public function edit_amenity($id, Request $request)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->name = $request->name;
        if ($request->hasFile('image')) {
            if (file_exists(public_path() . '/' . $amenity->image)) {
                unlink(public_path() . '/' . $amenity->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/amenity/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $amenity->image = $db_filename;
        }
        $amenity->update();
        return redirect()->back()->with('success', 'Amenity successfully edited.');
    }

    public function delete_amenity($id)
    {
        $amenity = Amenity::findOrFail($id);
        if ($amenity->status == 1) {
            return redirect()->back()->with("error", "Error: Amenity's status is still active!");

        } else {
            if (file_exists(public_path() . '/' . $amenity->image)) {
                unlink(public_path() . '/' . $amenity->image);
            }
            $amenity->delete();
            return redirect()->back()->with('success', 'Amenity successfully deleted.');
        }
    }
}
