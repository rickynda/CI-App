<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run()==false){
            $data['title']='Login Page';
        $this->load->view('template/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
        }else{
            echo "Berhasil";
        }
        

    }
    public function register(){
        $data['title']='Register Page';
        $this->load->view('template/auth_header',$data);
        $this->load->view('auth/register');
        $this->load->view('template/auth_footer');
    }
}