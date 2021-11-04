<!-- <link rel="stylesheet" href="../admin/css/style1.css"> -->
<?php
    include 'header.php';
    
?>
<head>
    <title>Quản lý Admin</title>
    <h1 class="bg-light" style="margin-left: 10%;">Hệ thống quản lý Admin</h1>
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
       
        <!-- Quy trình 4 bước -->
        <a href="addadmin.php" class="btn btn-success"><i class="fas fa-user-plus"></i> Thêm Nhân viên</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">STT</th>
                    <th scope="col">Tên admin</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Chỉnh sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                <?php 
                   $conn=mysqli_connect('localhost','root','','bookstore');
                  if(!$conn){
                  die("không thể kết nối");
                 }
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT*FROM admins";
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                       while($row=mysqli_fetch_assoc($result)){
                           echo '<tr>';
                           echo '<th scope="row">'.$row['ad_id'].'</th>';
                           echo '<td>'.$row['ad_name'].'</td>';
                           echo '<td>'.$row['ad_pass'].'</td>';
                           echo '<td>'.$row['ad_email'].'</td>';
                           echo '<td>'.$row['ad_phone'].'</td>';
                           echo '<td>'.$row['ad_address'].'</td>';
                           echo '<td><a href="editadmin.php?id='.$row['ad_id'].'"><i class="fas fa-user-edit"></i></a></td>';
                           echo '<td><a href="deleteadmin.php?id='.$row['ad_id'].'"><i class="fas fa-user-times"></i></a></td>';
                           echo '</tr>';
                       }
                    }
                ?>
                
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
            </tbody>
            </table>
                </div>
    </main>
    
<?php
    include 'footer.php';
?>