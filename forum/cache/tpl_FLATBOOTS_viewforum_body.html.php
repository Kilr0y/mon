<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


  <div class="side-segment"><h3><a href="<?php echo (isset($this->_rootref['U_VIEW_FORUM'])) ? $this->_rootref['U_VIEW_FORUM'] : ''; ?>"><?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?></a></h3></div> 

<?php if ($this->_rootref['FORUM_DESC'] || $this->_rootref['MODERATORS'] || $this->_rootref['U_MCP']) {  ?>

<div>
	<!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body --><?php if ($this->_rootref['FORUM_DESC']) {  ?><div style="display: none !important;"><?php echo (isset($this->_rootref['FORUM_DESC'])) ? $this->_rootref['FORUM_DESC'] : ''; ?><br /></div><?php } if ($this->_rootref['MODERATORS']) {  ?><p><strong><?php if ($this->_rootref['S_SINGLE_MODERATOR']) {  echo ((isset($this->_rootref['L_MODERATOR'])) ? $this->_rootref['L_MODERATOR'] : ((isset($user->lang['MODERATOR'])) ? $user->lang['MODERATOR'] : '{ MODERATOR }')); } else { echo ((isset($this->_rootref['L_MODERATORS'])) ? $this->_rootref['L_MODERATORS'] : ((isset($user->lang['MODERATORS'])) ? $user->lang['MODERATORS'] : '{ MODERATORS }')); } ?>:</strong> <?php echo (isset($this->_rootref['MODERATORS'])) ? $this->_rootref['MODERATORS'] : ''; ?></p><?php } ?>

</div>
<?php } if ($this->_rootref['S_FORUM_RULES']) {  ?>

<div class="alert alert-info fade in">
	<button class="close" data-dismiss="alert"><span class="awe-remove-circle"></span></button>
	<?php if ($this->_rootref['U_FORUM_RULES']) {  ?>

			<a href="<?php echo (isset($this->_rootref['U_FORUM_RULES'])) ? $this->_rootref['U_FORUM_RULES'] : ''; ?>"><i class="fa fa-link fa-rotate-90"></i> <?php echo ((isset($this->_rootref['L_FORUM_RULES'])) ? $this->_rootref['L_FORUM_RULES'] : ((isset($user->lang['FORUM_RULES'])) ? $user->lang['FORUM_RULES'] : '{ FORUM_RULES }')); ?></a>
		<?php } else { ?> 
		<strong><?php echo ((isset($this->_rootref['L_FORUM_RULES'])) ? $this->_rootref['L_FORUM_RULES'] : ((isset($user->lang['FORUM_RULES'])) ? $user->lang['FORUM_RULES'] : '{ FORUM_RULES }')); ?>:</strong> <?php echo (isset($this->_rootref['FORUM_RULES'])) ? $this->_rootref['FORUM_RULES'] : ''; ?>

		<?php } ?>

</div>
<?php } if ($this->_rootref['S_HAS_SUBFORUM']) {  if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_FORUMS']) {  ?>

      <ul class="pagination pagination-sm pull-right">
	    <li><a href="<?php echo (isset($this->_rootref['U_MARK_FORUMS'])) ? $this->_rootref['U_MARK_FORUMS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MARK_SUBFORUMS_READ'])) ? $this->_rootref['L_MARK_SUBFORUMS_READ'] : ((isset($user->lang['MARK_SUBFORUMS_READ'])) ? $user->lang['MARK_SUBFORUMS_READ'] : '{ MARK_SUBFORUMS_READ }')); ?></a></li>
      </ul>
<div class="space10"></div>
<?php } $this->_tpl_include('forumlist_body.html'); } if ($this->_rootref['S_DISPLAY_POST_INFO'] || $this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS'] || $this->_rootref['TOTAL_TOPICS']) {  ?>

<div class="clearfix"> 
	<?php if ($this->_rootref['S_DISPLAY_SEARCHBOX']) {  ?>

	<div class="pull-left">
		<form class="form-inline" method="get" id="topic-search" action="<?php echo (isset($this->_rootref['S_SEARCHBOX_ACTION'])) ? $this->_rootref['S_SEARCHBOX_ACTION'] : ''; ?>">
		<fieldset>
		 <div class="input-group input-group-sm">
		   <input type="text" class="form-control" name="keywords" id="search_keywords" value="<?php echo ((isset($this->_rootref['L_SEARCH_FORUM'])) ? $this->_rootref['L_SEARCH_FORUM'] : ((isset($user->lang['SEARCH_FORUM'])) ? $user->lang['SEARCH_FORUM'] : '{ SEARCH_FORUM }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_SEARCH_FORUM'])) ? $this->_rootref['L_SEARCH_FORUM'] : ((isset($user->lang['SEARCH_FORUM'])) ? $user->lang['SEARCH_FORUM'] : '{ SEARCH_FORUM }')); ?>"/>
		  <div class="input-group-btn">
		   <button class="btn btn-default" type="submit" value="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></button>
		  </div>
		 </div>
		 <?php echo (isset($this->_rootref['S_SEARCH_LOCAL_HIDDEN_FIELDS'])) ? $this->_rootref['S_SEARCH_LOCAL_HIDDEN_FIELDS'] : ''; ?>

		</fieldset>
		</form>
	</div>
	<?php } ?>


   <div class="pull-right">
     <ul class="pagination pagination-sm hidden-xs">
     <?php if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS'] || $this->_rootref['TOTAL_TOPICS']) {  if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_TOPICS']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_MARK_TOPICS'])) ? $this->_rootref['U_MARK_TOPICS'] : ''; ?>" accesskey="m"><?php echo ((isset($this->_rootref['L_MARK_TOPICS_READ'])) ? $this->_rootref['L_MARK_TOPICS_READ'] : ((isset($user->lang['MARK_TOPICS_READ'])) ? $user->lang['MARK_TOPICS_READ'] : '{ MARK_TOPICS_READ }')); ?></a></li><?php } if ($this->_rootref['TOTAL_POSTS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li><?php } else if ($this->_rootref['TOTAL_TOPICS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?></a></li><?php } if ($this->_rootref['TOTAL_USERS']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } } ?>

     </ul>
	
	<div class="visible-xs"> 
     <ul class="pagination pagination-sm">
	<?php if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS'] || $this->_rootref['TOTAL_TOPICS']) {  if ($this->_rootref['TOTAL_POSTS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li><?php } else if ($this->_rootref['TOTAL_TOPICS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?></a></li><?php } } ?>

	</ul>
	</div>
   </div>
</div>
   
<div class="clearfix">
   <div class="pull-right">
   <?php if (! $this->_rootref['S_IS_BOT']) {  if ($this->_rootref['S_WATCH_FORUM_LINK']) {  ?><a href="<?php echo (isset($this->_rootref['S_WATCH_FORUM_LINK'])) ? $this->_rootref['S_WATCH_FORUM_LINK'] : ''; ?>" role="button" class="btn btn-default" title="<?php echo (isset($this->_rootref['S_WATCH_FORUM_TITLE'])) ? $this->_rootref['S_WATCH_FORUM_TITLE'] : ''; ?>"><i <?php if ($this->_rootref['S_WATCHING_FORUM']) {  ?>class="fa fa-eye-slash"<?php } else { ?>class="fa fa-eye"<?php } ?>> </i></a><?php } } ?>

   </div>
   
   <div class="pull-left">
   <?php if ($this->_rootref['S_IS_LOCKED']) {  ?>

    <a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>" role="button" class="btn btn-danger"><i class="fa fa-lock"></i>&nbsp;<?php echo ((isset($this->_rootref['L_FORUM_LOCKED'])) ? $this->_rootref['L_FORUM_LOCKED'] : ((isset($user->lang['FORUM_LOCKED'])) ? $user->lang['FORUM_LOCKED'] : '{ FORUM_LOCKED }')); ?></a>
	<?php } else { ?>

	<a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>" role="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;<?php echo ((isset($this->_rootref['L_POST_TOPIC_NEW'])) ? $this->_rootref['L_POST_TOPIC_NEW'] : ((isset($user->lang['POST_TOPIC_NEW'])) ? $user->lang['POST_TOPIC_NEW'] : '{ POST_TOPIC_NEW }')); ?></a>
    <?php } ?>

   </div>
</div>

   <div class="space10"></div>
    <div class="space10"></div>
<?php } if ($this->_rootref['S_NO_READ_ACCESS']) {  ?>

	<div class="alert alert-danger fade in">
		<strong><?php echo ((isset($this->_rootref['L_NO_READ_ACCESS'])) ? $this->_rootref['L_NO_READ_ACCESS'] : ((isset($user->lang['NO_READ_ACCESS'])) ? $user->lang['NO_READ_ACCESS'] : '{ NO_READ_ACCESS }')); ?></strong>
	</div>	
<?php if (! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['S_IS_BOT']) {  ?>

  <section class="panel-login panel-w-form login-full">
            <div class="row">
                <?php if ($this->_rootref['S_REGISTER_ENABLED']) {  ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT'])) ? $this->_rootref['L_CREATE_ACCOUNT'] : ((isset($user->lang['CREATE_ACCOUNT'])) ? $user->lang['CREATE_ACCOUNT'] : '{ CREATE_ACCOUNT }')); ?></span>
				</div>
                    <p><?php echo ((isset($this->_rootref['L_LOGIN_INFO'])) ? $this->_rootref['L_LOGIN_INFO'] : ((isset($user->lang['LOGIN_INFO'])) ? $user->lang['LOGIN_INFO'] : '{ LOGIN_INFO }')); ?></p>
				    <p><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> &#124; <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></p>
					<p><a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a></p>
                </div>
				<?php } else { ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT_DISABLED'])) ? $this->_rootref['L_CREATE_ACCOUNT_DISABLED'] : ((isset($user->lang['CREATE_ACCOUNT_DISABLED'])) ? $user->lang['CREATE_ACCOUNT_DISABLED'] : '{ CREATE_ACCOUNT_DISABLED }')); ?></span>
				</div>
                    <p><?php echo ((isset($this->_rootref['L_REGISTRATION_DISABLED'])) ? $this->_rootref['L_REGISTRATION_DISABLED'] : ((isset($user->lang['REGISTRATION_DISABLED'])) ? $user->lang['REGISTRATION_DISABLED'] : '{ REGISTRATION_DISABLED }')); ?></p>
				    <p><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> &#124; <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></p>
					<p><a href="mailto:<?php echo (isset($this->_rootref['BOARD_EMAIL'])) ? $this->_rootref['BOARD_EMAIL'] : ''; ?>?subject=Registrations Closed&body=Dear Admin, %0A%0AI Just wanted to let you know that the board registrations are closed. %0A%0AThis might be an error and I would like to register. %0A%0APlease let me know if this is possible.%0A%0AThanks!" class="btn btn-default"><?php echo ((isset($this->_rootref['L_CONTACT_WEBMASTER'])) ? $this->_rootref['L_CONTACT_WEBMASTER'] : ((isset($user->lang['CONTACT_WEBMASTER'])) ? $user->lang['CONTACT_WEBMASTER'] : '{ CONTACT_WEBMASTER }')); ?></a></p>
                </div>
				<?php } ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_SIGN_IN_ACCOUNT'])) ? $this->_rootref['L_SIGN_IN_ACCOUNT'] : ((isset($user->lang['SIGN_IN_ACCOUNT'])) ? $user->lang['SIGN_IN_ACCOUNT'] : '{ SIGN_IN_ACCOUNT }')); ?></span>
				</div>
				 <form role="form" method="post" action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>">
				  <fieldset>
					<div class="form-group">
					 <label class="sr-only" for="username"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label>
					<div class="form-icon">
					 <input type="text" class="form-control input-lg" name="username" id="username" placeholder="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>">
					 <span class="fa fa-user login-form-icon"></span>
					</div> 
				    </div> 
					<div class="form-group">
					  <label class="sr-only" for="password"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</label>
					  <div class="form-icon">
						<input type="password" class="form-control input-lg" name="password" id="password" placeholder="<?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>">
						<span class="fa fa-lock login-form-icon"></span>
					  </div> 
					</div>
				 <p>
				    <?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?>

					<div class="checkbox pull-right">
					  <label for="autologin"><input type="checkbox" name="autologin" id="autologin"><?php echo ((isset($this->_rootref['L_LOGIN_REMEMBER'])) ? $this->_rootref['L_LOGIN_REMEMBER'] : ((isset($user->lang['LOGIN_REMEMBER'])) ? $user->lang['LOGIN_REMEMBER'] : '{ LOGIN_REMEMBER }')); ?></label>
					</div>
				    <?php } ?>

					<button type="submit" class="btn btn-primary" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING_LOG_IN'])) ? $this->_rootref['L_LOADING_LOG_IN'] : ((isset($user->lang['LOADING_LOG_IN'])) ? $user->lang['LOADING_LOG_IN'] : '{ LOADING_LOG_IN }')); ?> <i class='fa-spin fa fa-spinner fa-lg'></i>"><?php echo ((isset($this->_rootref['L_LOGIN_ME_IN'])) ? $this->_rootref['L_LOGIN_ME_IN'] : ((isset($user->lang['LOGIN_ME_IN'])) ? $user->lang['LOGIN_ME_IN'] : '{ LOGIN_ME_IN }')); ?></button>
					<?php echo (isset($this->_rootref['S_LOGIN_REDIRECT'])) ? $this->_rootref['S_LOGIN_REDIRECT'] : ''; ?>

				  </p>
				  </fieldset>
				  </form>
			    </div>  
            </div>
    </section>
<?php } } $_topicrow_count = (isset($this->_tpldata['topicrow'])) ? sizeof($this->_tpldata['topicrow']) : 0;if ($_topicrow_count) {for ($_topicrow_i = 0; $_topicrow_i < $_topicrow_count; ++$_topicrow_i){$_topicrow_val = &$this->_tpldata['topicrow'][$_topicrow_i]; if (! $_topicrow_val['S_TOPIC_TYPE_SWITCH'] && ! $_topicrow_val['S_FIRST_ROW']) {  ?>

	</table>
	</div>
	</div>
	<?php } if ($_topicrow_val['S_FIRST_ROW'] || ! $_topicrow_val['S_TOPIC_TYPE_SWITCH']) {  ?>

	<div class="panel panel-forum">
	<div class="panel-heading">
	 <?php if ($this->_rootref['S_DISPLAY_ACTIVE']) {  echo ((isset($this->_rootref['L_ACTIVE_TOPICS'])) ? $this->_rootref['L_ACTIVE_TOPICS'] : ((isset($user->lang['ACTIVE_TOPICS'])) ? $user->lang['ACTIVE_TOPICS'] : '{ ACTIVE_TOPICS }')); } else if ($_topicrow_val['S_TOPIC_TYPE_SWITCH'] && ( $_topicrow_val['S_POST_ANNOUNCE'] || $_topicrow_val['S_POST_GLOBAL'] )) {  echo ((isset($this->_rootref['L_ANNOUNCEMENTS'])) ? $this->_rootref['L_ANNOUNCEMENTS'] : ((isset($user->lang['ANNOUNCEMENTS'])) ? $user->lang['ANNOUNCEMENTS'] : '{ ANNOUNCEMENTS }')); } else { echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); } ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
	
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></th>
			<th class="large110" data-hide="phone"><?php echo ((isset($this->_rootref['L_TOPICS_POSTS_STATISTICS'])) ? $this->_rootref['L_TOPICS_POSTS_STATISTICS'] : ((isset($user->lang['TOPICS_POSTS_STATISTICS'])) ? $user->lang['TOPICS_POSTS_STATISTICS'] : '{ TOPICS_POSTS_STATISTICS }')); ?></th>
			<th class="large20" data-hide="phone"><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></th>
		</tr>
	</thead>		

	<tbody>
	<?php } ?>

		<tr>
			<td>
		        <?php if ($_topicrow_val['TOPIC_ICON_IMG'] && $this->_rootref['S_TOPIC_ICONS']) {  ?>

				<i class="topic-icon" style="background-image: url(<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_topicrow_val['TOPIC_ICON_IMG']; ?>); background-repeat: no-repeat;" title="<?php echo $_topicrow_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
				<?php } ?>

				<span class="icon-wrapper">
			    <i class="row-icon-font icon-moon-default2 <?php if ($_topicrow_val['S_POST_ANNOUNCE']) {  ?>icon-moon-voice2<?php } if ($_topicrow_val['S_POST_GLOBAL']) {  ?>icon-moon-podcast2<?php } if ($_topicrow_val['S_POST_STICKY']) {  ?> icon-moon-pushpin2<?php } if ($_topicrow_val['S_HAS_POLL']) {  ?>icon-moon-poll<?php } if ($_topicrow_val['S_TOPIC_MOVED']) {  ?>icon-moon-moved<?php } if ($_topicrow_val['S_UNREAD_TOPIC']) {  ?> forum-unread<?php } else { ?> forum-read<?php } ?>" title="<?php echo $_topicrow_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
				</span>
				<i class="row-icon-font-mini <?php if ($_topicrow_val['S_TOPIC_LOCKED']) {  ?>icon-moon-lock forumview-lock<?php } ?>" title="<?php echo $_topicrow_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
			  <span class="desc-wrapper">
				<?php if ($_topicrow_val['S_UNREAD_TOPIC']) {  ?><a href="<?php echo $_topicrow_val['U_NEWEST_POST']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_FIRST_UNREAD'])) ? $this->_rootref['L_VIEW_FIRST_UNREAD'] : ((isset($user->lang['VIEW_FIRST_UNREAD'])) ? $user->lang['VIEW_FIRST_UNREAD'] : '{ VIEW_FIRST_UNREAD }')); ?>"><i class="fa fa-asterisk"></i></a><?php } ?><a href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>" class="topictitle">&nbsp;<?php echo $_topicrow_val['TOPIC_TITLE']; ?></a>
				<?php if ($_topicrow_val['S_TOPIC_UNAPPROVED'] || $_topicrow_val['S_POSTS_UNAPPROVED']) {  ?><a href="<?php echo $_topicrow_val['U_MCP_QUEUE']; ?>" title="<?php echo ((isset($this->_rootref['L_TOPICS_ROW_NOT_APPROVED'])) ? $this->_rootref['L_TOPICS_ROW_NOT_APPROVED'] : ((isset($user->lang['TOPICS_ROW_NOT_APPROVED'])) ? $user->lang['TOPICS_ROW_NOT_APPROVED'] : '{ TOPICS_ROW_NOT_APPROVED }')); ?>">&nbsp;<i class="fa fa-question-circle"></i></a> <?php } if ($_topicrow_val['S_TOPIC_REPORTED']) {  ?><a href="<?php echo $_topicrow_val['U_MCP_REPORT']; ?>" title="<?php echo ((isset($this->_rootref['L_TOPICS_ROW_REPORTED'])) ? $this->_rootref['L_TOPICS_ROW_REPORTED'] : ((isset($user->lang['TOPICS_ROW_REPORTED'])) ? $user->lang['TOPICS_ROW_REPORTED'] : '{ TOPICS_ROW_REPORTED }')); ?>">&nbsp;<i class="fa fa-exclamation-circle text-danger"></i></a><?php } ?><br />
				<?php if ($_topicrow_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_topicrow_val['PAGINATION']; ?></span></strong><?php } if ($_topicrow_val['ATTACH_ICON_IMG']) {  ?><i class="fa fa-paperclip fa-flip-horizontal" rel="tooltip" data-placement="top" data-original-title="<?php echo ((isset($this->_rootref['L_ATTACH_FORUM'])) ? $this->_rootref['L_ATTACH_FORUM'] : ((isset($user->lang['ATTACH_FORUM'])) ? $user->lang['ATTACH_FORUM'] : '{ ATTACH_FORUM }')); ?>"></i><?php } ?>

				<?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['TOPIC_AUTHOR_FULL']; ?> 
				<small> - <?php echo $_topicrow_val['FIRST_POST_TIME']; ?></small>
			  </span>
			</td>
			<td class="stats-col">
			 <span class="stats-wrapper">
			 <?php echo $_topicrow_val['REPLIES']; ?> <?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?> <br /> <?php echo $_topicrow_val['VIEWS']; ?> <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?>

			 </span>
			</td>
			<td> 
			<span class="last-wrapper">
			 <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['LAST_POST_AUTHOR_FULL']; ?>

			 <?php if (! $this->_rootref['S_IS_BOT']) {  ?><a rel="tooltip" data-placement="right" data-original-title="<?php echo ((isset($this->_rootref['L_FORUMLIST_LASTPOST'])) ? $this->_rootref['L_FORUMLIST_LASTPOST'] : ((isset($user->lang['FORUMLIST_LASTPOST'])) ? $user->lang['FORUMLIST_LASTPOST'] : '{ FORUMLIST_LASTPOST }')); ?>" href="<?php echo $_topicrow_val['U_LAST_POST']; ?>"><i class="mobile-post fa fa-sign-out"></i></a> <?php } ?>

			 <br /><small><?php echo $_topicrow_val['LAST_POST_TIME']; ?></small>
			</span>
			</td>
		</tr>

	<?php if ($_topicrow_val['S_LAST_ROW']) {  ?>

	 </tbody>
	</table>
	</div>
    </div>
	<?php } }} else { if ($this->_rootref['S_IS_POSTABLE']) {  ?>

	<div class="well">
		<strong><?php echo ((isset($this->_rootref['L_NO_TOPICS'])) ? $this->_rootref['L_NO_TOPICS'] : ((isset($user->lang['NO_TOPICS'])) ? $user->lang['NO_TOPICS'] : '{ NO_TOPICS }')); ?></strong>
	</div>
	<?php } } ?>


