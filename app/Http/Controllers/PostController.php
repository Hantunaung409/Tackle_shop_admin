<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //direct post index page
    public function postPage(){
        return view('post.index');
    }
}
