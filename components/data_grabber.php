<?php
require_once ("../includes/db.php");
if(isset($_POST)){
    $method = $_POST["data"];
    $id = $_POST["id"];
    $data = array();
    if($method == "category.php"){
        $sql = "SELECT * FROM `product` WHERE product_category_id = '$id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";
        $result = $conn->query($sql);
        foreach ($result as $item){
            array_push($data, $item);
        }
    }
    echo json_encode($data);
}