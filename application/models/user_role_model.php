<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Role_Model
 *
 * @author asad
 */
class User_Role_Model extends CI_Model {
    
     public function __construct() {
        parent::__construct();
    }

    public function insertData($table_name,$data) {
    return $this->db->insert($table_name, $data);
    }

     public function getData($table_name) {
    return $this->db->get($table_name);
    }

}
?>
