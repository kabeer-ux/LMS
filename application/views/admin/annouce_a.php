<?php
include_once "inc_header.php";
include_once "inc_side_menu.php";
?>
<style type="text/css">
  .img{
    height: 50px;
    width: 50px;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Announcement </h1>
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

        <div class="row py-2" >
          <div class="col-md-2"> 
            <div class="side-list">
              <a href="<?php echo base_url('admin/Announcement/index/all');?>"> General </a>
            </div>
            <div class="side-list">
              <a href="<?php echo base_url('admin/Announcement/index/faculty');?>"> Faculty </a>
            </div>
            <div class="side-list">
              <a href="<?php echo base_url('admin/Announcement/index/student');?>"> Students </a>
            </div> 
          </div>
          <div class="col-md-10"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <b>
                    <?php
                    echo urldecode($name);
                    //echo "Department Name";
                    ?>
                  </b>
                </h3>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="10%"> Sr </th>
                    <th width="30%"> Message </th>
                    <th width="15%"> Image </th> 
                    <th width="10%"> Status </th> 
                    <th width="15%"> Action </th>
                  </tr>
                  </thead>

                  <?php $sr=1; foreach ($ann as $annv) { ?>
                  <tbody>
                      <tr>
                        <td> <?php echo $sr; ?> </td>
                        <td> <?php echo $annv->message; ?> </td>
                        <td> <img class="img" src="<?php echo base_url('assets/media/announcement/'.$annv->media); ?>" width="100%"> </td>
                        <td>
                          <?php
                            if($annv->status==1) {
                              echo '<i class="fa fa-check" style="color: green" aria-hidden="true"></i>';
                            } else{
                              echo '<i class="fa fa-times" style="color: red" aria-hidden="true"></i>';
                            }
                          ?> 
                        </td>
                        <td> <a href="" class="btn btn-info btn-sm"> <i class="fa fa-info" aria-hidden="true"></i> </a> </td>
                      </tr> 
                  </tbody>
                  <?php $sr++; } ?>
                </table>
              </div>

            </div> 



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
              <h4 class="modal-title">Add Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('admin/Announcement/announce_add_do'); ?>
                <table class="table table-bordered-0">
                  <tr>
                    <th> Audience <i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td>
                      <select class="form-control" name="audience">
                        <option value="all"> All </option>
                        <option value="faculty"> Faculty </option>
                        <option value="student"> Student </option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th> Media</th>
                    <td> <input type="file" class="form-control" name="media"> </td>
                  </tr>
                  <tr>
                    <th> Message<i class="fa fa-asterisk" style="color: red; font-size: 5px;" aria-hidden="true"></i> </th>
                    <td> <textarea id="editor" required rows="5" name="desc"><?php echo set_value('desc'); ?></textarea> </td>
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