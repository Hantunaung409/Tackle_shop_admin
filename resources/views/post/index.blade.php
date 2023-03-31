@extends('mainLayout')
@section('title','Item')
@section('content')
   @if ($categoryData->count() == null)
       <h1 class=" text-center text-danger mt-5">Please add a category First!</h1>
   @else
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('post@add') }}" method="POST" enctype="multipart/form-data" class="col-10 offset-1 col-sm-10 offset-sm-1 col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-1 col-xxl-5 offset-xxl-1 shadow-lg mt-3 mt-sm-3 mt-lg-5 mt-xl-5 mt-xxl-5">
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

                    <label for="currency" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Choose a Currency</small></label>
                    <select name="currency" id="currency" class=" form-select">
                            <option value="thai">Thailand</option>
                            <option value="china">China</option>
                            <option value="us">US Dollar</option>
                    </select>

                    <label for="count" class=" mt-3 mb-1"><span class="text-danger">*</span><small>Count</small></label>
                    <input type="number" name="count" id="count" class=" form-control @error('count')
                        is-invalide
                    @enderror" value="{{ old('count') }}" placeholder="Enter Item Count">
                    @error('count')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="brand" class=" mt-3 mb-1"><small>Brand</small></label>
                    <input type="text" name="brand" id="brand" class=" form-control" value="{{ old('brand') }}" placeholder="Enter a Brand">

                    <label for="details" class="mt-3 mb-1"><small>Details</small></label>
                    <textarea name="details" id="details" cols="20" rows="5" placeholder="gear ratio,available colors etc.. " class=" form-control" value="{{ old('details') }}"></textarea>


                    <label for="image2" class="mt-3 mb-1"><small>Choose Second Image</small></label>
                    <input type="file" name="image2" id="image2" class="form-control">

                    <label for="image3" class="mt-3 mb-1"><small>Choose Third Image</small></label>
                    <input type="file" name="image3" id="image3" class="form-control">
                 </fieldset>
                 <button type="submit" class=" btn btn-secondary float-end my-4">Add</button>
            </form>
            
            {{-- Showing Item --}}
            <div class="col-10 offset-1 col-sm-10 offset-sm-1 col-md-4 offset-md-1 col-lg-4 offset-lg-1 col-xl-4 offset-xl-1 col-xxl-4 offset-xxl-1 mt-5 mt-sm-3 mt-lg-5 mt-xl-5 mt-xxl-5">
                @if ($postData->count() == null)
                    
                @else
                    <div class="shadow-lg position-relative" style=" h-100">
                            @foreach ($postData as $post)
                                <div class=" my-auto">
                                <img src="{{ asset('storage/postImage/'.$post->image) }}" alt="" class=" w-100" style="vertical-align: middle; heihgt: 100%;">
                                <div class=" position-absolute w-100 p-2 text-white" style="bottom: 0; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.5);">
                                <h3>{{ $post->name }}</h3>
                                <h5>{{ $post->price }}-MMKS</h5>
                                <h5>{{ $post->brand }}</h5>
                                </div>
                                </div>
                            @endforeach                         
    
                    </div>                    
                @endif

              <div class=" mt-3">
                 {{ $postData->links() }}                    
              </div>
            </div>

        </div>
    </div>   
   @endif

@endsection