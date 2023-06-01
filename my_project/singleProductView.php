<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.css"/>
        <link rel="icon" href="resources/newtech2.jpg"/>
        <link rel="stylesheet" href="styles.css"/>

        <title>Cyber Cloud</title>

    </head>
    <body class="bg-black">

    <?php

    require "connection.php";

    if(isset($_GET["id"])){

        $pid = $_GET["id"];

        $data_rs = Database::search("SELECT * FROM `product` WHERE `ID` = '".$pid."'");
        $data = $data_rs->fetch_assoc();

    

    include "header.php";

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
                        <div class="col-4 mt-5">
                            <h2 style="color: white;"><?php echo $data['title'];?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 mt-2">
                            <p style="color: white;"><?php echo $data['rating'];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>

                                <?php

                                $vid_rs = Database::search("SELECT * FROM `video` WHERE `product_ID` = '".$pid."'");

                                $vid_data = $vid_rs->fetch_assoc();

                                ?>

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <video width="640" height="320" controls>
                                        <source src='<?php echo $vid_data['code'];?>' type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                    </div>
                                    <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <h3 style="color: white;"><?php echo $data['description'];?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11 mt-2">
                                    <h3 style="color: white;"><?php echo $data['description2'];?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11 mt-4">
                                    <h3 style="color: grey;">System Requierments</h3>
                                </div>
                            </div>
                            <hr style="color: white;"/>

                            <div class="row">
                                <div class="col-11 mt-4">
                                    <h3 style="color: grey;"><?php echo $data['system_requierments'];?></h3>
                                </div>
                            </div>


                        </div>
                        <div class="col-4">
                            <h3 style="color: white;"><?php echo $data['title'];?></h3>
                            <p style="color: white;">Price</p>
                            <div class="row">
                                <button type="button" class="btn btn-warning">Buy Now</button>
                            </div>
                            <div class="row mt-2">
                                <button type="button" class="btn btn-dark">Add to Cart</button>
                            </div>
                            <div class="row mt-2">
                                <button type="button" class="btn btn-dark">Add to Wishlist</button>
                            </div>
                            <div class="col-12">
                                <div class="row mt-2">
                                
                                    <div class="col-6">
                                        <span style="color: grey;">Publisher</span>
                                    </div>
                                    <div class="col-6">
                                        <span style="color: white;"><?php echo $data['publisher'];?></span>
                                    </div>

                                </div>    
                                <hr style="color: white;"/>                                    
                            </div>
                            <div class="col-12">
                                <div class="row mt-2">
                                
                                    <div class="col-6">
                                        <span style="color: grey;">Developer</span>
                                    </div>
                                    <div class="col-6">
                                        <span style="color: white;"><?php echo $data['Developer'];?> </span>
                                    </div>

                                </div>    
                                <hr style="color: white;"/>                                    
                            </div>
                            <div class="col-12">
                                <div class="row mt-2">
                                
                                    <div class="col-6">
                                        <span style="color: grey;">Release Date</span>
                                    </div>
                                    <div class="col-6">
                                        <span style="color: white;"><?php echo $data['release_date'];?></span>
                                    </div>

                                </div>    
                                <hr style="color: white;"/>                                    
                            </div>
                            <div class="col-12">
                                <div class="row mt-2">
                                
                                    <div class="col-6">
                                        <span style="color: grey;">Platform</span>
                                    </div>
                                    <div class="col-6">
                                        <span style="color: white;"><?php echo $data['Platform'];?></span>
                                    </div>

                                </div>    
                                <hr style="color: white;"/>                                    
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    <?php
        
    }else{
        echo("Please Log in");
    }

    ?>

    
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    </body>
</html>
