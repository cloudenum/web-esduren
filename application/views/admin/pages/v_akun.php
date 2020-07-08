    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Akun
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="<?php echo base_url() ?>admin/akun">Akun</a></li>
                <li class="active"><a href="<?php echo base_url() ?>admin/akun">Daftar Akun</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
			<?php 
				echo $this->session->flashdata('alert');
			?>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Daftar Akun</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
						<div class="row">
							<div class="col-sm-12"  style="overflow: auto; background: white;">
								<table id="akun-table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" aria-controls="akun-table"  aria-sort="ascending">
												No.
											</th>
											<th class="sorting" aria-controls="akun-table">
												Username
											</th>
											<th class="sorting" aria-controls="akun-table" style="min-width: 200px;">
												Password <sup style="color:red">*</sup>
											</th>
											<th class="sorting" aria-controls="akun-table" style="min-width: 200px;">
												Nama
											</th>
                                            <th class="sorting" aria-controls="akun-table" style="min-width: 200px;">
												E-mail
											</th>
											<th class="sorting" aria-controls="akun-table"  style="min-width: 200px;">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query = $this->db->get('user');

											$nomor = 1;

											if ($query->num_rows() > 0)
											{
												foreach ($query->result() as $row)
												{
													
										?>
										<tr role="row">
											<td><?php echo $nomor++?></td>
											<td><?php echo $row->username;?></td>
											<td style="color:red"><?php echo $row->password;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td>
												<a class="btn btn-warning btn-s" data-toggle="modal" data-target="#editModal" 
													data-id="<?php echo $row->id;?>" 
													data-nama="<?php echo $row->nama;?>"
                                                    data-email="<?php echo $row->email;?>">
													<span class="fa fa-pencil"/>
													edit
												</a>
												<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/').$row->id."/user" ?>">
													<span class="fa fa-trash"/>
													hapus
												</a>
											</td>
										</tr>
										<?php 
												}
											}else{
												echo '<tr><td colspan=6>Tidak ada akun</td></tr>';
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
					<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="fa fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="edit-form" action="<?php echo base_url();?>crud/edit_account" method="POST">
                        <input id="edit-id" name="id" type="hidden"/>
						<div class="form-group ">
							<label>Nama</label>    
							<input id="edit-nama" class="form-control" name="nama" placeholder="Nama" type="text" required>
						</div>
                        <div class="form-group ">
							<label>E-mail</label>
							<input id="edit-email" class="form-control" name="email" placeholder="E-mail" type="email" required>
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