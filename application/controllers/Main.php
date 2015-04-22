<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //loading cache by default        
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        
        /*
        $this->load->driver('cache', array('adapter'=>'xcache'));
        
        var_dump($this->cache->xcache->is_supported());
        
        $foo = $this->cache->get('foo');
        
        if (! $foo){
            $this->cache->save('foo', array(0 => 'Hello world!'));
        }
        
        var_dump($foo);
        die();
        
        */
        
        //$this->output->enable_profiler(TRUE);
    }

	public function index()
	{     
        //Generating header data
        $this->load->library('general');
        $header = $this->general->get_header_array('index');
        $header['title'] = $this->config->item('site_title');        
                
        
        $this->load->view('header', $header);
        $this->load->view('index');
        $this->load->view('footer');
	}
    
    public function latest(){
        $this->load->library('general');
        $header = $this->general->get_header_array('latest');
        $header['title'] = $this->config->item('site_title');
        
        
        
        if (! $this->config->item('cache_enabled') || ! $page_str = $this->cache->get('latest')){
        
            $this->load->model('torrents');
            
            //taking movie list
            $data['movies'] = $this->torrents->get_latest_category(1, 1);
            $data['tv']     = $this->torrents->get_latest_category(8, 1);
            $data['music']  = $this->torrents->get_latest_category(3, 1);            
            $data['soft']   = $this->torrents->get_latest_category(5, 1);
            $data['games']  = $this->torrents->get_latest_category(4, 1);
            
            
            $page_str['page'] = $this->load->view('latest', $data, true);
            
            $this->cache->save('latest', $page_str);
        }
        
        echo $this->load->view('header', $header, true);
        echo $page_str['page'];        
        echo $this->load->view('footer', null, true);        
    }
    
    public function category($cat_id = 0){
        
        //Generating header data
        $this->load->library('general');
        $header = $this->general->get_header_array('category');
        $header['title'] = $this->config->item('site_title'); 
        
        $data = array();
        $this->load->model('category');
        $data['subcats'] = $this->category->get_subcats_by_id($cat_id);
        
        //taking current category data
        foreach ($data['subcats'] as $k=>$v){
            if ($v['catid'] == $cat_id){
                $data['category'] = $v;
                break;
            }
        }
        
        
        
        $this->load->view('header', $header);
        $this->load->view('category', $data);
        $this->load->view('footer');
        
    }
    
    public function subcategory($id){
        
        //Generating header data
        $this->load->library('general');
        $header = $this->general->get_header_array('subcategory');
        $header['title'] = $this->config->item('site_title'); 
        
        
        
        
        //Generating page data
        $data = array();
        $this->load->model('category');
        
        $data['category'] = $this->category->get_subcategory_by_id($id);
        
        //taking main page data
        $sort = $this->input->get('sort') ? $this->input->get('sort') : '1';
        $page = $this->input->get('page') ? $this->input->get('page') : '1';
        $verf = isset($_GET['verified']) ? (int)$_GET['verified'] : '1';
                
        
        
        
       
        $this->load->model('torrents');
        
        $offset = ($page - 1) * $this->config->item('category_per_page');
        //$data['torrents'] = $this->torrents->get_latest_category($id, $verf, $offset, $this->config->item('category_per_page'), $sort);
        $data['torrents'] = $this->torrents->get_latest_subcategory($id, $verf, $offset, $this->config->item('category_per_page'), $sort);
        $data['page'] = $page;
        $data['sort'] = $sort;
        $data['verf'] = $verf;
        
        
        
        //taking count of torrents
        $total_rows = $this->torrents->get_subcat_count($id, $verf);
        
        
        
        $this->load->library('general');
        
        
        //building pagination
        $this->load->library('pagination');
        
        $pagination = $this->config->item('pagination');

        $pagination['base_url'] = site_url(strtolower($data['category']['name']) . '/' . strtolower($data['category']['subname'])) . "?sort=$sort&verified=$verf";
        $pagination['total_rows'] = $total_rows;
        $pagination['per_page'] = $this->config->item('category_per_page');
        
        
        
        
        $this->pagination->initialize($pagination);
        
        $data['pagination'] = $this->pagination->create_links();
        
        
        
        
        $this->load->view('header', $header);
        $this->load->view('subcategory', $data);
        $this->load->view('footer');
        
    }
    
    public function subcats(){
        
        $this->load->model('category');
        $cats = $this->category->get_all_categories();
        
        foreach ($cats as $k=>$v){
            
            echo '$route["' . strtolower($v['name']) . '/' . $v['segment'] . '"] = "main/subcategory/'.$v['subid'].'";' . "<br />";
            
        }
        
    }
    
    
}
