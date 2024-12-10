<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<?php flash('course_message'); ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Lesson</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin">Home</a></li>
        <li class="breadcrumb-item active">Add Lesson</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card card-body bg-light mt-5">
    <h2>Ajouter un Lesson</h2>
    <form action="<?php echo URLROOT; ?>/lessons/edit/<?php echo $data['lesson_id']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Course ID<sup>*</sup></label>
        <input type="text" name="course_id" class="form-control form-control-lg <?php echo (!empty($data['course_id_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['course_id']; ?>" placeholder="Course ID">
        <span class="invalid-feedback"><?php echo $data['course_id_err']; ?></span>

        <label>title :<sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Title">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>

        <label>content :<sup>*</sup></label>
        <input type="text" name="content" class="form-control form-control-lg <?php echo (!empty($data['content_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['content']; ?>" placeholder="content">
        <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>

        <label>Type :<sup>*</sup></label>
        <input type="text" name="type" class="form-control form-control-lg" value="<?php echo $data['type']; ?>" placeholder="Type">

        <label>Image<sup>*</sup></label>
        <input type="file" name="image_url" class="form-control <?php echo (!empty($data['image_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['image_url_err']; ?></span>

        <label>file_url<sup>*</sup></label>
        <input type="file" name="file_url" class="form-control <?php echo (!empty($data['file_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['file_url_err']; ?></span>

      </div>
      <div class="button mt-5">

        <input type="submit" class="btn btn-success" value="Confirm Change">
        <a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Skip Change</a>

      </div>
    </form>
  </div>
</main><!-- End #main -->
<?php require APPROOT . '/views/inc/footer_admin.php'; ?>