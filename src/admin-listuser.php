<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "A")) {
        header("location: index.php?error=unauthorizeduser");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!--CDN-->
  <?php
  require 'head-conf.html';
  ?>

    <!--CSS REFERENCE-->
    <link rel="stylesheet" href="../lib/css/style.css">
 

  <title>Landing Page | Index</title>
</head>

<body>
    <nav>
        <?php
            require 'navbar.php';
        ?>
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
      <!---->

      <section class="container-fluid my-5 py-5">
            <h4 class="title">
            <span class="text">
            <strong>User List</strong>
            </span></h4>
            
            <table class="table table-bordered">
                <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama Dpn</th>
                <th>Nama Blkg</th>
                <th>email</th>
                <th>Role</th>
                <th>HP</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                </tr>	


            <?php
            require_once('inc.koneksi.php'); 		
            require_once('class/akun-obj.class.php'); 		
            $objakun = new Akun(); 
            $arrayResult = $objakun->SelectAllEmployee();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataAkun) {
                    echo '<tr> <form action="admin-useredit.php" method="GET">';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataAkun->username.'</td>';	
                    echo '<td>'.$dataAkun->namaDepan.'</td>';
                    echo '<td>'.$dataAkun->namaBelakang.'</td>';
                    echo '<td>'.$dataAkun->email.'</td>';
                    echo '<td>'.$dataAkun->id_role.'</td>';
                    echo '<td>'.$dataAkun->noHp.'</td>';
                    echo '<td>'.$dataAkun->jalan.'</td>';
                    echo '<td>'.$dataAkun->kodePos.'</td>';
                    
                    echo '<td>';
                    echo '<button type="submit" class="btn btn-warning" style="width: 40%;" name="edituser" value="'. $dataAkun->username .'"><b>Edit</b></button>'; 
                    echo ' | ';
                    echo '<button class="btn btn-danger" style="width: 40%;" name="deleteuser" value="'. $dataAkun->username .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </button> </td>';
                    
                    echo '</form> </tr>';				
                    $no++;	
                }
            }
            ?>
            </table>
            <a class="btn btn-primary" href="./includes/print-user.inc.php" target= "_Blank">cetak user</a>
      </section>

</body>

</html>