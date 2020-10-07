<?php

class Common_Model extends CI_Model {
    public  function  __construct() {
        parent::__construct();
    }

    public function insertData($table_name,$data) {
        return $this->db->insert($table_name, $data);
    }



    public function updateData($table_name,$data,$column_name,$column_value) {
        $this->db->where($column_name, $column_value);
        return  $this->db->update($table_name, $data);
    }



    public function updateData2($table_name,$data,$column_name,$column_value,$column_name2,$column_value2) {
        $this->db->where($column_name, $column_value);
        $this->db->where($column_name2, $column_value2);
        return  $this->db->update($table_name, $data);
    }



    public function insertDataGetId($table_name,$data) {
        $this->db->insert($table_name, $data);
        return  $this->db->insert_id();
    }



    public function getData($table_name) {
        $query= $this->db->get($table_name);
        return $query->result();
    }
    
      public function getDataOrderBy($table_name,$column_name,$order) {
      $this->db->order_by($column_name, $order); 
        $query= $this->db->get($table_name);
        return $query->result();
    }



    public function getDataWhere($table_name,$column_name,$column_value) {
        $this->db->where($column_name, $column_value);
        $query= $this->db->get($table_name);
        return $query->result();
    }

   public function getDataWhere2($table_name,$column_name,$column_value,$column_name2,$column_value2) {
        $this->db->where($column_name, $column_value);
         $this->db->where($column_name2, $column_value2);
        $query= $this->db->get($table_name);
        return $query->result();
    }

    public function joinDataWhere($table_name1,$table_name2,$column_name1,$column_name2,$column_name3,$column_value) {
        $this->db->select('*');
        $this->db->from($table_name1);
        $this->db->join($table_name2,$table_name1.".".$column_name1 ."=".$table_name2.".".$column_name2);
        $this->db->where($column_name3,$column_value);
        $query= $this->db->get();
        return $query->result();
    }




    public function deleteData($table_name,$column_name,$column_value) {
        $this->db->where($column_name, $column_value);
        return $this->db->delete($table_name);

    }


    public function joinData($table_name1,$table_name2,$column_name1,$column_name2,$join) {
        $this->db->select('*');
        $this->db->from($table_name1);
        $this->db->join($table_name2, $column_name1 =$column_name2,$join);
        $query = $this->db->get();
         return $query->result();
    }


}
?>
