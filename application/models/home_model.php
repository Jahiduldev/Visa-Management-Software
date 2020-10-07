<?php
class Home_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function loginCheck($user_name, $password) {
        $this->db->select('*');
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $password);
      //  $this->db->where('status', '1');
        $userinfo = $this->db->get('user');
        return $userinfo;
    }

}
