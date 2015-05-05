<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        //loading cache by default        
        //$this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));
        
        
        //lets check if this is not bot
        if( ! empty($_POST['username'])){  //username field should stay empty
            echo json_encode(array('status'=>'error', 'error'=>'Unknown error'));
            die();
        }
        
        
        //taking session language
        $lang = $this->session->userdata('lang');
        if (!$lang) $lang = 'en';
        
        //loading library
        $this->lang->load('all', $lang);        
    }

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
                    $this->session->set_userdata('lang', $user['language']);

                }
            }
        }
        echo json_encode($data);
    }
    
    public function logout(){
        
        unset($_SESSION['user_id']);
        unset($_SESSION['user_login']);
                
        $data['status'] = 'ok';
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
    
    public function contact(){
        //checking for all required fields: email, message, and modal
        if (empty($_POST['message']) || empty($_POST['mail'])){
            echo json_encode(array('status'=>'error', 'error'=> tr('Please Enter All Required Fields') ));
            die();
        }
        
        //$max_posts = $file_config["contact"]["max_mails"];
    	//$mail_to = $file_config["contact"]["email"];
        //$mail_to='positive.kilroy@gmail.com';
    	$mail_to='monova.org@gmail.com';
    	$mail_to_name="monova.org";
        $mail_to='Kilr0y@ukr.net';
        
        //detecting type of contact
        if ($_POST["type"] == "reminder") $prefix='[MONOVA-UNAUTH PASSWD RESET]';
		else if ($_POST["type"] == "user") $prefix='[MONOVA-USERNAME REQ]';
		else if ($_POST["type"] == "user2") $prefix='[MONOVA-USERNAME REQ]';
		else if ($_POST["type"] == "na") $prefix='[MONOVA-USERNAME NOT ACTIVE]';
		else if ($_POST["type"] == "ban") $prefix='[MONOVA-BAN INQ]';
		else if ($_POST["type"] == "lock") $prefix='[MONOVA-LOGIN LOCK]';
		else if ($_POST["type"] == "language") $prefix='[MONOVA-LANGUAGE]';
		else if ($_POST["type"] == "gateway") $prefix='[MONOVA-GATEWAY DISABLE REQ]';
		else if ($_POST["type"] == "contact") $prefix='[MONOVA-CONTACT]';
        else $prefix='[MONOVA-UNKNOWN]';
        
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id){
            $this->load->model('user');
            $user = $this->user->get_user_data_by_id($user_id);
        }
        
        $footer_message = "<br /><br /><br />ADDITIONAL INFO:<br />";
		$footer_message .= "........................................<br />";
		$footer_message .= "IP : ".$this->input->ip_address()."<br />";
		$footer_message .= "Referer : ".(isset($_POST["ref"]) ? $_POST["ref"] : '')."<br />";
		$footer_message .= "Username : ".$this->session->userdata('user_login')."<br />";
		$footer_message .= "Typed in Email : ".$_POST["mail"]."<br />";
		$footer_message .= "Registered Email : ".(isset($user["email"]) ? $user['email'] : '')."<br />";
		$footer_message .= "Activation Status : ".(isset($user["active"]) ? $user['active'] : '')."<br />";
		$footer_message .= "Ban Status : ".(isset($user["banned"]) ? $user['banned'] : '')."<br />";
		$footer_message .= "Ban Reason : ".(isset($user["ban_reason"]) ? $user['ban_reason'] : '')."<br />";
		$footer_message .= "........................................<br />";
        
        
        //loading library and settings values
        $this->load->library('email');
        //setting some mail configs
        $mail_config = array(
            'mailtype' => 'html'            
        );
        $this->email->initialize($mail_config);        

        $this->email->from($_POST['mail'], isset($user['login']) ? $user['login'] : $mail_to_name);
        $this->email->to($mail_to);        
        
        $this->email->subject($prefix." ". (isset($_POST["subject"]) ? $_POST["subject"] : '') );
        $this->email->message($_POST["message"].$footer_message);
        
        
        $r = $this->email->send();

		//$r = send_mail($mail_to_name, $mail_to, $prefix." ".$_POST["subject"], $_POST["message"].$footer_message, $_POST["mail"], $_POST["user"]);

		if ($r == true)
			{
                echo json_encode(array('status'=>'ok', 'message'=>tr('Your message was successfully sent. Thank you')));                
				//echo '<br /><br /><h1><center>'.tr('Your message was successfully sent. Thank you').'!</center></h1><br /><br /><br />';
				//header("Refresh: 3; url=".$base_uri."");
			}
		else
			{
                echo json_encode(array('status'=>'error', 'error'=>tr('Problem with mail sending, please try again')));                
				//echo '<br /><br /><h1><center>'.tr('Problem with mail sending, please try again').'!</center></h1><br /><br /><br />';
				//header("Refresh: 3; url=".$base_uri."contact.php");
			}

        
        
    }
}
