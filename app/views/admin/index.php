<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<?php flash('course_message'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-4">
    <div class="row mb-4">

      <!-- Cards for Courses -->
      <div class="col-12 mb-4">
        <h2 class="text-center text-primary">Courses</h2>
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Course List</h5>
          </div>
          <div class="card-body p-4">
            <table class="table table-hover table-striped align-middle">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Level</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['courses'] as $course) : ?>
                  <tr>
                    <td><?php echo $course->course_id; ?></td>
                    <td><?php echo $course->title; ?></td>
                    <td><?php echo $course->description; ?></td>
                    <td><?php echo $course->level; ?></td>
                    <td class="text-center">
                      <!-- Edit Button -->
                      <a class="btn btn-outline-primary btn-sm me-2" href="<?php echo URLROOT; ?>/admin/edit_course/<?php echo $course->course_id; ?>" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <!-- Delete Button with Modal -->
                      <a href="#" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo $course->course_id; ?>" title="Delete">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Modal for Delete Confirmation -->
                  <div class="modal fade" id="deleteModal-<?php echo $course->course_id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo $course->course_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel-<?php echo $course->course_id; ?>">Confirm Deletion</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this course?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <form action="<?php echo URLROOT; ?>/admin/delete_course/<?php echo $course->course_id; ?>" method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-muted text-center">
            <span class="badge bg-info">Total courses: <?php echo count($data['courses']); ?></span>
          </div>
        </div>
      </div>

      <!-- Cards for Lessons -->
      <div class="col-12 mb-4">
        <h2 class="text-center text-primary">Lessons</h2>
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Lesson List</h5>
          </div>
          <div class="card-body p-4">
            <table class="table table-bordered table-hover table-striped align-middle">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Course ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Type</th>
                  <th scope="col">Image</th>
                  <th scope="col">File</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['lessons'] as $lesson) : ?>
                  <tr>
                    <td><?php echo $lesson->lesson_id; ?></td>
                    <td><?php echo $lesson->course_id; ?></td>
                    <td><?php echo $lesson->title; ?></td>
                    <td><?php echo $lesson->content; ?></td>
                    <td><?php echo $lesson->type; ?></td>
                    <td>
                      <?php if (!empty($lesson->image_url)) : ?>
                        <img src="<?php echo URLROOT . '/' . $lesson->image_url; ?>" alt="Lesson Image" style="max-width: 100px;">
                      <?php else : ?>
                        No image
                      <?php endif; ?>
                    </td>
                    <!-- Dans la vue de la liste des leçons -->
                    <td>
                      <?php if ($lesson->type === 'PDF') : ?>
                        <a href="<?php echo URLROOT . '/' . $lesson->file_url; ?>" target="_blank" class="btn btn-outline-success btn-sm">
                          <i class="bi bi-file-earmark-pdf"></i> Download PDF
                        </a>
                      <?php elseif ($lesson->type === 'Video') : ?>
                        <a href="<?php echo URLROOT . '/' . $lesson->file_url; ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                          <i class="bi bi-play-circle"></i> Watch Video
                        </a>
                      <?php elseif ($lesson->type === 'Quiz') : ?>
                        <a href="<?php echo URLROOT . '/quiz/play/' . $lesson->lesson_id; ?>" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-journal-check"></i> Play Quiz
                        </a>
                      <?php else : ?>
                        <span>Unknown Type</span>
                      <?php endif; ?>
                    </td>

                    <td>
                      <!-- Edit Button -->
                      <a class="btn btn-outline-secondary btn-sm me-2" href="<?php echo URLROOT; ?>/admin/edit_lesson/<?php echo $lesson->lesson_id; ?>" title="Edit">
                        <i class="bi bi-pencil" aria-hidden="true"></i>
                      </a>
                      <!-- Delete Button with Modal -->
                      <a href="#" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteLessonModal-<?php echo $lesson->lesson_id; ?>" title="Delete">
                        <i class="bi bi-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>

                  <!-- Modal for Delete Lesson -->
                  <div class="modal fade" id="deleteLessonModal-<?php echo $lesson->lesson_id; ?>" tabindex="-1" aria-labelledby="deleteLessonModalLabel-<?php echo $lesson->lesson_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteLessonModalLabel-<?php echo $lesson->lesson_id; ?>">Confirm Deletion</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this lesson?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <form action="<?php echo URLROOT; ?>/admin/delete_lesson/<?php echo $lesson->lesson_id; ?>" method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer text-muted text-center">
            <span class="badge bg-info">Total lessons: <?php echo count($data['lessons']); ?></span>
          </div>
        </div>
      </div>

    </div>
  </div>
</main><!-- End #main -->

<?php require APPROOT . '/views/inc/footer_admin.php'; ?>