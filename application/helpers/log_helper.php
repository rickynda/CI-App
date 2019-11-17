<?php 
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    
    }
    
}
function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function isadmin(){
    
    $ci = get_instance();
    $role = $ci->session->userdata('role_id');
    $query = "
            SELECT `user_access_menu`.`role_id`
            FROM `user_access_menu`
            WHERE `user_access_menu`.`menu_id` = 1 
    ";
    $hasil = $ci->db->query($query)->result_array();
  
   
    if (!in_array($role, array_column($hasil, 'role_id'))) {
       redirect('404');
    }
    
}
