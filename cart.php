<?php $page = "CART"; ?>
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
						<li class="active"><a href="cart.html">Giỏ hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="shopping-cart section" id="listCart" style="min-height: 500px;">
	<div class="container" id="cartx">
		<?php

		$number = 0;
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$number++;
				
			}
			//$qty = mysqli_query($conn, "SELECT `qty` FROM `products`");
		}	
		
		if ($number>0 ) { 
			
		?>
			<div class="row">
				<div class="col-12">
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>Ảnh</th>
								<th>Tên sản phẩm</th>
								<th class="text-center">Đơn giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Tông</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$total = 0;
							$sum = 0;
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $key => $value) {
									$total = $value['price'] * $value['num'];
									$sum += $total;
							
							?>
									<tr>
										<td class="image" data-title="No"><img src="admin/upload/<?php echo $value['image'] ?>" alt="#"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="#"><?php echo $value['name'] ?></a></p>

										</td>
										<td class="price" data-title="Price"><span><?php echo number_format($value['price'])?>đ </span></td>
										<td class="qty" data-title="Qty">
											<div class="input-group">

												<input type="number" onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" class="input-number" data-min="1" data-max="100" value="<?php echo $value['num'] ?>" readonly >
												
											</div>
										</td>
										<td class="total-amount" data-title="Total"><span><?php echo number_format($total) ?>đ</span></td>
										<td class="action" onclick="return confirm('Bạn muốn xóa sản phẩm này?');" data-title="Remove"><a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ?>)"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
							<?php
								}
							}	
							?>
					</table>
				</div>
			</div>
			<div class="row">
			<div class="col-12">
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
						
						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Tổng<span><?php echo number_format($sum)?>đ</span></li>
									<li class="last">Thanh toán<span><?php echo number_format($sum)?>đ</span></li>
								</ul>
								<div class="button5">
									<a href="checkout.php" class="btn">Thanh toán</a>
									<a href="index.php" class="btn">Tiếp tục mua sắm</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		} else if ($number == 0){
		?>
			<span>Chưa có sản phẩm trong giỏ hàng</span>
			<br><br>
			<Span>Tiếp tục <a href="shop-grid.html" style="color: red;">mua sắm</a></Span>
		<?php
		}
		?>
	</div>
</div>


<?php require_once 'public/inc/footer.php' ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
	function updateCart(id) {
		var num = $("#quantity_" + id).val();
		$.post('update_cart.php', {
			'id': id,
			'num': num
		}, function(data) {
			
			$("#listCart").load("cart.php #cartx");
		});

	}

	function deleteCart(id) {
		$.post('update_cart.php', {
			'id': id,
			'num': 0
		}, function(data) {
			$("#listCart").load("cart.php #cartx");

		});
	}
</script>