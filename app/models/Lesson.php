<?php
class Lesson
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function read()
    {
        $this->db->query("SELECT * FROM lessons");
        $result = $this->db->resultset();
        return $result;
    }

    public function getLessonByid($lesson_id)
    {
        $this->db->query("SELECT * FROM lessons WHERE lesson_id = :lesson_id");
        $this->db->bind(':lesson_id', $lesson_id);
        $row = $this->db->Single();
        return $row;
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO lessons (course_id, title, content, image_url, file_url)
                            VALUES (course_id, :title, :content, :image_url, :file_url)');
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':file_url', $data['file_url']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE lessons SET lesson_id = :lesson_id, course_id = :course_id, title = :title, content = :content, image_url = :image_url, file_url = :file_url');
        $this->db->bind(':lesson_id', $data['lesson_id']);
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':file_url', $data['file_url']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($lesson_id)
    {
        $this->db->query("DELETE FROM lessons WHERE lesson_id = :lesson_id");
        $this->db->bind(':lesson_id', $lesson_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
