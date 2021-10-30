<?php include "../admin/header.php" ?>
<?php include "../config.php" ?>
<link rel="stylesheet" href="css/adm.css">


    <?php 
        //CHeck whether id is set or not 
        if(isset($_GET['pro_id']))
        {
            //Get all the details
            $pro_id = $_GET['pro_id'];

            
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM products";

            //Execute the qUery
            $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result

            //Count Rows to check whether we have foods or not
            $count = mysqli_num_rows($result);

            //Create Serial Number VAriable and Set Default VAlue as 1
            //$sn=0;

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
                   }
                  
               }
               
        }
        else
        {   echo 'LỖI RỒI :)';
            //Redirect to Manage Food
            //header('location:'.SITEURL.'admin/products.php');
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
                        <select name="pro_cat">

                                <?php 
                                    //Create PHP Code to display categories from Database
                                    //1. CReate SQL to get all active categories from database
                                    $sql = "SELECT * FROM categories";
                                    
                                    //Executing qUery
                                    $result = mysqli_query($conn, $sql);

                                    //Count Rows to check whether we have categories or not
                                    $count = mysqli_num_rows($result);

                                    //IF count is greater than zero, we have categories else we donot have categories
                                    if($count>0)
                                    {
                                        //WE have categories
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            //get the details of categories
                                            $id = $row['cate_id'];
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
                        <textarea class="form-control" name="pro_desc" rows="8" cols="80" requried><?php echo $_GET['pro_desc']; ?></textarea>
                    </div>
                    <!--<div class="show-error"></div>-->
                </div>
                <!-- end col md 9 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Featured Image</label>
                        <input type="file" class="pro_image" name="feature_image" value="<?php echo $row2['featured_image']; ?>">
                        <img id="image" src="" width="150px" />
                    </div>
                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" class="form-control" name="pro_price" value="<?php echo $rows2['pro_price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="<?php echo $rows2['quantity']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Product Code</label>
                        <input type="text" class="form-control" name="pro_code" value="<?php echo $rows2['pro_code']; ?>"">
                    </div>
                    <br>
                    <form class="d-flex">
                        <button class="btn btn-outline-success" type="submit" name="btnEditPro">Cập nhật</button>
                    </form>
                </div>
        </form>

        <?php 

        //CHeck whether the button is clicked or not
        if(isset($_POST['btnEditPro']))
        {

            //Add the Prodcuts in Database
            //echo "Clicked";
            
            //1. Get the DAta from Form
                $pro_id       = $_POST['pro_id'];
                $pro_title    = $_POST['pro_title'];
                $description  = $_POST['pro_desc'];
                $pro_price    = $_POST['pro_price'];
                $pro_cat      = $_POST['pro_cat'];
                $pro_quantity = $_POST['quantity'];
                $pro_code     = $_POST['pro_code'];
        
        

            //2. Upload the Image if selected
            
            if(isset($_FILES['feature_image']['name']))
            {
                //Get the details of the selected image
                $image_name = $_FILES['feature_image']['name'];

                //Check Whether the Image is Selected or not and upload image only if selected
                if($image_name!="")
                {
                    // Image is SElected
                    //A. REnamge the Image
                
                    //B. Upload the Image
                    //Get the Src Path and DEstinaton path

                    // Source path is the current location of the image
                    $src = $_FILES['feature_image']['tmp_name'];

                    //Destination Path for the image to be uploaded
                    $dst = "../images/".$image_name;

                    //Finally Uppload the food image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded of not
                    if($upload==false)
                    {
                        //Failed to Upload the image
                        //REdirect to Add Food Page with Error Message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location: admin/add_pro.php');
                        //STop the process
                        die();
                    } 

                }

            }

            //3. Insert Into Database

            //Create a SQL Query to Save or Add food
            // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
            $sql3 = "UPDATE products SET 
                    pro_code      = '$pro_code',
                    pro_title     = '$pro_title',
                    pro_price     = '$pro_price',
                    pro_desc      = '$pro_desc',
                    feature_image = '$feature_image',
                    quantity      ='$quantity'
                    WHERE pro_id  = $pro_id
                ";

            //Execute the Query
            $result3 = mysqli_query($conn, $sql3);

            //CHeck whether data inserted or not
            //4. Redirect with MEssage to Manage Food page
            if($result3 == true)
            {
                $_SESSION['Add'] = "<div class='error'>Food Added Successfully.</div>";
                header('location:../admin/products.php');
            }
            else
            {
                //FAiled to Insert Data
                $_SESSION['Add'] = "<div class='error'>Failed to Add Product.</div>";
                //header('location:'.SITEURL.'../admin/products.php');
                header('location:../admin/products.php');
            }

            
        }

        ?>

    </div> <!--end container-->
<?php include "../footer.php" ?>