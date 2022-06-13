<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../lib/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--ICON-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!--Custom CSS-->
    <style>
        h2 {
            font-size: 20px;
            font-weight: 400;
        }

        p {
            font-size: 15px;
            font-weight: 400;
        }
    </style>
</head>

<body>

    <?php
        require 'navbar.php'; 
    ?>

    <!--Panel Kiri-->

    <div class="row py-5 my-5">
        <div class="col-md-4 px-5" styel="color: black;">

            <a href="my.php">
                <h2>My Account</h2>
            </a>
            <br>

            <a href="purchase.php">
                <h2>Purchase History</h2>
            </a>
            <br>

            <a href="address.php">
                <h2>Address Book</h2>
            </a>
            <br>

            <a href="info.php">
                <h2>Personal Info</h2>
            </a>
            <br>
            <a href="accessdata.php">
                <h2>Access Data</h2>
            </a>
            <br>
            <a href="wishlist. php">
                <h2>Wishlist</h2>
            </a>
            <br>
            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>
        </div>

        <!--Panel Kanan-->
        <div class="col-md-8 px-5">

        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control name textinput" id="name" placeholder="Name"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control birthdate textinput" id="birthdate"
                            placeholder="birthdate"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control email textinput" id="email" placeholder="Email"><br>
                    </div>
                    <div class="form-group">
                        <!--<input type="text" class="form-control instagram textinput" id="instagram"
                            placeholder="instagram"><br>-->
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control password textinput" id="password"
                            placeholder="Password"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control profesi textinput" id="profesi"
                            placeholder="Profesi"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control phone textinput" id="phone"
                            placeholder="Phone Number"><br>
                    </div>



                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <button type="submit" class="btn btnblack"
                            style="color: #ffffff; background-color: black; width: 100%;"><b>EDIT PERSONAL
                                INFO</b></button>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>