<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belt 3</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../lib/css/style.css">
    <link rel="stylesheet" href="../lib/customskin.css">

    <!--CDN-->
    <?php
    require 'head-conf.html';
    ?>



</head>

<body>
    <!--HEADER-->
    <nav>
        <?php
        require 'navbar.php';
        ?>
    </nav>


    <!--CONTENT-->

    <div class="container" style="padding-top: 5rem; padding-bottom: 5rem;">
        <div class="row" style="margin-bottom: 10rem;">

            <div class="col-md-6">
                <img src="../assets/produk/belt3.png" alt="" class="img-fluid">
            </div>


            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Belt 3</h1>
                    </div>
                    <div class="col-md-10">
                        <p class="price">Rp. 150.000.-</p>

                    </div>
                    <div class="col-md-2">
                        <span class="material-icons-outlined">favorite_border</span>
                        <span class="material-icons-outlined">share</span>
                    </div>

                </div>
                <br>
                <br>
                <div class="row">
                    <h2>Deskripsi :</h2>
                    <br>
                    <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius,
                        laudantium magnam porro deserunt fuga esse sed molestiae ab nihil laboriosam.</p>
                    <p>xs : lenght 100cm <br>
                        s : lenght 125cm <br>
                        m : lenght 140cm
                    </p>

                </div>
                <br>
                <br>

                <div class="row">
                    <fieldset>
                        <legend>Size Cart</legend>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-xs">xs</label>
                        <br>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-s">s</label>
                        <br>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-m">m</label>

                    </fieldset>
                </div>
                <br>
                <div class="row">
                    <button type="submit" value="check out" style="background-color: black; color: white;"> Add To Cart
                    </button>
                </div>

            </div>
        </div>

    </div>

        <!--Footer-->
        <footer>
            <?php
            require 'footer.html';
            ?>
        </footer>

</body>

</html>