<?php
require "connection.php";
$id = $_POST["invoice_id"];


$invoice_rs = Database::search("SELECT * FROM `invoice` 
INNER JOIN `address` ON `invoice`.`address_address_id` = `address`.`address_id`
INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` 
INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id`
INNER JOIN `payment_method` ON `invoice`.`payment_method_id` = `payment_method`.`id`
WHERE `invoice_id` = '" . $id . "'");

$deleverTime_rs = Database::search("SELECT * FROM `delever_time` 
INNER JOIN `invoice` ON `invoice`.`delever_time_id` = `delever_time`.`id` 
WHERE `invoice`.`invoice_id` = '" . $id . "'");

$invoice = $invoice_rs->fetch_assoc();
$deleverTime = $deleverTime_rs->fetch_assoc();

$start_time = date('h:i a', strtotime($deleverTime["start_time"]));
$end_time = date('h:i a', strtotime($deleverTime["end_time"]));

?>
<div class="col-12 text-center fs-5 mb-3 fw-bold" style="font-family: 'sinhala';"><?php echo ($deleverTime["name"] . " " . $start_time . " - " . $end_time); ?></div>

<div class="col-12 ">
    <?php echo ($invoice["fname"] . " " . $invoice["lname"]) ?> <br>
    <?php echo ($invoice["mobile"] . " | " . $invoice["address"] . " , " . $invoice["city_name"] . " , " . $invoice["district_name"] . " , " . $invoice["province_name"]); ?>
</div>

<div class="col-6 mt-3 fs-5 fw-bold" style="font-family: 'sinhala';">Rs. <?php echo ($invoice["total"]) ?> .00</div>
<div class="col-6 mt-3 fw-bold text-end" style="font-family: 'sinhala';">Cash on delevery</div>

<div class="col-12 center mt-4">
    <?php
    if ($invoice["order_ status_idorder_ status_id"] == 1) {
    ?>
        <button class="btn btn-success" onclick="adminOrderStatusChange(<?php echo ($invoice['invoice_id']) ?>,1);">Conform</button>
    <?php
    } elseif ($invoice["order_ status_idorder_ status_id"] == 2) {
    ?>
        <button class="btn btn-primary" onclick="adminOrderStatusChange(<?php echo ($invoice['invoice_id']) ?>,2);">Delever</button>
    <?php
    } elseif ($invoice["order_ status_idorder_ status_id"] == 3) {
    ?>
        <span class="text-danger" >Canceled</span>
    <?php
    } elseif ($invoice["order_ status_idorder_ status_id"] == 4) {
    ?>
        <span class="text-primary">Delevered</span>
    <?php
    }
    ?>

</div>

<div class="col-12 mt-3">Order ID :- <span class="text-primary">#0<?php echo ($invoice["invoice_id"]) ?></span></div>

<div class="col-12 p-5">
    <div class="row">

        <?php

        $p_rs = Database::search("SELECT * FROM `product_has_invoice` INNER JOIN `product` ON `product`.`id` = `product_has_invoice`.`product_id`
        INNER JOIN `invoice` 
        ON `product_has_invoice`.`invoice_invoice_id` =  `invoice`.`invoice_id` WHERE `product_has_invoice`.`invoice_invoice_id` = '" . $id . "'");

        for ($y = 1; $y <= $p_rs->num_rows; $y++) {
            $p_data = $p_rs->fetch_assoc();

        ?>

            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-2">0<?php echo ($y); ?>.</div>
                    <div class="col-7" style="font-family: 'sinhala';"><?php
                                                                        if ($p_data["size"] == 1) {
                                                                            echo ("Half ");
                                                                        } else if ($p_data["size"] == 2) {
                                                                            echo ("Full");
                                                                        } else {
                                                                        }
                                                                        echo ($p_data["title"]); ?></div>
                    <div class="col-3">qty :- 1</div>


                    <?php
                    $product_has_invoice_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $id . "'AND `product_id` = '" . $p_data["product_id"] . "'");
                    $product_has_invoice = $product_has_invoice_rs->fetch_assoc();
                    $adFood_rs = Database::search("SELECT * FROM `product_has_invoice_has_additional_food` WHERE `product_has_invoice_product_has_invoice_id` = '" . $product_has_invoice["product_has_invoice_id"] . "'");

                    if ($adFood_rs->num_rows > 0) {
                    ?>
                        <div class="col-8 offset-2 mt-2">
                            <div class="row">
                                <?php
                                for ($a = 0; $a < $adFood_rs->num_rows; $a++) {
                                    $adFood_data = $adFood_rs->fetch_assoc();

                                    $adf_rs = Database::search("SELECT * FROM `additional_food` WHERE `id` = '" . $adFood_data["additional_food_id"] . "'");
                                    $adf = $adf_rs->fetch_assoc();

                                ?>
                                    <div class="col-12 " style="font-family: 'sinhala';"><i class="bi bi-egg-fill " style="color: #ff7b3c;"></i>&nbsp;<?php echo ($adf["name"]); ?></div>
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

        <?php
        }
        ?>

    </div>
</div>
<?php

?>