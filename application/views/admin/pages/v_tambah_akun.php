    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Tambah Akun
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="<?php echo base_url() ?>admin/akun">Akun</a></li>
                <li class="active"><a href="<?php echo base_url() ?>admin/tambahakun">Tambah Akun</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">
			<?php 
				echo $this->session->flashdata('alert');
			?>
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Create User/Admin</h3>
				</div>
				<div class="box-body">
					<form action="<?php echo base_url();?>crud/add_account" method="POST">
						<div class="form-group ">
							<label>Username</label>    
							<input class="form-control" name="username" placeholder="Username" type="text" required>
						</div>
						<div class="form-group ">
							<label>Password</label>    
							<input class="form-control" name="password" placeholder="Password" type="password" required>
						</div>
						<div class="form-group ">
							<label>Nama</label>    
							<input class="form-control" name="nama" placeholder="Nama" type="text" required>
						</div>
                        <div class="form-group ">
							<label>E-mail</label>    
							<input class="form-control" name="email" placeholder="E-mail" type="email" required>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
        </section>
    </div>