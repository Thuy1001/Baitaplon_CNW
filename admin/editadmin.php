<?php
    include 'header.php';
    include 'config.php';

    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "SELECT * FROM admins WHERE ad_id=$id";

    //Execute the Query
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
        while($row =mysqli_fetch_assoc($result)){
            $ad_name=$row['ad_name'];
            $ad_pass = $row['ad_pass'];
            $email = $row['ad_email'];
            $ad_phone = $row['ad_phone'];
            $ad_address = $row['ad_address'];
        }
    }
?>

    <main class="container">
        <h2>Sửa thông tin </h2>
        <form action="process-edit.php" method="post">
            <input type="hidden" class="from-control" name='id'value="<?php echo $id;?>">
            <div class="mb-3">
                <label for="adname" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" name='adname' value="<?php echo $ad_name;?>">
             </div>
             <div class="mb-3">
                <label for="adpass" class="form-label">Mật khẩu</label>
                <input type="pass" class="form-control" name='adpass' value="<?php echo $ad_pass;?>">
             </div>
             <div class="mb-3">
                <label for="ademail" class="form-label">Email</label>
                <input type="email" class="form-control" name='ademail' value="<?php echo $email;?>">
             </div>
             <div class="mb-3">
                <label for="ad_phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name='adphone' value="<?php echo $ad_phone;?>">
             </div>
             <div class="mb-3">
                <label for="adaddress" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name='adaddress' value="<?php echo $ad_address;?>">
             </div>
            
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
        </form>
    </main>
    
<?php
    include 'footer.php';
?>