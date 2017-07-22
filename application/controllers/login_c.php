<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login_c extends CI_Controller {
    
    public function index() {
        if($this->session->userdata('logged_in') == TRUE) {
            redirect('loggedin');
        }
        $this->load->view('login_v');
    }
    
    public function process() {
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error',validation_errors());
            redirect('login_c');
        }
        else {
            $this->load->model('login_m');
            $user_id = $this->login_m->login_user($email,$password);
            
            if($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'email'   => $email,
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success','You are now logged in.');
                redirect('loggedin');
            }
            else {
                redirect('login_c');
            }
        }
    }
    
}