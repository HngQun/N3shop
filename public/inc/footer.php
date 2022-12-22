<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function add_cart(id) {
		var num = $('#num').val();
		$.post("process_cart.php", {
			'id': id,
			'num': num
		}, function(data) {
			
			alert('Đã thêm sản phẩm vào giỏ hàng');
			$("#numberCart").text(data);
		});
	}
</script>

<footer class="footer">
	
	<div class="copyright">
		<div class="container">
			<div class="inner">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="left">
							<p>Đây chi là sản phảm demo của nhóm 17</p>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="right">
							<img src="public/images/payments.png" alt="#">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery-migrate-3.0.0.js"></script>
<script src="public/js/jquery-ui.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/colors.js"></script>
<script src="public/js/slicknav.min.js"></script>
<script src="public/js/owl-carousel.js"></script>
<script src="public/js/magnific-popup.js"></script>
<script src="public/js/waypoints.min.js"></script>
<script src="public/js/finalcountdown.min.js"></script>
<script src="public/js/nicesellect.js"></script>
<script src="public/js/flex-slider.js"></script>
<script src="public/js/scrollup.js"></script>
<script src="public/js/onepage-nav.min.js"></script>
<script src="public/js/easing.js"></script>
<script src="public/js/active.js"></script>
</body>

</html>