<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="overflow-x: hidden;">
    <?php
    session_start();
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            include "header.php";

            ?>

            <div class="col-12 pt-3 mt-5">
                <div class="row">
                    <div class="col-1 offset-1 d-none d-lg-block logo"></div>
                    <div class="col-12 col-lg-6 mt-4">
                        <div class="row">

                            <?php
                            $c_rs = Database::search("SELECT * FROM `category`");
                            $c_num = $c_rs->num_rows;
                            ?>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-1 rounded-end rounded-5" aria-label="Text input with dropdown button" id="basic_search_txt" placeholder="What do you want...">

                                <select class="form-select rounded-start rounded-5" style="max-width: 150px; font-family: 'sinhala';" id="basic_search_select">
                                    <option value="0" style="font-family: 'sinhala';">All categories</option>
                                    <?php
                                    for ($x = 0; $x < $c_num; $x++) {
                                        $c_data = $c_rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo ($c_data["id"]); ?>" style="font-family: 'sinhala';"><?php echo ($c_data["name"]); ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="col-4 col-lg-1 col-lg-1 offset-2 offset-lg-0 mt-lg-4  ps-5 ps-lg-0 ">
                        <button onclick="basic_search();" class="button" style="height: 35px; width: 150px; padding: 0px;">Search</button>
                    </div>
                    <div class="col-2 mt-4 ms-5 d-none d-lg-block">
                        <span><i class="bi bi-geo-alt-fill fs-4 fw-bold" style="color: #FF4B2B;"></i>&nbsp;&nbsp;<a href="https://goo.gl/maps/qxhefUNTjcMLi9qK8" class="text-decoration-none text-black fs-5 fw-bold">Locate Us</a></span>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
            </div>

            <div class="col-12 ">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 offset-0">
                        <div class="row" id="basic_search_div"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="row">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img src="resorces/carousel/img1.png" class="d-block w-100">

                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resorces/carousel/img2.png" class="d-block w-100">
                               
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resorces/carousel/img3.png" class="d-block w-100">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="resorces/carousel/img4.png" class="d-block w-100">
                                
                            </div>
                            <div class="carousel-item">
                                <img src="resorces/carousel/img5.png" class="d-block w-100">
                                
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

            <div class="col-12 mt-2 mb-5">
                <div class="row">

                    <div class="col-12 mb-5">
                        <div class="row">
                            <div class="col-6 col-lg-2 offset-lg-1" style="font-family: 'MotionPicture'; font-size: 50px;">Categorys</div>
                            <div class="col-6 col-lg-2 offset-lg-6 fs-1 mt-4 viw text-end" style="font-family: 'MotionPicture';" onclick="window.location = 'allProduct.php'" ;>View all &nbsp;&nbsp;<i class="bi bi-box-arrow-right fs-2"></i></div>
                        </div>
                    </div>

                    <div class="col-4 col-lg-1 offset-0 offset-lg-1 ctg" onclick="allProduct(1)" ;>
                        <img class="rounded-circle " src="resorces/categoryImg/fryedRice.png" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span  style="font-family: 'sinhala';font-size: 16px;">ෆ්‍රයිඩ් රයිස්</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 ctg" onclick="allProduct(2)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/kottu.jpg" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">කොත්තු</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 ctg" onclick="allProduct(6)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/milkRice.jpg" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">ගමේ කෑම</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 ctg mt-3 mt-lg-0" onclick="allProduct(4)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/pasta.png" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">මැකරෝනි</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 mt-3 mt-lg-0 ctg" onclick="allProduct(3)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/noodles.png" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">නූඩ්ල්ස්</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 mt-3 mt-lg-0 ctg" onclick="allProduct(5)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/Biryani.jpg" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">බිරියානි</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 mt-3 mt-lg-0 ctg" onclick="allProduct(7)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/shortEats.jpg" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala'; font-size: 16px;">ෂෝට් ඊට්ස්</span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-1 ms-0 ms-lg-5 mt-3 mt-lg-0 ctg" onclick="allProduct(8)" ;>
                        <img class="rounded-circle" src="resorces/categoryImg/chop.jpg" style="width: 100px; height: 100px;">
                        <div class="mt-2 text-center">
                            <span style="font-family: 'sinhala';font-size: 16px;">Special</span>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-12 pt-5 pb-5 ps-4 ps-lg-0 pe-4 pe-lg-0" style="background-color: #DBEBC9;">
                <div class="row">
                    <div class="col-12 col-lg-3 offset-0 offset-lg-1 special p-3">
                        <div class="row">
                            <div class="col-6 ps-3">
                                <h1 class="mt-2" style="font-family: Apex42;">mqxps mdgsh</h1>
                                <span class="fs-6">Your budget our Menu</span><br>
                                <a href="#" class="text-decoration-none fs-5 spTxt fw-bold">View more <i class="bi bi-caret-right-fill fs-5"></i></a>
                            </div>
                            <div class="col-6">
                                <img src="resorces/party.jpg" class="rounded-4" style="width: 145px; height: 130px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3  ms-0 ms-lg-5 special p-3 mt-lg-0 mt-4">
                        <div class="row">
                            <div class="col-6 ps-3">
                                <h1 class="mt-2" style="font-family: Apex42;">mqxps mdgsh</h1>
                                <span class="fs-6">Your budget our Menu</span><br>
                                <a href="#" class="text-decoration-none fs-5 spTxt fw-bold">View more <i class="bi bi-caret-right-fill fs-5"></i></a>
                            </div>
                            <div class="col-6">
                                <img src="resorces/party.jpg" class="rounded-4" style="width: 145px; height: 130px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3  ms-0 ms-lg-5 special p-3 mt-lg-0 mt-4">
                        <div class="row">
                            <div class="col-6 ps-3">
                                <h1 class="mt-2" style="font-family: Apex42;">mqxps mdgsh</h1>
                                <span class="fs-6">Your budget our Menu</span><br>
                                <a href="#" class="text-decoration-none fs-5 spTxt fw-bold">View more <i class="bi bi-caret-right-fill fs-5"></i></a>
                            </div>
                            <div class="col-6">
                                <img src="resorces/party.jpg" class="rounded-4" style="width: 145px; height: 130px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 mt-5 mb-4">
                        <div class="row">

                            <div class="col-12  mb-3 text-center" style="font-family: 'MotionPicture'; font-size: 50px;">Meels</div>
                            <div class="col-12 col-lg-4 offset-0 offset-lg-4 ps-lg-0 ps-4 pe-lg-0 pe-4">
                                <div class="row">
                                    <div class="col-4 col-lg-3 meel fw-bold fs-5 pt-1 pb-2 text-center bgr" id="breakfastbtn" onclick="brekfast();">Breakfast</div>
                                    <div class="col-4 col-lg-3 meel fw-bold fs-5 pt-1 pb-2 text-center ms-0 ms-lg-5" id="lunchbtn" onclick="lunch();">Lunch</div>
                                    <div class="col-4 col-lg-3 meel fw-bold fs-5 pt-1 pb-2 text-center ms-0 ms-lg-5" id="dinnerbtn" onclick="dinner();">Dinner</div>
                                </div>
                            </div>



                            <div class="col-12 mt-5">
                                <div class="row">
                                    <div class="col-12 mb-4 ">
                                        <div class="row">
                                            <div class="col-12 col-lg-2 offset-0 offset-lg-2 text-lg-start text-center" style="font-family: 'MotionPicture'; font-size: 45px;">Today Special</div>
                                            <div id="note" class="col-4 d-none d-lg-block border-start border-5 border-warning fs-6 rounded-2 p-2 pt-3 " style="background-color: #ffffe2; box-shadow: 0px 7px 10px 1px #dddddd;">Please order your Breakfast before 9.00 AM. We will deliver your order before 10.00 AM</div>
                                            <div class="col-12 col-lg-2 fs-1 viw text-center" style="font-family: 'MotionPicture';" onclick="window.location = 'allProduct.php'">View all &nbsp;&nbsp;<i class="bi bi-box-arrow-right fs-2"></i></div>

                                        </div>
                                    </div>
                                    <div id="noteMb" class="col-11 ms-3 me-2 d-block d-lg-none border-start border-5 border-warning fs-6 rounded-2 p-2 pt-3 " style="background-color: #ffffe2; box-shadow: 0px 7px 10px 1px #dddddd;">Please order your Breakfast before 9.00 AM. We will deliver your order before 10.00 AM</div>

                                    <!-- breakfast div -->

                                    <?php

                                    $breakfast_rs = Database::search("SELECT * FROM `product` INNER JOIN `today_special` ON `today_special`.`product_id`
                                    = `product`.`id` INNER JOIN `meals` ON `today_special`.`meals_id` = `meals`.`meals_id` WHERE `meals`.`meals_name` = 'breakfast'");

                                    $breakfast_num = $breakfast_rs->num_rows;



                                    ?>

                                    <div class="col-12 col-lg-11 offset-0 offset-lg-1 p-5 p-lg-0 " id="breakfastDiv">
                                        <div class="row">

                                            <?php

                                            for ($x = 0; $x < $breakfast_num; $x++) {

                                                $breakfast_data = $breakfast_rs->fetch_assoc();

                                                $pimg_rs = Database::search("SELECT * FROM `product_img` WHERE `product_img`.`product_id` = '" . $breakfast_data['id'] . "'");
                                                $pimg_data = $pimg_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 col-lg-3 ms-0 ms-lg-5 ps-0 ps-lg-5 pe-0 pe-lg-4 mt-5 mt-lg-5 animaIn">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <div class="card product rounded-5 pb-3" style="border: none;">
                                                                    <div class="row">
                                                                        <div class="col-5 col-lg-12">
                                                                            <img src="<?php echo ($pimg_data["path"]); ?>" class="card-img-top mt-3 rounded-5 meelProductImg" onclick="singleProductView(<?php echo ($p_data['id']); ?>);">
                                                                        </div>
                                                                        <div class="card-body col-7 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star fs-5"></i>
                                                                                        <div class="offset-2 col-1"><span><i clasng fs="bi bi-heart fs-4" style="color: #FF4B2B;"></i></span></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="card-title mt-1 fw-bold" style="font-size: 17px;"><?php echo ($breakfast_data["title"]); ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-5 fw-bold text-success">Rs. <?php echo ($breakfast_data["price"]); ?> .00</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-none d-lg-block mb-2 mt-3">
                                                                            <div class="col-12 d-grid fs-6"> 
                                                                                <button onclick="singleProductView(<?php echo ($breakfast_data['id']); ?>);" class="text-center pbutton">View Product</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            <?php

                                            }

                                            ?>

                                        </div>

                                    </div>

                                    <!-- breakfast div -->

                                    <!-- lunch div -->

                                    <?php

                                    $lunch_rs = Database::search("SELECT * FROM `product` INNER JOIN `today_special` ON `today_special`.`product_id`
                                    = `product`.`id` INNER JOIN `meals` ON `today_special`.`meals_id` = `meals`.`meals_id` WHERE `meals`.`meals_name` = 'lunch'");

                                    $lunch_num = $lunch_rs->num_rows;



                                    ?>

                                    <div class="col-12 col-lg-11 offset-0 offset-lg-1 p-5 p-lg-0 d-none " id="lunchDiv">
                                        <div class="row">

                                            <?php

                                            for ($x = 0; $x < $lunch_num; $x++) {

                                                $lunch_data = $lunch_rs->fetch_assoc();

                                                $lunch_pimg_rs = Database::search("SELECT * FROM `product_img` WHERE `product_img`.`product_id` = '" . $lunch_data['id'] . "'");
                                                $lunch_pimg_data = $lunch_pimg_rs->fetch_assoc();

                                            ?>

                                                <div class="col-12 col-lg-3 ms-0 ms-lg-5 ps-0 ps-lg-5 pe-0 pe-lg-4 mt-5 mt-lg-5 animaIn">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <div class="card product rounded-5 pb-3" style="border: none;">
                                                                    <div class="row">
                                                                        <div class="col-5 col-lg-12">
                                                                            <img src="<?php echo ($lunch_pimg_data["path"]); ?>" class="card-img-top mt-3 rounded-5 meelProductImg" onclick="singleProductView(<?php echo ($p_data['id']); ?>);">
                                                                        </div>
                                                                        <div class="card-body col-7 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star fs-5"></i>
                                                                                        <div class="offset-2 col-1"><span><i clasng fs="bi bi-heart fs-4" style="color: #FF4B2B;"></i></span></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="card-title mt-1 fw-bold" style="font-size: 17px;"><?php echo ($lunch_data["title"]); ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-5 fw-bold text-success">Rs. <?php echo ($lunch_data["price"]); ?> .00</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-none d-lg-block mb-2 mt-3">
                                                                            <div class="col-12 d-grid fs-6"> 
                                                                                <button onclick="singleProductView(<?php echo ($lunch_data['id']); ?>);" class="text-center pbutton">View Product</button></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php

                                            }

                                            ?>



                                        </div>

                                    </div>
                                    <!-- lunch div -->

                                    <!-- dinner div -->

                                    <?php

                                    $dinner_rs = Database::search("SELECT * FROM `product` INNER JOIN `today_special` ON `today_special`.`product_id`
                                    = `product`.`id` INNER JOIN `meals` ON `today_special`.`meals_id` = `meals`.`meals_id` WHERE `meals`.`meals_name` = 'dinner'");

                                    $dinner_num = $dinner_rs->num_rows;



                                    ?>


                                    <div class="col-12 col-lg-11 offset-0 offset-lg-1 p-5 p-lg-0 d-none " id="dinnerDiv">
                                        <div class="row">

                                            <?php

                                            for ($x = 0; $x < $dinner_num; $x++) {

                                                $dinner_data = $dinner_rs->fetch_assoc();

                                                $dinner_pimg_rs = Database::search("SELECT * FROM `product_img` WHERE `product_img`.`product_id` = '" . $dinner_data['id'] . "'");
                                                $dinner_pimg_data = $dinner_pimg_rs->fetch_assoc();

                                            ?>

                                                <div class="col-12 col-lg-3 ms-0 ms-lg-5 ps-0 ps-lg-5 pe-0 pe-lg-4 mt-5 mt-lg-5 animaIn">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <div class="card product rounded-5 pb-3" style="border: none;">
                                                                    <div class="row">
                                                                        <div class="col-5 col-lg-12">
                                                                            <img src="<?php echo ($dinner_pimg_data["path"]); ?>" class="card-img-top mt-3 rounded-5 meelProductImg" onclick="singleProductView(<?php echo ($p_data['id']); ?>);">
                                                                        </div>
                                                                        <div class="card-body col-7 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="row">
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star-fill text-warning fs-5"></i>
                                                                                        <i class="col-1 bi bi-star fs-5"></i>
                                                                                        <div class="offset-2 col-1"><span><i clasng fs="bi bi-heart fs-4" style="color: #FF4B2B;"></i></span></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="card-title mt-1 fw-bold" style="font-size: 17px;"><?php echo ($dinner_data["title"]); ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-5 fw-bold text-success">Rs. <?php echo ($dinner_data["price"]); ?> .00</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-none d-lg-block mb-2 mt-3">
                                                                            <div class="col-12 d-grid fs-6"> <button onclick="singleProductView(<?php echo ($dinner_data['id']); ?>);" class="text-center pbutton">View Product</button></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php

                                            }

                                            ?>



                                        </div>

                                    </div>

                                    <!-- dinner div -->

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

          

            <?php include "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>