<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Charger la page d'accueil
    public function index(){
      if(isset($_SESSION['user_id'])){
        redirect('courses');
      }

      //Set Data
      $data = [
        'title' => 'M\'Speak',
        'description' => 'Join thousands of learners who have transformed their lives by mastering English. Whether you are a beginner or looking to improve your skills, we have the right tools for you.'
      ];

      // Charger la vue homepage/index
      $this->view('pages/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // charger la vue 'A propos'
      $this->view('pages/about', $data);
    }

    public function page_not_found(){
      // charger la vue 'A propos'
      $this->view('pages/page-not-found');
    }
  }