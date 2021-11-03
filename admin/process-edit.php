<?php
   $id=$_POST['id'];
   $ad_name = $_POST['adname'];
   $ad_pass= md5($_POST['adpass']);
   $ad_email = $_POST['ademail'];
   $ad_phone = $_POST['adphone'];
   $ad_address = $_POST['adaddress'];
   
    include 'config1.php';

    // Bước 02:
    //$pass_hash=password_hash($ad_pass,PASSWORD_DEFAULT);
    $sql = "UPDATE admins SET ad_name='$ad_name', ad_pass='$ad_pass', ad_email='$ad_email',ad_phone='$ad_phone', ad_address='$ad_address' WHERE ad_id='$id'";

    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:adm.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>