<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_movie_by_id($imdb_id){
        
        $this->db->where('imdb_id', $imdb_id);
        $result = $this->db->get('movie');
        $data = $result->row_array();
        $data['trailer_imdb'] = explode('?',$data['trailer_imdb'])[0];
        return $data;
                
    }
    
    public function get_screenshots($imdb_id){
        
        $this->db->where('imdb_id', $imdb_id);
        $result = $this->db->get('movie_screenshot');
        $data = $result->result_array();
        return $data;
        
    }
}
