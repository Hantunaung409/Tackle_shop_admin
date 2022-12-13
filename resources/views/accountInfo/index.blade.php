@extends('mainLayout')
@section('title','Your Accout Info')
@section('content')
    <div class="container-sm d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-title">
              <span class="d-flex justify-content-center mt-2">Your Account Info</span> 
              {{-- alert --}}
              @if (session('updated'))
                  <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
                      <strong><i class="fa-solid fa-check"></i>{{ session('updated') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert"
                          aria-label="Close"></button>
                  </div> 
              @endif
              {{-- end of alert --}}
            </div>
            <div class="card-body">
                <div class=" text-center">
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('image/defaultUser/default_user_image.jpeg') }}" alt="" style="height: 100px;" class=" rounded-circle img-thumbnail shadow-sm">
                    @else
                        <img src="{{ asset('storage/userImage/'.Auth::user()->image) }}" alt="" style="height: 100px;" class=" rounded-circle img-thumbnail shadow-sm">
                    @endif                    
                </div>
         
               <form action="{{ route('account@update') }}" method="POST" enctype="multipart/form-data" class=" mt-2">
                @csrf
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                <input type="file" name="image" id="" class="form-control">
                <label for="name" class=" mt-2">Name::</label>
                <input type="text" name="name" id="name" placeholder="Name" class=" form-control @error('name')
                    is-invalid
                @enderror" value="{{ old('name',Auth::user()->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="email" class=" mt-2">Email::</label>
                <input type="email" name="email" id="email" placeholder="Email" class=" form-control @error('email')
                    is-invalid
                @enderror" value="{{ old('email',Auth::user()->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="phone" class=" mt-2">Phone::</label>
                <input type="number" name="phone" id="phone" placeholder="Phone" class=" form-control @error('phone')
                    is-invalid
                @enderror" value="{{ old('phone',Auth::user()->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class=" btn btn-sm btn-secondary mt-3 float-end">Update</button>
               </form>
            </div>
            <div class="card-footer">
               <a href="{{ route('account@changePasswordPage') }}" class=" text-dark mt-5">Change Password</a>                
            </div>
        </div>
    </div>
@endsection