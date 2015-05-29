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

        $header = $this->general->get_header_array('favorite');
        $header['title'] = $this->config->item('site_title');

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        $data['cat'] = $maincat;
        if ($maincat)
            $data['favorites'] = $this->user->get_favorites_in_cat($user_id, $maincat);
        else
            $data['favorites'] = $this->user->get_favorites($user_id);

        $this->load->view('header', $header);
        $this->load->view('favorites', $data);
        $this->load->view('footer');
    }

    public function feedback(){
        if (empty($_SESSION['user_id']))
            show_404();

        $header = $this->general->get_header_array('favorite');
        $header['title'] = $this->config->item('site_title');

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        $this->load->model('torrents');
        $data['torrents'] = $this->torrents->get_nocomment_torrents($_SESSION['user_id']);

        $this->load->view('header', $header);
        $this->load->view('feedback', $data);
        $this->load->view('footer');

    }
}