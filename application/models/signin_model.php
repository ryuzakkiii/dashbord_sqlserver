<?php
class Signin_model extends CI_Model {

    public function signin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $que = $this->db->query("SELECT * FROM [wallboard].[dbo].[user] WHERE  email = '$email' AND password = '$password'");
        $result = $que->result();
        
        if ($result){
            redirect ('acceuil');
        }
    }  
  
}