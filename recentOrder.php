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
                                                                                                <div  class="col-12 rounded-3 cursor manageAccountbuttonBg manageAccountBorder btnActive-sm">
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

                                                                <div class="col-12 fs-5 fw-bold mt-4 cursor"onclick="window.location = 'recentOrder.php'" style="color: #FF4B2B;">My Orders</div>
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
                                                                <div class="col-6 fs-5 fw-bold pb-3">My Orders</div>

                                                                <?php


                                                                if (isset($_GET["page"])) {
                                                                    $pageno = $_GET["page"];
                                                                } else {
                                                                    $pageno = 1;
                                                                }

                                                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                                                $invoice_num = $invoice_rs->num_rows;

                                                                $results_per_page = 4;
                                                                $number_of_pages = ceil($invoice_num / $results_per_page);

                                                                $page_results = ($pageno - 1) * $results_per_page;
                                                                $selected_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' ORDER BY `date` DESC
                                                                LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                                                $selected_num = $selected_rs->num_rows;

                                                                for ($x = 0; $x < $selected_num; $x++) {
                                                                    $selected_data = $selected_rs->fetch_assoc();

                                                                    $id = $selected_data["invoice_id"]

                                                                ?>

                                                                    <!-- components -->
                                                                    <div class="col-12 bg-white rounded rounded-3 p-4 pt-3 py-2 mb-3" style="box-shadow: 0px 0px 10px 5px #daffcc;">

                                                                        <div class="row">

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-lg-8">
                                                                                        <div class="row">
                                                                                            <div class="col-12">Order <span class="text-primary">#00<?php echo ($selected_data["invoice_id"]); ?></span></div>
                                                                                            <?php
                                                                                            $dateTime = date("Y M d - h:i a", strtotime($selected_data["date"]));
                                                                                            ?>
                                                                                            <div class="col-12">Placed on :- <?php echo ($dateTime); ?></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-5 col-lg-2 text-end cursor center btnActive">
                                                                                        <a class="text-decoration-none text-success fw-bold" href="invoice.php?id=<?php echo (urldecode($id)); ?>">View Invoice</a>
                                                                                    </div>
                                                                                    <div class="col-3 col-lg-2 text-end cursor center btnActive">
                                                                                        <a class="text-decoration-none" href="manageOrder.php?id=<?php echo (urldecode($id)); ?>">MANAGE</a>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <hr>
                                                                            </div>

                                                                            <div class="col-12 mt-2">
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
                                                                                                <div class="col-6 col-lg-2 center ">
                                                                                                    <img src="<?php echo ($p_data["path"]); ?>" style="height: 70px; width: 80px; border-radius: 10px;">
                                                                                                </div>
                                                                                                <div class="col-6 col-lg-3 centerVertical col-lg-3 px-4 ps-0 "><?php echo ($p_data["title"]); ?></div>
                                                                                                <div class="col-4 pt-4 pt-lg-0 col-lg-3 center">
                                                                                                    <div class="row">
                                                                                                        <?php
                                                                                                        if ($p_data["order_ status_idorder_ status_id"] == 1) {
                                                                                                        ?>
                                                                                                            <div class="bg-warning rounded-4 p-1 px-3 fw-bold">pending</div>
                                                                                                        <?php
                                                                                                        } else if ($p_data["order_ status_idorder_ status_id"] == 2) {
                                                                                                        ?>
                                                                                                            <div class="text-white rounded-4 p-1 px-3 fw-bold" style="background-color: #0ecb12;">conformed</div>
                                                                                                        <?php
                                                                                                        } else if ($p_data["order_ status_idorder_ status_id"] == 4) {
                                                                                                        ?>
                                                                                                            <div class="bg-primary text-white rounded-4 p-1 px-3 fw-bold">dilevered</div>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>



                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-4 col-lg-2 pt-4 pt-lg-0 center">qty :- <?php echo ($p_data["qty"]); ?></div>
                                                                                                <div class="col-4 col-lg-2 pt-4 pt-lg-0 centerVertical " style="justify-content: flex-end;">Rs. <?php echo ($p_data["single_product_price"]); ?> .00</div>
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

                                                                <?php

                                                                }

                                                                ?>

                                                                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                                                    <nav aria-label="Page navigation example">
                                                                        <ul class="pagination pagination-lg justify-content-center">
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                                                echo ("#");
                                                                                                            } else {
                                                                                                                echo ("?page=" . ($pageno - 1));
                                                                                                            } ?>" aria-label="Previous">
                                                                                    <span aria-hidden="true">&laquo;</span>
                                                                                </a>
                                                                            </li>
                                                                            <?php

                                                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                                                if ($x == $pageno) {
                                                                            ?>

                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                                    </li>

                                                                                <?php
                                                                                } else {
                                                                                ?>

                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="<?php echo ("?page=" . ($x)); ?>"><?php echo ($x); ?></a>
                                                                                    </li>

                                                                            <?php
                                                                                }
                                                                            }

                                                                            ?>


                                                                            <li class="page-item">
                                                                                <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                                                                echo ("#");
                                                                                                            } else {
                                                                                                                echo ("?page=" . ($pageno + 1));
                                                                                                            } ?>" aria-label="Next">
                                                                                    <span aria-hidden="true">&raquo;</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </nav>
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