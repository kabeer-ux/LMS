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
            <h1 class="m-0"> Add Class </h1>
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
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  Add Class
                </div>
              </div>
              <div class="card-body">
                <?php echo form_open_multipart('Hod/Hod_class/class_add_do'); ?>
                  <table class="table table-bordered">
                    <tr>
                      <th> Term <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i></th>
                      <td>
                        <select name="term_id" class="form-control">
                          <option value="0"> --Select Term-- </option>
                          <?php foreach ($show_term as $termv) { ?>
                            <option value="<?php echo $termv->term_id ?>"><?php echo $termv->term_name ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th> Courses <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i></th>
                      <td>
                        <select name="course_id" class="form-control">
                          <option value="0"> --Select Courses-- </option>
                          <?php foreach ($show_c as $coursev) { ?>
                            <option value="<?php echo $coursev->course_id ?>"><?php echo $coursev->name ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th> Start <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                      <td> <input type="number" class="form-control" placeholder="1 for start and 0 for has to be start" name="start" value="<?php echo set_value('start'); ?>"> </td>
                    </tr> 
                    <tr>
                      <th> Description <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i></th>
                      <td> <textarea id="editor" rows="5" name="desc"><?php echo set_value('desc'); ?></textarea> </td>
                    </tr>
                    <tr>
                      <td colspan="2"> <input type="submit" class="btn btn-success" name=""> </td>
                    </tr>

                  </table>
                <?php echo form_close(); ?>
              </div>
            </div>
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