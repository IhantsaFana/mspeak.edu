<?php
class Courses extends Controller
{
    private $courseModel;
    private $userModel;

    public function __construct()
    {
        $this->courseModel = $this->model('Course');
        $this->userModel = $this->model('User');

        // Vérification de la session pour les utilisateurs connectés
        if (!isset($_SESSION['user_id'])) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $courses = $this->courseModel->read();
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        $data = [
            'courses' => $courses,
            'user' => $user
        ];
        $this->view('course/index', $data);
    }

    public function show($id)
    {
        // Vérification que le cours existe
        $course = $this->courseModel->getCourseWithLessons($id);
        if (!$course) {
            flash('error', 'Course not found');
            redirect('courses');
        }
        $data = ['course' => $course];
        $this->view('course/course_detail', $data);
    }

    public function add()
    {
        // Validation des données envoyées
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'level' => trim($_POST['level']),
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];

            // Validation des champs
            if (empty($data['title'])) {
                $data['title_err'] = 'Title cannot be empty';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Description cannot be empty';
            }
            if (empty($data['level'])) {
                $data['level_err'] = 'Level cannot be empty';
            }

            // Si aucune erreur, création du cours
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['level_err'])) {
                if ($this->courseModel->create($data)) {
                    flash('course_added', 'Course added successfully!');
                    redirect('courses');
                } else {
                    flash('error', 'Something went wrong, please try again');
                    redirect('courses/add');
                }
            } else {
                $this->view('admin/add_course', $data);
            }
        } else {
            $data = [
                'title' => '',
                'description' => '',
                'level' => '',
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];
            $this->view('admin/add_course', $data);
        }
    }

    public function edit($course_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'course_id' => $course_id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'level' => trim($_POST['level']),
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];

            // Validation des champs
            if (empty($data['title'])) {
                $data['title_err'] = 'Title cannot be empty';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Description cannot be empty';
            }
            if (empty($data['level'])) {
                $data['level_err'] = 'Level cannot be empty';
            }

            // Si aucune erreur, mise à jour du cours
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['level_err'])) {
                if ($this->courseModel->update($data)) {
                    flash('course_updated', 'Course updated successfully!');
                    redirect('courses');
                } else {
                    flash('error', 'Error while updating the course');
                    redirect('courses/edit/' . $course_id);
                }
            } else {
                $this->view('admin/edit_course', $data);
            }
        } else {
            $course = $this->courseModel->getCourseById($course_id);

            if (!$course) {
                flash('error', 'Course not found');
                redirect('courses');
            }

            $data = [
                'course_id' => $course->course_id,
                'title' => $course->title,
                'description' => $course->description,
                'level' => $course->level,
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];

            $this->view('admin/edit_course', $data);
        }
    }

    public function delete($course_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->courseModel->delete($course_id)) {
                flash('course_message', 'Course deleted successfully!');
                redirect('courses');
            } else {
                flash('error', 'Error deleting the course');
                redirect('courses');
            }
        } else {
            redirect('courses');
        }
    }
}
