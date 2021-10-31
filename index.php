<?php include "header.php" ?>
<style>
    .products{
    width: 100%;
	margin-left: 5px;
	margin-right: 5px;
	overflow: hidden;	
    position: relative;
    }
    .card-img-top{
        height: 350px;
    }
    </style>                
<!-- search -->
<nav class="navbar navbar-light bg-img">
        <div class="container-fluid">
            <form class="d-flex mx-auto col-md-6" method="get" action="search.php">
                <input name ="search" class="form-control me-2" type="search" placeholder="Search for Book.." aria-label="Search">
                <button class ="btn btn-outline-success" type="submit" name="ok">Search </buton>
                
            </form>     
        </div>
        <!-- end container-fluid -->
    </nav>

    <?php include "top.php"?>
    <!-- start explore -->
    <div class="container-fluid my-explore">
        <h1 class="row justify-content-md-center">Sách mới nhất</h1>
        <div class="row row1 my-row">
            <div class="col-md-4">
            </div>
            <div class="row">
					<div class="products">
	<?php
  
  $conn = mysqli_connect('localhost','root','','bookstore');
  if(!$conn){
    die("Không thể kết nối");
                         }
  $sql="SELECT*FROM products" ;
  $result = mysqli_query($conn,$sql); 
  if(mysqli_num_rows($result)>0){
        
  while ($row = mysqli_fetch_assoc($result)){
 

    ?>
      
    <div class="row">
               <div class="col-md-3 col-sm-6 col-12">
                    <div class="card card-product mb-3">
                        <img class="card-img-top" src="<?php echo $row['feature_image']?>" alt="Card image cap"width:40%>
                        </div>
                        <div name = "product" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></div>
                            
                       <div class="col-md-4">
                        <p><?php echo $row['pro_title']?></p>
                        <p><?php echo $row['pro_price']?></p>
                        </div>
                        </div>

                        <?php
                        }
                    }
                ?>
    <!-- end explore -->
    <?php include "footer.php" ?>