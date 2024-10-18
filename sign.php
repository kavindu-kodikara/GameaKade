<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="body" style="overflow-y: hidden;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-6 d-none d-lg-block offset-3 container" id="container">
                <div class="form-container sign-up-container">
                    <div class="inputDiv">
                        <h1>Create Account</h1>
                        <div class="col-6 d-none" id="msgdiv">
                            <div class="alert alert-danger" role="alert" id="alertdiv">
                                <i class="bi bi-x-octagon-fill fs-6" id="msg">

                                </i>
                            </div>
                        </div>
                        <div class="col-12 p-1 social-container" style="background-color: #F6F5F7; border-radius: 10px;">
                            <div class="col-12">
                                <div class="row p-1">
                                    <div class="col-2 offset-1"><img src="resorces/google.png" style="height: 25px;"></div>
                                    <div class="col-9 fs-6 text-start">Register with Google</div>
                                </div>
                            </div>
                        </div>
                        <span>or use your email for registration</span>
                        <input class="input1" id="fname" type="text" placeholder="Name" />
                        <input class="input1" id="email" type="email" placeholder="Email" />
                        <input class="input1" id="password" type="password" placeholder="Password" />
                        <input class="input1" id="repassword" type="password" placeholder=" Re-Type Password" />
                        <button class="button" onclick="signUp();">Sign Up</button>
                    </div>
                </div>
                <div class="form-container sign-in-container">
                    <div class="inputDiv">


                        <?php

                        $email="";
                        $password="";

                        if (isset($_COOKIE["email"])) {
                            $email = $_COOKIE["email"];
                        }

                        if (isset($_COOKIE["password"])) {
                            $password = $_COOKIE["password"];
                        }

                        ?>


                        <h1 class="fw-bold fs-1 ">Sign in</h1>
                        <span class="text-danger" id="msg2"></span>
                        <div class="col-12 p-1 social-container" style="background-color: #F6F5F7; border-radius: 10px;">
                            <div class="col-12">
                                <div class="row p-1">
                                    <div class="col-2 offset-1"><img src="resorces/google.png" style="height: 25px;"></div>
                                    <div class="col-9 fs-6 text-start">Sign In with Google</div>
                                </div>
                            </div>
                        </div>
                        <span>or use your account</span>
                        <input class="input1" id="siemail" type="email" placeholder="Email" value="<?php echo ($email); ?>" />
                        <input class="input1" id="sipassword" type="password" placeholder="Password" value="<?php echo ($password); ?>" />
                        <div class="col-12 mb-3">
                            <div class="row">

                                <div class="form-check col-6 text-start  ps-5">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label" for="rememberme">Remember Me</label>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="fs-6 " onclick="forgotPass();">Forgot password?</a>
                                </div>

                            </div>
                        </div>
                        <button class="button" onclick="signIn();">Sign In</button>
                    </div>
                </div>
                <div class=" overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <div class=" logoDiv col-6"></div>
                            <h1>Hello, Friend!</h1>
                            <p>If you alredy have an account please login with your personal info &nbsp;<i class="bi bi-arrow-down-circle"></i></p>
                            <button class="button signbutton " id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <div class=" logoDiv col-6"></div>
                            <h1>Welcome Back!</h1>
                            <p>If you don't have an account etnter your details and start journey with us &nbsp;<i class="bi bi-arrow-down-circle"></i></p>
                            <button class="button signbutton " id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-block d-lg-none text-center">
                <div class="row ">

                    <div class="col-12 p-5 " id="signInDiv">
                        <div class="logoDiv"></div>
                        <div class="col-12 mb-5">
                            <h1 class="fw-bold fs-1">Sign In</h1>
                        </div>
                        <span class="text-danger" id="msgmobile1"></span>
                        <div class="col-12 mb-2 p-2 " style="background-color: #EEEEEE; border-radius: 10px;">
                            <div class="col-12 p-1">
                                <div class="row">
                                    <div class="col-2 offset-1"><img src="resorces/google.png" style="height: 25px;"></div>
                                    <div class="col-9 fs-6 text-start">Sign In with Google</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <span>or use your account</span>
                        </div>
                        <div class="col-12">
                            <input class="input1" type="email" id="siemail" placeholder="Email" value="<?php echo ($email); ?>" />
                            <input class="input1" type="password" id="MsignPassword" placeholder="Password" value="<?php echo ($password); ?>" />


                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">

                                <div class="form-check col-6 text-start  ">
                                    <input class="form-check-input" type="checkbox" id="Mrememberme">
                                    <label class="form-check-label" for="rememberme">Remember Me</label>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="fs-6 " onclick="forgotPassMobile();">Forgot password?</a>
                                </div>

                            </div>
                        </div><br>
                        <div class="col-12 d-grid">
                            <button class="button" onclick="MobileSignIn();">Sign In</button><br>
                            <button class="button" style="background-color: #FF416C;" onclick="changeview();">Create account</button>

                        </div>
                    </div>

                    <div class="col-12 p-5 d-none" id="signUpDiv">
                        <div class="logoDiv"></div>
                        <div class="col-12 mb-2">
                            <h1 class="fw-bold fs-1">Sign Up</h1>
                        </div>
                        <span class="text-danger" id="msgmobile2"></span>
                        <div class="col-12 mb-2 p-2" style="background-color: #EEEEEE; border-radius: 10px;">
                            <div class="col-12 p-1">
                                <div class="row">
                                    <div class="col-2 offset-1"><img src="resorces/google.png" style="height: 25px;"></div>
                                    <div class="col-9 fs-6 text-start">Register with Google</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <span>or Create withe your details</span>
                        </div>
                        <div class="col-12">
                            <input class="input1" id="Mfname" type="text" placeholder="Name" />
                            <input class="input1" id="Memail" type="email" placeholder="Email" />
                            <input class="input1" id="Mpassword" type="password" placeholder="Password" />
                            <input class="input1" id="Mreoassword" type="password" placeholder="Re-Type Password" />


                        </div><br>

                        <div class="col-12 d-grid">
                            <button class="button" style="background-color: #FF416C;" onclick="MobilesignUp();">Sign Up</button><br>
                            <button class="button" onclick="changeview();">alredy have an account</button>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- model -->

    <div class="modal" tabindex="-1" id="model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Reset password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">


                        <div class="col-12 input-group mb-3">
                            <input type="password" id="npi" class="form-control" placeholder="New Password" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 30px;border-bottom-left-radius: 30px;">
                            <button class="btn btn-outline-success"  type="button"  style="border-top-right-radius: 30px;border-bottom-right-radius: 30px;" onclick="showPassword1();"><i id="e1" class="bi bi-eye-fill "></i></button>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <input type="password" id="rnp" class="form-control" placeholder="Re-type Password" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 30px;border-bottom-left-radius: 30px;">
                            <button class="btn btn-outline-success"  type="button"  style="border-top-right-radius: 30px;border-bottom-right-radius: 30px;" onclick="showPassword2();"><i id="e2" class="bi bi-eye-fill "></i></button>
                        </div>
                        <div class="col-12 input-group mb-3">
                            <input type="password" id="vc" class="form-control" placeholder="Enter verification code" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 30px;">

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" style="background-color: #FF416C; border-radius: 20px;">Close</button>
                    <button type="button" class="btn text-white" style="background-color: #FF4B2B; border-radius: 20px;" onclick="resetPassword();">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- model -->

    <!-- footer -->

    <div class="col-12 fixed-bottom d-none d-lg-block">
        <p class="text-center">&copy; 2022 Gamea Kade.lk || Right Reserved</p>
    </div>

    <!-- footer -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>