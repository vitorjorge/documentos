<?php

class Data_model extends CI_MODEL {
    
  /*  function getAll(){
        $q = $this->db->query("SELECT * FROM data");
        if($q->num_rows() > 0){
            foreach($q->result() as $row){
                $data[] = $row;    
            }
            return $data;
        }
    }
    
    function getAll(){
        $q = $this->db->get('data');
        if ($q->num_rows()>0) {
            foreach ($q->result() as $row){
                $data[] = $row;
            }        
            return $data;
        }
    }
    
    function getAll(){
        $this->db->select('title, content');
        $q = $this->db->get('data');
        
        if ($q->num_rows()>0) {
            foreach ($q->result() as $row){
                $data[] = $row;
            }        
            return $data;
        }
    }
    
    function getAll(){
        $sql =  "SELECT title, author, content FROM data WHERE id = ? AND author = ?";
        $q = $this->db->query($sql, array(2, 'Vitor'));
        
        if ($q->num_rows()>0) {
            foreach ($q->result() as $row){
                $data[] = $row;
            }        
            return $data;
        }
    }
    */
    
}