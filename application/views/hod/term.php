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
            <h1 class="m-0"> Term </h1>
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
          // var_dump($show_click);
          // var_dump($show);
          echo '</pre>';
        ?>
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-department"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-md-2">

            <?php  foreach ($show_pro as $prov) { ?>
              <div class="side-list">
                <a href="<?php echo base_url('hod/Term/index/'.$prov->program_id.'/'.$prov->sname); ?>"> <?=$prov->sname?> </a>
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
                    <th> HOD </th>
                    <th> Session </th>
                    <th> Term Name </th>
                    <th> Ease Name </th>
                    <th> Description </th>
                    <th> Action </th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php $sr=1; foreach($show as $showv) { ?>
                    <tr>
                      <td> <?php echo $sr; ?> </td> 
                      <td> <?php foreach($show_hod as $show_hodv) { echo $show_hodv->name; } ?> </td> 
                      <td> 
                        <?php foreach($show_ses as $sesv) { 
                          if ($sesv->session_id == $showv->session_id) { echo $sesv->session_name; }
                        } ?> 
                      </td> 
                      <td> <?php echo $showv->term_name?> </td>
                      <td> <?php echo $showv->ease_name?> </td>
                      <td> <?php echo $showv->description; ?> </td>
                      <!-- <td> 
                        <?php // if($showv->active == 1) { ?>
                          <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        <?php // } else { ?>
                          <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        <?php //} ?>
                      </td> -->
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('hod/Term/term_edit/'.$showv->term_id); ?>">
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



      <div class="modal fade" id="add-department">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Session</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('hod/Term/term_add_do'); ?>
                <table class="table table-bordered-0">
                  <tr>
                    <?php foreach($show_hod as $show_hodv) { ?>
                      <input type="hidden" name="hodid" value="<?php echo $show_hodv->hod_id; ?>">
                    <?php } ?>
                  </tr>
                  <tr>
                    <th> Session <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td>
                      <select class="form-control" name="sesid">
                        <option value="0"> -- Select Session -- </option>
                        <?php foreach($show_ses as $sesv) { ?>
                          <option value="<?php echo $sesv->session_id ?>"> <?php echo $sesv->session_name; ?> </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr> 
                  <tr>
                    <th> Term Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="term_name" value="<?php echo set_value('term_name'); ?>"> </td>
                  </tr> 
                  <tr>
                    <th> Ease Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <input type="text" class="form-control" name="ease_name" value="<?php echo set_value('ease_name'); ?>"> </td>
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