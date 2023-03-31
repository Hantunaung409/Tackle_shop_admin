@extends('mainLayout')
@section('title','Edit Category')
@section('content')
            <div class="row bg-light m-1">
                <div class="row mt-2">
                    <div class="col-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3  col-lg-6 offset-lg-3  col-xl-6 offset-xl-3  col-xxl-6 offset-xxl-3 ">
                        <!-- add new category Card -->
                        <div class="card shadow-sm bg-white text-center">
                            <div class="card-title mt-2 fs-4">Edit Category</div>
                            <div class="card-body">
                                <form action="{{ route('Category@update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="categoryId" value="{{ $data->id }}">
                                    <label for="categoryName" class=" ">Category Name</label>
                                    <input type="text" name="categoryName" id="categoryName" class=" form-control my-2 @error('categoryName')
                                        is-invalid
                                    @enderror" value="{{ old('categoryName', $data->name) }}">
                                    @error('categoryName')
                                       <div class=" invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                    <label for="categoryNote" class=" mt-2">Short Note</label>
                                    <input type="text" name="categoryNote" id="categoryNote" class=" form-control my-2" value="{{ old('categoryNote', $data->note) }}">
                                    <button class="btn btn-secondary mx-auto my-2" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                        <!-- end of add new category card -->
                    </div>
                </div>
        </div>
@endsection