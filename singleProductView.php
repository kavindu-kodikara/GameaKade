<?php

require "connection.php";
session_start();

if (!isset($_SESSION["p"])) {

    header("Location: index.php");
} else {
    $data = $_SESSION["p"];

    $p_rs = Database::search("SELECT * FROM `product` WHERE `product`.`id` = '" . $data["id"] . "'");
    $p_data = $p_rs->fetch_assoc();

    $c_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $data["category_id"] . "'");
    $c_data = $c_rs->fetch_assoc();


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ($p_data["title"]); ?> | ගමේ කඩේ</title>
        <link rel="icon" href="resorces/logo.png">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body style="overflow-x: hidden;">

        <div class="container-fluid">
            <div class="row">
                <?php include "header.php"; ?>

                <div class="col-12 col-lg-10 offset-0 offset-lg-1 mt-5 mb-4">
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="row">

                                <?php

                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $p_data["id"] . "'");
                                $img_data = $img_rs->fetch_assoc();

                                ?>

                                <div class="col-12 col-lg-7 ">

                                    <img src="<?php echo ($img_data["path"]); ?>" class="singP">

                                </div>
                                <div class="col-12 col-lg-5 text-start p-4 p-lg-0">

                                    <div class="col-12 text-black-50 fw-bold mt-2 mb-2" style="font-family: 'sinhala';"><?php echo ($c_data["name"]); ?></div>
                                    <div class="col-12 text-start text-dark fs-1 mb-2"><?php echo ($p_data["title"]); ?></div>
                                    <div class="col-12">
                                        <div class="row">

                                            <?php

                                            $review_rs = Database::search("SELECT * FROM `reviws` INNER JOIN `user` ON `user`.`email` = `reviws`.`user_email` WHERE `product_id` = '" . $p_data["id"] . "'");
                                            $review_num = $review_rs->num_rows;

                                            $sold_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `product_id` = '" . $p_data["id"] . "'");

                                            $sold_Count = 0;
                                            for ($y = 0; $y < $sold_rs->num_rows; $y++) {
                                                $sold = $sold_rs->fetch_assoc();

                                                $sold_Count = $sold_Count + $sold["qty"];
                                            }

                                            ?>

                                            <div class="col-10">
                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                <i class="bi bi-star-fill text-warning fs-6"></i>

                                                &nbsp;&nbsp;

                                                <label class="fs-6 text-primary ">4.5 Stars | <?php echo ($review_num) ?> Reviews & Ratings</label><br>
                                                <label class="fs-6 text-primary ">Sold : <?php echo ($sold_Count); ?> Items</label>
                                            </div>

                                            <div class="col-1">
                                                <i class="bi bi-heart fs-5 cursor"></i>
                                            </div>
                                            <div class="col-1">
                                                <i class="bi bi-share fs-5 cursor"></i>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <div class="col-12 fs-2" style="color: #FF4B2B" id="price">Rs. <?php echo ($p_data["price"]); ?>&nbsp;.00</div>

                                    <div class="col-12">
                                        <hr>
                                    </div>

                                    <?php

                                    if ($c_data["id"] == 1 || $c_data["id"] == 2 || $c_data["id"] == 3 || $c_data["id"] == 4 || $c_data["id"] == 5) {

                                    ?>
                                        <div class="col-12">

                                            <div class="col-12 fw-bold mb-3">
                                                <span class="text-black-50 fs-5">size :</span>
                                                <span class="text-dark fs-5" id="size">Half</span>
                                            </div>
                                            <div class="col-12 text-center  mb-5">
                                                <div class="row">
                                                    <div class="col-12 text-center fw-bold">

                                                        <div class="row">
                                                            <div class="col-6 text-center">
                                                                <input onclick="selectHalf(<?php echo ($p_data['id']) ?>);" id="half" type="radio" name="size" checked>&nbsp;&nbsp;<span class="fw-bold">Half</span>&nbsp;<span class="text-black-50"><?php echo ($p_data["title"]); ?></span>
                                                            </div>
                                                            <div class="col-6 text-center">
                                                                <input onclick="selectHalf(<?php echo ($p_data['id']) ?>);" id="full" type="radio" name="size">&nbsp;&nbsp;<span class="fw-bold">Full</span>&nbsp;<span class="text-black-50"><?php echo ($p_data["title"]); ?></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="mt-4"></div>
                                    <?php
                                    }

                                    ?>




                                    <div class="col-12 ">
                                        <div class="row">

                                            <div class="col-3 ">
                                                <label class="fs-5 form-label">Quantity</label>&nbsp;
                                            </div>

                                            <div class="col-5 col-lg-4 offset-1 offset-lg-0 ">
                                                <div class="row">
                                                    <div class="col-3 qty_dec" onclick='qty_dec(<?php echo $p_data["minimam_qty"]; ?>);'>
                                                        <i class="fw-bold bi bi-dash"></i>
                                                    </div>
                                                    <div class="col-5">
                                                        <input class="form-control border-0" type="text" pattern="[<?php echo ($p_data["minimam_qty"]); ?>-100]" value="<?php echo ($p_data["minimam_qty"]); ?>" id="qty">
                                                    </div>

                                                    <div class="col-3  qty_inc" onclick='qty_inc();'>
                                                        <i class="fw-bold bi bi-plus-lg"></i>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="row">

                                            <?php

                                            $p_has_adFood_rs = Database::search("SELECT * FROM `product_has_additional_food_category` WHERE `product_id` = '" . $p_data["id"] . "'");

                                            ?>

                                            <div class="col-10 col-lg-6 offset-lg-0 offset-1 d-grid mb-3 mb-lg-0">
                                                <button class="pbutton" style="border-radius: 30px;padding: 10px;" <?php

                                                                                                                    if ($p_has_adFood_rs->num_rows > 0) {
                                                                                                                    ?> onclick="singleProductBuyWithAdFood(<?php echo ($p_data['id']); ?>,<?php echo ($c_data['id']) ?>,<?php echo ($p_has_adFood_rs->num_rows) ?>);" <?php
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        ?> onclick="singleProductBuy(<?php echo ($p_data['id']); ?>,<?php echo ($c_data['id']) ?>);" <?php
                                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                                        ?>>Buy Now</button>
                                            </div>
                                            <div class="col-10 col-lg-6 offset-lg-0 offset-1 d-grid">
                                                <button class="cbutton" style="border-radius: 30px;padding: 10px;" <?php

                                                                                                                    if ($p_has_adFood_rs->num_rows > 0) {
                                                                                                                    ?> onclick="addToCartWithAdFood(<?php echo ($p_data['id']); ?>,<?php echo ($c_data['id']) ?>,<?php echo ($p_has_adFood_rs->num_rows) ?>);" <?php
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                ?> onclick="addToCart(<?php echo ($p_data['id']); ?>,<?php echo ($c_data['id']) ?>);" <?php
                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                        ?>>Add to Cart</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <hr>
                        </div>

                        <?php



                        if ($p_has_adFood_rs->num_rows > 0) {

                        ?>

                            <div class="col-10 offset-1 mt-2">
                                <div class="row">
                                    <div class="col-12 rounded-4 p-3" style="box-shadow: 0px 0px 15px 0px #e9e9e9;">
                                        <div class="row">

                                            <div class="col-12 text-center  mb-2" style="font-family: MotionPicture; font-size: 45px;">additional</div>

                                            <div class="col-10 offset-1 ">
                                                <div class="row">

                                                    <?php

                                                    for ($x = 0; $x < $p_has_adFood_rs->num_rows; $x++) {
                                                        $p_has_adFood = $p_has_adFood_rs->fetch_assoc();

                                                        $ad_foodCategory_rs = Database::search("SELECT * FROM `additional_food_category` WHERE `id` = '" . $p_has_adFood["additional_food_category_id"] . "'");
                                                        $ad_foodCategory = $ad_foodCategory_rs->fetch_assoc();
                                                    ?>

                                                        <div class="col-12 col-lg-4 px-4 mb-4">
                                                            <div class="row">

                                                                <div class="col-12 centerVertical">
                                                                    <div class="row">

                                                                        <?php
                                                                        $ad_food_rs2 = Database::search("SELECT * FROM `additional_food` WHERE `additional_food_category_id` = '" . $ad_foodCategory["id"] . "'");
                                                                        ?>

                                                                        <div class="col-12 fs-4 fw-bold  text-center text-decoration-underline mb-2" style="font-family: 'sinhala';"><?php echo ($ad_foodCategory["name"]) ?></div>

                                                                        <div class="col-12 fs-4 text-center mb-4 mt-2 fs-5" style="font-family: 'sinhala';">
                                                                            <select class="form-select" aria-label="Default select example" id="adSelect<?php echo ($x); ?>">
                                                                                <option selected value="0">Select what you want</option>
                                                                                <?php
                                                                                for ($z = 0; $z < $ad_food_rs2->num_rows; $z++) {
                                                                                    $ad_food2 = $ad_food_rs2->fetch_assoc();
                                                                                ?>
                                                                                    <option value="<?php echo ($ad_food2["id"]); ?>" style="font-family: 'sinhala';"><?php echo ($ad_food2["name"]) ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>

                                                                        <?php
                                                                        $ad_food_rs = Database::search("SELECT * FROM `additional_food` WHERE `additional_food_category_id` = '" . $ad_foodCategory["id"] . "'");
                                                                        for ($y = 0; $y < $ad_food_rs->num_rows; $y++) {
                                                                            $ad_food = $ad_food_rs->fetch_assoc();
                                                                        ?>
                                                                            <div class="col-12">
                                                                                <div class="form-check  justify-content-start">

                                                                                    <span class="form-check-label fs-5" style="font-family: 'sinhala'; ">
                                                                                        <?php echo ($ad_food["name"]) ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        }

                                                                        ?>
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
                                    </div>
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                        <div class="col-10 offset-1 mt-2">
                            <div class="row">
                                <div class="col-12 rounded-5 p-5 px-5" style="box-shadow: 0px 0px 15px 0px #e9e9e9;">
                                    <div class="row">

                                        <?php



                                        for ($x = 0; $x < $review_num; $x++) {
                                            $review = $review_rs->fetch_assoc();
                                            $reviewId = $review["reviws_id"];
                                        ?>

                                            <div class="col-12 col-lg-6 px-0 px-lg-4 py-2">
                                                <div class="row">
                                                    <div class="col-12 mb-3 center"><?php echo ($review["fname"]) ?></div>
                                                    <div class="col-12 ">
                                                        <div class="col-12 center cursor" onclick="imgModel(<?php echo ($reviewId); ?>);">
                                                            <?php
                                                            $rImg_rs = Database::search("SELECT * FROM `review_img` WHERE `review_img`.`reviws_reviws_id` = '" . $reviewId . "' LIMIT 2");

                                                            for ($z = 0; $z < $rImg_rs->num_rows; $z++) {
                                                                $rImg = $rImg_rs->fetch_assoc();
                                                            ?>
                                                                <img src="<?php echo ($rImg["path"]); ?>" class="rounded rounded-3" style="width: 70px;height: 70px; margin-right: 10px;">

                                                            <?php
                                                            }
                                                            ?>

                                                            <div class="center rounded rounded-3" style="width: 70px; height: 70px; background-color: #ffd3cc;">See all</div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3"><?php echo ($review["text"]) ?></div>
                                                    <div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        ?>



                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- model -->

                        <div class="modal" tabindex="-1" id="model1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row" id="modelBody1">


                                            


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
                                    <h5 class="modal-title fw-bold">loading Images....</h5>
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

                <!-- cartdiv -->

                <div class="position-absolute cartd ">
                    <div class="col-12 col-lg-3 offset-0 offset-lg-8 mt-4 me-5 d-none  cartdivAnima" id="cartDiv">
                        <div class="row">
                            <div class="col-12 ps-4 pe-4">
                                <div class="row">
                                    <div class="col-12 cartDivHader"></div>
                                    <div class="col-1 offset-10 mt-2"></div>
                                    <div class="col-10 mt-2 fs-5 fw-bold">New Item (s) added</div>
                                    <div class="col-2 mt-2">
                                        <button onclick="cartDivClose();" type="button" class="btn-close" aria-label="Close"></button>
                                    </div>
                                    <div class="col-12 p-3 ps-4 pe-4">
                                        <div class="row" id="itemDiv">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- cartdiv -->

                <!-- model -->

                <div class="modal" tabindex="-1" id="emptyModel">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" style="color: red;">No Addrss!!!</h5>
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
                <!-- model -->

                <div class="modal" tabindex="-1" id="model">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" style="color: red;">You are not in Service Area</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">
                                        <p>Please note that our home delivery sevice is limited to Anuradhapura, Talawa and Tambuttegama.</p>
                                        <p>Therefore, we regret to inform you that we are unable to accept your order.</p>
                                    </div>


                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn text-white" data-bs-dismiss="modal" style="background-color: #FF4B2B; border-radius: 20px;" onclick="">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- model -->

            </div>
        </div>

        <?php include "footer.php"; ?>
        </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
}
?>