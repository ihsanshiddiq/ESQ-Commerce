<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesories</title>

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
</head>

<body>
    <!--NAVBAR-->
    <nav>
        <?php
        require 'navbar.php';
        ?>
    </nav>

    <!--Content-->
    <div class="container py-5">
        <!--butuh revisi ngab-->
        <div class="row">
            <div class="col-md-12">
                <img src="../assets/acessories.png" class="img-fluid" alt="" style="width: auto;">

            </div>
        </div>
        <br>
        <br>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/belt1.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 1</h3>
                        <p class="card-text price">Rp. 100.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/belt2.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 2</h3>
                        <p class="card-text price">Rp. 200.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/belt3.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 3</h3>
                        <p class="card-text price">Rp. 150.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/keychain1.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">keychain 1</h3>
                        <p class="card-text price">Rp. 20.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/belt4.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">belt 1 v.2</h3>
                        <p class="card-text price">Rp. 320.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/keychain2.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">keychain 2</h3>
                        <p class="card-text price">Rp. 50.000</p>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/produk/belt5.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">belt 5</h3>
                        <p class="card-text price">Rp. 250.000</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--FOOTER-->
    <?php
    require 'footer.html';
    ?>




</body>

</html>