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

        /* Styling for the buttons */
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        X
                    </button>
                    {{session() ->get ( 'message' ) }}
                </div>
                @endif

                <form action="{{url('upload_employee')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Employee Name:</label>
                        <input type="text" class="form-control" style="background-color: white; color:black;" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="num_telephone">Phone Number:</label>
                        <input type="number" class="form-control" style="background-color: white; color:black;" id="numero_telephone" name="numero_telephone" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" class="form-control" style="background-color: white; color:black;" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="service">Service:</label>
                        <select id="service" name="service" class="form-control" style="background-color: white; color: black;" required>
                            <option value="">--Select--</option>
                            <option value="haircut">Haircut</option>
                            <option value="styling">Styling</option>
                            <option value="coloring">Coloring</option>
                            <option value="extensions">Extensions</option>
                            <option value="texture-treatments">Texture and Treatments</option>
                            <option value="facials">Facials</option>
                            <option value="skin-rejuvenation">Skin Rejuvenation</option>
                            <option value="peels">Peels</option>
                            <option value="microdermabrasion">Microdermabrasion</option>
                            <option value="waxing">Waxing</option>
                            <option value="bridal-makeup">Bridal Makeup</option>
                            <option value="special-occasion-makeup">Special Occasion Makeup</option>
                            <option value="everyday-makeup">Everyday Makeup</option>
                            <option value="makeup-lessons">Makeup Lessons</option>
                            <option value="manicures">Manicures</option>
                            <option value="pedicures">Pedicures</option>
                            <option value="nail-art">Nail Art</option>
                            <option value="gel-acrylic-nails">Gel and Acrylic Nails</option>
                            <option value="customized-skin-analysis">Customized Skin Analysis</option>
                            <option value="anti-aging-treatments">Anti-Aging Treatments</option>
                            <option value="acne-treatments">Acne Treatments</option>
                            <option value="moisturizing-hydrating-treatments">Moisturizing and Hydrating Treatments</option>
                            <option value="full-body-massage">Full Body Massage</option>
                            <option value="aromatherapy">Aromatherapy</option>
                            <option value="hot-stone-massage">Hot Stone Massage</option>
                            <option value="reflexology">Reflexology</option>
                            <!-- Add more options based on your salon's services -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="file">Employee Image:</label>
                        <input type="file" content="Choose file" class="form-control" style="background-color: white; color:black;" id="file" name="file" required>
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