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
            <title>print-user</title>

            <style>
                table, th, td{
                    border : 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
                tr:nth-child(even) {
                    background-color: #d4d4d4;
                  }

            </style>
            
            
        </head>
        <body>
        <H1>Daftar User</H1>
        <br>
        <table>
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
    $mpdf->Output('daftar-user.pdf', \Mpdf\Output\Destination::INLINE);
    #u can also use Output('daftar-user.pdf', 'I'); 
    #note : read the documentation for more



