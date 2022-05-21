<?php

class Akun extends Connection {

    public $id_admin;
    public $id_penjual;
    public $id_pembeli;
    public $namaDepan;
    public $namaBelakang;
    public $username;
    public $password;
    //public $passwordRepeat;
    public $email;
    //public $pwd_hashed = " ";
    //public $role = " ";
    public $id_role;
    public $noHp;
    public $kodePos;
    public $jalan;
    //public $result;
    
    /*
    public function __construct($username, $password, $namaDepan, $namaBelakang, $email, $role, $noHp, $kodePos, $jalan) {

        $this->username = $username;
        $this->password = $password;
        $this->namaDepan = $namaDepan;
        $this->namaBelakang = $namaBelakang;
        $this->email = $email;
        $this->id_role = $role;
        $this->noHp = $noHp;
        $this->jalan = $jalan;
        $this->kodePos = $kodePos;

    }
    */
    
    protected function getUser($username, $password) {
        
        $stmt = $this->connect()->prepare('SELECT password FROM akun WHERE username=? OR email=? ;');

        if(!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("location: ../login.php?error=unabletologin");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=notfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $passwordHashed[0]["password"]);
        
        
        if($checkPwd == false){
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();
        } else if($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM akun WHERE username=? AND password=?;');

            if(!$stmt->execute(array($username, $passwordHashed[0]["password"]))) {
                $stmt = null;
                header("location: ../login.php?error=unabletologin2");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=usernotfound");
                exit();
            }

            $akun = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["username"] = $akun[0]["username"];
            $_SESSION["id_role"] = $akun[0]["id_role"];
        }

        $stmt = null;
        
    }

    public function SelectAllEmployee(){    
        
        $stmt = $this->connect()->prepare('SELECT * FROM akun');
        //$stmt = "SELECT * FROM akun";            
        $result = $stmt->execute();

        if ($result == false) {
            $stmt = null;
            echo "fail to execute SelectAllEmployee() function, fail to execute: SELECT * FROM akun";
            exit();
        }
                
        $arrResult = Array();
        $count=0;
        if($stmt->rowCount() > 0){                
        while ($data= $stmt->fetch(PDO::FETCH_OBJ))
        {
            $objakun = new Akun(); 
            $objakun ->username = $data->username;
            $objakun ->namaDepan = $data->namaDepan;
            $objakun ->namaBelakang = $data->namaBelakang;
            $objakun ->email = $data->email;
            $objakun ->id_role = $data->id_role;
            $objakun ->noHp = $data->noHp;
            $objakun ->jalan = $data->jalan;
            $objakun ->kodePos = $data->kodePos;

            $arrResult[$count] = $objakun;
            $count++;
            }
        } else {
            echo "Ain't got any user innit";
        }
        return $arrResult;          
    }

}

?>