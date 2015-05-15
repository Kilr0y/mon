<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        //loading cache by default
        $this->load->driver('cache', array('adapter'=>$this->config->item('cache_adapter')));

        $this->output->enable_profiler(TRUE);
    }

    public function social_login(){
        
        global $base_uri, $social_config, $type;
        $base_uri = base_url();
        
        $this->load->helper('social_login');
        $this->config->load('social_login', true);        
        $social_config = $this->config->item('social_config', 'social_login');        
        
        $from = isset($_GET['from']) ? $_GET['from'] : $base_uri;
        
        
        //If user just started to login, saving place where he came from
        if (empty($_SESSION['social_login_from']))
            $_SESSION['social_login_from'] = $from;
        
        
        if (! empty($_GET) && (isset($_GET['code']) || isset($_GET['oauth_token'])) ){ 
            
            
            //checking social type
            $type = isset($_GET['state']) ? $_GET['state'] : '';
            
            
            //Twitter use oauth v1, so it doesn't return state value,
            //detection by oauth_token GET param
            if (empty($type) && isset($_GET['oauth_token'])) $type = 'twitter';
            
            log_action('Response came from type: ' . $type, 'message');
            
            
            if ($type == 'facebook'){
                
                $access_token = exchange_facebook_code($_GET['code']);
                
                if ($access_token){
                    log_action('Access token received, type: ' . $type, 'message');
                } else {
                    log_action('Access token doesn\'t received, type: ' . $type);
                    redirect_from();
                }
                
                $user = url_get_request('https://graph.facebook.com/me?access_token=' . $access_token);
                
                if ($user){
                    log_action('User data received, type: ' . $type, 'message');
                    log_action(print_r(json_decode($user), true), 'message');
                } else {
                    log_action('User data not received, type: ' . $type);
                    redirect_from();
                }
                $user = json_decode($user);
                
                //generating standard user array        
                $user_array = array(
                    'id' => $user->id,
                    'display_name' => isset($user->name) ? $user->name : '',
                    'first_name' => isset($user->first_name) ? $user->first_name : '',
                    'last_name' => isset($user->last_name) ? $user->last_name : '',
                    'email' => isset($user->email) ? $user->email : '',
                );        
                $this->_manage_user($user_array);
                
            } else if ($type == 'google'){
                
                $access_token = exchange_google_code($_GET['code']);
                
                if ($access_token){
                    log_action('Access token received, type: ' . $type, 'message');
                } else {
                    log_action('Access token doesn\'t received, type: ' . $type);
                    redirect_from();
                }
                
                $user = url_get_request('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token);
                
                if ($user){
                    log_action('User data received, type: ' . $type, 'message');
                    log_action(print_r(json_decode($user), true), 'message');
                } else {
                    log_action('User data not received, type: ' . $type);
                    redirect_from();
                }        
                $user = json_decode($user);
                
                //generating standard user array   
                $user_array = array(
                    'id' => $user->id,
                    'display_name' => isset($user->name) ? $user->name : '',
                    'first_name' => isset($user->given_name) ? $user->given_name : '',
                    'last_name' => isset($user->family_name) ? $user->family_name : '',
                    'email' => isset($user->email) ? $user->email : '',
                );
                $this->_manage_user($user_array);
                
            } else if ($type == 'twitter'){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                        
                $connection = new TwitterOAuth($social_config['providers']['Twitter']['keys']['key'], $social_config['providers']['Twitter']['keys']['secret'], $_SESSION['request_token'], $_SESSION['request_token_secret']);
                $access_token = $connection->getAccessToken($_GET['oauth_verifier']);
                
                if ($access_token){
                    log_action('Access token received, type: ' . $type, 'message');
                } else {
                    log_action('Access token doesn\'t received, type: ' . $type);
                    redirect_from();
                }
                
                $connection = new TwitterOAuth($social_config['providers']['Twitter']['keys']['key'], $social_config['providers']['Twitter']['keys']['secret'], $access_token['oauth_token'], $access_token['oauth_token_secret']);
                $user = $connection->get('account/verify_credentials', array('include_entities'=>false));
                
                if ($user){
                    log_action('User data received, type: ' . $type, 'message');
                    log_action(print_r($user, true), 'message');
                } else {
                    log_action('User data not received, type: ' . $type);
                    redirect_from();
                }
                
                //generating standard user array   
                $user_array = array(
                    'id' => $user->id,
                    'display_name' => isset($user->name) ? $user->name : '',
                    'first_name' => isset($user->screen_name) ? $user->screen_name : '',
                    'last_name' => '',
                    'email' => '',  //twitter newer share email
                );
                $this->_manage_user($user_array);
                    
                
                
            } else if ($type == 'vk'){
                
                $access_token = exchange_vk_code($_GET['code']);
                
                if ($access_token){
                    log_action('Access token received, type: ' . $type, 'message');
                } else {
                    log_action('Access token doesn\'t received, type: ' . $type);
                    redirect_from();
                }
                
                $user = url_get_request('https://api.vk.com/method/users.get?access_token=' . $access_token);
                if ($user){
                    log_action('User data received, type: ' . $type, 'message');
                    log_action(print_r(json_decode($user), true), 'message');
                } else {
                    log_action('User data not received, type: ' . $type);
                    redirect_from();
                }        
                $user = json_decode($user);
                $user = $user->response[0];
                
                //generating standard user array   
                $user_array = array(
                    'id' => $user->uid,
                    'display_name' => '',
                    'first_name' => isset($user->first_name) ? $user->first_name : '',
                    'last_name' => isset($user->last_name) ? $user->last_name : '',
                    'email' => isset($user->email) ? $user->email : '',  
                );
                $this->_manage_user($user_array);
            }
            
            die();
            
            
        //ERROR HAPPENED
        } else if (! empty($_GET) && isset($_GET['error'])){
            
            //checking social type
            $type = isset($_GET['state']) ? $_GET['state'] : '';
            
            
            //Twitter use oauth v1, so it doesn't return state value,
            //detection by oauth_token GET param
            if (empty($type) && isset($_GET['oauth_token'])) $type = 'twitter';
            
            $error_mgs = isset($_GET['error_description']) 
                ? $_GET['error_description'] 
                : 'Social site "' . $type . '" return unrecognized error';
            
            log_action($error_mgs);
            redirect_from();
        }
        
        $type = isset($_GET['login_type']) ? $_GET['login_type'] : false;
        $type = strtolower($type);
        
        $allowed_types = array(
            'facebook',
            'twitter',
            'google',
            'vk'
        );
        
        //checking if type is set, and if it's allowed    
        if (empty($type) || ! in_array(strtolower($type), $allowed_types)){
            log_action('Wrong social type, trying to access with: ' . $type, 'error');
            redirect_from();
        }
        
        log_action('-----------------------------------------------------', 'message');
        log_action('-----------------------------------------------------', 'message');
        log_action('Starting login process, type: ' . $type, 'message');
        
        
        if ($type == 'facebook'){
            $url = get_facebook_code();
        } else if ($type == 'google'){
            $url = get_google_code();
        } else if ($type == 'twitter'){
            $connection = new TwitterOAuth($social_config['providers']['Twitter']['keys']['key'], $social_config['providers']['Twitter']['keys']['secret']);
        	$request_token = $connection->getRequestToken($social_config['callback_url']);
            if( $request_token){
                $token = $request_token['oauth_token'];
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['request_token'] = $token ;
                $_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
                
                $url = $connection->getAuthorizeURL($token); 
                     
            } else {
                log_action('Invalid request token, type: ' . $type, 'error');
                redirect_from();
            }
        } else if ($type == 'vk'){
            $url = get_vk_code();
        }
        
        if (empty($url)){
            log_action('Redirect URL is empty, type: ' . $type, 'error');
            redirect_from();
        } else {
            log_action('Redirecting user to social site, type: ' . $type, 'message');
            header('Location: ' . $url);
        }
    }
    
    private function _manage_user($user_array){
        
        global $type;
        if (empty($type)){
            log_action('Saving user not possible - type not set');
            redirect_from();
        }
        $id = $user_array['id'];
        if (empty($id)){
            log_action('User ID not found!');
            redirect_from();
        }
        
        
        //social types
        //1 - reserved
        //2 - facebook
        //3 - twitter
        //4 - google
        //5 - vk
        $social_types = array(
            'facebook' => 2,
            'twitter' => 3,
            'google' => 4,
            'vk' => 5
        );
        $social_type = $social_types[$type];
        
        log_action("Searching user \"$id\" type \"$social_type\" in database", 'message');
        
        $this->load->model('user');
        $row = $this->user->get_user_by_social($id, $social_type);
                
        //$temp = time()+rand(0,100);
        
        if (! empty($row)){            
                  
            log_action("User \"$id\" type \"$social_type\" found in database, login him as $row[login]", 'message');  

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_login'] = mb_strtolower($row['login']);
            $_SESSION['user_social'] = true;				
            $_SESSION['lang'] = $row["language"];
        } else {
            log_action("User \"$id\" type \"$social_type\" not found, creating", 'message');
            $name = ! empty($user_array['display_name']) ? $user_array['display_name'] : $user_array['first_name'] .'_'. $user_array['last_name'];
            $email = ! empty($user_array['email']) ? $user_array['email'] : '';  
                   
            if (! empty($name)){
                $last_id = 0;
                $name = mb_strtolower( str_replace(' ', '_', $name) );
                $login = $name;                                   
            } else {
                //taking last id
                $last_row = $this->user->get_last_id();                
                $last_id = $last_row['id'] + 1;                    
                $login = 'user_' . $last_id; 
            }                     
                    
            //checking if this login is available
            $go = false;
            $i = 0;
            while (! $go){
                $i++;
                $record = $this->user->get_user_data($login);                
                if (! empty($record)){
                    $last_id++;
                    if (! empty($name)){                            
                        $login = $name . '_' . $last_id; 
                    } else {                            
                        $login = 'user_' . $last_id;
                    }                         
                } else {
                    $go = true;
                }
                if ($i > 20){
                    log_action('After 20 cycles available login not found, last login "'.$login.'"');
                    redirect_from();
                } 
            } 
            
            //CREATING USER
            log_action('Creating user with login "' . $login . '"', 'message'); 
            
            $insert = array(
                'login' => $login,
                'social_id' => $id,
                'social_type' => $social_type,
                'email' => $email,
                'created' => 'NOW()',
                'verified' => '0',
                'last_ip' => $this->input->ip_address(),
                'active' => '1',
                'verif_mail' => '1',
                'language' => 'en'
            );  
                       
            $user_id = $this->db->insert('user', $insert);
            
            
            
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_login'] = mb_strtolower($login);            
            $_SESSION['user_social'] = true;
            $_SESSION['lang'] = 'en';
            
            log_action('User "' . $login . '" successfully created', 'message');
        }
        
        //REDIRECTING BACK, WHERE IT CAME FROM
        log_action('Redirecting user back to: ' . (isset($_SESSION['social_login_from']) ? $_SESSION['social_login_from'] : $base_uri), 'message');
        redirect_from();    
    }
    
    private function _login_phpbb($login){
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        define('IN_PHPBB', true);
        $phpbb_root_path = './forum/'; //the path to your phpbb relative to this script
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include("forum/config.php");
        include("forum/common.php"); //the path to your phpbb relative to this script
        
        // Start session management
        $user->session_begin();
        $auth->acl($user->data);
        $user->setup();
        
    
        $username = request_var('username', $login);
        $password = request_var('password', 'password');
    
        if(isset($username) )
        {
          $result=$auth->login($username, $password, true);
          if ($result['status'] == LOGIN_SUCCESS) {
            echo "You're logged in";
          } else {
            echo $user->lang[$result['error_msg']];
          }
        }
    }
    
    private function _create_phpbb($login){
        global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
        define('IN_PHPBB', true);
        $phpbb_root_path = './forum/'; //the path to your phpbb relative to this script
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include("forum/config.php");
        include("forum/common.php"); //the path to your phpbb relative to this script
        include("forum/includes/functions_user.php");
        // Start session management
        $user->session_begin();
        $auth->acl($user->data);
        //$user->setup();
        $user_row = array(
            'username' => $login,
            'user_password' => md5('password'), 
            'user_email' => 'Email',
            'group_id' => 2,
            'user_timezone' => '1.00',
            'user_dst' => 0,
            'user_lang' => en,
            'user_type' => 0,
            'user_actkey' => '',
            'user_dateformat' => 'd M Y H:i',
            'user_style' => $not_sure_what_this_is,
            'user_regdate' => time(),
        );
        
        $phpbb_user_id = user_add($user_row);
        
        if ($phpbb_user_id){
            echo 'User created';
        } else 
            echo 'User creation error';
     
     }
}