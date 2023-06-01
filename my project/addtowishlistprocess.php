<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    if(isset($_GET["ID"])){

        $email = $_SESSION["u"]["email"];
        $product = $_GET["ID"];

        $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_ID` = '".$product."' AND `user_email` = '".$email."'");

        $wishlist_num = $wishlist_rs->num_rows;

        if($wishlist_num == "1"){

            $wishlist_data = $wishlist_rs->fetch_assoc();

            Database::iud("DELETE FROM `wishlist` WHERE `ID` = '".$wishlist_data['ID']."'");
            echo("remove");
        }else{

            Database::iud("INSERT INTO `wishlist`(`Product_ID`,`user_email`)VALUES('".$product."','".$email."')");

            echo("added");
        }
    }else{
        echo("something went wrong");
    }
}else{
    echo("please login first");
}

?>