<div class="clearfix">
 <div class="pull-left">
<?php if (sizeof($this->_tpldata['topicrow']) && ! $this->_rootref['S_DISPLAY_ACTIVE']) {  if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_DISPLAY_POST_INFO']) {  if ($this->_rootref['S_IS_LOCKED']) {  ?>

    <a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>" role="button" class="btn btn-danger"><i class="fa fa-lock"></i>&nbsp;<?php echo ((isset($this->_rootref['L_FORUM_LOCKED'])) ? $this->_rootref['L_FORUM_LOCKED'] : ((isset($user->lang['FORUM_LOCKED'])) ? $user->lang['FORUM_LOCKED'] : '{ FORUM_LOCKED }')); ?></a>
	<?php } else { ?>

	<a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>" role="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;<?php echo ((isset($this->_rootref['L_POST_TOPIC_NEW'])) ? $this->_rootref['L_POST_TOPIC_NEW'] : ((isset($user->lang['POST_TOPIC_NEW'])) ? $user->lang['POST_TOPIC_NEW'] : '{ POST_TOPIC_NEW }')); ?></a>
<?php } } } ?>

</div>


 <div class="pull-right">
    <?php if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS'] || $this->_rootref['TOTAL_TOPICS']) {  ?>

    <ul class="pagination pagination-sm hidden-xs">
	 <li><a title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li>
	 <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL_POSTS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li><?php } else if ($this->_rootref['TOTAL_TOPICS'] && ! $this->_rootref['NEWEST_USER']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?></a></li><?php } if ($this->_rootref['TOTAL_USERS']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

    </ul>
	
    <ul class="pagination pagination-sm visible-xs">
	 <?php if ($this->_rootref['TOTAL_USERS']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } ?>

	</ul>
	<?php } ?>

 </div>
