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

    // delete category using ajax 
    public function delete(Request $request){
     Category::where('id', $request->categoryId)->delete();
     Post::where('category_id',$request->categoryId)->delete();
     return redirect()->route('Auth@categoryPage')->with(['deleted' => 'A category is successfully deleted']);
    }

    //edit category
    public function editPage($id){
      $data = Category::where('id', $id)->first();
      return view('category.editPage',compact('data'));
    }

    //update Category
    public function update(Request $request){
      $this->creationValidationCheck($request);
      Category::where('id', $request->categoryId)->update([
        'name' => $request->categoryName,
        'note' => $request->categoryNote
      ]);
      return redirect()->route('Auth@categoryPage')->with(['updated' => 'A category is updated successfully!']);
    }


    //creation validation check
    private function creationValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' => 'required|unique:categories,name'
        ])->validate();
    }
}
