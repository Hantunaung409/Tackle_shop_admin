@extends('mainLayout')
@section('title','Edit Your Item')
@section('content')
<div class="row">
    <form action="{{ route('overView@update') }}" method="POST" enctype="multipart/form-data" class="col-10 offset-1 col-sm-6 offset-sm-3 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 col-xxl-6 offset-xxl-3 shadow-lg mt-3 mt-sm-3 mt-lg-5 mt-xl-5 mt-xxl-5">
        {{-- alert --}}
        {{-- @if (session('updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-check"></i>{{ session('updated') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif --}}
        {{-- end alert --}}
        @csrf
            <img src="{{ asset('storage/postImage/'.$data->image) }}" alt="" class=" w-100 mt-1">

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
                    <option value="{{ $category->id }}" 
                     @if ($category->id == $data->category_id)
                         selected
                     @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            
            <label for="name" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Name</small></label>
            <input type="text" name="name" id="name"  placeholder="Enter a Name" value="{{ old('name',$data->name) }}" class=" form-control @error('name')
                is-invalid
            @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="price" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Price</small></label>
            <input type="number" name="price" id="price" placeholder=" Enter a Price" value="{{ old('price',$data->price) }}" class=" form-control @error('price')
                is-invalid
            @enderror">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="count" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Count</small></label>
            <input type="number" name="count" id="count" placeholder=" Enter item count" value="{{ old('count',$data->count) }}" class=" form-control @error('count')
                is-invalid
            @enderror">
            @error('count')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="currency" class=" mt-3 mb-1"><small><span class="text-danger">*</span>Currency</small></label>
            <select name="currency" id="currency" class=" form-select">
                     <option value="thai"
                     @if ($data->currency == 'thai')
                         selected
                     @endif
                     >Thailand</option>
                     <option value="china"
                     @if ($data->currency == 'china')
                         selected
                     @endif
                     >china</option>
                     <option value="us"
                     @if ($data->currency == 'us')
                         selected
                     @endif
                     >US Dollar</option>
            </select>

            <label for="details" class=" mt-3 mb-1"><small>Details</small></label>
            <textarea name="details" id="details" cols="30" class="form-control" rows="5">{{ old('details',$data->details) }}</textarea>

            <label for="brand" class=" mt-3 mb-1"><small>Brand</small></label>
            <input type="text" name="brand" id="brand" class=" form-control" value="{{ old('brand',$data->brand) }}" placeholder="Enter a Brand">
             
            @if ($data->image2)
                <img src="{{ asset('storage/secImage/'.$data->image2) }}" alt="" class=" w-100 mt-1">   
            @endif
            <label for="image2" class=" mb-1 mt-3"><small>Choose Second Image</small></label>
            <input type="file" name="image2" id="image2" class="form-control">

            @if ($data->image3)
            <img src="{{ asset('storage/thirdImage/'.$data->image3) }}" alt="" class=" w-100 mt-1">   
            @endif
            <label for="image3" class=" mb-1 mt-3"><small>Choose Third Image</small></label>
            <input type="file" name="image3" id="image3" class="form-control">

            <input type="hidden" name="id" value="{{ $data->id }}">
        <button type="submit" class=" btn btn-secondary float-end my-4">Update</button>
    </form> 
</div>

@endsection