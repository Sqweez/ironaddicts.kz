<?php
require_once ('../includes/db.php');
if(isset($_POST)){
    $ids = json_decode($_POST["data"], true);
    $products = array();
    for($i = 0; $i < count($ids); $i++){
        $id = $ids["$i"];
        $sql = "SELECT * FROM product WHERE product_id = '$id'";
        $res = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
        $data = array();
        array_push($data, $res);
        array_push($products, $data);
    }
    echo json_encode($products);
}