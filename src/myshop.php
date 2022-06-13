<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location: index.php?error=notloggedin");
}

if (!(($_SESSION["id_role"]) == "S" OR ($_SESSION["id_role"]) == "3")){
    header("location: index.php?error=falseaccounttype");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../lib/css/style.css">
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
                <h2>My Shop Account</h2>
            </a>
            <br>

            <a href="#">
                <h2>Personal Info</h2>
            </a>
            <br>

            <a href="#">
                <h2>List Product</h2>
            </a>
            <br>

            <a href="#">
                <h2>Access Data</h2>
            </a>
            <br>

            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>
        </div>

        <!--Panel Kanan-->
        <div class="col-md-8 px-5">

            <h1><strong>MY SHOP ACCOUNT</strong></h1>
            <br>
            <div class="row">
                <a href="#">
                    <h1>Personal Info</h1>
                    <p>You can access and change your personal details to expedite future purchases and notify us of
                        changes to your contact details.</p>
                </a>
            </div>
            <br>
            <div class="row">
                <a href="#">
                    <h1>List Product</h1>
                    <p>Check product status and information. You can also add and remove your products.</p>
                </a>
            </div>
            <br>
            <div class="row">
                <a href="#">
                    <h1>Access Data</h1>
                    <p>You can change your access details (email and password). Please note that the security of your
                        personal details is very important. You need to use a secure password and change it from time to
                        time.</p>
                </a>
            </div>
            <br>
        </div>
    </div>




</body>

</html>