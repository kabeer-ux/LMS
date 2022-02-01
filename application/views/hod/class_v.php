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
            <h1 class="m-0"> Class </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <?php 
          echo '<pre>';
          // var_dump($showv);
          echo '</pre>';
        ?> 
        <div class="row"> 
          <div class="col-md-12">
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('hod/Hod_class/class_add'); ?>"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-md-2">

            <?php  foreach ($show_pro as $prov) { ?>
              <div class="side-list">
                <a href="#"> <?=$prov->sname?> </a>
              </div>
            <?php } ?> 

          </div>

          <div class="col-md-10"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <?php
                  echo urldecode($prog_name);
                ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                  <tr>
                    <th> Sr </th> 
                    <th> Term </th>
                    <th> Course </th>
                    <th> Complete </th>
                    <th> Start </th>
                    <!-- <th> Active </th> -->
                    <th> Description </th>
                    <th> Action </th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php $sr=1; foreach($show as $showv) { ?>
                    <tr>
                      <td> <?php echo $sr; ?> </td> 
                      <!-- <td> <?php echo $showv->term_id; ?> </td> -->
                      <td> 
                        <?php foreach($show_term as $termv) { 
                          if ($showv->term_id == $termv->term_id) { echo $termv->term_name; }
                        } ?> 
                      </td>
                      <td> 
                        <?php foreach($show_c as $coursev) { 
                          if ($showv->course_id == $coursev->course_id) { echo $coursev->name; }
                        } ?> 
                      </td> 
                      <td> 
                        <?php if($showv->start == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php } ?>
                      </td> 
                      <td> 
                        <?php if($showv->complete == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php } ?>
                      </td>
                      <td> <?php echo $showv->class_description; ?> </td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php //echo base_url('admin/Department/dep_edit/'.$showv->department_id); ?>">
                         <i class="fas fa-edit"></i>
                        </a>
                      </td>
                    </tr>  
                    <?php $sr++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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


