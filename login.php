<?php require_once 'public/inc/header.php' ?>

<div class="header-inner">
  <div class="container">
    <div class="cat-nav-head">
      <div class="row">
        <div class="col-12">
          <div class="menu-area">
            <?php require_once 'public/inc/navbar.php' ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</header>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="login.html">Đặng nhập</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<div class="container" style="min-height: 500px;">
  <div class="row">
    <div class="col-sm-4">
      <h4>Login</h4>
      <span>Đặng nhập nếu bạn đã có tài khoản</span>
      <br>
      <br>
<?php 
     if(isset($_POST['submit'])){
       $email = $_POST['email'];
       $pwd = md5($_POST['password']);
       $qr = mysqli_query($conn,"SELECT * FROM customers WHERE email = '$email' AND password = '$pwd'");
       $check = mysqli_fetch_assoc($qr);
       if($check) {
         $_SESSION['customer'] = $check;
         if(isset($_GET['action'])) {
            $action = $_GET['action'];
            echo '<script>window.location="checkout.php";</script>';
         } else {
          echo '<script>window.location="index.php";</script>';
         }
         
       } else {
        echo "<script>alert('Email hoặc mật khẩu không đúng!');</script>";
       }
     }
?>
      <form action="" method="POST">
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
      </form>
    </div>

    <div class="col-sm-6">
      <h4>Register</h4>
      <span>Chưa có tài khoản hãy đăng ký ngay để đăng nhập vào hệ thống</span>
      <br>
      <br>  
      <?php
      if (isset($_POST['submit_form'])) {
        $name = $_POST['name'];
        $email = $_POST['email_signup'];
        $pass = md5($_POST['pwd']);
        $qr_select = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");
        $check = mysqli_num_rows($qr_select);
        if ($check > 0) {
          echo "<script>alert('Email này đã tồn tại!');</script>";
        } else {
          $qr_insert = mysqli_query($conn, "INSERT INTO `customers`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')");
          echo "<script>alert('Thành công !');</script>";
        }
      }
      ?>
      <form action="" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Tên hiển thị">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email_signup" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="pwd" placeholder="Mật khẩu">
        </div>
        <button type="submit" name="submit_form" class="btn btn-primary">Đăng ký</button>
      </form>
    </div>
  </div>
</div>
<br>
<br>
<?php require_once 'public/inc/footer.php' ?>