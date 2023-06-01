<?php

require "connection.php";




$username = $_POST["un"];
$email = $_POST["em"];
$password = $_POST["pw"];



if(empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($username)){
    echo ("Please enter your Username !!!");
}else if(strlen($username) > 50){
    echo ("Username must have less than 50 characters");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5 - 20 charcters");

}else{

    $rs = Database::search("SELECT * FROM  `user` WHERE `email` = '".$email."'");

    $n = $rs->num_rows;

    if($n>0){

        echo("user with the same email already exist");
    }else{
        $d = new DateTime();
        $timezone = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($timezone);
        $date = $d->format("Y-m-d H:i:s");


        Database::iud("INSERT INTO `user`(`username`,`password`,`email`,`joined_date`) VALUES ('".$username."','".$password."','".$email."','".$date."')");

        echo("success");


    }



}




?>