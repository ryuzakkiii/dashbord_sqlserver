<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Signup_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url_helper');
    } 	
	
	public function signup()
	{
		$this->load->view('page/composant/nav');;
		$this->load->view('page/signup_view');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$email = $this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run()){

            $this->load->model('signup_model');
			$this->signup_model->signup();          
        }	
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('signin');
	}
}