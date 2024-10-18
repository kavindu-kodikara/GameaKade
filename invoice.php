<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="" style="overflow-x: hidden;">
    <div class="container-fluid">

        <div class="row">

            <?php
            require "connection.php";
            session_start();
            include "header.php";



            if (isset($_GET["id"])) {

                $id = $_GET["id"];
                echo ($id);
            ?>
                <div class="col-12 offset-0 offset-lg-1 col-lg-10 mt-5 pt-3">
                    <div class="row">

                        <div class="col-6 centerVertical">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-5 col-lg-2 offset-1 offset-lg-4 btn-toolbar  cursor btnActive" onclick="printInvoice();">
                            <i class="bi bi-file-earmark-arrow-down-fill fs-2"></i> </span> <span class="center">Export as PDF</span>
                        </div>

                        <div class="col-12 " id="page">
                            <div class="row invoiceLogo">





                                <div class="col-12 mt-1">
                                    <div class="row center">
                                        <div class="col-3 col-lg-8 bg-warning" style="height: 35px;"></div>
                                        <div class="col-6 col-lg-2 text-center" style="font-size: 40px;">INVOICE</div>
                                        <div class="col-3 col-lg-2 bg-warning" style="height: 35px;"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-10 offset-0 px-3 px-lg-0 offset-lg-1 mt-3">
                                    <div class="row">

                                        <?php



                                        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id` = '" . $id . "'");
                                        $invoice = $invoice_rs->fetch_assoc();

                                        $dateTime = date("Y M d", strtotime($invoice["date"]));

                                        ?>

                                        <div class="col-12  ">
                                            <div class="row">
                                                <div class="col-5 col-lg-12 fs-3">
                                                    <h2>Invoice to :</h5>
                                                </div>
                                                <div class="col-7 d-block d-lg-none">
                                                    <div class="row">
                                                        <div class="col-6 text-end">Date :</div>
                                                        <div class="col-6 text-black-50"><?php echo ($dateTime); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <?php
                                        $a_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
                                    INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` 
                                    WHERE `address`.`address_id` = '" . $invoice["address_address_id"] . "'");
                                        $a_data = $a_rs->fetch_assoc();
                                        ?>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-9 mt-2">
                                                    <?php echo ($a_data["fname"] . " " . $a_data["lname"]); ?> <br>
                                                    <?php echo ($a_data["mobile"] . " | " . $a_data["address"]) ?> <br> <?php echo ($a_data["city_name"] . " , " . $a_data["district_name"] . " , " . $a_data["province_name"]); ?>
                                                </div>
                                                <div class="col-12 col-lg-3 d-none d-lg-block">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-5">Invoice ID :</div>
                                                                <div class="col-12 col-lg-7 text-primary">#00<?php echo ($invoice["invoice_id"]); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-5">Date :</div>
                                                                <div class="col-12 col-lg-7 text-black-50"><?php echo ($dateTime); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-5">
                                            <div class="row">

                                                <!-- theader -->
                                                <div class="col-12 bg-dark p-2 px-3 text-white">
                                                    <div class="row">
                                                        <div class="col-1 ">No.</div>
                                                        <div class="col-4 ">Item name</div>
                                                        <div class="col-2 d-lg-block d-none">Image</div>
                                                        <div class="col-3 col-lg-2 ">Price</div>
                                                        <div class="col-1 ">Qty</div>
                                                        <div class="col-3 col-lg-2 text-end text-lg-start">Total</div>
                                                    </div>
                                                </div>
                                                <!-- theader -->

                                                <div class="col-12 border border-1 border-top-0 border-dark">
                                                    <div class="row">

                                                        <?php

                                                        $p_rs = Database::search("SELECT * FROM `product_has_invoice` INNER JOIN `product` ON `product`.`id` = `product_has_invoice`.`product_id`
                                                         INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id` INNER JOIN `invoice` 
                                                         ON `product_has_invoice`.`invoice_invoice_id` =  `invoice`.`invoice_id` WHERE `product_has_invoice`.`invoice_invoice_id` = '" . $id . "'");

                                                        for ($y = 1; $y <= $p_rs->num_rows; $y++) {
                                                            $p_data = $p_rs->fetch_assoc();

                                                        ?>

                                                            <!-- tbody -->
                                                            <div class="col-12 p-3 px-3 ">
                                                                <div class="row">
                                                                    <div class="col-1 centerVertical">0<?php echo ($y) ?></div>
                                                                    <div class="col-4 centerVertical"><?php echo ($p_data["title"]); ?></div>
                                                                    <div class="col-2 d-none d-lg-block centerVertical">
                                                                        <img src="<?php echo ($p_data["path"]); ?>" style="width: 50px; height: 40px; border-radius: 5px;">
                                                                    </div>
                                                                    <div class="col-3 col-lg-2 centerVertical">Rs. <?php echo ($p_data["single_product_price"]); ?> <span class="d-none d-lg-block">.00</span></div>
                                                                    <div class="col-1 centerVertical"><?php echo ($p_data["qty"]); ?></div>
                                                                    <div class="col-3 col-lg-2 centerVertical">Rs. <?php echo ($p_data["single_product_price"] * $p_data["qty"]); ?> <span class="d-none d-lg-block">.00</span></div>
                                                                </div>
                                                            </div>
                                                            <!-- tbody -->

                                                        <?php

                                                        }

                                                        ?>



                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <div class="row">

                                                        <div class="col-9 d-none d-lg-block">
                                                            <div class="row">
                                                                <div class="col-12 fw-bold">Thank you for your business!!!</div>
                                                                <div class="col-12 fw-bold mt-5">Terms & Conditions</div>
                                                                <div class="col-12">We will give you a phone call within an hour and confirme the order.</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-5 d-block d-lg-none">
                                                            <div class="row">
                                                                <div class="col-12 fw-bold">Payment info :</div>

                                                                <div class="col-12"><?php
                                                                                    if ($invoice["payment_method_id"] == 1) {
                                                                                    ?>
                                                                        cash on delivery
                                                                    <?php
                                                                                    } elseif ($invoice["payment_method_id"] == 2) {
                                                                    ?>
                                                                        paid by Credit/Debit card
                                                                    <?php
                                                                                    }
                                                                    ?></div>
                                                            </div>
                                                        </div>

                                                        <?php

                                                        $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
                                                        $df_data = $df_rs->fetch_assoc();

                                                        $deliver_fee = $df_data["price"];
                                                        $tot = 0;
                                                        $subTot = $invoice["total"] - $deliver_fee;
                                                        $tot = $invoice["total"];


                                                        ?>

                                                        <div class="col-7 col-lg-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">Sub total :</div>
                                                                        <div class="col-6 text-end">Rs. <?php echo ($subTot) ?> .00</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">Shipping fee :</div>
                                                                        <div class="col-6 text-end">Rs. <?php echo ($deliver_fee) ?> .00</div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <hr>
                                                                </div>
                                                                <div class="col-12 fw-bold">
                                                                    <div class="row">
                                                                        <div class="col-5 fs-4">Total :</div>
                                                                        <div class="col-7 centerVertical fs-5" style="justify-content: end;">Rs. <?php echo ($tot) ?> .00</div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <hr>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-none d-lg-block">
                                                            <div class="row">
                                                                <div class="col-12 fw-bold ">Payment info :</div>
                                                                <?php
                                                                if ($invoice["payment_method_id"] == 1) {
                                                                ?>
                                                                    <div class="col-12 ">cash on delivery</div>
                                                                    <div class="col-12 col-lg-4  mt-2">Please keep the relevant total amount with you when our home deliver agent arrives.</div>
                                                                <?php
                                                                } elseif ($invoice["payment_method_id"] == 2) {
                                                                ?>

                                                                    <div class="col-12 ">paid by Credit/Debit card</div>
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 text-center fw-bold mt-5">**Thise is computer generated copy. No signature is required**</div>
                                                <div class="col-12 bg-warning mt-3" style="height: 5px;"></div>
                                                <div class="col-12 mt-3 d-none d-lg-block">
                                                    <div class="row">
                                                        <div class="col-11 centerVertical">
                                                            Contact : &nbsp;<i class="bi bi-telephone-fill"></i>&nbsp;076 7 580 584 &nbsp;|&nbsp; &nbsp;<i class="bi bi-envelope-fill"></i>&nbsp;gameakade@gmail.com &nbsp;|&nbsp; www.gameakade.lk
                                                        </div>
                                                        <div class="col-1 " style="justify-content: end;">
                                                            <img src="resorces/logo.png" style="width: 68px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3 d-block d-lg-none">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <i class="bi bi-telephone-fill"></i>&nbsp;076 7 580 584
                                                        </div>
                                                        <div class="col-7">
                                                            <i class="bi bi-envelope-fill"></i>&nbsp;gameakade@gmail.com
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
            <?php

            } else {
                header("Location:index.php");
            }

            ?>


            <?php include "footer.php" ?>
        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>