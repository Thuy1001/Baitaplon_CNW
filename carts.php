<?php include "header.php"?>
<style>
    *{
        margin: 5px;
        padding: 5px;
    }
    table{
        caption-side: bottom;
        border-collapse: collapse;
        width:100%;
    }
    .thead, tbody, tr, td, th {
    border-color: #212529;
    border-style: solid;
    border-width: 1px;  
    }
    input{
        width:15%;
        margin:5px;
    }
    button{
        width:15%;
        margin:5px;

    }
    </style>
    <nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6"id="search"  action=""method="GET">
                <input  type="text"value=""name ="search" class="form-control me-2" placeholder="Search for Book.." aria-label="Search">
                <input class ="btn btn-outline-success" type="submit" value="Search">
                
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>
<?php

if(isset($_POST["update"])){
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $value){
            if($_POST["pro_qty".$value[$pro_id]]<= 0){
                unset($_SESSION["cart"][$value["pro_id"]]);

            }
            else{
                $_SESSION["cart"][$value["pro_id"]]["pro_qty"]= $_POST["pro_qty".$value["pro_id"]];
            }
        }
    }
}



?>

   
  
<div>
    <form action ="carts.php" method="post">
<h2>Giỏ hàng của tôi</h2>
</form>
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>            
        </thead>
        <tbody>
            <?php if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $value){
                $tong=0;
                $tong=$value["pro_price"]*$value["pro_qty"];
?>
             <tr>
                <td><?php echo $value["pro_id"];?></td>
                <td><?php echo $value["pro_title"]?></td>
                <td><?php echo $value["feature_image"];?></td>
                <td><input type="number" min="1" name="pro_qty <?php echo $value["pro_id"];?>" value="<?php echo $value["pro_qty"];?>"></td>
                <td><?php echo $value["pro_price"];?></td>
                <td><?php echo $tong ?></td>
                <td><a href="delete.php?pro_id=<?php echo $value["pro_id"];?>"><i class="fa fa-user-times"></i></a></td>
                
            </tr>
            <?php }
            }
            ?>

        </tbody>
    </table>
    <button type="submit" name="update">Update</button>
    <a href="order.php" class="btn-btn-info" name="order">Đặt hàng</a>
<?php include "footer.php"?>
