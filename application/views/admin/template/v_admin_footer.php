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

<!-- polyfill -->
<script defer crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=es2015%2Ces6%2Cdefault"></script>
<!-- jQuery 3 -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<!-- dataTables -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.10.16/jquery.dataTables.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs/1.10.16/dataTables.bootstrap.min.js"></script>
<!-- slimScroll -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- Fastclick -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<!-- Timepicker -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.2.3/js/bootstrap-timepicker.min.js"></script>
<!-- Pace.js -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<!-- iCheck -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/icheck.min.js"></script>
<!-- AdminLTE App -->
<script defer src="<?php echo base_url(); ?>bakul/js/helper.js"> </script>
<script defer src="<?php echo base_url() ?>bakul/admin/js/adminlte.min.js"></script>
<script defer src="<?php echo base_url() ?>bakul/admin/js/demo.js"></script>
<script defer src="<?php echo base_url() ?>bakul/js/custom.js"></script>

<?php
if (isset($js_to_load) && is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {
		if (!preg_match('/https?:\/\//', $js_file)) { ?>
			<script defer type="text/javascript" src="<?php echo base_url() ?>bakul/<?php echo $js_file; ?>"></script>
		<?php
		} else { ?>
			<script defer type="text/javascript" src="<?php echo $js_file; ?>"></script>
	<?php
		}
	}
}

if (isset($map_js) && $map_js) {
	?>
	<!-- Google Maps -->
	<script defer type="text/javascript" src="<?php echo $map_js; ?>"></script>
<?php
}
?>
</body>

</html>
