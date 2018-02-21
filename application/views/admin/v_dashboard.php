<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Welcome, <?php echo $this->session->nama ?><small>Have Fun!</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
			<li class="active">Home</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

		<div class="row">
			<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
				<h3><?php echo $jumlah['menu'][0]->hasil ?></h3>

				<p>Jumlah Menu</p>
				</div>
				<div class="icon">
				<i class="fa fa-cutlery"></i>
				</div>
				<a href="<?php echo base_url() ?>admin/menu" class="small-box-footer">
				Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				<h3><?php echo $jumlah['testimonials'][0]->hasil ?></h3>

				<p>Jumlah Testimoni</p>
				</div>
				<div class="icon">
				<i class="fa fa-thumbs-up"></i>
				</div>
				<a href="<?php echo base_url() ?>admin/testimoni" class="small-box-footer">
				Selengkapnya <i class="fa fa-arrow-circle-right"></i>
				</a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
				<h3><?php echo $jumlah['gallery'][0]->hasil ?></h3>

				<p>Jumlah galeri foto </p>
				</div>
				<div class="icon">
				<i class="fa fa-file-image-o"></i>
				</div>
				<a href="<?php echo base_url() ?>admin/tambah_gambar" class="small-box-footer">
				Selengkapnya<i class="fa fa-arrow-circle-right"></i>
				</a>
				</div>
			</div>
		</div>

		<section id="auth-button"></section>
		<section id="view-selector"></section>
		<section id="timeline"></section>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
