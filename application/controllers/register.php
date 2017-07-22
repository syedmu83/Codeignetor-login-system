<?php 

class Register extends CI_Controller {
    
    public function index(){
        $this->load->view('register_v');
    }
    
    public function process(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        
        $user = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone
        );
        
        
        $this->form_validation->set_rules('name','Name','required|min_length[6]');
        $this->form_validation->set_rules('email','Email','required|valid_email|callback_check_avail['.$email.']');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('con_password','Confirm Password','required|min_length[6]|matches[password]');
        
        
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error',validation_errors('<p class="alert alert-danger">'));
            redirect('register');
        }
        else {
            $this->load->model('register_m');
            $call = $this->register_m->register_user($user);
            
            if($call) {
                
                $this->session->set_flashdata('register_success','You are successfully registered. You can login now!'.anchor('login_c', 'Login Here!'));
                redirect('register');
            }
            else {
                redirect('register');
            }
        }
        
    }
    
    public function check_avail($email) {
        
        $this->load->model('register_m');
        $emailcheck = $this->register_m->emailcheck($email);
        
        if($emailcheck){
            $this->form_validation->set_message('check_avail', 'The '.$email.' already exists');
            return FALSE;
        }
        else {
            return TRUE;
        }
        
    }
}