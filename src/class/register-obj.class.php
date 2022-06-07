<?php
require_once ('class.mail.php');

class register extends Connection {
    
    protected function setUser($username, $password, $namaDepan, $namaBelakang, $email, $role, $noTelp, $kodePos, $jalan) {
        
        $stmt = $this->connect()->prepare('INSERT INTO akun (username, password, namaDepan, namaBelakang, email, id_role, noHp, kodePos, jalan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_ARGON2I, array('cost' => 8));

        if(!$stmt->execute(array($username, $hashedPwd, $namaDepan, $namaBelakang, $email, $role, $noTelp, $kodePos, $jalan))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedcheckuser");
            exit();
        }else{
            $objEmail = new Mail;
            $subject = "AKUN BERHASIL TERDAFTAR";
            $message = "Akun anda berhasil terdaftar dengan username = <strong> $username </strong>";
            $objEmail->sendMail($email, $username, $subject, $message);
            
            #echo"<script>alert('anda berhasil terdaftar')</script>";

        }

        $stmt = null;
        
    }


    protected function checkUser($username) {
        $stmt = $this->connect()->prepare('SELECT username FROM akun WHERE username = ?;');

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedcheckuser");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = true;       //happens if there's already username registered/taken
        }
        else {
            $resultCheck = false;        //happens if username is available for register(not taken)
        }
        return $resultCheck;    
    }

}

?>