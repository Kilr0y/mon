<?php

class Search extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    
    public function getSearchSuggestions($q){
        
        $q = trim($q);
        
        $this->load->database();
                
        $query = "SELECT search FROM search WHERE search LIKE \"%$q%\"";
        $result = $this->db->query($query);
        $data = $result->result_array();
        $return_data = array();
        foreach ($data as $v){
            $return_data[] = strtolower($v['search']);
        }
        
        return $return_data;
        
    }

}