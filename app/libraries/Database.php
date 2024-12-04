<?php

  class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;
	
	private $dbh;
	private $error;
	private $stmt;
	
	public function __construct() {
		// Set DSN
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
				
		$options = array (
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		);

		// Créer un nouvel objet PDO
		try {
			$this->dbh = new PDO ($dsn, $this->user, $this->pass, $options);
		}		// Récupérer toutes les execeptions
		catch ( PDOException $e ) {
			$this->error = $e->getMessage();
		}
	}
	// Preparer la requête
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}
	
	// Liaison Paramètres/Valeurs
	public function bind($param, $value, $type = null) {
		if (is_null ($type)) {
			switch (true) {
				case is_int ($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool ($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_string ($value) :
					$type = PDO::PARAM_STR;
					break;
				case is_null ($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	// Executer La requête préparée
	public function execute(){
		return $this->stmt->execute();
	}

	// Récupérer les résultats de la 
	// requête dans un tableau d'objets
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// Récupérer un enregistrement comme un objet
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	// Nombre de ligne de la requête
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	// Retourne le dernier ID
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
}