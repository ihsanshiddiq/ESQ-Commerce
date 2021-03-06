<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Toko</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../lib/css/style.css">
    <link rel="stylesheet" href="../lib/customskin.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <!--Tempat nav-->
        <?php
        require 'navbar.php';
        ?>
        
    </nav>

    <div class="container py-5">
        <div class="row px-5 py-5 list-toko">

            <h2>Teh Hijau</h2>
            <h6>Afifah Khairiyyah</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A laboriosam nemo dolore ipsum rerum saepe, quo laudantium? Praesentium explicabo veritatis, aliquam minus aut pariatur aspernatur repudiandae voluptate, labore magnam architecto officia
                tenetur ad hic. Architecto magnam velit dolore asperiores dolores incidunt voluptas, repellendus veritatis laboriosam praesentium molestiae porro beatae ducimus.</p>

            <p>Instagram : @akupipull</p>
            <p>Facebook : Afifah Khairiyyah</p>

            <div>
                <button class="btn btn-view-more" style="float:right; background-color: #ffffff;" type="submit"><a href="user/penjual/detail-toko.php">View more</a></button>
            </div>
        </div>
        <br>

        <div class="row px-5 py-5 list-toko">

            <h2>Teh Mawar</h2>
            <h6>Ihsan Shiddiq</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A laboriosam nemo dolore ipsum rerum saepe, quo laudantium? Praesentium explicabo veritatis, aliquam minus aut pariatur aspernatur repudiandae voluptate, labore magnam architecto officia
                tenetur ad hic. Architecto magnam velit dolore asperiores dolores incidunt voluptas, repellendus veritatis laboriosam praesentium molestiae porro beatae ducimus.</p>

            <p>Instagram : @glico</p>
            <p>Facebook : Ihsan Shiddiq</p>

            <div>
                <button class="btn btn-view-more" style="float:right; background-color: #ffffff;" type="submit"><a href="user/penjual/detail-toko2.php">View more</a></button>
            </div>
        </div>
        <br>

        <div class="row px-5 py-5 list-toko">

            <h2>Teh Melati</h2>
            <h6>Damar Adji</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A laboriosam nemo dolore ipsum rerum saepe, quo laudantium? Praesentium explicabo veritatis, aliquam minus aut pariatur aspernatur repudiandae voluptate, labore magnam architecto officia
                tenetur ad hic. Architecto magnam velit dolore asperiores dolores incidunt voluptas, repellendus veritatis laboriosam praesentium molestiae porro beatae ducimus.</p>

            <p>Instagram : @kertaskocak</p>
            <p>Facebook : Damar Adji</p>

            <div>
                <button class="btn btn-view-more" style="float:right; background-color: #ffffff;" type="submit"><a href="user/penjual/detail-toko3.php">View more</a></button>
            </div>
        </div>
        <br>

        <div class="row px-5 py-5 list-toko">
            <h2>Teh Pucuk</h2>
            <h6>Alif Zaky</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A laboriosam nemo dolore ipsum rerum saepe, quo laudantium? Praesentium explicabo veritatis, aliquam minus aut pariatur aspernatur repudiandae voluptate, labore magnam architecto officia
                tenetur ad hic. Architecto magnam velit dolore asperiores dolores incidunt voluptas, repellendus veritatis laboriosam praesentium molestiae porro beatae ducimus.</p>

            <p>Instagram : @Ceruleaf</p>
            <p>Facebook : Alif Zaky Cakramusi</p>

            <div>
                <button class="btn btn-view-more" style="float:right; background-color: #ffffff;" type="submit"><a href="user/penjual/detail-toko4.php">View more</a></button>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php
    require 'footer.html';
    ?>

</body>

</html>