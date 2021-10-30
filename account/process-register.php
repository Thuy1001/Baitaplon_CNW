
<?php
include '../config.php';
if(isset($_POST['sbmRegister'])){
  if(empty($_POST['txtUser']) or empty($_POST['txtPass1'])){
    $alert ="Vui lòng không để trống";
}else{
     $user =$_POST['txtUser'];
     $email =$_POST['txtEmail'];
     $pass1 =md5($_POST['txtPass1']);
     $pass2 =($_POST['txtPass2']);
     $phone=$_POST['phone'];
     $address=$_POST['txtaddress']; 
   }
if($pass2!=$pass1){
   $alert ="mật khẩu không đúng";}
}
$sql="SELECT * FROM users WHERE user_email='$email' OR user_name='$user'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)!=0){
  header_("Location:register.php")
}
else{
    $sql2= "INSERT INTO users(user_name,user_email, user_pass,mobile,address) VALUES ('$user','$email','$pass1','$phone','$address')";
   $result2= mysqli_query($conn,$sql2);
    if($result2>=1){
    header("Location:login.php");  
  //$alert="Đăng nhập thành công";
}
}

?>
