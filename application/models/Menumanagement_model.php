<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Menumanagement_model extends CI_Model{

    public function getAllmenu(){
        return $this->db->get('user_menu')->result_array();
    }
    public function tambahMenu(){
        $data=[
            "menu" => $this->input->post('menu', true)
        ];
        $this->db->insert('user_menu',$data);
    }

    public function hapusMenu($id){
        $this->db->delete('user_menu', ['id' => $id]);
    }


    public function editMenu(){
        $data=[
            "menu" => $this->input->post('menu', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getMenubyId($id){
        return $this->db->get('user_menu', ['id' => $id])->row_array();
    }
}