@extends('mainLayout')
@section('title','Item')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('post@add') }}" method="POST" enctype="multipart/form-data" class="col-6 offset-3 col-sm-6 offset-sm-3 col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-1 col-xxl-5 offset-xxl-1 shadow-lg mt-3 mt-sm-3 mt-lg-5 mt-xl-5 mt-xxl-5">
                {{-- alert --}}
                @if (session('created'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-check"></i>{{ session('created') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                {{-- end alert --}}
                @csrf
                 <fieldset>
                    <legend class=" text-center">Post an Item</legend>

                    <label for="image" class=" mb-1"><small><span class="text-danger">*</span>Choose an Image</small></label>
                    <input type="file" name="image" id="image" class="form-control @error('image')
                        is-invalid
                    @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="categoryId" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Choose a Cateogry</small></label>
                    <select name="categoryId" id="categoryId" class=" form-select">
                        @foreach ($categoryData as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                    <label for="name" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Name</small></label>
                    <input type="text" name="name" id="name"  placeholder="Enter a Name" value="{{ old('name') }}" class=" form-control @error('name')
                        is-invalid
                    @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="price" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Price</small></label>
                    <input type="number" name="price" id="price" placeholder=" Enter a Price" value="{{ old('price') }}" class=" form-control @error('price')
                        is-invalid
                    @enderror">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="brand" class=" mt-3 mb-1"><small>Brand</small></label>
                    <input type="text" name="brand" id="brand" class=" form-control" value="{{ old('brand') }}" placeholder="Enter a Brand">
                 </fieldset>
                 <button type="submit" class=" btn btn-secondary float-end my-4">Add</button>
            </form>
            
            {{-- Showing Item --}}
            <div class="col-8 offset-2 col-sm-8 offset-sm-2 col-md-4 offset-md-1 col-lg-4 offset-lg-1 col-xl-4 offset-xl-1 col-xxl-4 offset-xxl-1 mt-5 mt-sm-3 mt-lg-5 mt-xl-5 mt-xxl-5">
                <div class="shadow-lg position-relative" style="height: 300px;">
                    @foreach ($postData as $post)
                        <div class=" my-auto">
                        <img src="{{ asset('storage/postImage/'.$post->image) }}" alt="" class=" w-100" style="vertical-align: middle;">
                        <div class=" position-absolute w-100 p-2 text-white" style="bottom: 0; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.5);">
                        <h3>{{ $post->name }}</h3>
                        <h5>{{ $post->price }}-MMKS</h5>
                        <h5>{{ $post->brand }}</h5>
                        </div>
                        </div>
                    @endforeach   
                </div>
 
              <div class=" mt-3">{{ $postData->links() }}</div>
            </div>

        </div>
    </div>
@endsection