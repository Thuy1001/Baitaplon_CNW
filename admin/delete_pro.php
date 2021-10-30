<?php 
    include "../admin/config.php";
   

    if(isset($_GET['pro_id']))
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID
        $pro_id = $_GET['pro_id'];
        
        //3. Delete prodcut from Database
        $sql = "DELETE FROM products WHERE pro_id=$pro_id";
        //Execute the Query
        $result = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Products with Session Message
        if($result==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:../admin/products.php');
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
            header('location:../admin/products.php');
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:../admin/products.php');
    }

?>