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
            <h1 class="m-0"> Add Faculty </h1>
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
                  Add Faculty Member
                </div>
              </div>
              <div class="card-body">
                <?php echo form_open_multipart('admin/Faculty/fac_add_do'); ?>
                 <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="name"> Name  </label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php set_value('name'); ?>" />
                    </div>

                    <div class="form-group">
                      <label> Department </label>
                      <select class="form-control" name="did" style="width: 100%; height: 100%;" >
                        <option value="0" selected="selected"> --Select Department-- </option>
                        <?php foreach ($dep as $dep_v) { ?>
                          <option value="<?php echo $dep_v->department_id; ?>"><?php echo $dep_v->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="cnic"> CNIC </label>
                      <input type="text" class="form-control" name="cnic" value="<?php echo set_value('cnic'); ?>"  id="cnic" d data-inputmask='"mask": "99999-9999999-9"' data-mask />
                    </div>

                    <div class="form-group">
                      <label for="dob"> Date Of Birth </label>
                      <input type="date" class="form-control" name="dob" value="<?php echo set_value('dob'); ?>"  id="dob" />
                    </div>

                    <div class="form-group">
                      <label> Gender </label>
                      <br/>
                      <input type="radio" name="gender" value="<?php echo set_value('gender'); ?>" value="male" id="male" />
                      <label for="male"> Male </label>
                      <input type="radio" name="gender" value="<?php echo set_value('gender'); ?>" value="female" id="female" />
                      <label for="female"> Female </label>
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="address"> Address </label>
                      <input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="pic"> Picture </label>
                      <input type="file" name="pic" id="pic" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="phone"> Phone </label>
                      <input type="number" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="email"> Email </label> (for the first time email is the password of teacher)
                      <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="status"> Status in Organization </label>
                      <br/>
                      <input type="radio" name="status" value="Permanent" value="<?php echo set_value('status'); ?>" id="Permanent" />
                      <label for="Permanent"> Permanent </label>
                      <input type="radio" name="status" value="visiting" value="<?php echo set_value('status'); ?>" id="visiting" />
                      <label for="visiting"> Visiting </label>
                    </div>

                  </div>
                  </div>  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <label> Notes: (You can write any notes about the teacher)</label>
                      <textarea class="form-control" id="editor" name="notes" rows="5"><?php echo set_value('notes'); ?></textarea>
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