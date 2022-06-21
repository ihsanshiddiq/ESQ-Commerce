<?php
    if (isset($_GET['key']) && isset($_GET['reset'])) {
        include "./inc.koneksi.php";
        require_once('./init.class.php');
        $username = $_GET['key'];
        $password = $_GET['reset'];
        $objAkun = new Akun();

        $objAkun->cek_akunPDO($username);
        if ($objAkun->hasil == TRUE) {
            if ($objAkun->password == $password) {
                ?>
                <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Reset Password</title>
                        <!--CDN-->
                    <?php
                    require 'head-conf.html';
                    ?>

                    
                        <link rel="stylesheet" href="../lib/css/style.css">
                    <link rel="stylesheet" href="../lib/customskin.css">
                    </head>
                    <body>
                        <navbar>

                        <?php 
                        require 'navbar.php'; 
                        ?>
                        </navbar>

                        <section class="container">
                            <form action="includes/reset-pass.inc.php" method="post">

                            <div class="form-group">
                                <input type="hidden" name="username" class="form-control textinput" id="username" value = "<?php echo $username;?>">
                                </div>
                            <div class="form-group">
                                <label for="username">New Password</label>
                                <input type="password" name="password" class="form-control textinput" id="password" placeholder="" require>
                            </div>
                            <div class="form-group">
                                <label for="username">Re-Type Password</label>
                                <input type="password" name="repassword" class="form-control textinput" id="repassword" placeholder="" require>
                            </div>


                            <button type="submit" name="reset" href="" class="btn btnblack" style="width: 100%;"><b>reset my password</b></button>

                            </form>
                        </section>
                        
                    </body>
                    </html>
                <?php
            } else{

                echo "tidak dapat mereset password";
            }
        }

    }
    //header("location: index.php?error=unauthorizeduser");
    //menghasilkan error
    //Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\PW\FINAL\ESQ-Commerce\src\navbar.php:58)


?>

