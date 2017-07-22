<?php 

class loggedin_m extends CI_Model {
    public function getuserdata($userid) {
        
        $this->db->where('id',$userid);
        $result = $this->db->get('users');
        
        return $result->row(0);
        
    }
}