<!-- BEGIN SECTION FOOTER-->
<section class="footer">
<div class="footer-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-wrap-b">
					<div class="footer-content-left">
						<div class="row footer-row-a">
							<div class="col-md-3">
								<div class="logo-footer">
									<img src="<?php echo $profil[0]->logo_path; ?>" alt="logo">
								</div>
							</div>
							<div class="col-md-9">
								<div class="info-footer">
								<?php echo $profil[0]->tentang; ?>
								</div>
							</div>
						</div>
						<div class="row footer-row-b">
							<div class="col-md-12">
								<div class="line-footer"></div>
							</div>
						</div>
						<div class="row footer-row-c">
							<div class="col-md-4 col-sm-12 footer-address">
								<div class="footer-info">
									<div class="footer-info-left">
										<div class="icon-location-pin"></div>
									</div>
									<div class="footer-info-right">
									<?php echo $profil[0]->alamat; ?></div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 footer-address">
								<div class="footer-info">
									<div class="footer-info-left">
										<div class="icon-phone"></div>
									</div>
									<div class="footer-info-right">
									<?php echo $profil[0]->phone; ?></div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 footer-address">
								<div class="footer-info">
									<div class="footer-info-left">
										<div class="icon-envelope"></div>
									</div>
									<div class="footer-info-right">
									<?php echo $profil[0]->email; ?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-content-right">
						<div class="open-hours-wrap">
							<div class="oh-title">JAM BUKA</div>
							<?php 
				$query = $this->db->get('open_hours');

				 $value = $query->result();
				 
				if ($query->num_rows() > 0)
				{
					foreach($value as $row)
					{
			?>
							<div class="oh-day">
								<div class="ohd-day"><?php echo $row->day; ?></div>
								<div class="ohd-time"><?php if ($row->flag != 0){ echo substr($row->open_hour, 0, 5); ?> - <?php echo substr($row->close_hour, 0, 5); }else{ echo "Tutup";}?></div>
								<div class="clear"></div>
							</div>
					<?php
					}
				}
					?>
							<div class="reserphone">
								 Telephone Pemesanan<br>
								 Call <span class="text-theme">&nbsp;&nbsp;<?php echo $profil[0]->phone; ?></span>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div> 
</section>
<!-- END SECTION FOOTER-->
<!-- BEGIN FOOTER-->
<footer>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="footer-b-left ">
				<div class="footer-sosmed-icon ">
				<?php 
					$query = $this->db->get('socmed');

					if ($query->num_rows() > 0)
					{
						foreach ($query->result() as $row)
						{
							
				?>
					<div class="wrap-circle-sosmed ">
						<a href="http://<?php echo $row->link ?>" target="_blank">
						<div class="circle-sosmed fadetransition">
							<i class="icon-social-<?php echo $row->name ?> icons"></i>
						</div>
						</a>
					</div>
					<?php
						}
					}
					?>
				</div>
			</div>
			<div class="footer-b-right ">
				 2018 <?php echo $profil[0]->name ?> All rights reserved. Designed by HidraTheme
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</footer>
<!-- END FOOTER-->
<!-- BACK TO TOP BUTTON -->
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Kembali ke atas" data-toggle="tooltip" data-placement="left"><i class="icon-arrow-up icons"></i></a>
<!-- END BACK TO TOP BUTTON -->
