<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
		Admin page
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo base_url(); ?>"><?php echo $profil->name ?></a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.10.16/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs/1.10.16/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.2.3/js/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>bakul/admin/js/adminlte.min.js"></script>
<!-- Pace.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

<script src="<?php echo base_url() ?>bakul/admin/js/demo.js"></script>

<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>bakul/js/helper.js"> </script>
<script src="<?php echo base_url() ?>bakul/js/custom.js"></script>
<?php
if (isset($map_js) && $map_js) {
?>
	<script async defer type="text/javascript" src="<?php echo $map_js; ?>"></script>
	<?php
}

if (isset($js_to_load) && is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {
		if (!preg_match('/https?:\/\//', $js_file)) { ?>
			<script type="text/javascript" src="<?php echo base_url() ?>bakul/<?php echo $js_file; ?>"></script>
		<?php
		} else { ?>
			<script type="text/javascript" src="<?php echo $js_file; ?>"></script>
<?php
		}
	}
} ?>

<script>
	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
		checkboxClass: 'icheckbox_flat-grey social-checkbox',
		radioClass: 'iradio_flat-blue'
	})

	$('input[type="checkbox"].line, input[type="radio"].line').iCheck({
		checkboxClass: 'icheckbox_line social-checkbox',
		radioClass: 'iradio_line'
	})
</script>
</body>

</html>
