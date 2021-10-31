<?php include "../admin/header.php" ?>
<?php include "../admin/config.php" ?>
<link rel="stylesheet" href="css/adm.css">


<div class="container">
    <h2 class="admin-heading">Thêm sản phẩm mới</h2>

<?php 
            if(isset($_SESSION['Add']))
            {
                echo $_SESSION['Add'];
                unset($_SESSION['Add']);
            }
?>

<?php 

            //Kiểm tra xem có nhấp vào "Thêm sản phẩm" không
            if(isset($_POST['btnAddPro']))
            {
              
                //1.lấy dữ liệu từ form gọi lên
                $pro_title    = $_POST['pro_title'];
                $description  = $_POST['pro_desc'];
                $pro_price    = $_POST['pro_price'];
                $pro_cat      = $_POST['category'];
                $pro_quantity = $_POST['quantity'];
                $pro_code     = $_POST['pro_code'];
              
               

                //2. tải lên hình ảnh được chọn
                
                if(isset($_FILES['feature_image']['name']))
                {
                    //Nhận thông tin chi tiết của hình ảnh đã chọn
                    $image_name  = $_FILES['feature_image']['name'];
                    $starget_dir = "../images/"; //thư mục sẽ lưu ảnh

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($image_name!="")
                    {
                    
                       
                        // đường dẫn nguồn vị trí hiện tại của ảnh -thư mục tạm
                        $src = $_FILES['feature_image']['tmp_name'];

                        //đường dẫn cho hình ảnh được tải lên               
                        $starget_file =  $starget_dir.$image_name;

                        //cập nhật hình ảnh
                        $upload = move_uploaded_file($src, $starget_file );

                        //kiểm tra xem hình ảnh có được tải lên không
                        if($upload==false)
                        {
                            
                            
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location: admin/add_pro.php');
                            //STop the process
                            die();
                        } 

                    }

                }

                //3. Insert Into Database

                //tạo câu lệnh truy vấn
                
                $sql2 = "INSERT INTO products SET 
                        pro_code      = '$pro_code',
                        pro_cat       = '$pro_cat',
                        pro_title     = '$pro_title',
                        pro_price     = $pro_price,
                        pro_desc      = ' $description',                       
                        feature_image = '$image_name',
                        quantity      = '$pro_quantity' ";

                //thực thi
                $result2 = mysqli_query($conn, $sql2);

                
                //4.kiểm tra
                if($result2 == true)
                {
                    header('location:'.SITEURL.'/admin/products.php');
                    $_SESSION['Add'] = "<div class='error'>Food Added Successfully.</div>";
                    
                }
                else
                {
                    //FAiled to Insert Data
                    header('location:../admin/products.php');
                    $_SESSION['Add'] = "<div class='error'>Failed to Add Product.</div>";
                    
                   
                }

                
            }

?>

    <form action="" id="createProduct" class="add-post-form row" method="post" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Product Title</label>
                    <input type="text" class="form-control" name="pro_title" placeholder="Product Title" requried value=""/>
                </div>
                <br>
                <div class="form-groups">
                    <label for="">Product Category</label>
                    <select name="category">

                            <?php 
                                //hiển thị các danh mục từ Cơ sở dữ liệu
                                //1. tạo truy vấn
                                $sql    = "SELECT * FROM categories";
                                
                                //thực thi
                                $result = mysqli_query($conn, $sql);

                                //Đếm hàng để kiểm tra xem có category hay không
                                $count  = mysqli_num_rows($result);
                               
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        //lấy thông tin chi tiết của các loại
                                        $id    = $row['cate_id'];
                                        $title = $row['cate_title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>

                    </select>
                </div>
                <!-- end category -->
                <br>
                <div class="form-group">
                    <label for="">Product Description</label>
                    <textarea class="form-control" name="pro_desc" rows="8" cols="80" requried></textarea>
                </div>
                <!--<div class="show-error"></div>-->
            </div>
            <!-- end col md 9 -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Featured Image</label>
                    <input type="file" class="pro_image" requried name="feature_image">
                    <img id="image" src="" width="150px"/>
                </div>
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" class="form-control" name="pro_price" requried value="">
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity" requried value="">
                </div>
                <div class="form-group">
                    <label for="">Product Code</label>
                    <input type="text" class="form-control" name="pro_code" requried value="">
                </div>
                <br>
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit" name="btnAddPro">Thêm sản phẩm</button>
                </form>
            </div>
    </form>



</div> <!--end container-->



<?php include "../footer.php" ?>