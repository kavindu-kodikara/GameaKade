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

                                                                <div class="col-12 fs-5 fw-bold mt-4 cursor">My Reviews</div>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <?php
                                                            if (isset($_GET["id"])) {
                                                                $id = $_GET["id"];
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col-12 fs-5 fw-bold pb-3">New Review</div>
                                                                    <div class="col-12 bg-white rounded rounded-3 p-4 px-lg-5" style="box-shadow: 0px 0px 10px 5px #daffcc;">

                                                                        <div class="row">
                                                                            <div class="col-12 col-lg-6 offset-lg-3 offset-0 mt-4 ">
                                                                                <div class="mb-3">
                                                                                    <label for="formFile" class="form-label">Images</label>
                                                                                    <input class="form-control" type="file" id="img" multiple>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-lg-8 offset-lg-2 offset-0 mt-2">
                                                                                <div class="mb-3">
                                                                                    <label for="txt" class="form-label">Type your review</label>
                                                                                    <textarea class="form-control" id="txt" rows="5"></textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-6 col-lg-3 offset-6 offset-lg-7 d-grid">
                                                                                <button class="btn btn-primary" onclick="savereview(<?php echo ($id); ?>);">Submit</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            }

                                                            ?>
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
                                <div class="modal-content">
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
                        <div class="modal-dialog">
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