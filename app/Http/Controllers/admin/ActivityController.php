<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activity.view-activities', compact('activities'));
    }

    public function add_activity()
    {
        $activities = Activity::all();
        return view('admin.activity.add-activity', compact('activities'));
    }

    public function post_activity(Request $request)
    {
//        dd($request);
        $activity = new Activity();
        $activity->title = $request->title;
        $activity->price = $request->price;
        $activity->status = 0;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/activity/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $activity->image = $db_filename;
        }
        $activity->description = $request->description;
        $activity->duration = $request->duration;
        $activity->duration_unit = $request->duration_unit;
        $activity->save();

        return redirect('/view-activities')->with('success', 'Activity successfully added.');
    }

    public function confirm_activity($id)
    {
        $activity = Activity::findorfail($id);
        if ($activity->status == 0) {
            $activity->status = 1;
        } else {
            $activity->status = 0;
        }
        $activity->save();

        return redirect()->back()->with('success', 'Status successfully changed.');
    }

    public function edit_activity($id, Request $request)
    {
        $activity = Activity::findOrFail($id);
        $activity->title = $request->title;
        $activity->price = $request->price;
        if ($request->hasFile('image')) {
            if (file_exists(public_path() . '/' . $activity->image)) {
                unlink(public_path() . '/' . $activity->image);
            }
            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/activity/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $activity->image = $db_filename;
        }
        $activity->description = $request->description;
        $activity->duration = $request->duration;
        $activity->duration_unit = $request->duration_unit;
        $activity->update();

        return redirect('/view-activities')->with('success', 'Activity successfully edited.');
    }

    public function delete_activity($id)
    {
        $activity = Activity::findOrFail($id);
        if ($activity->status == 1) {

            return redirect()->back()->with("error", "Error: Activity's status is still active!");

        } else {
            if (file_exists(public_path() . '/' . $activity->image)) {
                unlink(public_path() . '/' . $activity->image);
            }
            $activity->delete();
            return redirect()->back()->with('success', 'Activity successfully deleted.');
        }
    }
}
