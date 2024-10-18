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
                            <div class="col-3 col-lg-12 pt-1 btnActive" onclick="window.location='adminSettings.php'"></i>
                                <div class="row">
                                    <div class="col-12 col-lg-2 center-sm">
                                        <i class="bi bi-gear manageAccountIcon cursor"></i>
                                    </div>
                                    <div class="col-12 col-lg-10 center-sm cursor">Settings</div>
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


                            <div class="col-12 ps-4">
                                <div class="row">
                                    <div class="col-4 col-lg-6 fs-4 fw-bold">Add new Product</div>
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

                            <div class="col-12 mt-4">
                                <div class="row">

                                    <div class="col-10 col-lg-6 offset-lg-3 offset-1">
                                        <div class="row">
                                            <div class="col-8 offset-2">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">INPUT Product Image</label>
                                                    <input class="form-control" type="file" id="img">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div>
                                                    <label for="exampleFormControlInput1" class="form-label">Product name</label>
                                                    <input type="text" class="form-control" id="title">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label for="exampleFormControlInput1" class="form-label">Product Category</label>
                                                <select id="ctg" class="form-select" aria-label="Default select example" onclick="addProductSelectCtg();">
                                                    <option value="0" selected>Open this select menu</option>
                                                    <?php
                                                    $c_rs = Database::search("SELECT * FROM `category`");
                                                    for ($x = 0; $x < $c_rs->num_rows; $x++) {
                                                        $c_data = $c_rs->fetch_assoc();
                                                    ?>
                                                        <option style="font-family: 'sinhala';" value="<?php echo ($c_data["id"]); ?>"><?php echo ($c_data["name"]); ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <div>
                                                    <label for="exampleFormControlInput1" class="form-label">minimum qty</label>
                                                    <input type="text" class="form-control" id="minimumQty" >
                                                </div>
                                            </div>

                                            <div class="col-12" >
                                                <div class="row" id="price">
                                                    
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3 d-flex justify-content-end">
                                                <button class="btn btn-primary px-5" onclick="addProduct();">SAVE</button>
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

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>