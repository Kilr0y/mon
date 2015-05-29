<?php

class Comments extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_torrent_comments($torrent_id){
        $query = "SELECT * FROM torrent_comment WHERE torrent_id = \"$torrent_id\" ORDER BY added_time DESC";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
    }
    
    public function get_torrent_likes($torrent_id, $user_id){
        $query = "SELECT * FROM torrent_comment_likes WHERE torrent_id = \"$torrent_id\" AND user_id = \"$user_id\"";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
    }
    
    public function set_inc_like_comment($torrent_id, $comment_id){
        $query = "UPDATE torrent_comment SET likes = likes + 1 WHERE torrent_id = \"$torrent_id\" && comment_id = \"$comment_id\"";
        $result = $this->db->query($query);
        return true;
    }
    
    public function set_inc_dislike_comment($torrent_id, $comment_id){
        $query = "UPDATE torrent_comment SET dislikes = dislikes + 1 WHERE torrent_id = \"$torrent_id\" && comment_id = \"$comment_id\"";
        $result = $this->db->query($query);
        return true;
    }
    
    public function set_dec_like_comment($torrent_id, $comment_id){
        $query = "UPDATE torrent_comment SET likes = likes - 1 WHERE torrent_id = \"$torrent_id\" && comment_id = \"$comment_id\"";
        $result = $this->db->query($query);
        return true;
    }
    
    public function set_dec_dislike_comment($torrent_id, $comment_id){
        $query = "UPDATE torrent_comment SET dislikes = dislikes - 1 WHERE torrent_id = \"$torrent_id\" && comment_id = \"$comment_id\"";
        $result = $this->db->query($query);
        return true;
    }
    
    
}