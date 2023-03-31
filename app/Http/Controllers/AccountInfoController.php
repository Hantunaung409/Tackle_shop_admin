<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountInfoController extends Controller
{
    //direct info page
    public function infoPage(){
       return view('accountInfo.index');
    }

    //update account info
    public function update(Request $request){
        $this->updateValidationCheck($request);
        $updatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ];
        // for image
        if($request->hasFile('image')){
            $oldFile = User::select('image')->where('id', $request->userId)->first();
            $oldFile = $oldFile->image;
            if($oldFile != null){
             Storage::delete('public/userImage/'.$oldFile);//dot
            }
            $NewFileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/userImage',$NewFileName); //comma
            $updatedData['image'] = $NewFileName;
        }
        User::where('id', $request->userId)->update($updatedData);

        return redirect()->route('account@infoPage')->with(['updated' => 'Your Infos Has Been Updated Successfully!']);
    }

    //direct to change password page
    public function changePasswordPage(){
        return view('accountInfo.changePassword');
    }

    //change password
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword) 
            ]);
            Auth::logout();
            return redirect()->route('adminAuth@loginPage');
        }
        return back()->with(['not match' => 'Opps! Something Went Wrong!']);
    }


    //update validation check
    private function updateValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ])->validate();
    }

    //password validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required' ,
            'newPassword' => 'required|min:6' ,
            'comfirmPassword' => 'required|min:6|same:newPassword' ,
        ])->validate();
    }
    
}
