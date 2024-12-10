<?php require APPROOT . '/views/inc/header_crs.php'; ?>
<?php flash('course_message'); ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Courses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <h4 class="mt-4">Featured Courses</h4>
    <div class="row mt-3">
        <?php foreach ($data['courses'] as $course) : ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                      <h1 class="card-title fs-3"><?php echo $course->title; ?></h1>
                      <p class="card-text" style="text-align: justify;"><?php echo $course->description; ?></p>
                      <a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/lessons/show/<?php echo $course->course_id; ?>">Start Course</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

  </main><!-- End #main -->

<?php require APPROOT . '/views/inc/footer_admin.php'; ?>
