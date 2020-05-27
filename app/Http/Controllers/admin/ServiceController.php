<?php

namespace App\Http\Controllers\admin;

use App\Service;
use App\ServiceImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function add_paid_service(){
        return view('admin.paid-service.add-paid-service');
    }
    public function view_paid_service(){
        $services = Service::all();
        return view('admin.paid-service.view-paid-service',compact('services'));
    }
    public function post_paid_service(Request $request){
        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->status = 1;
        $service->description = $request->description;
        if ($request->hasFile('image_thumbnail')) {
            $image = $request->file('image_thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = 'admin/images/services/';
            $db_filename = $upload_path . $filename;
            $image->move($upload_path, $filename);
            $service->image = $db_filename;
        }
        $service->save();

        if ($request->hasFile('image')) {
            $counter = 1;
            foreach ($request->file('image') as $image) {
                $picture = new ServiceImage();
                $filename = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
                $upload_path = "admin/images/services/";
                $db_filename = $upload_path . $filename;
                $image->move($upload_path, $filename);
                $picture->image = $db_filename;
                $picture->service_id = $service->id;

                $counter = $counter + 1;

                $picture->save();
            }
        }
        return redirect('/view_paid_service')->with('success','The Service is successfully included');



    }
    public function confirm_paid_service($id){
        $service = Service::findorfail($id);
        if($service->status == 0){
            $service->status = 1;
        }
        else{
            $service->status = 0;
        }
        $service->save();
        return redirect()->back()->with('success','The Status was Successfully Changed');
    }
}
