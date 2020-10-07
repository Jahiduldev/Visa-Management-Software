<?php

class Permission_Model extends CI_Model {

    public function  __construct() {
        parent::__construct();
    }
    
    public function getPermissionMenu() {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('subs_menu', 'menu.menu_id = subs_menu.menu_id');
        $query = $this->db->get();
        return  $query->result();
    }

}
?>
