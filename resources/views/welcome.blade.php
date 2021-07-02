<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/sweetalert2@11.js')}}"></script>
</head>
<body>
    <div class="container">
        @include('message')
        <div class="row row_st mshadow" >
            <div class="btn btn-info text_color_top mshadow">
                <h4 class="text-center">Welcome to MIN IT Laravel with Ajax Basic Course Bangla Tutorial</h4>
            </div>
            <div class="col-md-4 mt-3 ">
                <div class="card mshadow">
                    <div class="card-header head_bg text-center">
                        <h5 id="addCusTitle">Add New Customer</h5>
                        <h5 id="EditCusTitle">Edit Customer Data</h5>
                    </div>
                    <div class="card-body">
                    
                        <div class="mb-3">
                            <label for="" class="form-lavel">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <span class="text-danger" id="ErrorName"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lavel">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                            <span class="text-danger" id="ErrorAddress"></span>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-lavel">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            <span class="text-danger" id="ErrorPhone"></span>

                        </div>
                        <div class="mb-3">
                            <input type="hidden" id="id">
                            <button class="btn btn-info sty_button" onclick="addCustomer()" id="AddCusButton">Add Customer</button>
                            <button class="btn btn-primary sty_button" onclick="updateData()" id="updateCusButton">Update Customer</button>
                        </div>

                    
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3 ">
                <div class="card mshadow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                </div>
            </div>
            <div class="btn btn-info text_color_bottom mt-3 mshadow">
                <h4 class="text-center">Any Query Contact Us - Facebook.com/MINIT61 OR twitter.com/MINIT61 </h4>
            </div>
        </div>
    </div>
  <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>