<?php
    session_start(); //Dịch vụ bảo vệ
    if(!isset($_SESSION['ad_name'])){
        header("Location:../admin/index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet"   href="css/style1.css">
</head>
<body>
     <form action="process-login.php" method="post">
     	<h2>Đăng nhập</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Tên admin</label>
     	<input type="text" name="ad_name" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="ad_pass" placeholder="Password"><br>

     	<button type="submit">Đăng nhập</button>
     </form>
</body>
</html>