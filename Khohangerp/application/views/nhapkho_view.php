<!-- PAGE CONTAINER-->
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- tim kiem -->
			<div class="row">
				<div class="col-lg-9">
					<form class="form-header">
						<input class="au-input au-input--xl" type="text" name="search" id="search" placeholder="Tìm kiếm">
						<button class="au-btn--submit" type="submit">
							<i class="zmdi zmdi-search"></i>
						</button>
					</form>
				</div>
				<div class="col-lg-3">
					<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addmodels">
						<i class="zmdi zmdi-plus"></i>NHẬP TẤT CẢ </button>
					</div>
				</div>
				<!-- end -->
				<div class="row" style="height: 30px;"> </div>
				<!-- bang hien thi -->
				<div class="row">

					<div class="col-lg-12">
						<h2>Bảng nhập kho</h2>
						<div class="table-responsive table--no-card m-b-30">
							<table class="table table-borderless table-striped table-earning">
								<thead>
									<tr>
										<th>Công cụ</th>
										<th>Số thứ tự</th>
										<th>Ngày nhập kho</th>
										<th>Nhà cung cấp</th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php $i=1; ?>
									<?php foreach ($all as $value): ?>
										<tr>
											<td>
												<button data-toggle="modal"
												data-target="#editmodels<?= $value['id_nhap'] ?>">
												<i class="zmdi zmdi-edit"></i>
											</button> 
											|
											<button data-toggle="modal"
											data-target="#deletemodels<?= $value['id_nhap'] ?>">
											<i class="zmdi zmdi-delete"></i>
										</button>
									</td>
									<td><?= $i ?></td>
									<td><?= $value['ngaynhap'] ?></td>
									<td><?= $value['ten_nhacungcap'] ?></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div style="margin-bottom: 10px;">
					<ul class="pagination pagination-sm m-0 float-right">
						<?php echo $page; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- -- -->
	</div>
</div>
<!--END MAIN CONTENT-->
</div>

<!-- add modal medium -->
<div class="modal fade" id="addmodels" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
aria-hidden="true"  data-backdrop="static">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="mediumModalLabel"> </h5>
			<button type="button" class="closeModal close"  aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="" method="post">


			<div class="modal-body">
				<!-- start: Body -->
				<div class="row form-group">

					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Tên nhà cung cấp</label>
					</div>

					<div class="col-12 col-md-9">
						<select name="id_nhacungcap" id="id_nhacungcap" class="form-control">
							<option value="">--Chọn--</option>
							<?php foreach ($nhacungcap as $ncc): ?>
								<option value="<?= $ncc['id_nhacungcap'] ?>">
									<?= $ncc['ten_nhacungcap'] ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>

				</div>

				<div class="row form-group">

					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Tên danh mục</label>
					</div>

					<div class="col-12 col-md-9">
						<select name="id_danhmuc" id="id_danhmuc" class="form-control">
							<option value="">--Chọn--</option>
						</select>
					</div>

				</div>

				<div class="row form-group">

					<div class="col col-md-3">
						<label for="text-input" class=" form-control-label">Mã mặt hàng</label>
					</div>

					<div class="col-12 col-md-9">
						<select name="id_mathang" id="id_mathang" class="form-control">
							<option value="">--Chọn--</option>
						</select>
					</div>

				</div>

				<div class="row form-group">
					<h3 id="headDetail" style="margin: auto;display: none;">Thông tin mặt hàng</h3>
				</div>

				<div class="row form-group" id="detailItem">
				</div>

				<div class="row form-group">
					<h3 id="headAdd" style="margin: auto;display: none;">Thông tin nhập kho</h3>
				</div>

				<div class="row form-group" id="addItem">
				</div>


				<!-- end: Body -->
				<!-- start: Footer -->
				<div class="modal-footer">
					<button id="addBtn" type="button" class="btn btn-success">Nhập kho</button>
					<button type="button" class="closeModal btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
				<!-- end: Footer -->
			</div>
		</form>
	</div>
</div>



