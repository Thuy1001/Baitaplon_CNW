

<?php include "header.php" ?>
<?php include "config.php"?>

<?php
        $search=isset($_POST['search'])?$_POST['search']:"";
        if($search){
            $where="WHERE `pro_title` LIKE '%".$search."%'";
        }
             
      if($search){
          
          $sql= mysqli_query($conn,"SELECT*FROM products WHERE `pro_title` LIKE '%".$search."%' ORDER BY `pro_title` ASC") ;
          $result = mysqli_query($conn,"SELECT * FROM products WHERE `pro_title` LIKE '%".$search."%'"); 
      }else{
          
          $sql= mysqli_query($conn,"SELECT*FROM products  ORDER BY 'pro_id'  ASC") ;
          $result = mysqli_query($conn,"SELECT * FROM products");}
       
    
            //câu lệnh truy vấn
           // $sql = "SELECT pro_title, pro_price, pro_desc, feature_image FROM products WHERE pro_id = '$pro_id'";

            //thực thi
           // $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result

          //Đếm hàng để kiểm tra xem chúng ta có product hay không
            $count = mysqli_num_rows($result);

            //Create Serial Number VAriable and Set Default VAlue as 1
            //$sn=0;

            if($count>0)
               {
                   //Lấy product từ Cơ sở dữ liệu và Hiển thị
                   while($row=mysqli_fetch_assoc($result))
                   {
                       //lấy các giá trị từ các cột                              
                       
                       
                       $pro_title     = $row['pro_title']; 
                       $pro_price     =$row['pro_price'];
                       $pro_desc      = $row['pro_desc'];                        
                       $feature_image = $row['feature_image'];

                      
                   }
                  
               }
               
         
        else
        {   echo 'LỖI RỒI :)';
            
            //header('location:index.php');
        }
        
    ?>

    <h3 class="chitiet">Kết quả tìm kiếm</h3>
    <div class = "container my-details">
        <div class="card mb-3" style="max-width: 950px;">
            <div class="row g-0">
                
                    <div class="col-md-4">
                    <img src="images/<?php echo $feature_image?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            
                            <h5 class="card-title">Tên sách: <?php echo $pro_title ?></h5>
                            <p class="card-text"><?php echo $pro_desc?></p>
                            <p class="card-price"><?php echo $pro_price?></p> 
                            <a href ="carts1.php" class="btn btn-info btn-add-to-cart" name="add-to-cart"><i class="fas fa-shopping-cart"></i></a>
                           
                            
                        </div>
                    </div>
    
            </div>
        </div>
    </div> <!--end container-->


        <br><br>
            <?php include 'footer.php'; ?>


      
       
       
      
     

    
           