
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

<!-- Google Analytics 
<script>
	(function(w,d,s,g,js,fjs){
	g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
	js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
	js.src='https://apis.google.com/js/platform.js';
	fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
	}(window,document,'script'));
</script>
<script>
gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '59054972301-ra57f9dg5ckj1b772n8jsruglgk0pp95.apps.googleusercontent.com';

  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
  });

  // Step 4: Create the view selector.

  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector'
  });

  // Step 5: Create the timeline chart.

  var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'timeline'
    }
  });

  // Step 6: Hook up the components to work together.

  gapi.analytics.auth.on('success', function(response) {
    viewSelector.execute();
  });

  viewSelector.on('change', function(ids) {
    var newIds = {
      query: {
        ids: ids
      }
    }
    timeline.set(newIds).execute();
  });
});
</script> -->

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
<?php 
  if (is_array($js_to_load)) {
	foreach ($js_to_load as $js_file) {?>
<script type="text/javascript" src="<?php echo base_url() ?>bakul/<?php echo $js_file;?>"></script>
<?php  }
  } ?>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmLZvDyf6pl_7l_na5a13giNp7hSs7M2w&callback=initMap">
</script>

<script>
// function start() {
  // 2. Initialize the JavaScript client library.
  //gapi.client.init({
//     'apiKey': 'AIzaSyDmLZvDyf6pl_7l_na5a13giNp7hSs7M2w',
//     // Your API key will be automatically added to the Discovery Document URLs.
//     'discoveryDocs': ['https://people.googleapis.com/$discovery/rest'],
//     // clientId and scope are optional if auth is not required.
//     'clientId': '59054972301-ra57f9dg5ckj1b772n8jsruglgk0pp95.apps.googleusercontent.com',
//     'scope': 'profile',
//   }).then(function() {
//     // 3. Initialize and make the API request.
//     return gapi.client.people.people.get({
//       'resourceName': 'people/me',
//       'requestMask.includeField': 'person.names'
//     });
//   }).then(function(response) {
//     console.log(response.result);
//   }, function(reason) {
//     console.log('Error: ' + reason.result.error.message);
//   });
// };
// // 1. Load the JavaScript client library.
// gapi.load('client', start);
</script>

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
