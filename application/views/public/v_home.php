
<!-- BEGIN SLIDER -->
<section class="home-slider">
<div id="home-slider" class="owl-carousel">
	<!-- slide item -->
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slide-caption slider-caption-left">
						<h2 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Es Duren Kombinasi</h2>
						<div data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" class="line"></div>
						<p data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">
							Jl. Prof. Dr. Suharso, Purwokerto Utara, Banyumas, Jawa Tengah 53115
						</p>
					</div>
					<div class="slide-layer-img">
						<img src="<?php echo base_url(); ?>bakul/img/chef2.png" alt="slide-layer" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">
					</div>
				</div>
			</div>
		</div>
		<div class="filter-slider"></div>
		<div class="slide-item">
			<img src="<?php echo base_url(); ?>bakul/img/esduren1.jpg" alt="slide">
		</div>
	</div>
	<!-- end slide item -->
	<!-- slide item -->
	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slide-caption" >
						<h2 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Es Duren Kombinasi</h2>
						<div data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" class="line"></div>
						<p data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" style="max-width: 500px">
							Jl. Prof. Dr. Suharso, Purwokerto Utara, Banyumas, Jawa Tengah 53115
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="filter-slider"></div>
		<div class="slide-item">
			<img src="<?php echo base_url(); ?>bakul/img/esduren2.jpg" alt="slide">
		</div>
	</div>
	<!-- end slide item --></div>
</section>
<!-- END SLIDER -->
<!-- BEGIN PROMO -->
<section class="promo">
<div class="promo-first-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12 pr-row">
				<div id="goto-about" class="wrap-promo">
					<div class="wp-right to-right">
						<h2>Tentang Kami</h2>
						<br>
						<div class="wp-right-about">
							 <?php echo $profil[0]->tentang;?>
							</div>
					</div>
					<div id="left-promo" class="owl-carousel wp-left to-left"  style="background: url('http://localhost/esduren/bakul/img/promo.jpg');">
					<?php
						$query = $this->db->get('promo');

						if ($query->num_rows() > 0)
						{
							foreach ($query->result() as $row)
							{
						?>
						<!-- Item -->
						<div class="item">
							<!-- <div class="pr-left-bg">
								<img src="<?php echo base_url(); ?>bakul/img/promo.jpg" alt="img-promo">
							</div> -->
							<div class="pr-left-content">
								<img src="<?php echo $row->image_path; ?>" alt="<?php echo $row->name; ?>">
								<!-- <h1>Menu<br>hari ini</h1>
								<p>
									Sate Ayam <br>
									Soup Jamur<br>
									Carrot and Ginger Soup<br>Soup Brokoli</p>
								<div class="explore-menu-btn">
									<a href="#goto-reservation" class="rounded-button fadetransition page-scroll">RESERVE NOW</a>
								</div> -->
							</div>
						</div>
						<!-- End Item -->
						<?php
							}
						}
						?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
<!-- <div class="menu-option">
		<div class="container">
			<div class="col-md-3 col-sm-6">
				<div class="box-menu-package">
					<div class="bmp-icon">
						<img src="<?php echo base_url(); ?>bakul/img/breakfast.png" alt="menu">
					</div>
					<div class="bmp-text">
						<h3>Menu Sarapan</h3>
						<p>
							 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						</p>
					</div>
					<div class="bmp-button">
						<a href="#" class="outline-btn fadetransition">More</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-menu-package">
					<div class="bmp-icon">
						<img src="<?php echo base_url(); ?>bakul/img/lunch.png" alt="menu">
					</div>
					<div class="bmp-text">
						<h3>Makan Siang</h3>
						<p>
							 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						</p>
					</div>
					<div class="bmp-button">
						<a href="#" class="outline-btn fadetransition">More</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-menu-package">
					<div class="bmp-icon">
						<img src="<?php echo base_url(); ?>bakul/img/special.png" alt="menu">
					</div>
					<div class="bmp-text">
						<h3>Menu Spesial</h3>
						<p>
							 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						</p>
					</div>
					<div class="bmp-button">
						<a href="#" class="outline-btn fadetransition">More</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-menu-package">
					<div class="bmp-icon">
						<img src="<?php echo base_url(); ?>bakul/img/dinner.png" alt="menu">
					</div>
					<div class="bmp-text">
						<h3>Makan Malam</h3>
						<p>
							 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						</p>
					</div>
					<div class="bmp-button">
						<a href="#" class="outline-btn fadetransition">More</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<div class="bg-promo"></div>
</section>
<!-- END PROMO -->
<!-- BEGIN FOOD MENU -->
<section id="goto-featured-menu" class="foodmenu">
<div class="wrap-fm">
	<div class="full-heading-featured">
		<div class="heading-featured">MENU UNGGULAN</div>
	</div>
	<div id="foodmenu" class="owl-carousel">
		<?php
		$query = $this->db->get('menu');

		$nomor = 3;

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				if ($nomor%2 ==1){
		?>
		<!-- item -->
		<div class="item">
			<div class="box-fm">
				<div class="bfm-img">
					<img class="img-responsive" src="<?php echo $row->image_path ?>" alt="<?php echo $row->name ?>">
				</div>
				<div class="bfm-price">
					<div class="info-menu-box">
						<div class="bfm-text">
							<div class="bfm-food-name"><?php echo $row->name ?></div>
							<div class="line-fm"></div>
							<div class="bfm-food-info">
								<?php echo $row->description ?>
							</div>
							<div class="bfm-food-price">
								<span class="dollar">Rp </span><?php echo $row->price ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end item -->
		<?php 
				} 
				else if ($nomor%2 == 0)
				{
		?>
		<!-- item -->
		<div class="item">
			<div class="box-fm">
				<div class="bfm-price">
					<div class="info-menu-box">
						<div class="bfm-text">
							<div class="bfm-food-name"><?php echo $row->name ?></div>
							<div class="line-fm"></div>
							<div class="bfm-food-info">
								<?php echo $row->description ?>
							</div>
							<div class="bfm-food-price">
								<span class="dollar">Rp </span><?php echo $row->price ?>
							</div>
						</div>
					</div>
				</div>
				<div class="bfm-img">
					<img class="img-responsive" src="<?php echo $row->image_path ?>" alt="<?php echo $row->name ?>">
				</div>
			</div>
		</div>
		<!-- end item -->
		<?php 
				}
			
				$nomor++;
			}
		}
		?>
	</div>
