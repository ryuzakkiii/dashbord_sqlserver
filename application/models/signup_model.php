<?php
class Signup_model extends CI_Model {

    public function signup()
    {
        $data = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ); 
        
        $que = $this->db->query("select [email] from [wallboard].[dbo].[user] where email='$data[email]'");

        $row = $que->result();
        if ($row){
            echo 'email already taken';
        }
        else{
            $this->db->insert('user', $data);
            redirect ('acceuil');
        }
    }
    
    
}