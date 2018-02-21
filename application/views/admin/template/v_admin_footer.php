
  <!-- Main Footer -->
  <footer class="main-footer">
	<!-- To the right -->
	<div class="pull-right hidden-xs">
	  Admin page
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2018 <a href="<?php echo base_url();?>">Es Duren Kombinasi</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>bakul/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>bakul/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>bakul/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>bakul/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>bakul/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>bakul/vendor/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url() ?>bakul/vendor/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>bakul/admin/js/adminlte.min.js"></script>
<!-- Pace.js -->
<script src="<?php echo base_url() ?>bakul/vendor/pace/pace.min.js"></script>

<script src="<?php echo base_url() ?>bakul/admin/js/demo.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url() ?>bakul/vendor/iCheck/icheck.min.js"></script>

<script src="<?php echo base_url() ?>bakul/js/custom.js"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADTzcHTc1GK8Aiy1nkfhToPKJ5IK9HrFc&callback=initMap">
</script>
<?php 
  if (is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {?>
<script type="text/javascript" src="<?php echo base_url() ?>bakul/<?php echo $js_file;?>"></script>
<?php  }
  } ?>

<script>
	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
	checkboxClass: 'icheckbox_flat-grey social-checkbox',
	radioClass   : 'iradio_flat-blue'
})

$('input[type="checkbox"].line, input[type="radio"].line').iCheck({
	checkboxClass: 'icheckbox_line social-checkbox',
	radioClass   : 'iradio_line'
})
</script>
</body>
</html>
