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
            <h1 class="m-0">  Course </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
    
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Course/course_add'); ?>"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h3> All Courses </h3>
                </div>
              </div>

              <div class="card-body">
                <table id="datatable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th> Sr </th>
                      <th> Name </th>
                      <th> Code </th>
                      <th> Outline </th>
                      <th> Status </th>
                      <th> Addon </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <?php $course_sr = 1; foreach ($course as $coursev) { ?>
                    <tr>
                      <td> <?php echo $course_sr; ?> </td>
                      <td> <?php echo $coursev->name; ?> </td>
                      <td> <?php echo $coursev->code; ?> </td>
                      <td> <a href="<?php echo base_url('assets/outline/'.$coursev->outline); ?>" download class="btn btn-info btn-sm"> Download </a> </td>
                      <td> 
                        <?php if($coursev->active == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php } ?>
                      </td>
                      <td> <?php $course_addon01 = explode(" ", $coursev->addon); echo $course_addon01[0] ?> </td>
                      <td> 
                        <a href="<?php echo base_url('admin/Course/course_edit/'.$coursev->course_id); ?>" class="btn btn-sm btn-info"> <i class="fas fa-edit"></i> </a>
                        <a href="<?php echo base_url('admin/Course/course_delete/'.$coursev->course_id); ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </a>
                      </td>
                    </tr>
                  <?php $course_sr++; } ?>
                </table>
              </div>  <!-- card-body -->
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