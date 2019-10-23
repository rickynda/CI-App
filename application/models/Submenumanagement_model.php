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
                'is_active' => 0   

            ];
        $this->db->insert('user_sub_menu',$data);
    }

    public function hapusMenu($id){
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }


    public function editsubMenu(){
        $isi=[
            'menu_id' => $this->input->post('menu_id'),
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('categoryid'),
            'target' => $this->input->post('target'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('isactive')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $isi);
        
    }

   
}