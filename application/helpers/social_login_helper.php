<?php

function url_get_request($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
    $result= curl_exec ($ch);
    curl_close($ch);
    return $result;
} 

function url_post_request($url, $post = array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
    $result= curl_exec($ch);
    curl_close ($ch);
    return $result;
}

function log_action($message, $type = 'error'){
    global $social_config;
    
    //Save not errors only in DEBUG MODE
    if (strtolower($type) != 'error' && ! $social_config['debug_file']){
        return false;
    } 
    
    //generating message string
    $msg = '[' . date('m-d-Y H:i:s') . '][' .$_SERVER['REMOTE_ADDR']. '] ' . strtoupper($type) . ': ';
    $msg .= $message;
    $msg .= "\n";
    
    file_put_contents($social_config['debug_file'], $msg, FILE_APPEND);
    return true;    
}

function redirect_from(){
    global $base_uri;
    $from = (isset($_SESSION['social_login_from'])) ? $_SESSION['social_login_from'] : $base_uri;
    header('Location: ' . $from);
    die();
}



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function get_facebook_code(){
    global $social_config, $type;
    $get_request = array(
        'client_id' => $social_config['providers']['Facebook']['keys']['id'],
        'redirect_uri' => $social_config['callback_url'],
        'scope' => $social_config['providers']['Facebook']['scope'],
        'state' => 'facebook',
        'login_type' => $type
    );
    
    $url = "https://www.facebook.com/dialog/oauth?" . http_build_query($get_request);
    return $url;
}

function get_google_code(){
    global $social_config, $type;
    $get_request = array(
        'response_type' => 'code',
        'client_id' => $social_config['providers']['Google']['keys']['id'],
        'redirect_uri' => $social_config['callback_url'],
        'scope' => $social_config['providers']['Google']['scope'],
        'state' => 'google',
        'access_type' => 'offline',
    );
    
    $url = "https://accounts.google.com/o/oauth2/auth?" . http_build_query($get_request);
    return $url;
}

function get_vk_code(){
    global $social_config, $type;
    $get_request = array(
        'response_type' => 'code',
        'client_id' => $social_config['providers']['VK']['keys']['key'],
        'redirect_uri' => $social_config['callback_url'],
        'scope' => $social_config['providers']['VK']['scope'],
        'state' => 'vk',
        'v' => '5.29',
    );
    
    $url = "https://oauth.vk.com/authorize?" . http_build_query($get_request);
    return $url;
}

function exchange_facebook_code($code){
    global $social_config;
    //exchanging CODE to ACCESS_TOKEN    
    $get_request = array(
        'client_id' => $social_config['providers']['Facebook']['keys']['id'],
        'redirect_uri' => $social_config['callback_url'],
        'client_secret' => $social_config['providers']['Facebook']['keys']['secret'],
        'code' => $code
    );    
    $url = "https://graph.facebook.com/oauth/access_token?" . http_build_query($get_request);
    $access_token = url_get_request($url);    
    parse_str($access_token, $access_array);
    
    return $access_array['access_token'];
}

function exchange_google_code($code){
    global $social_config;
    //exchanging CODE to ACCESS_TOKEN    
    $get_request = array(
        'client_id' => $social_config['providers']['Google']['keys']['id'],
        'redirect_uri' => $social_config['callback_url'],
        'client_secret' => $social_config['providers']['Google']['keys']['secret'],
        'code' => $code,
        "grant_type" => "authorization_code"
    );    
    $url = "https://accounts.google.com/o/oauth2/token";
    $access_string = url_post_request($url, $get_request); 
    $access_array = json_decode($access_string);  
    
    return $access_array->access_token;
}

function exchange_vk_code($code){
    global $social_config;
    //exchanging CODE to ACCESS_TOKEN    
    $get_request = array(
        'client_id' => $social_config['providers']['VK']['keys']['key'],
        'redirect_uri' => $social_config['callback_url'],
        'client_secret' => $social_config['providers']['VK']['keys']['secret'],
        'code' => $code
    );    
    $url = "https://oauth.vk.com/access_token?" . http_build_query($get_request);
    $access_string = url_get_request($url);    
    $access_array = json_decode($access_string);
    
    return $access_array->access_token;
}







