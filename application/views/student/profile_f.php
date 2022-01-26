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
            <?php foreach($show_en as $shown){} ?>
       			<tr> 
       				<th> Name </th>
       				<td> <?php echo $show[0]->first_name. $show[0]->last_name; ?> </td>
       			</tr>
       			<tr>
       				<th> Program </th>
       				<td>
                <?php foreach ($prog as $progv) { 
                  if ($progv->program_id == $shown->program_id)
                  { echo $progv->name; }
                }?>
              </td>
       			</tr>
       			<tr>
       				<th> WhatsApp </th>
       				<td> <?php echo $show[0]->whatsapp; ?> </td>
       			</tr>
       			<tr>
       				<th> City </th>
              <td> 
                <?php foreach ($city as $cityv) { 
                  if ($cityv->city_id == $show[0]->city_id)
                  { echo $cityv->city_name; } 
                }?>
              </td>
       			</tr>
       			<tr>
       				<th> Address </th>
       				<td> <?php echo $show[0]->address; ?> </td>
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
       			<img src="<?php echo base_url('assets/media/student/'.$show[0]->pic); ?>" width="100%">
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