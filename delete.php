<?php
session_start();
$pro_id=$_GET["pro_id"];
if(isset($_SESSION["cart"][$pro_id])){
    unset($_SESSION["cart"][$pro_id]);
}
header("location: carts.php");
?>
