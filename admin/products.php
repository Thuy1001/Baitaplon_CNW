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
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>       -->

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
                        <th>Product Code</th>                  
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th width="100px">Action</th>
                
                    </tr>
                </thead>
            <tbody>
                <?php 
                     //Create a SQL Query to Get all the Food
                     $sql = "SELECT * FROM products";

                     //Execute the qUery
                     $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result

                     //Count Rows to check whether we have foods or not
                     $count = mysqli_num_rows($result);

                     //Create Serial Number VAriable and Set Default VAlue as 1
                     $sn=1;

                     if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($result))
                            {
                                //get the values from individual columns                              
                                $pro_id = $row['pro_id'];
                                $pro_code = $row['pro_code'];
                                $pro_title = $row['pro_title'];
                                $pro_cat = $row['pro_cat'];
                                $pro_price = $row['pro_price'];
                                $pro_desc = $row['pro_desc'];
                                $pro_quantity = $row['quantity'];
                                $image_name = $row['feature_image'];                 
                                //$action                              
                                 ?>
                
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $pro_code; ?></td>
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
                                            <a href="<?php echo SITEURL; ?>admin/edit_pro.php?id=<?php echo $pro_id;  ?>"><i class="fa fa-edit"></i></a>
                                           
                                            <a href="<?php echo SITEURL; ?>admin/delete_pro.php?id=<?php echo $pro_id; ?>"><i class="fa fa-trash"></i></a>
                                            
                                    </td>   
                                </tr>
                
            </tbody>
        </div> <!--table-responsive-->
        <?php
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>
    </table>
    <!-- end table -->

</div> <!--end container-->

<?php include "../footer.php" ?>