<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css">
    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- fontawesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="container-lg m-1">
        <div class="row shadow-sm sticky-top bg-white">
            <div class="col-1">
                <!-- offcanvas -->
                <button class="btn btn-secondary btn-sm m-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                        class="fa-solid fa-bars"></i></button>

                <div class="offcanvas offcanvas-start w-25" data-bs-scroll="true" data-bs-backdrop="false"
                    tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tackle Shop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body border-top">
                        <ul class=" list-unstyled list-group list-group-flush">
                            <a href="{{ route('Auth@categoryPage') }}" class=" text-decoration-none list-group-item list-group-item-action">
                                <li><i class="fa-solid fa-house"></i>Category</li>
                            </a>
                            <a href="{{ route('Auth@postPage') }}" class=" text-decoration-none list-group-item list-group-item-action">
                                <li><i class="fa-solid fa-house"></i>Post</li>
                            </a>
                            <a href="{{ route('Auth@overViewPage') }}" class=" text-decoration-none list-group-item list-group-item-action">
                                <li><i class="fa-solid fa-house"></i>OverViews</li>
                            </a>
                            <a href="{{ route('Auth@adminListPage') }}" class=" text-decoration-none list-group-item list-group-item-action">
                                <li><i class="fa-solid fa-house"></i>Admins</li>
                            </a>
                            <!-- <span class=" list-group-item list-group-item-action"> -->
                            <form action="{{ route('logout') }}" method="post">
                             @csrf
                              <button class="btn btn-sm btn-primary mt-3" type="submit">Logout</button>
                            </form>

                            <!-- </span> -->

                        </ul>
                    </div>
                </div>
                <!-- end of offcanvas -->
            </div>
            <div class="col">
                <div class="row">
                    <!-- Search -->
                    <div class="col-6 offset-4 d-flex align-items-center">
                        <form action="">
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="search" name="" id="search" placeholder="Search Here..."
                                    class=" form-control me-2 shadow-none">
                                <label for="search" class="form-label">Search</label>
                            </div>

                        </form>
                    </div>
                    <!-- end of Search -->

                    <div class="col-1 offset-1">
                        <img src="./img/five.jpeg" alt="" class=" my-1 shadow-sm img-thumbnail"
                            style=" height: 40px; border-radius: 50%;">
                    </div>
                </div>

            </div>
        </div>
        @yield('content')
</body>
<!-- bootstarp -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</html>