</div>
	
<?php $this->_tpl_include('jump_links.html'); ?>

<div class="space10"></div>


<?php if ($this->_rootref['S_SELECT_SORT_DAYS'] && ! $this->_rootref['S_DISPLAY_ACTIVE']) {  ?>

	<div class="controls-row">
                    <div class="sorting collapse">
					 <div class="panel panel-default">
					  <div class="panel-body">
                        <div class="row">
					<?php if (! $this->_rootref['S_IS_BOT']) {  ?>

					<form class="form-horizontal" method="post" action="<?php echo (isset($this->_rootref['S_FORUM_ACTION'])) ? $this->_rootref['S_FORUM_ACTION'] : ''; ?>">
						<div class="col-md-3 col-sm-3"> 
                         <label for="bday_day"><?php echo ((isset($this->_rootref['L_DISPLAY'])) ? $this->_rootref['L_DISPLAY'] : ((isset($user->lang['DISPLAY'])) ? $user->lang['DISPLAY'] : '{ DISPLAY }')); ?>:</label>
                            <div class="control-row">
                              <?php echo (isset($this->_rootref['S_SELECT_SORT_DAYS'])) ? $this->_rootref['S_SELECT_SORT_DAYS'] : ''; ?>

                            </div>
						</div>
	 
	                    <div class="col-md-3 col-sm-3"> 
                          <label for="bday_day"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?> </label>
                            <div class="control-row">
                              <?php echo (isset($this->_rootref['S_SELECT_SORT_KEY'])) ? $this->_rootref['S_SELECT_SORT_KEY'] : ''; ?>

                            </div>
						</div>
							
						<div class="col-md-3 col-sm-3"> 
                           <label for="bday_day"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?></label>
                            <div class="control-row">
							<div class="input-group">
                             <?php echo (isset($this->_rootref['S_SELECT_SORT_DIR'])) ? $this->_rootref['S_SELECT_SORT_DIR'] : ''; ?>

							 <span class="input-group-btn">
                              <button class="btn btn-default" name="sort" type="submit"><?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?></button>
							</span>
							</div>
						    </div>   
						</div>
					</form>
						
						<div class="col-md-3 col-sm-3"> 
                         <label for="f" accesskey="j"><?php echo ((isset($this->_rootref['L_JUMP_TO'])) ? $this->_rootref['L_JUMP_TO'] : ((isset($user->lang['JUMP_TO'])) ? $user->lang['JUMP_TO'] : '{ JUMP_TO }')); ?>:</label>
                            <div class="control-row">
                              <?php $this->_tpl_include('jumpbox_options.html'); ?>

                            </div>
						</div>
						
	                <?php } ?>

                        </div>
                      </div>
					 </div>
					</div>
            <!-- // Widget --> 
	</div> 
<?php } if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

