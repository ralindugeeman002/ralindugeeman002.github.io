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

        $email = $_SESSION["u"]["email"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$email."'");

        $cart_num = $cart_rs->num_rows;

        if($cart_num == 1){

            ?>



            <div class="container fluid">
            <div class="col-12 offset-lg-1 mt-4"> 
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input class="form-control" type="search" placeholder="Search">
                        </div>
                        <div class="col-1 mt-1">
                            <img src="resources/search-14-16.png" onclick="search();" class="signout-hover" width="20px">
                        </div>
                        <div class=" col-12 col-lg-3 d-lg-block d-none ">
                            <button type="button" class="btn btn-warning">Explore</button>
                            <a href="advancesearch.php"><button type="button" class="btn btn-warning">brows</button></a>
                            <button type="button" class="btn btn-warning">News</button>
                        </div>
                        <div class="col-2 col-lg-1  offset-lg-2">
                            <p class="t1 signout-hover" onclick="wishlist();">Wishlist</p>                      
                        </div>
                        <div class="col-2 col-lg-1 ">
                            <p class="t1 signout-hover" onclick="cart();">Cart</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <h2 style="color: white;">Cart</h2>
                        </div>
                    </div>
                </div>

                <?php

                    $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email` = '".$email."'");
                    $product_data = $product_rs->fetch_assoc();

                    $img_rs = Database::search("SELECT * FROM  `images` WHERE `Product_ID` = '".$product_data['ID']."'");

                    $img_data = $img_rs->fetch_assoc();

                ?>
                <div class="row">
                    <div class="col-8 ">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo $img_data['code'];?>" class="img-fluid rounded-start" alt="...">
                                </div>

                                
                                <div class="col-md-8">
                                    <div class="card-body bg-black">
                                        <h5 class="card-title" style="color: white;"><?php echo $product_data['title'];?></h5>
                                        <p class="card-text" style="color: white;"><?php echo $product_data['description'];?></p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h2 style="color: white;">Game and summery</h2>
                        <div class="row">
                            <div class="col-6">
                                <p style="color: white;">Price</p>
                            </div>
                            <div class="col-6">
                                <p style="color: white;">$55</p>
                            </div>
                        </div>
                        <hr style="color: white;"/>
                        <div class="row">
                            <div class="col-6">
                                <h4 style="color: white;">Sub Total</h4>
                            </div>
                            <div class="col-6">
                                <h4 style="color: white;">$55</h4>
                            </div>
                        </div>
                        <div class="row">
                            <button onclick="Checkout();" type="button" class="btn btn-primary">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php



            
        }else{


            ?>
            <div class="container fluid">
                <div class="col-12 offset-lg-1 mt-4"> 
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control" type="search" placeholder="Search">
                            </div>
                            <div class="col-1 mt-1">
                                <img src="resources/search-14-16.png" onclick="search();" class="signout-hover" width="20px">
                            </div>
                            <div class=" col-12 col-lg-3 d-lg-block d-none ">
                                <button type="button" class="btn btn-warning">Explore</button>
                                <a href="advancesearch.php"><button type="button" class="btn btn-warning">brows</button></a>
                                <button type="button" class="btn btn-warning">News</button>
                            </div>
                            <div class="col-2 col-lg-1  offset-lg-2">
                                <p class="t1 signout-hover" onclick="wishlist();">Wishlist</p>                      
                            </div>
                            <div class="col-2 col-lg-1 ">
                                <p class="t1 signout-hover" onclick="cart();">Cart</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h2 style="color: white;">Cart</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Your Cart Is empty</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php




        }


        ?>
        

    <?php



    }


   ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

    </body>
</html>
