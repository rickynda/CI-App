<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Subcategory_model extends CI_Model{

    public function addCategory(){
        $data = [
            'category_id' => $this->input->post('categoryid'),
            'category_title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'is_activee' => 0
            ];

            $this->db->insert('user_sub_menu_category', $data);
    }
}