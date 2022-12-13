@extends('mainLayout')
@section('title','OverView')
@section('content')
<div class="container ">
        <!-- Search -->
            <form action="{{ route('overView@indexPage') }}" method="GET" class="row mt-3">
                @csrf
                <div class=" col-7 offset-5 d-flex align-items-center justify-content-center border rounded-5 px-3" >
                    <input type="search" name="searchKey" id="search" placeholder="Search Here..."
                        class=" form-control me-2 shadow-none border-0" style="margin-left: -10px;" value="{{ request('searchKey') }}">
                    <label for="search" class="form-label mt-2"><i class="fa-solid fa-magnifying-glass fs-5 opacity-25"></i></label>
                </div>
            </form>

    <!-- end of Search -->
    <table class=" table table-striped mt-3 rounded">
       <thead>
           <tr>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Category</th>
               <th>Brand</th>
               <th></th>
               <th></th>
           </tr>
       </thead>
       <tbody>

           @foreach ($data as $d)
               <tr>
                   <td class="col-2">
                        <img src="{{ asset('storage/postImage/'.$d->image) }}" alt="" style="height: 42px;" class=" img-thumbnail shadow-sm">
                   </td>
                   <td class="col">{{ $d->name }}</td>
                   <td class="col">{{ $d->price }}</td>
                   <td class="col">{{ $d->category_name }}</td>
                   <td class="col">{{ $d->brand }}</td>
                   <td class="col"><a href="{{ route('overView@edit',$d->id) }}"><i class="fa-solid fa-pen" title="Edit"></i> </a></td>
                   <td class=" col"><i class="fa-solid fa-trash-can text-danger" title="Delete"></i> </td>                   
               </tr>  
           @endforeach

       </tbody>
    </table>
    {{ $data->links() }}
</div>
@endsection