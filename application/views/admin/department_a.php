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
            <h1 class="m-0"> Department </h1>
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
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-department"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-md-12">

          <div class="card">
              <div class="card-header">
                <h3 class="card-title"> List of All Department</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                  <tr>
                    <th> Sr </th>
                    <th> Icon </th>
                    <th> Name </th>
                    <th> HOD </th>
                    <th> Members </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $show_sr = 1;
                    foreach ($show as $showv) {
                    ?>
                    <tr>
                      <td> <?php echo $show_sr; ?> </td>
                      <td>  
                        <?php if ($showv->icon != '') { ?>
                          <img src="<?php echo base_url('assets/media/pics/'.$showv->icon); ?>" width="50px" />
                        <?php } else { ?>
                          <img src="<?php echo base_url('assets/media/static/dep_icon.png'); ?>" width="50px" />
                        <?php } ?>
                      </td>
                      <td> <?php echo '<b>[</b>'.$showv->sname.'<b>]</b> '.$showv->name; ?>  </td>
                      <td>
                        <?php
                          foreach ($show_hod as $hodv){
                          foreach ($show_fac as $facv){ 
                          if ($hodv->faculty_id == $facv->faculty_id && $facv->department_id == $showv->department_id){ echo $facv->name; }
                        }}?>   
                      </td>
                      <td> # </td>
                      <td> 
                        <?php if($showv->active == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php } ?>
                      </td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Department/dep_edit/'.$showv->department_id); ?>">
                         <i class="fas fa-edit"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                    $show_sr++;
                    }
                    ?>
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



      <div class="modal fade" id="add-department">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('admin/Department/dep_add'); ?>
              <!-- <form method="post" action="<?php echo base_url('admin/Department/dep_add'); ?>" enctype="multipart/form-data"> -->
                <table class="table table-bordered-0">
                  <tr>
                    <th> Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"> </td>
                  </tr>
                  <tr>
                    <th> Short Name / Code <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="sname" value="<?php echo set_value('sname'); ?>"> </td>
                  </tr>
                  <tr>
                    <th> Icon (in square)</th>
                    <td> <input type="file" class="form-control" name="icon"> </td>
                  </tr>
                  <tr>
                    <th> Description </th>
                    <td> <textarea id="editor" rows="5" name="desc"><?php echo set_value('desc'); ?></textarea> </td>
                  </tr>
                  <tr>
                    <td colspan="2"> <input type="submit" class="btn btn-success" name=""> </td>
                  </tr>

                </table>
              <?php echo form_close(); ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




<?php
include_once 'inc_footer.php';
?>