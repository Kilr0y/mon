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

}