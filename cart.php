<?php include 'config.php'; ?>
<?php include 'header.php'; ?>


<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6">
                <input class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <a class="nav-link" href="search.php"><button class ="btn btn-outline-success" type="submit">Search </buton></a>
                
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>
<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head">Giỏ hàng của tôi</h2>
                <table class="table">
 
                <table class="table">
            <thead>
                <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thanh toán </th>
                <th scope="col">Xóa  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $sql= "SELECT*FROM products";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0)
                    while($row =mysqli_fetch_assoc($result)){
                        echo'<tr>';
                        echo'<th scope="row">'.$row ['pro_id'].'</th>';
                        echo'<td>'.$row['pro_title'].'</td>';
                        echo'<td>'
                        ?>
                        <?php  if($row['feature_image'] != ''){ ?>
                                <img src="images/<?php echo $row['feature_image']; ?>" alt="<?php echo $row['feature_image']; ?>" width="100px"/>
                        <?php }else{ ?>
                            <img src="images/index.png" alt="" width="100px"/><?php
                       }  
                       
                        '</td>';
                        
                        echo'<td>'.$row['pro_price'].'</td>';
                        echo'<td>'.$row['pro_qty'].'</td>';
                        echo'<td>'.$row['total_amount'].'</td>';
                        echo'<td><a href="deleteCart.php?id='.$row['pro_id'].'"><i class="fas fa-user-times"></i></a></td>';
                        echo'</tr>';
                    
                    }
                ?>
                <tr>
                <th scope="row">&nbsp</th>
                <td>Tổng tiền</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>300000</td>
                </tr>
               
                
            </tbody>
            </table>
                    
  
                        <div class="empty-result">
                            Your cart is currently empty.
                        </div>
                    <?php ?>
                

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>