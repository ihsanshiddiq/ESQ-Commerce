<?php
    class Connection2{
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
     
     }

?>