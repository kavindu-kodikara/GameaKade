<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #E7FFDE;">

    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            session_start();
            include "header.php";
            if (isset($_SESSION["u"])) {
            ?>

                <div class="col-12">
                    <div class="row">

                        <!-- hader -->
                        <div class="col-12 pt-3 mt-5 bg-white">
                            <div class="row">
                                <div class="col-3 col-lg-1 offset-0 offset-lg-1  logo" onclick="window.location='index.php'"></div>
                                <div class="col-8 col-lg-6 mt-4">
                                    <div class="row">



                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border-1 rounded-5" aria-label="Text input with dropdown button" id="basic_search_txt" placeholder="&nbsp;search anything">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 d-none d-lg-block col-lg-1 mt-4">
                                    <button class="button" style="height: 35px; width: 100px; padding: 0px;">Search</button>
                                </div>
                                <div class="col-2 mt-4 ms-5 d-none d-lg-block">
                                    <span><i class="bi bi-geo-alt-fill fs-4 fw-bold" style="color: #FF4B2B;"></i>&nbsp;&nbsp;<a href="https://goo.gl/maps/qxhefUNTjcMLi9qK8" class="text-decoration-none text-black fs-5 fw-bold">Locate Us</a></span>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!-- hader -->

                        <div class="col-12 ">
                            <div class="row">

                                <div class="col-10 offset-1 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-12 col-lg-3 pe-lg-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">


                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12 centerVertical" style="font-size: 12px;">Hello, Kavindu</div>

                                                                        <div class="col-12 fs-5 fw-bold cursor" onclick="window.location = 'manageMyAccount.php'" style="color: #FF4B2B;">Manage My Account</div>
                                                                        <div class="col-12 ps-lg-5">
                                                                            <div class="row">
                                                                                <div class="col-12 fs-6 g-1 mt-3 mt-lg-0">
                                                                                    <div class="row">

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'myProfile.php'" class="col-12  manageAccountbuttonBg rounded-3 manageAccountBorder cursor btnActive-sm">

                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-person manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10">Profile</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'addressBook.php'" class="col-12 cursor manageAccountbuttonBg rounded-3 manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-journals manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-3 ">Adddress</div>&nbsp;&nbsp;
                                                                                                                <div class="col-7 d-none d-lg-block">Book</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'cart.php'" class="col-12 rounded-3  manageAccountbuttonBg cursor manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-cart2 manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10 ">Cart</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div class="col-12 rounded-3 cursor manageAccountbuttonBg manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-suit-heart manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10">Wishlist</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 fs-5 fw-bold mt-4 cursor" onclick="window.location = 'recentOrder.php'">My Orders</div>
                                                                <div class="col-12 ps-5">
                                                                    <div class="row">
                                                                        <div class="col-12 fs-6 g-1">
                                                                            <div class="row">
                                                                                <div onclick="window.location = 'recentOrder.php'" class="col-12 g-1 cursor"><i class="bi bi-arrow-counterclockwise"></i></i>&nbsp; Recent Orders</div>
                                                                                <div onclick="window.location = 'myCancellations.php'" class="col-12 g-1 cursor"><i class="bi bi-x-circle"></i>&nbsp; My Cancellations</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div onclick="window.location = 'reviews.php'" class="col-12 fs-5 fw-bold mt-4 cursor">My Reviews</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 fs-5 fw-bold pb-3">My Profile</div>
                                                                <div class="col-12 bg-white rounded rounded-3 p-4 px-lg-5" style="box-shadow: 0px 0px 10px 5px #daffcc;">

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="row">

                                                                                <?php

                                                                                $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["u"]["email"] . "'");
                                                                                $user = $user_rs->fetch_assoc();

                                                                                ?>

                                                                                <div class="col-12 col-lg-4">
                                                                                    <div class="row">
                                                                                        <div class="col-12" style="font-size: 12px;">Full Name </div>
                                                                                        <div class="col-12 mt-3" id="nameDiv"><?php echo ($user["fname"]) ?></div>
                                                                                        <div class="col-12 mt-3 d-none" id="nameInputDiv">
                                                                                            <input class="rounded-3 p-1 myProfileInput" id="name" type="text" value="<?php echo ($user["fname"]) ?>">
                                                                                        </div>
                                                                                        <div class="col-12 pe-2 mt-2 d-none" style="color: red;" id="nameErrorDiv">
                                                                                            <i class="bi bi-exclamation-circle fs-5"></i>&nbsp;<span style="color: red;" id="nameError"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                                                                                    <div class="row">
                                                                                        <div class="col-12" style="font-size: 12px;">Email</div>
                                                                                        <div class="col-12 mt-3"><?php echo ($user["email"]) ?></div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                                                                                    <div class="row">
                                                                                        <div class="col-12" style="font-size: 12px;">Password</div>
                                                                                        <div class="col-12 mt-3" id="passwordDiv">
                                                                                            <div class="row">
                                                                                                <div class="col-6">
                                                                                                    <input class="border border-0" disabled id="passwordInput1" type="password" value="<?php echo ($user["password"]) ?>" style="background-color: white;">
                                                                                                </div>
                                                                                                <div class=" col-1 btnActive cursor" id="showPassword" onclick="showPassword1();">
                                                                                                    <i class="bi bi-eye fs-5 " id="pIcon1" style="color: #FF4B2B;"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 mt-3 d-none" id="passwordInputDiv">
                                                                                            <div class="row">
                                                                                                <div class="col-8">
                                                                                                    <input class="rounded-3 p-1 myProfileInput" id="passwordInput" type="password" value="<?php echo ($user["password"]) ?>">
                                                                                                </div>
                                                                                                <div class=" col-1 btnActive cursor" id="showPassword" onclick="showPassword();">
                                                                                                    <i class="bi bi-eye fs-5 " id="pIcon" style="color: #FF4B2B;"></i>
                                                                                                </div>
                                                                                                <div class="col-12 pe-2 mt-2 d-none" style="color: red;" id="passwordErrorDiv">
                                                                                                    <i class="bi bi-exclamation-circle fs-5"></i>&nbsp;<span style="color: red;" id="passwordError"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-12 mt-5">
                                                                                    <div class="col-5 col-lg-4 d-grid" id="editBtn">
                                                                                        <button class="myButton py-2 btnActive" onclick="editProfile();">Edit Profile</button>
                                                                                    </div>
                                                                                    <div class="col-5 col-lg-4 d-grid d-none" id="saveBtn">
                                                                                        <button class="myButton btnActive" onclick="editProfileCheck();" style="background-color: #FF416C;">Save Changes</button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- body -->

                        <!-- model -->

                        <div class="modal" tabindex="-1" id="model">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">sending Verification code....</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row" id="modelBody">

                                            

                                                <!-- loading -->
                                                <div id="loading" class="loading_div ">
                                                    <div class="boxes">
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- loading -->
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model -->

                        <!-- model -->

                        <div class="modal" tabindex="-1" id="model2">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Verification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row" id="modelBody">

                                            <div class="col-12 " id="vInput">
                                                <div class="row">
                                                    <div class="col-12">Check your email</div>
                                                    <div class="col-8 mt-3 input-group mb-3">
                                                        <input type="password" id="vc" class="form-control" placeholder="Enter verification code" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-radius: 30px;">

                                                    </div>
                                                </div>

                                                
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-white" data-bs-dismiss="modal" style="background-color: #FF416C; border-radius: 20px;">Close</button>
                                        <button type="button" class="btn text-white" style="background-color: #FF4B2B; border-radius: 20px;" onclick="editProfileProccess();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model -->

                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="col-12 headerCart fw-bold fs-3 text-black">Sign In first</div>
            <?php
            }
            include "footer.php";
            ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>