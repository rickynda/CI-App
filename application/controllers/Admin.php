<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

       public function index(){
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['title'] = 'Dashboard';
         $this->load->view('template/header', $data);
         $this->load->view('template/sidebar');
         $this->load->view('template/topbar');
         $this->load->view('admin/index');
         $this->load->view('template/footer');
       }

       
    }