t<?php

require_once __DIR__ . '/../../vendor/autoload.php';

//$mpdf = new \Mpdf\Mpdf();
//$print_user = '';
//$mpdf->WriteHTML('<h1>Hello world!</h1>');
//$mpdf->Output();

//function printUser(){

    $mpdf = new \Mpdf\Mpdf();
    require_once('../inc.koneksi.php'); 		

    require_once('./../class/akun-obj.class.php'); 		
    $objakun = new Akun(); 
    $arrayResult = $objakun->SelectAllEmployee();

    #careful when u wanna use (') and (")
    $print_user = '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="/../../lib/css/style.css">
            
        </head>
        <body>
        <H1>Daftar User</H1>
        <br>
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
                </tr>';

                if(count($arrayResult) == 0){
                    $print_user .='<tr><td colspan="5">Tidak ada data!</td></tr>';
                } else{	
                    $no = 1;	
                    foreach ($arrayResult as $dataAkun) {
                        $print_user .= '<tr>
                            <td>'. $no .'</td>
                            <td>'. $dataAkun->username .'</td>
                            <td>'. $dataAkun->namaDepan .'</td>
                            <td>'. $dataAkun->namaBelakang .'</td>
                            <td>'. $dataAkun->email .'</td>
                            <td>'. $dataAkun->id_role .'</td>
                            <td>'. $dataAkun->noHp .'</td>
                            <td>'. $dataAkun->jalan .'</td>
                            <td>'. $dataAkun->kodePos .'</td>
                        </tr>';
                        				
                        $no++;	
                    }
                }



 $print_user.= '</table>
            
        </body>
    </html>
    ';

    #fungsi untuk ngeprint bang
    $mpdf->WriteHTML($print_user);
    $mpdf->Output();

//}

	


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

