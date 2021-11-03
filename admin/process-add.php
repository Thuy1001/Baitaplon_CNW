<?php
    
    $ad_name = $_POST['adname'];
    $ad_pass= md5($_POST['adpass']);
    $ad_email = $_POST['ademail'];
    $ad_phone = $_POST['adphone'];
    $ad_address = $_POST['adaddress'];
    
   include 'config1.php';

    // Bước 02:
    //$pass_hash=md5($ad_pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO admins (ad_name,ad_pass,ad_email, ad_phone,ad_address)
    VALUES ('$ad_name','$ad_pass','$ad_email','$ad_phone','$ad_address')";

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