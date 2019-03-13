<?php
require_once ("../includes/db.php");
$id = $_POST["id"];
$shop_id = $_COOKIE["city_id"];
$name = $_POST["search"];
if(!$shop_id){
    $shop_id = 87;
}
if($id == 0){
    $sql = "SELECT * FROM `product` WHERE `product_shop_id` = '$shop_id' AND `product_name` LIKE '%$name%' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";

}
else{
    $sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' AND `product_name` LIKE '%$name%' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";
}
$products = $conn->query($sql);
$count = $products->num_rows;
$countOfPages = $count / 15;
$countOfPages = ceil($countOfPages);
echo $countOfPages;
?>