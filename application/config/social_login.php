<?php

$config['social_config'] =  
	array(
		"callback_url" => "http://kilr0y.pp.ua/dev/monova/login/social_login", 

		"providers" => array ( 
			// openid providers
			"OpenID" => array (
				"enabled" => false
			),

			"Yahoo" => array ( 
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" ),
			),

			"AOL"  => array ( 
				"enabled" => false 
			),
            
			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1088916785426-9f26ibd07dnkgjii2142356v1f8bavsd.apps.googleusercontent.com", "secret" => "oN1vHegb3pIo5KiOA9yeaFHT" ), 
                "scope"   => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                             "https://www.googleapis.com/auth/userinfo.email"   , // optional
                "access_type"     => "offline"
			),            
            
            /*  Kilr0y's Google Acc
            "Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "690025269766-kutpg3kcv1jsacv81f2q521elq7uiegc.apps.googleusercontent.com", "secret" => "mFddD-866RvsHhQp8e7xU5EQ" ), 
                "scope"   => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                             "https://www.googleapis.com/auth/userinfo.email"   , // optional
                "access_type"     => "offline"
			),
            */

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1562255800717807", "secret" => "9d729359b367860692acce4bf62e3c67" ),
                "scope"   => "email",
				"trustForwarded" => false
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "FMs2QszT7lnmDAnlGqgdeIquC", "secret" => "fICcS61ZqsBimCleJAqNF1h8Zl8OYNFCZQHAeRhh1iggP0HmCN" ) 
			),
            
            "VK" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "4139148", "secret" => "9GhkcbPPAJgObHXDGmAt" ),
                "scope"   => "email" 
			),

			// windows live
			"Live" => array ( 
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),

			"LinkedIn" => array ( 
				"enabled" => false,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"Foursquare" => array (
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),
		),

		// If you want to enable logging, set 'debug_mode' to true.
		// You can also set it to
		// - "error" To log only error messages. Useful in production
		// - "info" To log info and error messages (ignore debug messages) 
		"debug_mode" => true,

		// Path to file writable by the web server. Required if 'debug_mode' is not false
		"debug_file" => "application/logs/social_login.log",
	);
