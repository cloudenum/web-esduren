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
	<h1>OUR GALLERY</h1>
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
			$query = $this->db->get('gallery');

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					
			?>	
				<!-- gallery item -->
				<div class="gallery-img-box gallery-customers">
					<div class="gallery-img-box-in">
						<div class="img-center hovereffect ">
							<img src="<?php echo base_url('uploads/gallery/').$row->image_path;?>" alt="img">
							<div class="overlay">
								<p>
									<a class="viewthumb" href="#" data-image-id="<?php echo $row->id?>" data-toggle="modal" data-image="<?php echo base_url('uploads/gallery/').$row->image_path;?>" data-target="#image-gallery">Detail</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /gallery item -->
				<?php 
				}
			}else{
				echo 'Belum ada gambar';
			}
				?>
				<div class="clear"></div>
			</div>
			<!-- End gallery list --></div>
	</div>
</div>
</section>
<!-- END CONTENT PAGE -->
<!-- BEGIN GALLERY MODAL -->
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="image-gallery-title">Detail</h4>
			</div>
			<div class="modal-body">
				<img alt="img" id="image-gallery-image" class="img-responsive" src="<?php echo base_url(); ?>bakul/img/default-img.html"></div>
			<div class="modal-footer">
				<div class="col-md-1 col-xs-2">
					<button type="button" class="btn btn-default" id="show-previous-image"><i class="fa fa-angle-left"></i></button>
				</div>
				<div class="col-md-10 col-xs-8 text-justify" id="image-gallery-caption"></div>
				<div class="col-md-1 col-xs-2">
					<button type="button" id="show-next-image" class="btn btn-default"><i class="fa fa-angle-right"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END GALLERY MODAL -->
