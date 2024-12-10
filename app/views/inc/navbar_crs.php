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
          <span class="typed" data-typed-items="Master English, Speak English, With Confidence, Learn English Today">Welcome Ihantsa</span>
          <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
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
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URLROOT; ?>/admin">
                <i class="bi bi-chat"></i>
                <span>Administration M'Speak</span>
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
    <!-- Courses Section -->
    <li class="nav-item">
      <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'courses.php') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/courses">
        <i class="bi bi-journal-text"></i>
        <span>All Courses</span>
      </a>
    </li><!-- End All Courses Nav -->

    <li class="nav-item">
      <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'videos.php') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/lessons/type/Video">
        <i class="bi bi-camera-video"></i>
        <span>Video Courses</span>
      </a>
    </li><!-- End Video Courses Nav -->

    <li class="nav-item">
      <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pdfs.php') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/lessons/type/PDF">
        <i class="bi bi-file-earmark-text"></i>
        <span>PDF Courses</span>
      </a>
    </li><!-- End PDF Courses Nav -->

    <li class="nav-item">
      <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'quiz.php') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/lessons/type/Quiz">
        <i class="bi bi-controller"></i>
        <span>Quiz Game</span>
      </a>
    </li><!-- End Quiz Game Nav -->

    <!-- Administration Section -->
    <li class="nav-item mt-4">
      <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php') ? 'active' : ''; ?>" href="<?php echo URLROOT; ?>/admin">
        <i class="bi bi-tools"></i>
        <span>Administration</span>
      </a>
    </li><!-- End Administration Nav -->
  </ul>
</aside><!-- End Sidebar -->

