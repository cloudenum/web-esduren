<!-- BEGIN BANNER SECTION -->
<section class="title-banner">
	<div class="wrap-tb-bg">
		<div class="tb-background">
			<div class="tb-background-bgoverlay"></div>
			<div class="tb-background-img" style="bottom: 0px">
				<img src="<?php echo base_url(); ?>bakul/img/page-menu.jpg" alt="banner">
			</div>
		</div>
	</div>
	<div class="tb-text">
		<h1>MENU</h1>
		<div class="tb-line"></div>
	</div>
</section>
<!-- END BANNER SECTION -->
<!-- BEGIN CONTENT PAGE -->
<section class="inner-page-content food-menu-page">
	<div class="container">
		<?php

		if (count($categorized_menu) > 0) {
			foreach ($categorized_menu as $category) {
				if (count($category->menus) <= 0) break;
		?>
				<div class="row-menu">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-menu">
								<h1 class="page-title"><?php echo $category->category ?></h1>
								<div><?php echo $category->description ?></div>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						if (count($category->menus) > 0) {
							foreach ($category->menus as $menu) {
						?>
								<div class="col-md-6 col-sm-12">
									<!-- menu item -->
									<div class="menu-item">
										<div class="menu-item-wrap">
											<div class="miw-left">
												<div class="menu-item-img" style="background-image: url('<?php echo $menu->image_path ?>')">
												</div>
											</div>
											<div class="miw-right">
												<div class="miw-info">
													<div class="menu-title">
														<h3><?php echo $menu->name ?></h3>
													</div>
													<?php if ($menu->price) {
													?>
														<div class="menu-rate">Rp <?php echo $menu->price ?></div>
													<?php
													}
													?>
												</div>
												<p>
													<?php echo $menu->description ?>
												</p>
											</div>
										</div>
									</div>
									<!-- end menu item -->
								</div>
						<?php
							}
						} else {
							echo 'Mohon maaf untuk saat ini data belum ada.';
						}
						?>

					</div>
				</div>
		<?php
			}
		}
		?>
	</div>
</section>
<!-- END CONTENT PAGE -->
