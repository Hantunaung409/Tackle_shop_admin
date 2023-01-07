<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postApiController extends Controller
{
    //for all posts
    public function allPosts(){
        $data = Post::orderBy('id','desc')->get();

        return response()->json([
            'AllPostsData' => $data 
        ]);
    }

    //search post
    public function searchPost(Request $request){
        $data = Post::orWhere('name','like','%'.$request->searchKey.'%')
                      ->orWhere('brand','like','%'.$request->searchKey.'%')
                      ->orWhere('price','like','%'.$request->searchKey.'%')
                      ->get();
        return response()->json([
            'postSearchResult' => $data
        ]);
    }
}
