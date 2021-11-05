<?php include "header.php" ?>


<?php  
            $pro_id = $_GET['pro_id'];

            //câu lệnh truy vấn
            $sql1 = "SELECT * FROM products WHERE pro_id = $pro_id";

            //thực thi
            $result = mysqli_query($conn,$sql1); //Lưu kết quả trả về vào result

        
    ?>

    <h3 class="chitiet">Chi tiết sản phẩm</h3>
    <div class = "container my-details">
        <div class="card mb-3" style="max-width: 950px;">
            <div class="row g-0">
                <?php foreach($result as $value){ ?>
                    <div class="col-md-4 cart ">
                    <img src="<?php echo $value["feature_image"] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body name" name="name">
                            
                            <h5 class="card-title">Tên sách: <?php echo $value["pro_title"] ?></h5>
                            <p class="card-text"><?php echo $value["pro_desc"]?></p>
                           <h6 class="card-text" name = "pro_price">Giá sản phẩm: <?php echo number_format($value["pro_price"])?> VNĐ</h6>

                           <form action="add_cart.php?pro_id=<?php echo $value["pro_id"];?>"method="POST">
                                <!-- <input type ="text" value="1" name="quantity[<?php //echo $value["pro_id"]?>]" size="2"/> -->
                                <!-- <a name ="add-to-cart" class="btn btn-outline-info btn-detail" value="Thêm vào giỏ"/>Thêm vào giỏ hàng</a> -->
                                <button type ="submit" name ="add-to-cart" class="btn btn-outline-info btn-detail">Thêm vào giỏ hàng</button>
                            </form>
                            
                        </div>
                    </div>
    <?php }?>
            </div>
        </div>
    </div> <!--end container-->


        <br><br>
            <?php include 'footer.php'; ?>