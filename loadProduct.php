<?php
require "connection.php";

$cid = $_POST["cid"];

$p_rs = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $cid . "'");
$p_num = $p_rs->num_rows;

for ($x = 0; $x < $p_num; $x++) {
    $p_data = $p_rs->fetch_assoc();

    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $p_data["id"] . "'");
    $img_data = $img_rs->fetch_assoc();

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

                    <div class="card product rounded-5 pb-4" style="border: none;">
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