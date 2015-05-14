<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Torrent extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //loading cache by default        
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        $this->load->library('general');
        //$this->output->enable_profiler(TRUE);
    }

    public function index($id = 0){
        //Generating header data
        $header = $this->general->get_header_array('torrent');        
        $header['title'] = $this->config->item('site_title');

        $this->load->library('user_agent');
        $data['is_mobile'] = $this->agent->is_mobile();
        
        
        //checking if torrent id is set
        if (empty($id)){
             ci_redirect(base_url());
        }
        
        //taking main torrent data
        $this->load->model('torrents');
        $torrent = $this->torrents->get_torrent_by_id($id);
        if (empty($torrent)){
            ci_redirect(base_url());
        }
        $data['torrent'] = $torrent;

        //check adult access
        if ($torrent['maincat'] == CAT_ADULT && !isset($_COOKIE['adult']))
            ci_redirect(site_url('torrent/adult_confirm/'.$id));



        //if this is movie torrent, taking related film data
        if (! empty($torrent['imdb_id'])){
            $this->load->model('movie');
            $movie = $this->movie->get_movie_by_id($torrent['imdb_id']);
            $data['movie'] = $movie;
            
            //taking movie screenshots
            $screenshots = $this->movie->get_screenshots($torrent['imdb_id']);
            $data['screenshots'] = $screenshots;
        }
        
        //need to find out, what category is this torrent in
        $this->load->model('category');
        $sub_id = $torrent['subcat'];        
        $data['category'] = $this->category->get_subcategory_by_id($sub_id);
        
        //taking some data for rating 
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $current_rating = ! empty($torrent['total_value']) ? $torrent['total_value'] : 0;
        $count = ! empty($torrent['total_votes']) ? $torrent['total_votes'] : 0;
        
        
        $voted = (! empty($torrent['used_ips']) && strpos($torrent['used_ips'], $data['ip']) !== false) ? true : false;      
        
        if ($count > 0){
            $caption = '(' . $count . ( $count == 1 ? ' vote' : ' votes' ) . ' cast)';
        } else {
            $caption = '';
        } 
        $data['rating']['caption'] = $caption;
        
        if (($this->config->item('rate_logged_in_only') && ! isset($_SESSION['logged_user'])) || $voted){
            $disabled = 'data-readonly="true"';
        } else {
            $disabled = '';
        }
        $data['rating']['disabled'] = $disabled;
        if ($current_rating && $count)
            $data['rating']['value'] = round($current_rating/$count);
        else
            $data['rating']['value'] = 0;
            
        
        //generating magnet link
        $data['magnet']  = 'magnet:?xt=urn:btih:' . strtoupper($this->general->base32_encode(pack("H*", $torrent['hash'])));  
        $data['magnet'] .= '&dn=' . $this->general->urltitle($torrent['torrentname']);
        $data['magnet'] .= $this->config->item('magnet_link');
            
            
        //TAKING RELATED TORRENTS
        $trimed_title = $this->general->trim_string($torrent['torrentname']);
        $related = $this->torrents->get_related_torrents($id, $trimed_title);
        $data['related'] = $related;
        
        $this->load->view('header', $header);
        $this->load->view('torrent', $data);
        $this->load->view('footer');
                
    }

    public function adult_confirm($id){
        //Generating header data
        $header = $this->general->get_header_array('torrent');
        $header['title'] = $this->config->item('site_title');

        $data['id'] = $id;

        $this->load->view('header', $header);
        $this->load->view('adult_confirm', $data);
        $this->load->view('footer');
    }

    public function set_adult_cockie($id = ''){
        setcookie('adult', 'true', time() + ($this->config->item('adult_coockie_live')), '/');
        if ($id)
            ci_redirect(site_url('torrent/'.$id));
        else
            ci_redirect(site_url('latest'));
    }

    
    public function download($id = ''){
        
        //searching torrent torrent data
        $this->load->model('torrents');
        $torrent = $this->torrents->get_torrent_by_id($id);
        if (empty($torrent)){
            die('Torrent id not found');
        }
        $file_path = 'torrent/'.date('Y-m-d', $torrent['added_time']).'-'.$torrent['folder_id'].'/'.$torrent['hash'].'.monova';
        if ( !file_exists($file_path)){
            die('File not found');
        }
        //building header and forcing download
        header("Content-Type: application/x-bittorrent");
		header("Content-Disposition: attachment; filename=\"MONOVA.ORG $torrent[torrentname].torrent\"");
		readfile($file_path);
        
    }
}
