<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_404 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        
    }
    
    public function index (){
        $this->load->view('404');
    }
}