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
            <h1 class="m-0">Profile</h1>
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
       	<div class="col-md-8">
       		<table class="table table-bordered">
       			<tr>
       				<th> Name </th>
       				<td> <?php echo $show[0]->name; ?> </td>
       			</tr>
       			<tr>
       				<th> department </th>
       				<td> <?php echo $dep[0]->depname; ?> </td>
       			</tr>
       			<tr>
       				<th> CNIC </th>
       				<td> <?php echo $show[0]->cnic; ?> </td>
       			</tr>
       			<tr>
       				<th> Date of Birth </th>
       				<td> <?php echo $show[0]->dob; ?> </td>
       			</tr>
       			<tr>
       				<th> Gender </th>
       				<td> <?php echo $show[0]->gender; ?> </td>
       			</tr>
       			<tr>
       				<th> Status </th>
       				<td> <?php echo $show[0]->status; ?> </td>
       			</tr>
       			<tr>
       				<th> Phone </th>
       				<td> <?php echo $show[0]->phone; ?> </td>
       			</tr>
       			<tr>
       				<th> Email </th>
       				<td> <?php echo $show[0]->email; ?> </td>
       			</tr>
       			<tr>
       				<th> Join Since </th>
       				<td>
       					<?php
       					$addon01 = explode(" ", $show[0]->addon);
       					echo $addon01[0];
       					?>
       				</td>
       			</tr>


       		</table>
       	</div>
       	<div class="col-md-4">
       		<div class="p-5">
       			<img src="<?php echo base_url('assets/media/faculty/'.$show[0]->pic); ?>" width="100%">
       		</div>
       	</div>
       </div>  <!-- row-->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include_once 'inc_footer.php';
?>