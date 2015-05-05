<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['torrent/(:num)/(:any)'] = 'torrent/index/$1';
$route['torrent/(:num)'] = 'torrent/index/$1';

$route['torrent/download/(:num)'] = 'torrent/download/$1';

$route['latest'] = 'main/latest';
$route['movies'] = 'main/category/1';
$route['books'] = 'main/category/7';
$route['games'] = 'main/category/4';
$route['anime'] = 'main/category/6';
$route['tv'] = 'main/category/8';
$route['music'] = 'main/category/3';
$route['software'] = 'main/category/5';
$route['pictures'] = 'main/category/10';
$route['other'] = 'main/category/9';
$route['adult'] = 'main/category/11';


$route['item/movies/(:num)'] = 'item/index/1/$1';
$route['item/movies/(:num)/(:any)'] = 'item/index/1/$1';
$route['item/books/(:num)'] = 'item/index/7/$1';
$route['item/books/(:num)/(:any)'] = 'item/index/7/$1';
$route['item/games/(:num)'] = 'item/index/4/$1';
$route['item/games/(:num)/(:any)'] = 'item/index/4/$1';
$route['item/anime/(:num)'] = 'item/index/6/$1';
$route['item/anime/(:num)/(:any)'] = 'item/index/6/$1';
$route['item/tv/(:num)'] = 'item/index/8/$1';
$route['item/tv/(:num)/(:any)'] = 'item/index/8/$1';
$route['item/music/(:num)'] = 'item/index/3/$1';
$route['item/music/(:num)/(:any)'] = 'item/index/3/$1';
$route['item/software/(:num)'] = 'item/index/5/$1';
$route['item/software/(:num)/(:any)'] = 'item/index/5/$1';
$route['item/pictures/(:num)'] = 'item/index/10/$1';
$route['item/pictures/(:num)/(:any)'] = 'item/index/10/$1';
$route['item/other/(:num)'] = 'item/index/9/$1';
$route['item/other/(:num)/(:any)'] = 'item/index/9/$1';
$route['item/adult/(:num)'] = 'item/index/11/$1';
$route['item/adult/(:num)/(:any)'] = 'item/index/11/$1';

$route['hot'] = 'main/hot/1';

$route['hot/movies'] = 'main/hot/1';
$route['hot/music'] = 'main/hot/3';
$route['hot/games'] = 'main/hot/4';
$route['hot/software'] = 'main/hot/5';
$route['hot/anime'] = 'main/hot/6';
$route['hot/books'] = 'main/hot/7';
$route['hot/tv'] = 'main/hot/8';
$route['hot/other'] = 'main/hot/9';
$route['hot/pictures'] = 'main/hot/10';
$route['hot/adult'] = 'main/hot/11';

