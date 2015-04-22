<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function get_autocomplete(){
        
        $q = trim($this->input->get('query'));        
        $this->load->model('search');        
        $data = $this->search->getSearchSuggestions($q);        
        $output = array(
            'query' => $q,
            'suggestions' => $data
        );
        
        echo json_encode($output);        
    }

    public function login(){
        $this->load->model('user');
        //creating stanard result, with preset values
        $data = array(
            'status' => 'error',
            'message' => 'Incorrect login or password'
        );

        //adding comment to test commit
        //new change 2


        //getting income values
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        if ($login && $password) {

            $user = $this->user->get_user_data($login);
            if (!empty($user)) {

                //user found, need to compare passwords

                if ($user['pass'] == md5($password)) {

                    $data['status'] = 'ok';
                    $data['message'] = 'User logged in successfuly';

                    $this->session->set_userdata('user_id', $user['id']);
                    $this->session->set_userdata('user_login', $user['login']);

                }
            }
        }
        echo json_encode($data);
    }


    
    //USER VOTED TORRENT
    public function set_torrent_rating(){
        
        //checking vote conditions
        //if ($this->config->item('rate_logged_in_only') && ! isset($_SESSION['logged_user'])){
        //    die();
        //}
                        
		//getting the values
        $torrent_id = (int)$_POST['q'];
		$vote_sent = (int)$_POST['j'];
		$ip_num = $_POST['t'];
		$units = $_POST['c'];
		$ip = $_SERVER['REMOTE_ADDR'];
        
        $this->load->model('ratings');        
        $numbers = $this->ratings->get_rating_by_id($torrent_id);
        
        if (! empty($numbers)){
            
            if (strpos($numbers['used_ips'], $ip) !== FALSE){
                $json = array(
                    'status'=>'error'
                );
                echo json_encode($json);
                die();
            }
            
            $checkIP = unserialize($numbers['used_ips']);
    		$count = $numbers['total_votes']; //how many votes total
    		$current_rating = $numbers['total_value']; //total number of rating added together and stored
    		$sum = $vote_sent+$current_rating; // add together the current vote value and the total vote value
    		
    		// checking to see if the first vote has been tallied
    		// or increment the current number of votes
    		($sum==0 ? $added=0 : $added=$count+1);
    		
    		// if it is an array i.e. already has entries the push in another value
    		((is_array($checkIP)) ? array_push($checkIP,$ip_num) : $checkIP=array($ip_num));
    		$insert_ip = serialize($checkIP);
    		
    		if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { 
                $update = array(
                    'total_votes' => $added,
                    'total_value' => $sum,
                    'used_ips' => $insert_ip
                );
                $this->ratings->update_rating_record($torrent_id, $update);		
   			}          
        } else {
            
            $insert = array(
                'id' => $torrent_id,
                'total_votes' => 1,
                'total_value' => $vote_sent,
                'used_ips' => serialize(array($ip_num))
            );
            $this->ratings->create_rating_record($insert);
                        
        }
        $json = array(
            'status'=>'ok'
        );
        echo json_encode($json);
        
    }
    
    public function get_lightbox_content(){
        $name = trim($_POST['name']);
        
        if (! empty($name)){
            $path = 'templates/' . $name;
        }
        
        
        
        if (file_exists(APPPATH . 'views/' . $path . '.php')){
            $output = $this->load->view($path, null, true);
            $json = array(
                'status'=>'ok',
                'data'=>$output
            );
            echo json_encode($json);
            die();
        } else {
            echo 'not exists';
        }
    }
}
