<?php

namespace App\Http\Controllers\admin;

use App\Permission;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $sentinel = Sentinel::getUser();
        if($sentinel->hasAccess('Permission-View')){
            $permissions = Permission::all();
            return view('admin.system_users.permissions',compact('permissions'));
        }
        else{
            abort(403,'Unauthorized Access');
        }
//        $permissions = Permission::all();
//        return view('admin.system_users.permissions', compact('permissions'));
    }


    public function post_add(Request $request)
    {
        $permission = new Permission();
        $permission->title = $request->title;
        $permission->save();
        return redirect()->back()->with('success', 'New Permission ( ' . $permission->title . ' ) ' . 'Successfully Added');
    }

    public function edit(Request $request, $id)
    {
//        dd($request);
        $permission = Permission::findorFail($id);
        $permission->title = $request->title;
        $permission->save();
        return redirect()->back()->with('success', 'Permission Edited Successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::findorFail($id);
        $permission->delete();
        return redirect()->back()->with('success', 'Permission Deleted Successfully');
    }
}
