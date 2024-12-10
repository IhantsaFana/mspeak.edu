<?php
class Lesson
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Lire toutes les leçons
    public function read()
    {
        $this->db->query("SELECT * FROM lessons");
        $result = $this->db->resultset();
        return $result;
    }

    public function readByType($type)
    {
        $this->db->query("SELECT * FROM lessons WHERE type = :type");
        $this->db->bind(':type', $type);
        $result = $this->db->resultset();
        return $result;
    }

    // Lire les leçons d'un cours spécifique
    public function getLessonsByCourseId($course_id)
    {
        $this->db->query("SELECT * FROM lessons WHERE course_id = :course_id ORDER BY created_at ASC");
        $this->db->bind(':course_id', $course_id);
        $result = $this->db->resultset();
        return $result ?: []; // Renvoie un tableau vide si aucun résultat
    }

    // Lire une leçon spécifique
    public function getLessonById($lesson_id)
    {
        $this->db->query("SELECT * FROM lessons WHERE lesson_id = :lesson_id");
        $this->db->bind(':lesson_id', $lesson_id);
        $row = $this->db->single();
        return $row ? $row : null; // Retourne null si aucune leçon n'est trouvée
    }

    // Créer une leçon
    public function create($data)
    {
        // Validation des données
        if (empty($data['course_id']) || empty($data['title']) || empty($data['content']) || empty($data['type'])) {
            return false; // Si une donnée essentielle est manquante
        }

        // Insertion de la leçon
        $this->db->query('INSERT INTO lessons (course_id, title, content, type, image_url, file_url) 
                          VALUES (:course_id, :title, :content, :type, :image_url, :file_url)');
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':file_url', $data['file_url']);

        try {
            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Erreur lors de la création de la leçon");
            }
        } catch (Exception $e) {
            // Enregistrez l'erreur ou retournez un message d'erreur détaillé
            return false;
        }
    }

    // Mettre à jour une leçon
    public function update($data)
    {
        // Validation des données
        if (empty($data['lesson_id']) || empty($data['title']) || empty($data['content']) || empty($data['type'])) {
            return false; // Si une donnée essentielle est manquante
        }

        // Mise à jour de la leçon
        $this->db->query('UPDATE lessons 
                          SET title = :title, content = :content, type = :type, image_url = :image_url, file_url = :file_url 
                          WHERE lesson_id = :lesson_id');
        $this->db->bind(':lesson_id', $data['lesson_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':file_url', $data['file_url']);

        try {
            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Erreur lors de la mise à jour de la leçon");
            }
        } catch (Exception $e) {
            // Enregistrez l'erreur ou retournez un message d'erreur détaillé
            return false;
        }
    }

    // Supprimer une leçon
    public function delete($lesson_id)
    {
        // Vérification de l'existence de la leçon
        $this->db->query("SELECT COUNT(*) FROM lessons WHERE lesson_id = :lesson_id");
        $this->db->bind(':lesson_id', $lesson_id);
        $lessonCount = $this->db->single();

        if ($lessonCount == 0) {
            return false; // Leçon non trouvée
        }

        // Suppression de la leçon
        $this->db->query("DELETE FROM lessons WHERE lesson_id = :lesson_id");
        $this->db->bind(':lesson_id', $lesson_id);

        try {
            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Erreur lors de la suppression de la leçon");
            }
        } catch (Exception $e) {
            // Enregistrez l'erreur ou retournez un message d'erreur détaillé
            return false;
        }
    }

    // Supprimer les leçons d'un cours
    public function deleteByCourse($course_id)
    {
        // Vérification si des leçons existent pour ce cours
        $this->db->query("SELECT COUNT(*) FROM lessons WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);
        $lessonCount = $this->db->single();

        if ($lessonCount == 0) {
            return false; // Aucun cours à supprimer
        }

        // Suppression des leçons du cours
        $this->db->query("DELETE FROM lessons WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);

        try {
            if ($this->db->execute()) {
                return true;
            } else {
                throw new Exception("Erreur lors de la suppression des leçons du cours");
            }
        } catch (Exception $e) {
            // Enregistrez l'erreur ou retournez un message d'erreur détaillé
            return false;
        }
    }

    public function getLessonsCountByCourse()
    {
        // Requête SQL pour récupérer le nombre de leçons par cours
        $this->db->query("
        SELECT 
            course_id, 
            COUNT(*) AS lesson_count
        FROM lessons
        GROUP BY course_id
    ");
        $result = $this->db->resultset();
        return $result;
    }

    
}
