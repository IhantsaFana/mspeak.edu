<?php
  class User_progress {
    private $db;

    public function __construct(){
      $this->db = new Database();
    }

    public function read()
    {
        $this->db->query("SELECT * FROM user_progress");
        $result = $this->db->resultset();
        return $result;
    }

    public function getUpByUser($user_id)
    {
        $this->db->query("SELECT * FROM user_progress WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->Single();
        return $row;
    }
    
    public function create($data) {
        $this->db->query('INSERT INTO user_progress (user_id, lesson_id, completed, score)
                            VALUES (:user_id, :lesson_id, :completed, :score)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':lesson_id', $data['lesson_id']);
        $this->db->bind(':completed', $data['completed']);
        $this->db->bind(':score', $data['score']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}