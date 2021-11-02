
<?php 
      $conn=mysqli_connect('localhost','root','','bookstore');
      if(!$conn){
          die("không thể kết nối");
      }

    $sql="SELECT * FROM categories";

    $res= mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count >0){
            while ($row=mysqli_fetch_assoc($res)){
                
                $cate_id    = $row['cate_id'];
                $cate_title = $row['cate_title'];
            }
    }
    
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
    <link rel="stylesheet" href="css/style.css">

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
                                                <li><a href="../baitaplon/categories/truyenngan.php?cate_id=<?php echo $cate_id ?>" class="dropdown-item nav-link" href="#">Truyện ngắn</a></li>                             
                                                
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