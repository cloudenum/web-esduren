<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Pace -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/vendor/pace/pace.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/vendor/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/admin/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/admin/css/custom.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style="background-image: url('<?php echo base_url() ?>bakul/admin/img/beach1.jpg'); ">
	<div class="bg-cover">
		<div class="col-xs-12 col-pusher"></div>
		<div class="login-box">
			<div class="login-logo">
				<a href="<?php echo base_url() ?>admin"><b>ES DUREN KOMBINASI</b></a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<?php echo $this->session->alert ?>
				<form id="form-login" action="<?php echo base_url() ?>admin/aksiLogin" method="post">
					<!-- <form id="form-login" method="post"> -->
					<div class="form-group has-feedback">
						<input name="username" type="text" class="form-control" placeholder="Username" required>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input name="password" type="password" class="form-control" placeholder="Password" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
				</form>
				<div class="row">
					<div class="col-xs-4">
						<a href="<?php echo base_url('admin/register') ?>"><button class="btn btn-secondary btn-block btn-flat">Register</button></a>
					</div>
					<!-- /.col -->
					<div class="col-xs-offset-4 col-xs-4">
						<button onclick="$('#form-login').submit()" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
					<!-- /.col -->
				</div>

			</div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
	</div>
	<!-- jQuery 3 -->
	<script src="<?php echo base_url() ?>bakul/vendor/jquery/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url() ?>bakul/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url() ?>bakul/vendor/iCheck/icheck.min.js"></script>
</body>

</html>
