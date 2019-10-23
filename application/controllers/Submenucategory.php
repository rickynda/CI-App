<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenucategory extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Subcategory_model');
        
    }
    
    public function index (){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'Category Management';

        $this->load->model('Menu_model', 'menu');
        $data['subMenuCategory'] = $this->menu->getSubMenuCategory();
        $data['menu'] = $this->db->get('user_sub_menu_category')->result_array();

        $this->form_validation->set_rules('title', 'Category Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if($this->form_validation->run()==false ){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('submenucategory/submenucategory');
            $this->load->view('template/footer');
        }else{
            $this->Subcategory_model->addCategory();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('submenucategory');
        }
        
    }

}