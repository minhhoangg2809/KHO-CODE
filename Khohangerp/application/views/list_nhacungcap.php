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
					<i class="zmdi zmdi-plus"></i>Thêm nhà cung cấp</button>
				</div>
			</div>
			<div class="row">
				<fieldset class="form-group">
					<?php if ($this->session->flashdata('ER_ncc')): ?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Error</span>
							<?php echo($this->session->flashdata('ER_ncc')) ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
					<?php endif ?>

					<?php if ($this->session->flashdata('SU_ncc')): ?>
						<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo($this->session->flashdata('SU_ncc')) ?>
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
					<h2>Bảng thông tin nhà cung cấp</h2>


					<div class="table-responsive table--no-card m-b-30">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>Công cụ</th>
									<th>Số thứ tự</th>
									<th>Nhà Cung Cấp</th>
									<th>Địa Chi</th>
									<th>E-mail</th>
									<th>Số Điện Thoại</th>
									<th>Ngày Hợp Tác</th>
									<th>Loại Sản Phẩm</th>
									<th>Đại Diện</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php $i=1; ?>
								<?php foreach ($all as $value): ?>
									<tr>
										<td>
											<button data-toggle="modal"
											data-target="#editmodels<?= $value['id_nhacungcap'] ?>">
											<i class="zmdi zmdi-edit"></i>
										</button> 
										|
										<button data-toggle="modal"
										data-target="#deletemodels<?= $value['id_nhacungcap'] ?>">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</td>
								<td><?= $i ?></td>
								<td><?= $value['ten_nhacungcap'] ?></td>
								<td><?= $value['diachi'] ?></td>
								<td><?= $value['gmail'] ?></td>
								<td><?= $value['sodienthoai'] ?></td>
								<td><?= $value['ngayhoptac'] ?></td>
								<td><?= $value['loaisanpham'] ?></td>
								<td><?= $value['nguoidaidien'] ?></td>
							</tr>

							<?php $i++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
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
			<form action="<?= base_url() ?>Nhacungcap/add" method="post">

				
				<div class="modal-body">
					<!-- start: Body -->

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Tên nhà cung cấp</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="ten_nhacungcap" placeholder="Tên nhà cung cấp" 
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

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Loại Sản Phẩm</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="loaisanpham" placeholder="Loại Sản Phẩm" 
							class="form-control" required="required" value="">
						</div>
					</div>

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Đại Diện</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="nguoidaidien" placeholder="Đại Diện" 
							class="form-control" required="required" value="">
						</div>
					</div>

					<div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Ngày Hợp Tác</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="date" id="text-input" name="ngayhoptac" 
							class="form-control" required="required" value="">
						</div>
					</div>


					<!-- end: Body -->
					<!-- start: Footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Thêm nhà cung cấp</button>
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
	<div class="modal fade" id="editmodels<?= $value['id_nhacungcap'] ?>" 
		tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url() ?>Nhacungcap/update" method="post">


					<div class="modal-body">
						<!-- start: Body -->

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Tên nhà cung cấp</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="ten_nhacungcap" placeholder="Tên nhà cung cấp" 
								class="form-control" required="required" value="<?= $value['ten_nhacungcap'] ?>">
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

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Loại Sản Phẩm</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="loaisanpham" placeholder="Loại Sản Phẩm" 
								class="form-control" required="required" value="<?= $value['loaisanpham'] ?>">
							</div>
						</div>

						<div class="row form-group">

							<div class="col col-md-3">
								<label for="text-input" class=" form-control-label">Đại Diện</label>
							</div>

							<div class="col-12 col-md-9">
								<input type="text" id="text-input" name="nguoidaidien" placeholder="Đại Diện" 
								class="form-control" required="required" value="<?= $value['nguoidaidien'] ?>">
							</div>
						</div>


						<!-- end: Body -->
						<!-- start: Footer -->
						<div class="modal-footer">
							<input type="hidden" value="<?= $value['id_nhacungcap'] ?>" name="id" >
							<button type="submit" class="btn btn-primary">Sửa nhà cung cấp</button>
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
	<div class="modal fade" id="deletemodels<?= $value['id_nhacungcap'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
					Xóa nhà cung cấp : <?= $value['ten_nhacungcap'] ?> ?
				</div>
				<!-- end: Body -->

				<!-- start: Footer -->
				<form action="<?= base_url() ?>Nhacungcap/delete" method="post">
					<div class="modal-footer">
						<input type="hidden" value="<?= $value['id_nhacungcap'] ?>" name="id" >
						<button type="submit" class="btn btn-danger">Xóa nhà cung cấp</button>
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

