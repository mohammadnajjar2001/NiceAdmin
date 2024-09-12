<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index(){
        return view('dashbord.dashbord.index');
    }
}
