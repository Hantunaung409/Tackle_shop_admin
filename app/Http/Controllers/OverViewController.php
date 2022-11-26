<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverViewController extends Controller
{
    //direct overview index page
    public function overViewPage(){
        return view('overViews.index');
    }
}
