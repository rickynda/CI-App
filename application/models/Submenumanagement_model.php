<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Submenumanagement_model extends CI_Model{

   
    public function tambahMenu(){
        $target = 1;
            $data =[
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'category_id' => $this->input->post('categoryid'),
                'icon' => $this->input->post('icon'),
                'target' => $this->input->post('target'),
                'is_active' => 1   

            ];
        $this->db->insert('user_sub_menu',$data);
    }

    public function hapusMenu($id){
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }


    public function editMenu(){
        $data=[
            "menu" => $this->input->post('menu', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    public function getMenubyId($id){
        return $this->db->get('user_sub_menu', ['id' => $id])->row_array();
    }
}