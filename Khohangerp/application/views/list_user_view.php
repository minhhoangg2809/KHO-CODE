<!--PAGE CONTAINER-->
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
					<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addmodels">
						<i class="zmdi zmdi-plus"></i>Thêm Tài Khoản</button>
					</div>
				</div>
				<div class="row">
					<fieldset class="form-group">
						<?php if ($this->session->flashdata('UserEx')): ?>
							<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Error</span>
								<?php echo($this->session->flashdata('UserEx')) ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php endif ?>

						<?php if ($this->session->flashdata('Mail')): ?>
							<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
								<span class="badge badge-pill badge-danger">Error</span>
								<?php echo($this->session->flashdata('Mail')) ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php endif ?>

						<?php if ($this->session->flashdata('UserWel')): ?>
							<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
								<span class="badge badge-pill badge-successr">Success</span>
								<?php echo($this->session->flashdata('UserWel')) ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						<?php endif ?>

					</fieldset>
				</div>

				<div class="row" style="height: 30px;"></div>
				<!-- bang hien thi -->
				<div class="row">
					<div class="col-lg-12">	
						<h2>Bảng thông tin tài khoản</h2>
						<div class="table-responsive table--no-card m-b-30 ">
							<table class="table table-borderless table-striped table-earning">
								<thead>
									<tr>
										<th>Chọn</th>
										<th>STT</th>
										<th>Tên đăng nhập</th>
										<th>E-mail</th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php $i=1; ?>
									<?php foreach ($all as $value): ?>
										<tr>
											<td>
												<button data-toggle="modal"
												data-target="#editmodels<?= $value['id'] ?>">
												<i class="zmdi zmdi-edit"></i>
											</button> 
											|
											<button data-toggle="modal"
											data-target="#deletemodels<?= $value['id'] ?>">
											<i class="zmdi zmdi-delete"></i>
										</button>
									</td>
									<td><?= $i ?></td>
									<td><?= $value['username'] ?></td>
									<td><?= $value['email'] ?></td>
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
			<form action="<?= base_url() ?>User/add" method="post">

				<!-- start: model -->
				<div class="modal-body">

					<div class="row form-group">
						<div class="col col-md-1"></div>
						<div class="col col-md-2">
							<label for="hf-email" class=" form-control-label">Họ và tên </label>
						</div>
						<div class="col-12 col-md-7">
							<input type="text" id="name" name="name" placeholder="Nhập họ và tên" class="form-control"
							value="<?= set_value('name') ?>" require="">
							<span class="help-block"><i>
								<div class="text-danger">
									<?= form_error('name'); ?>
								</div>
							</i></span>
						</div>
						<div class="col col-md-1"></div>
					</div>


					<div class="row form-group">
						<div class="col col-md-1"></div>
						<div class="col col-md-1"></div>
					</div>
					<div class="row form-group">
						<div class="col col-md-1"></div>
						<div class="col col-md-2">
							<label for="hf-email" class=" form-control-label">Số điện thoại </label>
						</div>
						<div class="col-12 col-md-7">
							<input type="text" id="phone" 
							name="phone" value="<?php echo(set_value('phone')) ?>" 
							class="form-control" placeholder="Nhập số điện thoại" require="">
						</div>

						<div class="col col-md-1"></div>
					</div>

					<div class="row form-group">
						<div class="col col-md-1"></div>
						<div class="col col-md-2">
							<label for="hf-email" class="form-control-label">Tài khoản</label>
						</div>
						<div class="col-12 col-md-7">
							<input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập"
							class="form-control" value="<?= set_value('username') ?>" require="">
							<span class="help-block"><i>
								<div class="text-danger">
									<?= form_error('username'); ?>
								</div></i></span>
							</div>

							<div class="col col-md-1"></div>
						</div>

						<div class="row form-group">
							<div class="col col-md-1"></div>
							<div class="col col-md-2">
								<label for="hf-email" class="form-control-label">E-Mail</label>
							</div>
							<div class="col-12 col-md-7">
								<input type="email" id="email" name="email" placeholder="Nhập e-mail"
								class="form-control" value="<?= set_value('email') ?>" require="">
								<span class="help-block"><i>
									<div class="text-danger">
										<?= form_error('email'); ?>
									</div></i></span>
								</div>

								<div class="col col-md-1"></div>
							</div>

							<div class="row form-group">
								<div class="col col-md-1"></div>
								<div class="col col-md-2">
									<label for="hf-email" class=" form-control-label">Mật khẩu</label>
								</div>
								<div class="col-12 col-md-7">
									<input type="password" id="password" 
									name="password" placeholder="Nhập mật khẩu" class="form-control"
									value="<?php echo(set_value('password')) ?>" require="">
									<span class="help-block"><i>
										<div class="text-danger">
											<?= form_error('password'); ?>
										</div>
									</i></span>
								</div>

								<div class="col col-md-1"></div>
							</div>

							<div class="row form-group">
								<div class="col col-md-1"></div>
								<div class="col col-md-2">
									<label for="hf-email" class=" form-control-label">Xác nhận</label>
								</div>
								<div class="col-12 col-md-7">
									<input type="password" id="confpassword" name="confpassword"
									placeholder="Xác nhận mật khẩu" 
									class="form-control" value="<?= set_value('confpassword') ?>" require="">
									<span class="help-block"><i>
										<div class="text-danger">
											<?= form_error('confpassword'); ?>
										</div>
									</i></span>
								</div>

								<div class="col col-md-1"></div>
							</div>

						</div>
						<!-- end: modal -->

						<!-- start: Footer -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Thêm tài khoản</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
						</div>
						<!-- end: Footer -->

					</form>

				</div>
			</div>
		</div>
		<!-- end add -->


		<?php foreach ($all as $value): ?>
			<!-- edit modal medium -->
			<div class="modal fade" id="editmodels<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url() ?>User/update/<?= $value['id'] ?>" method="post">

							<!-- start: model -->
							<div class="modal-body">

								<div class="row form-group">
									<div class="col col-md-1"></div>
									<div class="col col-md-2">
										<label for="hf-email" class=" form-control-label">Họ và tên </label>
									</div>
									<div class="col-12 col-md-7">
										<input type="text" id="name" name="name" placeholder="Nhập họ và tên" class="form-control"
										value="<?= $value['hoten'] ?>">
										<span class="help-block"><i>
											<div class="text-danger">
												<?= form_error('name'); ?>
											</div>
										</i></span>
									</div>
									<div class="col col-md-1"></div>
								</div>
								<div class="row form-group">
									<div class="col col-md-1"></div>
									<div class="col col-md-2">
										<label for="hf-email" class=" form-control-label">Số điện thoại </label>
									</div>
									<div class="col-12 col-md-7">
										<input type="text" id="phone" 
										name="phone"
										class="form-control" placeholder="Nhập số điện thoại"
										value="<?= $value['sdt'] ?>" >
									</div>

									<div class="col col-md-1"></div>
								</div>

								<div class="row form-group">
									<div class="col col-md-1"></div>
									<div class="col col-md-2">
										<label for="hf-email" class="form-control-label">Tài khoản</label>
									</div>
									<div class="col-12 col-md-7">
										<input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập"
										class="form-control"
										value="<?= $value['username'] ?>">
										<span class="help-block"><i>
											<div class="text-danger">
												<?= form_error('username'); ?>
											</div></i></span>
										</div>

										<div class="col col-md-1"></div>
									</div>

									<div class="row form-group">
										<div class="col col-md-1"></div>
										<div class="col col-md-2">
											<label for="hf-email" class="form-control-label">E-Mail</label>
										</div>
										<div class="col-12 col-md-7">
											<input type="email" id="email" name="email" placeholder="Nhập e-mail"
											class="form-control" value="<?= $value['email'] ?>" require="">
											<span class="help-block"><i>
												<div class="text-danger">
													<?= form_error('email'); ?>
												</div></i></span>
											</div>

											<div class="col col-md-1"></div>
										</div>

										<input type="hidden" value="<?= $value['password'] ?>" name="oldpass">

										<div class="row form-group">
											<div class="col col-md-1"></div>
											<div class="col col-md-2">
												<label for="hf-email" class=" form-control-label">Mật khẩu</label>
											</div>
											<div class="col-12 col-md-7">
												<input type="password" id="newpassword" 
												name="newpassword" placeholder="Nhập mật khẩu mới" class="form-control">
												<span class="help-block"><i>
													<div class="text-danger">
														<?= form_error('newpassword'); ?>
													</div>
												</i></span>
											</div>

											<div class="col col-md-1"></div>
										</div>

										<div class="row form-group">
											<div class="col col-md-1"></div>
											<div class="col col-md-2">
												<label for="hf-email" class=" form-control-label">Xác nhận</label>
											</div>
											<div class="col-12 col-md-7">
												<input type="password" id="confpassword" name="confpassword"
												placeholder="Xác nhận mật khẩu" 
												class="form-control">
												<span class="help-block"><i>
													<div class="text-danger">
														<?= form_error('confpassword'); ?>
													</div>
												</i></span>
											</div>

											<div class="col col-md-1"></div>
										</div>

									</div>
									<!-- end: modal -->

									<!-- start: Footer -->
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Sửa tài khoản</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
									</div>
									<!-- end: Footer -->

								</form>

							</div>
						</div>
					</div>
					<!-- end edit -->
				<?php endforeach ?>

				<?php foreach ($all as $value): ?>
					<!-- delete modal medium -->
					<div class="modal fade" id="deletemodels<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="mediumModalLabel"></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<!-- start: model -->
								<div class="modal-body">
									Xóa tài khoản : <?= $value['username'] ?> ?
								</div>
								<!-- end: Body -->

								<!-- start: Footer -->
								<form action="<?= base_url() ?>User/delete/<?= $value['id'] ?>" method="post">
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger">Xóa tài khoản</button>
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
							
						});
					});
				</script>

