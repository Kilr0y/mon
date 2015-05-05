<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        //loading cache by default
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        $this->load->library('general');
        $this->load->model('items');
    }

    public function index($maincat, $item_id ){
        $header = $this->general->get_header_array('item');
        $header['title'] = $this->config->item('site_title');
        switch ($maincat) {

            case CAT_MOVIES:
            case CAT_TV:
            case CAT_ANIME:

                if (!$this->config->item('cache_enabled') || !$page_str = $this->cache->get("movie_$item_id")) {

                    $data['movie'] = $this->items->get_movie_data($item_id);

                    $page_str['page'] = $this->load->view('items/movie', $data, true);
                }

                echo $this->load->view('header', $header, true);
                echo $page_str['page'];
                echo $this->load->view('footer', null, true);

                break;
        }
    }


}