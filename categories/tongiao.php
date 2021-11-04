
<?php include"../categories/header.php" ?>

<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6">
                <input class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>     
        </div>
        <!-- end container-fluid -->
</nav>
    <!-- end nav search -->

    


    <?php include"../config.php";?>
<?php
 if(isset($_GET['cate_id'])){
     $pro_cat = $_GET['cate_id'];

     if($pro_cat==1){
        
        echo "<h3 class='chitiet' style='color: red; font-weight: bold;'>Tôn giáo</h3>";
        echo '<br><br>';
   
       }
//câu lệnh truy vấn sql
        $sql ="SELECT sanpham.pro_id, sanpham.pro_cat, sanpham.pro_title, sanpham.pro_price, sanpham.feature_image, danhmuc.cate_id from products sanpham inner join categories danhmuc on sanpham.pro_cat=danhmuc.cate_id WHERE sanpham.pro_cat=$pro_cat;";
//thực thi câu lệnh
        $result  = mysqli_query($conn,$sql);
    
        $count   = mysqli_num_rows($result);

    if($count>0){
 
        while($row=mysqli_fetch_assoc($result)){
            $pro_cat       = $row['pro_cat'];
            $pro_title     = $row['pro_title'];
            $pro_price     = $row['pro_price'];
            $feature_image = $row['feature_image'];
            $cate_id       = $row['cate_id'];
            ?>
            
                <div class="container">
                    <div class="box-3 float-container">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="../images/<?php echo $feature_image; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?php echo $pro_title; ?></h5>
                                    <div class="card-text product-price">
                                                <span class="del-price"><?php echo $pro_price ?> vnđ</span>
                                    </div>
                                    <a href ="#" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="../details.php?pro_id=<?php echo $row['pro_id'];  ?>" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            
                            </div>
                    </div>
                </div>

<?php

        }
    }
}

?>

    <div class="clearfix"></div>


<?php include"../footer.php"?>

