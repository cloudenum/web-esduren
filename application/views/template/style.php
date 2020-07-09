<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	if (isset($gtag) && $gtag) { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gtag ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', '<?php echo $gtag ?>');
		</script>
	<?php
	} ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $profil->name ?></title>
	<link rel="icon" href="<?php echo $profil->logo_path; ?>" type="image/x-icon">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<!-- custom css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>bakul/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bakul/css/mediaquery.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bakul/css/theme-green.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>bakul/css/custom.css">
	<!-- Font icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-line-icons@2.4.0/css/simple-line-icons.css">
	<!-- Owl carousel -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.theme.default.min.css">
	<!-- Animate.css -->
	<link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1/animate.min.css" rel="stylesheet" media="all">
	<!-- Datepicker-->
	<link href="https://cdn.jsdelivr.net/npm/gijgo-combined@1.4.0/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- Timepicker-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-timepicker@0.5.2/css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/dist/themes/fontawesome-stars.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/examples/css/examples.css">
	<?php
	if (isset($css_to_load) && is_array($css_to_load)) {
		foreach ($css_to_load as $css_file) {
			if (!preg_match('/https?:\/\//', $css_file)) { ?>?>
	<link rel="stylesheet" href="<?php echo base_url() ?>bakul/<?php echo $css_file; ?>">
<?php
			} else { ?>
	<link rel="stylesheet" href="<?php echo $css_file; ?>">
<?php
			}
		}
	} ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script async defer src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script async defer src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
