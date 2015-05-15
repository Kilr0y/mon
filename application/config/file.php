<?php
### FILE DEPENDANT CONFIGS ###

	# example: $config['file_config']["file-name"]["setting-type"]=value;

	### SETTINGS RELATED TO FOOTER CLOUDS ###
    $config['file_config'] = array();
	$config['file_config']["cloud"]["show_cloud_header"]			=	TRUE; //should it show first cloud
	$config['file_config']["cloud"]["item_count_header"]			=	30; //how many items to show on first cloud
	$config['file_config']["cloud"]["show_cloud_footer"]			=	TRUE; //should it show first cloud
	$config['file_config']["cloud"]["item_count_footer"]			=	30; //how many items to show on first cloud

	$config['file_config']["search"]["result_limitation"]		=	1000; //set limit of max results returned from mysql - speeds up and lowers usage - max is 15000 after that there are memory problems
	$config['file_config']["search"]["search_logging"]		    =	TRUE; //should search logging be turned on or off
	$config['file_config']["search"]["search_suggestion"]		=	TRUE; //should "Did you mean?" search suggestions be visible or not
	$config['file_config']["search"]["search_suggestion_no_results"]	=	FALSE; //should "May we suggest?" search suggestions be visible or not
	$config['file_config']["search"]["search_suggestion_no_results_min"]	=	3; //minimal count of suggestions - if not met then top 20 is loaded instead
	$config['file_config']["search"]["disable_cat_counters"]		=	0;	//if 1 then category counters are disabled by default

	$config['file_config']["search"]["blocking"]			=	TRUE; 	//should search block displaying of categories if adult disc is shown

	$config['file_config']["download"]["download_counter"]		=	FALSE; //should download counter be enabled or not
	$config['file_config']["download"]["download_comment_changer"]	=	TRUE; //should download change comment of torrent or not
	$config['file_config']["download"]["download_new_comment_text"]	=	"http://www.monova.org"; //text of new comment
	$config['file_config']["download"]["force_torcache"]		=	FALSE;	//should we force monova to use only torcache as torrent file source (no local files will be used)


	$config['file_config']["download"]["download_tracker_adder"]	=	TRUE; //should download add aditional trackers
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.istole.it:80/announce";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.openbittorrent.com:80";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.publicbt.com:80";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://open.demonii.com:1337/announce";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://exodus.desync.com:6969/announce";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.leechers-paradise.org:6969";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.pomf.se";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.blackunicorn.xyz:6969";
	$config['file_config']["download"]["download_trackers"][]		=	"udp://tracker.coppersurfer.tk:6969";


	$config['file_config']["download"]["remove_trackers"]		=	TRUE; //should download remove trackers listed bellow
	$config['file_config']["download"]["tracker_removal_replace"]	=	"udp://tracker.openbittorrent.com:80/announce"; //used to remove tracker if it was main tracker (it replaces it with this value
	$config['file_config']["download"]["tracker_removal"][]		=	"thepiratebay";	//removes trackers that contain specified keyword

	$config['file_config']["random_usenet"]["max_values"]		=	4;	//how many values take place in random from 1 to N where if 1 happens then it is go
	$config['file_config']["random_usenet"]["rss-download"]		=	TRUE;	//should random usenet exchange of link happen for rss download links?
	$config['file_config']["random_usenet"]["rss-details"]		=	TRUE;	//should random usenet exchange of link happen for rss details links?
	$config['file_config']["random_usenet"]["normal-details"]		=	FALSE;	//should random usenet exchange of link happen for noral details links?

## SETTING HARD CODED INTO IMPORT FILE 
	#$config['file_config']["imports"]["overwrite_db"]			=	FALSE; //Should imports overwrite DB entries on duplicate)

	$config['file_config']["related"]["page_limit"]			=	1;   //how many pages should be max visible

	$config['file_config']["rss"]["entry_limit"]			=	50; //how many entries displayed in RSS feed
	$config['file_config']["rss"]["live_download_entry_limit"]	=	20; //how many entries will contain live (direct) download link

	$config['file_config']["confirmed"]["display_subcats"]		=	0;   //should script display subcats or just its name and #

	$config['file_config']["contact"]["email"]			=	'monova.org@gmail.com';	//mail address to send contact form to
	$config['file_config']["contact"]["max_mails"]			=	3;	//how many mails to be sent during one session period

	$config['file_config']["export"]["torrents_per_cycle"]		=	50000;

	$config['file_config']["pizza_search"]["count"]			=	100;

	$config['file_config']["rss_search"]["count"]			=	100;	//both rss-search and rss_search

	$config['file_config']["sitemap"]["items_per_page"]		=	50000;	//affects sitemap and sitemap-update files

	$config['file_config']["upload"]["max_files"]			=	1500;	//how many files in one folder

	$config['file_config']["import"]["max_files"]			=	1500;	//affects all import_*.php files
	$config['file_config']["import"]["owner_user"]			=	"www-data"; //sets ownership for torrent file - affects all imports
	$config['file_config']["import"]["owner_group"]			=	"www-data";

	$config['file_config']["import_admin"]["offset"]			=	"-3 days";	//time offset of added items
	$config['file_config']["import_admin"]["subcat"]			=	"156";

	$config['file_config']["login"]["max_attempts"]			=	'5';	//how many attempts until lockdown for that IP
	$config['file_config']["login"]["lock_timeout"]			=	'3600';	//for how long is the lock down (in seconds)

	$config['file_config']["bans"]["enable_stats"]			=	TRUE;	//should bans.php log stats of usage
    
    $config['file_config']["details"]["auto_update"]          =   FALSE;  //Try to update seed/peer data automatically on page load
    $config['file_config']["details"]["view_update"]          =   FALSE;   //Increase views count on each page load
    
?>
