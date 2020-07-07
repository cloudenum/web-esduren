<script src="<?php echo base_url(); ?>bakul/js/validator.min.js"></script>
<!--owl carousel -->
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
<!-- Inview js -->
<script src="https://cdn.jsdelivr.net/npm/jquery-inview@1.1.2/jquery.inview.min.js"> </script>
<!-- Datepicker js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Gijgo -->
<script src="https://cdn.jsdelivr.net/npm/gijgo-combined@1.4.0/combined/js/gijgo.min.js"></script>
<!-- Timepicker js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-timepicker@0.5.2/js/bootstrap-timepicker.min.js"> </script>
<!-- Custom js -->
<script src="<?php echo base_url(); ?>bakul/js/helper.js"> </script>
<script src="<?php echo base_url(); ?>bakul/js/main.js"> </script>

<script src="<?php echo base_url(); ?>bakul/js/custom.js"></script>

<script src="<?php echo base_url(); ?>bakul/js/map.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/examples/js/examples.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/jquery.barrating.min.js"> </script>
<?php
if (isset($map_js) && $map_js) {
?>
	<script async defer type="text/javascript" src="<?php echo $map_js; ?>"></script>
	<?php
}

if (isset($js_to_load) && is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {
		if (!preg_match('/https?:\/\//', $js_file)) { ?>
			<script type="text/javascript" src="<?php echo base_url() ?>bakul/js/<?php echo $js_file; ?>"></script>
		<?php
		} else { ?>
			<script type="text/javascript" src="<?php echo $js_file; ?>"></script>
<?php
		}
	}
} ?>

</body>

</html>
