<?php 

class register_m extends CI_Model {
    public function register_user($user) {
        $this->db->insert('users', $user);
        return TRUE;
    }
    
    public function emailcheck($email) {
        $this->db->where('email',$email);
        $r=$this->db->get('users');
        if($r->num_rows() > 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}