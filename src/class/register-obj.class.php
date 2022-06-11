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

        $id_role = $role;
        /*
            BELOW IS THE FEATURE THAT INSERTS NEW DATA INTO EITHER [SELLER], [BUYER], OR [ADMIN] TO SYNC WITH TABEL [akun]
            IT INSERTS INTO THESE TABLE: [penjual], [pembeli], [admin].
        */

        switch ($id_role) {     //the alternative would be to have these different cases inside different files, because register pages are different for every roles
            case 'B':   
                $stmt = $this->connect()->prepare('INSERT INTO pembeli (username) VALUES (?);');

                if(!$stmt->execute(array($username))) {
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailaddinguserid");
                    exit();
                }   
            break;
            case 'A':
                $stmt = $this->connect()->prepare('INSERT INTO admin (username) VALUES (?);');

                if(!$stmt->execute(array($username))) {
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailaddingadminid");
                    exit();
                }   
            break;
            default:
                break;
        }
        
    }

    protected function addPenjual($namaToko, $instagram, $facebook, $username) {
        $stmt = $this->connect()->prepare('INSERT INTO penjual (namaToko, instagram, facebook, username) VALUES (?, ?, ?, ?);');
        echo "<script>alert('u got into here');</script";
        if(!$stmt->execute(array($namaToko, $instagram, $facebook, $username))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedaddseller");
            exit();
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