<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
