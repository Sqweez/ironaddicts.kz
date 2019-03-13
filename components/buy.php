<?php
require_once('../includes/db.php');
function sendTelegramMessage($text)
{
    $token = '700250715:AAGu7McjflX28BhzpB6qH6i67K-C6iK_gvU';
    $chatId = '-347536599';

    $parametrs = [
        'chat_id' => $chatId,
        'text' => $text,
    ];
    $url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($parametrs);
    $res = file_get_contents($url);
}


function randomNumber($length)
{
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
}

function makeBuy($conn)
{
    $code = randomNumber(20);
    $totalCost = 0;
    $cashback = 0;
    if (isset($_COOKIE['city_id'])) {
        $city_id = $_COOKIE["city_id"];
        $city_name = $_COOKIE["city_name"];
    } else {
        $city_id = 87;
        $city_name = "Павлодар";
    }
    $percent = $_POST["discount_percent"];
    $client_id = $_POST["user_id"];
    $message = "";
    $data = json_decode($_POST["cart"], true);
    $balans = $_POST["balance"];
    $dostavka = $_POST["delivery"];
    $comment = $_GET["comment"];
    if ($comment == 'undefined') {
        $comment = '';
    }
    $oplata = $_POST["pay"];
    if ($oplata == 2) {
        $dostavka = 3;
    }
    $prodazha_ids = array();
    $names_array = array();
    $total = 0;
    foreach ($data as $item) {
        $total += $item["count"];
    }
    $promocode = $_POST["promocode"];
    if (strlen($promocode) > 1) {
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE `promocodes` SET `user_id` = '$client_id', `prodazha_code` = '$code', `date_activate` = '$date' WHERE `promocode` = '$promocode'";
        $conn->query($sql);
    }
    $balans = $balans / $total;
    foreach ($data as $item) {
        $prod_name = $item["name"] . " | " . $item["taste"] . " | " . $item["weigth"];
        $id = $item["id"];
        $count = $item["count"];
        echo $count . "<br>";
        array_push($names_array, $prod_name . ': ' . $count . " шт.");
        $price = $item["cost"];
        $totalCostWithoutDiscount += $price * $count;
        $price_final = floor($price - ($price * ($percent / 100)));
        $price_final1 = $price_final - $balans;
        $totalCost += $price_final1 * $count;
        $sql = "SELECT `product_id` as `id`, `product_price` as `zakup`, `product_srok_godnosti` as `srok` FROM `product_sell` WHERE `product_status` = 1 AND `product_single_id` = '$id' ORDER BY product_srok_godnosti LIMIT " . intval($count);
        $products = $conn->query($sql);
        foreach ($products as $item) {
            $zakup = $item["zakup"];
            $id = $item["id"];
            $sql = "UPDATE `product_sell` SET `product_status` = 2 WHERE `product_id` = " . $id;
            mysqli_query($conn, $sql);
            $sql = "
            INSERT INTO
              `prodazha` (
                `product_name`,
                `product_id`,
                `client_id`,
                `user_id`,
                `shop_id`,
                `zakup`,
                `fact_price`,
                `prodazhnaya_cena`,
                `prodazha_code`,
                `prodazha_skidka`
              )
            VALUES
                (
                '$prod_name', 
                '$id', 
                '$client_id', 
                156, 
                '$city_id',
                '$zakup', 
                '$price', 
                '$price_final',
                '$code',
                '$percent')";
            $conn->query($sql);
            array_push($prodazha_ids, $conn->insert_id);
        }
    }

    if($balans > 0 && $balans){
        $sql = "SELECT * FROM balans_history WHERE balans_client_id='$client_id' ORDER BY balans_id DESC LIMIT 1";
        $result = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
        $current_balans = $result["current_balans"];
        $current_balans = $current_balans - $balans;
        $sql = "INSERT INTO `balans_history` (`balans_seller_id`, `balans_shop_id`, `balans_summa`, `current_balans`, `balans_client_id`, `action`) VALUES('$seller_id', '$shop_id', '$balance', '$current_balans', '$client_id', 2)";
        $conn->query($sql);
        $sql = "UPDATE `clients` SET `total_sum_client` = '$current_balans' WHERE `id` = '$client_id'";
        $conn->query($sql);
    }

    $sql = "SELECT * FROM balans_history WHERE balans_client_id='$client_id' ORDER BY balans_id DESC LIMIT 1";

    $result = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);

    $current_balans = $result["current_balans"];
    $cashback = $totalCostWithoutDiscount * 0.01;
    $current_balans = $current_balans + $cashback;
    $sql = "INSERT INTO `balans_history` (`balans_seller_id`, `balans_shop_id`, `balans_summa`, `current_balans`, `balans_client_id`, `action`) VALUES('$seller_id', '$shop_id', '$cashback', '$current_balans', '$client_id', 3)";
    $conn->query($sql);
    $sql = "UPDATE `clients` SET `total_sum_client` = '$current_balans' WHERE `id` = '$client_id'";
    $conn->query($sql);

    if (strlen($promocode) > 1) {
        $trainer_cashback = 0;
        $sql = "SELECT `trainer_id` FROM `promocodes` WHERE `promocode` = '$promocode'";
        $trainer_id = mysqli_fetch_assoc($conn->query($sql))["trainer_id"];
        if ($percent == 7) {
            $trainer_cashback = $totalCost * 0.05;
        } else if ($percent > 7) {
            $trainer_cashback = $totalCost * 0.02;
        }

        $sql = "SELECT * FROM balans_history WHERE balans_client_id='$trainer_id' ORDER BY balans_id DESC LIMIT 1";

        $result = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);

        $current_balans = $result["current_balans"];
        $current_balans = $current_balans + $trainer_cashback;
        $sql = "INSERT INTO `balans_history` (`balans_seller_id`, `balans_shop_id`, `balans_summa`, `current_balans`, `balans_client_id`, `action`) VALUES('$seller_id', '$shop_id', '$trainer_cashback', '$current_balans', '$trainer_id', 3)";
        $conn->query($sql);
        $sql = "UPDATE `clients` SET `total_sum_client` = '$current_balans' WHERE `id` = '$trainer_id'";
        $conn->query($sql);
    }

    $prodazha_ids = json_encode($prodazha_ids);
    $sql5 = "INSERT INTO `mobile-order` (prodazha_ids, client_id, dostavka, comment) VALUES ('$prodazha_ids', '$client_id', '$dostavka', '$comment')";
    $conn->query($sql5);
    //Отправление сообщения в телеграм
    $orderNumber = $conn->insert_id;
    $sql = "SELECT `name`, `telefon` FROM clients WHERE `id` = '$client_id'";
    $res = $conn->query($sql);
    $res = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $clientName = $res["name"];
    $phone = $res["telefon"];
    $prodazha_ids = json_decode($prodazha_ids);
    $count_array = array_count_values($names_array);
    $unique = array_unique($names_array);
    foreach ($unique as $key => $name) {
        $goods .= $key + 1 . ")" . $name . "\n";
    }
    switch ($dostavka) {
        case 1:
            $dostavka = "Самовывоз\n";
            break;
        case 2:
            $dostavka = "Доставка\nВид оплаты: наличные";
            break;
        case 3:
            $dostavka = "Доставка\nВид оплаты: банковской картой";
            break;
        default:
            break;
    }
    if ($comment != '') {
        $comment = "\nКомментарий: " . $comment;
    }
    $message = "Новый заказ через интернет-магазин!\nГород:" . $city_name . "\nИмя: " . $clientName . "\nНомер телефона: " . $phone . "\nНомер заказа: №" . $orderNumber . "\nТовары: \n" . $goods . "Общая сумма: " . $totalCost . " тенге\nКоличество товаров: " . $total . "\nВид доставки: " . $dostavka . $comment;
    echo $message;
    sendTelegramMessage($message);
    header("Location: thanks.php");
}

makeBuy($conn);