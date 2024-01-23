<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div style="padding-top: 100px; text-align: center;">
            <table>
                    <tr style="background-color:black;">
                        <th style="padding:10px">Image</th>
                        <th style="padding:10px">Employee name</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Service</th>
                        <th style="padding:10px">Delete</th>
                        <th style="padding:10px">Update</th>
                        
                    </tr>

                    @foreach($data as $employee)
                    <tr style="text-align: center;">
                        <td><img height="100" width="100" src="employeeimage/{{$employee->image}}" alt=""></td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->numero_telephone}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->service}}</td>
                        <td><a onclick="return confirm('are you sure to delete this')" class="btn btn-danger" href="{{url('deleteemployee',$employee->id_Employe)}}">Delete</a></td>
                        <td><a class="btn btn-primary" href="">Update</a></td>
                    </tr>
                    @endforeach
            </div>
        </div>
        
        <!-- container-scroller -->
        @include('admin.script')
</body>

</html>