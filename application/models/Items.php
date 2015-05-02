<?php

class Items extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_hotest($cat_id = 1, $limit = 0){
        if (empty($limit))
            $limit = $this->config->item('hot_per_page');

        switch ($cat_id){
            case CAT_MOVIES:
            case CAT_ANIME:
            case CAT_TV:
                $query = "
                    SELECT h.position, m.title, m.poster, m.id
                    FROM hot h
                    JOIN movie m ON h.item_id = m.id
                    WHERE h.maincat = \"$cat_id\"
                    ORDER BY h.position
                    LIMIT 0, $limit";
                break;
        }
        $result = $this->db->query($query);
        $data = $result->result_array();
        return $data;
    }

    public function get_movie_data($item_id){

        $result = $this->db->get_where('movie', array('id'=>$item_id));
        $data = $result->row_array();

        $this->load->model('movie');
        $data['screenshots'] = $this->movie->get_screenshots($data['imdb_id']);

        //TAKING RELATED TORRENTS
        $this->load->model('torrents');
        $this->load->library('general');
        $trimed_title = $this->general->trim_string($data['title']);
        $related = $this->torrents->get_related_torrents(0, $trimed_title);
        $data['related'] = $related;

        return $data;
    }

}