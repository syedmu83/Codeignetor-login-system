<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class custom_validation extends CI_Form_validation {
    
    function check_avail($email) {
        $this->CI->form_validation->set_message('check_avail', 'The %s is already exists');
        return FALSE;
    }
    
}