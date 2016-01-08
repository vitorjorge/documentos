<?php

class Site extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->is_logged_in();
    }
    
	function criar() {
        $data['main_content'] = 'criar';
        $this->load->view('includes/template_member', $data);
	}
    
    function create (){
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->criar();
        }
        else {
            $query = $this->site_model->add_record($data);
            $this->pedidos();
        }
    }
    
    function delete() {
        $this->site_model->delete_row();
        $this->pedidos();
    }
    
    function redirecionar() {
        $data['main_content'] = 'home';
        $this->load->view('includes/template', $data);
	}
    
    function pedidos() {
        $this->load->model('site_model');
        $data['rows'] = $this->site_model->getAll();
        
        $data['main_content'] = 'pedidos';
        $this->load->view('includes/template_member', $data);
    }
    
    function logout() {
        $this->session->sess_destroy();
        $this->redirecionar();
    }
    
    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true){ 
            $data['main_content'] = 'reservada';
            $this->load->view('includes/template', $data);
            die();
        }
    }
}

//$this->load->model('site_model');
//		$data['records'] = $this->site_model->getAll();
//		$this->load->view('home', $data);