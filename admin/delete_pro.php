
<?php 
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
?>

<?php 
    include "../admin/config.php";
   

    if(isset($_GET['pro_id']))
    {
       
        
        $pro_id   = $_GET['pro_id'];
        
        //tạo truy vấn sql
        $sql      = "DELETE FROM products WHERE pro_id=$pro_id";
        //thực thi
        $result   = mysqli_query($conn, $sql);

        //CKiểm tra xem truy vấn có được thực thi hay không
        //4. Thông báo
        if($result==true)
        {
            //xóa thành công
            $_SESSION['delete'] = "<div class='success'>Xóa sản phẩm thành công</div>";
            header('location:../admin/products.php');
        }
        else
        {
            //xóa thất bại
            $_SESSION['delete'] = "<div class='error'>Xóa sản phẩm thất bại</div>";
            header('location:../admin/products.php');
        }

        

    }
    else
    {
        //Chuyển hướng đến Trang Products
        
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:../admin/products.php');
    }

?>