<?php if (!defined('IN_PHPBB')) exit; ?><!DOCTYPE html>
<html dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>
<meta charset="<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>">
<meta name="author" content="SiteSplat www.sitesplat.com">
<meta name="designer" content="SiteSplat www.sitesplat.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Set the viewport width to device width for mobile -->
<meta name="Description" content=""><!-- Set Your forum description here inside the "" tag -->
<meta name="Keywords" content=""><!-- Set Your forum keywords here inside the "" tag and make sure they are separated by a comma -->
<meta name="application-name" content="FLATBOOTS"><!-- WIN8 Tiles setup forum name -->
<meta name="msapplication-TileColor" content="#ffffff"><!-- WIN8 Tiles color --><!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<?php echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : ''; ?>

<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; if ($this->_rootref['S_IN_MCP']) {  ?> <?php echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); } else if ($this->_rootref['S_IN_UCP']) {  ?> <?php echo ((isset($this->_rootref['L_UCP'])) ? $this->_rootref['L_UCP'] : ((isset($user->lang['UCP'])) ? $user->lang['UCP'] : '{ UCP }')); } ?> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

<?php if ($this->_rootref['S_ENABLE_FEEDS']) {  if ($this->_rootref['S_ENABLE_FEEDS_OVERALL']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_NEWS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_NEWS'])) ? $this->_rootref['L_FEED_NEWS'] : ((isset($user->lang['FEED_NEWS'])) ? $user->lang['FEED_NEWS'] : '{ FEED_NEWS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=news" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUMS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_ALL_FORUMS'])) ? $this->_rootref['L_ALL_FORUMS'] : ((isset($user->lang['ALL_FORUMS'])) ? $user->lang['ALL_FORUMS'] : '{ ALL_FORUMS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=forums" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_NEW'])) ? $this->_rootref['L_FEED_TOPICS_NEW'] : ((isset($user->lang['FEED_TOPICS_NEW'])) ? $user->lang['FEED_TOPICS_NEW'] : '{ FEED_TOPICS_NEW }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS_ACTIVE']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_ACTIVE'])) ? $this->_rootref['L_FEED_TOPICS_ACTIVE'] : ((isset($user->lang['FEED_TOPICS_ACTIVE'])) ? $user->lang['FEED_TOPICS_ACTIVE'] : '{ FEED_TOPICS_ACTIVE }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics_active" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUM'] && $this->_rootref['S_FORUM_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?> - <?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPIC'] && $this->_rootref['S_TOPIC_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> - <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>&amp;t=<?php echo (isset($this->_rootref['S_TOPIC_ID'])) ? $this->_rootref['S_TOPIC_ID'] : ''; ?>" /><?php } } ?><!-- phpBB Premium style name: FLATBOOTS (3.0.2) @SiteSplat.com --><!-- CSS files start here-->
<link href="<?php echo (isset($this->_rootref['T_STYLESHEET_LINK'])) ? $this->_rootref['T_STYLESHEET_LINK'] : ''; ?>" rel="stylesheet">
<!-- Google free font here -->
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Asap:700' rel='stylesheet' type='text/css'>
<!-- CSS files --><!-- Scripts start here after the jquery.js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.min.js"></script>
<script>
// this loads jquery asyncrounously & in parallel
head.load("//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/bootstrap/js/bootstrap.min.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/bootstrap/js/bootstrap-select.min.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/forum_fn.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/twitterFetcher_v10_min.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/icheck.min.js", "<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/footable/js/footable.min.js");
</script>
<script>
function find_username(e){popup(e,760,570,"_usersearch");return false}var jump_page="<?php echo ((isset($this->_rootref['LA_JUMP_PAGE'])) ? $this->_rootref['LA_JUMP_PAGE'] : ((isset($this->_rootref['L_JUMP_PAGE'])) ? addslashes($this->_rootref['L_JUMP_PAGE']) : ((isset($user->lang['JUMP_PAGE'])) ? addslashes($user->lang['JUMP_PAGE']) : '{ JUMP_PAGE }'))); ?>:";var on_page="<?php echo (isset($this->_rootref['ON_PAGE'])) ? $this->_rootref['ON_PAGE'] : ''; ?>";var per_page="<?php echo (isset($this->_rootref['PER_PAGE'])) ? $this->_rootref['PER_PAGE'] : ''; ?>";var base_url="<?php echo (isset($this->_rootref['A_BASE_URL'])) ? $this->_rootref['A_BASE_URL'] : ''; ?>";var style_cookie="phpBBstyle";var style_cookie_settings="<?php echo (isset($this->_rootref['A_COOKIE_SETTINGS'])) ? $this->_rootref['A_COOKIE_SETTINGS'] : ''; ?>";var onload_functions=new Array;var onunload_functions=new Array;window.onload=function(){for(var i=0;i<onload_functions.length;i++){eval(onload_functions[i])}};window.onunload=function(){for(var i=0;i<onunload_functions.length;i++){eval(onunload_functions[i])}}
</script>
<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN'] && $this->_rootref['S_USER_PM_POPUP'] && $this->_rootref['S_DISPLAY_PM'] && ( $this->_rootref['S_USER_NEW_PRIVMSG'] || $this->_rootref['S_USER_UNREAD_PRIVMSG'] )) {  ?>

<script>
// lets load and call the function only if there is PM in the inbox
head.load("<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/vendors/jquery.cookie.min.js");
head.ready('jquery.cookie.min.js', function() {
$("#message1").toggleClass("in");var expires=new Date();expires.setMinutes(expires.getMinutes()+5);$("a.dismiss").click(function(){$.cookie("pmStatus","hidden",{expires:expires,path:"/"})});var pmStatus=$.cookie("pmStatus");if(pmStatus=="hidden"){$(".notifier-box").hide()};
});
</script>
<?php } ?>


