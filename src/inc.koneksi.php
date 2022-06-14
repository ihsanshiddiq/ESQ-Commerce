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

/*class Connection{
    private $host = "localhost";
    private $struser = "root";
    private $strpassword = "";
    private $strdbname = "ebs-commerce";
    
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
 
 }*/


 class Connection {

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=ebs-commerce', $username, $password);
            //$dbh = new PDO('mysql:host=localhost;dbname=ebs-commerce', $username, $password);
            return $dbh;
        }  
        catch (PDOException $e) {
            echo "<script>alert('could not connect to database apparently." . $e->getMessage() . "');</script>";
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
?>