<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet"   href="style.css">
</head>
<body>
     <form action="process-login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="ad_name" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="ad_pass" placeholder="Password"><br>

     	<button type="submit">Admin Login</button>
     </form>
</body>
</html>