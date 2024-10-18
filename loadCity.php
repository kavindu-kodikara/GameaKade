<?php
require "connection.php";

$id = $_POST["id"];

if($id > 0){

    $city_rs = Database::search("SELECT * FROM `city` WHERE `district_district_id` = '".$id."'");
    for($d=0; $d < $city_rs->num_rows; $d++){
        $city = $city_rs->fetch_assoc();
        ?>
        <option value="<?php echo($city["city_id"]); ?>" ><?php echo($city["city_name"]); ?></option>
        <?php
    } 

}else{
    echo("0");
}

?>