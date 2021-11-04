<?php include "header.php" ?>


<!-- search -->
<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6" id="search" method="post" action="search.php">
                <input name ="search" class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class ="btn btn-outline-success" type="submit" name="ok">Search </buton>
                
            </form>     
        </div>
        <!-- end container-fluid -->
</nav>

    <?php include "top.php"?>
<?php
  
        include"config.php";

        $sql    ="SELECT*FROM products" ;

        $result = mysqli_query($conn,$sql); 

        if(mysqli_num_rows($result)>0){
                
            while ($row = mysqli_fetch_assoc($result)){
        

?>

    <div class="container">
 
                    <div class="box-3 float-container">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="images/<?php echo $row['feature_image']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?php echo $row['pro_title']; ?></h5>
                                    <a href ="carts1.php" class="btn btn-info btn-add-to-cart" name="add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="details.php?pro_id=<?php echo $row['pro_id'];  ?>" name="add-to-cart" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            
                            </div>
                    </div>
    
    </div>
                    <?php
            } //đóng while
        } //đóng if
                            ?>
  
                        
            <div class="clearfix"></div>

<?php include "footer.php"?>