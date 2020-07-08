    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
    		<h1>
    			Daftar Promo
    		</h1>
    		<ol class="breadcrumb">
    			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
    			<li><a href="<?php echo base_url() ?>admin/promo">Promo</a></li>
    			<li class="active"><a href="<?php echo base_url() ?>admin/promo">Daftar Promo</a></li>
    		</ol>
    	</section>

    	<!-- Main content -->
    	<section class="content container-fluid">
    		<?php
			echo $this->session->flashdata('alert');
			?>
    		<div class="box">
    			<div class="box-header">
    				<h3 class="box-title">Daftar Promo</h3>
    			</div>
    			<!-- /.box-header -->
    			<div class="box-body">
    				<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
    					<div class="row">
    						<div class="col-sm-12" style="overflow: auto; background: white;">
    							<table id="promo-table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
    								<thead>
    									<tr role="row">
    										<th class="sorting_asc" aria-controls="promo-table" aria-sort="ascending">
    											No.
    										</th>
    										<th class="sorting" aria-controls="promo-table">
    											Kode promo
    										</th>
    										<th class="sorting" aria-controls="promo-table" style="min-width: 200px;">
    											Headline promo
    										</th>
    										<th class="sorting" aria-controls="promo-table" style="min-width: 200px;">
    											Deskripsi promo
    										</th>
    										<th class="sorting" aria-controls="promo-table" style="min-width: 200px;">
    											Image
    										</th>
    										<th class="sorting" aria-controls="promo-table" style="min-width: 200px;">
    											Action
    										</th>
    									</tr>
    								</thead>
    								<tbody>
    									<?php
										$nomor = 1;

										if (count($promo) > 0) {
											foreach ($promo as $row) {

										?>
    											<tr role="row">
    												<td><?php echo $nomor++ ?></td>
    												<td><?php echo $row->code; ?></td>
    												<td><?php echo $row->name; ?></td>
    												<td><?php echo $row->description; ?></td>
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
    												<a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row->id; ?>" data-code="<?php echo $row->code; ?>" data-name="<?php echo $row->name; ?>" data-img-path="<?php echo $row->image_path; ?>" data-description="<?php echo $row->description; ?>">
    													<span class="fa fa-pencil"></span>
    													edit
    												</a>
    												<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/') . $row->id . "/promo" ?>">
    													<span class="fa fa-trash"></span>
    													hapus
    												</a>
    											</td>
    											</tr>
    									<?php
											}
										} else {
											echo '<tr><td colspan=5>Tidak ada promo</td></tr>';
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


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">Edit Promo</h5>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
    			<div class="modal-body">
    				<?php echo form_open_multipart('crud/insert_promo', array('id' => 'edit-form')); ?>
    				<div class="form-group ">
    					<label>Kode promo</label>
    					<input id="edit-code" class="form-control " name="code" placeholder="Kode promo" type="text">
    				</div>
    				<div class="form-group ">
    					<label>Headline promo</label>
    					<input id="edit-name" class="form-control" name="name" placeholder="Headline promo" type="text">
    				</div>
    				<div class="form-group ">
    					<label>Deskripsi promo</label>
    					<input id="edit-description" class="form-control" name="description" placeholder="Deskripsi promo" type="text">
    				</div>
    				<img id="img-edit-promo" class="img-responsive img-rounded" src="">
    				<div class="form-group">
    					<label for="edit-gambar">Upload Foto</label>
    					<input id="edit-gambar" name="edit-image" type="file" required>
    					<p class="help-block">Upload gambar/foto promo yang akan ditambahkan.</p>

    				</div>
    				</form>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button id="submit-edit" type="submit" class="btn btn-primary">Edit</button>
    			</div>
    		</div>
    	</div>
    </div>