<script type="text/javascript" charset="utf-8">
	$('body').on('change', '#id_nhacungcap', function(event) {

		var id_nhacungcap=$('#id_nhacungcap').val();
		var path="<?= base_url() ?>";

		if(id_nhacungcap=="")
		{
			$('#id_danhmuc').empty();
			$('#id_danhmuc').html('<option value="">--Chọn--</option>');
			$('#id_mathang').empty();
			$('#id_mathang').html('<option value="">--Chọn--</option>');

			$('#headDetail').css('display', 'none');
			$('#detailItem').empty();

			$('#headAdd').css('display', 'none');
			$('#addItem').empty();
			return;
		}

		$.ajax({
			url: path+'Nhapkho/getDanhmuc',
			type: 'post',
			dataType:'json',
			data: {id_nhacungcap: id_nhacungcap},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(res) {
			var opt='<option value="">--Chọn--</option>';
			var list = res[0].list;
			for (var i = 0; i < list.length; i++) {
				opt+='<option value="'+list[i].id_danhmuc+'">'+list[i].ten_danhmuc+'</option>';
			}
			$('#id_danhmuc').empty();
			$('#id_danhmuc').html(opt);

			$('#id_mathang').empty();
			$('#id_mathang').html('<option value="">--Chọn--</option>');
		});

		$('#headDetail').css('display', 'none');
		$('#detailItem').empty();

		$('#headAdd').css('display', 'none');
		$('#addItem').empty();
	});

	$('body').on('change', '#id_danhmuc', function(event) {

		var id_danhmuc=$('#id_danhmuc').val();
		var id_nhacungcap=$('#id_nhacungcap').val();
		var path="<?= base_url() ?>";

		if(id_danhmuc==""||id_nhacungcap=="")
		{
			$('#id_mathang').empty();
			$('#id_mathang').html('<option value="">--Chọn--</option>');

			$('#headDetail').css('display', 'none');
			$('#detailItem').empty();

			$('#headAdd').css('display', 'none');
			$('#addItem').empty();

			return;
		}

		$.ajax({
			url: path+'Nhapkho/getMathang',
			type: 'post',
			dataType:'json',
			data: {id_danhmuc: id_danhmuc,id_nhacungcap: id_nhacungcap},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(res) {
			var opt='<option value="">--Chọn--</option>';
			var list = res[0].data;
			for (var i = 0; i < list.length; i++) {
				opt+='<option value="'+list[i].id_mathang+'">'+list[i].ma_mathang+'</option>';
			}
			$('#id_mathang').empty();
			$('#id_mathang').html(opt);
		});

		$('#headDetail').css('display', 'none');
		$('#detailItem').empty();

		$('#headAdd').css('display', 'none');
		$('#addItem').empty();
	});

	$('body').on('change', '#id_mathang', function(event) {
		var id_mathang=$('#id_mathang').val();
		var path="<?= base_url() ?>";

		if(id_mathang=="")
		{
			$('#headDetail').css('display', 'none');
			$('#detailItem').empty();

			$('#headAdd').css('display', 'none');
			$('#addItem').empty();
			return;
		}

		$.ajax({
			url: path+'Nhapkho/getMathangById',
			type: 'post',
			dataType:'json',
			data: {id_mathang: id_mathang},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(res) {
			$('#headDetail').css('display', 'block');

			var content='';
			content+='<div class="col col-md-3">';
			content+='<label for="text-input" class=" form-control-label">Tên mặt hàng: </label></div>';
			content+='<div class="col-12 col-md-9">';
			content+='<p>'+res[0].data[0].ten_mathang+'</p>';
			content+='</div>';
			content+='<div class="col col-md-3">';
			content+='<label for="text-input" class=" form-control-label">Số lượng hiện tại: </label></div>';
			content+='<div class="col-12 col-md-9">';
			content+='<p>'+res[0].data[0].soluonght+'&#160;&#160;'+res[0].data[0].donvitinh+'</p>';
			content+='</div>';
			content+='<div class="col col-md-3">';
			content+='<label for="text-input" class=" form-control-label">Giá bán hiện tại: </label></div>';
			content+='<div class="col-12 col-md-9">';
			content+='<p>'+res[0].data[0].gia+'&#160;&#160;VND/SP</p>';
			content+='</div>';
			$('#detailItem').empty();
			$('#detailItem').html(content);

			$('#headAdd').css('display', 'block');

			var content1='';
			content1+='<div class="col col-md-3">';
			content1+='<label for="text-input" class=" form-control-label">Số lượng nhập </label></div>';
			content1+='<div class="col-12 col-md-9">';
			content1+='<input style="margin-bottom: 15px;" class="form-control" ';
			content1+='type="number" name="soluongnhap" id="soluongnhap" min="0" value="0">';
			content1+='</div>';
			content1+='<div class="col col-md-3">';
			content1+='<label for="text-input" class=" form-control-label">Đơn giá nhập</label></div>';
			content1+='<div class="col-12 col-md-9">';
			content1+='<input class="form-control" type="number" name="dongianhap" id="dongianhap" min="0" value="0">';
			content1+='</div>';
			$('#addItem').empty();
			$('#addItem').html(content1);
		});
	});

	$('body').on('click', '#addBtn', function(event) {
		var soluongnhap=$('#soluongnhap').val();
		var dongianhap=$('#dongianhap').val();
		var id_nhacungcap=$('#id_nhacungcap').val();
		var id_mathang=$('#id_mathang').val();
		var path="<?= base_url() ?>";

		if(id_nhacungcap=="")
		{
			alert('Chưa chọn nhà cung cấp');
			return;
		}
		if(id_mathang=="")
		{
			alert('Chưa chọn mặt hàng');
			return;
		}
		if(soluongnhap<=0)
		{
			alert('Số lượng nhập phải lớn hơn 0');
			return;
		}
		if(dongianhap<=0)
		{
			alert('Đơn giá nhập phải lớn hơn 0');
			return;
		}

		$.ajax({
			url: path+'Nhapkho/add',
			type: 'post',
			dataType:'json',
			data: {id_mathang: id_mathang,id_nhacungcap: id_nhacungcap,
				soluongnhap: soluongnhap,dongianhap: dongianhap},
			})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(res) {
			if (res!=false) 
			{
				alert("Thao tác thành công");
			}
			else
			{
				alert("Thao tác thất bại");
			}
		});
	});

	$('body').on('click', '.closeModal', function(event) {
		window.location.reload();
	});

</script>

</div>
<!-- end add -->

<!-- start edit -->

<?php foreach ($all as $item): ?>
	<div class="modal fade" id="editmodels<?= $item['id_nhap'] ?>" 
		tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="width: max-content;">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Chi tiết nhập kho - 
						<?= $item['ten_nhacungcap'] ?> : <?= $item['ngaynhap'] ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="" method="post">
						<input type="hidden" id="id<?= $item['id_nhap'] ?>" value="<?= $item['id_nhap'] ?>">
						<div class="modal-body" style="background: white;">
							<!-- start: Body -->
							<div class="table-responsive table--no-card m-b-30" style="background: whitesmoke;">
								<table class="table">
									<thead>
										<tr>
											<th>Số thứ tự</th>
											<th>Danh mục</th>
											<th>Mã mặt hàng</th>
											<th>Tên mặt hàng</th>
											<th>Đơn vị tính</th>
											<th>Số lượng nhập</th>
											<th>Đơn giá nhập</th>
										</tr>
									</thead>
									<tbody id="myTableDetail<?= $item['id_nhap'] ?>">
										
									</tbody>
								</table>
							</div>
							<!-- end: Body -->
						</div>
					</form>
				</div>
			</div>

			<script>
				$('body').on('show.bs.modal', '#editmodels<?= $item['id_nhap'] ?>', function(event) {
					var path="<?= base_url() ?>";
					var id=$('#id<?= $item['id_nhap'] ?>').val();
					$.ajax({
						url: path+'Nhapkho/getDetail',
						type: 'post',
						dataType:'json',
						data: {id_nhap:id},
					})
					.done(function() {
						console.log("success");
					})
					.fail(function() {
						console.log("error");
					})
					.always(function(res) {
						var list =res;
						var content='';
						for (var i = 0; i < list.length; i++) {
							content+='<tr>';
							content+='<td>'+(i+1)+'</td>';
							content+='<td>'+list[i].ten_danhmuc+'</td>';
							content+='<td>'+list[i].ma_mathang+'</td>';
							content+='<td>'+list[i].ten_mathang+'</td>';
							content+='<td>'+list[i].donvitinh+'</td>';
							content+='<td>'+list[i].soluong+'</td>';
							content+='<td>'+list[i].dongianhap+'</td>';
							content+='</tr>';
						}
						$('#myTableDetail<?= $item['id_nhap'] ?>').empty();
						$('#myTableDetail<?= $item['id_nhap'] ?>').append(content);
					});
				});
			</script>
		</div>
	<?php endforeach ?>

	<!-- end edit -->

	<script>
		$(document).ready(function(){
			$("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>	


