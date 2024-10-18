<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #636C79;">

    <?php
    require 'connection.php';
    session_start();
    $today = date('Y-m-d');
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-2 p-4  text-white ">
                <div class="row">
                    <div class="col-12 center">
                        <img src="resorces/logo.png" style="width: 100px; height: 100px;">
                    </div>
                    <div class="col-12 fs-4 text-center pt-3"><i class="bi bi-toggles fs-5"></i>&nbsp;&nbsp;Admin Pannel</div>

                    <div class="col-12 col-lg-11 offset-0 offset-lg-1 ps-4 pe-4 mt-4 mb-2">
                        <div class="row">

                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminDashbord.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-speedometer2 manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">Dashbord </div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminNewOrders.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-bag-check manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">
                                        <div class="row">
                                            <div class="col-3 d-none d-lg-block">New</div>
                                            <div class="col-7 ">Orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminProducts.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-basket2 manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">Products</div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminUsers.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-person manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">Users</div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminMeels.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-egg-fried manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">Meels</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-10 p-1 p-lg-4 pt-0 rounded rounded-5 " style="background-color: #F2F2F2;">
                <div class="row">
                    <div class="col-12 p-4  p-lg-5">
                        <div class="row">


                            <div class="col-12 ps-4">
                                <div class="row">
                                    <div class="col-4 col-lg-6 fs-4 fw-bold">New Ordes</div>
                                    <div class="col-8 col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control rounded rounded-5" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn rounded rounded-5" type="button" id="button-addon2"><i class="bi bi-search fs-5"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-2 pt-1 d-none d-lg-block">
                                        <i class="bi bi-plus-circle-dotted fs-4 cursor "></i>&nbsp;&nbsp;
                                        <i class="bi bi-bell fs-4 cursor"></i>&nbsp;&nbsp;
                                        <i class="bi bi-gear fs-4 cursor"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-2 ">
                                <div class="row">

                                    <div class="col-12 center"><i class="bi bi-brightness-alt-high-fill fs-2" style="color: #25fb00;"></i>&nbsp;<span class="fs-5">Breakfast</span></div>
                                    <div class="col-12 col-lg-10 offset-lg-1 offset-0 mt-2 px-4 px-lg-0">
                                        <div class="row">

                                            <?php
                                            $breakfast_rs = Database::search("SELECT * FROM `invoice` 
                                                            INNER JOIN `address` ON `invoice`.`address_address_id` = `address`.`address_id`
                                                            INNER JOIN `city` ON `address`.`city_city_id` = `city`.`city_id`
                                                            INNER JOIN `payment_method` ON `invoice`.`payment_method_id` = `payment_method`.`id`
                                                            INNER JOIN `payment_status` ON `invoice`.`payment_status_payment_status_id` = `payment_status`.`payment_status_id`
                                                            WHERE `delever_time_id` = '1' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC;");

                                            for ($x = 1; $x <= $breakfast_rs->num_rows; $x++) {
                                                $breakfast = $breakfast_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 mb-3 py-3 rounded rounded-4 cursor" onclick="detailsModel(<?php echo ($breakfast['invoice_id']); ?>);" style="background-color: #e1ffea; border-color: #46ff7d;border-left-style: solid; border-width: 4px; border-right-style: solid;">
                                                    <div class="row">
                                                        <div class="col-1 border-end border-1 center">0<?php echo ($x); ?></div>
                                                        <div class="col-1 d-none d-lg-block border-end border-1 text-primary center">#<?php echo ($breakfast["invoice_id"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($breakfast["fname"] . " " . $breakfast["lname"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($breakfast["city_name"]); ?></div>
                                                        <div class="col-2 d-none d-lg-block border-end border-1 center"><?php echo ($breakfast["name"]); ?></div>
                                                        <div class="col-3 col-lg-2 border-end border-1 center">Rs. <?php echo ($breakfast["total"]); ?></div>
                                                        <?php
                                                        $orderStatus_rs = Database::search("SELECT * FROM `order_ status` WHERE `order_ status_id` = '" . $breakfast["order_ status_idorder_ status_id"] . "'");
                                                        $orderStatus = $orderStatus_rs->fetch_assoc();
                                                        if ($breakfast["order_ status_idorder_ status_id"] == 1) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-warning fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($breakfast["order_ status_idorder_ status_id"] == 2) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-success fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($breakfast["order_ status_idorder_ status_id"] == 4) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-primary fw-bold"><?php echo ($orderStatus["name"]); ?></div>

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

                            <div class="col-12 mt-3 ">
                                <div class="row">

                                    <div class="col-12 center"><i class="bi bi-brightness-high-fill fs-2 text-warning"></i>&nbsp;<span class="fs-5">Lunch</span></div>
                                    <div class="col-12 col-lg-10 offset-lg-1 offset-0 mt-2 px-4 px-lg-0">
                                        <div class="row">

                                            <?php
                                            $lunch_rs = Database::search("SELECT * FROM `invoice` 
                                                            INNER JOIN `address` ON `invoice`.`address_address_id` = `address`.`address_id`
                                                            INNER JOIN `city` ON `address`.`city_city_id` = `city`.`city_id`
                                                            INNER JOIN `payment_method` ON `invoice`.`payment_method_id` = `payment_method`.`id`
                                                            INNER JOIN `payment_status` ON `invoice`.`payment_status_payment_status_id` = `payment_status`.`payment_status_id`
                                                            WHERE `delever_time_id` = '2' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC;");

                                            for ($x = 1; $x <= $lunch_rs->num_rows; $x++) {
                                                $lunch = $lunch_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 mb-3 py-3 rounded rounded-4 cursor" onclick="detailsModel(<?php echo ($lunch['invoice_id']); ?>);" style="background-color: #fff4e1; border-color: #ffd646;border-left-style: solid; border-width: 4px; border-right-style: solid;">
                                                    <div class="row">
                                                        <div class="col-1 border-end border-1 center">0<?php echo ($x); ?></div>
                                                        <div class="col-1 d-none d-lg-block border-end border-1 text-primary center">#<?php echo ($lunch["invoice_id"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($lunch["fname"] . " " . $lunch["lname"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($lunch["city_name"]); ?></div>
                                                        <div class="col-2 d-none d-lg-block border-end border-1 center"><?php echo ($lunch["name"]); ?></div>
                                                        <div class="col-3 col-lg-2 border-end border-1 center">Rs. <?php echo ($lunch["total"]); ?></div>
                                                        <?php
                                                        $orderStatus_rs = Database::search("SELECT * FROM `order_ status` WHERE `order_ status_id` = '" . $lunch["order_ status_idorder_ status_id"] . "'");
                                                        $orderStatus = $orderStatus_rs->fetch_assoc();
                                                        if ($lunch["order_ status_idorder_ status_id"] == 1) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-warning fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($lunch["order_ status_idorder_ status_id"] == 2) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-success fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($lunch["order_ status_idorder_ status_id"] == 4) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-primary fw-bold"><?php echo ($orderStatus["name"]); ?></div>

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

                            <div class="col-12 mt-3 ">
                                <div class="row">

                                    <div class="col-12 center"><i class="bi bi-moon-stars-fill fs-4 text-primary"></i>&nbsp;<span class="fs-5">Dinner</span></div>
                                    <div class="col-12 col-lg-10 offset-lg-1 offset-0 mt-2 px-4 px-lg-0">
                                        <div class="row">
                                            <?php
                                            $dinner_rs = Database::search("SELECT * FROM `invoice` 
                                                            INNER JOIN `address` ON `invoice`.`address_address_id` = `address`.`address_id`
                                                            INNER JOIN `city` ON `address`.`city_city_id` = `city`.`city_id`
                                                            INNER JOIN `payment_method` ON `invoice`.`payment_method_id` = `payment_method`.`id`
                                                            INNER JOIN `payment_status` ON `invoice`.`payment_status_payment_status_id` = `payment_status`.`payment_status_id`
                                                            WHERE `delever_time_id` = '3' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC;");

                                            for ($x = 1; $x <= $dinner_rs->num_rows; $x++) {
                                                $dinner = $dinner_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 mb-3 py-3 rounded rounded-4 cursor" onclick="detailsModel(<?php echo ($dinner['invoice_id']); ?>);" style="background-color: #e1eaff; border-color: #4670ff;border-left-style: solid; border-width: 4px; border-right-style: solid;">
                                                    <div class="row">
                                                        <div class="col-1 border-end border-1 center">0<?php echo ($x); ?></div>
                                                        <div class="col-1 d-none d-lg-block border-end border-1 text-primary center">#<?php echo ($dinner["invoice_id"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($dinner["fname"] . " " . $dinner["lname"]); ?></div>
                                                        <div class="col-4 col-lg-2 border-end border-1 center"><?php echo ($dinner["city_name"]); ?></div>
                                                        <div class="col-2 d-none d-lg-block border-end border-1 center"><?php echo ($dinner["name"]); ?></div>
                                                        <div class="col-3 col-lg-2 border-end border-1 center">Rs. <?php echo ($dinner["total"]); ?></div>
                                                        <?php
                                                        $orderStatus_rs = Database::search("SELECT * FROM `order_ status` WHERE `order_ status_id` = '" . $dinner["order_ status_idorder_ status_id"] . "'");
                                                        $orderStatus = $orderStatus_rs->fetch_assoc();
                                                        if ($dinner["order_ status_idorder_ status_id"] == 1) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-warning fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($dinner["order_ status_idorder_ status_id"] == 2) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-success fw-bold"><?php echo ($orderStatus["name"]); ?></div>

                                                        <?php
                                                        } elseif ($dinner["order_ status_idorder_ status_id"] == 4) {
                                                        ?>
                                                            <div class="col-2 text-center d-none d-lg-block center text-primary fw-bold"><?php echo ($orderStatus["name"]); ?></div>

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

                            <!-- model -->

                            <div class="modal" tabindex="-1" id="model">
                                <div class="modal-dialog  modal-dialog-centered modal-md">
                                    <div class="modal-content" id="editModel">

                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Details</h5>
                                            <button type="button" class="btn-close" onclick="window.location.reload();" aria-label="Close"></button>
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

                            <!-- model -->


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>