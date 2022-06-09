<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizednouser");
} else {
    if (!($_SESSION["id_role"] == "A")) {
        header("location: index.php?error=unauthorizedaccount");
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

      <!---->

      <section> 

        

        <!-- DIATAS CAROUSEL, DIBAWAH BAGIAN CARDS DAN SISANYA-->

        <section class="container my-5">

          <div class="card text-center w-75 mx-auto">
            <div class="card-header">
              Featured
            </div>
            <img src="../assets/produk/tomahawk.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tomahawk Steak</h5>
              <p class="card-text">Menu terbatas kita, Steak Tomahawk hanya 65k per porsi.</p>
              <a href="#" class="btn btn-secondary">Pesan</a>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>

          <br>

          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="../assets/produk/chimkin.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ayam Panggang</h5>
                  <p class="card-text">Ayam panggang spesial kami dengan saus sambal yang juga spesial.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="../assets/produk/borgir.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Borgir Longboi</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            
            <div class="col">
              <div class="card h-100">
                <img src="../assets/produk/nasgor.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Nasi Goreng</h5>
                  <p class="card-text">Menu klasik. Nasi goreng komplit dengan opsi pedas.</p>
                </div>
              </div>
            </div>
            

            <?php
            require_once('inc.koneksi.php'); 		
            require_once('class/akun-obj.class.php'); 		
            $objakun = new Akun(); 
            $arrayResult = $objakun->SelectAllEmployee();

            if(count($arrayResult) == 0){
                echo 'Tidak ada data!';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataAkun) {
                    echo '<div class="col">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $dataAkun->username . '</h5>';
                    echo '<p class="card-text">' . $dataAkun->namaDepan . ' ' . $dataAkun->namaBelakang . '</p>';
                    echo '<p class="card-text">' . $dataAkun->email . '</p>';
                    echo '<p class="card-text">' . $dataAkun->id_role . '</p>';
                    echo '<p class="card-text">' . $dataAkun->noHp . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
					
                    $no++;	
                }
            }
            ?>
            
          </div>

          </section>

          <!--THIS IS THE ACCESSORIES TRANSITION-->
          <div class="transition transitionitem">
            <p class="transitiontext"><b>Accessories</b></p>  <!--THIS IS THE ACCESSORIES TRANSITION-->
          </div>
          <!--THIS^ IS THE ACCESSORIES TRANSITION-->

          <section class="container my-5">

            <div class="row row-cols-1 row-cols-md-10 g-4">
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/belt1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/gantungan-kunci 1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/belt2.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/belt3.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/keychain.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <img src="../assets/produk/accessories/belt4.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
              

              
            <h4 class="title">
            <span class="text">
            <strong>User List</strong>
            </span></h4>
            <!--
                <a class="btn btn-primary" href="index.php?p=employee.php">Add</a>
            -->
            <a class="btn btn-primary" href="#">Add</a>
            <a class="btn btn-primary" href="./includes/print-user.inc.php" target= "_Blank">cetak user</a>
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
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataAkun->username.'</td>';	
                    echo '<td>'.$dataAkun->namaDepan.'</td>';
                    echo '<td>'.$dataAkun->namaBelakang.'</td>';
                    echo '<td>'.$dataAkun->email.'</td>';
                    echo '<td>'.$dataAkun->id_role.'</td>';
                    echo '<td>'.$dataAkun->noHp.'</td>';
                    echo '<td>'.$dataAkun->jalan.'</td>';
                    echo '<td>'.$dataAkun->kodePos.'</td>';
                    //echo '<td>'. <a class="btn btn-warning"  href="index.php?p=employee&ssn='. $dataEmployee->ssn.'"> Edit </a> | <a class="btn btn-danger" href="index.php?p=deleteemployee&ssn='. $dataEmployee->ssn.'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> '</td>';	
                    
                    echo '<td>';
                    /*echo '<td>
                <a class="btn btn-warning"  href="index.php?p=employee&ssn='.$dataAkun->username.'"> Edit </a> |
                <a class="btn btn-danger" href="employeelist.php?p=deleteemployee&ssn='.$dataEmployee->DeleteEmployee().'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';	
                    echo '</tr>';	*/				
                    $no++;	
                }
            }
            ?>
            </table>
            
            
             

            </div>
            
            <div class="row d-flex justify-content-center my-3">
              <a href="category-accesories.php" class="btn btn-secondary viewmore">View more</a>
            </div>
  
            </section>

            <!-- END OF ACCESSORIES.-->
            <!-- BELOW IS CATEGORIES-->
      
        
      </section>

</body>

</html>