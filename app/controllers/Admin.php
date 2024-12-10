<?php
class Admin extends Controller
{
    private $courseModel;
    private $lessonModel;

    public function __construct()
    {
        $this->courseModel = $this->model('Course');
        $this->lessonModel = $this->model('Lesson');
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('pages/page_not_found');
        }

        $course = $this->courseModel->read();
        $lesson = $this->lessonModel->read();
        $data = [
            'courses' => $course,
            'lessons' => $lesson
        ];
        $this->view('admin/index', $data);
    }

    public function pagenotfound()
    {
        $this->view('pages/page-not-found');
    }

    // ------------------ CRUD for Courses ------------------

    private function validateCourseData($data)
    {
        $errors = [];
        if (empty($data['title'])) {
            $errors['title_err'] = 'Title can\'t be empty';
        }
        if (empty($data['description'])) {
            $errors['description_err'] = 'Description can\'t be empty';
        }
        if (empty($data['level'])) {
            $errors['level_err'] = 'Level can\'t be empty';
        }
        return $errors;
    }

    public function add_course()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'level' => trim($_POST['level']),
                'title_err' => '',
                'description_err' => '',
                'level_err' => ''
            ];

            $errors = $this->validateCourseData($data);
            if (!empty($errors)) {
                $data['title_err'] = $errors['title_err'] ?? '';
                $data['description_err'] = $errors['description_err'] ?? '';
                $data['level_err'] = $errors['level_err'] ?? '';
                $this->view('admin/add_course', $data);
                return;
            }

            try {
                if ($this->courseModel->create($data)) {
                    flash('course_added', 'Course Added!');
                    redirect('admin');
                } else {
                    throw new Exception('Error on adding course');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $data = [
                'title' => '',
                'description' => '',
                'level' => '',
                'title_err' => '',
                'description_err' => '',
                'level_err' => ''
            ];
            $this->view('admin/add_course', $data);
        }
    }

    public function edit_course($course_id)
    {
        if (!$course_id) {
            die('Error: No id found');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'course_id' => $course_id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'level' => trim($_POST['level']),
                'title_err' => '',
                'description_err' => '',
                'level_err' => ''
            ];

            $errors = $this->validateCourseData($data);
            if (!empty($errors)) {
                $data['title_err'] = $errors['title_err'] ?? '';
                $data['description_err'] = $errors['description_err'] ?? '';
                $data['level_err'] = $errors['level_err'] ?? '';
                $this->view('admin/edit_course', $data);
                return;
            }

            try {
                if ($this->courseModel->update($data)) {
                    flash('course_updated', 'Course updated!');
                    redirect('admin');
                } else {
                    throw new Exception('Error on update');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $course = $this->courseModel->getCourseByid($course_id);
            if (!$course) {
                die('Course can\'t be found');
            }

            $data = [
                'course_id' => $course->course_id,
                'title' => $course->title,
                'description' => $course->description,
                'level' => $course->level,
                'title_err' => '',
                'description_err' => '',
                'level_err' => ''
            ];
            $this->view('admin/edit_course', $data);
        }
    }

    public function delete_course($course_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                if ($this->courseModel->delete($course_id)) {
                    flash('course_message', 'Course deleted successfully');
                    redirect('admin');
                } else {
                    throw new Exception('Error on delete');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            redirect('admin');
        }
    }

    // ------------------ CRUD for Lessons ------------------

    private function validateLessonData($data)
    {
        $errors = [];
        if (empty($data['title'])) {
            $errors['title_err'] = 'Title can\'t be empty';
        }
        if (empty($data['content'])) {
            $errors['content_err'] = 'Content can\'t be empty';
        }
        return $errors;
    }

    public function add_lesson()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'course_id' => trim($_POST['course_id']),
                'title_err' => '',
                'content_err' => ''
            ];

            $errors = $this->validateLessonData($data);
            if (!empty($errors)) {
                $data['title_err'] = $errors['title_err'] ?? '';
                $data['content_err'] = $errors['content_err'] ?? '';
                $this->view('admin/add_lesson', $data);
                return;
            }

            try {
                if ($this->lessonModel->create($data)) {
                    flash('lesson_added', 'Lesson Added!');
                    redirect('admin');
                } else {
                    throw new Exception('Error on adding lesson');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $data = [
                'title' => '',
                'content' => '',
                'course_id' => '',
                'title_err' => '',
                'content_err' => ''
            ];
            $this->view('admin/add_lesson', $data);
        }
    }

    public function edit_lesson($lesson_id)
    {
        if (!$lesson_id) {
            die('Error: No id found');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'lesson_id' => $lesson_id,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'course_id' => trim($_POST['course_id']),
                'title_err' => '',
                'content_err' => ''
            ];

            $errors = $this->validateLessonData($data);
            if (!empty($errors)) {
                $data['title_err'] = $errors['title_err'] ?? '';
                $data['content_err'] = $errors['content_err'] ?? '';
                $this->view('admin/edit_lesson', $data);
                return;
            }

            try {
                if ($this->lessonModel->update($data)) {
                    flash('lesson_updated', 'Lesson updated!');
                    redirect('admin');
                } else {
                    throw new Exception('Error on update');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            $lesson = $this->lessonModel->getLessonByid($lesson_id);
            if (!$lesson) {
                die('Lesson can\'t be found');
            }

            $data = [
                'lesson_id' => $lesson->lesson_id,
                'title' => $lesson->title,
                'content' => $lesson->content,
                'course_id' => $lesson->course_id,
                'title_err' => '',
                'content_err' => ''
            ];
            $this->view('admin/edit_lesson', $data);
        }
    }

    public function delete_lesson($lesson_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                if ($this->lessonModel->delete($lesson_id)) {
                    flash('lesson_message', 'Lesson deleted successfully!');
                    redirect('admin');
                } else {
                    throw new Exception('Error deleting the lesson');
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            redirect('admin');
        }
    }

    // Fonction d'upload des fichiers
    private function uploadFile($fieldName, $allowedTypes, &$error = '')
    {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $fileType = strtolower(pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION));
            if (in_array($fileType, $allowedTypes)) {
                $filePath = 'uploads/' . uniqid() . '.' . $fileType;
                move_uploaded_file($_FILES[$fieldName]['tmp_name'], $filePath);
                return $filePath;
            } else {
                $error = 'Invalid file type';
            }
        } else {
            $error = ucfirst($fieldName) . ' is required';
        }
        return '';
    }
}
