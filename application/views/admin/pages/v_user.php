

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome, <?php echo $_SESSION['nama'] ?>	      
          <small>Have Fun!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create User/Admin</h3>
            </div>
            <div class="box-body">
              <form>
                <div class="input-group form-group has-feedback">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control" placeholder="Username" type="text">
                </div>
                <div class="input-group form-group has-feedback">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input class="form-control" placeholder="Email" type="text">
                </div>
                <div class="input-group form-group has-feedback">
                  <span class="input-group-addon"><i class="fa fa-abc"></i></span>
                  <input class="form-control" placeholder="Email" type="text">
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">User Database</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-12">
                <table id="user-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" aria-controls="user-table"  aria-sort="ascending" aria-label="Nomor: activate to sort column descending">
                        No.
                      </th>
                      <th class="sorting" aria-controls="user-table" aria-label="Username: activate to sort column ascending">
                        Username
                      </th>
                      <th class="sorting" aria-controls="user-table" aria-label="Password: activate to sort column ascending">
                        Password
                      </th>
                      <th class="sorting" aria-controls="user-table" aria-label="Name: activate to sort column ascending">
                        Name
                      </th>
                      <th class="sorting" aria-controls="user-table" aria-label="Level: activate to sort column ascending">
                        Level
                      </th>
                      <th class="sorting" aria-controls="user-table"  style="width: 20%;">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = $this->db->get('user');

                      if ($query->num_rows() > 0)
                      {
                        foreach ($query->result() as $row)
                        {
                          
                    ?>
                    <tr role="row">
                      <td><?php echo $row->userid;?></td>
                      <td><?php echo $row->username;?></td>
                      <td><?php echo $row->password;?></td>
                      <td><?php echo $row->fullname;?></td>
                      <td><?php echo $row->level;?></td>
                      <td>
                        <a class="btn btn-danger btn-s" href="<?php echo base_url('crud/edit')?>"><span class="fa fa-pencil"/>edit</a>
                        <a class="btn btn-danger btn-s" href="<?php echo base_url('crud/hapusUser/').$row->userid ?>"><span class="fa fa-trash"/>hapus</a></td>
                    </tr>
                    <?php 
                        }
                      } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Fullname</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
