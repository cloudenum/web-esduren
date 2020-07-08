    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
    		<h1>
    			Tambah Promo
    		</h1>
    		<ol class="breadcrumb">
    			<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
    			<li><a href="<?php echo base_url() ?>admin/promo">Promo</a></li>
    			<li class="active"><a href="<?php echo base_url() ?>admin/promo">Tambah Promo</a></li>
    		</ol>
    	</section>

    	<!-- Main content -->
    	<section class="content container-fluid">
    		<?php
			echo $this->session->flashdata('alert');
			?>
    		<div class="box box-info">
    			<div class="box-header with-border">
    				<h3 class="box-title">Tambah Promo</h3>
    			</div>
    			<div class="box-body">
    				<?php echo form_open_multipart('crud/insert_promo', array('class' => 'needs-validation', 'novalidate' => '')); ?>
    				<div class="form-group ">
    					<label>Kode promo</label>
    					<input class="form-control " name="code" placeholder="Kode promo" type="text" required>
    				</div>
    				<div class="form-group ">
    					<label>Headline promo</label>
    					<input class="form-control" name="name" placeholder="Headline promo" type="text">

    				</div>
    				<div class="form-group ">
    					<label>Deskripsi promo</label>
    					<input class="form-control" name="description" placeholder="Deskripsi promo" type="text">
    				</div>
    				<div class="form-group">
    					<label for="upload-gambar">Upload Foto</label>
    					<input id="upload-gambar" name="image" type="file" required>
    					<p class="help-block">Upload gambar/foto promo yang akan ditambahkan.</p>

    				</div>
    				<button type="submit" class="btn btn-primary">Submit</button>
    				</form>
    			</div>
    			<!-- /.box-body -->
    		</div>
    	</section>
    </div>
