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
                            <button type="button" class="btn btn-warning">brows</button>
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
                        <div class="col-8 mt-4">
                            <h4 style="color: white;">Popular games</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn">
                                <a href="action.php"><img src="resources/1077272.jpg" height="200px" width="250px"/></a>
                                <h5 style="color: white;">Action Games</h5>
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn">
                                <a href="cross.php"><img src="resources/capsule_616x353 (1).jpg" height="200px" width="250px"/></a>
                                <h5 style="color: white;">Cross Platform Games</h5>
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn">
                                <a href="person.php"><img src="resources/maxresdefault.jpg" height="200px" width="250px"/></a>
                                <h5 style="color: white;">1st Person</h5>
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn">
                                <a href="cop.php"><img src="resources/need-for-speed-rivals-small.webp" height="200px" width="250px"/></a>
                                <h5 style="color: white;">CO-OP</h5>
                            </button>
                        </div>
                        
                    </div>
                        <div class="col-12 offset-4 mt-2">
                            <div class="row">
                                <div class="col-2">
                                    <input class="form-control" type="search" placeholder="Keyword" id="s"/>
                                </div>
                                <div class="col-2">
                                    <button type="button" onclick="search1(0);" class="btn btn-dark">Search</button>
                                </div>
                            </div>
                        </div>

                        <?php

                        ?>

                            <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-select" id="s1">
                                        <option value="0">Genres</option>  
                                        <?php
                                        $genre_rs = Database::search("SELECT * FROM `genre`");

                                        $genre_num = $genre_rs->num_rows;

                                        for($x = 0; $x<$genre_num; $x++){

                                            $genre_data = $genre_rs->fetch_assoc();
                                                ?>
                                        <option value="<?php echo $genre_data["ID"];?> "><?php echo $genre_data["genre_name"];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                        


                       
                        
                                <div class="col-3">
                                    <select class="form-select" id="s2">
                                        <option value="0">price</option>                          
                                        <option value="1">free</option>
                                        <option value="2">Price High to Low</option>
                                        <option value="3">Price Low to High</option>
                                        
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" id="s3">
                                        <option value="0">platforms</option>                          
                                        <option>windows</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" id="s4">
                                        <option value="0">featuers</option>                          
                                        <option>windows</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12  mt-5" id="textarea">
                                <h3  class="text-center" style="color: white;">Empty</h3>


                            </div>
                        </div>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.js"></script>
    </body>
</html>

