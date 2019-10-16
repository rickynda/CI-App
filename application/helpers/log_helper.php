<?php 
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(2);
        $queryMenu = $ci->db->get_where('user_page', ['page' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_page', [
            'role_id' => $role_id,
            'page_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
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