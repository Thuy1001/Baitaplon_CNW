<?php 

    //Include constants.php file here
    include 'header.php';
    include '../config.php';


    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM user WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);
 
    // Check whether the query executed successfully or not
    if($res > 0){
        header("Location:user.php");
    }else{
        echo "Lỗi!";
    }
    
    include 'footer.php';
    
?>