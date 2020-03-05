<!-- PAGE CONTAINER-->
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- tim kiem -->
			<div class="row">
				<div class="col-lg-8">
					<form class="form-header">
						<input class="au-input au-input--xl" type="text" name="search"  id="search"  
						placeholder="Tìm kiếm" value="<?= set_value('search') ?>">
						<button class="au-btn--submit" type="submit">
							<i class="zmdi zmdi-search"></i>
						</button>
					</form>
				</div>
				<div class="col-lg-4">
					<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
					data-target="#addmodels">
					<i class="zmdi zmdi-plus"></i>Thêm khách hàng</button>
				</div>
			</div>
			<div class="row">
				<fieldset class="form-group">
					<?php if ($this->session->flashdata('ER_kh')): ?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Error</span>
							<?php echo($this->session->flashdata('ER_kh')) ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
					<?php endif ?>

					<?php if ($this->session->flashdata('SU_kh')): ?>
						<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo($this->session->flashdata('SU_kh')) ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
					<?php endif ?>

				</fieldset>
			</div>
			<!-- end -->
			<div class="row" style="height: 30px;"></div>
			<!-- bang hien thi -->
			<div class="row">
				<div class="col-lg-12">
					<h2>Bảng thông tin khách hàng</h2>


					<div class="table-responsive table--no-card m-b-30">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>Công cụ</th>
									<th>Số thứ tự</th>
									<th>Khách hàng</th>
									<th>Địa chỉ</th>
									<th>E-mail</th>
									<th>Số Điện Thoại</th>
									<th>Sô lần mua</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php $i=1; ?>
								<?php foreach ($all as $value): ?>
									<tr>
										<td>
											<button data-toggle="modal"
											data-target="#editmodels<?= $value['id_khachhang'] ?>">
											<i class="zmdi zmdi-edit"></i>
										</button> 
										|
										<button data-toggle="modal"
										data-target="#deletemodels<?= $value['id_khachhang'] ?>">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</td>
								<td><?= $i ?></td>
								<td><?= $value['ten_khachhang'] ?></td>
								<td><?= $value['diachi'] ?></td>
								<td><?= $value['gmail'] ?></td>
								<td><?= $value['sodienthoai'] ?></td>
								<td><?= $value['solanmua'] ?></td>
							</tr>

							<?php $i++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<div>
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
<div class="modal fade" id="addmodels" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>Khachhang/add" method="post">

				
				<div class="modal-body">
					<!-- start: Body -->

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Tên khách hàng</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="ten_khachhang" placeholder="Tên khách hàng" 
							class="form-control" required="required" value="">
						</div>
					</div>

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Địa chỉ</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="diachi" placeholder="Địa chỉ" 
							class="form-control" required="required" value="">
						</div>
					</div>

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">E-mail</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="email" id="text-input" name="gmail" placeholder="E-mail" 
							class="form-control" required="required" value="">
						</div>
					</div>

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Số Điện Thoại</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="sodienthoai" placeholder="Số Điện Thoại" 
							class="form-control" required="required" value="">
						</div>
					</div>
					
					<!-- end: Body -->
					<!-- start: Footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Thêm khách hàng</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					</div>
					<!-- end: Footer -->
				</div>
			</form>

		</div>
	</div>
</div>
<!-- end add -->


<?php foreach ($all as $value): ?>
	<!-- edit modal medium -->
	<div class="modal fade" id="editmodels<?= $value['id_khachhang'] ?>" 
		tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url() ?>Khachhang/update" method="post">


					<div class="modal-body">
						<!-- start: Body -->

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Tên khách hàng</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="ten_khachhang" placeholder="Tên khách hàng" 
								class="form-control" required="required" value="<?= $value['ten_khachhang'] ?>">
							</div>
						</div>

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Địa chỉ</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="diachi" placeholder="Địa chỉ" 
								class="form-control" required="required" value="<?= $value['diachi'] ?>">
							</div>
						</div>

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">E-mail</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="email" id="text-input" name="gmail" placeholder="E-mail" 
								class="form-control" required="required" value="<?= $value['gmail'] ?>">
							</div>
						</div>

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Số Điện Thoại</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="sodienthoai" placeholder="Số Điện Thoại" 
								class="form-control" required="required" value="<?= $value['sodienthoai'] ?>">
							</div>
						</div>

						<!-- end: Body -->
						<!-- start: Footer -->
						<div class="modal-footer">
							<input type="hidden" value="<?= $value['id_khachhang'] ?>" name="id" >
							<button type="submit" class="btn btn-primary">Sửa khách hàng</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
						</div>
						<!-- end: Footer -->
					</div>
				</form>

			</div>
		</div>
	</div>
	<!-- end edit -->
<?php endforeach ?>

<?php foreach ($all as $value): ?>
	<!-- delete modal medium -->
	<div class="modal fade" id="deletemodels<?= $value['id_khachhang'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- start: Body -->
				<div class="modal-body">
					Xóa khách hàng : <?= $value['ten_khachhang'] ?> ?
				</div>
				<!-- end: Body -->

				<!-- start: Footer -->
				<form action="<?= base_url() ?>Khachhang/delete" method="post">
					<div class="modal-footer">
						<input type="hidden" value="<?= $value['id_khachhang'] ?>" name="id" >
						<button type="submit" class="btn btn-danger">Xóa khách hàng</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					</div>
				</form>
				<!-- end: Footer -->
			</div>
		</div>
	</div>
	<!-- end delete -->
<?php endforeach ?>

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

