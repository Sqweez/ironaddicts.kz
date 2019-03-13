<?php
require_once ('../includes/db.php');
if($_POST["action"] == 'add_to_cart'){
    $id = $_POST["id"];

    $sql = "SELECT `ves_kolvo_tabletok`, `product_id`, `product_name`, `prodazhnaya_cena`, `product_img`, `product_vkus` FROM `product` WHERE `product_id` = '$id'";
    $result = mysqli_fetch_assoc($conn->query($sql));
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
if($_POST["action"] == 'get_availables'){
    $ids = json_decode($_POST["ids"]);
    $data = array();
    foreach ($ids as $id){
        $sql = "SELECT COUNT(*) as `count` FROM `product_sell` WHERE `product_single_id` = '$id' AND `product_status` = 1";
        $result = mysqli_fetch_assoc($conn->query($sql));
        array_push($data, array(
            "id" => $id,
            "count_available" => intval($result["count"])
        ));
    }
    echo json_encode($data);
}
if($_POST["action"] == 'getSellsSum'){
    $id = $_POST["user_id"];
    $sql = "SELECT * FROM `prodazha` WHERE `client_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $total_sum = 0;
    foreach ($result as $item){
        $total_sum += $item["prodazhnaya_cena"];
    }
    echo $total_sum;
}

if($_POST["action"] == 'get_balance'){
    $id = $_POST["user_id"];
    $sql = "SELECT `total_sum_client` as `balance` FROM `clients` WHERE `id` = '$id'";
    echo mysqli_fetch_assoc($conn->query($sql))["balance"];
}

if($_POST["action"] == 'get_promocode'){
    $promocode = $_POST["promocode"];
    $sql = "SELECT * FROM `promocodes` WHERE `promocode` = '$promocode' AND `prodazha_code` = 0 LIMIT 1";
    $result = $conn->query($sql);
    echo json_encode(mysqli_fetch_array($result, MYSQLI_ASSOC));
}