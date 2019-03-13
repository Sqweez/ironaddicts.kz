<?php
require_once ("../includes/db.php");
if(isset($_POST)){
    $phone = $_POST["phone"];
    if($phone[0] == 8){
        $phone = '+7' . substr($phone, 1);
    }
    else if($phone[0] == 7){
        $phone = '+' . $phone;
    }
    $name = $_POST["name"];
    $date = $_POST["date"];
    $address = $_POST["address"];
    $pass = $_POST["password"];
    $result = mysqli_fetch_array($conn->query("SELECT * FROM clients WHERE `telefon` = '$phone' LIMIT 1"), MYSQLI_ASSOC);
    if($result){
        $data = array(
            "error" => "Пользователь с данным телефоном уже зарегистрирован"
        );
    }
    else{
        $sql = "INSERT INTO clients (`name`, `address`, `date_born`, `telefon`, `password`) VALUES ('$name', '$address', '$date', '$phone', '$pass')";
        if($conn->query($sql)){
            $id = $conn->insert_id;
            $result = $conn->query("SELECT * FROM clients WHERE id = '$id' LIMIT 1");
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        $data = array(
            "message" => "OK",
            "data" => json_encode($result)
        );
    }
    echo json_encode($data);
}