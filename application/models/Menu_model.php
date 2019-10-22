<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getSubMenuCategory(){
       
        $query= "SELECT * 
        FROM `user_sub_menu_category` JOIN `user_sub_menu`
        ON `user_sub_menu_category`.`category_id` = `user_sub_menu`.`category_id`
        WHERE `user_sub_menu_category`.`category_id`= `user_sub_menu`.`category_id`
        AND `user_sub_menu_category`.`is_activee`=1 
        ORDER BY `user_sub_menu_category`.`category_id` ASC";

        return $this->db->query($query)->result_array();
    }

    
}