<?php
include_once "inc_header.php";
include_once "inc_side_menu.php";
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Faculty </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- <?php echo'<pre>'; var_dump($fac); echo'</pre>';?> -->
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
    
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Faculty/fac_add'); ?>"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row py-2" >
          <div class="col-md-2">

            <?php  foreach ($dep as $dep_v) { ?>
              <div class="side-list">
                <a href="<?php echo base_url('admin/Faculty/index/'.$dep_v->department_id.'/'.$dep_v->name); ?>"> <?=$dep_v->sname?> </a>
              </div>
            <?php } ?> 

          </div>
          <div class="col-md-10"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <b>
                    <?php
                    echo urldecode($dep_name);
                    //echo "Department Name";
                    ?>
                  </b>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="10%"> Sr </th>
                    <th width="30%"> Name </th>
                    <th width="15%"> Phone </th>
                    <th width="20%"> Email </th>
                    <th width="10%"> Status </th>
                    <th width="15%"> Action </th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php $fac_sr=1; foreach ($fac as $fac_v) { ?>
                      <tr>
                        <td> <?php echo $fac_sr; ?> </td>
                        <td> <?php echo $fac_v->fname; ?> </td>
                        <td> <?php echo $fac_v->phone; ?> </td>
                        <td> <?php echo $fac_v->email; ?> </td>
                        <td>
                          <?php
                          if($fac_v->active==1) {
                            echo '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>';
                          } else{
                            echo '<i class="fa fa-times" style="color: red" aria-hidden="true"></i>';
                          }
                          ?> 
                        </td>
                        <td> 
                          <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/faculty/fac_edit/'.$fac_v->faculty_id); ?>">
                           <i class="fas fa-edit"></i>
                          </a>
                        </td>
                      </tr>
                    <?php $fac_sr++; } ?>
                  </tbody>
                </table>
              </div>

            </div>  <!-- card --> 
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include_once 'inc_footer.php';
?>