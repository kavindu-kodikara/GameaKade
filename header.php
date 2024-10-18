<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="col-12" style="background-color: #383848; position: fixed; z-index: 10;">
        <div class="row">

            <div class="col-12 col-lg-6 d-none d-lg-block mt-3 mb-2 text-white">
                <div class="row">
                    <span class="col-2 col-lg-1 offset-0 offset-lg-1 fw-bold">Welcome </span>&nbsp;

                    <?php

                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>
                        <span class="col-2 col-lg-3 text-center "><?php echo ($data["fname"]); ?></span>&nbsp;&nbsp; |
                        <span class="col-2 col-lg-1 fw-bold headerCart" onclick="signOut();">SignOut</span>&nbsp;&nbsp; |
                    <?php
                    } else {
                    ?>
                        <span class="col-5 col-lg-3 text-end fw-bold"><a class="text-decoration-none headerCart" href="sign.php">SignIn or register</a></span>&nbsp;&nbsp; |
                    <?php
                    }
                    ?>


                    <span class="col-4 col-lg-3 text-start fw-bold">Help</span>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2 mb-2 text-white">
                <div class="row">
                    <div class="col-4 col-lg-2  offset-0 offset-lg-6">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="manageMyAccount.php">Manage My Account</a></li>
                            <li><a class="dropdown-item" href="cart.php">My cart</a></li>
                            <li><a class="dropdown-item" href="recentOrder.php">My orders</a></li>
                            <li><a class="dropdown-item" href="addressBook.php">Address Book</a></li>
                            <li><a class="dropdown-item" href="#">Saved</a></li>
                        </ul>
                    </div>



                    <?php
                    if (isset($_SESSION["u"])) {
                    ?>
                        <div class="col-8 col-lg-4 headerCart" onclick="window.location = 'cart.php'">
                            <div class="row">
                                <div class="col-2"><i class="bi bi-cart2 fs-3"></i></div>
                                <?php
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                $cart_num = $cart_rs->num_rows;

                                $subTot = 0;

                                for ($x = 0; $x < $cart_num; $x++) {

                                    $cart_data = $cart_rs->fetch_assoc();
                                    $tot  = $cart_data["price"] * $cart_data["qty"];
                                    $subTot = $subTot + $tot;
                                }

                                ?>
                                <div class="col-10 mt-2 "><?php echo ($cart_num) ?> items - Rs. <?php echo ($subTot) ?> .00</div>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-8 col-lg-4 ">
                            <div class="row">
                                <div class="col-2"><i class="bi bi-cart2 fs-3"></i></div>
                                <div class="col-10 mt-2">0 items - Rs. 0 .00</div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>

        </div>
    </div>

</body>

</html>