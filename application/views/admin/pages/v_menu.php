	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Produk
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="<?php echo base_url() ?>admin/menu">Produk</a></li>
				<li class="active"><a href="<?php echo base_url() ?>admin/menu">Daftar Produk</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
			<?php
			echo $this->session->flashdata('success');
			?>
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Buat Produk/Item Baru</h3>
				</div>
				<div class="box-body">
					<?php echo form_open_multipart('crud/insert_menu', array('class' => 'needs-validation', 'novalidate' => '')); ?>
					<div class="form-group ">
						<label>Kode menu</label>
						<input class="form-control " name="code" placeholder="Kode menu" type="text" required>

					</div>
					<div class="form-group ">
						<label>Nama menu</label>
						<input class="form-control" name="name" placeholder="Nama menu" type="text" required>

					</div>
					<div class="form-group ">
						<label>Deskripsi</label>
						<textarea name="description" class="form-control" placeholder="Deskripsi" rows="3" required></textarea>

					</div>
					<div class="form-group">
						<label for="price">Harga</label>
						<div class="input-group">
							<span class="input-group-text">Rp</span>
							<input id="price" class="form-control" name="price" placeholder="Harga" type="number" required>

						</div>
					</div>
					<div class="form-group">
						<label for="category">Kategori Produk</label>
						<div class="input-group">
							<select class="form-control" name="category" id="category">
								<?php

								if (count($category) > 0) {
									foreach ($category as $value) {
								?>
										<option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
									<?php
									}
								} else {
									?>
									<option>Kategori belum ada silahkan tambahkan terlebih dahulu</option>
								<?php
								}
								?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label for="upload-gambar">Upload Foto</label>
						<input id="upload-gambar" name="image" type="file">
						<p class="help-block">Upload gambar/foto menu atau item yang akan ditambahkan.</p>

					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<!-- /.box-body -->
			</div>

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Daftar Produk</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
						<div class="row">
							<div class="col-sm-12" style="overflow: auto; background: white;">
								<table id="menu-table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" aria-controls="menu-table" aria-sort="ascending">
												No.
											</th>
											<th class="sorting" aria-controls="menu-table">
												Kode menu
											</th>
											<th class="sorting" aria-controls="menu-table" style="min-width: 200px;">
												Nama menu
											</th>
											<th class="sorting" aria-controls="menu-table" style="min-width: 500px;">
												Deskripsi
											</th>
											<th class="sorting" aria-controls="menu-table" style="min-width: 80px;">
												Harga
											</th>
											<th class="sorting" aria-controls="menu-table">
												Kategori
											</th>
											<th class="sorting" aria-controls="menu-table" style="min-width: 200px;">
												Image
											</th>
											<th class="sorting" aria-controls="menu-table" style="min-width: 200px;">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$nomor = 1;

										if (count($menu) > 0) {
											foreach ($menu as $row) {

										?>
												<tr role="row">
													<td><?php echo $nomor++ ?></td>
													<td><?php echo $row->code; ?></td>
													<td><?php echo $row->name; ?></td>
													<td><?php echo $row->description; ?></td>
													<td><?php echo 'Rp ' . $row->price; ?></td>
													<td><?php echo $row->category; ?></td>
													<td>
														<?php if ($row->image_path != NULL || $row->image_path != "") {
														?>
															<img class="img-responsive img-rounded" src="<?php echo $row->image_path; ?>" alt="<?php echo $row->name; ?>"></td>
												<?php
														} else {
															echo 'Tidak ada gambar';
														}
												?>
												<td>
													<a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row->id; ?>" data-code="<?php echo $row->code; ?>" data-name="<?php echo $row->name; ?>" data-desc="<?php echo $row->description; ?>" data-price="<?php echo $row->price; ?>" data-img-path="<?php echo $row->image_path; ?>" data-category="<?php echo $row->food_category_id; ?>">
														<span class="fa fa-pencil" />
														edit
													</a>
													<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/') . $row->id . "/menu" ?>">
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
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Kode menu</th>
											<th>Nama</th>
											<th>Deskripsi</th>
											<th>Harga</th>
											<th>Kategori</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</tfoot>
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
					<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open_multipart('crud', array('id' => 'edit-form')); ?>
					<div class="form-group ">
						<label>Kode menu</label>
						<input id="edit-code" class="form-control" name="code" placeholder="Kode menu atau item" type="text">
					</div>
					<div class="form-group ">
						<label>Nama menu</label>
						<input id="edit-name" class="form-control" name="name" placeholder="Nama menu atau item" type="text">
					</div>
					<div class="form-group ">
						<label>Deskripsi</label>
						<textarea id="edit-desc" name="description" class="form-control" placeholder="Deskripsi" rows="3"></textarea>
					</div>
					<div class="form-group ">
						<label>Harga</label>
						<input id="edit-price" class="form-control" name="price" placeholder="Harga" type="text">
					</div>
					<div class="form-group">
						<label for="edit-category">Kategori Produk</label>
						<div class="input-group">
							<select class="form-control" name="category" id="edit-category">
								<?php
								if (count($category) > 0) {
									foreach ($category as $value) {
								?>
										<option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
									<?php
									}
								} else {
									?>
									<option>Kategori belum ada silahkan tambahkan terlebih dahulu</option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<img id="img-edit-menu" class="img-responsive img-rounded" src="">
					<div class="form-group ">
						<label for="edit-gambar">Edit Foto</label>
						<input id="edit-gambar" name="edit-image" type="file">
						<p class="help-block">Upload gambar/foto menu atau item yang akan ditambahkan.</p>
					</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary edit">Edit</button>
				</div>
			</div>
		</div>
	</div>
