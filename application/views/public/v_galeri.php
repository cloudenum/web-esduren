<!-- BEGIN BANNER SECTION -->
<section class="title-banner">
	<div class="wrap-tb-bg">
		<div class="tb-background">
			<div class="tb-background-bgoverlay"></div>
			<div class="tb-background-img" style="bottom: 0px">
				<img src="<?php echo base_url(); ?>bakul/img/gallery.jpg" alt="banner">
			</div>
		</div>
	</div>
	<div class="tb-text">
		<h1>GALERI</h1>
		<div class="tb-line"></div>
	</div>
</section>
<!-- END BANNER SECTION -->
<!-- BEGIN CONTENT PAGE -->
<section class="inner-page-content gallery-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12 innerpage-content-wrap">
				<!-- Begin gallery list -->
				<div class="list-image-gallery">
					<?php
					if (count($gallery) > 0) {
						$nomor = 1;
						foreach ($gallery as $row) { ?>
							<!-- gallery item -->
							<div class="gallery-img-box gallery-customers">
								<div class="gallery-img-box-in">
									<div class="img-center hovereffect">
										<div class="img-thumbnail" style="background-image: url('<?php echo base_url('uploads/gallery/') . $row->thumbnail_path; ?>');"></div>
										<div class="overlay">
											<p>
												<a class="viewthumb" href="#" data-image-id="<?php echo $nomor++ ?>" data-toggle="modal" data-file-type="<?php echo $row->file_type; ?>" data-media="<?php echo base_url('uploads/gallery/') . $row->media_path; ?>" data-target="#image-gallery">
													<?php
													if (preg_match('/video\/.+/', $row->file_type)) { ?>
														<i class="fa fa-play-circle-o"></i>
													<?php
													} else { ?>
														<i class="fa fa-search-plus"></i>
													<?php
													} ?>
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /gallery item -->
					<?php
						}
					} else {
						echo 'Belum ada gambar';
					} ?>
					<div class="clear"></div>
				</div>
				<!-- End gallery list -->
			</div>
		</div>
	</div>
</section>
<!-- END CONTENT PAGE -->
<!-- BEGIN GALLERY MODAL -->
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i><span class="sr-only">Close</span></button>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="row modal-body">
				<div class="modal-nav-container col-md-1 col-xs-2">
					<button type="button" class="btn btn-default btn-nav" id="show-previous-image"><i class="fa fa-angle-left"></i></button>
				</div>
				<div class="col-md-10 col-xs-8 text-justify" id="media-container">
					<img id="image-gallery-image" class="img-responsive" alt="big image">
				</div>
				<div class="modal-nav-container col-md-1 col-xs-2">
					<button type="button" id="show-next-image" class="btn btn-default btn-nav"><i class="fa fa-angle-right"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END GALLERY MODAL -->
