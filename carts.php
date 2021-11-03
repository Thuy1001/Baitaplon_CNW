<?php include "header.php"?>
<?php include "config.php"?>
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
<?php
    session_start();?>
  
<div>
    <form action ="cart.php" method="post">

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
</div>

