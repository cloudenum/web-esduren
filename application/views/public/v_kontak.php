<!-- BEGIN BANNER SECTION -->
<section class="title-banner">
	<div class="wrap-tb-bg">
		<div class="tb-background">
			<div class="tb-background-bgoverlay"></div>
			<div class="tb-background-img" style="bottom: 0px">
				<img src="<?php echo base_url(); ?>bakul/img/contact.jpg" alt="banner">
			</div>
		</div>
	</div>
	<div class="tb-text">
		<h1>HUBUNGI KAMI</h1>
		<div class="tb-line"></div>
	</div>
</section>
<!-- END BANNER SECTION -->
<!-- BEGIN CONTENT PAGE -->
<section class="inner-page-content contact-page">
	<div class="container">
		<div class="section-one-wrapper">
			<div class="row">
				<div class="col-md-7 section-left">
					<div class="contact-wrapper-left">
						<h2>Hubungi kami via :</h2>
						<ul class="list-ul">
							<li>
								<i class="fa fa-home"></i><?php echo $profil->alamat; ?>
							</li>
							<li>
								<i class="fa fa-phone"></i><?php echo $profil->phone; ?>
							</li>
							<li>
								<i class="fa fa-envelope"></i><?php echo $profil->email; ?>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-5">
					<div class="contact-wrapper-right">
						<form class="contact-form">
							<div class="form-group">
								<input class="form-control" required id="name" name="name" placeholder="Name" type="text"></div>
							<div class="form-group">
								<input class="form-control" id="email" placeholder="Email" name="email" required type="email"></div>
							<div class="form-group">
								<input class="form-control" required id="subject" name="subject" placeholder="Subject" type="text"></div>
							<div class="form-group" style="position: relative;">
								<textarea class="form-control" name="message" required id="message" placeholder="Text" rows="3" spellcheck="true" style="background: rgb(238, 241, 245) none repeat scroll 0% 0%; z-index: auto; position: relative; line-height: 22.85px; font-size: 16px; transition: none 0s ease 0s ;"></textarea>
							</div>
							<div class="form-group text-center">
								<button class="rounded-button fadetransition" type="submit">KIRIM</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END CONTENT PAGE -->
<!-- BEGIN SECTION MAP -->
<section class="contact-map">
	<div class="homepage-map">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (isset($gmap_key) && !empty($gmap_key)) { ?>
						<iframe width="100%" height="500px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $gmap_key; ?>&q=<?php echo $profil->maps_place_id ?>" allowfullscreen>
						</iframe>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END SECTION MAP -->
