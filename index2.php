<?php include "header.php" ?>
<!-- search -->
    <nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form  class="d-flex mx-auto col-md-6">
                <input class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>
    <?php include "top.php"?>

<?php
  
       
        include"config.php";

        $sql="SELECT*FROM products" ;

        $result = mysqli_query($conn,$sql); 

        if(mysqli_num_rows($result)>0){
                
            while ($row = mysqli_fetch_assoc($result)){
        

?>
    <!-- end nav search -->
    <!-- start explore -->
    <div class="container">
        <div class="row mt-5">
            <div class="product-group">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-12">
                            <div class="card card-product mb-3">
                                <img class="card-img-top" src="<?php echo SITEURL; ?>images/<?php echo $row['feature_image']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?php echo $row['pro_title']; ?></h5>
                                    <a href="#" class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                                </div>
                            </div>
                    </div>

                
<br>
                </div> <!--end row-->

            </div> <!--end product-group-->
            <br><br>
            <?php
            } //end while
        } //end if
            ?>
<?php include "footer.php" ?>