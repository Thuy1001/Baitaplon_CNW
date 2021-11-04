
    <?php
    include 'header.php';
?>

<head>
    <title>Quản lý người dùng</title>
    <h1 class="bg-light"style="margin-left: 10%;">Hệ thống quản lý người dùng</h1>
</head>
<main>
<div class="container">
               <div class="col-md-offset-8 col-md-2">
                        <div class="dropdown">
                            <a href="" class="dropdown-toggle logout" data-toggle="dropdown">
                                <?php
                                if(!session_id()){
                                    session_start();
                                }
                                echo 'Hi '.$_SESSION['ad_name']; ?>
                                <span class="caret"></span></a>
                            </div>
                </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
            
            <?php 
                $conn=mysqli_connect('localhost','root','','bookstore');
                if(!$conn){
                die("không thể kết nối");
      } 
          
                    $sql = "SELECT*FROM user";
                    $result = mysqli_query($conn,$sql); 
                    if(mysqli_num_rows($result)>0){
                       while($row=mysqli_fetch_assoc($result)){
                           echo '<tr>';
                           echo '<th scope="row">'.$row['id'].'</th>';
                           echo '<td>'.$row['user_name'].'</td>';
                           echo '<td>'.$row['password'].'</td>';
                           echo '<td>'.$row['name'].'</td>';
                           echo '<td><a href="useredit.php?id='.$row['id'].'"><i class="fas fa-user-times"></i></a></td>';
                           echo '</tr>';
                       }
                    }
                ?>
            </tbody>
            </table>
                </div>
    </main>
<?php
include'footer.php';
?>

</html>

