<?php
require_once ("../includes/db.php");
$id = $_POST["id"];
$shop_id = $_COOKIE["city_id"];
if(!$shop_id){
    $shop_id = 87;
}
$sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";
$products_ = $conn->query($sql);
$products = [];
foreach ($products_ as $key => $product){
    $sql = "SELECT COUNT(*) as `count` FROM `product_sell` WHERE `product_name` = '" . $product["product_name"] . "' AND `product_status` = 1 AND `ves_kolvo_tabletok` = '" . $product["ves_kolvo_tabletok"] . "' AND `prodazhnaya_cena` = " . $product["prodazhnaya_cena"];
    $count = mysqli_fetch_assoc($conn->query($sql));
    $count = $count["count"];
    if($count > 0)
    {
        $product["count"] = $count;
        array_push($products, $product);
    }
}
$count = count($products);
$countOfPages = $count / 15;
$countOfPages = ceil($countOfPages);
echo $countOfPages;
?>