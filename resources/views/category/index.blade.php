@extends('mainLayout')
@section('title','Category')
@section('content')
            <div class="row bg-light m-1">
                <div class="row mt-2">
                    <div class="col-12 col-sm-4 offset-sm-none col-md-4 col-lg-4 col-xl-4 col-xxl-4">
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
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 ps-5 mt-5 mt-sm-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                        {{-- alert --}}
                        @if (session('deleted'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-trash"></i>{{ session('deleted') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('updated'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-check me-2"></i>{{ session('updated') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- end alert --}}
                        <table class=" table table-striped shadow-sm rounded">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat)
                                    <tr class="data">
                                        <input type="hidden" name="categoryId" value="{{ $cat->id }}" class="categoryId">
                                        <input type="hidden" name="categoryName" class="categoryName" value="{{ $cat->name }}">
                                        {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                        {{-- <td>{{ ($cat->currentpage() - 1) * $cat->perpage() + $loop->index + 1 }}</td> although, methods of pagination are not working in FOREACH (just an idea)--}}
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->note }}</td>
                                        <td><a href="{{ route('Category@editPage',$cat->id) }}"><i class="fa-solid fa-pencil" title="Edit"></i></a></td>
                                        <td><i class="fa-solid fa-trash-can text-danger deleteBtn" title="Delete" style="cursor: pointer;"></i></td>
                                    </tr>                                    
                                @endforeach

                            </tbody>

                        </table>
                        {{ $category->appends(request()->query())->links() }}
                    </div>
                </div>
        </div>
@endsection
@section('scriptSource')
<script>
  $(document).ready(function () {
    $('.deleteBtn').click(function (){ 
       $parentNode = $(this).parents('tr');
       $categoryId = $parentNode.find('.categoryId').val();      
       $categoryName = $parentNode.find('.categoryName').val();     
        if (window.confirm(`Are You Sure? This will delete all posts under ${$categoryName} too!`)) {
            $.ajax({
                type : 'get',
                url : '/category/ajax/delete',
                data : { 'categoryId' : $categoryId },
                dataType : 'json' ,
            })
            window.location.href = "/category";            
        }
    })
  })
</script>
@endsection