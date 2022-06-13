
<body>
  <nav class="navbar navbar-expand-lg navbar-light absolution" id="navbar">
        <div class="container-fluid">
          <span style="font-size:30px;cursor:pointer; padding-right: 1%;" onclick="openNav()">&#9776;</span>
          <a class="navbar-brand" href="index.php"><b>ESQ Commerce</b></a>
          <button class="navbar-toggler" type="button" onclick="expandNav()" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              
            </ul>
            <form class="d-flex search" action="searchbarang.php" method="get">
              

              <?php
              if(isset($_SESSION["id_role"])){
                if(($_SESSION["id_role"]) == "S" OR ($_SESSION["id_role"]) == "3") {
                 
                } else if ($_SESSION["id_role"] == "B"  OR ($_SESSION["id_role"]) == "2"){
              ?>
              <input class="form-control me-2 searchinput" type="search" placeholder="" name = "searchbar" aria-label="Search">
              <button class="btn" type="submit" name="btnsearch"><b>SEARCH</b></button>
              <?php
                } 
  
              } else {
                ?>
                <input class="form-control me-2 searchinput" type="search" placeholder="" name = "searchbar" aria-label="Search">
                <button class="btn" type="submit" name="btnsearch"><b>SEARCH</b></button>
                <?php
              }
                ?>


              
            </form>
            <?php
              if (!isset($_SESSION['id_role']) OR $_SESSION['id_role'] == 'B' OR $_SESSION['id_role'] == 2) {
                echo '
                  <a class="nav-link" href="cart.html">
                    <img src="../assets/cart.png" alt="cart">
                  </a>
                ';
              }
            ?>
            
            <!--START OF LOGGED IN-->
            <?php
              if(isset($_SESSION["username"])) {

              ?>
              <a class="nav-link active blacken" aria-current="page" href=""><?php echo $_SESSION["username"];?></a>

              <a class="nav-link active blacken" aria-current="page" href="includes/logout.inc.php">Logout</a>
              <?php
                } 
                else 
                {
              ?>
              <a class="nav-link active blacken" aria-current="page" href="login.php">LOGIN</a>
              <?php
                }
                ?>
            <!--END OF LOGGED IN-->  
<!--START OF LOGGED IN-->
<?php
            if(isset($_SESSION["id_role"])){
              if(($_SESSION["id_role"]) == "B") {

              ?>
              
              <?php
                } 
                else if(($_SESSION["id_role"]) == "0")
                {
              ?>
              
              <?php
                }
              }
                ?>
            <!--END OF LOGGED IN-->  
            
            
            <!-- ORIGINAL NAVBAR CONTENT HERE
              <a class="nav-link active blacken" aria-current="page" href="login.php">LOGIN</a>
            -->

          </div>
          
          
        </div>
      </nav>

      <!---->
      <div id="mySidenav" class="sidenav" style="z-index: 10000;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <?php
          if(isset($_SESSION["id_role"])){
            if(($_SESSION["id_role"]) == "B" OR ($_SESSION["id_role"]) == "2") {
              
            ?>
            <a class="nav-link active blacken" aria-current="page" href="my.php">See Profile</a>
           
              <a href="#">Available Items</a>
              <a href="#">Info+</a>
              <a href="#">Contact</a>
              <a href="#">Category</a>
              <ul class="mx-4">
                <form action="category.php" method="GET">
                <?php
                  echo '<li><button class="sidebarbtn" type="submit" name="category" value="Food"><h5>Food</h5></button></li>';
                  echo '<li><button class="sidebarbtn" type="submit" name="category" value="Drink"><h5>Drink</h5></button></li>';
                  echo '<li><button class="sidebarbtn" type="submit" name="category" value="Accessories"><h5>Accessories</h5></button></li>';
                  echo '<li><button class="sidebarbtn" type="submit" name="category" value="Fashion"><h5>Fashion</h5></button></li>';
                  ?>
                </form>
              <ul>
            <?php
              } 
              else if(($_SESSION["id_role"]) == "1" OR ($_SESSION["id_role"]) == "A")
              {
            ?>
            <h2 style="padding-left:30px; color: white"><u>ADMIN</u></h2>
            <a class="nav-link active blacken" aria-current="page" href="admin-listuser.php">See All Users</a>
            <a class="nav-link active blacken" aria-current="page" href="#">See All Items</a>
            <?php
              }
              else if(($_SESSION["id_role"]) == "S" OR ($_SESSION["id_role"]) == "3")
              {
            ?>
            <h2 style="padding-left:30px; color: white"><u>SELLER</u></h2>
            <a class="nav-link active blacken" aria-current="page" href="seller-listproduct.php">My Shop Items</a>
            <a class="nav-link active blacken" aria-current="page" href="myshop.php">See Profile</a>
            <?php
              }
            } else {
              ?>
            } else {
              ?>
              <a href="#">Available Items</a>
              <a href="#">Category</a>
              <a href="#">Info+</a>
              <a href="#">Contact</a>
              <?php
            }
        ?>
       
        
        
        

        <!-- TESTING AREA: DROPDOWN-->
        
        <!-- END OF TESTING AREA-->
      </div>
      
      <script>
      
      function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

      var absoluted = false;
      function expandNav() {

        if (absoluted == true){
          document.getElementById("navbar").style.opacity = "70%";
          absoluted = false;
        } else {
          document.getElementById("navbar").style.backgroundColor = "white";
          document.getElementById("navbar").style.opacity = "100%";
          absoluted = true;
        }
        
      }
      
      function unexpandNav() {
        document.getElementById("navbar").style.opacity = "70%";
      }
      </script>
</body>
