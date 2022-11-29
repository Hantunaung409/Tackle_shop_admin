<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct to category index page
    public function categoryPage(){
        $category = Category::orderBy('id','desc')->paginate(5);
        return view('category.index',compact('category'));
    }

    //create category
    public function create(Request $request){
        $this->creationValidationCheck($request);
        Category::create([
            'name' => $request->categoryName,
            'note' => $request->categoryNote
        ]);
        return redirect()->route('Auth@categoryPage');
    }


    //creation validation check
    private function creationValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required'
        ])->validate();
    }
}
