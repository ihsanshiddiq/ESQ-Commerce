<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesories</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../lib/css/style.css">
    <link rel="stylesheet" href="../lib/customskin.css">
    <!--CDN-->
    <?php
    require 'head-conf.html';
    ?>
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
                <a href="./produk-belt1.php">
                <div class="card">
                    <img src="../assets/produk/belt1.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Belt 1</h3>
                        <p class="card-text price">Rp. 100.000</p>
                    </div>

                </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-belt2.php">

                    <div class="card">
                        <img src="../assets/produk/belt2.png" alt="">
                        <div class="card-body">
                            <h3 class="card-title">Belt 2</h3>
                            <p class="card-text price">Rp. 200.000</p>
                        </div>
                        
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-belt3.php">

                    <div class="card">
                        <img src="../assets/produk/belt3.png" alt="">
                        <div class="card-body">
                            <h3 class="card-title">Belt 3</h3>
                            <p class="card-text price">Rp. 150.000</p>
                        </div>
                        
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-keychain1.php">

                    <div class="card">
                        <img src="../assets/produk/keychain1.png" alt="">
                        <div class="card-body">
                            <h3 class="card-title">keychain 1</h3>
                            <p class="card-text price">Rp. 20.000</p>
                        </div>
                        
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-belt4.php">

                    <div class="card">
                        <img src="../assets/produk/belt4.png" alt="">
                        <div class="card-body">
                            <h3 class="card-title">belt 1 v.2</h3>
                            <p class="card-text price">Rp. 320.000</p>
                        </div>
                        
                    </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-keychain2.php">
                <div class="card">
                    <img src="../assets/produk/SVPUoLTlln 1.png" alt="">
                    <div class="card-body">
                        <h3 class="card-title">keychain 2</h3>
                        <p class="card-text price">Rp. 50.000</p>
                    </div>

                </div>
                </a>

            </div>
            <div class="col">
                <a href="./produk-belt5.php">

                    <div class="card">
                        <img src="../assets/produk/belt5.png" alt="">
                        <div class="card-body">
                            <h3 class="card-title">belt 5</h3>
                            <p class="card-text price">Rp. 250.000</p>
                        </div>
                        
                    </div>
                </a>
                    
            </div>

        </div>

    </div>

    <!--FOOTER-->
    <?php
    require 'footer.html';
    ?>




</body>

</html>