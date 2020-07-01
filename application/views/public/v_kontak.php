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
								<input class="form-control" required="" id="name" placeholder="Name" type="text"></div>
							<div class="form-group">
								<input class="form-control" id="email" placeholder="Email" name="email" required="" type="email"></div>
							<div class="form-group">
								<input class="form-control" required="" id="subject" placeholder="Subject" type="text"></div>
							<div class="form-group" style="position: relative;">
								<textarea class="form-control" required="" id="message" placeholder="Text" rows="3" spellcheck="true" style="background: rgb(238, 241, 245) none repeat scroll 0% 0%; z-index: auto; position: relative; line-height: 22.85px; font-size: 16px; transition: none 0s ease 0s ;"></textarea>
							</div>
							<div class="form-group text-center">
								<input class="rounded-button fadetransition" value="SEND" type="submit">
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
					<div id="map_canvas"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END SECTION MAP -->
