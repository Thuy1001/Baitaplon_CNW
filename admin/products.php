
<?php include "../admin/header.php" ?>
<?php include "../admin/config.php" ?>
<link rel="stylesheet" href="css/adm.css">


<?php 
                    if(isset($_SESSION['Add']))
                    {
                        echo $_SESSION['Add'];
                        unset($_SESSION['Add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

<div class="container">

    <nav class="navbar ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tất cả sản phẩm</a>
            
            <?php 
                    if(isset($_SESSION['btnAdd']))
                    {
                        echo $_SESSION['btnAdd'];
                        unset($_SESSION['btnAdd']);
                    }
            ?>
                <form class="d-flex" action="../admin/add_pro.php">
                    <button class="btn btn-outline-success" type="submit" name="btnAdd">Thêm sản phẩm</button>
                </form>
            
        </div>
    </nav>

    <!-- table -->
    <table class="table table-bordered">
        <div class="table-responsive">           
                <thead>
                    <tr> 
                        <th>#</th>
                        <th>Tên Sách</th>
                        <th>Thể Loại</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Hình ảnh</th>
                        <th width="100px">Action</th>
                
                    </tr>
                </thead>
            <tbody>
                <?php 
                     //SQL
                     $sql = "SELECT * FROM products";

                     //thực thi sql
                     $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result

                     //Đếm hàng để kiểm tra xem chúng ta có product hay không
                     $count = mysqli_num_rows($result);

                     //Create Serial Number VAriable and Set Default VAlue as 1
                     $sn=1;

                     if($count>0)
                        {
                            //có product trên csdl
                            //Lấy product từ Cơ sở dữ liệu và Hiển thị
                            while($row=mysqli_fetch_assoc($result))
                            {
                                //lấy các giá trị từ các cột                              
                                $pro_id       = $row['pro_id'];
                                $pro_title    = $row['pro_title'];
                                $pro_cat      = $row['pro_cat'];
                                $pro_price    = $row['pro_price'];
                                $pro_desc     = $row['pro_desc'];
                                $pro_quantity = $row['quantity'];
                                $image_name   = $row['feature_image'];                 
                            
                        
                ?>
                
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $pro_title; ?></td>
                                    <td><?php echo $pro_cat; ?></td>
                                    <td><?php echo $pro_price; ?></td>
                                    <td><?php echo $pro_quantity; ?></td>
                                    
                                    <td>
                                        <?php  if($row['feature_image'] != ''){ ?>
                                                <img src="../images/<?php echo $row['feature_image']; ?>" alt="<?php echo $row['feature_image']; ?>" width="100px"/>
                                        <?php }else{ ?>
                                            <img src="../images/index.png" alt="" width="100px"/>
                                        <?php } ?>
                                    </td>
                                    
                                    <td>
                                            <a href="<?php echo SITEURL; ?>admin/edit_pro.php?pro_id=<?php echo $pro_id;  ?>"><i class="fa fa-edit"></i></a>
                                           
                                            <a href="<?php echo SITEURL; ?>admin/delete_pro.php?pro_id=<?php echo $pro_id; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
                                            
                                    </td>   
                                </tr>
                    <?php  
                            }  
                        }        
                        else
                        {
                            //không có product được thêm vào csdl
                            echo "<tr> <td colspan='7' class='error'> Product not Added Yet. </td> </tr>";
                        }
                    ?>
                
            </tbody>
       
                        
       
                          
             
         </div> <!--table-responsive-->
    </table>
    <!-- end table -->

</div> <!--end container-->
<div class="clearfix"></div>

<?php include "../footer.php" ?>