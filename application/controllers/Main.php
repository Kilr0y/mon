<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //loading cache by default        
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        
        //taking session language
        $lang = $this->session->userdata('lang');
        if (!$lang) $lang = 'en';
        
        //loading library
        $this->lang->load('all', $lang);        
        
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
        $this->load->library('user_agent');
        $is_mobile = $this->agent->is_mobile();
        $data['is_mobile'] = $this->agent->is_mobile();
        $header = $this->general->get_header_array('latest');
        $header['title'] = $this->config->item('site_title');


        
        if (! $this->config->item('cache_enabled') || ! $page_str = $this->cache->get("latest-$is_mobile")){
        
            $this->load->model('torrents');
            $data['is_mobile'] = $is_mobile;

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

    public function hot($cat_id = 1){
        $this->load->library('general');
        $this->load->library('user_agent');
        $header = $this->general->get_header_array('hot');
        $header['title'] = $this->config->item('site_title');
        $page = $this->input->get('page') ? $this->input->get('page') : '1';
        $is_mobile = $this->agent->is_mobile();

        if (! $this->config->item('cache_enabled') || ! $page_str = $this->cache->get("hot_$cat_id-$page-$is_mobile")) {
            $this->load->model('items');
            $data['is_mobile'] = $is_mobile;
            $data['hots'] = $this->items->get_hotest($cat_id, $page);
            $data['cat'] = $cat_id;
            $maincat_name = $this->config->item('maincat_name');
            $data['catname'] = strtolower($maincat_name[$cat_id]);

            //building pagination
            $this->load->library('pagination');
            $pagination = $this->config->item('pagination');

            $pagination['base_url'] = site_url("hot/".$data['catname']);
            $pagination['total_rows'] = $this->items->get_hot_count($cat_id);;
            $pagination['per_page'] = $this->config->item('hot_per_page');
            $this->pagination->initialize($pagination);
            $data['pagination'] = $this->pagination->create_links();

            $page_str['page'] = $this->load->view('hot', $data, true);

            $this->cache->save("hot_$cat_id-$page", $page_str);
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
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
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
        $this->load->library('user_agent');
        $data = array();
        $data['is_mobile'] = $this->agent->is_mobile();
        $header = $this->general->get_header_array('subcategory');
        $header['title'] = $this->config->item('site_title'); 
        
        
        
        
        //Generating page data
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
    
    public function login_phpbb(){
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        define('IN_PHPBB', true);
        $phpbb_root_path = './forum/'; //the path to your phpbb relative to this script
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include("forum/config.php");
        include("forum/common.php"); //the path to your phpbb relative to this script
        
        // Start session management
        $user->session_begin();
        $auth->acl($user->data);
        $user->setup();
        
    
        $username = request_var('username', 'kilroy');
        $password = request_var('password', '');
    
        if(isset($username) )
        {
          $result=$auth->login($username, $password, true);
          if ($result['status'] == LOGIN_SUCCESS) {
            echo "You're logged in";
          } else {
            echo $user->lang[$result['error_msg']];
          }
        }
    }
    
    public function create_phpbb(){
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        define('IN_PHPBB', true);
        $phpbb_root_path = './forum/'; //the path to your phpbb relative to this script
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include("forum/config.php");
        include("forum/common.php"); //the path to your phpbb relative to this script
        include("forum/includes/functions_user.php");
        // Start session management
        $user->session_begin();
        $auth->acl($user->data);
        //$user->setup();
        $user_row = array(
            'username' => 'Kilroy',
            'user_password' => md5('password'), 
            'user_email' => 'Email',
            'group_id' => 2,
            'user_timezone' => '1.00',
            'user_dst' => 0,
            'user_lang' => en,
            'user_type' => 0,
            'user_actkey' => '',
            'user_dateformat' => 'd M Y H:i',
            'user_style' => $not_sure_what_this_is,
            'user_regdate' => time(),
        );
        
        $phpbb_user_id = user_add($user_row);
        
        if ($phpbb_user_id){
            echo 'User created';
        } else 
            echo 'User creation error';
     
     }   
    
    
}
