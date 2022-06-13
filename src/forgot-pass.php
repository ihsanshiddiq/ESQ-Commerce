<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        <form action="includes/forgot-pass.inc.php" method="post">

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control textinput" id="username" placeholder="" require>
          </div>

          <button type="submit" name="reset" href="" class="btn btnblack" style="width: 100%;"><b>reset password</b></button>

        </form>
    </section>
    
</body>
</html>