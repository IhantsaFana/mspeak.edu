<?php
class Lessons extends Controller
{
    private $lessonModel;
    private $courseModel;

    public function __construct()
    {
        $this->lessonModel = $this->model('Lesson');
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        $lessons = $this->lessonModel->read();
        $data = [
            'lessons' => $lessons
        ];
        $this->view('admin/lessons', $data);
    }

    public function show($course_id)
    {
        $lesson = $this->lessonModel->getLessonsByCourseId($course_id);
        if (!$lesson) {
            flash('error', 'Lesson not found');
            redirect('lessons');
        }

        $data = ['lesson' => $lesson];
        $this->view('course/enroll', $data);
    }

    public function type($type)
    {
        $lesson = $this->lessonModel->readByType($type);
        if (!$lesson) {
            flash('error', 'Lesson not found');
            redirect('courses');
        }

        $data = ['lesson' => $lesson];
        $this->view('course/enroll', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'course_id' => trim($_POST['course_id']),
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'type' => trim($_POST['type']),
                'image_url' => '',
                'file_url' => '',
                // Champs d'erreur
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'type_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            // Gestion de l'image
            if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                $imageFileType = strtolower(pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($imageFileType, $allowedTypes)) {
                    $data['image_url'] = 'uploads/' . uniqid() . '.' . $imageFileType;
                    move_uploaded_file($_FILES['image_url']['tmp_name'], $data['image_url']);
                } else {
                    $data['image_url_err'] = 'Format d\'image non valide';
                }
            } else {
                $data['image_url_err'] = 'Aucune image sélectionnée';
            }

            // Gestion de l'file_url
            if (isset($_FILES['file_url']) && $_FILES['file_url']['error'] === UPLOAD_ERR_OK) {
                $fileType = strtolower(pathinfo($_FILES['file_url']['name'], PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'mp4', 'gif'];
                if (in_array($fileType, $allowedTypes)) {
                    $data['file_url'] = 'uploads/' . uniqid() . '.' . $fileType;
                    move_uploaded_file($_FILES['file_url']['tmp_name'], $data['file_url']);
                } else {
                    $data['file_url_err'] = 'Format d\'image non valide';
                }
            } else {
                $data['file_url_err'] = 'Aucune image sélectionnée';
            }

            // Ajout du véhicule
            if (empty($data['course_id_err']) && empty($data['title_err']) && empty($data['content_err']) && 
                empty($data['type_err']) && empty($data['image_url_err']) && empty($data['file_url_err'])) {
                if ($this->lessonModel->create($data)) {
                    flash('vehicule_added', 'Véhicule ajouté');
                    redirect('admin');
                } else {
                    die('Erreur lors de l\'ajout du véhicule');
                }
            } else {
                $this->view('admin/add_lesson', $data);
            }
        } else {
            $data = [
                'course_id' => '',
                'title' => '',
                'content' => '',
                'type' => '',
                'image_url' => '',
                'file_url' => '',
                // Champs d'erreur
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'type_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];
            $this->view('admin/add_lesson', $data);
        }
    }

    public function edit($lesson_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'lesson_id' => $lesson_id,
                'course_id' => trim($_POST['course_id']),
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'type' => trim($_POST['type']),
                'image_url' => $this->uploadFile('image_url', ['jpg', 'jpeg', 'png', 'gif']),
                'file_url' => $this->uploadFile('file_url', ['pdf', 'docx', 'txt']),
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            if (empty($data['course_id'])) $data['course_id_err'] = 'Course ID can\'t be empty';
            if (empty($data['title'])) $data['title_err'] = 'Title can\'t be empty';
            if (empty($data['content'])) $data['content_err'] = 'Content can\'t be empty';

            if (empty($data['course_id_err']) && empty($data['title_err']) && empty($data['content_err'])) {
                if ($this->lessonModel->update($data)) {
                    flash('lesson_updated', 'Lesson updated successfully!');
                    redirect('admin');
                } else {
                    flash('error', 'Error updating the lesson');
                    redirect('admin/edit_lesson/' . $lesson_id);
                }
            } else {
                $this->view('admin/edit_lesson', $data);
            }
        } else {
            $lesson = $this->lessonModel->getLessonById($lesson_id);

            if (!$lesson) {
                flash('error', 'Lesson not found');
                redirect('admin');
            }

            $data = [
                'lesson_id' => $lesson->lesson_id,
                'course_id' => $lesson->course_id,
                'title' => $lesson->title,
                'content' => $lesson->content,
                'type' => $lesson->type,
                'image_url' => $lesson->image_url,
                'file_url' => $lesson->file_url,
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            $this->view('admin/edit_lesson', $data);
        }
    }

    public function delete($lesson_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->lessonModel->delete($lesson_id)) {
                flash('lesson_message', 'Lesson deleted successfully!');
                redirect('lessons');
            } else {
                flash('error', 'Error deleting the lesson');
                redirect('lessons');
            }
        } else {
            redirect('lessons');
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
