<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class users_m extends CI_Model {
    
    public function get_users($id=null){
        $this->load->database();
        
        if($id!=null) {
            $sql = $this->db->where('id',$id)->get('users');    
        }
        else {
            $sql = $this->db->query('SELECT * FROM users');
            $sql = $this->db->get('users');    
        }
         
        $res = $sql->result_array();
        
        return $res;
    }
    
    public function editemailcheck($email,$id) {
        
        $array=array('email'=>$email,'id !='=> $id);
        $this->db->where($array);
        $r=$this->db->get('users');
        
        /*print_r($r);
        exit;*/
        
        if($r->num_rows() > 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function update_user($user,$id){
        $this->db->where('id',$id);
        $this->db->update('users', $user);
        return TRUE;
    }
    
    public function delete_user($id) {
        $this->db->where('id',$id);
        $this->db->delete('users');
        return TRUE;
    }
    
    public function delete_multi_user($ids) {
        $this->db->where_in('id',$ids);
        $this->db->delete('users');
        return TRUE;
    }
    
}
?>