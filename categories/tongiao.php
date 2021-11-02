
<?php 
      $conn=mysqli_connect('localhost','root','','bookstore');
      if(!$conn){
          die("không thể kết nối");
      }

    $sql="SELECT *FROM categories";

    $res= mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count >0){
            while ($row=mysqli_fetch_assoc($res)){
                $cate_id    = $row['cate_id'];
                $cate_title = $row['cate_title'];
               
            }
        }
     
    echo '$cate_id';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- logo -->
                    <nav class="navbar navbar-expand-lg navbar-light" method="post" action="">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php">BOOKSTORE</a>      
                        <div class="container1">
                            <ul class="nav justify-content-end">
                            <li class="nav-item">
                                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php"><i class="fas fa-user"></i> Tài khoản</a>
                                </li>

                                <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-book"></i>Thể loại
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a href="../baitaplon/categories/tongiao.php?cate_id=<?php echo $cate_id ?>" class="dropdown-item nav-link" href="#">Tôn giáo</a></li>
                                                <li><a href="../categories/truyenngan.php?cate_id=<?php echo $cate_id ?>" class="dropdown-item nav-link" href="#">Truyện ngắn</a></li>                             
                                                
                                            </ul>
                                </li>

                                
                                <li class="nav-item">
                                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end container -->
                    </div>
                    <!-- end container-fluid -->
               
                </nav>
                    <!-- end logo -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end contaier-fluid -->


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

     $sql="SELECT sanpham.pro_id, sanpham.pro_cat, sanpham.pro_title, sanpham.pro_price, sanpham.feature_image, danhmuc.cate_id from products sanpham inner join categories danhmuc on sanpham.pro_cat=danhmuc.cate_id WHERE sanpham.pro_cat=$pro_cat;";

     $result=mysqli_query($conn,$sql);

     $result=mysqli_query($conn,$sql);
     
    $count=mysqli_num_rows($result);

    

    if($count>0){
        


        while($row=mysqli_fetch_assoc($result)){
            $pro_cat = $row['pro_cat'];
            $pro_title = $row['pro_title'];
            $pro_price = $row['pro_price'];
            $feature_image = $row['feature_image'];
            $cate_id = $row['cate_id'];
            ?>
            <!-- <div class="container">
                <div class="row mt-5">
                    <h2 class="list-product-title"><?php //if($row1['pro_cat']==1) echo 'Tôn giáo';?></h2>
                    <div class="product-group">
                        <div class="row"> -->

                <div class="container">
 
                    <div class="box-3 float-container">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="../images/<?php echo $feature_image; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?php echo $pro_title; ?></h5>
                                    <div class="card-text product-price">
                                                <span class="del-price"><?php echo $pro_price ?>vnd</span>
                                    </div>
                                    <a href ="#" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="../details.php?pro_id=<?php echo $row['pro_id'];  ?>" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            
                            </div>
                    </div>
                </div>
<!-- 
                            <div class="col-md-3 col-sm-6 col-12">
                                    <div class="card card-product mb-3">
                                        <img class="card-img-top" src="../images/<?php //echo $feature_image ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title product-title"><?php //echo $pro_title ?></h5>
                                            <div class="card-text product-price">
                                                <span class="del-price"><?php //echo $pro_price ?>vnd</span>
                                            </div>
                                            <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                        </div> <!--end row-->
                    <!-- </div> end product-group -->
                <!-- </div> end row -->
            <!-- </div> end container --> 

<?php

        }
    }
}

?>


 







<!-- 
if($count>0){

    while($row=mysqli_fetch_assoc($result)){
        $pro_cat = $row['pro_cat'];
        $pro_title = $row['pro_title'];
        $pro_price = $row['pro_price'];
        $feature_image = $row['feature_image'];
        $cate_id = $row['cate_id'];
        ?>
            <!-- <div class="container">
                <div class="row mt-5">
                    <h2 class="list-product-title"><?php //if($row1['pro_cat']==1) echo 'Tôn giáo';?></h2>
                    <div class="product-group">
                        <div class="row"> -->
<!-- 
                            <div class="col-md-3 col-sm-6 col-12">
                                    <div class="card card-product mb-3">
                                        <img class="card-img-top" src="images/thiensuvaembe5tuoi.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title product-title">Thiền sư và em bé 5 tuổi</h5>
                                            <div class="card-text product-price">
                                                <span class="del-price">100.000 vnd</span>
                                            </div>
                                            <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div> -->
                        <!-- </div> end row -->
                    <!-- </div> end product-group -->
                <!-- </div> end row -->
            <!-- </div> end container --> 



    <!-- <div class="container">
        <div class="row mt-5">
            <h2 class="list-product-title">Tôn Giáo-Tâm Linh</h2>
            <div class="product-group">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-12">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="images/thiensuvaembe5tuoi.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title">Thiền sư và em bé 5 tuổi</h5>
                                    <div class="card-text product-price">
                                        <span class="del-price">100.000 vnd</span>
                                    </div>
                                    <a class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            </div>
                        </div> -->
                 <!-- </div> end row -->
            <!-- </div> end product-group -->
        <!-- </div> end row -->
    <!-- </div> end container -->

    <!-- end category -->
    <div class="clearfix"></div>


<?php include"../footer.php"?>

