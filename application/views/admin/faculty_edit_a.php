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
            <h1 class="m-0"> Update Faculty </h1>
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
                  Update Faculty Member
                </div>
              </div>
              <div class="card-body">
                <?php foreach($show as $showv) { ?>
                <?php echo form_open_multipart('admin/Faculty/update_fac_do/'.$showv->faculty_id); ?>
                 <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="name"> Name </label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $showv->name; set_value('name'); ?>" />
                    </div>

                    <div class="form-group">
                      <label> Department </label>
                      <select class="form-control" name="did" style="width: 100%; height: 100%;" >
                        <option value="0" selected="selected"> --Select Department-- </option>
                        <?php foreach ($dep as $dep_v) { ?>
                          <option value="<?php echo $dep_v->department_id; ?>"
                            <?php echo ($showv->department_id == $dep_v->department_id)? 'selected':''?>> 
                            <?php echo $dep_v->name ?> 
                          </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="cnic"> CNIC </label>
                      <input type="text" class="form-control" name="cnic" value="<?php echo $showv->cnic; echo set_value('cnic'); ?>"  id="cnic" d data-inputmask='"mask": "99999-9999999-9"' data-mask />
                    </div>

                    <div class="form-group">
                      <label for="dob"> Date Of Birth </label>
                      <input type="date" class="form-control" name="dob" value="<?php echo $showv->dob; echo set_value('dob'); ?>"  id="dob" />
                    </div>

                    <div class="form-group">
                      <label> Gender </label>
                      <br/>
                      <input type="radio" name="gender" value="<?php echo $showv->gender; echo set_value('gender'); ?>" <?php echo ($showv->gender == 'male')? 'checked':'' ?> value="male" id="male" />
                      <label for="male"> Male </label>
                      <input type="radio" name="gender" value="<?php echo $showv->gender; echo set_value('gender'); ?>" <?php echo ($showv->gender == 'female')? 'checked':'' ?> value="female" id="female" />
                      <label for="female"> Female </label>
                    </div>


                    <div class="form-group">
                      <label for="status"> Status in Organization </label>
                      <br/>
                      <input type="radio" name="status" value="Permanent" <?php echo ($showv->status == 'Permanent')? 'checked':'' ?> value="<?php echo $showv->status; echo set_value('status'); ?>" id="Permanent" />
                      <label for="Permanent"> Permanent </label>
                      <input type="radio" name="status" value="visiting" <?php echo ($showv->status == 'visiting')? 'checked':'' ?> value="<?php echo $showv->status; echo set_value('status'); ?>" id="visiting" />
                      <label for="visiting"> Visiting </label>
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="address"> Address </label>
                      <input type="text" name="address" id="address" value="<?php echo $showv->address; echo set_value('address'); ?>" class="form-control">
                    </div> 

                    <div class="form-group">
                      <label for="phone"> Phone </label>
                      <input type="number" name="phone" id="phone" value="<?php echo $showv->phone; echo set_value('phone'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="email"> Email </label>
                      <input type="email" name="email" id="email" value="<?php echo $showv->email; echo set_value('email'); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="pic"> Picture </label>
                      <input type="file" name="pic" id="pic" value="<?php echo $showv->pic;?>" class="form-control">
                      <input type="hidden" name="old_pic" value="<?php echo $showv->pic;?>"><br> 
                      <img src="<?php echo base_url('assets/media/faculty/'.$showv->pic);?>" width="100px" /> 
                    </div>

                  </div>
                  </div>  <!-- row -->
                  <div class="row">
                    <div class="col-md-12">
                      <textarea class="form-control" id="editor" name="notes" rows="5"><?php echo $showv->notes; echo set_value('notes'); ?></textarea>
                      <input type="submit" value="Submit" class="btn btn-block btn-primary">
                    </div>
                  </div>  <!-- row -->

                  <?php echo form_close(); ?> 
                  <?php }?>
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