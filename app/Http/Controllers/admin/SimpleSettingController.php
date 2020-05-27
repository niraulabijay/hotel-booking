<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SimpleSetting;

class SimpleSettingController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function setup()
    {
        $setting=SimpleSetting::all()->first();
        if (!$setting==NULL)
        {
            return view('admin.settings.edit_simple_settings',compact('setting'));
        }
        else{
            return view('admin.settings.add_simple_settings');
        }
    }
    public function postSimple(Request $request){
        $simple= new SimpleSetting();
        $simple->vat = $request->vat;
        $simple->service_charge = $request->service_charge;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/logo/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $simple->logo = $db_filename;
        }
        $simple->save();

        return redirect()->back()->with('success','Information has been successfully changed');
    }
    public function editPostSimple(Request $request){
        $simple = SimpleSetting::all()->first();
        $simple->vat = $request->vat;
        $simple->service_charge = $request->service_charge;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/logo/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $simple->logo = $db_filename;
        }
        $simple->save();

        return redirect()->back()->with('success','Information has been successfully changed');

    }
}
