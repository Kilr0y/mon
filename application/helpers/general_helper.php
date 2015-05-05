<?php

function redirect($uri = '', $method = 'auto', $code = NULL){
    ci_redirect($uri = '', $method = 'auto', $code = NULL);
}

//translate function
function tr($text){
    //return get_instance()->config->item('track_language_errors') ? 'yes' : 'no';
    return get_instance()->lang->line($text, get_instance()->config->item('track_language_errors'));
}

