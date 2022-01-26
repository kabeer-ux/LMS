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
            <h1 class="m-0"> HOD </h1>
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
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-hod"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row py-2">
          <div class="col-md-2">
            <div class="card p-2">

              <?php foreach ($show_dep as $depv) {?>
                <div class="side-list">
                  <a href="<?php echo base_url('admin/Hod/index/'.$depv->department_id.'/'.$depv->sname); ?>"> <?php echo $depv->sname ?> </a>
                </div>
              <?php } ?>

            </div>
          </div>
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <b>
                    <?php
                    echo urldecode($dep_sname);
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
                    <th width="6%"> Sr </th>
                    <th width="25%"> Name </th> 
                    <th width="25%"> Message </th>
                    <th width="12%"> Start Date </th>
                    <th width="12%"> End Date </th> 
                    <th width="20%"> Action </th>
                  </tr>
                  </thead>

                  <tbody> 
                    <?php $sr=1; foreach ($show_hod as $hodv) { ?>
                      <tr>
                        <td> <?php echo $sr; ?> </td>
                        <td>
                          <?php
                            foreach ($show_fac as $facv){ 
                            if ($hodv->faculty_id == $facv->faculty_id){ echo $facv->name; }
                          }?>  
                        </td> 
                        <td> <?php echo $hodv->message; ?> </td>
                        <td> <?php $start_date = explode(" ", $hodv->start); echo $start_date[0] ?> </td>
                        <td> <?php $end_date = explode(" ", $hodv->end_date); echo $end_date[0] ?> </td>
                        <td>
                        <?php if ($hodv->end_date == '0000-00-00 00:00:00.000000'){ ?>  
                          <a href="" class="btn btn-info btn-sm"> <i class="fa fa-info" aria-hidden="true">&nbsp&nbsp</i>Dismiss HOD</a>
                        <?php }else{} ?>
                          <a href="" class="btn btn-primary btn-sm"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                          <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                        </td>
                      </tr>
                    <?php $sr++; } ?>
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

 
      <div class="modal fade" id="add-hod">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add HOD</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('admin/hod/hod_add'); ?>
                <table class="table table-bordered-0">
                  <tr>
                    <th> Faculty <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td>
                      <select class="form-control" name="facid">
                        <option value="0"> -- Select Faculty -- </option>
                        <?php foreach($show_fac as $facv) { ?>
                          <option value="<?php echo $facv->faculty_id?>"> <?php echo $facv->name; ?> 
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th> Start Date <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="date" class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>"> 
                    </td>
                  </tr> 
                  <tr>
                    <th> Message </th>
                    <td> <textarea id="editor" rows="5" name="message"><?php echo set_value('message'); ?></textarea> </td>
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



      <div class="modal fade" id="add-">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add HOD</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('admin/hod/hod_add'); ?>
                <table class="table table-bordered-0">
                  <tr>
                    <th> Start Date <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="date" class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>">     <input type="number" name="depid" hidden value="<?php echo $facv->department_id ?>"> 
                    </td>
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