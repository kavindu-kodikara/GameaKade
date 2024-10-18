<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | ගමේ කඩේ</title>
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

                <div class="col-12">
                    <div class="row">

                        <!-- hader -->
                        <div class="col-12 pt-3 mt-5 bg-white">
                            <div class="row">
                                <div class="col-1 offset-1 d-none d-lg-block logo" onclick="window.location='index.php'"></div>
                                <div class="col-8 col-lg-6 mt-4">
                                    <div class="row">



                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border-1 rounded-5" aria-label="Text input with dropdown button" id="basic_search_txt" placeholder="&nbsp;search in Cart">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 col-lg-1 mt-4">
                                    <button onclick="cart_search();" class="button" style="height: 35px; width: 100px; padding: 0px;">Search</button>
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

                        <!-- body -->

                        <div class="col-12 col-lg-7 offset-lg-1 pt-4 ps-4 ps-lg-5 pe-4">
                            <div class="row">



                                <?php
                                $c_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                $c_num = $c_rs->num_rows;

                                if ($c_num > 0) {
                                ?>
                                    <div class="col-12 rounded rounded-3 bg-white p-2 px-3" style="box-shadow: 0px 0px 10px 5px rgb(220, 255, 208);">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-10 col-lg-6">
                                                        <div class="form-check">
                                                            <?php
                                                            $cSelect_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'
                                                            AND `select` = '1'");
                                                            $cSelect_num = $cSelect_rs->num_rows;

                                                            if ($cSelect_num == $c_num) {
                                                            ?>
                                                                <input class="form-check-input" type="checkbox" checked id="cartSelectAll" onclick="selectCartAll();">&nbsp;
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <input class="form-check-input" type="checkbox" id="cartSelectAll" onclick="selectCartAll();">&nbsp;
                                                            <?php
                                                            }
                                                            ?>

                                                            <label class="form-check-label text-uppercase text-secondary" for="flexCheckDefault">
                                                                select all ( 5 item(s) )
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $email = $_SESSION["u"]["email"];
                                                    ?>
                                                    <div onclick="deleteCartAll('<?php echo ($email); ?>');" class="col-2 col-lg-6 text-end text-uppercase text-secondary">
                                                        <i class="bi bi-trash3 d-block d-lg-none deletebtn"></i>
                                                        <span class="d-none d-lg-block deletebtn"><i class="bi bi-trash3"></i> delete</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    $subTot = 0;

                                    for ($x = 0; $x < $c_num; $x++) {
                                        $c_data = $c_rs->fetch_assoc();

                                        if ($c_data["select"] > 0) {
                                            $price = $c_data["qty"] * $c_data["price"];
                                            $subTot = $subTot + $price;
                                        } else {
                                        }

                                        $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $c_data["product_id"] . "'");
                                        $p_data = $p_rs->fetch_assoc();


                                    ?>

                                        <!-- product -->
                                        <div class="col-12 mt-3 rounded rounded-3 bg-white p-3" style="box-shadow: 0px 0px 10px 5px rgb(220, 255, 208);">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="col-4 col-lg-3">
                                                            <div class="row">
                                                                <div class="col-1">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-check">
                                                                                <div class="mt-2 mt-lg-4">
                                                                                    <?php
                                                                                    if ($c_data["select"] > 0) {

                                                                                    ?>
                                                                                        <input onclick="cartSelect('<?php echo ($c_data['id']) ?>','<?php echo ($x) ?>');" class="form-check-input" type="checkbox" checked id=<?php echo ("cartSelect" . $x); ?>>

                                                                                    <?php

                                                                                    } else {

                                                                                    ?>
                                                                                        <input onclick="cartSelect('<?php echo ($c_data['id']) ?>','<?php echo ($x) ?>');" class="form-check-input" type="checkbox" id=<?php echo ("cartSelect" . $x); ?>>

                                                                                    <?php

                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 d-block d-lg-none deletebtn">
                                                                            <i onclick="deleteCart('<?php echo ($c_data['id']); ?>');" class="bi bi-trash3 text-start"></i>
                                                                        </div>
                                                                    </div>

                                                                </div>
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

                                                                <div class="col-12 col-lg-8 mt-2 mt-lg-4">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-6">
                                                                            <span class="fw-bold" style="color: #FF4B2B;">Rs. <?php echo ($c_data["price"]); ?> .00</span>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 ">
                                                                            <span>Qty :- 0<?php echo ($c_data["qty"]) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-none d-lg-block col-3 mt-4" onclick="deleteCart('<?php echo ($c_data['id']); ?>');">
                                                                    <span class="deletebtn"><i class="bi bi-trash3"></i> delete</span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php
                                                        $adFood_rs = Database::search("SELECT * FROM `cart_has_additional_food` WHERE `cart_id` = '" . $c_data["id"] . "'");

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
                                            </div>
                                        </div>
                                        <!-- product -->

                                    <?php

                                    }
                                } else {
                                    ?>
                                    <div class="col-12 rounded rounded-3 bg-white p-2 px-3" style="box-shadow: 0px 0px 10px 5px rgb(220, 255, 208);">
                                        <div class="row">
                                            <div class="col-12 fs-5 p-5 text-center">
                                                No items in your Cart!
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>



                            </div>
                        </div>

                        <!-- body -->

                        <?php
                        if ($c_num > 0) {
                        ?>

                            <!-- checkout -->

                            <div class="col-12 col-lg-3 checkoutDiv d-lg-block pt-4 ps-4 ps-lg-4 pe-4 pe-lg-5">
                                <div class="row">
                                    <div class="col-12 bg-white p-3 checkoutShadow">

                                        <?php



                                        ?>

                                        <div class="row">
                                            <div class="col-12 d-none d-lg-block fs-5 text-uppercase">Order Summary</div>
                                            <div class="col-8 col-lg-12 mt-2 mt-lg-3">
                                                <div class="row">
                                                    <div class="col-6">SubTotal</div>
                                                    <div class="col-6 text-end">Rs. <?php echo ($subTot); ?> .00</div>
                                                </div>
                                            </div>

                                            <?php
                                            $a_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' 
                                            AND `district_district_id` = '7' AND `default` = '1' AND `city_city_id` != '4'");
                                            $a_data = $a_rs->fetch_assoc();

                                            $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
                                            $df_data = $df_rs->fetch_assoc();

                                            $deliver_fee = $df_data["price"];
                                            $tot = 0;
                                            $tot = $subTot + $deliver_fee;
                                            ?>

                                            <div class="col-12 d-none d-lg-block mt-3">
                                                <div class="row">
                                                    <div class="col-6">Shipping Fee</div>
                                                    <div class="col-6 text-end">Rs. <?php echo ($deliver_fee); ?> .00</div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-none d-lg-block">
                                                <hr>
                                            </div>
                                            <div class="col-12 d-none d-lg-block">
                                                <div class="row">
                                                    <div class="col-6">Total</div>
                                                    <div class="col-6 text-end">Rs. <?php echo ($tot); ?> .00</div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-none d-lg-block d-grid d-lg-grid mt-3">
                                                <button class="text-uppercase pbutton" onclick="checkout();">Proceed to check Out</button>
                                            </div>
                                            <div class="col-4 d-block d-lg-none d-grid mt-0 ">
                                                <button class="text-uppercase pbutton " onclick="checkout();">Buy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- checkout -->

                            <!-- model -->

                            <div class="modal" tabindex="-1" id="model">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">No Addrss!!!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-12">
                                                    <p>You have not added any address yet.Please add an address to continue</p>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn text-white" style="background-color: #FF4B2B; border-radius: 20px;" onclick="window.location='addressBook.php'">+ Add address</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- model -->

                        <?php
                        } else {
                        }
                        ?>

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