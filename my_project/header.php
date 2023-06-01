<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row" style="background-color: #3B3B3B;">
                <div class="col-10">
                    <a href="home.php" ><img src="resources/white.png" height="70px" width="60px"/> </a> 
                    <button type="button" class="btn btn-warning">Store</button>
                    <button type="button" class="btn btn-warning">FAQ</button>
                    <button type="button" class="btn btn-warning">Help</button>                
                </div>

                
                <div class="col-2 mt-3">

                
                    <div class="btn-group">

                    <?php

                    session_start();
                        if(isset($_SESSION["u"])){
                            $d = $_SESSION["u"];

                            ?>
                        <button class="btn btn-secondary dropdown-toggle d-lg-block" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <?php echo $d["username"];?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#" onclick="signout();">signout</a></li>
                        </ul>
                        </div>

                        <button type="button" class="btn btn-primary" >Download</button>
                       
                        
                    <?php
                }else{
                    
                    ?>

                    <button onclick="signingo();" type="button" class="btn btn-dark" style="margin-left: 40px;">SignIn</button>
                    <button type="button" class="btn btn-primary" style="margin-left: 10px;">Download</button>


                    <?php
                }

                ?>
                    

                </div>
                
                

            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>