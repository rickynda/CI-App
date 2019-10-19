<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menumanagement extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        
    }
    
    public function index (){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'Required');
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menumanagement');
            $this->load->view('template/footer');
        }else{
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">New menu added, dont forget to configure your Controller & View </div>');
            redirect('menumanagement');
        }
    }
    
        

}