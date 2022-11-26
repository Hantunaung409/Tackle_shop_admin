<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminListController extends Controller
{
    //direct admins list index
    public function adminListPage(){
        return view('adminList.index');
    }
}
