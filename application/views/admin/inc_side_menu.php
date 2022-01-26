  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php base_url('admin/Home/index'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/media/logo/icon2.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LMS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/media/logo/icon2.png'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">SCPT</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Home/index'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Department/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Departments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Program/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Program
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Faculty/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Faculty
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Student/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Announcement/index'); ?>" class="nav-link">
              <i class="nav-icon fa fa-bullhorn" aria-hidden="true"></i>
              <p>
                Announcement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Hod/index'); ?>" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap" aria-hidden="true"></i>
              <p>
                HOD
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Course/index'); ?>" class="nav-link">
              <i class="nav-icon fa fa-book" aria-hidden="true"></i>
              <p>
                Course
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/Tdlist/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-pencil-alt" aria-hidden="true"></i>
              <p>
                To Do List
              </p>
            </a>
          </li>

          
            
        

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>