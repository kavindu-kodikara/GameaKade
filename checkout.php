<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: rgb(231, 255, 222);">

    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            session_start();
            include "header.php";
            if (isset($_SESSION["u"])) {
            ?>

                <div class="col-12 ">
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

                        <div class="col-12 col-lg-7 offset-lg-1 pt-4 ps-4 ps-lg-5 pe-4">
                            <div class="row">
                                <div class="col-12 rounded rounded-3 bg-white p-4" style="box-shadow: 0px 0px 10px 5px rgb(220, 255, 208);">
                                    <?php

                                    $a_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
                                    INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' 
                                            AND `default` = '1' AND `status` = '1' ");

                                    if ($a_rs->num_rows > 0) {
                                        $a_data = $a_rs->fetch_assoc();
                                    ?>
                                        <div class="row">
                                            <div class="col-12">
                                                Deliver to : <span class="text-black-50"><?php echo ($a_data["fname"] . " " . $a_data["lname"]); ?></span>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <span class="text-black-50"><?php echo ($a_data["mobile"] . " | " . $a_data["address"] . " , " . $a_data["city_name"] . " , " . $a_data["district_name"] . " , " . $a_data["province_name"]); ?></span>&nbsp;
                                                <span class="cursor"><a onclick="chandeDilivaryAddress();" class="text-decoration-none">Change</a></span>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <span>Email to : </span><span class="text-black-50"><?php echo ($_SESSION["u"]["email"]); ?></span>
                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="text-center">You dont have a valid Address. <a href="http://localhost/GameaKade/addressBook.php"> +Add new Address</a></div>
                                        <?php
                                    }



                                    ?>


                                </div>



                                <!-- product -->

                                <div class="col-12 mt-3 rounded rounded-3 bg-white p-3" style="box-shadow: 0px 0px 10px 5px rgb(220, 255, 208);">
                                    <div class="row">



                                        <div class="col-12 ps-5 pe-5">
                                            <div class="row">

                                                <div class="col-12  mt-2">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-4">
                                                            <span class="fs-5 fw-bold"> Select Deliver Time </span>&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <div class="col-12 col-lg-8 d-none" id="timeError">
                                                            <span class="fw-bold" style="color: red;"><i class="bi bi-exclamation-diamond-fill"></i> Please Select deliver time &nbsp;<i class="bi bi-arrow-down fs-4"></i></span>
                                                        </div>

                                                    </div>
                                                </div>

                                                <?php

                                                $brfst_rs = Database::search("SELECT * FROM `delever_time` WHERE `id` = '1'");
                                                $brfst_data = $brfst_rs->fetch_assoc();


                                                date_default_timezone_set("Asia/Colombo");
                                                $current_time_brfst = date("H:i:s");

                                                if ($current_time_brfst < $brfst_data["start_time"]) {
                                                ?>
                                                    <div class="col-12 col-lg-4 p-4  ps-lg-2" onclick="selectTime('1');">
                                                    <?php
                                                } else {
                                                    ?>
                                                        <div class="col-12 col-lg-4 p-4  ps-lg-2" style="opacity: 40%;">
                                                        <?php
                                                    }

                                                    $rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '" . $_SESSION["uniq_id"] . "'");
                                                    $data = $rs->fetch_assoc();



                                                        ?>


                                                        <div class="row">

                                                            <?php

                                                            if (!empty($data["delever_time_id"])) {
                                                                if ($data["delever_time_id"] == 1) {
                                                            ?>
                                                                    <div class="col-12 timeDivSelected rounded-3 p-2 ps-3">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                        <div class="col-12 timeDiv rounded-3 p-2 ps-3">
                                                                        <?php
                                                                    }
                                                                } else {
                                                                        ?>
                                                                        <div class="col-12 timeDiv rounded-3 p-2 ps-3">
                                                                        <?php
                                                                    }

                                                                        ?>




                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <span class="fw-bold"><?php echo ($brfst_data["name"]) ?></span>
                                                                                <span>| Receive by</span>
                                                                            </div>
                                                                            <?php

                                                                            if (!empty($data["delever_time_id"])) {
                                                                                if ($data["delever_time_id"] == 1) {
                                                                            ?>
                                                                                    <div class="col-1" id="timeCheckB">
                                                                                        <i class="bi bi-check-circle-fill" style="color: #FF4B2B;"></i>
                                                                                    </div>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <div class="col-1" id="timeCheckB">

                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                            } else {
                                                                                ?>
                                                                                <div class="col-1" id="timeCheckB">

                                                                                </div>
                                                                            <?php
                                                                            }

                                                                            ?>


                                                                            <div class="col-12 mt-1">
                                                                                <span><?php echo ($brfst_data["start_time"] . " - " . $brfst_data["end_time"]) ?></span>
                                                                            </div>
                                                                        </div>



                                                                        </div>

                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                    $lnc_rs = Database::search("SELECT * FROM `delever_time` WHERE `id` = '2'");
                                                                    $lnc_data = $lnc_rs->fetch_assoc();

                                                                    date_default_timezone_set("Asia/Colombo");
                                                                    $current_time_lnc = date("H:i:s");

                                                                    if ($current_time_lnc < $lnc_data["start_time"]) {
                                                                    ?>
                                                                        <div class="col-12 col-lg-4 p-4 pt-lg-4 pt-0" onclick="selectTime('2');">
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                            <div class="col-12 col-lg-4 p-4 pt-lg-4 pt-0" style="opacity: 40%;">
                                                                            <?php
                                                                        }

                                                                            ?>


                                                                            <div class="row">
                                                                                <?php

                                                                                if (!empty($data["delever_time_id"])) {
                                                                                    if ($data["delever_time_id"] == 2) {
                                                                                ?>
                                                                                        <div class="col-12 timeDivSelected rounded-3 p-2 ps-3" id="timeDivL">
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                            <div class="col-12 timeDiv rounded-3 p-2 ps-3" id="timeDivL">
                                                                                            <?php
                                                                                        }
                                                                                    } else {
                                                                                            ?>
                                                                                            <div class="col-12 timeDiv rounded-3 p-2 ps-3" id="timeDivL">
                                                                                            <?php
                                                                                        }

                                                                                            ?>





                                                                                            <div class="row">
                                                                                                <div class="col-10">
                                                                                                    <span class="fw-bold"><?php echo ($lnc_data["name"]) ?></span>
                                                                                                    <span>| Receive by</span>
                                                                                                </div>
                                                                                                <?php

                                                                                                if (!empty($data["delever_time_id"])) {
                                                                                                    if ($data["delever_time_id"] == 2) {
                                                                                                ?>
                                                                                                        <div class="col-1" id="timeCheckB">
                                                                                                            <i class="bi bi-check-circle-fill" style="color: #FF4B2B;"></i>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <div class="col-1" id="timeCheckB">

                                                                                                        </div>
                                                                                                    <?php
                                                                                                    }
                                                                                                } else {
                                                                                                    ?>
                                                                                                    <div class="col-1" id="timeCheckB">

                                                                                                    </div>
                                                                                                <?php
                                                                                                }

                                                                                                ?>
                                                                                                <div class="col-12 mt-1">
                                                                                                    <span><?php echo ($lnc_data["start_time"] . " - " . $lnc_data["end_time"]) ?></span>
                                                                                                </div>
                                                                                            </div>

                                                                                            </div>

                                                                                            </div>
                                                                                        </div>

                                                                                        <?php
                                                                                        $dnnr_rs = Database::search("SELECT * FROM `delever_time` WHERE `id` = '3'");
                                                                                        $dnnr_data = $dnnr_rs->fetch_assoc();

                                                                                        date_default_timezone_set("Asia/Colombo");
                                                                                        $current_time_dnnr = date("H:i:s");

                                                                                        if ($current_time_dnnr < $dnnr_data["start_time"]) {
                                                                                        ?>
                                                                                            <div class="col-12 col-lg-4 p-4 pt-lg-4 pt-0" onclick="selectTime('3');">
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                                <div class="col-12 col-lg-4 p-4 pt-lg-4 pt-0" style="opacity: 40%;">
                                                                                                <?php
                                                                                            }

                                                                                                ?>


                                                                                                <div class="row">
                                                                                                    <?php

                                                                                                    if (!empty($data["delever_time_id"])) {
                                                                                                        if ($data["delever_time_id"] == 3) {
                                                                                                    ?>
                                                                                                            <div class="col-12 timeDivSelected rounded-3 p-2 ps-3" id="timeDivL">
                                                                                                            <?php
                                                                                                        } else {
                                                                                                            ?>
                                                                                                                <div class="col-12 timeDiv rounded-3 p-2 ps-3" id="timeDivL">
                                                                                                                <?php
                                                                                                            }
                                                                                                        } else {
                                                                                                                ?>
                                                                                                                <div class="col-12 timeDiv rounded-3 p-2 ps-3" id="timeDivL">
                                                                                                                <?php
                                                                                                            }

                                                                                                                ?>


                                                                                                                <div class="row">
                                                                                                                    <div class="col-10">
                                                                                                                        <span class="fw-bold"><?php echo ($dnnr_data["name"]) ?></span>
                                                                                                                        <span>| Receive by</span>
                                                                                                                    </div>
                                                                                                                    <?php

                                                                                                                    if (!empty($data["delever_time_id"])) {
                                                                                                                        if ($data["delever_time_id"] == 3) {
                                                                                                                    ?>
                                                                                                                            <div class="col-1" id="timeCheckB">
                                                                                                                                <i class="bi bi-check-circle-fill" style="color: #FF4B2B;"></i>
                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        } else {
                                                                                                                        ?>
                                                                                                                            <div class="col-1" id="timeCheckB">

                                                                                                                            </div>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        ?>
                                                                                                                        <div class="col-1" id="timeCheckB">

                                                                                                                        </div>
                                                                                                                    <?php
                                                                                                                    }

                                                                                                                    ?>


                                                                                                                    <div class="col-12 mt-1">
                                                                                                                        <span><?php echo ($dnnr_data["start_time"] . " - " . $dnnr_data["end_time"]) ?></span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <?php
                                                                                            $subTot = 0;
                                                                                            $c_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_has_invoice` 
                                                                                            ON `product_has_invoice`.`product_id` = `product`.`id` INNER JOIN `invoice`
                                                                                            ON `invoice`.`invoice_id` = `product_has_invoice`.`invoice_invoice_id`
                                                                                            WHERE `invoice`.`user_email` = '" . $_SESSION["u"]["email"] . "' AND `invoice`.`uniq_id` = '" . $_SESSION["uniq_id"] . "'");
                                                                                            $c_num = $c_rs->num_rows;

                                                                                            for ($x = 0; $x < $c_num; $x++) {
                                                                                                $c_data = $c_rs->fetch_assoc();

                                                                                            ?>
                                                                                                <div class="col-12">
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <div class="col-12 mt-3">
                                                                                                    <div class="row">

                                                                                                        <div class="col-4 col-lg-3">
                                                                                                            <div class="row">
                                                                                                                <?php


                                                                                                                $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $c_data["product_id"] . "'");
                                                                                                                $p_data = $p_rs->fetch_assoc();


                                                                                                                ?>
                                                                                                                <div class="col-7 col-lg-9 ms-lg-2">
                                                                                                                    <?php
                                                                                                                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $p_data["id"] . "'");
                                                                                                                    $img_data = $img_rs->fetch_assoc();
                                                                                                                    ?>
                                                                                                                    <img onclick="singleProductView(<?php echo ($p_data['id']); ?>);" class="round rounded-3 cartProductImg" src="<?php echo ($img_data["path"]); ?>">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>



                                                                                                        <div class="col-4 col-lg-3">
                                                                                                            <div class="mt-lg-2">
                                                                                                                <span class="fw-bold text-uppercase"><?php echo ($p_data["title"]); ?></span><br>
                                                                                                                <?php
                                                                                                                if ($c_data["size"] == 1) {
                                                                                                                ?>
                                                                                                                    <span>SIZE :- Half</span><br>

                                                                                                                <?php
                                                                                                                } elseif ($c_data["size"] == 2) {
                                                                                                                ?>
                                                                                                                    <span>SIZE :- Full</span><br>
                                                                                                                <?php
                                                                                                                } else {
                                                                                                                }

                                                                                                                $ctgry = Database::search("SELECT * FROM `category` WHERE `id` = '" . $p_data["category_id"] . "'");
                                                                                                                $ctgry_data = $ctgry->fetch_assoc();
                                                                                                                ?>
                                                                                                                <span class="text-black-50 fw-bold d-none d-lg-block"><?php echo ($ctgry_data["name"]); ?></span>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-4 col-lg-6">
                                                                                                            <div class="row">

                                                                                                                <div class="col-12 mt-2 mt-lg-4">
                                                                                                                    <div class="row">

                                                                                                                        <div class="col-12 col-lg-6 ">
                                                                                                                            <span>Qty :- 0<?php echo ($c_data["qty"]) ?></span>
                                                                                                                        </div>
                                                                                                                        <div class="col-12 col-lg-6">
                                                                                                                            <span class="fw-bold" style="color: #FF4B2B;">Rs. <?php echo ($c_data["single_product_price"]); ?> .00</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <?php
                                                                                                        $product_has_invoice_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $c_data["invoice_id"] . "' AND `product_id` = '" . $c_data["id"] . "'");
                                                                                                        $product_has_invoice = $product_has_invoice_rs->fetch_assoc();
                                                                                                        $adFood_rs = Database::search("SELECT * FROM `product_has_invoice_has_additional_food` WHERE `product_has_invoice_product_has_invoice_id` = '" . $product_has_invoice["product_has_invoice_id"] . "'");

                                                                                                        if ($adFood_rs->num_rows > 0) {
                                                                                                        ?>
                                                                                                            <div class="col-12 mt-3 ps-4">

                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 center mb-3">
                                                                                                                        <h5 style="font-family: 'sinhala';">Additional Food</h5>
                                                                                                                    </div>

                                                                                                                    <?php
                                                                                                                    for ($a = 0; $a < $adFood_rs->num_rows; $a++) {
                                                                                                                        $adFood_data = $adFood_rs->fetch_assoc();

                                                                                                                        $adf_rs = Database::search("SELECT * FROM `additional_food` WHERE `id` = '" . $adFood_data["additional_food_id"] . "'");
                                                                                                                        $adf = $adf_rs->fetch_assoc();

                                                                                                                    ?>
                                                                                                                        <div class="fs-6 col-6 col-lg-4" style="font-family: 'sinhala';"><i class="bi bi-egg-fill " style="color: #ff7b3c;"></i>&nbsp;<?php echo ($adf["name"]); ?></div>
                                                                                                                    <?php
                                                                                                                    }
                                                                                                                    ?>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>



                                                                                                    </div>
                                                                                                </div>

                                                                                            <?php

                                                                                            }
                                                                                            ?>
                                                                                            <div class="col-12">
                                                                                                <hr>
                                                                                            </div>
                                                                            </div>





                                                                            <!-- product -->

                                                                            </div>

                                                                        </div>

                                                                        <!-- checkout -->

                                                                        <div class="col-12 col-lg-3 pt-4 ps-4 ps-lg-4 pe-4 pe-lg-5">
                                                                            <div class="row">
                                                                                <div class="col-12 bg-white p-3 checkoutShadow">

                                                                                    <div class="row">
                                                                                        <div class="col-12  fs-5 text-uppercase">Order Summary</div>
                                                                                        <div class="col-12 mt-2 mt-lg-3">
                                                                                            <div class="row">
                                                                                                <div class="col-6">SubTotal</div>
                                                                                                <?php
                                                                                                $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
                                                                                                $df_data = $df_rs->fetch_assoc();

                                                                                                $i_rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '" . $_SESSION["uniq_id"] . "'");
                                                                                                $i_data = $i_rs->fetch_assoc();

                                                                                                $deliver_fee = $df_data["price"];
                                                                                                $tot = 0;
                                                                                                $subTot = $i_data["total"] - $deliver_fee;
                                                                                                $tot = $i_data["total"];

                                                                                                ?>
                                                                                                <div class="col-6 text-end">Rs. <?php echo ($subTot); ?> .00</div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <?php


                                                                                        ?>

                                                                                        <div class="col-12 mt-3">
                                                                                            <div class="row">
                                                                                                <div class="col-6">Shipping Fee</div>
                                                                                                <div class="col-6 text-end">Rs. <?php echo ($deliver_fee); ?> .00</div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 ">
                                                                                            <hr>
                                                                                        </div>
                                                                                        <div class="col-12 ">
                                                                                            <div class="row">
                                                                                                <div class="col-6">Total</div>
                                                                                                <div class="col-6 text-end">Rs. <?php echo ($tot); ?> .00</div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 d-none d-lg-block d-grid d-lg-grid mt-3">
                                                                                            <button class="text-uppercase pbutton" onclick="paymentModel();">make payment</button>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- checkout -->

                                                                        <div class="col-12 pt-4 ps-4 ps-lg-4 pe-4 pe-lg-5 payDiv">
                                                                            <div class="row">
                                                                                <div class="col-12 bg-white p-3 pdiv ">
                                                                                    <div class="row">
                                                                                        <div class="col-7 mt-2">
                                                                                            Total : Rs. <?php echo ($tot); ?> .00
                                                                                        </div>
                                                                                        <div class="col-5 d-grid">
                                                                                            <button class="text-uppercase pbutton" onclick="paymentModel();">pay</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                        </div>
                                                        </div>

                                                        <!-- model -->

                                                        <div class="modal" tabindex="-1" id="model">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div id="modelDiv">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title fw-bold">Select Payment Method</h5>
                                                                            <button type="button" class="btn-close" onclick="window.location.reload();" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="row">

                                                                                <div class="col-12  fs-5 text-uppercase">Order Summary</div>
                                                                                <div class="col-12 mt-2 mt-lg-3">
                                                                                    <div class="row">
                                                                                        <div class="col-6">SubTotal</div>
                                                                                        <div class="col-6 text-end">Rs. <?php echo ($subTot); ?> .00</div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 mt-3">
                                                                                    <div class="row">
                                                                                        <div class="col-6">Shipping Fee</div>
                                                                                        <div class="col-6 text-end">Rs. <?php echo ($deliver_fee); ?> .00</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 ">
                                                                                    <hr>
                                                                                </div>
                                                                                <div class="col-12 ">
                                                                                    <div class="row">
                                                                                        <div class="col-6">Total</div>
                                                                                        <div class="col-6 text-end">Rs. <?php echo ($tot); ?> .00</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <hr>
                                                                                    <hr>
                                                                                </div>
                                                                                <?php



                                                                                if (!empty($data["delever_time_id"])) {
                                                                                    $t_rs = Database::search("SELECT * FROM `delever_time` WHERE `id` = '" . $data["delever_time_id"] . "'");
                                                                                    $t_data = $t_rs->fetch_assoc();

                                                                                ?>
                                                                                    <div class="col-4  mt-2 mb-2 fw-bold">
                                                                                        Deliver Time
                                                                                    </div>
                                                                                    <div class="col-8  mt-2 mb-2 fw-bold text-end">
                                                                                        <?php echo ($t_data["name"] . " :- " . $t_data["start_time"] . " - " . $t_data["end_time"]) ?>
                                                                                    </div>

                                                                                    <div class="col-10 col-lg-8 offset-1 offset-lg-2">
                                                                                        <div class="row">
                                                                                            <div class="col-6 p-3">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 payMentMethod rounded-3 border border-4  pt-4 pb-4 " onclick="cardPayment();">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 center">
                                                                                                                <i class="bi bi-credit-card-2-back fs-2"></i>
                                                                                                            </div>
                                                                                                            <div class="col-12 center ">
                                                                                                                Credit/Debit Card
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6 p-3">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 payMentMethod rounded-3 border border-4  pt-4 pb-4 " onclick="cashOnDelivery();">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 center">
                                                                                                                <i class="bi bi-cash-stack fs-2"></i>
                                                                                                            </div>
                                                                                                            <div class="col-12 center ">
                                                                                                                Cash on Delivery
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <div class="col-12 center fw-bold">
                                                                                        Please Select Deliver time First &nbsp;&nbsp;
                                                                                        <button class="btn btn-danger" onclick="window.location.reload();">Ok</button>
                                                                                    </div>
                                                                                <?php
                                                                                }

                                                                                ?>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn text-white " onclick="window.location.reload();" style="background-color: #FF416C; border-radius: 20px;">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- model -->

                                                        <!-- addressModal -->

                                                        <div class="modal" tabindex="-1" id="addressModal">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div>
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title fw-bold">Select Payment Method</h5>
                                                                            <button type="button" class="btn-close" onclick="window.location.reload();" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="row">

                                                                                <!-- components -->

                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">

                                                                                            <?php
                                                                                            $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
                                                                            INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

                                                                                            $address_num = $address_rs->num_rows;

                                                                                            for ($y = 0; $y < $address_num; $y++) {
                                                                                                $address_data = $address_rs->fetch_assoc();

                                                                                            ?>
                                                                                                <div class="col-12 p-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-1 center">
                                                                                                            <div class="form-check">
                                                                                                                <?php
                                                                                                                if ($address_data["default"] == 1) {
                                                                                                                ?>
                                                                                                                    <input class="form-check-input cursor" type="radio" name="address" checked>
                                                                                                                <?php
                                                                                                                } else {
                                                                                                                ?>
                                                                                                                    <input class="form-check-input cursor" onclick="setAsDefultAddress(<?php echo ($address_data['address_id']); ?>);" type="radio" name="address">
                                                                                                                <?php
                                                                                                                }
                                                                                                                ?>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-11 border border-1 rounded-4 p-3">
                                                                                                            <div class="row">
                                                                                                                <div class="col-9"><?php echo ($address_data["fname"] . " " . $address_data["lname"]); ?></div>
                                                                                                                <div class="col-12 mt-2"><?php echo ($address_data["mobile"]); ?></div>
                                                                                                                <div class="col-12 mt-2">
                                                                                                                    <?php
                                                                                                                    if ($address_data["city_city_id"] != 5) {
                                                                                                                        $city_name = $address_data["city_name"];
                                                                                                                    } else {
                                                                                                                        $city_name = "";
                                                                                                                    }
                                                                                                                    echo ($address_data["address"] . ", " . $city_name . "  " . $address_data["district_name"] . ", " . $address_data["province_name"]);
                                                                                                                    ?>
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
                                                                                </div>

                                                                                <!-- components -->


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn text-white " onclick="window.location.reload();" style="background-color: #FF416C; border-radius: 20px;">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- addressModal -->

                                                        <!-- model -->

                                                        <div class="modal" tabindex="-1" id="model2">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-bold">sending Verification code....</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row" id="modelBody2">



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
                                        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>