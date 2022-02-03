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
            <h1 class="m-0"> Term Edit </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="card">
        <?php foreach($show as $showv) { ?>
        <?php echo form_open_multipart('hod/term/term_update_do/'.$showv->term_id); ?>
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
                    <option value="<?php echo $sesv->session_id ?>"
                      <?php echo ($showv->session_id == $sesv->session_id)? 'selected':''?>>
                      <?php echo $sesv->session_name; ?> 
                    </option>
                  <?php } ?>
                </select>
              </td>
            </tr> 
            <tr>
              <th> Term Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
              <td> <input type="text" class="form-control" name="term_name" value="<?php echo $showv->term_name; echo set_value('term_name'); ?>"> </td>
            </tr> 
            <tr>
              <th> Ease Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
              <td> <input type="text" class="form-control" name="ease_name" value="<?php echo $showv->ease_name; echo set_value('ease_name'); ?>"> </td>
            </tr> 
            <tr>
              <th> Description </th>
              <td> <textarea id="editor" rows="5" name="desc"><?php echo $showv->description; echo set_value('desc'); ?></textarea> </td>
            </tr>
            <tr>
              <td colspan="2"> <input type="submit" class="btn btn-success" name=""> </td>
            </tr>

          </table>
          <!-- <table class="table table-bordered-0">
            <tr>
              <?php foreach($show_hod as $show_hodv) { ?>
                <input type="hidden" name="hodid" value="<?php echo $show_hodv->hod_id; ?>">
              <?php }?>
            </tr>
            <tr>
              <th> Program <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
              <td>
                <select class="form-control" name="proid">
                  <option value="0"> -- Select Program -- </option>
                  <?php foreach($show_pro as $prov2) { ?>
                    <option value="<?php echo $prov2->program_id ?>"
                      <?php echo ($showv->program_id == $prov2->program_id)? 'selected':''?>>
                      <?php echo $prov2->sname; ?> 
                    </option>
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
                    <option value="<?php echo $sysv->system_id ?>"
                      <?php echo ($showv->system_id == $prov2->system_id)? 'selected':''?>>
                      <?php echo $sysv->name ?> 
                    </option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th> Session Name <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
              <td> <input type="text" class="form-control" name="name" placeholder="xxxx - xxxx" value="<?php echo $showv->session_name; echo set_value('name'); ?>"> </td>
            </tr> 
            <tr>
              <th> Description </th>
              <td> <textarea id="editor" rows="5" name="desc"><?php echo $showv->description; echo set_value('desc'); ?></textarea> </td>
            </tr>
            <tr>
              <td colspan="2"> <input type="submit" class="btn btn-success" name=""> </td>
            </tr>
          </table> -->
        <?php echo form_close(); ?> 
        <?php }?>
      </div>
    </div>
  </section>
</div>



<?php
include_once 'inc_footer.php';
?>