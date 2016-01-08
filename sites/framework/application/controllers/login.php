<?php

class Login extends CI_Controller {
    
    function index() {
        $data['main_content'] = 'home';
        $this->load->view('includes/template', $data);
    }
    
    function login_form() {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }
    
    function pedidos() {
        $data['main_content'] = 'reservada';
        $this->load->view('includes/template', $data);
    }
    function criar() {
        $data['main_content'] = 'reservada';
        $this->load->view('includes/template', $data);
	}
    
    function validate_credentials() {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();
        
        if($query){ //se tiver os dados aprovados
            $data = array(
                'username' =>$this->input->post('username'),
                'is_logged_in' => true
            );
            
            $this->session->set_userdata($data);
            redirect('site/criar');
        } 
        else {
                $this->login_form();
        }
    }
    
    
    function signup() {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }
    
    function create_member() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'Primeiro Nome', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Ultimo Nome', 'trim|required');
        $this->form_validation->set_rules('email_adress', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_lenth[32]');
        $this->form_validation->set_rules('password2', 'Comfirmar Password', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->signup();
        }
        else {
            $this->load->model('membership_model');
            if($query = $this->membership_model->create_member()) {
                $data['main_content'] = 'signup_successful';
                $this->load->view('includes/template', $data);
            }
            else {
                $this->load->view('signup_form');
            }
        }
    }
}