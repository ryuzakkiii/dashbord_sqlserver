<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Acceuil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('acceuil_model');
    }

    public function index(){  
        $data['agent'] = $this->acceuil_model->agent();
        $this->load->view('page/dashboard/content',$data);
    }

    public function filtre(){
        $daty = $this->input->post('daty');
     
        $data['agent'] = $this->acceuil_model->filtre($daty);
        $data['totappel'] = $this->acceuil_model->total_appel($daty);    
        $data['aqualifie'] = $this->acceuil_model->appel_qualifié($daty);
        $data['repondeur'] = $this->acceuil_model->repondeur($daty);
        $data['rappel'] = $this->acceuil_model->rappel($daty);
        $data['injoign'] = $this->acceuil_model->injoignable($daty);
        $data['test'] = $this->acceuil_model->appel_test($daty);
        echo json_encode($data);

    }

}