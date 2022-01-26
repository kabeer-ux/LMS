  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('student/Home/index'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/media/logo/icon2.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Student Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/media/student/'.$show[0]->pic); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('student/Home/index'); ?>" class="d-block"> <?php echo $show[0]->first_name.$show[0]->last_name ?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo base_url('student/Home/index'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('student/Profile/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('student/Announcement/index'); ?>" class="nav-link">
              <i class="nav-icon fa fa-bullhorn" aria-hidden="true"></i>
              <p>
                Announcement
              </p>
            </a>
          </li>
<!-- 
          <li class="nav-item">
            <a href="<?php echo base_url('student/Classes/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Class
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('student/Tdlist/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-work"></i>
              <p>
                To Do List
              </p>
            </a>
          </li> -->

         

          
            
        

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>