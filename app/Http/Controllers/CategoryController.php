<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //direct to category index page
    public function categoryPage(){
        return view('category.index');
    }
}
