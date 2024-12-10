<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<?php flash('lesson_message'); ?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add Lesson</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo URLROOT ;?>/admin">Home</a></li>
      <li class="breadcrumb-item active">Add Lesson</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card shadow-sm bg-light mt-4 p-4">
  <h2 class="text-center text-primary mb-4">Add a New Lesson</h2>
  <form action="<?php echo URLROOT; ?>/admin/add_lesson" method="post" enctype="multipart/form-data">
    <div class="row g-3">

      <!-- Course ID -->
      <div class="col-md-6">
        <label for="course_id" class="form-label">Select Course<sup>*</sup></label>
        <select 
          id="course_id" 
          name="course_id" 
          class="form-select <?php echo (!empty($data['course_id_err'])) ? 'is-invalid' : ''; ?>">
          <option value="">-- Select a Course --</option>
          <?php foreach ($data['courses'] as $course): ?>
            <option 
              value="<?php echo $course->id; ?>" 
              <?php echo ($data['course_id'] == $course->course_id) ? 'selected' : ''; ?>>
              <?php echo $course->title; ?> (ID: <?php echo $course->course_id; ?>)
            </option>
          <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo $data['course_id_err']; ?></div>
      </div>

      <!-- Title -->
      <div class="col-md-6">
        <label for="title" class="form-label">Lesson Title<sup>*</sup></label>
        <input 
          type="text" 
          id="title" 
          name="title" 
          class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" 
          value="<?php echo $data['title']; ?>" 
          placeholder="Enter Lesson Title">
        <div class="invalid-feedback"><?php echo $data['title_err']; ?></div>
      </div>

      <!-- Content -->
      <div class="col-12">
        <label for="content" class="form-label">Lesson Content<sup>*</sup></label>
        <textarea 
          id="content" 
          name="content" 
          class="form-control <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>" 
          rows="4" 
          placeholder="Enter lesson content here..."><?php echo $data['content']; ?></textarea>
        <div class="invalid-feedback"><?php echo $data['content_err']; ?></div>
      </div>

      <!-- Type -->
      <div class="col-md-6">
        <label for="type" class="form-label">Lesson Type<sup>*</sup></label>
        <input 
          type="text" 
          id="type" 
          name="type" 
          class="form-control" 
          value="<?php echo $data['type']; ?>" 
          placeholder="E.g., Video, PDF, etc.">
      </div>

      <!-- Image -->
      <div class="col-md-6">
        <label for="image_url" class="form-label">Upload Image<sup>*</sup></label>
        <input 
          type="file" 
          id="image_url" 
          name="image_url" 
          class="form-control <?php echo (!empty($data['image_url_err'])) ? 'is-invalid' : ''; ?>">
        <div class="invalid-feedback"><?php echo $data['image_url_err']; ?></div>
      </div>

      <!-- File -->
      <div class="col-md-6">
        <label for="file_url" class="form-label">Upload File<sup>*</sup></label>
        <input 
          type="file" 
          id="file_url" 
          name="file_url" 
          class="form-control <?php echo (!empty($data['file_url_err'])) ? 'is-invalid' : ''; ?>">
        <div class="invalid-feedback"><?php echo $data['file_url_err']; ?></div>
      </div>

    </div>

    <div class="d-flex justify-content-between mt-4">
      <button type="submit" class="btn btn-success px-4">
        <i class="bi bi-plus-circle"></i> Add Lesson
      </button>
      <a href="<?php echo URLROOT; ?>" class="btn btn-secondary px-4">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>
  </form>
</div>
</main><!-- End #main -->
<?php require APPROOT . '/views/inc/footer_admin.php'; ?>
