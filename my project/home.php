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

    include "header.php";

    $email = $_SESSION["u"]["email"];

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
                </div>

                <div class="col-8 mt-3">
                    <div class="row">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                <img src="resources/assassin-s-creed-syndicate-pub-i28160.jpg" class="d-block w-100" alt="...">
                                <div class="cc1 d-none d-md-block">
                                <button type="button" class="btn btn-light">Purchase Now</button>
                                    <h5></h5>
                                    <p></p>
                                </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                <img src="resources/1173124.jpg" class="d-block w-100" alt="...">
                                <div class="cc1 d-none d-md-block">
                                <button type="button" class="btn btn-primary">Pre Order Now</button>
                                    <h5></h5>
                                    <p></p>
                                </div>
                                </div>
                                <div class="carousel-item">
                                <img src="resources/1148838.jpg" class="d-block w-100" alt="...">
                                <div class="cc1 d-none d-md-block">
                                    <button type="button" class="btn btn-dark">Purchase Now</button>
                                    <h5></h5>
                                    <p></p>
                                </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <h4 style="color: white;">Games on sale</h4>
                    <div class="row">
                        <div class="col-10">
                            <div class="row">

                                <?php require "connection.php";

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                $product_num = $product_rs->num_rows;

                                $results_per_page = 3;
                                $number_of_pages = ceil($product_num / $results_per_page);

                                $page_results = ($pageno - 1) * $results_per_page;
                                $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                $selected_num = $selected_rs->num_rows;

                                for ($x = 0; $x < $selected_num; $x++) {
                                    $selected_data = $selected_rs->fetch_assoc();

                                ?>


                                <div class="col-lg-4 col-12">
                                    <div class="card bg-black" style="width: 18rem;">

                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `images` WHERE  `product_ID` = '".$selected_data["ID"]."'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>
                                        <a href='<?php echo "singleproductView.php?id=" . $selected_data['ID'];?>'><img src="<?php echo $image_data['code'];?>" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <h5 class="cd1"><?php echo $selected_data['title'];?></h5>
                                            <p class="cdt"><?php echo $selected_data['price'];?></p>
                                            <p class="cdt"><?php echo $selected_data['description'];?></p>

                                            <?php
                                                $wishlist_rs  = Database::search("SELECT * FROM `wishlist` WHERE `product_ID` = '".$selected_data['ID']."' AND `user_email` = '".$selected_data['user_email']."'");
                                                $wishlist_num = $wishlist_rs->num_rows;

                                                if($wishlist_num == "1"){

                                                    ?>

                                                    <button onclick="addtowishlist(<?php echo $selected_data['ID'];?>);"><i class="bi bi-plus-square-fill" id="square<?php echo $selected_data['ID'];?>"></i></button>

                                                <?php


                                                }else{

                                                    ?>
                                                    <button  onclick="addtowishlist(<?php echo $selected_data['ID'];?>);"><i class="bi bi-plus-square" id="square<?php echo $selected_data['ID'];?>"></i></button>


                                                <?php
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }

                                ?>

                                <!--<div class="col-4">
                                    <div class="card bg-black" style="width: 18rem;">
                                        <img src="resources/capsule_616x353.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="cd1">Card title</h5>
                                            <p class="cdt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card bg-black" style="width: 18rem;">
                                        <img src="resources/header.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="cd1">Card title</h5>
                                            <p class="cdt">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                            echo "#";
                                                                        } else {
                                                                            echo "?page=" . ($pageno - 1);
                                                                        } ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php

                                        for ($x = 1; $x <= $number_of_pages; $x++) {
                                            if ($x == $pageno) {

                                        ?>
                                                <li class="page-item active">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                            <?php

                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }

                                        ?>

                                        <li class="page-item">
                                            <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                            echo "#";
                                                                        } else {
                                                                            echo "?page=" . ($pageno + 1);
                                                                        } ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="row">

                            </div>                   
                        </div>
                    </div>

                    
                </div>
                
                
        </div>     
    </div>
     
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    </body>
</html>
        
