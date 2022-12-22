<?php $page = "CONTACT";?>
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
						<li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="contact.html">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="contact-us" class="contact-us section">
	<div class="container">
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="form-main">
						<div class="title">
							<h4>Viết tin nhắn cho chúng tôi</h4>
						</div>
						<form method="POST" id="contact" action="javascript:void(0)">
							<div class="form-group">
								<label for="">Tên</label>
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="">Số điện thoại</label>
								<input type="text" class="form-control" id="phone" name="phone">
							</div>
							<div class="form-group">
								<textarea name="message" id="message" cols="20" rows="10" class="form-control"></textarea>
							</div>

							<button type="submit" onclick="contact()" name="submit" class="btn btn-primary">Gửi liên hệ</button>
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-12">
					<div class="single-head">
						<div class="single-info">
							<i class="fa fa-phone"></i>
							<h4 class="title">Số điện thoại</h4>
							<ul>
								<li>+123 456-789</li>
								<li>+522 672-452</li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-envelope-open"></i>
							<h4 class="title">Email:</h4>
							<ul>
								<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
								<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-location-arrow"></i>
							<h4 class="title">Địa chỉ:</h4>
							<ul>
								<li>Hoàng Mai, Hà Nội, Việt Nam</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
			function contact() {
				var phone = $("#phone").val();
				var message = $("#message").val();
				var name = $("#name").val();
				var email = $("#email").val();
		        $.ajax({
					url: 'addcheck.php',
					method: "POST",
					data: {
						phone:phone,name:name,message:message,email:email
					},
					success:function(data) {
                       alert("Thành công!");
					   $("#contact")[0].reset();
					}
				})
			}
		
</script>


<?php require_once 'public/inc/footer.php' ?>