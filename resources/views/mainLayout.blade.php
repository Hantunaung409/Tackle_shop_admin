<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- fontawesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('links')
    <title>@yield('title')</title>
</head>
<body>
                 {{-- offcanvas outside --}}
                 <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false"
                 tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                 <div class="offcanvas-header">
                     <a href="{{ route('Auth@dashboard') }}" class=" text-decoration-none {{ "dashboard" == request()->path() ? "text-primary" : "text-dark" }}"><h5 class="offcanvas-title" id="offcanvasScrollingLabel"><i class="fa-solid fa-house me-2"></i>Tackle Shop</h5></a>
                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body border-top">
                     <ul class=" list-unstyled list-group list-group-flush">
                         <a href="{{ route('Auth@categoryPage') }}" class=" text-decoration-none list-group-item list-group-item-action rounded {{ "category" == request()->path() ? "text-primary" : "" }}">
                             <li><i class="fa-solid fa-cubes-stacked me-2"></i>Category</li>
                         </a>
                         <a href="{{ route('Auth@postPage') }}" class=" text-decoration-none list-group-item list-group-item-action rounded {{ "post" == request()->path() ? "text-primary" : "" }}">
                             <li><i class="fa-solid fa-pen-to-square me-2"></i>Post</li>
                         </a>
                         <a href="{{ route('Auth@adminListPage') }}" class=" text-decoration-none list-group-item list-group-item-action rounded {{ "adminList" == request()->path() ? "text-primary" : "" }}">
                             <li><i class="fa-solid fa-users me-2"></i>Admins</li>
                         </a>
                         <a href="{{ route('overView@indexPage') }}" class=" text-decoration-none list-group-item list-group-item-action rounded {{ "overView" == request()->path() ? "text-primary" : "" }}">
                             <li><i class="fa-solid fa-eye me-2"></i>Overview Your Items</li>
                         </a>
                         <form action="{{ route('logout') }}" method="post">
                          @csrf
                           <button class="btn btn-sm btn-primary mt-3" type="submit">Logout</button>
                           <a href="" class=" btn btn-secondary btn-sm mt-3 float-end">Go to your Site</a>
                         </form>    
                     </ul>
                 </div>
             </div>
             {{-- end of offcanvas outside --}}

        <div class="row shadow-sm sticky-top bg-white d-flex align-items-center" style=" min-width: 550px;">
            <div class="col-1 offset-1">
                <!-- offcanvas button -->
                <button class="btn btn-secondary btn-sm mb-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                        class="fa-solid fa-bars"></i></button>
                <!-- end of offcanvas button -->
            </div>
            
            <div class="col-4 offset-2   my-auto fs-4">Tackle Shop</div>
            <div class="col-2 offset-2">
                <a href="{{ route('account@infoPage') }}">
                    @if ( Auth::user()->image == null )
                    <img src="{{ asset('image/defaultUser/default_user_image.jpeg') }}" alt="" style="height: 30px;" class=" rounded-5 img-thumbnail shadow-sm object-cover my-2">
                    @else
                        <img src="{{ asset('storage/userImage/'.Auth::user()->image) }}" alt="" style="height: 30px;" class=" rounded-5 img-thumbnail shadow-sm object-cover my-2">
                    @endif
                </a>
            </div>
        </div>
        @yield('content')
</body>
<!-- bootstarp -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scriptSource')
</html>