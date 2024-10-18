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
                    <div class="col-12 p-4">
                        <div class="row">


                            <div class="col-12 col-lg-10 offset-lg-1 offset-0">
                                <div class="row">
                                    <div class="col-8 offset-1">
                                        <div>
                                            <input id="txt" type="text" class="form-control rounded rounded-4" placeholder="User name...." onkeyup="searchUsers();">
                                        </div>
                                    </div>
                                    <div class="col-2 d-grid ">
                                        <button class="btn btn-primary rounded rounded-4" onclick="searchUsers();">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-6  fs-5 fw-bold" style="font-family: 'sinhala';">Users</div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="row" id="pBody">

                                    <?php
                                    require "connection.php";

                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $user_rs = Database::search("SELECT * FROM `user` ");
                                    $user_num = $user_rs->num_rows;

                                    $results_per_page = 8;
                                    $number_of_pages = ceil($user_num / $results_per_page);

                                    $page_results = ($pageno - 1) * $results_per_page;
                                    $selected_rs = Database::search("SELECT * FROM `user` LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

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
                                                                <button class="btn btn-danger" onclick="blockuser('<?php echo($email); ?>')">Block</button>

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