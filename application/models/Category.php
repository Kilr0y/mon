<?php

class Category extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_categories(){
        
        $query = "SELECT * FROM categories ORDER BY name, subname";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;        
    }
    
    public function get_category_by_id($id){
        
        $query = "SELECT * FROM categories WHERE catid = \"$id\"";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;        
    }
    
    public function get_subcategory_by_id($id){        
        
        $query = "SELECT * FROM categories WHERE subid = \"$id\"";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;        
    }
    
    public function get_subcats_by_id($id){
        
        $query = "SELECT * FROM categories WHERE catid = \"$id\"";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data; 
    }
    
    public function get_subcat_by_name($segment){
        
        $query = "SELECT * FROM categories WHERE segment = \"$segment\"";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;
    }
    
    

}