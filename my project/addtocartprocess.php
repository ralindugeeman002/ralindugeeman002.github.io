<?php

require "connection.php";

session_start();

if(isset($_SESSION["u"])){
    
    $pid = $_GET["ID"];
    $email = $_SESSION["u"]["email"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `Product_ID` = '".$pid."' AND `user_email` = '".$email."'");

    $cart_num = $cart_rs->num_rows;

    if($cart_num != 0){

        Database::iud("DELETE FROM `cart` WHERE `Product_ID` =  '".$pid."'");

        echo("Add to Cart");
    }else if($cart_num == 0){

        Database::iud("INSERT INTO `cart`(`Product_ID`,`user_email`) VALUES('".$pid."','".$email."')");
        echo("Remove From Cart");

    }





}


?>