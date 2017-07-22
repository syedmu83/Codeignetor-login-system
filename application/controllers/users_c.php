<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class users_c extends CI_Controller {
    
    public function index() {
        $this->load->model('users_m'); 
        $data['users']=$this->users_m->get_users();
        $this->load->view('users_v', $data);
    }
    
    public function show($id) {
        $this->load->model('users_m'); 
        $data['users']=$this->users_m->get_users($id);
        $this->load->view('users_v', $data);
    }
    
    public function edit($id) {
        $this->load->model('users_m'); 
        $data['users']=$this->users_m->get_users($id);
        $this->load->view('edit_user_v', $data);
    }
    
    public function edit_process() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        
        $user_id = $this->input->post('user_id');
        
        $user = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone
        );
        
        $this->form_validation->set_rules('name','Name','required|min_length[6]');
        $this->form_validation->set_rules('email','Email','required|valid_email|callback_edit_check_avail');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error',validation_errors('<p class="alert alert-danger">'));
            redirect('users_c/edit/'.$user_id);
        }
        else {
            $this->load->model('users_m');
            $call = $this->users_m->update_user($user,$user_id);
            
            if($call) {
                $this->session->set_flashdata('edit_success','User data successfully updated!');
                redirect('users_c');
            }
            else {
                redirect('users_c');
            }
        }
        
    }
    
    public function delete($id) {
        $this->load->model('users_m');
        $s = $this->users_m->delete_user($id);
        
        if($s) {
            $this->session->set_flashdata('edit_success','User successfully deleted!');
                redirect('users_c');
        }
        else {
            $this->session->set_flashdata('error','Some error occurred. Please try again!');
                redirect('users_c');
        }
    }
    
    public function edit_check_avail() {
        $email = $this->input->post('email');
        $id = $this->input->post('user_id');
        $this->load->model('users_m');
        $emailcheck = $this->users_m->editemailcheck($email,$id);
        
        if($emailcheck){
            $this->form_validation->set_message('edit_check_avail', 'The '.$email.' already exists');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    public function delete_multi(){
        $u_ids = $this->input->post('ids');
        $u_ids = implode(',',$u_ids);
        $this->load->model('users_m');
        $s = $this->users_m->delete_multi_user($u_ids);
        if($s) {
            $this->session->set_flashdata('edit_success','Selected users deleted successfully!');
                redirect('users_c');
        }
        else {
            $this->session->set_flashdata('error','Some error occurred. Please try again!');
                redirect('users_c');
        }
    }
    
}