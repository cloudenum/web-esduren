  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, <?php echo $_SESSION['nama'] ?><small>Have Fun!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(function(){
      $('#home').addClass('active');
    });
  </script>