<?php
require "connection.php";

$id = $_POST["id"];

if($id > 0){

    $district_rs = Database::search("SELECT * FROM `district` WHERE `province_province_id` = '".$id."'");
    for($d=0; $d < $district_rs->num_rows; $d++){
        $district = $district_rs->fetch_assoc();
        ?>
        <option value="<?php echo($district["district_id"]); ?>" ><?php echo($district["district_name"]); ?></option>
        <?php
    } 

}else{
    echo("0");
}

?>