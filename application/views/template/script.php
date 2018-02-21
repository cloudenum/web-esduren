<!-- jQuery -->
<script src="<?php echo base_url(); ?>bakul/vendor/jquery/jquery.min.js"> </script>
<!-- bootstrap-->
<script src="<?php echo base_url(); ?>bakul/vendor/bootstrap/js/bootstrap.min.js"> </script>
<!-- stellar -->
<script src="<?php echo base_url(); ?>bakul/vendor/stellar/jquery.stellar.js"></script>
<!-- scrollorama js-->
<script src="<?php echo base_url(); ?>bakul/js/jquery.scrollorama.js"></script>
<!-- Contact form-->
<script src="<?php echo base_url(); ?>bakul/js/validator.min.js"></script> 
<!--owl carousel -->
<script src="<?php echo base_url(); ?>bakul/vendor/owlcarousel/owl.carousel.min.js"></script>
<!-- Inview js -->
<script src="<?php echo base_url(); ?>bakul/vendor/jquery.inview-master/jquery.inview.min.js"> </script>
<!-- Datepicker js -->
<script src="<?php echo base_url(); ?>bakul/vendor/gijgo-combined/gijgo.min.js"></script>
<!-- Timepicker js -->
<script src="<?php echo base_url(); ?>bakul/vendor/bootstrap-timepicker/bootstrap-timepicker.js"> </script>
<!-- Custom js -->
<script src="<?php echo base_url(); ?>bakul/js/main.js"> </script>

<script src="<?php echo base_url(); ?>bakul/js/custom.js"></script>

<script src="<?php echo base_url(); ?>bakul/js/map.js"></script>

<?php 
  if (is_array($map_js)) {
	?>
<script type="text/javascript" src="<?php echo $map_js[0];?>"></script>
<?php  
  }   
?>

<?php 
  if (is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {?>
<script type="text/javascript" src="<?php echo base_url() ?>bakul/js/<?php echo $js_file;?>"></script>
<?php  
	}
  }   
?>

</body>

</html>
