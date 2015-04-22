<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        //$this->output->enable_profiler(TRUE);
        $this->load->library('rss_writter', null, 'rssw');
        $this->load->library('general');
    }
    
    public function category($id = ''){
        $this->_build_rss('category', $id);
    }
    
    public function subcategory($id = ''){
        $this->_build_rss('subcategory', $id);
    }

    private function _build_rss($type, $id = ''){
        if (empty($id) || empty($type)) die('Category or id not set');
        
        //lets check, if we have this category 
        $this->load->model('category');
        $this->load->model('torrents'); 
        
        if ($type == 'category'){
            $cat = $this->category->get_category_by_id($id);
            $description_string = $cat['name'] . ' torrents RSS feed';
            $torrents = $this->torrents->get_latest_category($id, 1, 0, 50);
        } else {
            $cat = $this->category->get_subcategory_by_id($id);
            $description_string = $cat['subname'] . ' ' . $cat['name'] . ' torrents RSS feed';
            $torrents = $this->torrents->get_latest_subcategory($id, 1, 0, 50);
        }
        
        if (empty($cat)) die('Category not found');
                
        $this->rssw->setTitle($description_string . $this->config->item('site_title'));
        $this->rssw->setLink(site_url());
        $this->rssw->setChannelElement('description', $description_string);
        
        //building items
        foreach ($torrents as $k=>$v){
            
            //Create an empty FeedItem
            $newItem = $this->rssw->createNewItem();
            $newItem->setTitle($v['torrentname']);
            $newItem->addElement('author', site_url('user/' . $v['verified_by']));
            $newItem->setLink(site_url('torrent/' . $v['id'] . '/' . $this->general->urltitle($v['torrentname'])));
            $newItem->addElement('guid', site_url('user/' . $v['verified_by']));
            $newItem->addElement('added', $v['added']);
            $newItem->addElement('torrent:contentLength', $v['size']);
            $newItem->addElement('torrent:infoHash', $v['hash']);
            $newItem->addElement('torrent:seeds', $v['seeds']);
            $newItem->addElement('torrent:peers', $v['peers']);
            $newItem->addElement('torrent:verified', $v['verified']);
            $newItem->setEncloser(
                site_url('download/'.$v['id'].'/'.$this->general->urltitle($v['torrentname']) . '.torrent'), 
                $v['size'],
                'application/x-bittorrent'
            );
  
            
            $this->rssw->addItem($newItem);
        }
    	
    	//OK. Everything is done. Now genarate the feed.
    	$this->rssw->genarateFeed();     
    }
    
}
