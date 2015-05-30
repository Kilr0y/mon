<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('general');
    }
    
    
    public function index($login = 0){
        if (empty($login)){
            if (! empty($_SESSION['user_login']))
                $login = $_SESSION['user_login'];
            else                
                show_404();
        }

        $header = $this->general->get_header_array('users');
        $header['title'] = $this->config->item('site_title');

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['login'] = $login;
        $data['is_mobile'] = $this->agent->is_mobile();        
        $data['torrents'] = $this->user->get_torrents($login);

        $this->load->view('header', $header);
        $this->load->view('user', $data);
        $this->load->view('footer');

    }

    public function bookmarks($maincat = 0){
        if (empty($_SESSION['user_id']))
            show_404();

        $user_id = $_SESSION['user_id'];

        $page = empty($_GET['page']) ? 1 : (int)$_GET['page'] ;

        $header = $this->general->get_header_array('favorite');
        $header['title'] = $this->config->item('site_title');

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        $data['cat'] = $maincat;
        if ($maincat) {
            $data['favorites'] = $this->user->get_favorites_in_cat($user_id, $maincat, $this->config->item('bookmarks_per_page'), $page);
            $this->load->library('pagination');
            $pagination = $this->config->item('pagination');

            $pagination['base_url'] = site_url("bookmarks/".strtolower($this->config->item('maincat_name')[$maincat]));
            $pagination['total_rows'] = $this->user->get_favorites_count($_SESSION['user_id'], $maincat);
            $pagination['per_page'] = $this->config->item('bookmarks_per_page');
            $this->pagination->initialize($pagination);
            $data['pagination'] = $this->pagination->create_links();
        }
        else {
            $data['favorites'] = $this->user->get_favorites($user_id);
            $data['pagination'] = '';
        }

        //building pagination


        $this->load->view('header', $header);
        $this->load->view('favorites', $data);
        $this->load->view('footer');
    }

    public function feedback(){
        if (empty($_SESSION['user_id']))
            show_404();

        $header = $this->general->get_header_array('favorite');
        $header['title'] = $this->config->item('site_title');

        $page = empty($_GET['page']) ? 1 : (int)$_GET['page'] ;

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        $this->load->model('torrents');
        $data['torrents'] = $this->torrents->get_nocomment_torrents($_SESSION['user_id'], $page);

        //building pagination
        $this->load->library('pagination');
        $pagination = $this->config->item('pagination');

        $pagination['base_url'] = site_url("feedback");
        $pagination['total_rows'] = $this->torrents->get_nocomment_torrents_count($_SESSION['user_id']);
        $pagination['per_page'] = $this->config->item('feedback_per_page');
        $this->pagination->initialize($pagination);
        $data['pagination'] = $this->pagination->create_links();


        $this->load->view('header', $header);
        $this->load->view('feedback', $data);
        $this->load->view('footer');

    }
}