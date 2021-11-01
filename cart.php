<?php session_start()?>
<?php include "header.php" ?>
<style>
    img{
        width: 30%;
    }
   
    </style>

<?php include "config.php"?>
<?php
    if(isset($_SESSION["cart"])){
        $_SESSION["cart"]=array();
    }
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case"add";
                foreach($_POST['quantity'] as  $pro_id =>$pro_qty ){
                $_SESSION["cart"][$pro_id]= $pro_qty;
            }
    
           break;
        }
    }
   if(!empty($_SESSION["cart"])){
    $result=mysqli_query($conn,"SELECT pro_title,feature_image,pro_price FROM `products` WHERE `pro_id` IN (3) ORDER BY `pro_title` ASC");
    //var_dump($result);exit;
   }
  
    ?>

       
    <body>
   
    <form pro_id="cart-form"action="cart.php?action=submit "method="post">
    <table >
    <tr>
      <td class="pro_number">STT</td>
      <td class="pro_title">Tên sản phẩm</td>
      <td class="featrure_image">Hình ảnh</td>
      <td class="pro_price">Giá</td>
      <td class="pro_qty">Số lượng</td>
      <td class="total_amount">Thành tiền</td>
      <td class="delete">Xóa</td>
    </tr>
  </thead>
  <tbody>
     
      <?php 
       $num=1;
      while($row =mysqli_fetch_array($result)){
        // var_dump($row);exit;?>
      <?php
    }
    ?>
  <tr>
      <td class="pro_number"><?= $num++?></td>
      <td class="pro_title"><?= $row ['pro_title']?></td>
      <td class="featrure_image"><img src="<?php $row['feature_image']?>"/></td>
      <td class="pro_price"><?= $row['pro_price']?></td>
      <td class="pro_qty"><input type="text" value=""name="quantity[<?php=$row['pro_id']?>]"/></td>
      <td class="total_amount"><?= $row['pro_price']?>Thành tiền</td>
      <td><a href="deleteEmployee.php?id='.$row['emp_id'].'"><i class="fas fa-user-times"></i></a></td>
    </tr>
  

    <tr>
    <td class="pro_number">&nbsp</td>
      <td class="pro_title">Tổng thanh toán</td>
      <td class="featrure_image">&nbsp</td>
      <td class="pro_price">&nbsp</td>
      <td class="pro_qty">&nbsp</td>
      <td class="total_amount"></td>
      <td><a href="deleteEmployee.php?id='.$row['emp_id'].'"><i class="fas fa-user-times"></i></a></td>
    </tr>
  </body>
</table>
<div id="form-button">
    <input type="submit"name="update_click" value='Cập nhật'/>
        </div>
      <div><lable>Người nhận:</label><input type ="text" value="" name="name"/></div>
      <div><lable>Điện thoại:</label><input type ="text" value="" name="phone"/></div>
      <div><lable>Địa chỉ:</label><input type ="text" value="" name="address"/></div>
      <div><lable>Ghi chú:</label><textarea  name="note"cols="$0"rows="?"></textarea></div>
    <input type="submit"name="order_click" value='Đặt hàng'/>
    </form>
<?php include 'footer.php'; ?>