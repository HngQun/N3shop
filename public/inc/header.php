<?php
session_start();
require_once 'DB/dbConnect.php';
require_once 'DB//utf8tolatintutil.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Shoping - Thương Mai Điện Tử.</title>
	<link rel="icon" type="image/png" href="images/favicon.png">
	<base href="http://localhost/shopma/">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="public/css/bootstrap.css">
	<link rel="stylesheet" href="public/css/magnific-popup.min.css">
	<link rel="stylesheet" href="public/css/font-awesome.css">
	<link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="public/css/themify-icons.css">
	<link rel="stylesheet" href="public/css/niceselect.css">
	<link rel="stylesheet" href="public/css/animate.css">
	<link rel="stylesheet" href="public/css/flex-slider.min.css">
	<link rel="stylesheet" href="public/css/owl-carousel.css">
	<link rel="stylesheet" href="public/css/slicknav.min.css">
	<link rel="stylesheet" href="public/css/reset.css">
	<link rel="stylesheet" href="public/style.css">
	<link rel="stylesheet" href="public/css/responsive.css">
</head>

<body class="js">
	<header class="header shop">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i>0123 456 789 </li>
								<li><i class="ti-email"></i>quandang2812@gmail.com</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<div class="right-content">
							<ul class="list-main">
								<?php
								if (isset($_SESSION['customer'])) {
									$name = $_SESSION['customer']['name'];
								?>
									<li><i class="ti-user"> </i><?php echo $name ?> </li>
									<li><i class="ti-power-off"></i><a href="logout.php">Đăng xuất</a></li>
								<?php
								} else {
								?>
									<li><a href="login.html">Đăng ký</a></li>
									<li><a href="login.html">Đăng nhập</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<div class="logo">
							<a href="index.html"><img src="public/images/logo.png" alt="logo"></a>
						</div>
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">

						
								<form action="search.php" method="GET">
									<input name="search" id="search" placeholder="Tìm kiếm sản phẩm..." type="search">
									<button type="submit" id="search-btn" name="submit">Tìm </button>
								</form>
							</div>
						</div>
					</div>
					
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<?php
							$number = 0;
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $key => $value) {
									$number++;
								}
							}
							?>
							<div class="sinlge-bar shopping">
								<a href="cart.html" class="single-icon"><i class="ti-bag"></i> <span class="total-count" id="numberCart"><?php echo $number ?></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
