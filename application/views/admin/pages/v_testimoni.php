	 <!-- Content Wrapper. Contains page content -->
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Testimoni
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Testimoni</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	        <div class="box">
				<div class="box-header">
					<h3 class="box-title">Testimoni</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<div class="row">
							<div class="col-sm-12 table-responsive">
								<table id="testimoni-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" aria-controls="testimoni-table"  aria-sort="ascending">
												No.
											</th>
											<th class="sorting" aria-controls="testimoni-table">
												Nama
											</th>
											<th class="sorting" aria-controls="testimoni-table"  style="min-width: 400px;">
												Testimoni
											</th>
											<th class="sorting" aria-controls="testimoni-table"  style="min-width: 120px;">
												Rating
											</th>
											<th class="sorting" aria-controls="testimoni-table">
												IP Address
											</th>
											<th class="sorting" aria-controls="testimoni-table"  style="min-width: 200px;">
												Tanggal Input
											</th>
											<th class="sorting" aria-controls="testimoni-table"  style="width: 100px;">
												Status
											</th>
											<th class="sorting" aria-controls="testimoni-table"  style="min-width: 200px;">
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
											<td><?php echo $row['testimonial'];?></td>
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
											<td><?php echo $row['submited_date'].' '.$row['submited_time'];?></td>
											<td><?php 
											switch ($row['status']) {
												case 0:?> 
													<span class="label label-warning">
														Pending
													</span>
												<?php
													break;
												case 1 :?> 
													<span class="label label-success">
														Disetejui
													</span>
												<?php
													break;
												case 2 :?> 
													<span class="label label-danger">
														Ditolak
													</span>
												<?php
													break;
											} ?>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-info">Aksi</button>
													<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														<span class="caret"></span>
														<span class="sr-only">Aksi</span>
													</button>
													<ul class="dropdown-menu" role="menu">
														<li><a href="<?php echo base_url('crud/update_status_testimoni').'?id='.$row['id'].'&s=1'; ?>" id="setujui" data-id="$row['id']">Setujui</a></li>
														<li><a href="<?php echo base_url('crud/update_status_testimoni').'?id='.$row['id'].'&s=2'; ?>" id="tolak"  data-id="$row['id']">Tolak</a></li>
													</ul>
												</div>
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
