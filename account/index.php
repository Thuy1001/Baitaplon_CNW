<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Tên người dùng</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Mật khẩu</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button name="btnLogin" type="submit">Đăng nhập</button>
          <a href="register.php" class="ca">Tạo tài khoản</a>
     </form>
</body>
</html>