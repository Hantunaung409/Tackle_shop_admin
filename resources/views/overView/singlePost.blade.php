@extends('mainLayout')
@section('title',$data->name)
@section('content')
   <div class="row mt-5">
    <div class="col-12 col-sm-3 offset-sm-1">
        <h3 class="text-center">Main Image</h3>
        <img src="{{ asset('storage/postImage/'.$data->image) }}" alt="" width="100%">
    </div>
    <div class="col-12 col-sm-3 offset-sm-1">
        <img src="{{ asset('storage/secImage/'.$data->image2) }}" alt="" width="100%">
    </div>
    <div class="col-12 col-sm-3 offset-sm-1">
        <img src="{{ asset('storage/thirdImage/'.$data->image3) }}" alt="" width="100%">
    </div>
   </div>
   <hr>

   <div class="row">
    <div class="col-12 col-sm-6">
        <div class=" mx-1 mx-sm-5">
            <table class="table table-striped table-hover">
            <tr>
                <td class="text-danger">Name</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td class="text-danger">Brand</td>
                @if ($data->brand)
                <td>{{ $data->brand }}</td>
                @else
                    <td>Unknown</td>
                @endif
            </tr>
            <tr>
                <td class="text-danger">Price</td>
                <td>{{ $data->price }}</td>
            </tr>
            <tr>
                <td class="text-danger">Currency</td>
                @if ($data->currency = 'thai')
                    <td>Thailand</td>
                @elseif ($data->currency = 'china')
                    <td>China</td>
                @else
                    <td>US Dollar</td>
                @endif
            </tr>
            <tr>
                <td class="text-danger">Count</td>
                <td>{{ $data->count }}</td>
            </tr>         
            </table>
        </div>        
    </div>
    <div class="col-12 col-sm-5 offset-sm-1">
        <div class="card p-3">
            <div class="card-title text-danger font-weight-bold">Details</div>
            <div class="card-body">
                {{ $data->details }}
            </div>
        </div>
    </div>
   </div>
   <button class=" btn btn-secondary float-end my-4 me-5"><a href="{{ route('overView@edit',$data->id) }}" class="text-decoration-none text-white">Edit this item</a></button>
@endsection