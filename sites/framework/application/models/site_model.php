<?php

class Site_model extends  CI_Model {
    
    function getAll(){
        $this->db->select('id, title, author, content');
        $this->db->from('data');
        
        $q = $this->db->get();
        
        if ($q->num_rows()>0) {
            foreach ($q->result() as $row){
                $data[] = $row;
            }        
            return $data;
        }
    }
    
    function add_record($data) {
        $this->db->insert('data', $data);
        return;
    }
    
    function delete_row() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('data');
    }
}