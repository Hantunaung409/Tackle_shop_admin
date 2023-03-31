<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminListController extends Controller
{
    //direct admins list index
    public function adminListPage(){
        $userList = User::get();
        return view('adminList.index',compact('userList'));
    }

    //delete an admin from list
    public function delete(Request $request){
       $userImage = User::select('image')->where('id',$request->userId)->first();
       if($userImage != null){
        Storage::delete('public/userImage/'.$userImage->image);
       }
       User::where('id', $request->userId)->delete();
    }

    //approve a user to an admin
    public function approve(Request $request){
        User::where('id', $request->userId)->update([
            'role' => 'admin',
        ]);
    }
}
