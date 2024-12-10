<?php require APPROOT . '/views/inc/header_crs.php'; ?>
<?php flash('course_message'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Course</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container mt-3">
        <div class="card card-body bg-light shadow-sm mt-5">
            <div class="mb-4">
                <h2 class="text-center">Add a New Course</h2>
            </div>
            <form action="<?php echo URLROOT; ?>/admin/add_course" method="post">
                <div class="form-group">

                    <!-- Title Field -->
                    <div class="mb-4">
                        <label for="title" class="form-label">
                            <h5><strong>Title<sup>*</sup></strong></h5>
                        </label>
                        <input type="text" id="title" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="form-label">
                            <h5><strong>Description<sup>*</sup></strong></h5>
                        </label>
                        <textarea id="description" name="description" rows="4" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                    </div>

                    <!-- Level Field -->
                    <div class="mb-4">
                        <label for="level" class="form-label">
                            <h5><strong>Level<sup>*</sup></strong></h5>
                        </label>
                        <select id="level" name="level" class="form-select form-select-lg <?php echo (!empty($data['level_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Choose Level</option>
                            <option value="Beginner" <?php echo ($data['level'] == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
                            <option value="Intermediate" <?php echo ($data['level'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                            <option value="Advanced" <?php echo ($data['level'] == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['level_err']; ?></span>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            <i class="bi bi-plus-circle me-2"></i> Add Course
                        </button>

                        <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline-secondary d-inline-flex align-items-center">
                            <i class="fa fa-backward" aria-hidden="true"></i> Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main><!-- End #main -->
<?php require APPROOT . '/views/inc/footer.php'; ?>