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

    require "connection.php";
    session_start();

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
                                    <div class="col-4 col-lg-6 fs-4 fw-bold">Dashbord</div>
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

                            <div class="col-12 mt-5">
                                <div class="row">

                                    <div class="col-12 col-lg-4 px-5">
                                        <div class="row">
                                            <div class="col-12 py-5 rounded rounded-4" style="background-color: #BAEAEF;">
                                                <div class="row">
                                                    <div class="col-12 px-5 ">
                                                        <div class="row">
                                                            <div class="col-3 text-white center rounded rounded-3" style="background-color: #262B49;">
                                                                <i class="bi bi-cash fs-1"></i>
                                                            </div>
                                                            <?php
                                                            $today = date('Y-m-d');
                                                            $invoise1_rs = Database::search("SELECT * FROM `invoice` ");
                                                            $invoise1_tot = 0;

                                                            for ($x = 0; $x < $invoise1_rs->num_rows; $x++) {
                                                                $invoise1 = $invoise1_rs->fetch_assoc();
                                                                $invoise1_tot = $invoise1_tot + $invoise1["total"];
                                                            }

                                                            ?>
                                                            <div class="col-8 offset-1 ">
                                                                <div class="row">
                                                                    <div class="col-12 fs-4 fw-bold" style="color: #262B49;">Rs. <?php echo ($invoise1_tot); ?></div>
                                                                    <div class="col-12" style="color: #262B49;">Total Ernings</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-lg-0 mt-4 px-5">
                                        <div class="row">
                                            <div class="col-12 py-5 rounded rounded-4" style="background-color: #D5D7EE;">
                                                <div class="row">
                                                    <div class="col-12 px-5 ">
                                                        <div class="row">
                                                            <div class="col-3 text-white center rounded rounded-3" style="background-color: #262B49;">
                                                                <i class="bi bi-bag-check fs-1"></i>
                                                            </div>
                                                            <div class="col-8 offset-1 ">
                                                                <div class="row">
                                                                    <div class="col-12 fs-4 fw-bold" style="color: #262B49;"><?php echo ($invoise1_rs->num_rows); ?> Items</div>
                                                                    <div class="col-12" style="color: #262B49;">Total total Sells</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-lg-0 mt-4 px-5">
                                        <div class="row">
                                            <div class="col-12 py-5 rounded rounded-4" style="background-color: #EEBBC2;">
                                                <div class="row">
                                                    <div class="col-12 px-5 ">
                                                        <div class="row">
                                                            <div class="col-3 text-white center rounded rounded-3" style="background-color: #262B49;">
                                                                <i class="bi bi-hourglass-split fs-1"></i>
                                                            </div>
                                                            <?php

                                                            $invoise2_rs = Database::search("SELECT * FROM `invoice` WHERE DATE(`date`) = '" . $today . "'");
                                                            $invoise2_tot = 0;

                                                            for ($x = 0; $x < $invoise2_rs->num_rows; $x++) {
                                                                $invoise2 = $invoise2_rs->fetch_assoc();
                                                                $invoise2_tot = $invoise2_tot + $invoise2["total"];
                                                            }

                                                            ?>
                                                            <div class="col-8 offset-1 ">
                                                                <div class="row">
                                                                    <div class="col-12 fs-4 fw-bold" style="color: #262B49;">Rs. <?php echo ($invoise2_tot); ?> .00</div>
                                                                    <div class="col-12" style="color: #262B49;"> Today Ernings</div>
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


                            <div class="col-12 fs-4 fw-bold mt-5" style="font-family: 'sinhala';">New Orders</div>

                            <div class="col-12 col-lg-4  px-4 mt-4">
                                <div class="row">

                                    <?php

                                    $breakfast_rs = Database::search("SELECT * FROM `invoice` WHERE `delever_time_id` = '1' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC LIMIT 3;");

                                    ?>

                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor centerHorisantal fs-5"><i class="bi bi-brightness-alt-high-fill fs-4" style="color: #25fb00;"></i>&nbsp;Breakfast <div class="bg-danger text-white rounded rounded-3 ms-2 px-2 center"><?php echo ($breakfast_rs->num_rows); ?></div>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php

                                            for ($x = 0; $x < $breakfast_rs->num_rows; $x++) {
                                                $breakfast = $breakfast_rs->fetch_assoc();
                                                $address_rs = Database::search("SELECT * FROM `address` WHERE `address_id` = '" . $breakfast["address_address_id"] . "'");
                                                $address = $address_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">

                                                        <div class="col-2 text-primary">#<?php echo ($breakfast["invoice_id"]) ?></div>
                                                        <div class="col-7 "><?php echo ($address["fname"] . ' ' . $address["lname"]) ?></div>
                                                        <div class="col-3 ">Rs.<?php echo ($breakfast["total"]); ?></div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>



                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 mt-4 mt-lg-0 p-4  px-4 mt-4">
                                <div class="row">
                                    <?php

                                    $lunch_rs = Database::search("SELECT * FROM `invoice` WHERE `delever_time_id` = '2' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC LIMIT 3;");

                                    ?>
                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor   centerHorisantal fs-5"><i class="bi bi-brightness-high-fill text-warning fs-4"></i>&nbsp;Lunch <div class="bg-danger text-white rounded rounded-3 ms-2 px-2 center"><?php echo ($lunch_rs->num_rows); ?></div>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php

                                            for ($x = 0; $x < $lunch_rs->num_rows; $x++) {
                                                $lunch = $lunch_rs->fetch_assoc();
                                                $address_rs = Database::search("SELECT * FROM `address` WHERE `address_id` = '" . $lunch["address_address_id"] . "'");
                                                $address = $address_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">

                                                        <div class="col-2 text-primary">#<?php echo ($lunch["invoice_id"]) ?></div>
                                                        <div class="col-7 "><?php echo ($address["fname"] . ' ' . $address["lname"]) ?></div>
                                                        <div class="col-3 ">Rs.<?php echo ($lunch["total"]); ?></div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 mt-lg-0 mt-4 p-4 px-4 mt-4">
                                <div class="row">
                                    <?php

                                    $dinner_rs = Database::search("SELECT * FROM `invoice` WHERE `delever_time_id` = '3' AND DATE(`date`)='" . $today . "' ORDER BY `date` DESC LIMIT 3;");

                                    ?>
                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor   centerHorisantal fs-5"><i class="bi bi-moon-stars-fill text-primary fs-4"></i>&nbsp;Dinner <div class="bg-danger text-white rounded rounded-3 ms-2 px-2 center"><?php echo($dinner_rs->num_rows) ?></div>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php

                                            for ($x = 0; $x < $dinner_rs->num_rows; $x++) {
                                                $dinner = $dinner_rs->fetch_assoc();
                                                $address_rs = Database::search("SELECT * FROM `address` WHERE `address_id` = '" . $dinner["address_address_id"] . "'");
                                                $address = $address_rs->fetch_assoc();

                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">

                                                        <div class="col-2 text-primary">#<?php echo ($dinner["invoice_id"]) ?></div>
                                                        <div class="col-7 "><?php echo ($address["fname"] . ' ' . $address["lname"]) ?></div>
                                                        <div class="col-3 ">Rs.<?php echo ($dinner["total"]); ?></div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
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
                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>