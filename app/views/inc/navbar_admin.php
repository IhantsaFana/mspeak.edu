  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo URLROOT; ?>" class="logo d-flex align-items-center">
        <img src="<?php echo URLROOT; ?>/assets/img/favicon.png" alt="">
        <span class="d-none d-lg-block"><?php echo MSPEAK; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo URLROOT; ?>/assets/img/oeka.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Ihantsa</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Ihantsa</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URLROOT; ?>/auth/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URLROOT; ?>/auth/profile">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URLROOT; ?>">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URLROOT; ?>/auth/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'dashboard') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/admin">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Courses Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#courses-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i>
          <span>Courses</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="courses-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo URLROOT; ?>/admin/edit_course">
              <i class="bi bi-pencil-square"></i>
              <span>Course Admin</span>
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/admin/add_course">
              <i class="bi bi-plus-circle"></i>
              <span>Add Course</span>
            </a>
          </li>
        </ul>
      </li><!-- End Courses Nav -->

      <!-- Lessons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#lessons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark"></i>
          <span>Lessons</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="lessons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo URLROOT; ?>/lessons/update">
              <i class="bi bi-pencil-square"></i>
              <span>Lessons Admin</span>
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/lessons/add">
              <i class="bi bi-plus-circle"></i>
              <span>Add Lesson</span>
            </a>
          </li>
        </ul>
      </li><!-- End Lessons Nav -->

    </ul>

    <!-- Profile and Logout (Fixed at the bottom) -->
    <div class="sidebar-bottom">
      <ul class="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo URLROOT; ?>/auth/profile">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo URLROOT; ?>/auth/logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li><!-- End Logout Nav -->
      </ul>
    </div>
  </aside><!-- End Sidebar-->