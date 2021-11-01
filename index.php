<?php include "header.php" ?>
<?php include "config.php";?>
<link rel="stylesheet" href="css/style.css">

<!-- search -->
<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6"id="search"  action=""method="GET">
                <input  type="text"value=""name ="search" class="form-control me-2" placeholder="Search for Book.." aria-label="Search">
                <input class ="btn btn-outline-success" type="submit" value="Search">
                
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>

    <?php include "top.php"?>
<?php
  $search=isset($_GET['search'])?$_GET['search']:"";
  if($search){
      $where="WHERE `pro_title` LIKE '%".$search."%'";
  }
       
if($search){
    
    $sql= mysqli_query($conn,"SELECT*FROM products WHERE `pro_title` LIKE '%".$search."%' ORDER BY `pro_title` ASC") ;
    $result = mysqli_query($conn,"SELECT * FROM products WHERE `pro_title` LIKE '%".$search."%'"); 
}else{
    
    $sql= mysqli_query($conn,"SELECT*FROM products  ORDER BY 'pro_id'  ASC") ;
    $result = mysqli_query($conn,"SELECT * FROM products");

}

        if(mysqli_num_rows($result)>0){
                
            while ($row = mysqli_fetch_assoc($result)){
        

?>

    <div class="container">
        <!-- <div class="row mt-5">
            <div class="product-group"> -->
                <!-- <div class="row"> -->

                    <div class="box-3 float-container">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="<?php echo $row['feature_image']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?php echo $row['pro_title']; ?></h5>
                                    <a href ="#" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="detail.php?pro_id=<?php echo $row['pro_id'];?>" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            
                            </div>
                    </div>
    </div>
                    <?php
            } //đóng while
        } //đóng if
                            ?>
</div>

<!-- <div class="container">
        <div class="row">
            <div class="col-md-12 social text-center letf">
                <ul>
                    <li>
                    <li><i class="fab fa-facebook"></i><span>: BookStore</span></li>
                    </li>
                    <li>
                    <i class="fa fa-phone" ></i><span>: 0376533018</span>
                    </li>
                    <li>
                    <i class="fa fa-envelope" ></i><span>: phamhongthang201@gmail.com</span>
                    </li>
                </ul>
            </div> end col-->
        <!-- </div> end row -->
    <!-- </div> 
    end container-fluid --> 



</body>
<div class="clearfix"></div>
<?php include "footer.php"?>