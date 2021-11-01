
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Quản lý nhân viên </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div id="admin-header center">
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
    <div class="col-md-6  ">
        <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="../bookstores/index.php"><i class="fas fa-home"></i> Trang chủ</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="../account/loginadm.php"><i class="fas fa-user-shield"></i> Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user.php"><i class="fas fa-user"></i> Người dùng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../account/loginadm.php"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                                </li>
                            </ul>
      </div>
  </body>
</html>
