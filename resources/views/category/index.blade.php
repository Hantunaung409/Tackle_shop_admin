@extends('mainLayout')
@section('content')
            <div class="row bg-light m-1">
            <div class="container2 ">
                <div class="row mt-2">
                    <div class="col-4">
                        <!-- add new category Card -->
                        <div class="card shadow-sm bg-white text-center">
                            <div class="card-title mt-2">Add A New Category</div>
                            <div class="card-body">
                                <form action="{{ route('Category@create') }}" method="POST">
                                    @csrf
                                    <input type="text" name="categoryName" id="" placeholder="New Category Name" class=" form-control my-4 @error('categoryName')
                                        is-invalid
                                    @enderror" value="{{ old('categoryName') }}">
                                    @error('categoryName')
                                       <div class=" invalid-feedback">{{ $message }}</div> 
                                    @enderror
                                    <input type="text" name="categoryNote" id="" placeholder="Short Note" class=" form-control my-4" value="{{ old('categoryNote') }}">
                                    <button class="btn btn-secondary mx-auto my-2" type="submit">Add</button>
                                </form>
                            </div>
                        </div>
                        <!-- end of add new category card -->
                    </div>
                    <div class="col-8 ps-5">
                        <table class=" table table-striped shadow-sm rounded">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat)
                                    <tr>
                                        <td>{{$cat->id }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->note }}</td>
                                        <td><i class="fa-solid fa-pencil" title="Edit"></i></td>
                                        <td><i class="fa-solid fa-trash-can text-danger" title="Delete"></i></</td>
                                    </tr>                                    
                                @endforeach

                            </tbody>

                        </table>
                        {{ $category->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection