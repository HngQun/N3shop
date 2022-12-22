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

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="shop-grid.html">Sản phẩm</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$id_cat = (isset($_GET['id'])) ? $_GET['id'] : '';
$qr_cat = mysqli_query($conn, "SELECT * FROM cat WHERE id = $id_cat");
$row_cat3 = mysqli_fetch_assoc($qr_cat);
?>

<!-- data san pham -->
<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$show_cat = mysqli_query($conn, "SELECT * FROM `products` WHERE id_cat = $id");
while ($row_show = mysqli_fetch_assoc($show_cat)) {
?>
<?php } ?>
<section class="product-area shop-sidebar shop section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<div class="shop-sidebar">

					<div class="single-widget category">
						<h3 class="title">Danh mục</h3>
						<ul class="categor-list">
							<?php
							$qr1 = mysqli_query($conn, "SELECT * FROM cat WHERE id_parent > 0 ORDER BY id DESC");
							while ($row_cat2 = mysqli_fetch_assoc($qr1)) {
							?>
								<li><a href="cat.php?id=<?php echo $row_cat2['id'] ?>"><?php echo $row_cat2['name'] ?></a></li>
							<?php } ?>
						</ul>
					</div>

				</div>
			</div>

			<!-- hien thi san pham -->
			<div class="col-lg-9 col-md-8 col-12">
				<div class="row">
					<div class="col-12">
						<div class="shop-top">
							<h4><?php echo $row_cat3['name'] ?></h4>
						</div>
					</div>
				</div>
				<div class="row" id="load">
					<?php
					$id = (isset($_GET['id'])) ? $_GET['id'] : '';
					$show_cat = mysqli_query($conn, "SELECT * FROM `products` WHERE id_cat = $id");
					while ($row_show = mysqli_fetch_assoc($show_cat)) {
					?>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-product">
								<div class="product-img">
									<a href="product-detail.php?id=<?php echo $row_show['id'] ?>&id_cat=<?php echo $row_show['id_cat'] ?>">
										<img class="default-img" src="admin/upload/<?php echo $row_show['image'] ?>" alt="#">
										<img class="hover-img" src="admin/upload/<?php echo $row_show['image'] ?>" alt="#">
									</a>
									<div class="button-head">
										<div class="product-action">
											<a data-toggle="modal" data-target="#<?php echo $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
											<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
											<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
										</div>
										<div class="product-action-2">
											<input type="hidden" value="1" id="num" name="num">
											<a title="Add to cart" href="javascript:void(0)" onclick="add_cart(<?php echo $row_show['id'] ?>)">Mua sản phẩm</a>
										</div>
									</div>
								</div>
								<div class="product-content">
									<h3><a href="product-detail.php?id=<?php echo $row_show['id'] ?>&id_cat=<?php echo $row_show['id_cat'] ?>"><?php echo $row_show['name_product'] ?></a></h3>
									<div class="product-price">
										<span><?php echo number_format($row_show['price']) ?> đ</span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once 'public/inc/footer.php' ?>