<?php

class Login extends Connection {
    
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

}

?>