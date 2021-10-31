
<head>
    <title>Quản lý người dùng</title>
    <h1 class="bg-light">Hệ thống quản lý người dùng</h1>
</head>
    <?php
    include 'header.php';
?>

<main>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Tên đăng nhập</th>
                </tr>
            </thead>
            <tbody>
            
                <?php
                    include '../config.php';
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT*FROM user";
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                       while($row=mysqli_fetch_assoc($result)){
                           echo '<tr>';
                           echo '<th scope="row">'.$row['id'].'</th>';
                           echo '<td>'.$row['user_name'].'</td>';
                           echo '<td>'.$row['password'].'</td>';
                           echo '<td>'.$row['name'].'</td>';
                          // echo'<td><a href="index.php">Chi tiết</a></td>';
                           echo '<td><a href="useredit.php?id='.$row['id'].'"><i class="fas fa-user-edit"></i></a></td>';
                          //echo '<td><a href="layout.php?id='.$row['id'].'"><i class="fas fa-user-times"></i></a></td>';
                           echo '</tr>';
                       }
                    }
                ?>
                
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
            </tbody>
            </table>
    </main>
<?php
include'footer.php';
?>

</html>

