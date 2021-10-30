<?php
ob_start();
?>

	
<?php
$title ="BookShop";
$name ="Sach";
?>

    <?php 
	include "header.php"
	?>
 


	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Cart Page//////////////////////-->
	<!--//////////////////////////////////////////////////-->
	<?php 
	if(is_countable($_SESSION['cart']) == 0)
	{
		header('Location: trong.php');
	}
	?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
			<div class="cart">
			<p><?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo "Có ".count($_SESSION['cart']). " sách trong giỏ hàng ";
			 }
			else
			{
				echo   "<p>Không có có Sách nào trong giỏ hàng</p>";
			}
			
			$sl = count($_SESSION['cart']);
			?>
			</p>			
			</div>
			<?php

			require "inc/myconnect.php";

			if(isset($_SESSION['cart']))
			{
				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
				// echo $item;
				$str= implode(",",$item);
			    $query = "SELECT * FROM 'products'
				 WHERE  pro.id  in ($str)";
				$result = $conn->query($query);
				$total=0;
				foreach($result as $s)
				{
			?>

			<div class="row">
			<form name="form5" id="ff5" method="POST" action="removecart.php">
				<div class="product well">
					<div class="col-md-3">
						<div class="image">
							<img src="images/<?php  echo $s["HinhAnh"]?>" style="width:300px;height:300px" />
						</div>
					</div>
					
							<?php
                                 if($s["KhuyenMai"] == true)
								 {                                      
								?>
								<div class="price"><?php  echo $s["giakhuyenmai"]?>.000 VNĐ</div>
								<?php 
								}
								?>
								<?php
                                 if($s["KhuyenMai"] == false)
								 {
								?>
								<div class="price"><?php  echo $s["Gia"]?>.000 VNĐ</div>
								<?php 
								}
								?>

							<label>Số lượng: </label> 
							<input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max ="99" type="number" name ="qty[<?php echo $s["ID"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID"]]?>"> 
						     <div>
								<input type="submit" name="update" style="margin-top:31px"  value="cập nhật Sách này" class="btn btn-2" />
							</div>
							<hr>
							<input type="submit" name="remove" value="xóa Sách này" class="btn btn-default pull-right" />	
							<input type="hidden" name="idsprm" value="<?php echo $s["ID"] ?>" />
							<?php
                                 if($s["KhuyenMai"] == true)
								 {                                      
								?>
									<label style="color:red">Thành tiền: <?php ;
							    echo  $_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"]?>.000  </label> 
								<?php 
								}
								?>
								<?php
                                 if($s["KhuyenMai"] == false)
								 {
								?>
									<label style="color:red">Thành tiền: <?php ;
							    echo  $_SESSION['cart'][$s["ID"]] * $s["Gia"]?>.000  </label> 
								<?php 
								}
								?>
						
						</div>
					</div>

					<div class="clear"></div>
				</div>	
			</form>
			<?php
                                 if($s["KhuyenMai"] == true)
								 {                                      
								?>
											<?php 
				              $total +=$_SESSION['cart'][$s["ID"]] * $s["giakhuyenmai"]?>
								<?php 
								}
								?>
								<?php
                                 if($s["KhuyenMai"] == false)
								 {
								?>
								<?php 
				              $total +=$_SESSION['cart'][$s["ID"]] * $s["Gia"]?>
								<?php 
								}
								?>
		
			</div>
			<?php 
				}
			}
			?>
				
			<div class="row">
			<a href="rmcart.php" class="btn btn-2" style="margin-bottom:31px">Xóa hết giỏ hàng</a>
				<div class="col-md-4 col-md-offset-8 ">
					<center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sách khác</a></center>
				</div>
			<div class="row">
				<div class="pricedetails">
					<div class="col-md-4 col-md-offset-8" >
						<table style="margin-right:31px">
							<h6>Price Details</h6>
							<tr>
								<td>Số lượng sách </td>
								<td><?php echo $sl ?></td>
							</tr>
							<tr style="border-top: 1px solid #333">
								<td><h5>Tổng cộng</h5></td>
								<td><?php echo $total ?>.000</td>
							</tr>
						</table>
						<center><a href="dathang.php" class="btn btn-1">Đặt hàng</a></center>
					</div>
				</div>
			</div>
		</div> 
	</div>	
	</div>
	<?php 
	include "footer.php"
	?>
</body>
</html>
<?php ob_end_flush(); ?>

