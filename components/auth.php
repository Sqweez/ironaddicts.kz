<?php
require_once('../includes/db.php');
if (isset($_POST)) {
    $phone = $_POST["phone_number"];
    if($phone[0] == 8){
        $phone = '+7' . substr($phone, 1);
    }
    else if($phone[0] == 7){
        $phone = '+' . $phone;
    }
    $pass = $_POST["password"];
    $redirect = $_POST["redirect"];
    $array = array();
    $sql = "SELECT * FROM clients WHERE telefon = '$phone'";
    $data = $conn->query($sql);
    $data = mysqli_fetch_array($data, MYSQLI_ASSOC);
    if(!$data){
        $array = array(
            "error" => "Пользователь с такими данными не найден!"
        );
    }
    else{
        if ($pass == $data["password"]) {
            $array = array(
                "data" => json_encode($data),
                "msg" => "OK"
            );
        }
        else{
            $array = array(
                "error" => "Неверный пароль!"
            );
        }
    }
    echo json_encode($array);
}