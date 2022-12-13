@extends('mainLayout')
@section('title','Change Your Password')
@section('content')
<div class="container-fluid">
    <div class="card mt-3 mx-5">
        <div class="card-title">
          <span class="d-flex justify-content-center mt-2">Change Your Password</span> 
          {{-- alert --}}
          @if (session('not match'))
              <div class="alert alert-warning alert-dismissible fade show mx-3" role="alert">
                  <strong><i class="fa-solid fa-check"></i>{{ session('not match') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"
                      aria-label="Close"></button>
              </div> 
          @endif
          {{-- end of alert --}}
        </div>
        <div class="card-body">
         <form action="{{ route('account@changePassword') }}" method="post" enctype="multipart/form-data" class=" ms-3">
          @csrf

          <label for="oldPassword" class=" mt-3">Old Password</label>
          <div class="row d-flex justify-content-center align-items-center">
            <input type="password" name="oldPassword" id="oldPassword" placeholder="Enter Your Old Password" class=" col form-control mt-1 @error('oldPassword')
                is-invalid
            @enderror">
            <i class="fa-solid fa-eye col-1" aria-hidden="true" onclick="toggle1()" id="old-eye"></i>            
          </div>
          @error('oldPassword')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <label for="newPassword" class=" mt-3">New Password</label>
          <div class="row d-flex justify-content-center align-items-center">
            <input type="password" name="newPassword" id="newPassword" placeholder="Enter Your New Password" class="col form-control mt-1 @error('newPassword')
                is-invalid
            @enderror">
            <i class="fa-solid fa-eye col-1" aria-hidden="true" onclick="toggle2()" id="new-eye"></i>                           
          </div>
          @error('newPassword')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <label for="comfirmPassword" class=" mt-3">Comfirm Your Password</label>
          <div class="row d-flex justify-content-center align-items-center">
            <input type="password" name="comfirmPassword" id="comfirmPassword" placeholder="Comfirm Your New Password" class="col form-control mt-1 @error('comfirmPassword')
                is-invalid
            @enderror">
            <i class="fa-solid fa-eye col-1" aria-hidden="true" onclick="toggle3()" id="comfirm-eye"></i>               
          </div>
          @error('comfirmPassword')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <button type="submit" class=" btn btn-secondary float-end mt-3 me-5">Update</button>
         </form>
        </div>
        <div class="card-footer">
                          
        </div>
    </div>
</div>
@endsection
@section('scriptSource')
    <script>
      let state1 = false;
      let state2 = false;
      let state3 = false;

      function toggle1(){
        if(state1){
            document.getElementById('oldPassword').setAttribute('type','password');
            document.getElementById('old-eye').style.color = '#7a797e' ;
            state1 = false;
        }else{
            document.getElementById('oldPassword').setAttribute('type','text');
            document.getElementById('old-eye').style.color = '#5887ef' ;
            state1 = true;
        }
      }

      function toggle2(){
        if(state2){
            document.getElementById('newPassword').setAttribute('type','password');
            document.getElementById('new-eye').style.color = '#7a797e' ;
            state2 = false;
        }else{
            document.getElementById('newPassword').setAttribute('type','text');
            document.getElementById('new-eye').style.color = '#5887ef' ;
            state2 = true;
        }
      }

      function toggle3(){
        if(state3){
            document.getElementById('comfirmPassword').setAttribute('type','password');
            document.getElementById('comfirm-eye').style.color = '#7a797e' ;
            state3 = false;
        }else{
            document.getElementById('comfirmPassword').setAttribute('type','text');
            document.getElementById('comfirm-eye').style.color = '#5887ef' ;
            state3 = true;
        }
      }
    </script>
@endsection