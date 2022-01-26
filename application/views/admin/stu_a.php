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
            <h1 class="m-0"> Student </h1>
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
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Student/stu_add'); ?>"> <i class="fas fa-plus"></i> Add </a>
          </div>
        </div> <!-- /.row -->

        <div class="row py-2" >
          <div class="col-md-2">
            <?php foreach ($prog as $progv) { ?>
              <div class="side-list">
                <a href="<?php echo base_url('admin/Student/index/'.$progv->program_id.'/'.$progv->name);?>"><?php echo $progv->name ?></a>
              </div> 
            <?php }?>

          </div>
          <div class="col-md-10"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <b>
                    <?php
                    echo urldecode($prog_name);
                    ?>
                  </b>
                </h3>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-sm table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="10%"> Sr </th>
                    <th width="30%"> Name </th>
                    <th width="15%"> Father Name </th>
                    <th width="20%"> Email </th> 
                    <th width="20%"> Phone </th>
                    <th width="20%"> Whatsapp </th>
                    <th width="20%"> Address </th>
                    <th width="20%"> City </th>
                    <th width="20%"> Time </th> 
                    <th width="15%"> Action </th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $show_sr = 1;
                    foreach ($show as $showv) {
                    ?>
                    <tr>
                      <td> <?php echo $show_sr; ?> </td> 
                      <td> <?php echo $showv->first_name.$showv->last_name; ?> </td>
                      <td> <?php echo $showv->father_name; ?> </td>
                      <td> <?php echo $showv->email; ?> </td> 
                      <td> <?php echo $showv->phone; ?> </td>
                      <td> <?php echo $showv->whatsapp; ?> </td>
                      <td> <?php echo $showv->address; ?> </td>
                      <td> 
                        <?php foreach ($city as $cityv) { 
                            if ($showv->city_id == $cityv->city_id)
                            { echo $cityv->city_name; } 
                        }?>
                      </td>
                      <td> <?php $showv_addon01 = explode(" ", $showv->addon); echo $showv_addon01[0] ?> </td> 
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/Student/stu_edit/'.$showv->student_id); ?>">
                         <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/Student/stu_delete/'.$showv->student_id); ?>">
                         <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php
                    $show_sr++;
                    }
                    ?>
                  </tbody>
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
<?php
include_once 'inc_footer.php';
?>