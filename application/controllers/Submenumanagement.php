<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenumanagement extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        isadmin();
        $this->load->model('Submenumanagement_model');
    }
    
    public function index (){
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'SubMenu Management';
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('target', 'Attribute JS', 'required');
        $this->form_validation->set_rules('categoryid', 'CategoryID', 'required|is_unique[user_sub_menu.category_id]', [
            'is_unique' => 'Try different CategoryID!'
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('submenu/submenumanagement');
            $this->load->view('template/footer');
        }else{
            $this->Submenumanagement_model->tambahMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('submenumanagement');

        }

        
       
    }  

    public function delete($id){
        $this->Submenumanagement_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu deleted!</div>');
            redirect('submenumanagement');
        
    }

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'Edit SubMenu Management';
        $this->load->model('Menu_model', 'menu');
        $data['subMenuu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('target', 'Attribute JS', 'required');
        
        $this->form_validation->set_rules('icon', 'icon', 'required');
        

        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('submenu/editsubmenu');
            $this->load->view('template/footer');
        }else{
           
           $this->Submenumanagement_model->editsubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('submenumanagement');
            }
        }

        

    
    
}