<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

            <div class="container">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        X
                    </button>
                    {{session() ->get ( 'message' ) }}
                </div>
                @endif

                <form class="mt-4" action="{{url('/editemployee', $data->id_Employe)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Employee Name:</label>
                        <input type="text" class="form-control" style="background-color: white; color:black;" id="name" name="name" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="num_telephone">Phone Number:</label>
                        <input type="number" class="form-control" style="background-color: white; color:black;" id="numero_telephone" name="numero_telephone" value="{{$data->numero_telephone}}">
                    </div>
                    <div class=" form-group">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" class="form-control" style="background-color: white; color:black;" id="email" name="email" value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="service">Service:</label>
                        <select id="service" name="service" class="form-control" style="background-color: white; color:black;" value="{{$data->service}}">
                            <option value="">--Select--</option>
                            <option value=" haircut">Haircut</option>
                            <option value="manicure">Manicure</option>
                            <option value="makeup">Makeup</option>
                            <option value="massage">Massage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">Employee Old Image:</label>
                        <img height="150" width="150" src="employeeimage/{{$data->image}}" alt="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">Change Employee Image:</label>
                        <input type="file" content="Choose file" class="form-control" style="background-color: white; color:black;" id="file" name="file" value="{{$data->service}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-submit">Submit</button>
                        <button type="button" class="btn btn-cancel">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- container-scroller -->
        @include('admin.script')
</body>

</html>