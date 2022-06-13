<?php
/*
class Connection{
    $conn = mysqli_connect("localhost","root","","esq-commerce-local");

    if(mysqli_connect_errno()){
        echo 'Gagal terhubung ke database: '.mysqli_connect_error();
        exit();
    }

}
*/

class Connection2{
    private $host = "localhost";
    private $struser = "root";
    private $strpassword = "";
    private $strdbname = "bckpcmrc";
    
    public $connection;
       
     function __construct() {
        $this->connect();
     }
     
     function connect()
     {
         $conn = mysqli_connect($this->host,$this->struser, $this->strpassword);
           mysqli_select_db($conn, $this->strdbname);
          $this->connection = $conn;	
     }
 
 }

 ?>