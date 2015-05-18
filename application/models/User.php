<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get user data by login
     *
     * @param $login    login str
     * @return mixed    return user data or false if not found
     */
    public function get_user_data($login){
        $login = strtolower($login);
        $this->db->where('login', $login);
        $result = $this->db->get('user');
        $data = $result->row_array();
        return $data;
    }
    
    public function get_user_data_by_id($id){
        $this->db->where('id', $id);
        $result = $this->db->get('user');
        $data = $result->row_array();
        return $data;
    }
    
    public function get_user_by_social($social_id, $social_type){
        $this->db->where('social_id', $social_id);
        $this->db->where('social_type', $social_type);
        $result = $this->db->get('user');
        $data = $result->row_array();
        return $data;
    }
    
    public function get_last_id(){
        $query = "SELECT id FROM `user` ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;
    }

    public function get_torrents($login){
        $this->db->select('t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, UNIX_TIMESTAMP(t.added) as added_time', FALSE);
        $this->db->where(array('verified_by'=>$login));
        $this->db->join('ratings as r', 't.id = r.id', 'left');
        $result = $this->db->get('torrents as t');
        $data = $result->result_array();
        return $data;
    }

}