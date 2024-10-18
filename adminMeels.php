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
                                    <div class="col-4 col-lg-6 fs-4 fw-bold">Meels</div>
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




                            <div class="col-12 col-lg-4  px-4 mt-4">
                                <div class="row">

                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor centerHorisantal fs-5"><i class="bi bi-brightness-alt-high-fill fs-4" style="color: #25fb00;"></i>&nbsp;Breakfast
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php
                                            $Bproduct_rs = Database::search("SELECT * FROM `today_special` WHERE `meals_id` = '1'");
                                            $Bnum = $Bproduct_rs->num_rows;

                                            for ($x = 0; $x < $Bnum; $x++) {
                                                $Bdata = $Bproduct_rs->fetch_assoc();
                                                $id1 = $Bdata["product_id"];
                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <?php
                                                        $p1_rs = Database::search("SELECT * FROM `product`
                                                        INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id`
                                                         WHERE `product`.`id` = '" . $id1 . "'");

                                                        $p1_data = $p1_rs->fetch_assoc();
                                                        ?>
                                                        <div class="col-3 centerVertical">
                                                            <img src="<?php echo ($p1_data["path"]) ?>" class="rounded rounded-3" style="width: 70px; height: 50px;">
                                                        </div>
                                                        <div class="col-6 centerVertical"><?php echo ($p1_data["title"]) ?></div>
                                                        <div class="col-2 centerVertical text-primary cursor btnActive" onclick="deleteTodaySpecial(<?php echo($id1); ?>,1)">DELETE</div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <?php
                                            }

                                            $Bempty_count = 3 - $Bnum;

                                            if ($Bempty_count > 0) {
                                                for ($y = 0; $y < $Bempty_count; $y++) {

                                                ?>
                                                    <div class="col-12 ">
                                                        <div class="row">

                                                            <div class="col-10 offset-1">
                                                                <select class="form-select" id="select1" aria-label="Default select example" onclick="addTodaySpecial(1);">
                                                                    <option value="0" selected>Select Product</option>
                                                                    <?php
                                                                    $pSelect_rs = Database::search("SELECT * FROM `product` ");
                                                                    for ($x = 0; $x < $pSelect_rs->num_rows; $x++) {
                                                                        $pSelect = $pSelect_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo ($pSelect["id"]); ?>"><?php echo ($pSelect["title"]); ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>





                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 mt-4 mt-lg-0 p-4  px-4 mt-4">
                                <div class="row">

                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor   centerHorisantal fs-5"><i class="bi bi-brightness-high-fill text-warning fs-4"></i>&nbsp;Lunch
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php
                                            $Lproduct_rs = Database::search("SELECT * FROM `today_special` WHERE `meals_id` = '2'");
                                            $Lnum = $Lproduct_rs->num_rows;

                                            for ($Lx = 0; $Lx < $Lnum; $Lx++) {
                                                $Ldata = $Lproduct_rs->fetch_assoc();
                                                $id2 = $Ldata["product_id"];
                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <?php
                                                        $p2_rs = Database::search("SELECT * FROM `product`
                                                            INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id`
                                                             WHERE `product`.`id` = '" . $id2 . "'");

                                                        $p2_data = $p2_rs->fetch_assoc();
                                                        ?>
                                                        <div class="col-3 centerVertical">
                                                            <img src="<?php echo ($p2_data["path"]) ?>" class="rounded rounded-3" style="width: 70px; height: 50px;">
                                                        </div>
                                                        <div class="col-6 centerVertical"><?php echo ($p2_data["title"]) ?></div>
                                                        <div class="col-2 centerVertical text-primary cursor btnActive" onclick="deleteTodaySpecial(<?php echo($id2); ?>,2)">DELETE</div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <?php
                                            }

                                            $Lempty_count = 3 - $Lnum;

                                            if ($Lempty_count > 0) {
                                                for ($Ly = 0; $Ly < $Lempty_count; $Ly++) {

                                                ?>
                                                    <div class="col-12 ">
                                                        <div class="row">

                                                            <div class="col-10 offset-1">
                                                                <select class="form-select" id="select2" aria-label="Default select example" onclick="addTodaySpecial(2);">
                                                                    <option value="0" selected>Select Product</option>
                                                                    <?php
                                                                    $pSelect_rs = Database::search("SELECT * FROM `product` ");
                                                                    for ($x = 0; $x < $pSelect_rs->num_rows; $x++) {
                                                                        $pSelect = $pSelect_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo ($pSelect["id"]); ?>"><?php echo ($pSelect["title"]); ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4 mt-lg-0 mt-4 p-4 px-4 mt-4">
                                <div class="row">

                                    <div class="col-12 p-4 px-4 bg-white rounded rounded-4">
                                        <div class="row">
                                            <div class="col-12 cursor   centerHorisantal fs-5"><i class="bi bi-moon-stars-fill text-primary fs-4"></i>&nbsp;Dinner
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <?php
                                            $Dproduct_rs = Database::search("SELECT * FROM `today_special` WHERE `meals_id` = '3'");
                                            $Dnum = $Dproduct_rs->num_rows;

                                            for ($Dx = 0; $Dx < $Dnum; $Dx++) {
                                                $Ddata = $Dproduct_rs->fetch_assoc();
                                                $id3 = $Ddata["product_id"]; 
                                            ?>
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <?php
                                                        $p3_rs = Database::search("SELECT * FROM `product`
                                                            INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id`
                                                             WHERE `product`.`id` = '" . $id3. "'");

                                                        $p3_data = $p3_rs->fetch_assoc();
                                                        ?>
                                                        <div class="col-3 centerVertical">
                                                            <img src="<?php echo ($p3_data["path"]) ?>" class="rounded rounded-3" style="width: 70px; height: 50px;">
                                                        </div>
                                                        <div class="col-6 centerVertical"><?php echo ($p3_data["title"]) ?></div>
                                                        <div class="col-2 centerVertical text-primary cursor btnActive" onclick="deleteTodaySpecial(<?php echo($id3); ?>,3)">DELETE</div>

                                                    </div>

                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <?php
                                            }

                                            $Dempty_count = 3 - $Dnum;

                                            if ($Dempty_count > 0) {
                                                for ($Dy = 0; $Dy < $Dempty_count; $Dy++) {

                                                ?>
                                                    <div class="col-12 ">
                                                        <div class="row">

                                                            <div class="col-10 offset-1">
                                                                <select class="form-select" id="select3" aria-label="Default select example" onclick="addTodaySpecial(3);">
                                                                    <option value="0" selected>Select Product</option>
                                                                    <?php
                                                                    $DpSelect_rs = Database::search("SELECT * FROM `product` ");
                                                                    for ($x = 0; $x < $DpSelect_rs->num_rows; $x++) {
                                                                        $DpSelect = $DpSelect_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo ($DpSelect["id"]); ?>"><?php echo ($DpSelect["title"]); ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
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