<?php

class registerContr extends register {

    private $id_admin;
    private $id_penjual;
    private $id_pembeli;
    private $namaDepan;
    private $namaBelakang;
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;
    //private $pwd_hashed = " ";
    //private $role = " ";
    private $id_role;
    private $noHp;
    private $kodePos;
    private $jalan;
    //private $result;
        
    public function __construct($username, $password, $passwordRepeat, $namaDepan, $namaBelakang, $email, $role, $noHp, $kodePos, $jalan) {

        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->namaDepan = $namaDepan;
        $this->namaBelakang = $namaBelakang;
        $this->email = $email;
        $this->id_role = $role;
        $this->noHp = $noHp;
        $this->jalan = $jalan;
        $this->kodePos = $kodePos;

    }

    public function registerUser() {       //this registers the user and SENDS these variable values to the register-obj.class.php so that class can insert these values into the database
        if($this->usernameCheck() == false) {   //username taken
            header("location: ../register.php?error=usernametaken");
            echo"<script>alert('username yang anda masukkan sudah terdaftar, anda dapat login untuk melajutkan atau mengganti username anda')</script>";
            exit();
        }
        if($this->emptyInput() == false){
            header("location: ../register.php?error=emptyinput");
            echo"<script>alert('terdapat form kosong')</script>";
            exit();
        }

        $this->setUser($this->username, $this->password, $this->namaDepan, $this->namaBelakang, $this->email, $this->id_role, $this->noHp, $this->kodePos, $this->jalan); 
    }

    private function validateEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result;
        if( $this->password !== $this->passwordRepeat ){
            $result = false;
        } else {
            $result = true;
        }
        return $result;        
    }

    private function usernameCheck() {//checks availability of the username for register if used or not yet used and is available
        $result;
        if( $this->checkUser($this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;        
    }

    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->password) || empty($this->namaDepan) || empty($this->namaBelakang) || empty($this->email) || empty($this->id_role) || empty($this->noHp) || empty($this->kodePos) || empty($this->jalan))
        {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**   ---TIDAK PERLU JIKA SUDAH ADA [REQUIRED] DI HTML FORM--- (no actually dont listen to this comment)
    private function emptyInput() {
        $result;
        if(empty($this->$)
    }
    */

}