<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceImageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
}
