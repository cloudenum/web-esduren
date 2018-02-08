	 <!-- Content Wrapper. Contains page content -->
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, <?php //echo $_SESSION['nama'] ?><small>Have Fun!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
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
												Nama
											</th>
											<th class="sorting" aria-controls="varian-table">
												Testimoni
											</th>
											<th class="sorting" aria-controls="varian-table">
												Rating
											</th>
											<th class="sorting" aria-controls="varian-table">
												IP Address
											</th>
											<th class="sorting" aria-controls="varian-table">
												MAC Address
											</th>
											<th class="sorting" aria-controls="varian-table"  style="width: 10%;">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$query = $this->db->get('testimonials');

											$nomor = 1;

											if ($query->num_rows() > 0)
											{
												foreach ($query->result_array() as $row)
												{
													
										?>
										<tr role="row">
											<td><?php echo $nomor++?></td>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['testimonials'];?></td>
											<td><div class="rating">
													<?php	
															for ($i = 1; $i <= $row['rating']; $i++ )
															{
													?>
															<span class="fa fa-star" style="color: #ffc700;"></span>
													<?php 
															}

															for ($i = 1; $i <= 5 - $row['rating'] ; $i++)
															{	
													?>
															<span class="fa fa-star"></span>
													<?php
															} 
													?>
												</div>
											</td>
											<td><?php echo $row['ip_address'];?></td>
											<td><?php echo $row['mac_address'];?></td>
											<td>
												<a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/').$row['id']."/testimonials"; ?>">
													<span class="fa fa-trash"/>
													hapus
												</a>
											</td>
										</tr>
										<?php 
												}
											}else{
												echo '<td>No data</td>';
											} ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Name</th>
											<th>Testimoni</th>
											<th>Rating</th>
											<th>IP Address</th>
											<th>MAC Address</th>
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
