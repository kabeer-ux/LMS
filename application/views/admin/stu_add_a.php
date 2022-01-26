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
            <h1 class="m-0"> Add Student </h1>
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
                  Add Student
                </div>
              </div>
              <div class="card-body">
                <?php echo form_open_multipart('admin/Student/stu_add_do'); ?>
                 <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="name"> First Name  </label>
                      <input type="text" class="form-control" name="first_name" id="name" value="<?php set_value('name'); ?>" />
                    </div> 

                    <div class="form-group">
                      <label for="name"> Father Name  </label>
                      <input type="text" class="form-control" name="father_name" id="name" value="<?php set_value('name'); ?>" />
                    </div>

                    <div class="form-group">
                      <label for="email"> Email </label> (for the first time email is the password of student)
                      <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="address"> Address </label>
                      <input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="image"> Image </label>
                      <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                  </div>
                  <div class="col-md-6"> 
                    <div class="form-group">
                      <label for="name"> Last Name  </label>
                      <input type="text" class="form-control" name="last_name" id="name" value="<?php set_value('name'); ?>" />
                    </div>

                    <div class="form-group">
                      <label> Program </label>
                      <select class="form-control" name="program_id" style="width: 100%; height: 38px;" >
                        <option value="0" selected="selected"> --Select Program-- </option>
                        <?php foreach ($prog as $progv) { ?>
                          <option value="<?php echo $progv->program_id ?>"><?php echo $progv->sname; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label> City </label>
                      <select class="form-control" name="city_id" style="width: 100%; height: 38px;" >
                        <option value="0" selected="selected"> --Select City-- </option>
                        <?php foreach ($city as $cityv) { ?>
                          <option value="<?php echo $cityv->city_id ?>"><?php echo $cityv->city_name; ?></option>
                        <?php } ?>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label for="phone"> Phone </label>
                      <input type="number" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control">
                    </div> 

                    <div class="form-group">
                      <label for="whatsapp"> WhatsApp </label>
                      <input type="number" name="whatsapp" id="whatsapp" value="<?php echo set_value('whatsapp'); ?>" class="form-control">
                    </div>
                  </div>
                  </div>  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">

                      <input type="submit" value="Submit" class="btn btn-block btn-primary">
                    </div>
                  </div>  <!-- row -->

                </form>
                </div>

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