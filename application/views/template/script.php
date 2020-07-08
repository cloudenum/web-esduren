<!-- polyfill -->
<script defer crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=es2015%2Ces6%2Cdefault"></script>
<!-- jQuery -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"> </script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js"></script>
<!-- jQuery UI -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery-ui@1.12.0-rc.2/ui/widget.min.js"></script>
<!-- bootstrap -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"> </script>
<!-- stellar -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery.stellar@0.6.2/jquery.stellar.js"></script>
<!-- scrollorama js -->
<script defer src="<?php echo base_url(); ?>bakul/js/jquery.scrollorama.js"></script>
<!-- validator -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.8.1/validator.min.js"></script>
<!--owl carousel -->
<script defer src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
<!-- Inview js -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery-inview@1.1.2/jquery.inview.min.js"> </script>
<!-- Datepicker js -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Gijgo -->
<script defer src="https://cdn.jsdelivr.net/npm/gijgo-combined@1.4.0/combined/js/gijgo.min.js"></script>
<!-- Timepicker js -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-timepicker@0.5.2/js/bootstrap-timepicker.min.js"> </script>
<!-- Bar-Rating -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/jquery.barrating.min.js"> </script>
<script defer src="https://cdn.jsdelivr.net/npm/jquery-bar-rating@1.2.2/examples/js/examples.js"> </script>
<!-- Custom js -->
<script defer src="<?php echo base_url(); ?>bakul/js/helper.js"> </script>
<script defer src="<?php echo base_url(); ?>bakul/js/main.js"> </script>
<script defer src="<?php echo base_url(); ?>bakul/js/custom.js"></script>
<script defer src="<?php echo base_url(); ?>bakul/js/map.js"></script>

<?php
if (isset($map_js) && $map_js) {
?>
	<!-- Google Maps -->
	<script async defer type="text/javascript" src="<?php echo $map_js; ?>"></script>
	<?php
}

if (isset($js_to_load) && is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {
		if (!preg_match('/https?:\/\//', $js_file)) { ?>
			<script defer type="text/javascript" src="<?php echo base_url() ?>bakul/js/<?php echo $js_file; ?>"></script>
		<?php
		} else { ?>
			<script defer type="text/javascript" src="<?php echo $js_file; ?>"></script>
<?php
		}
	}
} ?>

</body>

</html>
