<?php
class Lessons extends Controller
{
    private $lessonModel;

    public function __construct()
    {
        $this->lessonModel = $this->model('Lesson');
    }

    public function index()
    {
        $lesson = $this->lessonModel->read();
        $data = [
            'lessons' => $lesson
        ];
        $this->view('lesson/index', $data);
    }

    public function show($lesson_id)
    {
        $lesson = $this->lessonModel->getLessonByid($lesson_id);
        $data = [
            'lesson' => $lesson,  // Correction: Renommé 'lessons' en 'lesson' pour cohérence
        ];
        $this->view('lesson/lesson_detail', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'course_id' => trim($_POST['course_id']),
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'image_url' => trim($_POST['image_url']),
                'file_url' => trim($_POST['file_url']),
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            // Validation des champs du formulaire
            if (empty($data['course_id'])) {
                $data['course_id_err'] = 'Course_id can\'t be empty';
            }
            if (empty($data['title'])) {
                $data['title_err'] = 'Title can\'t be empty';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Content can\'t be empty';
            }
            if (empty($data['image_url'])) {
                $data['image_url_err'] = 'Image URL can\'t be empty';
            }
            if (empty($data['video_url'])) {
                $data['video_url_err'] = 'Video URL can\'t be empty';
            }

            // Traitement de l'upload du fichier vidéo
            if (isset($_FILES['video']) && $_FILES['video']['error'] === 0) {
                $uploadDir = 'public/uploads/';
                $fileName = basename($_FILES['video']['name']);
                $targetFile = $uploadDir . $fileName;

                // Vérifiez si le dossier existe, sinon créez-le
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Vérifiez le type MIME pour s'assurer qu'il s'agit bien d'une vidéo
                $allowedTypes = ['video/mp4', 'video/avi', 'video/mkv'];
                $fileType = mime_content_type($_FILES['video']['tmp_name']);

                if (in_array($fileType, $allowedTypes)) {
                    // Déplacez le fichier uploadé vers le dossier cible
                    if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFile)) {
                        $data['file_url'] = $targetFile;  // Enregistrez le chemin du fichier téléchargé
                    } else {
                        $data['file_url_err'] = "Erreur lors du déplacement du fichier.";
                    }
                } else {
                    $data['file_url_err'] = "Type de fichier non autorisé.";
                }
            } else {
                $data['file_url_err'] = "Aucun fichier ou erreur lors de l'upload.";
            }

            // Vérifiez si tous les champs sont valides
            if (empty($data['course_id_err']) && empty($data['title_err']) && empty($data['content_err']) && empty($data['image_url_err']) && empty($data['file_url_err'])) {
                if ($this->lessonModel->create($data)) {
                    flash('lesson_added', 'Lesson Added Successfully!');
                    redirect('lesson');
                } else {
                    die('Error on adding lesson');
                }
            } else {
                $this->view('lesson/add', $data);
            }
        } else {
            // Données initiales du formulaire (pour la première fois)
            $data = [
                'course_id' => '',
                'title' => '',
                'content' => '',
                'image_url' => '',
                'file_url' => '',
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];
            $this->view('lesson/add', $data);
        }
    }

    public function edit($lesson_id)
    {
        if (!$lesson_id) {
            die('Erreur : No id found');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'lesson_id' => $lesson_id,
                'course_id' => trim($_POST['course_id']),
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'image_url' => trim($_POST['image_url']),
                'file_url' => trim($_POST['file_url']),
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            // Validation des champs du formulaire
            if (empty($data['course_id'])) {
                $data['course_id_err'] = 'Course_id can\'t be empty';
            }
            if (empty($data['title'])) {
                $data['title_err'] = 'Title can\'t be empty';
            }
            if (empty($data['content'])) {
                $data['content_err'] = 'Content can\'t be empty';
            }
            if (empty($data['image_url'])) {
                $data['image_url_err'] = 'Image URL can\'t be empty';
            }
            if (empty($data['file_url'])) {
                $data['file_url_err'] = 'File URL can\'t be empty';
            }

            // Vérifiez si tous les champs sont valides
            if (empty($data['course_id_err']) && empty($data['title_err']) && empty($data['content_err']) && empty($data['image_url_err']) && empty($data['file_url_err'])) {
                if ($this->lessonModel->update($data)) {
                    flash('lesson_updated', 'Lesson Updated Successfully!');
                    redirect('lesson');
                } else {
                    die('Error on update');
                }
            } else {
                $this->view('lesson/edit', $data);
            }
        } else {
            $lesson = $this->lessonModel->getLessonByid($lesson_id);

            if (!$lesson) {
                die('Lesson can\'t be found');
            }

            $data = [
                'lesson_id' => $lesson->lesson_id,
                'course_id' => $lesson->course_id,
                'title' => $lesson->title,
                'content' => $lesson->content,
                'image_url' => $lesson->image_url,
                'file_url' => $lesson->file_url,  // Assurez-vous que c'est bien 'file_url' dans la DB
                'course_id_err' => '',
                'title_err' => '',
                'content_err' => '',
                'image_url_err' => '',
                'file_url_err' => '',
            ];

            $this->view('lesson/edit', $data);
        }
    }

    public function delete($lesson_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->lessonModel->delete($lesson_id)) {
                flash('lesson_message', 'Lesson deleted successfully');
                redirect('lesson');
            } else {
                die('Error on delete');
            }
        } else {
            redirect('lesson');
        }
    }
}
?>