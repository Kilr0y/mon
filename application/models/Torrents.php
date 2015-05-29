<?php

class Torrents extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_torrent_by_id($id){        
        
        //taking full torrent data in one call
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, r.used_ips, d.descr, UNIX_TIMESTAMP(t.added) as added_time
            FROM torrents t
            LEFT JOIN ratings r ON t.id = r.id
            LEFT JOIN description d ON t.id = d.id
            WHERE t.id = \"$id\"
        ";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data;
    }
    
    public function get_subcat_count($id, $verf = 1){
        
        $verified = '';
        if ($verf == '1'){            
            $verified = " AND verified = \"1\" ";
        }  
        
        $query = "SELECT count(id) as count FROM torrents WHERE subcat = \"$id\" $verified";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data['count'];
        
    }
    
    public function get_latest_category($cat_id, $verf = 1, $offset = 0, $limit = 0, $sort_val = '1'){
        
        if (empty($limit)) 
            $limit = $this->config->item('latest_per_category');  
            
        $sort = $this->_get_sort_string($sort_val); 
        
        
        $verified = '';
        if ($verf == '1'){            
            $verified = " AND verified = \"1\" ";
        }      
        
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, UNIX_TIMESTAMP(t.added) as added_time
            FROM torrents t
            LEFT JOIN ratings r ON t.id = r.id
            WHERE maincat = \"$cat_id\" $verified 
            $sort 
            LIMIT $offset, $limit";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;        
    }
    
    public function get_latest_subcategory($sub_id, $verf = 1, $offset = 0, $limit = 0, $sort_val = '1'){
        
        if (empty($limit)) 
            $limit = $this->config->item('category_per_page');  
            
        $sort = $this->_get_sort_string($sort_val); 

        $verified = '';
        if ($verf == '1'){            
            $verified = " AND verified = \"1\" ";
        }      
        
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, UNIX_TIMESTAMP(t.added) as added_time
            FROM torrents t
            LEFT JOIN ratings r ON t.id = r.id
            WHERE subcat = \"$sub_id\" $verified 
            $sort 
            LIMIT $offset, $limit";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;        
    }

    public function get_related_torrents($id, $title){
        
        $limit = $this->config->item('related_items_count');
        $verf = $this->config->item('related_verified_only') ? ' AND verified = "1" ' : '';
        
        $title = str_replace('@', '', $title);
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, UNIX_TIMESTAMP(t.added) as added_time,
                MATCH(torrentname) AGAINST ('+$title' IN BOOLEAN MODE) AS relevance 
            FROM `torrents` t
            LEFT JOIN ratings r ON t.id = r.id
            WHERE MATCH(torrentname) AGAINST ('+$title' IN BOOLEAN MODE)
                AND t.id <> \"$id\" $verf
            ORDER BY relevance DESC
            LIMIT $limit
        ";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
        
    }
    
    public function get_search($term, $cat, $verf = 1, $offset = 0, $limit = 0, $sort_val = '1'){
        
        $limit = $this->config->item('search_per_page');
        
        if (empty($cat)){
            $cat_str = '';
        } else {
            $cat_str = " AND maincat = \"$cat\"";
        }
        
        $verified = '';
        if ($verf == '1'){            
            $verified = " AND verified = \"1\" ";
        } 
        
        $sort = $this->_get_sort_string($sort_val);
        
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, UNIX_TIMESTAMP(t.added) as added_time,
                MATCH(torrentname) AGAINST ('$term' IN BOOLEAN MODE) AS relevance 
            FROM `torrents` t
            LEFT JOIN ratings r ON t.id = r.id
            WHERE MATCH(torrentname) AGAINST ('$term' IN BOOLEAN MODE)
                $cat_str $verified
            $sort
            LIMIT $offset, $limit
        ";
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
        
    }
    
    public function get_search_count($term, $cat, $verf = 1){
        
        if (empty($cat)){
            $cat_str = '';
        } else {
            $cat_str = " AND maincat = \"$cat\"";
        }
        
        $verified = '';
        if ($verf == '1'){            
            $verified = " AND verified = \"1\" ";
        } 
        
        $query = "
            SELECT count(t.id) as count
            FROM `torrents` t
            LEFT JOIN ratings r ON t.id = r.id
            WHERE MATCH(torrentname) AGAINST ('$term' IN BOOLEAN MODE)
                $cat_str $verified
            
        ";
        $result = $this->db->query($query);
        $data = $result->row_array();
        return $data['count'];
        
    }
    
    private function _get_sort_string($type){
        
        $sort = ' ORDER BY added DESC ';
        if ($type == '2'){
            $sort = ' ORDER BY torrentname DESC ';
        } elseif ($type == '3'){
            $sort = ' ORDER BY comments DESC ';
        } elseif ($type == '4'){
            $sort = ' ORDER BY rating DESC ';
        } elseif ($type == '5'){
            $sort = ' ORDER BY size DESC ';
        } elseif ($type == '6'){
            $sort = ' ORDER BY seeds DESC ';
        } elseif ($type == '7'){
            $sort = ' ORDER BY peers DESC ';
        } 
        return $sort;
        
    }

    public function trigger_favorites($user_id, $torrent_id){
        $user_id = (int)$user_id;
        $torrent_id = (int) $torrent_id;
        //chek torrent exist
        $result =$this->db
            ->where(array('id'=>$torrent_id))
            ->get('torrents');
        if ($result->num_rows() == 0) return 'error';

        $result =$this->db
            ->where(array('user_id'=>$user_id, 'torrent_id'=>$torrent_id))
            ->get('favorites');
        if ($result->num_rows() == 0){
            $this->db->insert('favorites', array('user_id'=>$user_id, 'torrent_id'=>$torrent_id));
            return 'added';
        } else {
            $this->db->delete('favorites', array('user_id'=>$user_id, 'torrent_id'=>$torrent_id));
            return 'deleted';
        }
        return 'error';
    }

    public function add_download_data($torrent_id, $user_id){
        $user_id = (int)$user_id;
        $torrent_id = (int) $torrent_id;
        //chek torrent exist
        $result =$this->db
            ->where(array('id'=>$torrent_id))
            ->get('torrents');
        if ($result->num_rows() == 0) return false;

        $this->db->insert('torrent_download', array(
            'user_id'       =>  $user_id,
            'torrent_id'    =>  $torrent_id,
            'added_time'    =>  time()
        ));

        //update feedback data
        $where = array(
            'user_id'=>$user_id,
            'torrent_id'=>$torrent_id);
        $result = $this->db->get_where('feedback', $where);
        if ($result->num_rows() == 0){
            $this->db->insert('feedback', $where + array('commented'=>0));
        }
        return true;
    }

    public function get_nocomment_torrents($user_id){
        $user_id = (int)$user_id;
        $query = "
            SELECT t.*, (IFNULL(CEIL(r.total_value / r.total_votes), 0)) as rating, r.used_ips, d.descr, UNIX_TIMESTAMP(t.added) as added_time
            FROM feedback f
            LEFT JOIN torrents t ON f.torrent_id = t.id
            LEFT JOIN ratings r ON t.id = r.id
            LEFT JOIN description d ON t.id = d.id
            WHERE f.commented = 0 AND f.user_id = \"$user_id\"
        ";

        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
    }


    

}