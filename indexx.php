<?php include "header.php"?>
<?php include "config.php"?>
<style>
.container{
    width:90%;
    margin:auto;
    display:flex;
    }
.product{
    display: flex;
    flex-wrap:wrap;
}   
.image img {
    width:75%;
} 
.cart{
    width:30%;
}
.btn-detail {
    background-color: #3a5c83 !important;
    color: white !important;
    width: 40%;
    height: 30px;
}
</style>

<?php $sql="SELECT*FROM products";
        $result=mysqli_query($conn,$sql);?>
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
?>
<div class="container">
    <div class="product">
        <?php
            foreach($result as $value){?>
         <!--<? //echo $row['pro_id']?>" class="btn btn-info btn-add-to-cart"><i class="fas fa-shopping-cart"></i></a>-->
            
            <div class ="cart">
                    <div class="image">
                        <img src="<?php echo $value['feature_image'];?>">
                    </div>
                    <div class="name ">
                        <p><?php echo $value["pro_title"];?></p>
                    </div>
                    <div class="price">
                        <p><?php echo number_format($value["pro_price"]);?></p>
                    </div>
                    <a href="details.php?pro_id=<?php echo $value['pro_id'];?>"class="btn btn-outline-info btn-detail">Xem chi tiết</a>
                </div>
            </a>
                
            <?php
            }
            ?>
    </div>
</div>

           
        
            
