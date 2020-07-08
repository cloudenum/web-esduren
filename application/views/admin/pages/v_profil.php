	 <!-- Content Wrapper. Contains page content -->
	 <div class="content-wrapper">
	 	<!-- Content Header (Page header) -->
	 	<section class="content-header">
	 		<h1>
	 			Profil Usaha
	 		</h1>
	 		<ol class="breadcrumb">
	 			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
	 			<li class="active"><a href="<?php echo base_url() ?>admin/profil">Profil</a></li>
	 		</ol>
	 	</section>

	 	<!-- Main content -->
	 	<section class="content container-fluid">
	 		<?php
				echo $this->session->flashdata('alert');
				?>
	 		<div class="row">
	 			<div class="col-md-3">

	 				<!-- Profile Image -->
	 				<div class="box box-primary">

	 					<div class="box-body box-profile text-center">
	 						<h3>Logo</h3>
	 						<img class="profile-user-img img-responsive img-circle" alt="Logo Es Duren" src="<?php echo $profil->logo_path ? $profil->logo_path : base_url('bakul/img/user-icon.png'); ?>">
	 						<h3 class="profile-username text-center"><?php echo $profil->name ?></h3>
	 						<?php echo form_open_multipart('crud/upload_logo', array('id' => 'form-logo', 'class' => 'needs-validation novalidate')); ?>
	 						<label for="edit-logo" class="btn btn-primary btn-block">
	 							<i class="fa fa-cloud-upload"></i> Edit Logo
	 						</label>
	 						<input id="edit-logo" name="edit-logo" type="file" />
	 						</form>
	 					</div>
	 					<!-- /.box-body -->
	 				</div>
	 				<!-- /.box -->
	 			</div>
	 			<!-- /.col -->
	 			<div class="col-md-9">
	 				<div class="nav-tabs-custom">
	 					<ul class="nav nav-tabs">
	 						<li class="active"><a href="#activity" data-toggle="tab">Data Usaha</a></li>
	 						<li><a href="#settings" data-toggle="tab">Edit Data Usaha</a></li>
	 					</ul>
	 					<div class="tab-content">
	 						<div class="active tab-pane" id="activity">
	 							<?php
									if ($profil_count > 0) {

									?>
	 								<dl class="dl-horizontal">
	 									<dt>Nama Usaha</dt>
	 									<dd><?php echo $profil->name ?></dd>
	 									<dt>Email</dt>
	 									<dd><?php echo $profil->email ?></dd>
	 									<dt>Alamat</dt>
	 									<dd><?php echo $profil->alamat ?></dd>
	 									<dt>Tentang/Sejarah Usaha</dt>
	 									<dd><?php echo $profil->tentang ?>
	 									</dd>
	 									<dt>Telepon</dt>
	 									<dd><?php echo $profil->phone ?></dd>
	 									<dt>Gambar Resto</dt>
	 									<dd><img class="img-responsive img-rounded" src="<?php echo $profil->resto_image_path ? $profil->resto_image_path : base_url('bakul/img/promo.jpg') ?>" alt="gambar resto" /></dd>
	 								</dl>
	 							<?php
									} else {
										echo 'Silahkan isi data restoran di tab sebelah.';
									}
									?>
	 						</div>
	 						<!-- /.tab-pane -->
	 						<div class="tab-pane" id="settings">
	 							<?php echo form_open_multipart('crud/edit_profil', array('class' => 'needs-validation form-horizontal', 'novalidate' => '')); ?>
	 							<?php
									if ($profil_count > 0) {
									?>
	 								<div class="form-group">
	 									<label for="name" class="col-sm-2 control-label">Nama Usaha</label>

	 									<div class="col-sm-10">
	 										<input name="name" type="text" class="form-control" id="name" placeholder="Nama Usaha" value="<?php echo $profil->name ?>">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="email" class="col-sm-2 control-label">Email</label>

	 									<div class="col-sm-10">
	 										<input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $profil->email ?>">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="alamat" class="col-sm-2 control-label">Alamat</label>

	 									<div class="col-sm-10">
	 										<textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"><?php echo $profil->alamat ?></textarea>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="tentang" class="col-sm-2 control-label">Tentang/Sejarah Usaha</label>

	 									<div class="col-sm-10">
	 										<textarea name="tentang" class="form-control" id="tentang" placeholder="Tentang/Sejarah Usaha"><?php echo $profil->tentang ?></textarea>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="phone" class="col-sm-2 control-label">Telepon</label>

	 									<div class="col-sm-10">
	 										<input name="phone" type="text" class="form-control" id="phone" placeholder="Telepon" value="<?php echo $profil->phone ?>">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label class="col-sm-2 control-label" for="resto-image">Gambar Resto</label>
	 									<div class="col-sm-10">
	 										<input id="resto-image" name="resto_image" type="file">
	 										<p class="help-block">Upload gambar/foto restoran.</p>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<div class="col-sm-offset-2 col-sm-10">
	 										<button type="submit" class="btn btn-danger">Submit</button>
	 									</div>
	 								</div>
	 							<?php
									} else {
									?>
	 								<div class="form-group">
	 									<label for="name" class="col-sm-2 control-label">Nama Usaha</label>

	 									<div class="col-sm-10">
	 										<input name="name" type="text" class="form-control" id="name" placeholder="Nama Usaha">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="email" class="col-sm-2 control-label">Email</label>

	 									<div class="col-sm-10">
	 										<input name="email" type="email" class="form-control" id="email" placeholder="Email">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="alamat" class="col-sm-2 control-label">Alamat</label>

	 									<div class="col-sm-10">
	 										<textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"></textarea>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="tentang" class="col-sm-2 control-label">Tentang/Sejarah Usaha</label>

	 									<div class="col-sm-10">
	 										<textarea name="tentang" class="form-control" id="tentang" placeholder="Tentang/Sejarah Usaha"></textarea>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label for="phone" class="col-sm-2 control-label">Telepon</label>

	 									<div class="col-sm-10">
	 										<input name="phone" type="text" class="form-control" id="phone" placeholder="Telepon">
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label class="col-sm-2 control-label" for="resto-image">Gambar Resto</label>
	 									<div class="col-sm-10">
	 										<input id="resto-image" name="resto_image" type="file">
	 										<p class="help-block">Upload gambar/foto restoran.</p>
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<div class="col-sm-offset-2 col-sm-10">
	 										<button type="submit" class="btn btn-danger">Submit</button>
	 									</div>
	 								</div>
	 							<?php
									}
									?>
	 							</form>
	 						</div>
	 						<!-- /.tab-pane -->
	 					</div>
	 					<!-- /.tab-content -->
	 				</div>
	 				<!-- /.nav-tabs-custom -->
	 				<div class="box box-primary">
	 					<div class="box-header with-border">
	 						<h3 class="box-title">Edit Map</h3>

	 						<div class="box-tools pull-right">
	 							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	 							</button>
	 						</div>
	 						<!-- /.box-tools -->
	 					</div>
	 					<!-- /.box-header -->
	 					<div class="box-body">
	 						<form id="place-id-form" method="post">
	 							<div class="form-group">
	 								<label for="phone" class="col-sm-2 control-label">Google Maps Place ID</label>
	 								<div class="col-sm-10">
	 									<input name="maps_place_id" type="text" class="form-control" id="place-id" placeholder="Gunakan tools dibawah jika sudah setting GMAP API KEY" required>
	 								</div>
	 							</div>
	 							<div class="form-group">
	 								<div class="col-sm-offset-2 col-sm-10">
	 									<button type="submit" class="btn btn-danger">Save</button>
	 								</div>
	 							</div>
	 						</form>
	 					</div>
	 					<!-- /.box-body -->
	 					<?php
							if (isset($map_js) && !empty($map_js)) {
							?>
	 						<!-- BEGIN SECTION MAP -->
	 						<section class="google-maps">
	 							<div id="map-container" class="container-fluid">
	 								<iframe width="100%" height="500" src="//jsfiddle.net/hammam_afiq/eohcv5ks/embedded/result/" allowfullscreen="allowfullscreen" allowpaymentrequest frameborder="0"></iframe>
	 								<!-- <div style="display: none">
	 									<input id="pac-input" class="controls" type="text" placeholder="Enter a location" />
	 								</div>
	 								<div id="map"></div>
	 								<div id="infowindow-content">
	 									<span id="place-name" class="title"></span><br />
	 									<strong>Place ID:</strong> <span id="place-id"></span><br />
	 									<span id="place-address"></span>
	 								</div> -->
	 							</div>
	 						</section>
	 						<!-- END SECTION MAP -->
	 					<?php
							} else {
							?>
	 						<div class="box-body">
	 							<p class="text-danger">Belum setting gmap key. <a href="<?php echo base_url('admin/setting') ?>">Silahkan setting disini.</a></p>
	 						</div>
	 					<?php
							}
							?>
	 					<div class="box-body">
	 						<p>Atau gunakan <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder">tools ini.</a></p>
	 					</div>
	 				</div>
	 			</div>
	 			<!-- /.col -->

	 		</div>
	 		<!-- /.row -->
	 	</section>
	 </div>
