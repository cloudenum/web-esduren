<body id="<?php
			if (is_array($body_id)) {
				echo $body_id[0];
			}
			?>" class="theme-green">
	<!-- BEGIN PRELOADING -->
	<div class="preloading">
		<div class="wrap-preload">
			<img class="cssload-loader" src="<?php echo base_url(); ?>bakul/img/durian-ico.png"></img>
			<div class="text-preloading">LOADING</div>
		</div>
	</div>
	<!-- END PRELOADING -->
	<!-- BEGIN HEADER -->
	<header class="header">
		<div class="in-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-bottom">
							<div class="row">
								<div class="col-md-3 col-logo">
									<a href="<?php echo base_url(); ?>">
										<div class="logo">
											<img class="x" alt="logo-header" src="<?php echo $profil->logo_path ?
																						$profil->logo_path :
																						'https://via.placeholder.com/400x250?text=YourLogo'; ?>" />
										</div>
									</a>
								</div>
								<div class="col-md-9 col-nav">
									<div class="nav-header">
										<nav id="main_nav" class="navbar">
											<!-- Brand and toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#respmenu">
													<span class="menubtn">MENU</span>
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
											</div>
											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="respmenu">
												<ul class="nav navbar-nav menu">
													<li>
														<a href="<?php echo base_url(); ?>" class="page-scroll">HOME</a>
													</li>
													<li>
														<a href="<?php echo base_url(); ?>menu" class="page-scroll">MENU</a>
													</li>
													<li>
														<a href="<?php echo base_url(); ?>galeri" class="page-scroll">GALERI</a>
													</li>
													<li>
														<a href="<?php echo base_url(); ?>kontak" class="page-scroll">KONTAK</a>
													</li>
												</ul>
											</div>
											<!-- /.navbar-collapse -->
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- END HEADER -->
