<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('general');
    }
    public function index($login=0){
        if (empty($login)){
            if (!empty($_SESSION['user_login']))
                $login = $_SESSION['user_login'];
            else
                show_404();
        }

        $header = $this->general->get_header_array('users');
        $header['title'] = $this->config->item('site_title');

        $this->load->model('user');
        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        $data['user'] = $this->user->get_user_data($login);
        if (empty($data['user']))
            show_404();
        $data['torrents'] = $this->user->get_torrents($login);

        $this->load->view('header', $header);
        $this->load->view('user', $data);
        $this->load->view('footer');

    }

    public function favorites($maincat = 0){
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
}