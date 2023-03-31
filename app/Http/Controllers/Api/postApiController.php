<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postApiController extends Controller
{
    //for all posts
    public function allPosts(){
        $data = Post::orderBy('id','desc')->paginate(18);

        return response()->json([
            'AllPostsData' => $data 
        ]);
    }

    //search post
    public function searchPost(Request $request){
        $data = Post::orderBy('id','desc')->select('posts.*','categories.name as categoryName')
                      ->leftJoin('categories','categories.id','posts.category_id')
                      ->orWhere('categories.name','like','%'.$request->searchKey.'%')
                      ->orWhere('posts.name','like','%'.$request->searchKey.'%')
                      ->orWhere('posts.brand','like','%'.$request->searchKey.'%')
                      ->orWhere('posts.price','like','%'.$request->searchKey.'%')
                      ->paginate(100);
        return response()->json([
            'postSearchResult' => $data
        ]);
    }

    //single post
    public function singlePost(Request $request){
        $data = Post::where('posts.id', $request->id)
                      ->select('posts.*','categories.name as categoryName')
                      ->leftJoin('categories','categories.id','posts.category_id')
                      ->first();

        return response()->json([
            'singlePost' => $data
        ]);

    }
}
