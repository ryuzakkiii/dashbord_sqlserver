<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Signin_controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('signin_model');

    }
    //connexion
    public function signin(){
        $this->load->view('page/composant/nav');
        $this->load->view('page/signin_view');
        $this->signin_model->signin();
    }

    //deja connecter

}