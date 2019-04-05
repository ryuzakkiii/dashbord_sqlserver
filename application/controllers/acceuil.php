<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Acceuil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('acceuil_model');
    }

    public function index(){        
        $data['valeur'] = $this->acceuil_model->produit_and_reste();
        $this->load->view('page/acceuil');
        $this->load->view('page/dashboard/header');
        $this->load->view('page/dashboard/content', $data);
    }
    
}