$route["adult/clips"] = "main/subcategory/177";
$route["adult/games"] = "main/subcategory/179";
$route["adult/hentai"] = "main/subcategory/73";
$route["adult/movies"] = "main/subcategory/85";
$route["adult/dvdr"] = "main/subcategory/181";
$route["adult/hd"] = "main/subcategory/180";
$route["adult/other"] = "main/subcategory/175";
$route["adult/pictures"] = "main/subcategory/178";
$route["anime/cartoons"] = "main/subcategory/74";
$route["anime/other"] = "main/subcategory/19";
$route["books/audio-books"] = "main/subcategory/146";
$route["books/ebooks"] = "main/subcategory/145";
$route["games/console-other"] = "main/subcategory/92";
$route["games/fixes-patches"] = "main/subcategory/39";
$route["games/linux"] = "main/subcategory/147";
$route["games/mac"] = "main/subcategory/40";
$route["games/mobile"] = "main/subcategory/148";
$route["games/other"] = "main/subcategory/183";
$route["games/pc"] = "main/subcategory/12";
$route["games/roms"] = "main/subcategory/43";
$route["movies/3d"] = "main/subcategory/184";
$route["movies/action"] = "main/subcategory/1";
$route["movies/adventure"] = "main/subcategory/25";
$route["movies/animation"] = "main/subcategory/26";
$route["movies/asian"] = "main/subcategory/27";
$route["movies/automotive"] = "main/subcategory/154";
$route["movies/comedy"] = "main/subcategory/28";
$route["movies/concerts"] = "main/subcategory/29";
$route["movies/documentary"] = "main/subcategory/30";
$route["movies/drama"] = "main/subcategory/2";
$route["movies/dvdr"] = "main/subcategory/3";
$route["movies/family"] = "main/subcategory/31";
$route["movies/fantasy"] = "main/subcategory/32";
$route["movies/hd"] = "main/subcategory/173";
$route["movies/horror"] = "main/subcategory/33";
$route["movies/kids"] = "main/subcategory/76";
$route["movies/martial-arts"] = "main/subcategory/152";
$route["movies/mystery"] = "main/subcategory/77";
$route["movies/other"] = "main/subcategory/34";
$route["movies/romance"] = "main/subcategory/35";
$route["movies/samples-trailers"] = "main/subcategory/78";
$route["movies/sci-fi"] = "main/subcategory/37";
$route["movies/sports-related"] = "main/subcategory/79";
$route["movies/thriller"] = "main/subcategory/36";
$route["movies/war"] = "main/subcategory/153";
$route["music/alternative"] = "main/subcategory/8";
$route["music/amateur"] = "main/subcategory/163";
$route["music/anime"] = "main/subcategory/159";
$route["music/blues"] = "main/subcategory/45";
$route["music/classic"] = "main/subcategory/46";
$route["music/country-western"] = "main/subcategory/47";
$route["music/drum-n-bass"] = "main/subcategory/48";
$route["music/electronic"] = "main/subcategory/49";
$route["music/game-music"] = "main/subcategory/160";
$route["music/gothic"] = "main/subcategory/161";
$route["music/hardcore"] = "main/subcategory/51";
$route["music/house"] = "main/subcategory/182";
$route["music/industrial"] = "main/subcategory/88";
$route["music/jazz"] = "main/subcategory/89";
$route["music/karaoke"] = "main/subcategory/162";
$route["music/metal"] = "main/subcategory/52";
$route["music/old-school"] = "main/subcategory/165";
$route["music/other"] = "main/subcategory/11";
$route["music/pop"] = "main/subcategory/10";
$route["music/punk"] = "main/subcategory/55";
$route["music/r&b"] = "main/subcategory/56";
$route["music/rap-hiphop"] = "main/subcategory/9";
$route["music/reggae"] = "main/subcategory/90";
$route["music/religious"] = "main/subcategory/87";
$route["music/rock"] = "main/subcategory/54";
$route["music/soundtrack"] = "main/subcategory/50";
$route["music/techno"] = "main/subcategory/164";
$route["music/trance"] = "main/subcategory/53";
$route["music/video-clips"] = "main/subcategory/91";
$route["music/world"] = "main/subcategory/86";
$route["other/articles"] = "main/subcategory/171";
$route["other/comics"] = "main/subcategory/168";
$route["other/manuals"] = "main/subcategory/170";
$route["other/other"] = "main/subcategory/156";
$route["other/radio-shows"] = "main/subcategory/167";
$route["other/religion"] = "main/subcategory/169";
$route["other/video-clips"] = "main/subcategory/166";
$route["pictures/other"] = "main/subcategory/157";
$route["pictures/wallpaper"] = "main/subcategory/158";
$route["software/linux"] = "main/subcategory/18";
$route["software/mac"] = "main/subcategory/44";
$route["software/mobile"] = "main/subcategory/94";
$route["software/other"] = "main/subcategory/93";
$route["software/windows"] = "main/subcategory/17";
$route["tv/hd"] = "main/subcategory/174";
$route["tv/other"] = "main/subcategory/155";
