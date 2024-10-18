<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book | ගමේ කඩේ</title>
    <link rel="icon" href="resorces/logo.png">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="background-color: #E7FFDE;">

    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            session_start();
            include "header.php";
            if (isset($_SESSION["u"])) {
            ?>

                <div class="col-12">
                    <div class="row">

                        <!-- hader -->
                        <div class="col-12 pt-3 mt-5 bg-white">
                            <div class="row">
                                <div class="col-3 col-lg-1 offset-0 offset-lg-1  logo" onclick="window.location='index.php'"></div>
                                <div class="col-8 col-lg-6 mt-4">
                                    <div class="row">



                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border-1 rounded-5" aria-label="Text input with dropdown button" id="basic_search_txt" placeholder="&nbsp;search anything">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 d-none d-lg-block col-lg-1 mt-4">
                                    <button class="button" style="height: 35px; width: 100px; padding: 0px;">Search</button>
                                </div>
                                <div class="col-2 mt-4 ms-5 d-none d-lg-block">
                                    <span><i class="bi bi-geo-alt-fill fs-4 fw-bold" style="color: #FF4B2B;"></i>&nbsp;&nbsp;<a href="https://goo.gl/maps/qxhefUNTjcMLi9qK8" class="text-decoration-none text-black fs-5 fw-bold">Locate Us</a></span>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!-- hader -->

                        <div class="col-12 ">
                            <div class="row">

                                <div class="col-10 offset-1 mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-12 col-lg-3 pe-lg-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">


                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12 centerVertical" style="font-size: 12px;">Hello, Kavindu</div>

                                                                        <div class="col-12 fs-5 fw-bold cursor" onclick="window.location = 'manageMyAccount.php'" style="color: #FF4B2B;">Manage My Account</div>
                                                                        <div class="col-12 ps-lg-5">
                                                                            <div class="row">
                                                                                <div class="col-12 fs-6 g-1 mt-3 mt-lg-0">
                                                                                    <div class="row">

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'myProfile.php'" class="col-12  manageAccountbuttonBg rounded-3 manageAccountBorder cursor btnActive-sm">

                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-person manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10">Profile</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'addressBook.php'" class="col-12 cursor manageAccountbuttonBg rounded-3 manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-journals manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-3 ">Adddress</div>&nbsp;&nbsp;
                                                                                                                <div class="col-7 d-none d-lg-block">Book</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 pe-lg-0 pe-3 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div onclick="window.location = 'cart.php'" class="col-12 rounded-3  manageAccountbuttonBg cursor manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-cart2 manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10 ">Cart</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-3 col-lg-12 g-1 ps-lg-0 ps-3">
                                                                                            <div class="row">
                                                                                                <div  class="col-12 rounded-3 cursor manageAccountbuttonBg manageAccountBorder btnActive-sm">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-lg-1 center-sm">
                                                                                                            <i class="bi bi-suit-heart manageAccountIcon"></i>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-lg-11 center-sm">
                                                                                                            <div class="row">
                                                                                                                <div class="col-1 d-none d-lg-block">My</div>&nbsp;
                                                                                                                <div class="col-10">Wishlist</div>
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
                                                                </div>

                                                                <div class="col-12 fs-5 fw-bold mt-4 cursor" onclick="window.location = 'recentOrder.php'">My Orders</div>
                                                                <div class="col-12 ps-5">
                                                                    <div class="row">
                                                                        <div class="col-12 fs-6 g-1">
                                                                            <div class="row">
                                                                                <div onclick="window.location = 'recentOrder.php'" class="col-12 g-1 cursor"><i class="bi bi-arrow-counterclockwise"></i></i>&nbsp; Recent Orders</div>
                                                                                <div onclick="window.location = 'myCancellations.php'" class="col-12 g-1 cursor"><i class="bi bi-x-circle"></i>&nbsp; My Cancellations</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div onclick="window.location = 'reviews.php'" class="col-12 fs-5 fw-bold mt-4 cursor">My Reviews</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 fs-5 fw-bold pb-3">My Profile</div>
                                                                <div onclick="addNewAddress();" class="col-6 text-end pb-3 cursor btnActive"><span class="fs-5" style="color: #FF4B2B;">+ </span>Add New Address</div>
                                                                <div class="col-12 bg-white rounded rounded-3 p-4 py-2" style="box-shadow: 0px 0px 10px 5px #daffcc;">

                                                                    <!-- components -->

                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="row">

                                                                                <?php
                                                                                $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
                                                                            INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `status` = '1'");

                                                                                $address_num = $address_rs->num_rows;

                                                                                for ($x = 0; $x < $address_num; $x++) {
                                                                                    $address_data = $address_rs->fetch_assoc();

                                                                                ?>
                                                                                    <div class="col-12 col-lg-6 p-4">
                                                                                        <div class="row">
                                                                                            <div class="col-1 center">
                                                                                                <div class="form-check">
                                                                                                    <?php
                                                                                                    if ($address_data["default"] == 1) {
                                                                                                    ?>
                                                                                                        <input class="form-check-input cursor" type="radio" name="address" checked>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <input class="form-check-input cursor" onclick="setAsDefultAddress(<?php echo ($address_data['address_id']); ?>);" type="radio" name="address">
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-11 border border-1 rounded-4 p-3">
                                                                                                <div class="row">
                                                                                                    <div class="col-8 col-lg-9"><?php echo ($address_data["fname"] . " " . $address_data["lname"]); ?></div>
                                                                                                    <div class="col-4 col-lg-3 text-end cursor btnActive text-primary" onclick="deleteAddress(<?php echo ($address_data['address_id']); ?>);">DELETE</div>
                                                                                                    <div class="col-12 mt-2"><?php echo ($address_data["mobile"]); ?></div>
                                                                                                    <div class="col-12 mt-2">
                                                                                                        <?php
                                                                                                            if($address_data["city_city_id"] != 5){
                                                                                                                $city_name = $address_data["city_name"];
                                                                                                            }else{
                                                                                                                $city_name = "";
                                                                                                            }
                                                                                                         echo ($address_data["address"] . ", " . $city_name . "  " . $address_data["district_name"] . ", " . $address_data["province_name"]); 
                                                                                                         ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                                ?>




                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- components -->

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

                        <!-- body -->

                        <!-- model -->

                        <div class="modal" tabindex="-1" id="model">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content" id="editModel">

                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Add new address</h5>
                                        <button type="button" class="btn-close" onclick="window.location.reload();" aria-label="Close"></button>
                                        
                                    </div>
                                    <div class="modal-body">

                                        <div class="row" id="modelBody">
                                        <div class="col-12 text-center text-danger">**Please note that we currently available only to Anuradhapura district only**</div>

                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">First name</label>
                                                                <input type="text" id="fname" class="form-control" placeholder="Input your first name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">Last name</label>
                                                                <input type="text" id="lname" class="form-control" placeholder="Input your last name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">Mobile number</label>
                                                                <input type="text" id="mobile" class="form-control" placeholder="Input your mobile number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <?php
                                                                
                                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                                
                                                                ?>
                                                            <label class="form-label">Select province</label>
                                                                <select class="form-select" id="provinceSelect" aria-label="Default select example" onclick="loadDistrict();">
                                                                    <option selected value="0" >Select your province</option>
                                                                    <?php
                                                                    for($p=0; $p < $province_rs->num_rows; $p++){
                                                                        $province = $province_rs->fetch_assoc();
                                                                        ?>
                                                                        <option value="<?php echo($province["province_id"]); ?>" ><?php echo($province["province_name"]); ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <?php
                                                                
                                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                                
                                                                ?>
                                                            <label class="form-label">Select district</label>
                                                                <select class="form-select" id="districtSelect" aria-label="Default select example" onclick="loadCity();">
                                                                    <option selected>Select your district</option>
                                                                    <?php
                                                                    for($d=0; $d < $district_rs->num_rows; $d++){
                                                                        $district = $district_rs->fetch_assoc();
                                                                        ?>
                                                                        <option value="<?php echo($district["district_id"]); ?>" ><?php echo($district["district_name"]); ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 " id="cityDiv">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <label class="form-label">Select city</label>
                                                            <?php
                                                                
                                                                $city_rs = Database::search("SELECT * FROM `city`");
                                                                
                                                                ?>
                                                                <select class="form-select" id="citySelect" aria-label="Default select example">
                                                                    <option selected>Select your city</option>
                                                                    <?php
                                                                    for($c=0; $c < $city_rs->num_rows; $c++){
                                                                        $city = $city_rs->fetch_assoc();
                                                                        ?>
                                                                        <option value="<?php echo($city["city_id"]); ?>" ><?php echo($city["city_name"]); ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">Address</label>
                                                                <input type="email" id="address" class="form-control" placeholder="Input your Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <div class="row">
                                                    <div class="col-12 p-3">
                                                        <div class="row">
                                                            <div class="col-12 d-grid">
                                                            <button type="button" class="btn text-white" style="background-color: #FF416C; border-radius: 20px;" onclick="saveNewAddress();">Save changes</button>
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

                        <!-- model -->

                         <!-- model -->

                         <div class="modal" tabindex="-1" id="model2">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row" id="modelBody2">

                                            

                                                <!-- loading -->
                                                <div id="loading" class="loading_div ">
                                                    <div class="boxes">
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="box">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- loading -->
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model -->


                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="col-12 headerCart fw-bold fs-3 text-black">Sign In first</div>
            <?php
            }
            include "footer.php";
            ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>