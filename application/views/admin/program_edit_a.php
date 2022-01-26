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
            <h1 class="m-0"> Program Edit </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="card">
        <?php foreach($showw as $showv) { ?>
        <?php echo form_open_multipart('admin/Program/update_program_do/'.$showv->program_id); ?>
          <table class="table table-bordered-0">
            <tr>
              <th> Department </th>
              <td>
                <select class="form-control" name="depid">
                  <option value="0"> -- Select Department -- </option>
                  <?php foreach($show_dep as $depv2) { ?>
                    <option value="<?php echo $depv2->department_id ?>" 
                      <?php echo ($showv->department_id == $depv2->department_id)? 'selected':''?>> 
                      <?php echo $depv2->name ?> 
                    </option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th> System </th>
              <td>
                <select class="form-control" name="sysid">
                  <option value="0"> -- Select System -- </option>
                  <?php foreach($show_sys as $sysv) { ?>
                    <option value="<?php echo $sysv->system_id ?>" 
                      <?php echo ($showv->system_id == $sysv->system_id)? 'selected':''?>> 
                      <?php echo $sysv->name ?> 
                    </option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th> Name </th>
              <td> <input type="text" class="form-control" name="name" value="<?php echo $showv->name; set_value('name')?>"> </td>
            </tr>
            <tr>
              <th> Short Name </th>
              <td> <input type="text" class="form-control" name="sname" value="<?php echo $showv->sname; set_value('sname'); ?>"> </td>
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