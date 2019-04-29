<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Acceuil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('acceuil_model');
    }

    public function index(){        
        $data['valeur'] = $this->acceuil_model->produit_and_reste();
        $data['detail'] = $this->acceuil_model->produit();
        $array = array_merge($data);
        $this->load->view('page/acceuil');
        //$this->load->view('page/dashboard/header');
        $this->load->view('page/dashboard/content',$array);

    }

    public function filtre_par_produit(){
        $var = $this->input->post();

        $data = $this->acceuil_model->filtre_par_produit($var);

        echo json_encode($data);
    }

    public function filtre_par_date(){

        $dates = $this->input->post();
        $data = $this->acceuil_model->filtre_par_date($dates);
        echo json_encode($data);
    }
    
}