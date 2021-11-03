
<?php
 include 'header.php'; 
 include 'config.php';?>
<link rel="stylesheet" href="css/adm.css">
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <br><br>

        <div class="col-4 text-center">

            <?php 
                //Sql Query 
                $sql = "SELECT * FROM categories";
                //Execute Query
                $res = mysqli_query($conn, $sql);
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

        <div class="col-4 text-center" style="weight=10%">
            
            <?php 
                //Sql Query 
                $sql3 = "SELECT * FROM orders";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>

        <div class="col-4 text-center">

            <?php 
        
                //Creat SQL Query to Get Total Revenue Generated
                //Aggregate Function in SQL
                $sql4 = "SELECT SUM(total_amount) AS Total FROM orders WHERE confirm =1";

                //Execute the Query
               $res4 = mysqli_query($conn, $sql4);
                //GEt the Total REvenue
                $row4 = mysqli_fetch_assoc($res4);
                $total_revenue = $row4['Total']
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