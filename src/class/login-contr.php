<?php

class loginContr extends Login {

    private $username;
    private $password;
    private $role;
    //private $result;
        
    public function __construct($username, $password) {

        $this->username = $username;
        $this->password = $password;

    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            //empty input moment
            header("location: ../login.php?error=emptyinput");
            echo $this->username;
            echo $this->password;
            exit();
        }

        $this->getUser($this->username, $this->password);

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

    private function usernameCheck() {          //checks availability of the username for register
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
        if(empty($this->username) || empty($this->password)){
            $result = false;
        } else {
            $result = true;
        }
        
        return $result;
    }

    public function role() {
        return 0;
    }
    /**   ---TIDAK PERLU JIKA SUDAH ADA [REQUIRED] DI HTML FORM---
    private function emptyInput() {
        $result;
        if(empty($this->$)
    }
    */

}