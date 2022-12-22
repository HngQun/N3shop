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
						<li class="active"><a href="checkout.html">Thanh toán</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_SESSION['customer'])) {
	$id_customer = $_SESSION['customer']['id'];
	$name = $_SESSION['customer']['name'];
	$email = $_SESSION['customer']['email'];

?>
	<section class="shop checkout section" id="listCheck">
		<div class="wrapper" id="checkout">
		<script>
			function checkOut(id) {
				var phone = $("#number").val();
				var address = $("#address").val();
				var name = $("#name").val();
				var email = $("#email").val();
				$.ajax({
					type: "POST",
					url: 'addcheck.php',
					data: {
						id: id,
						name: name,
						email: email,
						address: address,
						phone: phone
					},
					success: function(data) {
						alert('Thanh toán thành công !');
						window.location = 'index.html';
					}
				});
			}
		</script>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="checkout-form">
						<h3>Điền đầy đủ thông tin</h3>
						<br>
						<br>

						<form id="add_checkout" class="form" method="POST" action="javascript:void(0)">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Tên<span>*</span></label>
										<input type="text" id="name" name="name" value="<?php echo $name ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Email<span>*</span></label>
										<input type="email" id="email" name="email" value="<?php echo $email ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Số điện thoại<span></span></label>
										<input type="text" id="number" name="number">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Địa chỉ nhận hàng<span></span></label>
										<input type="text" name="address" id="address">
									</div>
								</div>

							</div>
							<button type="submit" onclick="checkOut(<?php echo $id_customer ?>)" name="submit" class="btn btn-primary">Đặt hàng</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<table class="table shopping-summery">
							<thead>
								<tr class="main-hading">
									<th>STT</th>
									<th>Hình ảnh</th>
									<th>Tên sản phẩm</th>
									<th class="text-center">Giá</th>
									<th class="text-center">Số lượng</th>
									<th class="text-center">Tổng</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$stt = 0;
								$total = 0;
								$sum = 0;
								if (isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $key => $value) {
										$total = $value['price'] * $value['num'];
										$sum += $total;
										$stt++;
								?>
										<tr>
											<td><?php echo $stt ?></td>
											<td class="image" data-title="No"><img src="admin/upload/<?php echo $value['image'] ?>" alt="#"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name"><a href="#"><?php echo $value['name'] ?></a></p>

											</td>
											<td class="price" data-title="Price"><span><?php echo number_format($value['price'])?>đ </span></td>
											<td class="qty" data-title="Qty">
												<div class="input-group">

													<input type="text" value="<?php echo $value['num'] ?>">

												</div>
											</td>
											<td class="total-amount" data-title="Total"><span><?php echo number_format($total)?>đ</span></td>

										</tr>
								<?php
									}
								}
								?>
								<tr>
									<td style="font-size: 20px;">Tổng đơn hàng :</td>
									<td colspan="5" style="color:orange; font-size: 15px"><?php echo number_format($sum)?>đ</td>
								</tr>
						</table>
					</div>
				</div>
			</div>
		</section>
		</div>
	</section>
<?php
} else {
	echo "<script>alert('Bạn cần đăng nhập để thanh toán!');</script>";
	echo '<script>window.location="login.php?action=checkout";</script>';
}
?>

<?php require_once 'public/inc/footer.php' ?>