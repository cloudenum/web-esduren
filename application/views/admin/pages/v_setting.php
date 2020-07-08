<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Situs
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
			<li class="active"><a href="<?php echo base_url() ?>admin/setting">Pengaturan Situs</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

		<?php
		echo $this->session->flashdata('alert');
		?>
		<div class="box box-info box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Pengaturan Home</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<div class="box-body">
				<div class="box-group" id="accordion">
					<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
					<div class="panel box box-secondary">
						<div class="box-header with-border">
							<h4 class="box-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
									Slides
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
							<div class="box-body">
								<?php echo form_open_multipart('crud/upload_slide', array('class' => 'needs-validation', 'novalidate' => '')); ?>
								<div class="form-group">
									<label for="slide1">Slide Pertama</label>
									<input id="slide1" name="slidefile1" type="file">
									<p class="help-block">Upload gambar/foto slide pertama yang akan diganti.</p>
								</div>
								<div class="form-group">
									<label for="slide2">Slide Terakhir</label>
									<input id="slide2" name="slidefile2" type="file">
									<p class="help-block">Upload gambar/foto slide terakhir yang akan diganti.</p>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
					<div class="panel box box-secondary">
						<div class="box-header with-border">
							<h4 class="box-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
									Testimoni Background
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
							<?php echo form_open_multipart('crud/upload_background_testimoni', array('class' => 'needs-validation', 'novalidate' => '')); ?>
							<div class="form-group">
								<label for="image">Gambar background</label>
								<input id="image" name="image" type="file">
								<p class="help-block">Upload gambar/foto yang akan digunakan sebagai background.</p>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Pengaturan Lanjut</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<div class="box-body">
				<div id="advanced-failed-alert" class="alert alert-danger alert-dismissible hidden">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
					<p></p>
				</div>
				<div id="advanced-success-alert" class="alert alert-success alert-dismissible hidden">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					<p>Berhasil ubah setting.</p>
				</div>
				<?php echo form_open('', array('id' => 'advanced-form', 'class' => 'needs-validation', 'novalidate' => '')); ?>
				<div class="form-group ">
					<label>GTAG ID</label>
					<input class="form-control " name="gtag" placeholder="ID Google Analytics" type="text">
				</div>
				<div class="form-group ">
					<label>Google Maps API Key</label>
					<input class="form-control " name="gmap" placeholder="Google Maps API Key" type="text">
				</div>
				<div class="form-group ">
					<label>Sendgrid API Key</label>
					<input class="form-control" name="sendgrid" placeholder="Sendgrid API Key" type="text">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<!-- /.box-body -->
		</div>
	</section>
</div>
