<?php
require_once('../includes/db.php');
$category_id = $_GET["category_id"];
$shop_id = $_COOKIE["city_id"];
$name = $_GET["name"];
if(!$shop_id){
    $shop_id = 87;
}
if($category_id == 0){
    $sql = "SELECT * FROM `product` WHERE `product_name` LIKE '%$name%' AND `product_shop_id` = '$shop_id' GROUP BY `product_name`, `ves_kolvo_tabletok`, `prodazhnaya_cena`";
}
else{
    $sql = "SELECT * FROM `product` WHERE `product_category_id` = '$category_id' AND `product_name` LIKE '%$name%' AND `product_shop_id` = '$shop_id' GROUP BY `product_name`, `ves_kolvo_tabletok`, `prodazhnaya_cena`";
}

$result = mysqli_query($conn, $sql);
$data = array();
foreach ($result as $item){
    array_push($data, $item);
}
echo json_encode($data);
