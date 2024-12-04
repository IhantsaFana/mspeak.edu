<?php
class Admin extends Controller
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        if(!isset($_SESSION['user_id'])){
            redirect('auth/login');
        }

        $course = $this->courseModel->read();
        $data = [
            'courses' => $course
        ];
        $this->view('admin/index', $data);
    }

    public function pagenotfound()
    {
        $this->view('pages/page-not-found');
    }

    public function show($course_id)
    {
        $course = $this->courseModel->getCourseByid($course_id);
        $data = [
            'courses' => $course,
        ];
        $this->view('course/course_detail', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'level' => trim($_POST['level']),
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];
            if (empty($data['title'])) {
                $data['title_err'] = 'Title can\'t be empty';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Description can\'t be empty';
            }
            if (empty($data['level'])) {
                $data['level_err'] = 'Level can\'t be empty';
            }
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['level_err'])) {
                if ($this->courseModel->create($data)) {
                    flash('course_added', 'Course Added !');
                    redirect('course');
                } else {
                    die('Error on adding course');
                }
            } else {
                $this->view('course/add', $data);
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
            $this->view('course/add', $data);
        }
    }

    public function edit($course_id)
    {
        if (!$course_id) {
            die('Erreur : No id found');
        }

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
            if (empty($data['title'])) {
                $data['title_err'] = 'Title can\'t be empty';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Description can\'t be empty';
            }
            if (empty($data['level'])) {
                $data['level_err'] = 'Level can\'t be empty';
            }
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['level_err'])) {
                if ($this->courseModel->update($data)) {
                    flash('course_added', 'Course Added !');
                    redirect('course');
                } else {
                    die('Error on update');
                }
            } else {
                $this->view('course/edit', $data);
            }
        } else {
            $course = $this->courseModel->getCourseByid($course_id);

            // Vérifier si la course existe
            if (!$course) {
                die('Course can\'t be found');
            }

            // Préparer les données à afficher dans le formulaire
            $data = [
                'course_id' => $course->course_id,
                'title' => $course->title,
                'description' => $course->description,
                'level' => $course->level,
                'title_err' => '',
                'description_err' => '',
                'level_err' => '',
            ];

            // Charger la vue avec les données actuelles de la course
            $this->view('course/edit', $data);
        }
    }

    public function delete($course_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->courseModel->delete($course_id)) {
                flash('course_message', 'Course deleted successfuly');
                redirect('course');
            } else {
                die('Error on delete');
            }
        } else {
            redirect('course');
        }
    }
}
