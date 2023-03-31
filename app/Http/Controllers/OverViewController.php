<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                              ->orWhere('posts.currency','like','%'.request('searchKey').'%')
                              ->orWhere('categories.name','like','%'.request('searchKey').'%');
                          })
                     ->paginate(15);
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

    //direct to full info page
    public function more($id){
        $data = Post::where('id',$id)->first();
        return view('overView.singlePost',compact('data'));
    }

    //update edited item
    public function update(Request $request){
        $this->updateValidationCheck($request);
        $data = [
            'category_id' => $request->categoryId,
            'name' => $request->name,
            'price' => $request->price,
            'brand' => $request->brand,
            'count' => $request->count,
            'currency' => $request->currency,
            'details' => $request->details
        ];
        // for image
        if($request->hasFile('image')){
            $oldFileName = Post::select('image')->where('id', $request->id)->first();
            $oldImageName = $oldFileName->image;
            Storage::delete('public/postImage/'.$oldImageName); //doesnt need /storage
            
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/postImage', $fileName);
            $data['image'] = $fileName;
        }

        // for second image
        if($request->hasFile('image2')){
            $oldSecFileName = Post::select('image2')->where('id', $request->id)->first();
            $oldSecImageName = $oldSecFileName->image2;
            Storage::delete('public/secImage/'.$oldSecImageName); //doesnt need /storage
            
            $fileName = uniqid().$request->file('image2')->getClientOriginalName();
            $request->file('image2')->storeAs('public/secImage', $fileName);
            $data['image2'] = $fileName;
        }

        // for second image
        if($request->hasFile('image3')){
            $oldThirdFileName = Post::select('image3')->where('id', $request->id)->first();
            $oldThirdImageName = $oldThirdFileName->image3;
            Storage::delete('public/thirdImage/'.$oldThirdImageName); //doesnt need /storage
            
            $fileName = uniqid().$request->file('image3')->getClientOriginalName();
            $request->file('image3')->storeAs('public/thirdImage', $fileName);
            $data['image3'] = $fileName;
        }
        Post::where('id', $request->id)->update($data);
        return redirect()->route('overView@indexPage');
    }

    //delete item
    public function delete(Request $request){
        Post::where('id', $request->id)->delete();
    }

    //make an item out of stock
    public function outOfStock(Request $request){
         $data = Post::where('id',$request->id)->update([ 'count' => 0]);
    }

    //update validation check
    private function updateValidationCheck($request){
        Validator::make($request->all(),[
            'price' => 'required',
            'image' => 'file|mimes:png,jpg,jpeg,webp',
            'count' => 'required',
            'currency' => 'required',
            'name' => 'required|unique:posts,name,'.$request->id
        ])->validate();
    }
}