</div>
<div class="explore-menu-btn">
	<a class="rounded-button fadetransition" href="<?php echo base_url()?>varian">EXPLORE FULL MENU</a>
</div>
</section>
<!-- END FOOD MENU -->
<!-- Counter Number -->
<!-- <section id="counter" class="counter-number">
<div class="container cn-box">
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="counter-box">
				<div class="counter-circle">
					<div class="cc-number">
						<div class="cc-number-value">
							<span class="count">9020</span>+
						</div>
					</div>
				</div>
				<div class="cc-title">Daily Customers</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="counter-box">
				<div class="counter-circle">
					<div class="cc-number">
						<div class="cc-number-value">
							<span class="count">45</span>+
						</div>
					</div>
				</div>
				<div class="cc-title">Our Chefs</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="counter-box">
				<div class="counter-circle">
					<div class="cc-number">
						<div class="cc-number-value">
							<span class="count">122</span>+
						</div>
					</div>
				</div>
				<div class="cc-title">Food Menus</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="counter-box">
				<div class="counter-circle">
					<div class="cc-number">
						<div class="cc-number-value">
							<span class="count">34</span>+
						</div>
					</div>
				</div>
				<div class="cc-title">Awwards Won</div>
			</div>
		</div>
	</div>
</div>
</section> -->
<!-- TESTIMONIAL -->
<section id="goto-testimonial" class="testimonial">
<div class="tst-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-section">
					<div class="heading-title">What Customers Say</div>
					<?php
						$query = $this->db->get('testimonials');
					?>
					<div class="heading-text"><?php echo $query->num_rows() ?>+ Satisfied Costumers</div>
				</div>
				<div class="wrap-item-testimonial">
					<div id="testimonial" class="owl-carousel">
					<?php
						if ($query->num_rows() > 0)
						{
							foreach ($query->result_array() as $row)
							{
						?>
						<!-- item -->
						<div class="item">
							<div class="item-testimonial">
								<div class="client-content text-center">
									<div class="rating">
									<?php	
										for($i=1; $i<=5; $i++) 
										{	
											if($i <= $row["rating"])
											{ 
												$selected = "color: #ffc700;"; 
											}
											else
											{ 
												$selected = ""; 
											}
									?>
											<span class="fa fa-star" style="<?php echo $selected; ?>"></span>
									<?php 
										}
									?>
									</div>
									<p>
										 <?php echo $row['testimonial']; ?>
									</p>
									<div class="client-title">
										<h4><?php echo $row['name']; ?></h4>
										<h5><?php echo $row['submited_date'].' '.$row['submited_time']; ?></h5>
									</div>
								</div>
							</div>
						</div>
						<!-- end item -->
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-tst">
	<div class="bg-color-tst"></div>
	<div class="bg-img-tst parallax-stellar testimonial-parallax" data-stellar-background-ratio="0.5"></div>
</div>
</section>
<!-- END TESTIMONIAL -->
<!-- RESERVATION -->
<section id="goto-reservation" class="reservation">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well-block">
				<div class="well-title">
					<div class="heading-section">
						<div class="heading-title">Menurutmu Es Duren itu Seperti Apa sih?</div>
						<div class="heading-text">Tulis Ulasanmu disini</div>
					</div>
				</div>
				<div class="form-testimonial">
					<form action="<?php echo base_url(); ?>crud/add_testimonial" method="POST">
						<!-- Form start -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="name">Nama</label>
									<input id="name" name="name" type="text" placeholder="Nama" class="form-control input-md">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="testimonial">Ulasanmu</label>
									<textarea class="form-control" id="testimonial" name="testimonial"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group col-xs-4 col-xs-offset-4">
									<input type='hidden' name='rating' id='rating'>
									<div class="rating text-center">
										<span id="star-0" class="fa fa-star" onmouseover="highlightStar(0)" onmouseout="removeHighlight(0)" onClick="selectStar(0)"></span>
										<span id="star-1" class="fa fa-star" onmouseover="highlightStar(1)" onmouseout="removeHighlight(1)" onClick="selectStar(1)"></span>
										<span id="star-2" class="fa fa-star" onmouseover="highlightStar(2)" onmouseout="removeHighlight(2)" onClick="selectStar(2)"></span>
										<span id="star-3" class="fa fa-star" onmouseover="highlightStar(3)" onmouseout="removeHighlight(3)" onClick="selectStar(3)"></span>
										<span id="star-4" class="fa fa-star" onmouseover="highlightStar(4)" onmouseout="removeHighlight(4)" onClick="selectStar(4)"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group btn-booknow">
									<input type="submit" class="rounded-button fadetransition" value="Kirim!"/>
								</div>
							</div>
						</div>
					</form>
					<!-- form end --></div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- END RESERVATION -->
