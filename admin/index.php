<?php
session_start();
require_once '../DB/dbConnect.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE | Log in</title>
  <base href="http://localhost/shopma/admin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="admin/template/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="admin/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="admin/template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Admin</b></a>
    </div>
    <?php
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $pwd = md5($_POST['password']);
      $qr = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pwd'");
      $infoUser = mysqli_fetch_assoc($qr);
      if ($infoUser) {
        $_SESSION['userAdmin'] = $infoUser;
        header('LOCATION: dashboard');
      } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không đúng !');</script>";
      }
    }
    ?>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Đăng nhập</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Tài khoản">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="admin/template/plugins/jquery/jquery.min.js"></script>
  <script src="admin/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/template/dist/js/adminlte.min.js"></script>
</body>
</html>