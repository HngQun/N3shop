<?php $page = "SHOP" ?>
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
						<li class="active"><a href="shop-grid.html">Sản phẩm</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    $sql = mysqli_query($conn, "SELECT * FROM `products`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 9);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 9;
    ?>

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

					<div class="single-widget recent-post">
						<h3 class="title">Mới đăng</h3>

						<?php
						$query = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 3");
						while ($row = mysqli_fetch_assoc($query)) {
						?>
							<div class="single-post first">
								<div class="image">
									<img src="admin/upload/<?php echo $row['image'] ?>" alt="#">
								</div>
								<div class="content">
									<h5><a href="product-detail.php?id=<?php echo $row['id'] ?>&id_cat=<?php echo $row['id_cat'] ?>"><?php echo $row['name_product'] ?></a></h5>
									<p class="price"><?php echo $row['price'] ?></p>
									<ul class="reviews">
										<li class="yellow"><i class="ti-star"></i></li>
										<li class="yellow"><i class="ti-star"></i></li>
										<li class="yellow"><i class="ti-star"></i></li>
										<li><i class="ti-star"></i></li>
										<li><i class="ti-star"></i></li>
									</ul>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-12">
				<div class="row">
					<div class="col-12">
						<div class="shop-top">
							<h4>Tất cả sản phẩm</h4>
						</div>
					</div>
				</div>
				<div class="row" id="load">
					<?php
					$qr = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT $offset,9");
					while ($row_pr = mysqli_fetch_assoc($qr)) {
						$id = $row_pr['id'];
					?>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-product">
								<div class="product-img">
									<a href="product-detail.php?id=<?php echo $row_pr['id'] ?>&id_cat=<?php echo $row_pr['id_cat'] ?>">
										<img class="default-img" src="admin/upload/<?php echo $row_pr['image'] ?>" alt="#">
										<img class="hover-img" src="admin/upload/<?php echo $row_pr['image'] ?>" alt="#">
									</a>
									<div class="button-head">
										<div class="product-action">
											<a data-toggle="modal" data-target="#<?php echo $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
											<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
											<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
										</div>
										<div class="product-action-2">
											<input type="hidden" value="1" id="num" name="num">
											<a title="Thêm vào giỏ hàng" href="javascript:void(0)" onclick="add_cart(<?php echo $row_pr['id'] ?>)">Thêm vào giỏ hàng</a>
										</div>
									</div>
								</div>
								<div class="product-content">
									<h3><a href="product-detail.php?id=<?php echo $row_pr['id'] ?>&id_cat=<?php echo $row_pr['id_cat'] ?>"><?php echo $row_pr['name_product'] ?></a></h3>
									<div class="product-price">
										<span><?php echo number_format($row_pr['price']) ?> đ</span>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
				<div class="col-sm-6" style="text-align: right;">
					<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
						<nav aria-label="...">
							<ul class="pagination" style="display:flex">
								<?php
								if ($current_page > 1) {
									$previous = $current_page - 1;

								?>
									<li class="page-item">
										<a class="page-link" href="shop-grid.php?page=<?php echo $previous ?>"><<</a>
											
									</li>
								<?php } ?>
								<?php
								for ($i = 1; $i <= $nume_page; $i++) {
									$active = '';
									if ($i == $current_page) {
										$active = 'active';
									}
								?>
									<li class="page-item <?php echo $active ?>">
										<a class="page-link" href="shop-grid.php?page=<?php echo $i ?>"><?php echo $i ?></a>
									</li>
								<?php
								}
								?>
								<?php
								if ($current_page < $nume_page) {
									$next = $current_page + 1;

								?>
									<li class="page-item">
										<a class="page-link" href="shop-grid.php?page=<?php echo $next ?>">Next</a>
									</li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<?php
$qr2 = mysqli_query($conn, "SELECT products.*, cat.name AS name_cat FROM products JOIN cat ON products.id_cat = cat.id");
while ($row_pr2 = mysqli_fetch_assoc($qr2)) {


?>
	<div class="modal fade" id="<?php echo $row_pr2['id'] ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
				</div>
				<div class="modal-body">
					<div class="row no-gutters">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="product-gallery">
								<div class="quickview-slider-active">
									<div class="single-slider">
										<img src="admin/upload/<?php echo $row_pr2['image'] ?>" alt="#">
									</div>
									<?php
									$qr3 = mysqli_query($conn, "SELECT * FROM `img_products` WHERE id_sp = $row_pr2[id] order by id DESC LIMIT 3");
									while ($row_img = mysqli_fetch_assoc($qr3)) {
									?>
										<div class="single-slider">
											<img src="admin/upload/<?php echo $row_img['img'] ?>" alt="#">
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<!-- End Product slider -->
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="quickview-content">
								<h2><?php echo $row_pr2['name_product']?></h2>
								<div class="quickview-ratting-review">
									<div class="quickview-ratting-wrap">
										<div class="quickview-ratting">
											<i class="yellow fa fa-star"></i>
											<i class="yellow fa fa-star"></i>
											<i class="yellow fa fa-star"></i>
											<i class="yellow fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>

									</div>
									<div class="quickview-stock">
										<span><i class="fa fa-check-circle-o"></i> in stock</span>
									</div>
								</div>
								<h3>$ <?php echo $row_pr2['price'] ?></h3>
								<div class="quickview-peragraph">
									<p><?php echo $row_pr2['detail'] ?></p>
								</div>
								<div class="size">
									<div class="row">
										<div class="col-lg-6 col-12">
											<h5 class="title">Size</h5>
											<select>
												<option selected="selected">38</option>
												<option>39</option>
												<option>40</option>
												<option>41</option>
											</select>
										</div>
									</div>
								</div>
								<div class="quantity">
									<!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" id="number" class="input-number" data-min="1" data-max="1000" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</div>
								<div class="add-to-cart">
									<a href="javascript:void(0)" class="btn" onclick="add_Cart(<?php echo $row_pr2['id'] ?>)">Thêm vào giỏ hàng</a>
									<a href="#" class="btn min"><i class="ti-heart"></i></a>
									<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
								</div>
								<div class="default-social">
									<h4 class="share-now">Share:</h4>
									<ul>
										<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
										<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal end -->
<?php } ?>


<!-- Start Footer Area -->
<?php require_once 'public/inc/footer.php' ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function add_Cart(id) {
		var num = $('#number').val();
		$.post("process_cart.php", {
			'id': id,
			'num': num
		}, function(data) {		
			
				alert('Already added to cart');
				$("#numberCart").text(data);
			
			
		});
	}
</script>