<?php

if (isset($_POST['reset'])) {
    include "../inc.koneksi.php";
    require_once('../init.class.php');
    $objAkun = new Akun();

    $username = stripslashes($_POST['username']);

    $objAkun->cek_akunPDO($username);
    if ($objAkun->hasil == true) {
        $objEmail = new Mail();

        $link = "<a href = 'localhost/PW/FINAL/ESQ-Commerce/src/reset-pass.php?key=".$objAkun->username."&reset=".$objAkun->password."'>Click To Reset Your Password</a>";

        $email = $objAkun->email;
        $subject = "PASSWORD RESET ESQ-COMMERCE";
        $message = "reset password for $objAkun->username <br><br>".$link;

        $objEmail->sendMail($email, $username, $subject, $message);

    } else {
        echo $objAkun->message;
    }

}