	 <!-- Content Wrapper. Contains page content -->
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Usaha
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<?php 
				echo $this->session->flashdata('alert');
			?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
		  
            <div class="box-body box-profile text-center">
				<h3>Logo</h3>
				<img class="profile-user-img img-responsive img-circle" alt="Logo Es Duren" src="<?php echo $profil[0]->logo_path; ?>">
				<h3 class="profile-username text-center">Es Duren Kombinasi</h3>
				<?php echo form_open_multipart('crud/upload_logo', array('id' => 'form-logo','class' => 'needs-validation novalidate'));?>
				<label for="edit-logo" class="btn btn-primary btn-block">
					<i class="fa fa-cloud-upload"></i> Edit Logo
				</label>
					<input id="edit-logo" name="edit-logo" type="file"/>
				</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data Usaha</a></li>
              <li><a href="#settings" data-toggle="tab">Edit Data Usaha</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
			  <?php 
				$query = $this->db->get('profil');

				 $value = $query->result_array();
				 
				if ($query->num_rows() > 0)
				{
				
			?>
			  <dl class="dl-horizontal">
                <dt>Nama Usaha</dt>
                <dd><?php echo $value[0]["name"] ?></dd>
                <dt>Email</dt>
                <dd><?php echo $value[0]['email'] ?></dd>
                
                <dt>Alamat</dt>
                <dd><?php echo $value[0]['alamat'] ?></dd>
                <dt>Tentang/Sejarah Usaha</dt>
                <dd><?php echo $value[0]['tentang'] ?>
                </dd>
				<dt>Telepon</dt>
				<dd><?php echo $value[0]['phone'] ?></dd>
              </dl>
			  <?php
				}
				else
				{
					echo 'Sepertinya ada masalah.';
				} 
			  ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
			  <form class="form-horizontal" action="<?php echo base_url() ?>crud/edit_profil" method="POST">
			  <?php

				if ($query->num_rows() > 0)
				{

					echo 1;
			  ?>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nama Usaha</label>

                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control" id="name" placeholder="Nama Usaha" value="<?php echo $value[0]['name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $value[0]['email']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"><?php echo $value[0]['alamat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tentang" class="col-sm-2 control-label">Tentang/Sejarah Usaha</label>

                    <div class="col-sm-10">
                      <textarea name="tentang" class="form-control" id="tentang" placeholder="Tentang/Sejarah Usaha"><?php echo $value[0]['tentang']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Telepon</label>

                    <div class="col-sm-10">
                      <input name="phone" type="text" class="form-control" id="phone" placeholder="Telepon" value="<?php echo $value[0]['phone']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
				<?php
				}
				else
				{
				?>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nama Usaha</label>

                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control" id="name" placeholder="Nama Usaha">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tentang" class="col-sm-2 control-label">Tentang/Sejarah Usaha</label>

                    <div class="col-sm-10">
                      <textarea name="tentang" class="form-control" id="tentang" placeholder="Tentang/Sejarah Usaha"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Telepon</label>

                    <div class="col-sm-10">
                      <input name="phone" type="text" class="form-control" id="phone" placeholder="Telepon">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
				<?php
				}
				?>
				</form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

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

      </div>
      <!-- /.row -->
	</section>
</div>
