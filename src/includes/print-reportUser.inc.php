<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

//$mpdf = new \Mpdf\Mpdf();
//$print_user = '';
//$mpdf->WriteHTML('<h1>Hello world!</h1>');
//$mpdf->Output();

//function printUser(){

    $mpdf = new \Mpdf\Mpdf();
    require_once('../inc.koneksisql.php'); 		
    require_once('./../class/class.barang.php'); 		
    $objitem = new Barang(); 
    $arrayResult = $objitem->SelectAllBarangPenjual($_SESSION['username']);

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
            <th>Item Name</th>
            <th>Stock</th>
            <th>Total Sold</th>
            <th>Category</th>
            <th>Price</th>
            </tr>';

            if(count($arrayResult) == 0){
                $print_user.= '<tr><td colspan="5">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataBarang) {
                    $print_user.='<tr>
                        <td>'.$no.'</td>	
                        <td>'.$dataBarang->namaBarang.'</td>
                        <td>'.$dataBarang->jumlahStok.'</td>
                        <td>'.$dataBarang->jumlahTerjual.'</td>
                        <td>'.$dataBarang->nama_kategori.'</td>
                        <td>'.$dataBarang->harga.'</td>
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
    $mpdf->Output('ReportPDF-SELLER-' .$_SESSION['username'] . '.pdf', \Mpdf\Output\Destination::INLINE);
    #u can also use Output('daftar-user.pdf', 'I'); 
    #note : read the documentation for more





    
