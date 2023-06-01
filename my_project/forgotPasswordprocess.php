<?php

 require "connection.php";
 require "PHPMailer.php";
 require "SMTP.php";
 require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){


    $email = $_GET["e"];


    $rs = Database::search("SELECT * FROM  `user` WHERE `email`= '".$email."'");

    $num = $rs->num_rows;

    if($num == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code` = '".$code."' WHERE `email` = '".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ralindu474@gmail.com';
            $mail->Password = 'afftowtcsjfxddpm';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('ralindu474@gmail.com', 'Reset Password');
            $mail->addReplyTo('ralindu474@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Forgot Password Verification Code';
            $bodyContent = '<h1 style="color:green">Your Verification code is '.$code.'</h1>';
            $mail->Body    = $bodyContent;

        
        if(!$mail->send()){

            echo("Verification code sending faliure");
        }else{
            echo("success");
        }


    }else{
        echo("invalid email Address");
    }


}

?>