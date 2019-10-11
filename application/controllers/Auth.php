<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){
        $data['title']='Login Page';
        $this->load->view('template/auth_header',$data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');

    }
    public function register(){
        $data['title']='Register Page';
        $this->load->view('template/auth_header',$data);
        $this->load->view('auth/register');
        $this->load->view('template/auth_footer');
    }
}