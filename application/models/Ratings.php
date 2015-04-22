<?php

class Ratings extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_rating_by_id($id){
        
        $query = "SELECT * FROM ratings WHERE id = \"$id\"";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;
        
    }
    
    public function create_rating_record($arr){
        
        $insert = $this->db->insert('ratings', $arr);
        return $insert;
        
    }
    
    public function update_rating_record($id, $update){
        
        $this->db->where('id', $id);
        $this->db->update('ratings', $update);        
        return true;
        
    }
    

}