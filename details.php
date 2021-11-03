<?php include "header.php" ?>
  <body>
  <?php include 'config.php'?>
  <style>
    .container{
      width:80%;
      margin: auto;
      display: flex;
      
    }
    .show{
      display: flex;
      justify-self: center;
    }
    .cart{
      flex:1;
    }
    
    img, svg {
    /* vertical-align: middle; */
    width: 30%;
}
img.img-fluid.rounded-start{
  width:50%;
}
    </style>
  <h3 class="text-center"> Chi tiết sản phẩm</h3>
 <?php 
        $pro_id = $_GET['pro_id'];
        $sql="SELECT*FROM products WHERE pro_id = $pro_id";
        $result = mysqli_query($conn,$sql); 
        //var_dump($result);exit;
        ?>
  <body>
    <div class= "container">
<?php foreach($result as $value){?>
     <div class= "show">
         <div class="cart">
           <div class= "name">
            <p>Tên sản phẩm: <?php echo $value["pro_title"];?></p>
            <p>Giá: <?php echo number_format($value["pro_price"]);?>VND</p>
          </div>
            <div class="button">
                <form action="add_cart.php?pro_id=<?php echo $value["pro_id"];?>"method="POST">
                  <button type ="submit" name ="add-to-cart">Add to cart</button>
                </form>
                
      </div>
      <p><?php echo $value["pro_desc"];?></p>
      <div class="image">
        <img src ="<?php echo $value["feature_image"];?>"class="img-fluid rounded-start" alt="...">
</div>
</div>
<?php
        }
        ?>
</div>
</body>
  <?php //include 'footer.php'; ?>

  
  