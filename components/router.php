<?
$page = $_GET["page"];
$id = $_GET["id"];

header("location: /$page.php?id=$id");