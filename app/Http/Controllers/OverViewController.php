<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OverViewController extends Controller
{
    //direct to index page
    public function indexPage(){
        $data = Post::select('posts.*','categories.name as category_name')
                     ->leftJoin('categories','categories.id','posts.category_id')
                     ->when(request('searchKey'), function($query){
                        $query->orWhere('posts.name','like','%'.request('searchKey').'%')
                              ->orWhere('posts.price','like','%'.request('searchKey').'%')
                              ->orWhere('posts.brand','like','%'.request('searchKey').'%')
                              ->orWhere('categories.name','like','%'.request('searchKey').'%');
                          })
                     ->paginate(4);
        $data->appends(request()->all());
        return view('overView.index',compact('data'));
    }

    //direct to edit page
    public function editPage($id){
        $data = Post::select('posts.*', 'categories.name as category_name')
                      ->leftJoin('categories', 'categories.id', 'posts.category_id')
                      ->where('posts.id',$id)
                      ->first();
        $categoryData = Category::get();
        return view('overView.edit',compact('data','categoryData'));
    }

    //update edited item
    public function update(Request $request){
        $this->updateValidationCheck($request);
        dd('success');
    }


    //update validation check
    private function updateValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required|unique:posts,name,'.$request->id,
            'price' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg,webp'
        ])->validate();
    }
}
