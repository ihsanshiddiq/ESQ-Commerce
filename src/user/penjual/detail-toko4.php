<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Toko</title>

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
    <!--NAVBAR-->
    <nav>
        <?php
         require './navbar.php';
        ?>

    </nav>

    <!--Content-->
    <div class="container overflow-hidden py-3">
        <div class="row py-5 px-5" style="background-color: #292C87; color: white;">
            <div class="col-md-4" style="border-right: white solid 1px;">
                <h1>Teh Pucuk</h1>
                <i class="bi bi-instagram"> @ceruleaf</i>
                <br>
                <i class="bi bi-facebook"> AlifZak</i>
            </div>
            <div class="col-md-6">
                <h2>Alif Zaky</h2>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sit temporibus nostrum reiciendis,
                    ab quia velit architecto vel veritatis soluta!</p>
            </div>
        </div>

        <!--Produk toko-->

        <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
            <div class="col">
                <div class="card">
                    <img src="../../../assets/produk/belt1.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 1</h3>
                        <p class="card-text price">Rp. 100.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../../../assets/produk/belt2.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 2</h3>
                        <p class="card-text price">Rp. 200.000</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--FOOTER-->
    
    <?php
    require '../../footer.html'
    ?>

</body>

</html>