</head>
<body id="phpbb" class="section-<?php echo (isset($this->_rootref['SCRIPT_NAME'])) ? $this->_rootref['SCRIPT_NAME'] : ''; ?> <?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>">

 <header role="banner" id="top" class="navbar navbar-inverse navbar-static-top flat-nav">
  <div class="container">
    <div class="navbar-header">
      <button data-target=".flat-nav-collapse" data-toggle="collapse" type="button" class="nav-tog lines-button x navbar-toggle neutro">
        <span class="sr-only"><?php echo ((isset($this->_rootref['L_TOGGLE_NAV'])) ? $this->_rootref['L_TOGGLE_NAV'] : ((isset($user->lang['TOGGLE_NAV'])) ? $user->lang['TOGGLE_NAV'] : '{ TOGGLE_NAV }')); ?></span>
        <span class="lines"></span>
      </button>
      <a class="navbar-brand" href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FLATBOOTS'])) ? $this->_rootref['L_FLATBOOTS'] : ((isset($user->lang['FLATBOOTS'])) ? $user->lang['FLATBOOTS'] : '{ FLATBOOTS }')); ?></a>
    </div>
	 <?php $this->_tpl_include('addons/navigation.html'); ?>

  </div>
 </header>
    <div class="search-input search-input-fullscreen">
	   <form method="get" id="search" role="search" action="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>">
		   <fieldset>
		   <input name="keywords" id="keywords" type="text" maxlength="128" title="<?php echo ((isset($this->_rootref['L_SEARCH_KEYWORDS'])) ? $this->_rootref['L_SEARCH_KEYWORDS'] : ((isset($user->lang['SEARCH_KEYWORDS'])) ? $user->lang['SEARCH_KEYWORDS'] : '{ SEARCH_KEYWORDS }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>" value="" autocomplete="off"/>
		   <div class="close">&times;</div>
		   <?php echo (isset($this->_rootref['S_SEARCH_HIDDEN_FIELDS'])) ? $this->_rootref['S_SEARCH_HIDDEN_FIELDS'] : ''; ?>

		   </fieldset> 
        </form> 
    </div>

   <?php $this->_tpl_include('addons/header_teaser_body.html'); ?>


<div class="dormient">
<div class="container">
  <!-- start content -->
  <div id="content-forum">
