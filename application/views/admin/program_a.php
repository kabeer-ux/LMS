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
            <h1 class="m-0"> Program </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php //echo '<pre>'; var_dump($show_depart); echo '</pre>';?>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
    
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-program"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-md-3">
            <div class="card p-2">

              <?php foreach ($show_dep as $depv) {?>
                <div class="side-list">
                  <a href="<?php echo base_url('admin/Program/index/'.$depv->department_id.'/'.$depv->name); ?>"> <?php echo $depv->name ?> </a>
                </div>
              <?php } ?>

            </div>
          </div>
          <div class="col-md-9">

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
                    <th> Name </th>
                    <th> Department </th>
                    <th> System </th>
                    <th> Description </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                  </thead>
              
                  <tbody>
                    <?php $show_sr = 1; foreach ($show as $showv){ ?>
                    <tr>
                      <td> <?php echo $show_sr; ?> </td> 
                      <td> <?php echo '<b>[</b>'.$showv->sname.'<b>]</b> '.$showv->name; ?>  </td>
                      <td> 
                        <?php
                            foreach ($show_dep as $depv){ 
                            if ($showv->department_id == $depv->department_id){ echo $depv->name; }
                        }?> 
                      </td>
                      <td> 
                        <?php 
                            foreach ($show_sys as $sysv){
                            if ($showv->system_id == $sysv->system_id){ echo $sysv->name; } 
                        }?>
                      </td> 
                      <td> <?php echo $showv->description; ?></td>
                      <td> 
                        <?php if($showv->active == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php } ?>
                      </td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Program/program_edit/'.$showv->program_id); ?>">
                         <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/Program/program_delete/'.$showv->program_id); ?>">
                         <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $show_sr++; } ?>
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



      <div class="modal fade" id="add-program">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Program</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('admin/Program/add_program_do'); ?>
                <table class="table table-bordered-0">
                  <tr>
                    <th> Department <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td>
                      <select class="form-control" name="depid">
                        <option value="0"> -- Select Department -- </option>
                        <?php foreach($show_dep as $depv2) { ?>
                          <option value="<?php echo $depv2->department_id ?>"> <?php echo $depv2->name ?> </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th> System <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td>
                      <select class="form-control" name="sysid">
                        <option value="0"> -- Select System -- </option>
                        <?php foreach($show_sys as $sysv) { ?>
                          <option value="<?php echo $sysv->system_id ?>"> <?php echo $sysv->name ?> </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th> Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"> </td>
                  </tr>
                  <tr>
                    <th> Short Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="sname" value="<?php echo set_value('sname'); ?>"> </td>
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