<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){
        $this->load->view('template/auth_header');
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');

    }
    public function register(){
        $this->load->view('template/auth_header');
        $this->load->view('auth/register');
        $this->load->view('template/auth_footer');
    }
}