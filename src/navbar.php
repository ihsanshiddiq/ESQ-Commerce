
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
            <form class="d-flex search">
              <input class="form-control me-2 searchinput" type="search" placeholder="" aria-label="Search">
              <button class="btn" type="submit"><b>SEARCH</b></button>
            </form>
            <a class="nav-link" href="cart.html">
              <img src="../assets/cart.png" alt="cart">
            </a>
            <a class="nav-link active blacken" aria-current="page" href="login.php">LOGIN</a>
            
          </div>
          
          
        </div>
      </nav>

      <!---->
      <div id="mySidenav" class="sidenav" style="z-index: 10000;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">HOT Items!! OMG!!1!!11!</a>
        <a href="#">Available Items</a>
        <a href="#">Category</a>
        <a href="#">Info+</a>
        <a href="#">Contact</a>

        <!-- TESTING AREA: DROPDOWN-->
        
        <!-- END OF TESTING AREA-->
      </div>
      
      <script>
      
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
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
