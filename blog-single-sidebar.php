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
						<li class="active"><a href="">Bài viết</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="blog-single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="blog-single-main">
					<div class="row">
						<?php
						$id = (isset($_GET['id'])) ? $_GET['id'] : '';
						$qr = mysqli_query($conn, "SELECT * FROM blog WHERE id = $id");
						$row_blog = mysqli_fetch_assoc($qr);
						?>
						<div class="col-12">
							<div class="image">
								<img src="admin/upload/<?php echo $row_blog['img'] ?>" alt="#">
							</div>
							<div class="blog-detail">
								<h2 class="blog-title"><?php echo $row_blog['name'] ?></h2>
								<div class="blog-meta">
									<span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i><?php echo $row_blog['created_at'] ?></a></span>
								</div>
								<div class="content">
									<p><?php echo $row_blog['content'] ?></p>
								</div>
							</div>
						</div>
						<div class="col-12" id="div1">
							<div class="comments" id="showload">
								<h3 class="comment-title">Bình luận</h3>
								<?php
								$show = mysqli_query($conn, "SELECT * FROM `comment` WHERE id_blog = $id");
								while ($row = mysqli_fetch_assoc($show)) {
								?>
									<div class="single-comment">
										<img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="#">
										<div class="content">
											<h4><?php echo $row['name'] ?><span><?php echo $row['date'] ?></span></h4>
											<p><?php echo $row['comment'] ?></p>
											<div class="button">
												<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<div class="col-12">
							<div class="reply">
								<div class="reply-head">
									<h2 class="reply-title">Viết bình luận</h2>
									<form id="form" class="form" action="javascript:void(0)" method="POST">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-12">
												<div class="form-group">
													<label>Tên<span>*</span></label>
													<input type="text" id="name" name="name" placeholder="" required="required">
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-12">
												<div class="form-group">
													<label>Email<span>*</span></label>
													<input type="email" id="email" name="email" placeholder="" required="required">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label>Nội dung<span>*</span></label>
													<textarea name="message" id="message" placeholder=""></textarea>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group button">
													<button name="submit" onclick="ajaxCMT(<?php echo $row_blog['id'] ?>)" type="submit" class="btn">Gửi</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<div class="single-widget search">
						<div class="form">
							<input type="search" id="search_blog" placeholder="Tìm kiếm bài viết...">
							<a class="button" href="#"><i class="fa fa-search"></i></a>
						</div>
					</div>

					<div class="single-widget recent-post" id="load_blog">
						<h3 class="title">Đăng gần đây</h3>
						<?php
						$qr2 = mysqli_query($conn, "SELECT * FROM blog ORDER BY id DESC LIMIT 3");
						while ($row_blog2 = mysqli_fetch_assoc($qr2)) {
						?>
							<div class="single-post">
								<div class="image">
									<img src="admin/upload/<?php echo $row_blog2['img'] ?>" alt="#">
								</div>
								<div class="content">
									<h5><a href="blog-single-sidebar.php?id=<?php echo $row_blog2['id'] ?>"><?php echo $row_blog2['name'] ?></a></h5>
									<ul class="comment">
										<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row_blog2['created_at'] ?></li>

									</ul>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function ajaxCMT(id) {
		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();
		$.ajax({
			url: 'comment.php',
			method: "POST",
			data: {
				id: id,
				name: name,
				email: email,
				message: message
			},
			success: function(data) {
				$("#form")[0].reset();
				$("#div1").html(data);
			}
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#search_blog").keypress(function() {
			$.ajax({
				type: "POST",
				url: "search_ajax.php",
				data: {
					key: $("#search_blog").val(),
				},
				success: function(data) {
					$("#load_blog").html(data);

				}
			})
		});
	})
</script>
<?php require_once 'public/inc/footer.php' ?>