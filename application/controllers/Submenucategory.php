<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenucategory extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        
    }
    
    public function index (){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title']= 'SubMenu Management';

        $this->load->model('Menu_model', 'menu');
        $data['subMenuCategory'] = $this->menu->getSubMenuCategory();
        $data['menu'] = $this->db->get('user_sub_menu_category')->result_array();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('submenucategory/submenucategory');
        $this->load->view('template/footer');
    }

}