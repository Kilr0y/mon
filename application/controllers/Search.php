<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //loading cache by default        
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        $this->load->library('general');
        //$this->output->enable_profiler(TRUE);
    }

    public function index(){
        
        $header = $this->general->get_header_array('search');
        $header['title'] = $this->config->item('site_title');
        
        $term = trim($this->input->get('term'));
        
        //taking main page data
        $sort = $this->input->get('sort') ? $this->input->get('sort') : '1';
        $page = $this->input->get('page') ? $this->input->get('page') : '1';
        $verf = isset($_GET['verified']) ? (int)$_GET['verified'] : '1';
        $cat  = $this->input->get('cat');
        $data['page'] = $page;
        $data['sort'] = $sort;
        $data['verf'] = $verf;
        $data['cat']  = $cat;
        
        $data['term'] = $term;
        if (empty($term)){
            //search term is empty
        } else {
            
        }
        
        //TAKING TORRENTS DATA
        $this->load->model('torrents');
        $offset = ($page - 1) * $this->config->item('search_per_page');
        $torrents = $this->torrents->get_search($term, $cat, $verf, $offset, $this->config->item('search_per_page'), $sort );
        $data['torrents'] = $torrents;
        
        //TAKING COUNT OF TORRENTS
        if (! empty($torrents)){
            $data['torrents_count'] = $this->torrents->get_search_count($term, $cat, $verf);
        } else {
            $data['torrents_count'] = 0;
        }
                
        
        //building pagination
        $this->load->library('pagination');        
        $pagination = $this->config->item('pagination');

        $pagination['base_url'] = site_url("search?term=$term&cat=$cat&sort=$sort&verified=$verf");
        $pagination['total_rows'] = $data['torrents_count'];
        $pagination['per_page'] = $this->config->item('search_per_page');        
        $this->pagination->initialize($pagination);        
        $data['pagination'] = $this->pagination->create_links();
        
        //Generating category filters
        $data['links'] = array(
            'search-all' =>         site_url("search?term=$term&page=$page&sort=$sort&verified=$verf"),
            'search-movies' =>      site_url("search?term=$term&cat=1&page=$page&sort=$sort&verified=$verf"),
            'search-tv' =>          site_url("search?term=$term&cat=8&page=$page&sort=$sort&verified=$verf"),
            'search-anime' =>       site_url("search?term=$term&cat=6&page=$page&sort=$sort&verified=$verf"),
            'search-music' =>       site_url("search?term=$term&cat=3&page=$page&sort=$sort&verified=$verf"),
            'search-books' =>       site_url("search?term=$term&cat=7&page=$page&sort=$sort&verified=$verf"),
            'search-games' =>       site_url("search?term=$term&cat=4&page=$page&sort=$sort&verified=$verf"),
            'search-soft' =>        site_url("search?term=$term&cat=5&page=$page&sort=$sort&verified=$verf"),
            'search-verf' =>        site_url("search?term=$term&cat=$cat&page=$page&sort=$sort&verified=1"),
            'search-not-verf' =>    site_url("search?term=$term&cat=$cat&page=$page&sort=$sort&verified=0"),
            'sort_by_date' =>       site_url("search?term=$term&cat=$cat&page=$page&sort=1&verified=$verf"),
            'sort_by_name' =>       site_url("search?term=$term&cat=$cat&page=$page&sort=2&verified=$verf"),
            'sort_by_comments' =>   site_url("search?term=$term&cat=$cat&page=$page&sort=3&verified=$verf"),
            'sort_by_rating' =>     site_url("search?term=$term&cat=$cat&page=$page&sort=4&verified=$verf"),
            'sort_by_size' =>       site_url("search?term=$term&cat=$cat&page=$page&sort=5&verified=$verf"),
            'sort_by_seeds' =>      site_url("search?term=$term&cat=$cat&page=$page&sort=6&verified=$verf"),
            'sort_by_peers' =>      site_url("search?term=$term&cat=$cat&page=$page&sort=7&verified=$verf"),
        );
        
        
        $this->load->view('header', $header);
        $this->load->view('search', $data);
        $this->load->view('footer');
        
        
        
    }
}
