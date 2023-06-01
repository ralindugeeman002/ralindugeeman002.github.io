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
    <body style="background-color: #353839;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mt-2" style="color: white;">Cyber Cloud</h1>
                </div>
            </div>          
            <div class="col-12">
                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4 " style="background-color: #191919; padding-bottom:30px; border-radius:10px">
                        <h3 class="text-center" style="color: white;">Join Now</h3>
                        <p class="text-center" style="color: white;">And Start Buying Games</p>
                        <div class="col-12 mt-5  ">
                            <input type="text"  placeholder="Email" class=" form-control" id="em"/>
                        </div>
                        <div class="col-12 mt-3">
                            <input type="text" placeholder="Username" class="form-control" id="un2"/>

                        </div>
                        <div class="col-12 mt-3">
                            <input type="password" placeholder="password" class="form-control" id="pw2"/>

                        </div>
                        <div class="col-12 d-none" id="msgdiv2">
                            <div class="alert alert-danger" role="alert" id="alertdiv2">
                                <p id="msg2"></p>
                            </div>
                        </div>  
                        <div class="col-12 mt-5" style="padding-left: 3px;">
                            <button type="button" class="btn btn-success bt2" onclick="signUp2();">SignUp</button>

                        </div> 
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-5">
                                    <hr style="color: white;"/>
                                </div>
                                <div class="col-2">
                                    <h6 class="text-center" style="color: white;">OR</h6>
                                </div>
                                <div class="col-5">
                                    <hr style="color: white;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                        <button type="button" class="btn btn-primary bt2">SignUp with Facebook</button>
                        </div>
                        <div class="col-12 mt-3">
                            <span  style="color: white; padding-left:100px;">Already Have an Account?</span><span  style="color: #0d6efd; padding-left:20px; cursor:pointer" onclick="LogIn();">Log In</span>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>

</html>