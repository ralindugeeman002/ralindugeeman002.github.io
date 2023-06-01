<?php

session_start();


require "connection.php";

 $uname = $_POST["un"];
 $password = $_POST["pw"];
 $remember = $_POST["r"];

 if (empty($uname)){
    echo ("Please enter your Username !!!");
}else if(strlen($uname) > 50){
    echo ("Username must have less than 50 characters");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5 - 20 charcters");

}else{

    $data =    Database::search("SELECT * FROM `user` WHERE `username` = '".$uname."' AND `password` = '".$password."'");
    $data_nm = $data->num_rows;

    if($data_nm>0){

        echo("success");
        $d = $data->fetch_assoc();
        $_SESSION["u"] = $d;

        if($remember == "true"){

            setcookie("email", $uname, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));

        }else{

            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }


    }else{

        echo("invalid Username or Password");
    }



}







?>