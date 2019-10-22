<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menumanagement extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Menumanagement_model');
        
        
    }
    
    public function index (){
        $data['title']= 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'Required');
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/menumanagement');
            $this->load->view('template/footer');
        }else{
            $this->Menumanagement_model->tambahMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menumanagement');
        }
    }
    
    public function edit($id){
        $data['title']= ' Edit Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        

        $this->form_validation->set_rules('menu', 'Menu', 'Required');
        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/editmenu',$data);
            $this->load->view('template/footer');
        }else{
            $this->Menumanagement_model->editMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu Updated!</div>');
            redirect('menumanagement');
        }

    }
    public function delete($id){
        $this->Menumanagement_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Deleted!</div>');
            redirect('menumanagement');
    }
        

}