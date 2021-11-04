
<?php
 include 'header.php'; 
 include 'config.php';?>
<link rel="stylesheet" href="css/adm.css">
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>

        <div class="col-4 text-center">

            <?php 
                //Sql Query 
                $sql   = "SELECT * FROM categories";
                //Execute Query
                $res   = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">

            <?php 
                //Sql Query 
                $sql2 = "SELECT * FROM products";
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                //Count Rows
                $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Product
        </div>

        
        <div class="col-4 text-center">

            <?php 
                //Sql Query 
                $sql3 = "SELECT * FROM admins";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Admins
        </div>

        <div class="col-4 text-center">

         <?php 
              //Sql Query 
              $sql4 = "SELECT * FROM user";
              //Execute Query
              $res4 = mysqli_query($conn, $sql4);
             //Count Rows
             $count4 = mysqli_num_rows($res4);
          ?>

          <h1><?php echo $count4; ?></h1>
          <br />
          Users
        </div>

        <div class="col-4 text-center">
            
            <?php 
                //câu lệnh sql
                $sql5 = "SELECT * FROM orders";
                //thực hiện truy vấn
                $res5 = mysqli_query($conn, $sql5);
                //đến số cột
                $count5 = mysqli_num_rows($res5);
            ?>

            <h1><?php echo $count5; ?></h1>
            <br />
            Total Orders
        </div>
        
        <div class ="col-4 text-center">

            <?php 
        
                //Tạo truy vấn SQL để nhận tổng hợp đã tạo
                
                $sql6 = "SELECT SUM(total_amount) AS Total FROM orders WHERE confirm =1";

                
               $res6 = mysqli_query($conn, $sql6);
                
                $row6 = mysqli_fetch_assoc($res6);
                $total_revenue = $row6['Total']
            ?>
            <h1><?php echo $total_revenue; ?></h1>
            <br/>
            Revenue Generated
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('footer.php') ?>