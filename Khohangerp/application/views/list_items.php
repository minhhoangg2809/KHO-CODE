<!-- PAGE CONTAINER-->
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- tim kiem -->
			<div class="row">
				<div class="col-lg-9">
					<form class="form-header">
						<input class="au-input au-input--xl" type="text" name="search"  id="search"  
						placeholder="Tìm kiếm" value="<?= set_value('search') ?>">
						<button class="au-btn--submit" type="submit">
							<i class="zmdi zmdi-search"></i>
						</button>
					</form>
				</div>
				<div class="col-lg-3">
					<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" 
					data-target="#addmodels">
					<i class="zmdi zmdi-plus"></i>Thêm Mặt Hàng</button>
				</div>
			</div>
			<div class="row">
				<fieldset class="form-group">
					<?php if ($this->session->flashdata('ER_item')): ?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Error</span>
							<?php echo($this->session->flashdata('ER_item')) ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
					<?php endif ?>

					<?php if ($this->session->flashdata('SU_item')): ?>
						<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
							<span class="badge badge-pill badge-success">Success</span>
							<?php echo($this->session->flashdata('SU_item')) ?>
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
					<h2>Bảng thông tin mặt hàng</h2>

					<!-- Phan loc -->
					<div class="row form-group">
						<div class="col-5 col-md-4">
							<select name="filter_coso" id="filter_danhmuc" class="form-control">
								<option value="">-- Lọc theo danh mục --</option>
								<?php foreach ($cats as $cat): ?>
									<option value="<?= $cat['id_danhmuc'] ?>"><?= $cat['ten_danhmuc'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="col-5 col-md-4">
							<select name="filter_daynha" id="filter_nhacungcap" class="form-control">
								<option value="">-- Lọc theo nhà cung cấp --</option>
								<?php foreach ($supplier as $sup): ?>
									<option value="<?= $sup['id_nhacungcap'] ?>"><?= $sup['ten_nhacungcap'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

					</div>
					<!-- het phan loc -->
					<div class="table-responsive table--no-card m-b-30">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>Công cụ</th>
									<th>Số thứ tự</th>
									<th>Danh Mục</th>
									<th>Nhà Cung Cấp</th>
									<th>Mã mặt hàng</th>
									<th>Tên mặt hàng</th>
									<th>Số Lượng</th>
									<th>Đơn vị tính</th>
									<th>Đơn giá</th>
									<th>Ngày nhập mới nhất</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php $i=1; ?>
								<?php foreach ($all as $value): ?>
									<tr>
										<td>
											<button data-toggle="modal"
											data-target="#editmodels<?= $value['id_mathang'] ?>">
											<i class="zmdi zmdi-edit"></i>
										</button> 
										|
										<button data-toggle="modal"
										data-target="#deletemodels<?= $value['id_mathang'] ?>">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</td>
								<td><?= $i ?></td>
								<td><?= $value['ten_danhmuc'] ?></td>
								<td><?= $value['ten_nhacungcap'] ?></td>
								<td><?= $value['ma_mathang'] ?></td>
								<td><?= $value['ten_mathang'] ?></td>
								<td><?= $value['soluonght'] ?></td>
								<td><?= $value['donvitinh'] ?></td>
								<td><?= number_format($value['gia']) ?> Vnđ / 1SP</td>
								<td><?= $value['ngaynhapkhomoinhat'] ?></td>
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
<div class="modal fade" id="addmodels" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel"> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url() ?>Item/add" method="post">

				
				<div class="modal-body">
					<!-- start: Body -->

					<!-- <div class="row form-group">

						<div class="col col-md-3">
							<label for="text-input" class=" form-control-label">Loại mặt hàng</label>
						</div>

						<div class="col-12 col-md-9">
							<input type="text" id="text-input" name="loai" placeholder="Loại mặt hàng" class="form-control" required="" value="<?= set_value('loai') ?>">
						</div>
					</div> -->

					<div class="row form-group">
						<div class="col col-md-3">
							<label for="select" class=" form-control-label">Tên danh mục</label>
						</div>
						<div class="col-12 col-md-9">
							<select name="danhmuc" id="select" class="form-control">

								<?php foreach ($cats as $cat): ?>
									<option value="<?= $cat['id_danhmuc'] ?>">
										<?= $cat['ten_danhmuc'] ?></option>
									<?php endforeach ?>

								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class=" form-control-label">Tên nhà cung cấp</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="nhacungcap" id="select" class="form-control">

									<?php foreach ($supplier as $sup): ?>
										<option value="<?= $sup['id_nhacungcap'] ?>">
											<?= $sup['ten_nhacungcap'] ?></option>
										<?php endforeach ?>

									</select>
								</div>
							</div>

							<div class="row form-group">

								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Tên mặt hàng</label>
								</div>

								<div class="col-12 col-md-9">
									<input type="text" id="text-input" name="ten" placeholder="Tên mặt hàng" class="form-control" required="required" value="">
								</div>
							</div>



							<div class="row form-group">

								<div class="col col-md-3">
									<label for="text-input" class=" form-control-label">Đơn vị tính</label>
								</div>

								<div class="col-12 col-md-9">
									<input type="text" id="text-input" name="donvi" placeholder="Đơn vị tính" class="form-control" required="required" value="<?= set_value('donvi') ?>">
								</div>
							</div>

							<!-- end: Body -->
							<!-- start: Footer -->
							<div class="modal-footer">
								<button type="submit" class="btn btn-success">Thêm mặt hàng</button>
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
			<div class="modal fade" id="editmodels<?= $value['id_mathang'] ?>" 
				tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<form action="<?= base_url() ?>Item/update" method="post">


							<div class="modal-body">
								<!-- start: Body -->

								<div class="row form-group">
									<div class="col col-md-3">
										<label for="select" class=" form-control-label">Tên danh mục</label>
									</div>
									<div class="col-12 col-md-9">
										<select name="danhmuc" id="select" class="form-control">

											<?php foreach ($cats as $cat): ?>
												<?php if( $value['id_danhmuc'] == $cat['id_danhmuc']) { ?>
												<option value="<?= $cat['id_danhmuc'] ?>" selected="true">
													<?= $cat['ten_danhmuc'] ?></option>
													<?php } else { ?>
													<option value="<?= $cat['id_danhmuc'] ?>">
														<?= $cat['ten_danhmuc'] ?></option>
														<?php } ?>
													<?php endforeach ?>

												</select>
											</div>
										</div>

										<div class="row form-group">
											<div class="col col-md-3">
												<label for="select" class=" form-control-label">Tên nhà cung cấp</label>
											</div>
											<div class="col-12 col-md-9">
												<select name="nhacungcap" id="select" class="form-control">

													<?php foreach ($supplier as $sup): ?>
														<?php if($value['id_nhacungcap'] == $sup['id_nhacungcap']) { ?>
														<option value="<?= $sup['id_nhacungcap'] ?>" selected="true">
															<?= $sup['ten_nhacungcap'] ?></option>
															<?php } else { ?>
															<option value="<?= $sup['id_nhacungcap'] ?>">
																<?= $sup['ten_nhacungcap'] ?></option>
																<?php } ?>
															<?php endforeach ?>

														</select>
													</div>
												</div>	


												<div class="row form-group">

													<input type="hidden" value="<?= $value['id_mathang'] ?>" name="id">

													<div class="col col-md-3">
														<label for="text-input" class=" form-control-label">Tên mặt hàng</label>
													</div>

													<div class="col-12 col-md-9">
														<input type="text" id="text-input" name="ten" placeholder="Tên mặt hàng" class="form-control" required="required" value="<?= $value['ten_mathang'] ?>">
													</div>
												</div>

								<!-- <div class="row form-group">

									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Loại mặt hàng</label>
									</div>

									<div class="col-12 col-md-9">
										<input type="text" id="text-input" name="loai" placeholder="Loại mặt hàng" class="form-control" required="" value="<?= $value['loaihang'] ?>">
									</div>
								</div> -->

								<div class="row form-group">

									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Đơn vị tính</label>
									</div>

									<div class="col-12 col-md-9">
										<input type="text" id="text-input" name="donvi" placeholder="Đơn vị tính" 
										class="form-control" required="required" 
										value="<?= $value['donvitinh'] ?>">
									</div>
								</div>

								<div class="row form-group">

									<div class="col col-md-3">
										<label for="text-input" class=" form-control-label">Đơn giá</label>
									</div>

									<div class="col-12 col-md-9">
										<input type="text" id="text-input" name="dongia" placeholder="Đơn giá" class="form-control" required=""
										value="<?= $value['gia'] ?>">
									</div>
								</div>

								<!-- end: Body -->
								<!-- start: Footer -->
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Sửa mặt hàng</button>
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
			<div class="modal fade" id="deletemodels<?= $value['id_mathang'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
							Xóa mặt hàng : <?= $value['ten_mathang'] ?> ?
						</div>
						<!-- end: Body -->

						<!-- start: Footer -->
						<form action="<?= base_url() ?>Item/delete" method="post">
							<div class="modal-footer">
								<input type="hidden" value="<?= $value['id_mathang'] ?>" name="id" >
								<button type="submit" class="btn btn-danger">Xóa mặt hàng</button>
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


		<script  type="text/javascript" >
			$('body').on('change', '#filter_nhacungcap', function(event) {

				var id_nhacungcap=$(this).val();
				var id_danhmuc=$('#filter_danhmuc').val();
				var path="<?= base_url() ?>";

				if(id_nhacungcap !='')
				{
					if(id_danhmuc != '')
					{
						$.ajax({
							url: path+'Item/filter_nhacungcapvsdanhmuc',
							type: 'post',
							dataType:'html',
							data: {id_nhacungcap: id_nhacungcap, id_danhmuc: id_danhmuc},
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function(data) {

							$('#myTable').remove();
							$('.table').html(data);
						});
					}
					else
					{
						$.ajax({
							url: path+'Item/filter_nhacungcap',
							type: 'post',
							dataType:'html',
							data: {id_nhacungcap: id_nhacungcap},
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function(data) {

							$('#myTable').remove();
							$('.table').html(data);
						});
					}

				}
				else
				{
					window.location.reload();
				}
			});

			$('body').on('change', '#filter_danhmuc', function(event) {

				var id_danhmuc=$(this).val();
				var id_nhacungcap=$('#filter_nhacungcap').val();
				var path="<?= base_url() ?>";

				if(id_danhmuc!='')
				{
					if(id_nhacungcap != '')
					{
						$.ajax({
							url: path+'Item/filter_nhacungcapvsdanhmuc',
							type: 'post',
							dataType:'html',
							data: {id_nhacungcap: id_nhacungcap, id_danhmuc: id_danhmuc},
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function(data) {

							$('#myTable').remove();
							$('.table').html(data);
						});
					}
					else
					{
						$.ajax({
							url: path+'Item/filter_danhmuc',
							type: 'post',
							dataType:'html',
							data: {id_danhmuc: id_danhmuc},
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function(data) {

							$('#myTable').remove();
							$('.table').html(data);
						});
					}
					
				}
				else
				{
					window.location.reload();
				}
			});
		</script>