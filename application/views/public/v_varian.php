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
	<h1>OUR MENU</h1>
	<div class="tb-line"></div>
</div>
</section>
<!-- END BANNER SECTION -->
<!-- BEGIN CONTENT PAGE -->
<section class="inner-page-content food-menu-page">
<div class="container">
	<div class="row-menu">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-menu">
					<h1 class="page-title">Es Duren</h1>
					<div>Es duren terenak di Purwokerto</div>
				</div>
			</div>
		</div>
		<div class="row">
		<?php
		$query = $this->db->get('menu');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
		?>
			<div class="col-md-6 col-sm-12">
				<!-- menu item -->
				<div class="menu-item">
					<div class="menu-item-wrap">
						<div class="miw-left">
							<div class="menu-item-img" style="background-image: url('<?php echo $row->image_path ?>')">
							</div>
						</div>
						<div class="miw-right">
							<div class="miw-info">
								<div class="menu-title">
									<h3><?php echo $row->name ?></h3>
								</div>
								<div class="menu-rate">Rp <?php echo $row->price ?></div>
							</div>
							<p>
								<?php echo $row->description ?>
							</p>
						</div>
					</div>
				</div>
				<!-- end menu item -->
			</div>
			<?php
			}
		}
		else	
		{
				echo 'Mohon maaf untuk saat ini data belum ada.';			
		}
				?>
		
		</div>
	</div>
	<div class="row-menu">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-menu">
					<h1 class="page-title">Dessert</h1>
					<div>Best quality Dessert Food</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<!-- menu item -->
				<div class="menu-item">
					<div class="menu-item-wrap">
						<div class="miw-left">
							<div class="menu-item-img" style="background-image: url('<?php echo base_url(); ?>bakul/img/menu-fruit-yogurt.jpg')">
							</div>
						</div>
						<div class="miw-right">
							<div class="miw-info">
								<div class="menu-title">
									<h3>Fruit Yoghurt</h3>
								</div>
								<div class="menu-rate">$2.19</div>
							</div>
							<p>
								 combination of fresh fruits and yogurt.
							</p>
						</div>
					</div>
				</div>
				<!-- end menu item -->
			</div>
		</div>
	</div>
</div>
</section>
<!-- END CONTENT PAGE -->
