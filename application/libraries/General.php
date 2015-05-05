<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General {
    
    public function get_header_array($page){   
        
        $header = array();        
        $header['page_class'] = '';        
        $header['cloud_tags_state'] = get_cookie('topCloudState') && get_cookie('topCloudState') == 'closed' ? 'closed' : 'open';
        
        if ($page == 'index'){
            $header['page_class'] = 'container-index'; 
            $header['cloud_tags_visible'] = false;
        } else if ($page == 'torrent'){
            $header['cloud_tags_visible'] = false;
        } else if ($page == 'search'){
            $header['page_class'] = ''; 
            $header['cloud_tags_visible'] = true;
        } else {
            $header['page_class'] = 'container-index';
            $header['cloud_tags_visible'] = true;
        }
        
        $header['page'] = $page;
        
        return $header;
    }

    public function urltitle($title) {
        $title = trim($title);
    	$title = str_ireplace(' ', '_', $title);
    	$title = str_ireplace('%20', '_', $title);
    	$title = str_ireplace('{', '(', $title); 
    	$title = str_ireplace('}', ')', $title);
    	$title = str_ireplace('[', '(', $title);
    	$title = str_ireplace(']', ')', $title);
    	$title = str_ireplace('/', '', $title);
    	$title = str_ireplace('%', '', $title);
        $title = str_ireplace('!', '', $title);
        $title = str_replace(urlencode("'"), '', $title);
    	$title = str_ireplace(urlencode("{"), '(', $title);
    	$title = str_ireplace(urlencode("}"), '(', $title);
    	$title = str_ireplace(urlencode("["), '(', $title);
    	$title = str_ireplace(urlencode("]"), '(', $title);
    		
    	$title = str_ireplace(urlencode("("), '(', $title);
    	$title = str_ireplace(urlencode(")"), ')', $title);
    	$title = str_ireplace(urlencode("-"), '-', $title);
    	$title = str_ireplace(urlencode("+"), '+', $title);
    		
    	return $title;
    }
    
    public function get_rate_string($total_value, $total_votes){
        $rating = '0';
        if (! empty($total_value) && ! empty($total_votes)){
            $rating = ceil ($total_value / $total_votes);
        } 
        return $rating;
    }
    
    function torsize($size){ //MAIN SITEWIDE SIZE FUNCTION (HEX)
		if ($size >= 1099511627776)		{$size = number_format($size / 1099511627776, 2) . ' TB';}		
		elseif ($size >= 1073741824)	{$size = number_format($size / 1073741824, 2) . ' GB';}
        elseif ($size >= 1048576)		{$size = number_format($size / 1048576, 2) . ' MB';}
        elseif ($size >= 1024)			{$size = number_format($size / 1024, 2) . ' KB';}
        elseif ($size > 1)				{$size = $size . ' bytes';}
        elseif ($size == 1)				{$size = $size . ' byte';}
        else							{$size = '0 bytes';}
		
		return $size;
	}
    
    function ago($time){
       $periods = array("sec.", "min.", "hour", "day", "week", "month", "year", "decade");
       $lengths = array("60","60","24","7","4.35","12","10");
    
       $now = time();
    
           $difference     = $now - $time;
           $tense         = "ago";
    
       for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
           $difference /= $lengths[$j];
       }
    
       $difference = round($difference);
    
       if($difference != 1 && $periods[$j] != 'sec.' && $periods[$j] != 'min.') {
           $periods[$j].= "s";
       }
    
       return "$difference $periods[$j]";
    }
    
    public function trim_string($str){
        $trim_list = array(        
            '720p',
            'h264',
            'web-dl',
            'bdrip',
            '1080p',
            'web',
            'rip',
            'bluray',
            'blu-ray',
            'blu ray',
            'dvdrip',
            'dvd',
            'x264',
            'xvid',
            'webrip',
            'limited',
            'microhd',
            'mp4',
            'imax',
            'vhs',
            'uncut',
            'hd',
            'brrip',
            'hdtv'        
        );
        
        $result = str_replace('-', ' ', $str);
        $result = str_replace('.', ' ', $result);
        $result = str_replace('_', ' ', $result);
        $result = str_replace('(', ' ', $result);
        $result = str_replace(')', ' ', $result);
        $result = str_replace('[', ' ', $result);
        $result = str_replace(']', ' ', $result);
        
        $result = strtolower($result);
        
        foreach ($trim_list as $k=>$v){
            
            $pos = strpos($result, ' ' . $v); //search string should have white space before
            if ($pos !== false)
                $result = substr($result, 0, $pos);   
                         
        }
        return $result;
    }
    
    function base32_encode($inString) //Magnet Link
	{
		$outString = '';
		$compBits = '';
		$BASE32_TABLE = array(
				'00000' => 0x61,
				'00001' => 0x62,
				'00010' => 0x63,
				'00011' => 0x64,
				'00100' => 0x65,
				'00101' => 0x66,
				'00110' => 0x67,
				'00111' => 0x68,
				'01000' => 0x69,
				'01001' => 0x6a,
				'01010' => 0x6b,
				'01011' => 0x6c,
				'01100' => 0x6d,
				'01101' => 0x6e,
				'01110' => 0x6f,
				'01111' => 0x70,
				'10000' => 0x71,
				'10001' => 0x72,
				'10010' => 0x73,
				'10011' => 0x74,
				'10100' => 0x75,
				'10101' => 0x76,
				'10110' => 0x77,
				'10111' => 0x78,
				'11000' => 0x79,
				'11001' => 0x7a,
				'11010' => 0x32,
				'11011' => 0x33,
				'11100' => 0x34,
				'11101' => 0x35,
				'11110' => 0x36,
				'11111' => 0x37,
				);
	
		/* Turn the compressed string into a string that represents the bits as 0 and 1. */
		for ($i = 0; $i < strlen($inString); $i++) 
			{
				$compBits .= str_pad(decbin(ord(substr($inString,$i,1))), 8, '0', STR_PAD_LEFT);
			}
	
		/* Pad the value with enough 0's to make it a multiple of 5 */
		if((strlen($compBits) % 5) != 0) 
			{
				$compBits = str_pad($compBits, strlen($compBits)+(5-(strlen($compBits)%5)), '0', STR_PAD_RIGHT);
			}
	
		/* Create an array by chunking it every 5 chars */
		$fiveBitsArray = explode("\n",rtrim(chunk_split($compBits, 5, "\n")));
	
		/* Look-up each chunk and add it to $outstring */
		foreach($fiveBitsArray as $fiveBitsString) 
			{
				$outString .= chr($BASE32_TABLE[$fiveBitsString]);
			}

		return $outString;
	}
}



