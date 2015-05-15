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

    public function get_banner_content(){
        $name = trim($_POST['name']);

        if (! empty($name)){
            $path = 'templates/' . $name;
        }

        if (file_exists(APPPATH . 'views/' . $path . '.php')){
            $output = $this->load->view($path, null, true);
            echo $output;
        }
    }

    public function report(){
        if (empty($_POST['user_id']) || empty($_POST['reason']) || empty($_POST['torrent_id']))
            die();
        $this->load->database();
        $data = array(
            'user_id'=>(int)$_POST['user_id'],
            'reason'=>$_POST['reason'],
            'torrent_id'=>(int)$_POST['torrent_id'],
            'date'=>date("Y-m-d H:i:s")
        );
        $this->db->insert('torrent_report', $data);
        echo 'ok';
    }
    
    // TODO: Add limit of mails per user/session
    public function contact(){
        //checking for all required fields: email, message, and modal
        if (empty($_POST['message']) || empty($_POST['mail'])){
            echo json_encode(array('status'=>'error', 'error'=> tr('Please Fill All Required Fields') ));
            die();
        }
        
        $mail_to = $this->config->item('mail_to');
        $mail_to_name = $this->config->item('mail_to_name');
        
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
        
        //taking user data, if logged in
        $user_id = $this->session->userdata('user_id');
        if ($user_id){
            $this->load->model('user');
            $user = $this->user->get_user_data_by_id($user_id);
        }
        
        //Building message information
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
        //setting mail configs
        $mail_config = array(
            'mailtype' => 'html'            
        );
        $this->email->initialize($mail_config);
        $this->email->from($_POST['mail'], isset($user['login']) ? $user['login'] : $mail_to_name);
        $this->email->to($mail_to);
        $this->email->subject($prefix." ". (isset($_POST["subject"]) ? $_POST["subject"] : '') );
        $this->email->message($_POST["message"].$footer_message);        
        $r = @$this->email->send();

		if ($r){
            echo json_encode(array('status'=>'ok', 'message'=>tr('Your message was successfully sent. Thank you')));
		} else {
            echo json_encode(array('status'=>'error', 'error'=>tr('Unknown error, please try again later')));
		}
    }
    
    private function _isTorRequest() {
        $reverse_client_ip = implode('.', array_reverse(explode('.', $_SERVER['REMOTE_ADDR'])));
        $reverse_server_ip = implode('.', array_reverse(explode('.', $_SERVER['SERVER_ADDR'])));
        $hostname = $reverse_client_ip . "." . $_SERVER['SERVER_PORT'] . "." . $reverse_server_ip . ".ip-port.exitlist.torproject.org";
        return gethostbyname($hostname) == "127.0.0.2";
    }
    
    public function upload(){
        
        //Checking if this is not a tor request
        if ($this->_isTorRequest())
        {    
            header("Location: /");
            die();
        }

        // ALL VARS (i THINK)
        $upfile = $_FILES['torrent']['tmp_name'];
        
        $this->config->load('file', true);
        $file_config = $this->config->item('file_config', 'file'); 
        

        $max_files = $file_config["upload"]["max_files"]; //how many files in one folder

        $spam_filter_folder = "./filters/"; //set this up to point to spam filter folder

        $spam_reson = ""; //will be set when spam detected
        
        
        
         
        // trigger the upload part of this script
        if (isset($_FILES['torrent']))
        {	    
        //checking for a bot
        if ( ! isset($_POST['username']) || $_POST['username'] != '' ){
            upload_done_message();
        }
        
        //checking hash string
        if ( ! isset($_POST['hash']) || $_POST['hash'] != $_SESSION['upload_unique_str']){
            upload_done_message();
        }
        
        
		$torrent 		= torrent_info_file($upfile);
		$torrentname 		= trim(strip_tags($_POST['filename']));
		$description		= MakeSQLSafe(trim($_POST['info']));
		$tracker 		= strip_tags($torrent['announce']);
		$tracker 		= strip_tags(str_replace('announce', 'scrape', $tracker));
        

		if ($debug) $upload_start = get_micro_time();

		require("cache_php/trackerban.php");
	
		$ip = $_SERVER['REMOTE_ADDR']; //get_ip();
		$result = do_query("SELECT * FROM ban WHERE ip LIKE '%".MakeSQLSafe($ip)."%'");



		if (mysql_num_rows($result) >= 1)
		{
			if ($debug)
			{
				print("<hr><h3>query</h3>SELECT * FROM ban WHERE ip LIKE '%".MakeSQLSafe($ip)."%'<hr>");
				//while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    			//	print_r($row);
				//}
				print("<hr>");
			}

			if ($debug) echo "<hr>IP BANNED<hr>";
            
            upload_done_message();           
		}

		
		if ( (illegal_content($torrentname) ==  TRUE)||(illegal_content($description) ==  TRUE) )
		{
			if ($debug) echo "<hr>TORRENT NAME ILLEGAL<hr>";

			upload_done_message();
		}

		if ($upfile == '')
		{
			if ($debug) echo "<hr>NO UP-FILE<hr>";
            
            upload_error_message(tr('ERROR: Missing Torrent File') . '<br />' . tr('Please Enter All Required Fields'));
		}
		
		if ((in_array($tracker,$trackerban))&&(!is_verified_user($_SESSION["logged_user"])))
		{
		    if ($debug) echo "<hr>TRACKER BANNED<hr>";

            upload_done_message();
		}
		
		if (is_array($torrent["announce-list"]))
		{
			foreach ($torrent["announce-list"] as $announce)	
			{
				if (!is_array($announce[0]))
				{
					if ((in_array(str_replace('announce', 'scrape', $announce[0]),$trackerban))&&(!is_verified_user($_SESSION["logged_user"])))
					{
						if ($debug) echo "<hr>ONE OF TRACKERS BANNED<hr>";

						upload_done_message();
					}
				}
			}
		}
		
		if ($debug) $stats_start = get_micro_time();

		$infohash 		= strip_tags($torrent['hash']);        
		$stats 			= torrent_scrape_url($tracker, $torrent['hash']);        
		$seeds 			= strip_tags($stats['seeds']);
		$peers 			= strip_tags($stats['peers']);
		$size 			= strip_tags($torrent['size']);
		$pieces 		= strip_tags($torrent['pieces']);        
		$piecelength 	= strip_tags($torrent['piece length']);
		$torrentname 	= trim(strip_tags($_POST['filename']));
		$subcat 		= strip_tags($_POST['type']);
		$description	= MakeSQLSafe(trim($_POST['info']));
		$registration 	= strip_tags($_POST['reg']);
		$password		= strip_tags(MakeSQLSafe($_POST['password']));
		$date 			= date('YmdHis');
		$updated 		= date('YmdHis');
		$maincat 		= do_query("SELECT catid FROM categories WHERE subid = '".MakeSQLSafe($subcat)."' LIMIT 1");
		$maincat 		= mysql_fetch_row($maincat);
		$maincat 		= $maincat[0];

        
        
    /**
     * Filesize custom check for spam videos
     * Check for size to be within a certain range or exact match
     * ------------------------------------------------------------------------------------------
     */

    // Compare method (exact,range)
    #$compare_method = 'range';
    $compare_method = 'exact';
    
    // Method => 'exact' :: Compares 2 values (type=float) for a match
    if(isset($compare_method) && $compare_method == 'exact'){

      // Filesize in Megabytes
      $mbsize = (isset($size) && intval($size) > 0) ? round($size / (1024*1024), 2) : 0.00;
      
      // Set variable type to a float
      settype($mbsize,'float');

      // Match Size in Mb    
      $match = 207.12; #757.12;
      settype($match,'float');
      
      // Check
      if(isset($mbsize) && $mbsize == $match){
        
        // Value Matches, Do Something
				if ($debug) echo "<hr>Matches New Spam Filesize Check (".$mbsize."Mb)<hr>";

				upload_done_message();       
      }
      
    }
    
    // Method => 'range' :: Checks if value (type=integer) in within range
    if(isset($compare_method) && $compare_method == 'range'){

      // Original Filesize
      $xsize = $size;
      
      // Set variable type to an integer
      settype($xsize,'integer');
          
      // Range Min Value
      $low_range = 793898000;
      
      // Range Max Value
      $high_range = 793899999;
      
      // Filesize Check
      if(isset($size) && ($size >= $low_range && $size <= $high_range)){
      
        // Value Within Range, Do Something
				if ($debug) echo "<hr>Within New Spam Filesize Range Check (".$size."Mb)<hr>";

				upload_done_message();        
      }  
        
    }



		if ($debug) $stats_stop = get_micro_time();
		if ($debug) echo "<hr>TOTAL STATS PROCESSING TIME: ".round($stats_stop-$stats_start,2)."<hr>";
		
		$nfo = 0;
		
		$today = date("Y-m-d");
		
		#FINDING LAST ID OF TODAY FOLDERS
		$last_folder_id = 0;
		
		for ($i=2; $i<10000; $i++)
			{
				if (!opendir($btdir.'/'.$today.'-'.$i))
					{
						$last_folder_id=$i-1;
						$i=11111; //to stop execution of next loop
					}
			}
		
		$selected_folder = opendir($btdir.'/'.$today.'-'.$last_folder_id.'/');
		$file_counter = 0;

		while($file = readdir($selected_folder))
			{
				if($file != '.' && $file != '..')
					{
						$file_counter++;
					}
			}
		closedir($selected_folder);
		
		if ($file_counter > $max_files)
			{
				$last_folder_id++;
			}
		
		#echo "[DEBUG] Selected folder: $last_folder_id , with file count: $file_counter \n";
		
		if (!opendir($btdir.'/'.$today.'-'.$last_folder_id))
		{
			if (!mkdir($btdir.'/'.$today.'-'.$last_folder_id, 0775, TRUE)) {
				if ($debug) echo "<hr>DIR CREATION PROBLEM<hr>";
                
                upload_error_message(tr('ERROR: Server Error') . '<br />' . tr('Could Not Create Folder'));
			}
		}
		
		if (isset($_FILES['nfo']) && $_FILES['nfo']['name'] != '' )
		{
			$nfofile = $_FILES['nfo'];
		
			if (substr($nfofile['name'], -4) != ".nfo")
			{			     
                upload_error_message(tr('ERROR: Invalid NFO') . '<br />' . tr('Only Valid NFO Files Allowed'));
			}
				
			if ($nfofile['size'] > 65535)
			{
			    upload_error_message(tr('ERROR: NFO Size') . '<br />' . tr('NFO File Size Exceeds') . ' 64 Kb');
			}
			
			$nfocontent = file_get_contents($nfofile['tmp_name']);
			
			$nfo = 1;
			nfo_to_png($nfocontent, $infohash);
		}
		
		if ($torrentname == '')
		{
		    upload_error_message(tr('ERROR: Missing Torrent Name') . '<br />' . tr('Please Enter All Required Fields'));
		}
		
		if ($registration == '')
		{
		    upload_error_message(tr('ERROR: Missing Private Tracker Selection') . '<br />' . tr('Please Enter All Required Fields'));
		}
		
		if ($subcat == '')
		{
		    upload_error_message(tr('ERROR: Missing Category Selection') . '<br />' . tr('Please Enter All Required Fields'));
		}
		
		// check if torrent has tracker
		if ($tracker == '')
		{
		    upload_error_message(tr('ERROR: Invalid or Missing Tracker') . '<br />' . tr('Torrent Does Not Have A Valid Tracker'));
		}
                
		
		// check if torrent excists in the database
		$result= do_query ("SELECT torrentname, folder_id, id, verified_by, UNIX_TIMESTAMP(added) AS added FROM torrents WHERE hash = '".MakeSQLSafe($infohash)."' LIMIT 1");
		if (mysql_num_rows($result) > 0)
			{			 
				if (($_SESSION["logged_user"] != "")) 
					{
						$user_name = $_SESSION["logged_user"];
						$r=do_query("SELECT `id`,`verified` FROM `user` WHERE `login` = '$user_name'");
						$user=mysql_fetch_array($r);
					}
				else
					{
						$user_name = "nobody";
						$user["verified"] = 0;
						$user["id"] = 0;
					}

				$row = mysql_fetch_array($result);
				$added= $row['added'];
				$folder_id=$row['folder_id'];
	
				if ((($row["verified_by"] == "nobody")&&($user["id"] > 0))||(($row["verified_by"] == "")&&($user["id"] > 0))||($user["verified"] == 1)||($user_name == $row["verfied_by"]))
					{
						$result2= do_query ("SELECT `descr` FROM `description` WHERE `id` = '".MakeSQLSafe($row["id"])."' LIMIT 1");
						$row2 = mysql_fetch_array($result2);

						@unlink($btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova');
						move_uploaded_file($upfile , $btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova') or die(tr("Error moving torrent")."...");
						chmod($btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova', 0664);

						$ip = $_SERVER['REMOTE_ADDR']; //get_ip();
						$additional = '';

						if (strlen($description) != 0)
							{
								$additional .= ", `description` = '1'";
								do_query ("INSERT INTO description (id, descr) VALUES ('".MakeSQLSafe($row["id"])."','".MakeSQLSafe($description)."')") or die (mysql_error());
							}


						do_query("UPDATE `torrents` SET `torrentname` = '".MakeSQLSafe($torrentname)."' `maincat` = '".MakeSQLSafe($maincat)."', `subcat` = '".MakeSQLSafe($subcat)."', `tracker` = '".MakeSQLSafe($tracker)."', `pieces` = '".MakeSQLSafe($pieces)."', `piecelength` = '".MakeSQLSafe($piecelength)."', `size` = '".MakeSQLSafe($size)."', `seeds`='".MakeSQLSafe($seeds)."', `peers` = '".MakeSQLSafe($peers)."', `registration` = '".MakeSQLSafe($registration)."', `password` = '".MakeSQLSafe($password)."', `nfo` = '".MakeSQLSafe($nfo)."', `verified_by` = '".MakeSQLSafe($user_name)."', `ip` = '".MakeSQLSafe($ip)."', `imported_from`='' $additional WHERE `hash` = '".MakeSQLSafe($infohash)."'");						

						$res = mysql_fetch_array($result);
                        
                        upload_done_message(tr('The existing torrent').': <a href="details.php?id='.$res['id'].'">'.$res['torrentname'].'</a> '.tr('has been updated completly'));
					}
				else
					{		
					    //Hope this will fix the upload issue
                        //Added by Kilr0y
                        /*
                        $dir = $btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"];
                        if ( ! is_dir($dir)){
                            mkdir($dir);  
                        }
                        $file_path = $btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova';
                        if (! file_exists($file_path))                        
                            move_uploaded_file($upfile, $file_path) or die(tr("Error moving torrent")."...");
                                                
                                                
						chmod($btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova', 0664);
		                */  
						if  (!torrent_announce_list($btdir.'/'. date('Y-m-d',$row["added"]) .'-'.$row["folder_id"].'/' . $infohash .'.monova', $torrent['announce'] ))
							{
							    upload_error_message(tr('ERROR: Mult-tracker Error') . '<br />' . tr('An unknown error occurred while adding multi-tracker information'));								
							}
						else
							{
							    //$res = mysql_fetch_array($result);
                                upload_done_message(tr('The existing torrent').': <a href="details.php?id='.$row['id'].'">'.$row['torrentname'].'</a> '.tr('has been updated with new multi-tracker information'));		
							}
					}
			}
		
    		// Create flag for description
    		if (strlen($description) == 0)
    			{
    				$desc_enum = 0;
    			}
    		else
    			{
    				$desc_enum = 1;
    			}
    		
    		#### CHECKING FOR BANNED TORRENT ####
    		$query=do_query('SELECT hash, count(hash) how_many FROM `torrentban` WHERE `hash`=\''.MakeSQLSafe($infohash).'\' GROUP BY hash');
    		$torrentban=mysql_fetch_array($query);
    		
    		
    		// no explenation needed here
    		if (is_verified_user($_SESSION["logged_user"]))
    			{
    				$spam_free_var = 1;
    			}
    		else
    			{
    				$spam_free_var = spam_free(mysql_real_escape_string($torrentname),$size,$description);
    			}
    		
    		if (($spam_free_var==1)&&($torrentban["how_many"]==0))
    			{
    				if ($debug) echo "<hr>INSIDE REAL UPLOADER<hr>";
    				if ($debug) $uploader_start = get_micro_time();
    		
    				move_uploaded_file($upfile , $btdir.'/'.$today.'-'.$last_folder_id.'/'.$infohash .'.monova') or die(tr("Error moving torrent")."...");
    				chmod($btdir.'/'.$today.'-'.$last_folder_id.'/'. $infohash .'.monova', 0664);
    
    				$user_name = 'nobody';
    				if (($_SESSION["logged_user"] != "")) $user_name = $_SESSION["logged_user"];
    				
    				// Drop torrent stats into db
    				$q2 = db_query('SELECT `verified` FROM `user` WHERE `login` = \''.mysql_real_escape_string(strtolower($_SESSION["logged_user"])).'\' LIMIT 1') or die(mysql_error());
    				$r2 = mysql_fetch_array($q2);
    				$verified = $r2["verified"];
    		
    				do_query("INSERT INTO torrents 
    				(ip,torrentname,hash,maincat,subcat,tracker,pieces, piecelength, size,seeds,peers,added,updated,registration,password,description,nfo, moved, folder_id, verified_by, verified) VALUES 
    				('".MakeSQLSafe($ip)."','".MakeSQLSafe($torrentname)."','".MakeSQLSafe($infohash)."','".MakeSQLSafe($maincat)."','".MakeSQLSafe($subcat)."','".MakeSQLSafe($tracker)."','".MakeSQLSafe($pieces)."','".MakeSQLSafe($piecelength)."','".MakeSQLSafe($size)."','".MakeSQLSafe($seeds)."','".MakeSQLSafe($peers)."','".MakeSQLSafe($date)."','".MakeSQLSafe($updated)."','".MakeSQLSafe($registration)."','".MakeSQLSafe($password)."','".MakeSQLSafe($desc_enum)."','".MakeSQLSafe($nfo)."', '1','".MakeSQLSafe($last_folder_id)."','".MakeSQLSafe($user_name)."','".MakeSQLSafe($verified)."')") or die (mysql_error());
    				
    				$torrent_id = mysql_insert_id();
    
    				if ($user_name != "nobody")
    					{
    						do_query("UPDATE `user` SET `uploads` = (uploads+1) WHERE `login` = '".$user_name."'");
    					}
    				
    				do_query ("INSERT INTO ratings (id) VALUES ('".MakeSQLSafe($torrent_id)."')") or die (mysql_error());
    				
    				// Write description to a seperate table
    				if ($desc_enum == 1)
    					do_query ("INSERT INTO description (id, descr) VALUES ('".MakeSQLSafe($torrent_id)."','".MakeSQLSafe($description)."')") or die (mysql_error());
    				
    				
    				// Update stats
    				do_query("UPDATE categories SET torrents = torrents+1 WHERE subid = '".MakeSQLSafe($subcat)."'");
    
    				if ($debug) $uploader_stop = get_micro_time();
    				if ($debug) echo "<hr>TOTAL UPLOADER PROCESSING TIME: ".round($uploader_stop-$uploader_start,2)."<hr>";
    			}
    		elseif ($torrentban["how_many"]>=1)
    			{
    				#What to do if found banned torrent - default - nothing - act normally but don't upload
    				@unlink($upfile);
    			}
    		else
    			{
    				if ($debug) echo "<hr>BANNING HASH<hr>";
    
    				@unlink($upfile);
    		
    				$sql = 'INSERT INTO `torrentban` (`hash`, `reason`) VALUES (\''.MakeSQLSafe($infohash).'\', \''.MakeSQLSafe($torrentname).'\');';
    				do_query($sql);
    		
    				#echo "[DEBUG] Spam detected ok, inside spam elimination routine \n";
    				if (!is_file($spam_filter_folder."upload_delete.log"))
    					{
    						touch($spam_filter_folder."upload_delete.log");
    					}
    		
    				if (is_writable($spam_filter_folder."upload_delete.log"))
    					{
    						$handle2=fopen($spam_filter_folder."upload_delete.log","a");
    						fwrite($handle2,"$spam_reson\n $torrentname - $size \nDESCRIPTION\n $description\n\n");
    						fclose($handle2);
    					}
    			}
    		if ($debug) $upload_stop = get_micro_time();
    		if ($debug) echo "<hr>TOTAL UPLOAD PROCESSING TIME: ".round($upload_stop-$upload_start,2)."<hr>";
    		if ($debug)
    			{
    				echo "<hr>VAR VIEWER:<br><br>";
    				echo "<br>SPAM FREE VAR: ";
    				var_dump($spam_free_var);
    				echo "<br>TORRENT BAN VAR: ";
    				var_dump($torrentban);
    				echo "<br>INFO HASH VAR: ";
    				var_dump($infohash);
    				echo "<br>STATS VAR: ";
    				var_dump($stats);
    				echo "<br>TORRENT VAR: ";
    				var_dump($torrent);
    
    				echo "<hr>";
    			}
            
            upload_done_message();
        } else {
            header('Location: ' . $base_uri);
            die();
            //upload_error_message();
        }

    }
    
    private function _illegal_content($text)
	{
	    
		$text = str_replace("-", " ", $text);
		$text = str_replace(".", " ", $text);
		$text = str_replace(",", " ", $text);
		$text = str_replace("(", " ", $text);
		$text = str_replace(")", " ", $text);
		$text = str_replace("[", " ", $text);
		$text = str_replace("]", " ", $text);
		$text = str_replace("_", " ", $text);
		$text = str_replace("*", " ", $text);
		$text = str_replace("!", " ", $text);
		$text = str_replace("?", " ", $text);
		$text = str_replace(">", " ", $text);
		$text = str_replace("<", " ", $text);
		$text = str_replace("$", " ", $text);
		$text = str_replace("#", " ", $text);
		$text = str_replace("@", " ", $text);
		$text = str_replace("+", " ", $text);

		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);

		$ret = FALSE;

		$entries = file("./conf/adult_delete.txt", FILE_IGNORE_NEW_LINES+FILE_SKIP_EMPTY_LINES);
		
		foreach ($entries as $ent)
			{
				if (!(stripos($text, $ent) === FALSE)) $ret = TRUE;
			}

		return $ret;
	}

    private function _spam_free($text,$size,$description)
    	{
    		global $debug;
    		if ($debug) $spam_free_start = get_micro_time();
    
    		#echo "[DEBUG] Inside SPAM_FREE \n";
    		global $spam_filter_folder, $spam_reson;
    
    		$size=$size/1024; //kb
    		$size=$size/1024; //mb
    		#echo "[DEBUG] SPAM size = $size Mb \n";
    
    		$how_many = 0; //how many instances of keywords found
    		$how_many2 = 0; //how many instances of keywords found in 2nd
    
    		$how_many_desc = 0; //how many instances of keywords found
    		$how_many_desc2 = 0; //how many instances of keywords found in 2nd
    
    		$keywords=file($spam_filter_folder."keyword_list_01.txt");
    		$keywords2=file($spam_filter_folder."keyword_list_02.txt");
    		#echo "[DEBUG] Keywords in keyword lists 1 and 2: ".count($keywords).', '.count($keywords2)." \n";		
    
    		$keywords_desc=file($spam_filter_folder."description_list_01.txt");
    		$keywords_desc2=file($spam_filter_folder."description_list_02.txt");
    		#echo "[DEBUG] Keywords in keyword lists 1 and 2: ".count($keywords_desc).', '.count($keywords_desc2)." \n";
    
    		$text=strtolower($text);
    		$text=str_replace("\n"," ",$text);
    		$text_array=explode(' ', $text); //array with each word used in $text
    		#echo "[DEBUG] Text array count: ".count($text_array)."\n";
    
    		foreach ($keywords as $keyword)
    			{
    				$key=strtolower(trim($keyword));
    				if (in_array($key,$text_array)) $how_many++;
    			}
    
    		foreach ($keywords2 as $keyword)
    			{
    				$key=strtolower(trim($keyword));
    				if (in_array($key,$text_array)) $how_many2++;
    			}
    
    		$description=strtolower($description);
    		$description=str_replace("\n"," ",$description);
    		$text_array=explode(' ', $description); //array with each word used in $text
    		#echo "[DEBUG] Description array count: ".count($text_array)."\n";
    
    		foreach ($keywords_desc as $keyword)
    			{
    				$key=strtolower(trim($keyword));
    				if (in_array($key,$text_array)) $how_many_desc++;
    			}
    
    		foreach ($keywords_desc2 as $keyword)
    			{
    				$key=strtolower(trim($keyword));
    				if (in_array($key,$text_array)) $how_many_desc2++;
    			}
    
    		$spam_status=1; //1 means there is no spam
    
    		if (($how_many>0)&&($how_many2>0)&&($size<50)) 
    			{
    				$spam_status=0; //if it is not spam free
    				$spam_reson="KEYWORD MATCH ON TITLE";
    		#		echo "[DEBUG] Keyword match on title detected \n";
    			}
    
    		if (($how_many_desc>0)&&($how_many_desc2>0)) 
    			{
    				$spam_status=0; //if it is not spam free
    				$spam_reson="KEYWORD MATCH ON DESCRIPTION";
    		#		echo "[DEBUG] Keyword match on description detected \n";
    			}
    
    		#echo "[DEBUG] HOW MANY STATS: $how_many, $how_many2, $how_many_desc, $how_many_desc2 \n";
    		#echo "[DEBUG] SPAM STATUS: $spam_status \n";
    
    		if ($debug) $spam_free_stop = get_micro_time();
    		if ($debug) echo "<hr>SPAM FREE TIMING: ".round($spam_free_stop - $spam_free_start,2)."<hr>";
    
    		return $spam_status;
    	}
        
    private function _upload_done_message($message = ''){
        $message = ! empty($message) ? $message : tr('Your torrent has successfully been added to the database') . '<br />' . tr('Please allow upto 1 hour for uploads to propagate');
        if (isset($_POST['ie']) && $_POST['ie'] == 1){
            $redirect_to = ! empty($_POST['redirect_to']) ? $_POST['redirect_to'] : $base_uri;
            if (strpos($redirect_to, '#') > -1)
                $redirect_to = strstr($redirect_to, '#', true);        
            header('location: ' . $redirect_to . '#message=' . urlencode($message), true, 301);
        } else {
            echo json_encode(array('status'=>'ok', 'message'=>$message));
        }    
        die(); 
    }
    
    private function _upload_error_message($message = ''){
        $message = ! empty($message) ? $message : tr('Error!');
        if (isset($_POST['ie']) && $_POST['ie'] == 1){        
            $redirect_to = ! empty ($_POST['redirect_to']) ? $_POST['redirect_to'] : $base_uri;
            $redirect_to = strstr($redirect_to, '#', true);
            header('location: ' . $redirect_to . '#message=' . urlencode($message), true, 301 );
        } else {
            echo json_encode(array('status'=>'error', 'error'=>$message));
        }     
        die();
    }

    public function set_lang(){
        
        $lang = $this->input->post('lang');
        if (! $lang || ! in_array($lang, $this->config->item('supported_languages'))){
            die();
        }
        $this->session->set_userdata('lang', $lang);
        echo 'ok';  
              
    }
}
