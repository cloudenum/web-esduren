	 <!-- Content Wrapper. Contains page content -->
	 <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
		<i class="fa fa-comments"></i>  Media Sosial
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
		<li class="active">Profil</li>
		<li class="active">Media Sosial</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
	<?php 
				echo $this->session->flashdata('alert');
			?>
		<div class="row">
				<div class="col-xs-12">
				<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tautkan Media Sosial</h3>
            </div>
            <div class="box-body">
				<form>
              	  <div class="col-xs-12">
						<div class="input-group col-xs-12">
							<span class="input-group-addon social-fb">
								<label>
									<input name="social-fb" type="checkbox" class="flat" value="facebook" />
									<span class="text-center"><i class="fa fa-facebook-official"></i></span>
								</label>
							</span>
							<input disabled name="social-fb-link" class="form-control input-lg social-link" placeholder="link" type="text" required/>
						</div>
						<!-- /input-group -->
				  </div>
				  <div class="col-xs-12">
						<div class="input-group col-xs-12">
							<span class="input-group-addon social-ig">
								<label>
									<input name="social-ig" type="checkbox" class="flat" value="instagram" />
									<span class="text-center"><i class="fa fa-instagram"></i></span>
								</label>
							</span>
							<input disabled name="social-ig-link" class="form-control input-lg social-link" placeholder="link" type="text" required/>
                  		</div>
                  		<!-- /input-group -->
				  </div>
				  <div class="col-xs-12">
						<div class="input-group col-xs-12">
							<span class="input-group-addon social-tw">
								<label>
									<input name="social-tw" type="checkbox" class="flat" value="twitter" />
									<span class="text-center"><i class="fa fa-twitter"></i></span>
								</label>
							</span>
							<input disabled name="social-tw-link" class="form-control input-lg social-link" placeholder="link" type="text" required/>
                  		</div>
                  		<!-- /input-group -->
				  </div>
				  <div class="col-xs-12">
						<div class="input-group col-xs-12">
							<span class="input-group-addon social-yt">
								<label>
									<input name="social-yt" type="checkbox" class="flat" value="youtube"/>
									<span class="text-center"><i class="fa fa-youtube"></i></span>
								</label>
							</span>
							<input disabled name="social-yt-link" class="form-control input-lg" placeholder="link" type="text" required/>
                  		</div>
                  		<!-- /input-group -->
				  </div>
				</form>
            </div>
			<!-- /.box-body -->
			<div class="box-footer">
                <button type="submit" id="submit" class="btn btn-info pull-right">Save</button>
            </div>
          </div>
	</div>
	</div>
							
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Media Sosial Tertaut</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover" id="social-table">
									<?php 
											$query = $this->db->get('socmed');

											$nomor = 1;

											if ($query->num_rows() > 0)
											{
												foreach ($query->result() as $row)
												{
													
										?>
									<tr>
										<td><?php echo $nomor; ?></td>
										<td><span class="text-center"><i class="fa fa-<?php echo $row->name; ?>"></i></span></td>
										<td><?php echo $row->link; ?></td>
										<td>
											<a id="hapus" class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapus/').$row->id."/socmed" ?>">
												<span class="fa fa-trash"/>
												hapus
											</a>
										</td>
									</tr>
									<?php
													$nomor++;
												}
											}else{
												echo '<tbody><tr><td colspan=3>Belum ada media sosial yang terhubung</td></tr></tbody>';		
											}
									?>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
	</section>
	</div>

			<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
