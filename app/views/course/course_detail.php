<?php require APPROOT . '/views/inc/header_crs.php'; ?>
<?php flash('course_message'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/courses">Courses</a></li>
                <li class="breadcrumb-item active">Courses Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <h1><?php echo $data['course']->title; ?></h1>
    <p><?php echo $data['course']->description; ?></p>
    <ul>
        <?php foreach ($data['course']->lessons as $lesson) : ?>
            <li>
                <h3><?php echo $lesson->title; ?></h3>
                <p><?php echo $lesson->content; ?></p>
                <span>Type: <?php echo $lesson->type; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>


</main><!-- End #main -->

<?php require APPROOT . '/views/inc/footer_admin.php'; ?>