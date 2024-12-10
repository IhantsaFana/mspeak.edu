<?php
  class Controller {
    // Charger le model à partir des controllers
    public function model($model){
      // Require le ficher model
      require_once '../app/models/' . $model . '.php';
      // Instancier le model
      return new $model();
    }

    // Charger la view à partir des controllers
    public function view($url, $data = []){
      // Vérifier l'existence des views
      if(file_exists('../app/views/'.$url.'.php')){
        // Charger les fichers view
        require_once '../app/views/'.$url.'.php';
      } else {
        // Quitter l'application quand le view n'existe pas
        require_once '../app/views/pages/page-not-found.php';
      }
    }
  }