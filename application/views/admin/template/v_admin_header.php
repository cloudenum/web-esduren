<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manage Web</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<!-- Pace -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/white/pace-theme-flash.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<!-- Timepicker -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.2.3/css/bootstrap-timepicker.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/skins/all.css">

	<?php
	if (isset($css_to_load) && is_array($css_to_load)) {
		foreach ($css_to_load as $css_file) {
			if (!preg_match('/https?:\/\//', $css_file)) { ?>
				<link rel="stylesheet" href="<?php echo base_url() ?>bakul/<?php echo $css_file; ?>">
			<?php
			} else { ?>
				<link rel="stylesheet" href="<?php echo $css_file; ?>">
	<?php
			}
		}
	} ?>

	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/admin/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/admin/css/custom.css">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/admin/css/skin-blue.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="fixed hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="#" data-toggle="push-menu" role="button" class="logo">
				<?php $this->load->helper('text'); ?>
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b><?php echo abbreviate($profil->name); ?></b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b><?php echo $profil->name ?></b></span>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="pull-right">
					<a href="<?php echo base_url() ?>admin/logout" class="btn btn-danger" style="height: 50px; line-height:2.25;">Sign out</a>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="info">
						<p><?php echo $this->session->nama; ?></p>
						<!-- Status -->
						<span><i class="fa fa-circle text-success"></i> <?php echo $this->session->status ?></span>

					</div>
				</div>

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MENU</li>
					<!-- Optionally, you can add icons to the links -->
					<li id="nav-home">
						<a href="<?php echo base_url() ?>admin/dashboard"><i class="fa fa-home"></i> <span>Home</span></a>
					</li>
					<li id="nav-testimoni">
						<a href="<?php echo base_url() ?>admin/testimoni"><i class="fa fa-thumbs-up"></i> <span>Testimoni</span></a>
					</li>
					<li id="nav-menu" class="treeview">
						<a href="<?php echo base_url() ?>admin/menu">
							<i class="fa fa-archive"></i>
							<span>Produk/Menu</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url() ?>admin/menu"><span>Daftar Produk</span></a></li>
							<li><a href="<?php echo base_url() ?>admin/kategori"><span>Ketegori Produk</span></a></li>
						</ul>
					</li>
					<li id="nav-galeri" class="treeview">
						<a href="#">
							<i class="fa fa-file-image-o"></i>
							<span>Galeri</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url() ?>admin/tambah_gambar"><i class="fa fa-plus"></i> Tambah Gambar</a></li>
						</ul>
					</li>
					<li id="nav-profil" class="treeview">
						<a href="#">
							<i class="fa fa-industry"></i>
							<span>Profil</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url() ?>admin/profil"><i class="fa fa-users"></i> Profil Usaha</a></li>
							<li><a href="<?php echo base_url() ?>admin/medsos"><i class="fa fa-comments"></i> Media Sosial</a></li>
							<li><a href="<?php echo base_url() ?>admin/jam_buka"><i class="fa fa-clock-o"></i> Jam Buka</a></li>
						</ul>
					</li>
					<li id="nav-promo" class="treeview">
						<a href="#">
							<i class="fa fa-usd"></i>
							<span>Promo</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/promo"><i class="fa fa-list-alt"></i>Daftar Promo</a></li>
							<li><a href="<?php echo base_url(); ?>admin/tambahpromo"><i class="fa fa-plus"></i> Tambah Promo</a></li>
						</ul>
					</li>
					<li id="nav-akun" class="treeview">
						<a href="#">
							<i class="fa fa-user"></i>
							<span>Akun</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<?php
							$level = $this->session->level;
							if ($level == '1') {
							?>
								<li><a href="<?php echo base_url(); ?>admin/akun"><i class="fa fa-user"></i> Daftar Akun</a></li>
								<li><a href="<?php echo base_url(); ?>admin/tambahakun"><i class="fa fa-plus"></i> Tambah Akun</a></li>
							<?php
							}
							?>
							<li><a href="<?php echo base_url(); ?>admin/editakun"><i class="fa fa-clock-o"></i> Edit Akun</a></li>
						</ul>
					</li>
					<li id="nav-site">
						<a href="<?php echo base_url() ?>admin/setting">
							<i class="fa fa-cog"></i>
							<span>Pengaturan Situs</span>
						</a>
					</li>
				</ul>
				<!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>
