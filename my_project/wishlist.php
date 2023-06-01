<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="icon" href="resources/newtech2.jpg"/>
        <link rel="stylesheet" href="styles.css"/>

        <title>Cyber Cloud</title>

    </head>
    <body class=" bg-black">

        <?php


        require "connection.php";
        include "header.php";

        

        if(isset($_SESSION["u"])){

            $email  = $_SESSION["u"]["email"];



        

        
        

        ?>

        <div class="container fluid">
            <div class="col-12 offset-1 mt-4"> 
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input class="form-control" type="search" placeholder="Search">
                        </div>
                        <div class="col-1 mt-1">
                            <img src="resources/search-14-16.png" onclick="search();" class="signout-hover" width="20px">
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-warning">Explore</button>
                            <a href="advancesearch.php"><button type="button" class="btn btn-warning">brows</button></a>
                            <button type="button" class="btn btn-warning">News</button>
                        </div>
                        <div class="col-1 offset-2">
                            <p class="t1 signout-hover" onclick="wishlist();">Wishlist</p>                      
                        </div>
                        <div class="col-1">
                            <p class="t1 signout-hover" onclick="cart();">Cart</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 mt-5">
                            <h2 style="color: white;">Whishlist</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            

                                    <?php  

                                    $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` = '".$email."'");
                                    $wishlist_num = $wishlist_rs->num_rows;

                                    $wishlist_data = $wishlist_rs->fetch_assoc();

                                    if($wishlist_num == 1){

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email` = '".$email."'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `Product_ID` = '".$product_data["ID"]."'");
                                        $images_data = $image_rs->fetch_assoc();

                                        ?>

                            <div class="card mb-3" style="max-width: 540px; background-color:grey;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo $images_data["code"];?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: white;"><?php echo $product_data["title"];?> </h5>
                                            <p class="card-text" style="color: white;"><?php echo $product_data["description"];?></p>
                                            <p class="card-text"><small class="text-muted" style="color: white;">Last updated 3 mins ago</small></p>

                                            <?php 

                                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `Product_ID` = '".$product_data["ID"]."'");

                                            $cart_num = $cart_rs->num_rows;

                                            if($cart_num == 1){

                                                ?>
                                                <button onclick="addtocart(<?php echo $product_data['ID'];?>);" type="button" class="btn btn-danger" id="btn_change<?php echo $product_data["ID"];?>">Remove From Cart</button>
                                            
                                            <?php


                                            }else if($cart_num ==0){

                                                ?>
                                              
                                              <button onclick="addtocart(<?php echo $product_data['ID'];?>);" type="button" class="btn btn-dark" id="btn_change<?php echo $product_data["ID"];?>">Add to Cart</button>

                                              <?php
                                            }

                                            ?>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            

                                    <?php





                                        
                                    }else{

                                        ?>

                                        <div class="row">
                                            <div class="col-12">
                                                <h2>Wishlist is empty</h2>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    
                             
                      
                </div>
            </div>
        </div>

        <?php

        }else{

            ?>
            <div class="row">
                <div class="col-12">
                    <h2>Please Login first</h2>
                </div>
            </div>

            <?php
        }

        ?>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>
</html>    

