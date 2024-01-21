<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .container {
            background-color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
            /* Couleur du texte du label */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            color: black;
            background-color: white;
        }

        .file-upload-default {
            display: none;
        }

        .file-upload-info {
            width: 100%;
            margin-left: 10px;
            box-sizing: border-box;
        }

        .file-upload-browse {
            padding: 10px;
            border: 1px solid #007bff;
            color: white;
            background-color: #ced4da;
            /* Couleur de fond du bouton */
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-submit {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: solid 2px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: gray;
            color: white;
            padding: 10px 20px;
            border: solid 2px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <!-- ... Your existing banner code ... -->
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container">

                <form action="{{url('upload_employee')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                    <div class="form-group">
                        <label class="form-label" for="name">Employee Name:</label>
                        <input type="text" class="form-control" style="background-color: white; color:black;" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="num_telephone">Phone Number:</label>
                        <input type="number" class="form-control" style="background-color: white; color:black;" id="num_telephone" name="num_telephone">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" class="form-control" style="background-color: white; color:black;" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="service">Service:</label>
                        <select id="service" name="service" class="form-control" style="background-color: white; color:black;">
                            <option value="">--Select--</option>
                            <option value="haircut">Haircut</option>
                            <option value="manicure">Manicure</option>
                            <option value="makeup">Makeup</option>
                            <option value="massage">Massage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">Employee Image:</label>
                        <input type="file" class="file-upload-default" id="file" name="file">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
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