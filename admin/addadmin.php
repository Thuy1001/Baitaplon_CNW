
<?php
    include '../config.php';
    include 'header.php';
?>

    <main class="container">
        <h2>Thêm thông tin </h2>
        <form action="process-add.php" method="post">
            <div class="form-group row">
                <label for="adname" class="col-sm-2 col-form-label">Tên admin</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="adname" name="adname" >
                </div>
            </div>
            <div class="form-group row">
                <label for="adpass" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                <input type="pass" class="form-control" id="adpass" name="adpass">
                </div>
            </div>
            <div class="form-group row">
                <label for="ademail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="ademail" name="ademail">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="adphone" name="adphone">
                </div>
            </div>
            <div class="form-group row">
                <label for="adaddress" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
              <input type="text" class="form-control" id="adaddress" name="adaddress">
                </div>   
            </div>     
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
            </div>
        </form>
    </main>
<?php
    include 'footer.php';
    
?>