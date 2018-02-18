<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Usaha
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<?php 
				echo $this->session->flashdata('alert');
			?>
			<div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Jam Buka</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<form action="<?php echo base_url() ?>crud/update_jambuka" method="POST" id="test">
					<div class="form-group col-sm-6">
						<label for="day" class="control-label">Pilih Hari</label>

						<div>
							<select class="form-control" id="day" name="day">
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jum'at</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label>
							<input type="radio" id="buka" name="flag" class="flat" value="1">
							Buka
						</label>
						<label>
							<input type="radio" id="tutup" name="flag" class="flat" value="0">
							Tutup
						</label>
					</div>
					<div class="form-group col-sm-12">
	 					<div class = "row">
	 						<div class = "col-sm-12">
								<label>Jam Buka</label>
							</div>
						</div>
						<div class = "row">
							<div class="col-sm-5">
								<div class="bootstrap-timepicker">
									<div class="input-group">
										<input type="text" name="open_hour" class="form-control timepicker">

										<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
										</div>
									</div>
									<!-- /.input group -->
								</div>
							</div>
							<div class="col-sm-2 text-center">
								<p>Sampai</p>
							</div>
							<div class="col-sm-5">
								<div class="bootstrap-timepicker">
									<div class="input-group">
										<input type="text" name="close_hour" class="form-control timepicker">

										<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
										</div>
									</div>
									<!-- /.input group -->
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-danger">Edit</button>
						</div>
					</div>
				</form>
            </div>
            <!-- /.box-body -->
          </div>
</section>
</div>
