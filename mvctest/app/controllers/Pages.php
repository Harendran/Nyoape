<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
     
      
      $data = [
        'title' => 'Nasty Juice SA',
        'description' => 'Official Nasty Juice South Africa '
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'About the company '
      ];

      $this->view('pages/about', $data);
    }
  }