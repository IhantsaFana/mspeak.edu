<?php
  class Exercise {
    private $db;

    public function __construct(){
      $this->db = new Database();
    }
    public function read()
    {
        $this->db->query("SELECT * FROM exercises");
        $result = $this->db->resultset();
        return $result;
    }

    public function getExerciseByType($type)
    {
        $this->db->query("SELECT * FROM exercises WHERE type = :type");
        $this->db->bind(':type', $type);
        $row = $this->db->Single();
        return $row;
    }
    
    public function create($data) {
        $this->db->query('INSERT INTO exercises (lesson_id, question, type, options, correct_answer)
                            VALUES (:lesson_id, :question, :type, :options, :correct_answer)');
        $this->db->bind(':lesson_id', $data['lesson_id']);
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':options', $data['options']);
        $this->db->bind(':correct_answer', $data['correct_answer']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($exercise_id)
    {
        $this->db->query("DELETE FROM exercises WHERE exercise_id = :exercise_id");
        $this->db->bind(':exercise_id', $exercise_id);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}