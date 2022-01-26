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
            <h1 class="m-0">  Add Course </h1>
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

            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('admin/Course/course_add_do'); ?>
              <div class="card">
                <table class="table table-bordered">
                  <tr>
                    <th> System </th>
                    <td>
                      <select name="system_id" class="form-control">
                        <option value="0"> --Select System-- </option>
                        <?php foreach ($system as $sysv) { ?>
                          <option value="<?php echo $sysv->system_id ?>"><?php echo $sysv->name ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th> Course Name </th>
                    <td> <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"> </td>
                  </tr>
                  <tr>
                    <th> Course Code </th>
                    <td> <input type="text" class="form-control" name="code" value="<?php echo set_value('code'); ?>"> </td>
                  </tr>
                  
                  <tr>
                    <th> Outline <span style="font-size:12px; font-weight: 700"><br/>(Only PDF or JPG or PNG)<br/>(less then 2Mb)</span> </th>
                    <td> <input type="file" class="form-control" name="outline"> </td>
                  </tr>
                  <tr>
                    <td colspan="2"> <input type="submit" class="btn btn-success"> </td>
                  </tr>

                </table>
              <?php echo form_close(); ?>
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