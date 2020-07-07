<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Galeri
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
			<li class="active"><a href="<?php echo base_url() ?>admin/tambah_gambar">Galeri</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

		<?php
		echo $this->session->flashdata('alert');
		?>
		<div class="dropzone">

			<div class="dz-message">
				<h3> Klik atau Drop gambar disini</h3>
			</div>

		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Galeri</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">
						<div class="col-sm-12">
							<table id="testimoni-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" aria-controls="varian-table" aria-sort="ascending">
											No.
										</th>
										<th class="sorting" aria-controls="varian-table">
											Gambar
										</th>
										<th class="sorting" aria-controls="varian-table" style="width: 10%;">
											Action
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = $this->db->get('gallery');

									$nomor = 1;

									if ($query->num_rows() > 0) {
										foreach ($query->result_array() as $row) {

									?>
											<tr role="row">
												<td><?php echo $nomor++ ?></td>
												<td><img class="img-responsive" src="<?php echo base_url('uploads/gallery/') . $row['image_path']; ?>" /></td>
												<td>
													<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/') . $row['id'] . "/gallery"; ?>">
														<span class="fa fa-trash" />
														Hapus
													</a>
												</td>
											</tr>
									<?php
										}
									} else {
										echo '<tr><td colspan=3>Belum ada gambar</td></tr';
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
</div>
