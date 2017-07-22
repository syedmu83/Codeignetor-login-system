<?php 

class logout extends CI_Controller {
    
    public function index(){
        //$this->session->sess_destroy();
        $ar = array('user_id','email','logged_in');
        $this->session->unset_userdata($ar);
        $this->session->set_flashdata('logout_success','You are logged out successfully!');
        redirect('login_c/index');
    }
    
}