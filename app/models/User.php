<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Enregistrer un utilisateur
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, date_of_birth, password) VALUES (:name, :email, :date_of_birth, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':date_of_birth', $data['date_of_birth']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Trouver un utilisateur par email
    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByName($name){
        $this->db->query("SELECT * FROM users WHERE name = :name");
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    // Connexion d'un utilisateur
    public function login($email, $password) {
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);
  
      $row = $this->db->single();
  
      // On vérifie ici que la ligne est bien retournée
      if ($row) {
          // Ajout d'un log pour vérifier le mot de passe haché
          error_log("Password hash from database: " . $row->password);
          
          // Vérifier le mot de passe haché avec celui fourni
          if (password_verify($password, $row->password)) {
              return $row;
          } else {
              error_log("Password verification failed for email: " . $email); // Log en cas d'échec
              return false;
          }
      } else {
          return false;
      }
  }
  

  public function getUserById($id) {
    $this->db->query('SELECT * FROM users WHERE user_id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    // Vérifier si l'utilisateur existe
    if ($this->db->rowCount() > 0) {
        return $row;
    } else {
        return false;
    }
}

}