<div class="row">
<?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="panel panel-forum">
<div class="panel-heading"><?php if ($this->_rootref['U_VIEWONLINE']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEWONLINE'])) ? $this->_rootref['U_VIEWONLINE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?></a><?php } else { echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); } ?></div>
 <div class="panel-body">
	<p><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></p>
 </div> 
</div> 
</div> 
<?php } ?>


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="panel panel-forum">
<div class="panel-heading"><?php echo ((isset($this->_rootref['L_FORUM_PERMISSIONS'])) ? $this->_rootref['L_FORUM_PERMISSIONS'] : ((isset($user->lang['FORUM_PERMISSIONS'])) ? $user->lang['FORUM_PERMISSIONS'] : '{ FORUM_PERMISSIONS }')); ?></div>
  <div class="panel-body">
	<p><?php if ($this->_rootref['S_DISPLAY_POST_INFO']) {  $_rules_count = (isset($this->_tpldata['rules'])) ? sizeof($this->_tpldata['rules']) : 0;if ($_rules_count) {for ($_rules_i = 0; $_rules_i < $_rules_count; ++$_rules_i){$_rules_val = &$this->_tpldata['rules'][$_rules_i]; echo $_rules_val['RULE']; ?><br /><?php }} } else { echo ((isset($this->_rootref['L_NOT_AVAILABLE'])) ? $this->_rootref['L_NOT_AVAILABLE'] : ((isset($user->lang['NOT_AVAILABLE'])) ? $user->lang['NOT_AVAILABLE'] : '{ NOT_AVAILABLE }')); } ?></p>
  </div> 
</div> 
 </div>
</div>
<?php } $this->_tpl_include('overall_footer.html'); ?>