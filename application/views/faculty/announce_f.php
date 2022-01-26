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
            <h1 class="m-0"> Announcements </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <div class="row">
          <div class="col-md-12">
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th> Sr </th>
                      <th> Audience </th>
                      <th> Message </th>
                      <th> Media </th>
                      <th> Date </th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $announce_sr = 1;
                    foreach($announce as $announce_v) {
                    ?>
                    <tr>
                      <td> <?php echo $announce_sr; ?> </td>
                      <td> <?php echo $announce_v->audience; ?> </td>
                      <td> <?php echo $announce_v->message; ?> </td>
                      <td> <?php echo $announce_v->media; ?> </td>
                      <td>
                        <?php
                        $addon01 = explode(" ", $announce_v->addon);
                        echo $addon01[0];
                        ?>
                      </td>
                    <?php $announce_sr++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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