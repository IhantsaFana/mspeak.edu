<?php require APPROOT . '/views/inc/header_crs.php'; ?>
<?php flash('course_message'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/courses">Courses</a></li>
                <li class="breadcrumb-item active">Enroll Course</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <h4 class="mt-4">Join Course</h4>
    <div class="row mt-3">
        <?php foreach ($data['lesson'] as $lesson) : ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <img
                            src="<?php echo URLROOT; ?>/<?php echo !empty($lesson->image_url) ? htmlspecialchars($lesson->image_url) : 'default-image.jpg'; ?>"
                            alt="Lesson Image"
                            class="img-fluid">
                        <h5 class="card-title mt-3 fs-3"><?php echo htmlspecialchars($lesson->title) . "<span class=\"fw-bolder fs-3 text-success\"> (". $lesson->type . ")</span>" ; ?></h5>
                        <p class="card-text" style="text-align: justify;"><?php echo htmlspecialchars(substr($lesson->content, 0, 100)) . '...'; ?></p>
                        <?php if (!empty($lesson->file_url)) : ?>
                            <a class="btn btn-primary" href="<?php echo URLROOT . '/' . $lesson->file_url; ?>" target="_blank">Access this course</a>
                        <?php else : ?>
                            No file
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



</main><!-- End #main -->

<?php require APPROOT . '/views/inc/footer_admin.php'; ?>