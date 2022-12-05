@extends('mainLayout')
@section('content')
   <div class="container ">
     <table class=" table table-striped mt-3 mt-sm-5 mt-md-5 mt-lg-5 mt-xl-5 mt-xxl-5 rounded">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userList as $user)
                <tr>
                    <td class="col-1">
                        @if ($user->image == null)
                         <img src="{{ asset('image/defaultUser/default_user_image.jpeg') }}" alt="" class=" img-thumbnail shadow-sm" >
                        @else
                         <img src="{{ asset('storage/userImage/'.$user->image) }}" alt="" style="height: 42px;" class=" img-thumbnail shadow-sm">
                        @endif
                    </td>
                    <input type="hidden" name="userId" value="{{ $user->id }}" class="userId">
                    <td class="col">{{ $user->name }}</td>
                    <td class="col">{{ $user->email }}</td>
                    <td class="col">{{ $user->phone }}</td>
                    <td class="col">
                        @if ($user->role == 'admin')
                          {{ $user->role }}                            
                        @else
                          <span class=" btn btn-secondary btn-sm approve">Approve</span>  
                        @endif

                    </td>
                    <td class="col">
                    @if (Auth::user()->id == $user->id)
                    <a href="{{ route('account@infoPage') }}">
                        <i class="fa-solid fa-pen" title="Edit"></i> 
                    </a>   
                    @else
                      <i class="fa-solid fa-trash-can text-danger" title="Delete"></i> 
                    @endif</td>
                </tr>  
            @endforeach

        </tbody>
     </table>
   </div>
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function () {
            //delete an admin from list
           $('.fa-trash-can').click(function () {
            $parendNode = $(this).parents('tr');
            $userId = $parendNode.find('.userId').val();
            
            $.ajax({
                type : 'get' ,
                url : '/adminList/delete' ,
                data : { 'userId' : $userId } ,
                dataType: 'json',
            })
            window.location.href = "/adminList";
           })

           //approve to an admin
           $('.approve').click(function () {
            $parendNode = $(this).parents('tr');
            $userId = $parendNode.find('.userId').val();
            
            $.ajax({
                type : 'get' ,
                url : '/adminList/approve' ,
                data : { 'userId' : $userId } ,
                dataType: 'json',
            })
            window.location.href = "/adminList";
           })
        })
    </script>
@endsection