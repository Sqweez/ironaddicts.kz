<?
function is_base64_encoded($data)
{
    if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) {
        return TRUE;
    } else {
        return FALSE;
    }
};
require_once ('includes/db.php');
$sql = "SELECT * FROM `product`";
$res = $conn->query($sql);
foreach ($res as $item){
    echo $item["product_opisanie"] . "<br>";
    if(is_base64_encoded($item["product_opisanie"])){

    }
    else{
        $decoded = base64_encode($item["product_opisanie"]);
        $sql = "UPDATE `product` SET `product_opisanie` = '$decoded' WHERE `product_id` = " . $item["product_id"];
        echo $sql;
        $conn->query($sql);
    }
    echo "<br>";
}