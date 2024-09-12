<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function store(){
        return view('dashbord.categores.add');
    }
}
