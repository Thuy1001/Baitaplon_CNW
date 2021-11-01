<?php
    include 'header.php';
    
?>

    <main>
        <!-- Hiển thị BẢNG DỮ LIỆU DANH BẠ CÁ NHÂN -->
        <!-- Kết nối tới Server, truy vấn dữ liệu (SELECT) từ Bảng db_employees -->
        <!-- Quy trình 4 bước -->
        <a href="addadmin.php" class="btn btn-success"><i class="fas fa-user-plus"></i> Thêm Nhân viên</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                    <th scope="col">Tên admin</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                <?php
                    // Quy trình 4 bước
                    // Bước 01: Đã tạo sẵn, gọi lại thôi
                    include '../config.php';
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
                          // echo'<td><a href="index.php">Chi tiết</a></td>';
                           echo '<td><a href="editadmin.php?id='.$row['ad_id'].'"><i class="fas fa-user-edit"></i></a></td>';
                           echo '<td><a href="deleteadmin.php?id='.$row['ad_id'].'"><i class="fas fa-user-times"></i></a></td>';
                           echo '</tr>';
                       }
                    }
                ?>
                
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
            </tbody>
            </table>
    </main>
    
<?php
    include 'footer.php';
?>