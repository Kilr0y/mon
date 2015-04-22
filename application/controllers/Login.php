<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        //loading cache by default
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));

        $this->output->enable_profiler(TRUE);
    }

    public function index(){

    }
}