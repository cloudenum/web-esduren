	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Welcome, <?php //echo $_SESSION['nama'] ?>	      
					<small>Have Fun!</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li class="active">Home</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
			<?php 
				echo $this->session->flashdata('success');
			?>
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Create User/Admin</h3>
				</div>
				<div class="box-body">
					<?php echo form_open_multipart('crud/insertVarian');?>
						<div class="form-group has-feedback">
							<label>Kode Varian</label>    
							<input class="form-control" name="code" placeholder="Kode Varian" type="text">
						</div>
						<div class="form-group has-feedback">
							<label>Nama Varian</label>    
							<input class="form-control" name="name" placeholder="Nama Varian" type="text">
						</div>
						<div class="form-group has-feedback">
							<label>Deskripsi</label>
							<textarea name="description" class="form-control" placeholder="Deskripsi" rows="3"></textarea>
						</div>
						<div class="form-group has-feedback">
							<label>Harga</label>    
							<input class="form-control" name="price" placeholder="Harga" type="text">
						</div>
						<div class="form-group has-feedback">
							<label for="upload-gambar">Upload Foto</label>
							<input id="upload-gambar" name="image" type="file">
							<p class="help-block">Upload gambar/foto varian es durian yang akan ditambahkan.</p>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<!-- /.box-body -->
			</div>

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">User Database</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<div class="row">
							<div class="col-sm-12">
								<table id="varian-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" aria-controls="varian-table"  aria-sort="ascending">
												No.
											</th>
											<th class="sorting" aria-controls="varian-table">
												Kode Varian
											</th>
											<th class="sorting" aria-controls="varian-table">
												Nama Varian
											</th>
											<th class="sorting" aria-controls="varian-table">
												Deskripsi
											</th>
											<th class="sorting" aria-controls="varian-table">
												Harga
											</th>
											<th class="sorting" aria-controls="varian-table">
												Image
											</th>
											<th class="sorting" aria-controls="varian-table"  style="width: 20%;">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query = $this->db->get('menu');

											$nomor = 1;

											if ($query->num_rows() > 0)
											{
												foreach ($query->result() as $row)
												{
													
										?>
										<tr role="row">
											<td><?php echo $nomor++?></td>
											<td><?php echo $row->code;?></td>
											<td><?php echo $row->name;?></td>
											<td><?php echo $row->description;?></td>
											<td><?php echo 'Rp '.$row->price;?></td>
											<td><img class="img-responsive img-rounded" src="<?php echo $row->image_path;?>" alt="<?php echo $row->name;?>"></td>
											<td>
												<a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" 
													data-id="<?php echo $row->id;?>" 
													data-code="<?php echo $row->code;?>" 
													data-name="<?php echo $row->name;?>"
													data-desc="<?php echo $row->description;?>"
													data-price="<?php echo $row->price;?>"
													data-imgPath="<?php echo $row->image_path;?>">
													<span class="fa fa-pencil"/>
													edit
												</a>
												<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapusUser/').$row->id ?>">
													<span class="fa fa-trash"/>
													hapus
												</a>
											</td>
										</tr>
										<?php 
												}
											}else{
												echo 'No data';
											} ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Username</th>
											<th>Password</th>
											<th>Fullname</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Gender</th>
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
					<?php echo form_open_multipart('crud/insertVarian');?>
						<div class="form-group has-feedback">
							<label>Kode Varian</label>    
							<input id="code" class="form-control" name="code" placeholder="Kode Varian" type="text">
						</div>
						<div class="form-group has-feedback">
							<label>Nama Varian</label>    
							<input id="name" class="form-control" name="name" placeholder="Nama Varian" type="text">
						</div>
						<div class="form-group has-feedback">
							<label>Deskripsi</label>
							<textarea id="desc" name="description" class="form-control" placeholder="Deskripsi" rows="3"></textarea>
						</div>
						<div class="form-group has-feedback">
							<label>Harga</label>    
							<input id="price" class="form-control" name="price" placeholder="Harga" type="text">
						</div>
						<img class="img-responsive img-rounded" src="">
						<div class="form-group has-feedback">
							<label for="upload-gambar">Edit Foto</label>
							<input id="upload-gambar" name="image" type="file">
							<p class="help-block">Upload gambar/foto varian es durian yang akan ditambahkan.</p>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary submit">Edit</button>
				</div>
			</div>
		</div>
	</div>
