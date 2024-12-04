<?php
  class Course {
    private $db;

    public function __construct(){
      $this->db = new Database();
    }
    public function read()
    {
        $this->db->query("SELECT * FROM courses");
        $result = $this->db->resultset();
        return $result;
    }

    public function getCourseByid($course_id)
    {
        $this->db->query("SELECT * FROM courses WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);
        $row = $this->db->Single();
        return $row;
    }
    
    public function create($data) {
        $this->db->query('INSERT INTO courses (title, description, level)
                            VALUES (:title, :description, :level)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':level', $data['level']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
        $this->db->query('UPDATE courses SET course_id = :course_id, title = :title, description = :description, level = :level');
        $this->db->bind(':course_id', $data['course_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':level', $data['level']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($course_id)
    {
        $this->db->query("DELETE FROM courses WHERE course_id = :course_id");
        $this->db->bind(':course_id', $course_id);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}