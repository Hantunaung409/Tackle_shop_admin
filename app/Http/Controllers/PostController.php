<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //direct post index page
    public function postPage(){
        $categoryData = Category::get();
        $postData = Post::select('posts.*','categories.name as category_name')
                          ->leftJoin('categories','categories.id','posts.category_id')
                          ->orderBy('id','desc')->paginate(1);
        return view('post.index',compact('categoryData','postData'));
    }

    //add an item
    public function add(Request $request){
        $this->addPostValidationCheck($request);
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/postImage', $fileName);
        $data = [
            'category_id' => $request->categoryId ,
            'name' => $request->name ,
            'price' => $request->price ,
            'brand' => $request->brand ,
            'image' => $fileName
        ];
        Post::create($data);
        return redirect()->route('Auth@postPage')->with(['created' => 'An item was created successfully!']);
    }

    //add post validation check
    private function addPostValidationCheck($request){
        Validator::make($request->all(),[
          'name' => 'required|unique:posts,name',
          'price' => 'required',
          'image' => 'required|file|mimes:png,jpg,jpeg,webp'
        ])->validate();
    }
}
