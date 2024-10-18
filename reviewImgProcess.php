<?php
require "connection.php";

$rid = $_POST["rid"];

$review_rs = Database::search("SELECT * FROM `reviws` WHERE `reviws_id` = '".$rid."'");
$review = $review_rs->fetch_assoc();
$r_img_rs = Database::search("SELECT * FROM `review_img` WHERE `reviws_reviws_id` = '" . $rid . "'");

$r_img_num = $r_img_rs->num_rows;

?>
<div class="col-12 mb-3 mt-2" style="font-family: 'sinhala';"><?php echo($review["text"]); ?></div>
<div id="carouselExampleDark" class="carousel  slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

        <?php
        for ($x = 1; $x < $r_img_num; $x++) {
        ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo ($x); ?>" aria-label="Slide <?php echo ($x + 1); ?>"></button>

        <?php
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        $rImg1 = $r_img_rs->fetch_assoc();
        ?>
        <div class="carousel-item active" data-bs-interval="2000">
            <img src="<?php echo ($rImg1["path"]); ?>" class="d-block w-100" alt="...">

        </div>
        <?php
        for ($y = 1; $y < $r_img_num; $y++) {
            $rImg2 = $r_img_rs->fetch_assoc();
        ?>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?php echo($rImg2["path"]); ?>" class="d-block w-100" alt="...">

            </div>
        <?php
        }
        ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php


?>