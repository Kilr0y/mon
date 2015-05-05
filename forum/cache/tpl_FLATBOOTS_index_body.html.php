<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); $this->_tpl_include('forumlist_body.html'); if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

<div class="panel panel-forum panel-stats">
 <div class="panel-heading"><?php echo ((isset($this->_rootref['L_SITESPLAT_STATISTICS'])) ? $this->_rootref['L_SITESPLAT_STATISTICS'] : ((isset($user->lang['SITESPLAT_STATISTICS'])) ? $user->lang['SITESPLAT_STATISTICS'] : '{ SITESPLAT_STATISTICS }')); ?></div>
 <div class="panel-body">
    <div class="row">
	 <div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-acqua"><?php echo (isset($this->_rootref['SITESPLAT_CURRENTLY_ONLINE'])) ? $this->_rootref['SITESPLAT_CURRENTLY_ONLINE'] : ''; ?> <a data-toggle="collapse" data-target=".sorting" href="javascript:void(0);" title="Toggle list"><i class="fa fa-angle-double-down"></i></a></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_USERS_ONLINE'])) ? $this->_rootref['L_SITESPLAT_USERS_ONLINE'] : ((isset($user->lang['SITESPLAT_USERS_ONLINE'])) ? $user->lang['SITESPLAT_USERS_ONLINE'] : '{ SITESPLAT_USERS_ONLINE }')); ?></strong>
	   </div>
	   <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-seppia"><?php echo (isset($this->_rootref['SITESPLAT_RECORD_ONLINE'])) ? $this->_rootref['SITESPLAT_RECORD_ONLINE'] : ''; ?></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_MOST_USERS_ONLINE'])) ? $this->_rootref['L_SITESPLAT_MOST_USERS_ONLINE'] : ((isset($user->lang['SITESPLAT_MOST_USERS_ONLINE'])) ? $user->lang['SITESPLAT_MOST_USERS_ONLINE'] : '{ SITESPLAT_MOST_USERS_ONLINE }')); ?></strong>
	   </div>
	   <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-melograno"><?php echo (isset($this->_rootref['SITESPLAT_TOTAL_POSTS'])) ? $this->_rootref['SITESPLAT_TOTAL_POSTS'] : ''; ?></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_TOTAL_POSTS'])) ? $this->_rootref['L_SITESPLAT_TOTAL_POSTS'] : ((isset($user->lang['SITESPLAT_TOTAL_POSTS'])) ? $user->lang['SITESPLAT_TOTAL_POSTS'] : '{ SITESPLAT_TOTAL_POSTS }')); ?></strong>
	   </div>
	   <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-drank"><?php echo (isset($this->_rootref['SITESPLAT_TOTAL_TOPICS'])) ? $this->_rootref['SITESPLAT_TOTAL_TOPICS'] : ''; ?></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_TOTAL_TOPICS'])) ? $this->_rootref['L_SITESPLAT_TOTAL_TOPICS'] : ((isset($user->lang['SITESPLAT_TOTAL_TOPICS'])) ? $user->lang['SITESPLAT_TOTAL_TOPICS'] : '{ SITESPLAT_TOTAL_TOPICS }')); ?></strong>
	   </div>
	   <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-orange"><?php echo (isset($this->_rootref['SITESPLAT_TOTAL_USERS'])) ? $this->_rootref['SITESPLAT_TOTAL_USERS'] : ''; ?></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_TOTAL_USERS'])) ? $this->_rootref['L_SITESPLAT_TOTAL_USERS'] : ((isset($user->lang['SITESPLAT_TOTAL_USERS'])) ? $user->lang['SITESPLAT_TOTAL_USERS'] : '{ SITESPLAT_TOTAL_USERS }')); ?></strong>
	   </div>
	   <div class="col-md-2 col-sm-2 col-xs-4 text-center">
	    <span class="output text-red"><?php echo (isset($this->_rootref['SITESPLAT_NEWEST_USER'])) ? $this->_rootref['SITESPLAT_NEWEST_USER'] : ''; ?></span><strong><?php echo ((isset($this->_rootref['L_SITESPLAT_NEWEST_MEMBER'])) ? $this->_rootref['L_SITESPLAT_NEWEST_MEMBER'] : ((isset($user->lang['SITESPLAT_NEWEST_MEMBER'])) ? $user->lang['SITESPLAT_NEWEST_MEMBER'] : '{ SITESPLAT_NEWEST_MEMBER }')); ?></strong>
	   </div>
	  </div>
	</div>
 </div>
 <?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

	<div class="panel-footer sorting collapse">
	  <div class="clearfix">
		<span class="stats-heading"><?php echo (isset($this->_rootref['TOTAL_USERS_ONLINE'])) ? $this->_rootref['TOTAL_USERS_ONLINE'] : ''; ?> (<?php echo ((isset($this->_rootref['L_ONLINE_EXPLAIN'])) ? $this->_rootref['L_ONLINE_EXPLAIN'] : ((isset($user->lang['ONLINE_EXPLAIN'])) ? $user->lang['ONLINE_EXPLAIN'] : '{ ONLINE_EXPLAIN }')); ?>) <?php if ($this->_rootref['U_VIEWONLINE']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEWONLINE'])) ? $this->_rootref['U_VIEWONLINE'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?>"><i class="fa fa-question-circle"></i></a><?php } ?></span>
		<?php if ($this->_rootref['LEGEND']) {  ?><br /><small><?php echo ((isset($this->_rootref['L_LEGEND'])) ? $this->_rootref['L_LEGEND'] : ((isset($user->lang['LEGEND'])) ? $user->lang['LEGEND'] : '{ LEGEND }')); ?>: <?php echo (isset($this->_rootref['LEGEND'])) ? $this->_rootref['LEGEND'] : ''; ?></small><?php } ?>

		<p><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></p>
	 </div>
	 <?php if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST'] && $this->_rootref['BIRTHDAY_LIST']) {  ?>

		<p><?php if ($this->_rootref['BIRTHDAY_LIST']) {  echo ((isset($this->_rootref['L_BIRTHDAYS'])) ? $this->_rootref['L_BIRTHDAYS'] : ((isset($user->lang['BIRTHDAYS'])) ? $user->lang['BIRTHDAYS'] : '{ BIRTHDAYS }')); ?>, <?php echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>:<strong><?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?></strong><?php } else { echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); } ?></p>
	 <?php } ?>

	</div>
 <?php } ?>

</div>
<?php } $this->_tpl_include('overall_footer.html'); ?>