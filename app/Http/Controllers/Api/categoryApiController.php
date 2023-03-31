<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryApiController extends Controller
{
    //get all categories
    public function allCategories(){
        $data = Category::get();
        return response()->json([
            'allCategories' => $data
        ]);
    }

    //search category
    public function searchCategory(Request $request){
        $data = Post::orderBy('id','desc')->select('posts.*')
                      ->leftJoin('categories','categories.id','posts.category_id')
                      ->where('categories.name',$request->searchKey)
                      ->paginate(100);
        return response()->json([
            'categorySearchResult' => $data
        ]);
    }
}
