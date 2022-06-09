
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
                if(($_SESSION["id_role"]) == "S" OR ($_SESSION["id_role"]) == "0") {
                 
                } else if ($_SESSION["id_role"] == "B"){
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
            <a class="nav-link" href="cart.html">
              <img src="../assets/cart.png" alt="cart">
            </a>
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
            if(($_SESSION["id_role"]) == "B") {

            ?>
            <a class="nav-link active blacken" aria-current="page" href="user/pembeli/my.php">See Profile</a>
            <?php
              } 
              else if(($_SESSION["id_role"]) == "0" OR ($_SESSION["id_role"]) == "A")
              {
            ?>
            <h2 style="padding-left:30px; color: white"><u>ADMIN</u></h2>
            <a class="nav-link active blacken" aria-current="page" href="userlist.php">See All Users</a>
            <a class="nav-link active blacken" aria-current="page" href="#">See All Items</a>
            <?php
              }
              else if(($_SESSION["id_role"]) == "S")
              {
            ?>
            <h2 style="padding-left:30px; color: white"><u>SELLER</u></h2>
            <a class="nav-link active blacken" aria-current="page" href="userlist.php">Check My Shop Items</a>
            <a class="nav-link active blacken" aria-current="page" href="#">See Profile</a>
            <?php
              }
            } else {
              ?>
            } else {
              ?>
              <a href="#">HOT Items!! OMG!!1!!11!</a>
              <a href="#">Available Items</a>
              <a href="#">Category</a>
              <a href="#">Info+</a>
              <a href="#" style="border-bottom: 4px white solid">Contact</a>
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
