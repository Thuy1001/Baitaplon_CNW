<?php include "../admin/header.php" ?>
<?php include "../config.php" ?>
<link rel="stylesheet" href="css/adm.css">


    <?php
        
        if(isset($_GET['pro_id']))
        {
            
            $pro_id = $_GET['pro_id'];

            
            //câu lệnh truy vấn
            $sql = "SELECT * FROM products WHERE pro_id = '$pro_id'";

            //thực thi
            $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result

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
                       $pro_id        = $row['pro_id'];
                       $pro_code      = $row['pro_code'];
                       $pro_title     = $row['pro_title'];
                       $pro_cat       = $row['pro_cat'];
                       $pro_price     = $row['pro_price'];
                       $pro_desc      = $row['pro_desc'];
                       $pro_quantity  = $row['quantity'];
                       $feature_image = $row['feature_image'];                 
                      
                   }
                  
               }
               
         }
        else
        {   echo 'LỖI RỒI :)';
          
        }
        
    ?>

<?php 


if(isset($_POST['btnEditPro']))
{

    
    //1. nhận dữ liệu từ form
        $pro_id       = $_POST['pro_id'];
        $pro_title    = $_POST['pro_title'];
        $description  = $_POST['pro_desc'];
        $pro_price    = $_POST['pro_price'];
        $pro_cat      = $_POST['pro_cat'];
        $pro_quantity = $_POST['quantity'];
        $pro_code     = $_POST['pro_code'];
        $pro_desc     = $_POST['pro_desc'];


        if(isset($_FILES['feature_image']['name']))
        {
            //Nhận thông tin chi tiết của hình ảnh đã chọn
            $feature_image = $_FILES['feature_image']['name'];
            $starget_dir   = "../images/"; //thư mục sẽ lưu ảnh

            //Kiểm tra xem hình ảnh có được chọn hay không và chỉ tải lên hình ảnh nếu được chọn
            if($feature_image!="")
            {
            
               
                // đường dẫn nguồn vị trí hiện tại của ảnh -thư mục tạm
                $src = $_FILES['feature_image']['tmp_name'];

                //đường dẫn cho hình ảnh được tải lên               
                $starget_file =  $starget_dir.$feature_image;

                //Finally Uppload the food image
                $upload = move_uploaded_file($src, $starget_file );

                //check whether image uploaded of not
                if($upload==false)
                {
                    //Failed to Upload the image
                    
                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                    header('location: admin/add_pro.php');
                    //STop the process
                    die();
                } 

            }

        }

    //. Insert Into Database

    //Create a SQL
    $sql3 = "UPDATE products SET 
            pro_code      = '$pro_code',
            pro_title     = '$pro_title',
            pro_price     = '$pro_price',
            pro_desc      = '$pro_desc',
            feature_image = '$feature_image',
            quantity      ='$pro_quantity'
            WHERE pro_id  = $pro_id
        ";

    //Execute the Query
    $result3 = mysqli_query($conn, $sql3);

    //CHeck whether data inserted or not
    //4. Redirect with MEssage to Manage Food page
    if($result3 == true)
    {
        $_SESSION['Add'] = "<div class='error'>Cập nhật sản phẩm thành công</div>";
        header('location:../admin/products.php');
    }
    else
    {
        //FAiled to Insert Data
        $_SESSION['Add'] = "<div class='error'>Cập nhật sản phẩm thất bại</div>";
        header('location:../admin/products.php');
    }
}

?>

<div class="container">
    <h2 class="admin-heading">Sửa thông tin sản phẩm</h2>

        <form action="" class="add-post-form row" method="POST" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Product Title</label>
                        <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>"/>
                        <input type="text" class="form-control" name="pro_title" value="<?php echo $pro_title; ?>"
                        placeholder="Product Title" requried/>
                    </div>
                    <br>
                    <div class="form-groups">
                        <label for="">Product Category</label>
                        <select name="pro_cat" value="<?php echo $pro_cat; ?>">

                                <?php 
                                   
                                    //1. CReate SQL 
                                    $sql    = "SELECT * FROM categories";
                                    
                                    //Executing qUery
                                    $result = mysqli_query($conn, $sql);

                                    // Đếm hàng để kiểm tra xem chúng ta có categories hay không
                                    $count  = mysqli_num_rows($result);
                               
                                    if($count>0)
                                    {
                                        //WE have categories
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            //get the details of categories
                                            $id    = $row['cate_id'];
                                            $title = $row['cate_title'];

                                            ?>

                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                    
                                        ?>
                                        <option value="0">No Category Found</option>
                                        <?php
                                    }
                                

                                  
                                ?>

                        </select>
                    </div>
                    <!-- end category -->
                    <br>
                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea class="form-control" name="pro_desc" rows="8" cols="80" requried><?php echo  $pro_desc; ?></textarea>
                    </div>
                    
                </div>
                <!-- end col md 9 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Featured Image</label>
                        <input type="file" class="pro_image" name="feature_image" value="<?php echo  $feature_image; ?>">
                        <img id="image" src="" width="150px" />
                    </div>
                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" class="form-control" name="pro_price" value="<?php echo  $pro_price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="<?php echo $pro_quantity; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Product Code</label>
                        <input type="text" class="form-control" name="pro_code" value="<?php echo $pro_code ?>"">
                    </div>
                    <br>
                    <form class="d-flex">
                        <button class="btn btn-outline-success" type="submit" name="btnEditPro">Cập nhật</button>
                    </form>
                </div>
        </form>

        

    </div> <!--end container-->
<?php include "../footer.php" ?>