<?php
class Course
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function read()
    {
        $this->db->query("SELECT * FROM courses");
        $result = $this->db->resultset();
        return $result;
    }

    // Obtenir un cours spécifique avec ses leçons
    public function getCourseWithLessons($course_id)
    {
        $this->db->query("
            SELECT * 
            FROM courses 
            WHERE course_id = :course_id
        ");
        $this->db->bind(':course_id', $course_id);
        $course = $this->db->single();

        if ($course) {
            $this->db->query("
                SELECT * 
                FROM lessons 
                WHERE course_id = :course_id 
                ORDER BY created_at ASC
            ");
            $this->db->bind(':course_id', $course_id);
            $course->lessons = $this->db->resultSet();
        }

        return $course;
    }


    public function getCourseByid($course_id)
    {
        $this->db->query("SELECT * FROM courses WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);
        $row = $this->db->single();
        return $row;
    }


    public function create($data)
    {
        $this->db->query('INSERT INTO courses (title, description, level)
                            VALUES (:title, :description, :level)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':level', $data['level']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE courses SET title = :title, description = :description, level = :level WHERE course_id = :course_id');
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':level', $data['level']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($course_id)
    {
        $this->db->query("DELETE FROM courses WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCoursesCountByMonth()
    {
        // Requête SQL pour récupérer le nombre de cours par mois
        $this->db->query("
        SELECT 
            YEAR(created_at) AS year, 
            MONTH(created_at) AS month, 
            COUNT(*) AS course_count
        FROM courses
        GROUP BY YEAR(created_at), MONTH(created_at)
        ORDER BY YEAR(created_at) DESC, MONTH(created_at) DESC
    ");
        $result = $this->db->resultset();
        return $result;
    }

    public function getCoursesByLevel()
    {
        // Requête SQL pour récupérer la répartition des cours par niveau
        $this->db->query("
        SELECT 
            level, 
            COUNT(*) AS course_count
        FROM courses
        GROUP BY level
    ");
        $result = $this->db->resultset();
        return $result;
    }
}
