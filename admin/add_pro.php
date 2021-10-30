<?php include "../admin/header.php" ?>
<?php include "../config.php" ?>
<link rel="stylesheet" href="css/adm.css">


<div class="container">
    <h2 class="admin-heading">Thêm sản phẩm mới</h2>

    <?php 
            if(isset($_SESSION['btnAdd']))
            {
                echo $_SESSION['btnAdd'];
                unset($_SESSION['btnAdd']);
            }
        ?>

    <form action="" id="createProduct" class="add-post-form row" method="post" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Product Title</label>
                    <input type="text" class="form-control" name="pro_title" placeholder="Product Title" requried/>
                </div>
                <br>
                <div class="form-groups">
                    <label for="">Product Category</label>
                    <select name="category">

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
                    <textarea class="form-control" name="pro_desc" rows="8" cols="80" requried></textarea>
                </div>
                <!--<div class="show-error"></div>-->
            </div>
            <!-- end col md 9 -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Featured Image</label>
                    <input type="file" class="pro_image" name="feature_image">
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

    <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['btnAddPro']))
            {
                //Add the Prodcuts in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $pro_title    = $_POST['pro_title'];
                $description  = $_POST['pro_desc'];
                $pro_price    = $_POST['pro_price'];
                $pro_cat      = $_POST['category'];
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
                $sql2 = "INSERT INTO products SET 
                        pro_code      = '$pro_code',
                        pro_cat       = '$pro_cat',
                        pro_title     = '$pro_title',
                        pro_price     = $pro_price,
                        pro_desc      = ' $description',                       
                        feature_image = '$image_name',
                        quantity      = '$pro_quantity' ";

                //Execute the Query
                $result2 = mysqli_query($conn, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($result2 == true)
                {
                    //Data inserted Successfullly                  
                    //header('location:'.SITEURL.'../admin/products.php');
                    header("location:http://localhost:88/baitaplon/admin/products.php");
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['btnAddPro'] = "<div class='error'>Failed to Add Product.</div>";
                    //header('location:'.SITEURL.'../admin/products.php');
                    //header('location:../admin/products.php');
                }

                
            }

        ?>

</div> <!--end container-->



<?php include "../footer.php" ?>