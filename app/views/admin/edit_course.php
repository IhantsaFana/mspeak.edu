<?php require APPROOT . '/views/inc/header_crs.php'; ?>
<?php flash('course_message'); ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/amdin">Home</a></li>
          <li class="breadcrumb-item active">Add Course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<div class="mt-3">

    <div class="card card-body bg-light mt-5">
        <div class="mb-3">
            <h2>Add course</h2>
        </div>
        <form action="<?php echo URLROOT; ?>/admin/edit_course/<?php echo $data['course_id']; ?>" method="post">
            <div class="form-group">

                <div class="mb-3">
                    <label>
                        <h5><strong>title<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['title']; ?>">
                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>description<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['description']; ?>">
                    <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>level<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="level" class="form-control form-control-lg <?php echo (!empty($data['level_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['level']; ?>">
                    <span class="invalid-feedback"><?php echo $data['level_err']; ?></span>
                </div>
                

                <div class="mb-3">
                    <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline-secondary me-3 d-inline-flex align-items-center"><i class="fa fa-backward" aria-hidden="true"></i> Skip Change</a>
                    <input type="submit" class="btn btn-primary d-inline-flex align-items-center" value="Confirm Change">
                </div>
            </div>
        </form>
    </div>
</div>
</main><!-- End #main -->
<?php require APPROOT . '/views/inc/footer.php'; ?>