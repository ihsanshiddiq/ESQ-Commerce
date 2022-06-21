<?php
require_once ('class.mail.php');

use LDAP\Result;

class register extends Connection {
    
    protected function setUser($username, $password, $namaDepan, $namaBelakang, $email, $role, $noTelp, $kodePos, $jalan) {
        
        $stmt = $this->connect()->prepare('INSERT INTO akun (username, password, namaDepan, namaBelakang, email, id_role, noHp, kodePos, jalan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_ARGON2I, array('cost' => 8));

        if(!$stmt->execute(array($username, $hashedPwd, $namaDepan, $namaBelakang, $email, $role, $noTelp, $kodePos, $jalan))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedcheckuser");
            exit();
        }
        
        else{

            try {
                $objEmail = new Mail;
                $subject = "AKUN BERHASIL TERDAFTAR";
                $message = "Akun anda berhasil terdaftar dengan username = <strong> $username </strong>";
                $objEmail->sendMail2($email, $username, $subject, $message);
            
            #echo"<script>alert('anda berhasil terdaftar')</script>";
            } catch (Exception $e ) {
                echo "<script>alert('Could not send email. But account was created successfully (you can login now)'); window.location.href = '../index.php';</script>";
            }

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

    public function validateNamaToko($namaToko) {
        $stmt = $this->connect()->prepare('SELECT namaToko FROM penjual WHERE namaToko = ?;');

        if(!$stmt->execute(array($namaToko))) {
        $stmt = null;
        echo "<script>alert('statement error');</script>";
        exit();
        }

        if($stmt->rowCount() > 0) {
            header("location: ../registerseller.php?error=nametaken");
            echo "<script>alert('Nama Toko sudah terdaftar');</script>";     //happens if there's already username registered/taken
            exit();
        }
        else {
            header("location: ../registerseller.php?available");
            echo "<script>alert('valid');</script>";     //happens if username is available for register(not taken)
            exit();
        }
    }

    public function validateTokoN($namaToko) {
        $stmt = $this->connect()->prepare('SELECT namaToko FROM penjual WHERE namaToko = ?;');

        if(!$stmt->execute(array($namaToko))) {
            $stmt = null;
            echo "<script>alert('statement error');</script>";
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = true;     //happens if there's already username registered/taken
        }
        else {
            $resultCheck = false;     //happens if username is available for register(not taken)
        }
        return $resultCheck;
    }

    protected function addPenjual($namaToko, $instagram, $facebook, $username) {
        //if (validateToko($namaToko == true));
        $stmt = $this->connect()->prepare('INSERT INTO penjual (namaToko, instagram, facebook, username) VALUES (?, ?, ?, ?);');
        echo "<script>alert('u got into here');</script";
        if(!$stmt->execute(array($namaToko, $instagram, $facebook, $username))) {

            $stmt = null;
            header("location: ../index.php?error=stmtfailedaddseller");
            exit();
        }

        $stmt = null;
    }
}

?>