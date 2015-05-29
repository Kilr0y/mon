<?php

function detect_best_lang(){
    //takign site configs
    $config = get_config();
    
    //loading user agent helper
    get_instance()->load->library('user_agent');
    
    //taking array of accepted languages
    $languages = get_instance()->agent->languages();
    
    foreach ($languages as $lang){
        if (in_array($lang, $config['supported_languages'])){
            return $lang;
        }
    }
    
    return $config['default_language'];    
}