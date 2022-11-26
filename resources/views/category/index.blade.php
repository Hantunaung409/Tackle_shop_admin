@extends('mainLayout')
@section('content')
            <div class="row bg-light m-1">
            <div class="container2 ">
                <div class="row mt-2">
                    <div class="col-6">
                        <!-- add new category Card -->
                        <div class="card shadow-sm bg-white text-center">
                            <div class="card-title mt-2">Add A New Category</div>
                            <div class="card-body">
                                <form action="">
                                    <input type="text" name="" id="" placeholder="New Category Name" class=" form-control my-4">
                                    <input type="text" name="" id="" placeholder="Short Note" class=" form-control my-4">
                                    <button type="btn btn-secondary submit mx-auto my-4">Add</button>
                                </form>
                            </div>
                        </div>
                        <!-- end of add new category card -->
                    </div>
                    <div class="col-5 ps-5">
                        <table class=" table table-striped shadow-sm">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Reel</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection