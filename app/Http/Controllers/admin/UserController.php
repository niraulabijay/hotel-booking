<?php

namespace App\Http\Controllers\admin;

use App\Permission;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        // abort_if(! Sentinel::getUser()->hasAccess('UserRole-View'), 403);
        $role = Sentinel::findRoleBySlug('user');
        $users = $role->users()->with('roles')->get();

        //for edit roles table of user
        $roles = Sentinel::getRoleRepository()->all();

        return view('admin.user.users', compact('users', 'roles'));
    }

    public function edit_role(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->back()->with('success', 'Role changed for' . ' ' . $user->first_name);
    }

    public function view_system_users()
    {
        // abort_if(! Sentinel::getUser()->hasAccess('SystemUser-View'), 403);
        $role = Sentinel::findRoleBySlug('admin');
        $admins = $role->users()->with('roles')->get();
//        dd($admins);
        return view('admin.system_users.system_users', compact('admins'));
    }

    public function delete_user($id)
    {
//        abort_if(! Sentinel::getUser()->hasAccess('user.delete'), 403);
        $sentinel = Sentinel::getUser();
        if ($sentinel->hasAccess('user.delete')) {
//            dd("access granted");
            User::find($id)->delete();
            return redirect()->back()->with('success','User Deleted Successfully');
        } else {
            return redirect()->back()->with('error','Unauthorized Action');
        }
    }

    public function add_system_user()
    {
//        abort_if(! Sentinel::getUser()->hasAccess('user.add'), 403);
        $sentinel = Sentinel::getUser();
        if ($sentinel->hasAccess('SystemUser-Add')) {
        $permissions = Permission::all();
        return view('admin.system_users.add_system_user', compact('permissions'));
        }
        else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function edit_user($id)
    {
//        abort_if(! Sentinel::getUser()->hasAccess('user.edit'), 403);
        $sentinel = Sentinel::getUser();
        if ($sentinel->hasAccess('SystemUser-Edit')) {
            $user= Sentinel::findById($id);
            if($user->roles->first()->slug == 'developer'){
                abort(403, 'Unauthorized Action');
            }
            $selected_permissions = array_keys($user->permissions);
//            dd($selected_permissions);
            $permissions = Permission::all();
            return view('admin.system_users.edit_user',compact('user','permissions','selected_permissions'));
        } else {
            abort(403, 'Unauthorized Action');
        }
    }

    public function post_edit_user(Request $request,$id){
//        dd($request);
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
        ]);
        $user = Sentinel::findById($id);
        $selected_permissions = array_keys($user->permissions);
        foreach ($selected_permissions as $permission) {
            $user->removePermission($permission);
        }
        foreach ($request->permissions as $permission) {
            $user->addPermission($permission);
        }
        $user->save();
        return redirect('/admin/users/system')->with('success', 'User Edited Successfully');;
    }


    public function register_system_user(Request $request)
    {
        $sentinel = Sentinel::getUser();

            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'password' => 'required|string|min:6|confirmed',
                'email' => 'required|unique:users',
                'phone' => 'required',
                'address' => 'required|max:255',
            ]);
//        dd($request);
            $contact_number = "+" . $request->countryCode . $request->phone;
            if ($request->hasFile('prof_pic')) {
                $image = $request->file('prof_pic');

                $fullName = $image->getClientOriginalName();
                $name = explode('.', $fullName)[0];

                $filename = $name . "-profile" . "." . $image->getClientOriginalExtension();
                $location = "/images/profiles/";
                $image->move($location, $filename);
                $db_filename = $location . $filename;
            } else {
                $db_filename = "";
            }

            $user = User::create([
                'email' => $request->email,
                'password' => $request->password,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'dob' => $request->country,
                'address' => $request->address,
                'contact_number' => $contact_number,
                'profile_image' => $db_filename,
            ]);
            //assign as admin
            $sentinel_user  = Sentinel::findById($user->id);
            $role = Sentinel::findRoleBySlug('admin');
            $role->users()->attach($sentinel_user);

            //store permission
            $user = Sentinel::findById($user->id);
            foreach ($request->permissions as $permission) {
                $user->addPermission($permission);
            }

            $user->save();

            return redirect('/admin/users/system')->with('success', 'New User Created');

    }
}
