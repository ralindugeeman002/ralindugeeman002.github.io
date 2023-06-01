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
    <body class="mainbody img-fluid">

    <div class="container-fluid">
        <div class="row justify-content-center " >
            <div class="col-12 col-sm-4 col-md-4">
                <div class="col-12 st1 ">
                    <h2 class="text-center" style="color: white;">Welcome to Cyber Cloud</h2>  
                    <input type="text" class="form-control mb-3" placeholder="Email" id="un"/>
                    <input type="text" class="form-control " placeholder="Password" id="pw"/>
                    <div class="row">
                        <div class="col-12">
                            <div class="col-6">
                                <input type="checkbox" class="form-check-input mx-1 mt-1" id="remember"/>
                                <label class="form-check-label" style="color: white; ">Remember me</label></br>
                            </div>
                            <div class="col-6 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <p  id="msg"></p>
                                </div>
                            </div> 
                            <label class=" signout-hover mx-1" onclick="forgotPassword();">Forgot password?</label>
                            <button onclick="signIn();" type="button" class="btn btn-success " style="margin-left: 60px; padding-left: 40px; padding-right: 40px;">SignIn</button>
                            <p class="txt1 mb-1">New to Cyber Cloud?</p>
                            <button type="button" class="btn btn-light bt1 mb-1" onclick="signUp();">SignUp</button>

                        </div>
                    </div>

                </div>

                
                
                
            </div>
            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc"/>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
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