<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="process-register.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Họ Tên</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Tên người dùng</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>Mật khẩu</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Nhập lại mật khẩu</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Đăng ký</button>
          <a href="index.php" class="ca">Bạn chưa có tài khoản?</a>
     </form>
</body>
</html>
