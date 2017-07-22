<?php 

class loggedin extends CI_Controller {
    
    public function index(){
        if($this->session->userdata('logged_in') == FALSE) {
            $this->session->set_flashdata('error','<p class="alert alert-danger">Please login to view this page.</p>');
            redirect('login_c');
            exit;
        }
        $this->load->model('loggedin_m');
        $userid = $this->session->userdata('user_id');
        $user = $this->loggedin_m->getuserdata($userid);
        $this->load->view('loggedin_v',$user);
    }
}