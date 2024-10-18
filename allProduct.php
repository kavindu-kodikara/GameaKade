<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            include "header.php";


            ?>

            <div class="col-12 mt-5">
                <div class="row">

                    <div class="col-12 d-none d-lg-block allproduct"></div>

                    <div class="col-12 ">
                        <div class="row">

                            <div class="col-12 col-lg-3 p-4">
                                <div class="row">

                                    <div class="col-12 ps-5 pe-5 pt-2 pb-2 allMenu ">
                                        <div class="row">

                                            <div class="col-12  fs-1 text-center line" style="font-family: 'MotionPicture';">All Category</div>

                                            <?php

                                            $category_rs = Database::search("SELECT * FROM `category`");
                                            $category_num = $category_rs->num_rows;

                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();

                                                $pcount_rs = Database::search("SELECT * FROM `product` INNER JOIN `category` ON
                                                `product`.`category_id` = `category`.`id` WHERE `category_id` = '" . $category_data["id"] . "'");

                                                $pcount_num = $pcount_rs->num_rows;

                                            ?>

                                                <div class="col-12 text-start p-2 fs-5 line" onclick="pload(<?php echo ($category_data['id']); ?>)">
                                                    <div class="row ctTxt">
                                                        <div class="col-10 fs-5"><?php echo ($category_data["name"]); ?></div>
                                                        <div class=" col-1 fs-5"><?php echo ($pcount_num); ?></div>
                                                    </div>
                                                </div>

                                            <?php

                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row" id="product">

                                            <?php

                                            if (isset($_SESSION["ctg"])) {
                                                $cid = $_SESSION["ctg"]["id"];
                                            } else {
                                                $cid = 1;
                                            }


                                            $p_rs = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $cid . "'");
                                            $p_num = $p_rs->num_rows;


                                            for ($x = 0; $x < $p_num; $x++) {
                                                $p_data = $p_rs->fetch_assoc();

                                            ?>

                                                <!-- card  -->

                                                <div class="col-12 col-lg-3 pt-4 ps-5 ps-lg-4 pe-5 pe-lg-4 animaIn">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <?php

                                                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $p_data['id'] . "'");
                                                                $img_data = $img_rs->fetch_assoc();

                                                                ?>

                                                                <div class="card product rounded-5 pb-3" style="border: none;">
                                                                    <div class="row">
                                                                        <div class="col-5 col-lg-12">
                                                                            <img src="<?php echo ($img_data["path"]); ?>" class="card-img-top mt-3 rounded-5 productImg" onclick="singleProductView(<?php echo ($p_data['id']); ?>);">
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
                                                                                    <span class="card-title mt-1 fw-bold" style="font-size: 17px;"><?php echo ($p_data["title"]); ?></span>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="fs-5 fw-bold text-success">Rs. <?php echo ($p_data["price"]); ?> .00</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-none d-lg-block mb-2 mt-3">
                                                                            <div class="col-12 d-grid fs-6"> <button onclick="singleProductView(<?php echo ($p_data['id']); ?>);" class="text-center pbutton">View Product</button></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- card  -->

                                            <?php

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

            <?php include "footer.php" ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>