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

        $header = $this->general->get_header_array('torrent');
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
}