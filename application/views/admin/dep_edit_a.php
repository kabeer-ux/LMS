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
            <h1 class="m-0"> Department Edit </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <?php foreach($show as $showv) { ?>
          <?php echo form_open_multipart('admin/Department/update_department_do/'.$showv->department_id); ?>
            <table class="table table-bordered-0">
              <tr>
                <th> Name </th>
                <td> <input type="text" class="form-control" name="name" value="<?php echo $showv->name; set_value('name'); ?>"> </td>
              </tr>
              <tr>
                <th> Short Name </th>
                <td> <input type="text" class="form-control" name="sname" value="<?php echo $showv->sname; set_value('sname'); ?>"> </td>
              </tr>
              <tr>
                <th> Image </th>
                <td> 
                  <input type="file" class="form-control" name="icon" value="<?php echo $showv->icon?>"> <br> 
                  <img src="<?php echo base_url('assets/media/pics/'.$showv->icon); ?>" width="50px" /> 
                  <input type="hidden" name="old_icon" value="<?php echo $showv->icon?>"> 
                </td>
              </tr>
              <tr>
                <th> Description </th>
                <td> <textarea id="editor" rows="5" name="desc"><?php echo $showv->description; set_value('desc'); ?></textarea> </td>
              </tr>
              <tr>
                <td colspan="2"> <input type="submit" class="btn btn-success" name=""> </td>
              </tr>
            </table>
          <?php echo form_close(); ?> 
          <?php }?>
        </div>
      </div>
    </section>
  </div>



<?php
include_once 'inc_footer.php';
?>