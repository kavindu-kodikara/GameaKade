<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $pid = $_POST["pid"];
    $qty = $_POST["qty"];
    $size = $_POST["size"];
    $cid = $_POST["cid"];
    $myarray = $_POST["myarray"];
    $adCategoryCount = $_POST["adCategoryCount"];

    $adArray = json_decode($myarray);

    $a_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    $a_num = $a_rs->num_rows;

    if ($a_num > 0) {

        $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
        INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' 
        AND `default` = '1' AND `city_city_id` != '4'");

        $address_num = $address_rs->num_rows;

        if ($address_num > 0) {

            if (!empty($qty)) {

                $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                $p_data = $p_rs->fetch_assoc();

                if ($size == 1) {
                    $price = $p_data["price"];
                } elseif ($size == 0) {
                    $price = $p_data["price"];
                } elseif ($size == 2) {
                    $price = $p_data["price_full"];
                }

                $c_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `product_id` = '" . $p_data["id"] . "'
                AND `size` = '" . $size . "'");
                $c_num = $c_rs->num_rows;
                $c_data = $c_rs->fetch_assoc();

                if ($c_num > 0) {
                    $newQty = $c_data["qty"] + $qty;
                    Database::iud("UPDATE `cart` SET `qty` = '" . $newQty . "' WHERE `product_id` = '" . $pid . "' AND `user_email` = '" . $_SESSION["u"]["email"] . "' AND `size` = '" . $size . "'");
                } else {
                    Database::iud("INSERT INTO `cart` (`qty`,`product_id`,`user_email`,`price`,`size`,`select`) 
                    VALUES ('" . $qty . "','" . $pid . "','" . $_SESSION["u"]["email"] . "','" . $price . "','" . $size . "','1')");

                    if ($adCategoryCount > 0) {
                        $cId_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$_SESSION["u"]["email"]."' AND `product_id`='".$pid."'");
                        $cId = $cId_rs->fetch_assoc();
                        // if ($adCategoryCount > 1) {
                        //     $adCategoryCount = $adCategoryCount + 2;
                        // }
                        for ($ad = 0; $ad < $adCategoryCount; $ad++) {
                            if ($adArray[$ad] > 0) {
                                Database::iud("INSERT INTO `cart_has_additional_food` (`additional_food_id`,`cart_id`,`product_id`) 
                                VALUES ('" . $adArray[$ad] . "','" . $cId["id"] . "','" . $pid . "')");
                            }
                        }
                    }
                }



?>

                <div class="col-12 p-1 ">
                    <div class="row">


                        <!-- item -->
                        <div>
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <?php

                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "'");
                                $img = $img_rs->fetch_assoc();

                                ?>
                                <div class="col-5">
                                    <img src="<?php echo ($img['path']); ?>" style="width: 90px;height: 70px;border-radius: 10px;">
                                </div>
                                <div class="col-7 mt-1">
                                    <span class="cartTxt"><?php echo ($p_data["title"]); ?> &nbsp;<br> qty :-&nbsp; 0<?php echo ($qty); ?></span><br>
                                    <?php

                                    if ($size == 1) {
                                    ?>
                                        <span class="cartTxt">Rs. <?php echo ($p_data["price"]); ?>.00</span>
                                    <?php
                                    } elseif ($size == 0) {
                                    ?>
                                        <span class="cartTxt">Rs. <?php echo ($p_data["price"]); ?>.00</span>
                                    <?php
                                    } elseif ($size == 2) {
                                    ?>
                                        <span class="cartTxt">Rs. <?php echo ($p_data["price_full"]); ?>.00</span>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div>
                            <hr>
                        </div>

                        <!-- item -->



                    </div>
                </div>
                <?php
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                $cart_num = $cart_rs->num_rows;

                $subTot = 0;

                for ($x = 0; $x < $cart_num; $x++) {

                    $cart_data = $cart_rs->fetch_assoc();
                    $tot  = $cart_data["price"] * $cart_data["qty"];
                    $subTot = $subTot + $tot;
                }

                ?>

                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-6 cartDivTotText fs-5">Subtotal :</div>
                        <div class="col-6 text-end cartDivTotText" style="color: #FF4B2B;">Rs. <?php echo ($subTot); ?>.00</div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-12 d-grid">
                            <button onclick="window.location='cart.php'" class="cartDivBTN">Go to cart</button>
                        </div>
                    </div>
                </div>

<?php


            } else {
                echo ("qty");
            }
        } else {
            echo ("notInArea");
        }
    } else {
        echo ("emptyAddress");
    }
} else {
    echo ("Sign");
}
