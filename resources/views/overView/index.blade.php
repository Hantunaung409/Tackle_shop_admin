@extends('mainLayout')
@section('title','OverView')
@section('content')
<div class="container ">
    @if ($data->count() == null)
        <h2 class=" text-center mt-5">Your Items Will Pop Up Here Once You've Posted!</h2>
    @else
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
                   <input type="hidden" name="postId" class="postId" value="{{ $d->id }}">
                   <td class="col">{{ $d->name }}</td>
                   <td class="col">{{ $d->price }}</td>
                   <td class="col" >{{ $d->category_name }}</td>
                   <input type="hidden" name="postName" class="postName" value="{{ $d->name }}">
                   <td class="col">
                    @if ($d->brand == null)
                        <span style=" opacity: 0.5;">Unknow</span> 
                    @else
                       {{ $d->brand }}                        
                    @endif

                   </td>
                   <td class="col"><a href="{{ route('overView@edit',$d->id) }}"><i class="fa-solid fa-pen" title="Edit"></i> </a></td>
                   <td class=" col"><i class="fa-solid fa-trash-can text-danger" title="Delete"></i> </td>                   
               </tr>  
           @endforeach

       </tbody>
    </table>
    {{ $data->links() }}
</div> 
    @endif
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function (){
            $('.fa-trash-can').click(function () {
                $parentNode = $(this).parents('tr');
                $id = $parentNode.find('.postId').val();
                $postName = $parentNode.find('.postName').val();
                if (window.confirm(`Are you sure to delete ${$postName}?`)) {
                $.ajax({
                    type : 'get' ,
                    url : '/overView/delete' ,
                    data : { 'id' : $id } ,
                    dataType: 'json',
                })
                window.location.href = "/overView";
            }
            })
        })
    </script>
@endsection