<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenumanagement extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
    }
    
    public function index (){
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'SubMenu Management';
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('categoryid', 'CategoryID', 'required|is_unique[user_sub_menu.category_id]', [
            'is_unique' => 'Try different CategoryID!'
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('submenumanagement');
            $this->load->view('template/footer');
        }else{
            $target = 1;
            $data =[
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'category_id' => $this->input->post('categoryid'),
                'icon' => $this->input->post('icon'),
                'target' => $this->input->post('target'),
                'is_active' => 1   

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('submenumanagement');

        }

        
       
    }  

    public function delete($id){
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu deleted!</div>');
            redirect('submenumanagement');
        
    }

    
    
}