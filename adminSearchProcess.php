<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "'";
}

if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 8;
$number_of_pages = ceil($product_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;
$selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;

for ($x = 0; $x < $selected_num; $x++) {
    $selected_data = $selected_rs->fetch_assoc();

    $id = $selected_data["id"];

    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $id . "'");
    $img = $img_rs->fetch_assoc();

?>

    <!-- components -->
    <div class="col-12 col-lg-6 px-3 px-lg-5 pt-4">
        <div class="row">
            <div class="col-12 bg-white p-1 px-3 rounded rounded-4">
                <div class="row">
                    <div class="col-3 p-2">
                        <img class="rounded rounded-4 adminProductIMG" src="<?php echo ($img["path"]); ?>">
                    </div>
                    <div class="col-4 py-2 centerVertical ">
                        <div class="row">
                            <div class="col-12"><?php echo ($selected_data["title"]); ?></div>
                            <?php
                            $c_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $selected_data["category_id"] . "'");
                            $c_data = $c_rs->fetch_assoc();
                            ?>
                            <div class="col-12" style="font-family: 'sinhala';"><?php echo ($c_data["name"]); ?></div>
                        </div>
                    </div>
                    <div class="col-3 py-2 text-success fw-bold centerVertical">
                        Rs. <?php echo ($selected_data["price"]); ?> &nbsp;<span class="d-none d-lg-block">.00</span>
                    </div>
                    <div class="col-2 py-2 center btnActive" >
                    <a class="text-decoration-none" href="AdminEditProduct.php?id=<?php echo($selected_data["id"]); ?>">EDIT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- components -->

<?php

}

?>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-4">
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