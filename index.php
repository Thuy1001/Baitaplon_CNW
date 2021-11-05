<?php include "header.php" ?>
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
                                    <div class="name ">
                                        <p><?php echo number_format($row["pro_price"]);?>VND</p>
                                         </div>
                                    <form action="add_cart.php?pro_id=<?php echo $row['pro_id'];?>"method="POST">                        
                                        <button type="submit" name ="add-to-cart" class="btn btn-outline-info btn-detail btn-add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                                    </form>
                                    <a href="details.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            
                            </div>
                    </div>
    </div>
                    <?php
            } //đóng while
        } //đóng if
                            ?>
</div>




</body>
<div class="clearfix"></div>
<?php include "footer.php"?>
