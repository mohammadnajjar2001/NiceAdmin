<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('dashbord.categores.index');
    }
    public function store(){
        return view('dashbord.categores.add');
    }
}
