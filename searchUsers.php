<?php

require "connection.php";

$txt = $_POST["t"];


if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}

$product_rs = Database::search("SELECT * FROM `user` WHERE `fname` LIKE '%" . $txt . "%' ");
$product_num = $product_rs->num_rows;

$results_per_page = 8;
$number_of_pages = ceil($product_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;
$selected_rs = Database::search("SELECT * FROM `user` WHERE `fname` LIKE '%" . $txt . "%' LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;

for ($x = 0; $x < $selected_num; $x++) {
    $selected_data = $selected_rs->fetch_assoc();


    $email = $selected_data["email"];

?>

    <!-- components -->
    <div class="col-12 col-lg-6 px-3 px-lg-5 pt-4">
        <div class="row">
            <div class="col-12 bg-white p-1 px-3 rounded rounded-4">
                <div class="row">
                    <div class="col-3 col-lg-4 py-2 centerVertical ">
                        <div class="row">
                            <div class="col-12"><?php echo ($selected_data["fname"]) ?></div>
                        </div>
                    </div>
                    <div class="col-6 py-2 text-success fw-bold centerVertical"><?php echo ($selected_data["email"]) ?></div>
                    <div class="col-3 col-lg-2 py-2 center btnActive">
                        <?php
                        if ($selected_data["states"] == 1) {
                        ?>
                            <button class="btn btn-danger" onclick="blockuser('<?php echo ($email); ?>')">Block</button>

                        <?php
                        } else {
                        ?>
                            <button class="btn btn-primary" onclick="unBlockuser('<?php echo ($email); ?>')">UnBlock</button>

                        <?php
                        }
                        ?>
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