
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../public/file/<?php echo $_SESSION['admin_login']['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin_login']['name']; ?> </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
               admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../auth/all_admins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../auth/edit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>edit admin</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                majors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../majors/all_majors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all majors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../majors/add_major.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add major</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                doctors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../doctors/all_doctors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>alldoctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../doctors/add_doctor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add doctor</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                doctor appoinments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../appoinments/all_appoinments.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all appoinments</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../contacts/all_contact.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all contacts</p>
                </a>
              </li>
              
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>