<!-- Subheader block --><!-- Subheader block -->
	<div class="breadcrumb-line clearfix">
		<ul class="breadcrumb">
		  <li><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" accesskey="h"><span class="icon fa fa-home"></span></a></li>
		  <li><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" accesskey="h"><?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?></a></li>
		  <?php $_navlinks_count = (isset($this->_tpldata['navlinks'])) ? sizeof($this->_tpldata['navlinks']) : 0;if ($_navlinks_count) {for ($_navlinks_i = 0; $_navlinks_i < $_navlinks_count; ++$_navlinks_i){$_navlinks_val = &$this->_tpldata['navlinks'][$_navlinks_i]; ?>

		  <li><a href="<?php echo $_navlinks_val['U_VIEW_FORUM']; ?>"><?php echo $_navlinks_val['FORUM_NAME']; ?></a></li>
		  <?php }} ?>

	    </ul>
	</div>

	<div id="page-body">
	 <main role="main">

	<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN'] && $this->_rootref['S_USER_PM_POPUP'] && $this->_rootref['S_DISPLAY_PM'] && ( $this->_rootref['S_USER_NEW_PRIVMSG'] || $this->_rootref['S_USER_UNREAD_PRIVMSG'] )) {  ?>

	<div class="notifier-box">
		 <div class="alert alert-info fade" id="message1" role="alert">
		   <button data-dismiss="alert" class="close"><span class="awe-remove-circle"></span></button>
		   <h4><?php echo ((isset($this->_rootref['L_HELLO'])) ? $this->_rootref['L_HELLO'] : ((isset($user->lang['HELLO'])) ? $user->lang['HELLO'] : '{ HELLO }')); ?> <?php echo (isset($this->_rootref['S_USERNAME'])) ? $this->_rootref['S_USERNAME'] : ''; ?></h4>
		   <a class="text-info" href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"> <?php echo ((isset($this->_rootref['L_YOU_HAVE'])) ? $this->_rootref['L_YOU_HAVE'] : ((isset($user->lang['YOU_HAVE'])) ? $user->lang['YOU_HAVE'] : '{ YOU_HAVE }')); ?> <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; if ($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD']) {  ?> <?php echo ((isset($this->_rootref['L_AND'])) ? $this->_rootref['L_AND'] : ((isset($user->lang['AND'])) ? $user->lang['AND'] : '{ AND }')); ?> <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'] : ''; } ?></a>
		 <div class="space10"></div>
		   <?php if ($this->_rootref['S_DISPLAY_PM'] && $this->_rootref['S_USER_NEW_PRIVMSG']) {  ?>

		   <a role="button" href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>" title="" class="btn btn-sm btn-success"><i class="icon-moon-emailforward"></i> <?php echo ((isset($this->_rootref['L_READ_NOW'])) ? $this->_rootref['L_READ_NOW'] : ((isset($user->lang['READ_NOW'])) ? $user->lang['READ_NOW'] : '{ READ_NOW }')); ?></a>
		   <?php } ?>

		   <a role="button" data-dismiss="alert" class="btn btn-sm btn-success dismiss"><i class="icon-moon-alarm2"></i> <?php echo ((isset($this->_rootref['L_DISMISS_PM'])) ? $this->_rootref['L_DISMISS_PM'] : ((isset($user->lang['DISMISS_PM'])) ? $user->lang['DISMISS_PM'] : '{ DISMISS_PM }')); ?></a>
		 </div>
	</div>
	<?php } if ($this->_rootref['S_BOARD_DISABLED'] && $this->_rootref['S_USER_LOGGED_IN'] && ( $this->_rootref['U_MCP'] || $this->_rootref['U_ACP'] )) {  ?>

	<div class="alert alert-warning fade in">
		<button data-dismiss="alert" class="close"><span class="awe-remove-circle"></span></button>
		<i class="fa fa-info-sign"></i> <strong><?php echo ((isset($this->_rootref['L_INFORMATION'])) ? $this->_rootref['L_INFORMATION'] : ((isset($user->lang['INFORMATION'])) ? $user->lang['INFORMATION'] : '{ INFORMATION }')); ?>:</strong> <?php echo ((isset($this->_rootref['L_BOARD_DISABLED'])) ? $this->_rootref['L_BOARD_DISABLED'] : ((isset($user->lang['BOARD_DISABLED'])) ? $user->lang['BOARD_DISABLED'] : '{ BOARD_DISABLED }')); ?>

	</div>
	<?php } ?>