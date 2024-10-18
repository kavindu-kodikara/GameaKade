<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders | ගමේ කඩේ</title>
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

                if (isset($_GET["id"])) {

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

                                    <div class="col-10 offset-1 mt-4 ">
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

                                                                            <div class="col-12 fs-5 fw-bold cursor" onclick="window.location = 'manageMyAccount.php'">Manage My Account</div>
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

                                                                    <div class="col-12 fs-5 fw-bold mt-4 cursor" onclick="window.location = 'recentOrder.php'" style="color: #FF4B2B;">My Orders</div>
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

                                                                    <div  class="col-12 fs-5 fw-bold mt-4 cursor">My Reviews</div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12 col-lg-9">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-6 fs-5 fw-bold pb-3">Manage Order</div>

                                                                    <?php
                                                                    $id = $_GET["id"];

                                                                    $selected_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id` = '" . $id . "'");

                                                                    $selected_data = $selected_rs->fetch_assoc();



                                                                    ?>

                                                                    <!-- components -->
                                                                    <div class="col-12 bg-white rounded rounded-3 p-4 pt-3 py-2 mb-3" style="box-shadow: 0px 0px 10px 5px #daffcc;">

                                                                        <div class="row">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-lg-9">
                                                                                        <div class="row">
                                                                                            <div class="col-12">Order <span class="text-primary">#00<?php echo ($selected_data["invoice_id"]); ?></span></div>
                                                                                            <?php
                                                                                            $dateTime = date("Y M d - h:i a", strtotime($selected_data["date"]));
                                                                                            ?>
                                                                                            <div class="col-12">Placed on :- <?php echo ($dateTime); ?></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-3 fs-5 d-lg-block d-none center text-end">Total = Rs. <?php echo ($selected_data["total"]); ?> .00</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <hr>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <div class="row">

                                                                                    <div class="col-8 col-lg-4 centerVertical">
                                                                                        <?php
                                                                                        if ($selected_data["payment_method_id"] == 1) {
                                                                                        ?>
                                                                                            <i class="bi bi-cash-stack fs-3"></i>&nbsp;&nbsp;Cash on delivery
                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <i class="bi bi-credit-card-2-back fs-3"></i>&nbsp;&nbsp;<span class="d-none d-lg-block">Payed by Credit/Debit card</span><span class="d-block d-lg-none">Credit/Debit card</span>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>

                                                                                    <?php
                                                                                    if ($selected_data["order_ status_idorder_ status_id"] == 1) {
                                                                                    ?>
                                                                                        <div class="col-4 col-lg-2 offset-0 offset-lg-6">
                                                                                            <div onclick="cancelOrder(<?php echo ($selected_data['invoice_id']); ?>);" class="cursor btnActive rounded-4 p-1 px-3 text-center text-white fw-bold" style="background-color: #cecece;">Cancel</div>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 p-5 px-0 px-lg-5">
                                                                                <div class="row">

                                                                                    <div class="col-12 col-lg-10 offset-lg-1 offset-0 ">
                                                                                        <div class="row">

                                                                                            <div class="col-12 px-5">
                                                                                                <div class="progress">
                                                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" <?php
                                                                                                                                                                                                                                                                                            if ($selected_data["order_ status_idorder_ status_id"] == 1) {
                                                                                                                                                                                                                                                                                            ?> style="width: 3%" <?php
                                                                                                                                                                                                                                                                                                                } elseif ($selected_data["order_ status_idorder_ status_id"] == 2) {
                                                                                                                                                                                                                                                                                                                    ?> style="width: 50%" <?php
                                                                                                                                                                                                                                                                                                                                        } elseif ($selected_data["order_ status_idorder_ status_id"] == 4) {
                                                                                                                                                                                                                                                                                                                                            ?> style="width: 100%" <?php
                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                    ?>></div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <div class="row">
                                                                                                    <div class="col-4 text-start text-warning fw-bold">Pending</div>
                                                                                                    <div class="col-4 text-center text-success fw-bold">Conformed</div>
                                                                                                    <div class="col-4 text-end text-primary fw-bold">Dileverd</div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 mt-3">
                                                                                <div class="row">

                                                                                    <?php

                                                                                    $p_rs = Database::search("SELECT * FROM `product_has_invoice` INNER JOIN `product` ON `product`.`id` = `product_has_invoice`.`product_id`
                                                                                    INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id` INNER JOIN `invoice` 
                                                                                    ON `product_has_invoice`.`invoice_invoice_id` =  `invoice`.`invoice_id` WHERE `product_has_invoice`.`invoice_invoice_id` = '" . $id . "' 
                                                                                    AND `invoice`.`order_ status_idorder_ status_id` != '3'");

                                                                                    for ($y = 0; $y < $p_rs->num_rows; $y++) {
                                                                                        $p_data = $p_rs->fetch_assoc();

                                                                                    ?>
                                                                                        <!-- Tbody -->

                                                                                        <div class="col-12 pb-3 mb-3">
                                                                                            <div class="row">
                                                                                                <div class="col-6 col-lg-2  center ">
                                                                                                    <img src="<?php echo ($p_data["path"]); ?>" style="height: 70px; width: 80px; border-radius: 10px;">
                                                                                                </div>
                                                                                                <div class="col-6 col-lg-3 centerVertical col-lg-3 px-4 ps-0 "><?php echo ($p_data["title"]); ?></div>

                                                                                                <div class="col-4 col-lg-2 pt-3 pt-lg-0 center">qty :- <?php echo ($p_data["qty"]); ?></div>
                                                                                                <div class="col-5 col-lg-2 pt-3 pt-lg-0 centerVertical " style="justify-content: flex-end;">Rs. <?php echo ($p_data["single_product_price"]); ?> .00</div>
                                                                                                <div class="col-3 col-lg-3 pt-3 pt-lg-0 centerVertical" style="justify-content: flex-end;">
                                                                                                    <a class="text-decoration-none" href="addNewRevew.php?id=<?php echo($p_data["product_id"]); ?>"><span class="d-none d-lg-block">WRITE A REVIEW</span><span class="d-lg-none d-block">REVIEW</span></a>
                                                                                                </div>

                                                                                                <?php
                                                                                                $product_has_invoice_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $id . "'AND `product_id` = '" . $p_data["product_id"] . "'");
                                                                                                $product_has_invoice = $product_has_invoice_rs->fetch_assoc();
                                                                                                $adFood_rs = Database::search("SELECT * FROM `product_has_invoice_has_additional_food` WHERE `product_has_invoice_product_has_invoice_id` = '" . $product_has_invoice["product_has_invoice_id"] . "'");

                                                                                                if ($adFood_rs->num_rows > 0) {
                                                                                                ?>
                                                                                                    <div class="col-12 mt-3 ps-4">

                                                                                                        <div class="row">

                                                                                                            <div class="col-12 fs-5 fw-bold mb-3 center" style="font-family: 'sinhala';">Additional Food</div>

                                                                                                            <?php
                                                                                                            for ($a = 0; $a < $adFood_rs->num_rows; $a++) {
                                                                                                                $adFood_data = $adFood_rs->fetch_assoc();

                                                                                                                $adf_rs = Database::search("SELECT * FROM `additional_food` WHERE `id` = '" . $adFood_data["additional_food_id"] . "'");
                                                                                                                $adf = $adf_rs->fetch_assoc();

                                                                                                            ?>
                                                                                                                <div class="fs-6 col-lg-4 col-6" style="font-family: 'sinhala';"><i class="bi bi-egg-fill " style="color: #ff7b3c;"></i>&nbsp;<?php echo ($adf["name"]); ?></div>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                <?php
                                                                                                }
                                                                                                ?>


                                                                                            </div>
                                                                                            <?php
                                                                                            if ($p_rs->num_rows > 1) {
                                                                                            ?>
                                                                                                <div class="d-block d-lg-none">
                                                                                                    <hr>
                                                                                                </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>


                                                                                        <!-- Tbody -->
                                                                                    <?php

                                                                                    }

                                                                                    ?>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- components -->


                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-12 pe-lg-4 col-lg-6 mt-4 mt-lg-0">
                                                                                <div class="row">
                                                                                    <div class="col-12 bg-white rounded-4 p-4" style="height: 200px; box-shadow: 0px 0px 10px 5px #daffcc;">
                                                                                        <div class="row">

                                                                                            <?php

                                                                                            $a_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
                                                                                                INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` 
                                                                                                WHERE `address`.`address_id` = '" . $selected_data["address_address_id"] . "'");
                                                                                            $a_num = $a_rs->num_rows;

                                                                                            if ($a_num > 0) {
                                                                                                $a_data = $a_rs->fetch_assoc();

                                                                                            ?>
                                                                                                <div class="col-12 mb-3">
                                                                                                    <span style="font-size: 17px;">Shipping Address</span>
                                                                                                </div>
                                                                                                <div class="col-12 fw-bold"><?php echo ($a_data["fname"] . " " . $a_data["lname"]); ?></div>
                                                                                                <div class="col-12 mt-1"><?php echo ($a_data["mobile"] . " | " . $a_data["address"] . " , " . $a_data["city_name"] . " , " . $a_data["district_name"] . " , " . $a_data["province_name"]); ?></div>
                                                                                            <?php
                                                                                            }


                                                                                            ?>


                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 ps-lg-4 col-lg-6 mt-4 mt-lg-0">
                                                                                <div class="row">
                                                                                    <div class="col-12 bg-white rounded-4 p-4" style="height: 200px; box-shadow: 0px 0px 10px 5px #daffcc;">
                                                                                        <div class="row">
                                                                                            <div class="col-12  fs-5 text-uppercase">Order Summary</div>
                                                                                            <div class="col-12 mt-2 mt-lg-3">
                                                                                                <div class="row">
                                                                                                    <div class="col-6">SubTotal</div>
                                                                                                    <?php
                                                                                                    $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
                                                                                                    $df_data = $df_rs->fetch_assoc();

                                                                                                    $i_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id` = '" . $selected_data["invoice_id"] . "'");
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
                                                                                            <div class="col-12">
                                                                                                <hr>
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
                            </div>

                            <!-- body -->





                        </div>
                    </div>


            <?php
                } else {
                    header("Location:recentOrder.php");
                }
            } else {
                header("Location:index.php");
            }
            include "footer.php";
            ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>