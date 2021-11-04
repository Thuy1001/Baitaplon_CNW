<?php session_start(); 
 
if (isset($_SESSION['user_name'])){
    unset($_SESSION['user_name']); // xóa session login
    header('location: ../index.php');
}
?>
