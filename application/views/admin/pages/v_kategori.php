	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Kategori Menu
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="<?php echo base_url() ?>admin/menu">Menu</a></li>
				<li class="active"><a href="<?php echo base_url() ?>admin/kategori">Kategori Menu</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
			<?php
			echo $this->session->flashdata('success');
			?>
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Kategori</h3>
				</div>
				<div class="box-body">
					<form action="<?php echo base_url() ?>crud/insert_category" method="POST">
						<div class="form-group ">
							<label>Kategori</label>
							<input class="form-control " name="category" placeholder="Kategori" type="text" required>

						</div>
						<div class="form-group ">
							<label>Deskripsi</label>
							<textarea name="description" class="form-control" placeholder="Deskripsi" rows="3" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<!-- /.box-body -->
			</div>

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Tabel Kategori</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
						<div class="row">
							<div class="col-sm-12" style="overflow: auto; background: white;">
								<table id="category-table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" aria-controls="category-table" aria-sort="ascending">
												No.
											</th>
											<th class="sorting" aria-controls="category-table">
												Kategori
											</th>
											<th class="sorting" aria-controls="category-table">
												Deskripsi
											</th>
											<th class="sorting" aria-controls="category-table" style="min-width: 100px;">
												Action
											</th>
										</tr>
									</thead>
									<tbody id="isi-tabel-category">
										<?php
										$nomor = 1;

										if (count($category) > 0) {
											foreach ($category as $row) {

										?>
												<tr role="row">
													<td><?php echo $nomor++ ?></td>
													<td><?php echo $row->category; ?></td>
													<td><?php echo $row->description; ?></td>
													<td>
														<a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row->id; ?>" data-category="<?php echo $row->category; ?>" data-desc="<?php echo $row->description; ?>">
															<span class="fa fa-pencil" />
															edit
														</a>
														<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/') . $row->id . "/menu_category" ?>">
															<span class="fa fa-trash" />
															hapus
														</a>
													</td>
												</tr>
										<?php
											}
										} else {
											echo 'No data';
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="fa fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group ">
							<label>Kategori</label>
							<input id="edit-category" class="form-control" name="category" placeholder="Kategori" type="text">
						</div>
						<div class="form-group ">
							<label>Deskripsi</label>
							<textarea id="edit-desc" name="description" class="form-control" placeholder="Deskripsi" rows="3"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="edit" type="button" class="btn btn-primary">Edit</button>
				</div>
			</div>
		</div>
	</div>
