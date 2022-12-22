<?php $page = "HOME"?>
<?php require_once 'public/inc/header.php' ?>
<div class="header-inner">
	<div class="container">
		<div class="cat-nav-head">
			<div class="row">
				<div class="col-lg-3">
					<div class="all-category">
						<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Danh mục</h3>
						<ul class="main-category">
							<?php
							$qr = mysqli_query($conn, "SELECT * FROM `cat` WHERE id_parent = 0");
							while ($row_cat = mysqli_fetch_assoc($qr)) {
								$id = $row_cat['id'];
							?>
								<li><a href="cat.php?id=<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
									<ul class="sub-category">
										<?php
										$qr2 = mysqli_query($conn, "SELECT * FROM `cat` WHERE id_parent = $id");
										while ($row_cat2 = mysqli_fetch_assoc($qr2)) {
										?>
											<li><a href="cat.php?id=<?php echo $row_cat2['id'] ?>"><?php echo $row_cat2['name'] ?></a></li>
										<?php
										}
										?>
									</ul>
								</li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<div class="menu-area">
						<?php require_once 'public/inc/navbar.php' ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<section class="hero-slider">
	<div class="single-slider" style=" background-image: url('public/images/slide-img1.jpg');">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-12 ">
					<div class="text-inner">
						<div class="row">
							<div class="col-lg-12">
								<div class="hero-text">
									<h1><span style="font-size: 30px; color:aliceblue">UP TO 50% OFF </span>Free ship</h1>
									<div class="button">
										<a href="shop-grid.html" class="btn">Mua hàng ngay</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="header-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content flex_box">
                    <div class="ti-truck ico">&nbsp;</div>
                    <span><strong>Miễn phí vận chuyển</strong><br> cho đơn hàng trên 2 triệu</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content flex_box">
                    <div class="ti-help-alt ico">&nbsp;</div>
                    <div><strong>Hỗ trợ khách hàng</strong><br>trong giờ hành chính</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content flex_box">
                    <div class="ti-money ico">&nbsp;</div>
                    <span><strong>Đổi trả trong 30 ngày</strong><br>nếu có lỗi của nhà sản xuất</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="content flex_box">
                    <div class="ti-star ico">&nbsp;</div>
                    <span><strong class="orange">Giảm 5% cho đơn trên 5 triệu</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="product-area most-popular section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Sản phẩm nổi bật</h3>
				</div>
			</div>
		</div>
		<div class="row" id="load">
			<div class="col-12">
				<div class="owl-carousel popular-slider">

					<?php
					$qr_select = mysqli_query($conn, "SELECT * FROM `products` WHERE sp_hot = 1 ORDER BY id DESC");
					while ($row_product = mysqli_fetch_assoc($qr_select)) {
					?>
						<div class="single-product">
							<div class="product-img">
								<a href="product-detail.php?id=<?php echo $row_product['id'] ?>&id_cat=<?php echo $row_product['id_cat']?>">
									<img class="default-img" src="admin/upload/<?php echo $row_product['image'] ?>" alt="#">
									<img class="hover-img" src="admin/upload/<?php echo $row_product['image'] ?>" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action-2">
										<input type="hidden" value="1" name="num" id="num">
										<button class="btn" onclick="add_cart(<?php echo $row_product['id'] ?>)">Thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html"><?php echo $row_product['name_product'] ?></a></h3>
								<div class="product-price">
									<h3 style="color : #FF9933"> <?php echo number_format($row_product['price'])?> đ</h3>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</div>

<section class="shop-blog section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Bài viết mới</h3>
				</div>
			</div>
		</div>
		
		<div class="row">
        <?php 
         $qr = mysqli_query($conn,"SELECT * FROM blog ORDER BY id DESC LIMIT 3");
         while($row_blog = mysqli_fetch_assoc($qr)) {
        ?>
            <div class="col-6 col-md-4">
                <div class="shop-single-blog">
                    <img src="admin/upload/<?php echo $row_blog['img']?>" alt="#">
                    <div class="content">
                        <p class="date"><?php echo $row_blog['created_at']?></p>
                         <h6><?php echo $row_blog['name']?></h6>
                        <a href="blog-single-sidebar.php?id=<?php echo $row_blog['id']?>" class="more-btn">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php 
         }
        ?>
        </div>
		
	</div>
</section>

<?php require_once 'public/inc/footer.php' ?>
