<?php 
class login_m extends CI_Model {
    public function login_user($email,$password) {
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $result = $this->db->get('users');
        
        if($result->num_rows() == 1) {
            return $result->row(0)->id;
        }
        else {
            $this->session->set_flashdata('error','Email or Password is incorrect');
            return false;
        }
    }
}