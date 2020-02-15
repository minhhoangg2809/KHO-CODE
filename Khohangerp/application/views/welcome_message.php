<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ERP</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">ERP - TẬP ĐOÀN Y TẾ PHƯƠNG ĐÔNG</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="https://easterngroup.com.vn">Trang chủ
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Hướng dẫn</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./User">Đăng nhập</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<header>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<!-- Slide One - Set the background image for this slide in the line below -->
				<div class="carousel-item active" style="background-image: url('https://easterngroup.com.vn/thumb/crop/47/1920/600/')">
					<div class="carousel-caption d-none d-md-block">
						<h3 class="display-4">Eastern</h3>
						<p class="lead">Công ty thiết bị y tế hàng đầu Việt Nam.</p>
					</div>
				</div>
				<!-- Slide Two - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('https://easterngroup.com.vn/thumb/crop/475/1920/480/')">
					<div class="carousel-caption d-none d-md-block">
						<h3 class="display-4">TẬP ĐOÀN Y TẾ PHƯƠNG ĐÔNG</h3>
						<p class="lead">Thành lập năm 2000, Phương Đông là đơn vị tiên phong và luôn dẫn đầu tại Việt Nam trong lĩnh vực cung cấp thiết bị Y tế bệnh viện..</p>
					</div>
				</div>
				<!-- Slide Three - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('https://easterngroup.com.vn/thumb/crop/568/1920/480/')">
					<div class="carousel-caption d-none d-md-block">
						<h3 class="display-4">TẬP ĐOÀN Y TẾ PHƯƠNG ĐÔNG</h3>
						<p class="lead">Phục vụ bệnh nhân kịp thời là ưu tiên số 1.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</header>

	<!-- Page Content -->
	<section class="py-5">
		<div class="container">
			<h1 class="font-weight-light">HƯỚNG DẪN SỬ DỤNG HỆ THỐNG ERP - TẬP ĐOÀN Y TẾ PHƯƠNG ĐÔNG</h1>
			<p class="lead">Bước 1 : Click vào 'Đăng nhập' ở góc trên cùng bên phải màn hình</p>
			<p class="lead">Bước 2 : Đăng nhập bằng tài khoản được cung cấp bởi bộ phận quản lý nhân sự</p>
			<p class="lead">Bước 3 : Chọn danh mục bạn phụ trách ở menu dọc bên trái.</p>
		</div>
	</section>
</body>
</html>

<style>
	.carousel-item {
		height: 65vh;
		min-height: 350px;
		background: no-repeat center center scroll;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
</style>