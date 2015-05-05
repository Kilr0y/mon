<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<div class="side-segment"><h3><a href="<?php echo (isset($this->_rootref['U_VIEW_TOPIC'])) ? $this->_rootref['U_VIEW_TOPIC'] : ''; ?>"><?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?></a></h3></div>
<!-- NOTE: remove the style="display: none" when you want to have the forum description on the topic body --><?php if ($this->_rootref['FORUM_DESC']) {  ?><div style="display: none !important;"><?php echo (isset($this->_rootref['FORUM_DESC'])) ? $this->_rootref['FORUM_DESC'] : ''; ?><br /></div><?php } if ($this->_rootref['MODERATORS']) {  ?>

<p>
	<strong><?php if ($this->_rootref['S_SINGLE_MODERATOR']) {  echo ((isset($this->_rootref['L_MODERATOR'])) ? $this->_rootref['L_MODERATOR'] : ((isset($user->lang['MODERATOR'])) ? $user->lang['MODERATOR'] : '{ MODERATOR }')); } else { echo ((isset($this->_rootref['L_MODERATORS'])) ? $this->_rootref['L_MODERATORS'] : ((isset($user->lang['MODERATORS'])) ? $user->lang['MODERATORS'] : '{ MODERATORS }')); } ?>:</strong> <?php echo (isset($this->_rootref['MODERATORS'])) ? $this->_rootref['MODERATORS'] : ''; ?>

</p>
<?php } if ($this->_rootref['S_FORUM_RULES']) {  ?>

<div class="alert alert-info fade in">
	<button class="close" data-dismiss="alert"><span class="awe-remove-circle"></span></button>
	<?php if ($this->_rootref['U_FORUM_RULES']) {  ?>

			<a href="<?php echo (isset($this->_rootref['U_FORUM_RULES'])) ? $this->_rootref['U_FORUM_RULES'] : ''; ?>"><i class="fa fa-link fa-rotate-90"></i>&nbsp;<?php echo ((isset($this->_rootref['L_FORUM_RULES'])) ? $this->_rootref['L_FORUM_RULES'] : ((isset($user->lang['FORUM_RULES'])) ? $user->lang['FORUM_RULES'] : '{ FORUM_RULES }')); ?></a>
		<?php } else { ?> 
		<strong><?php echo ((isset($this->_rootref['L_FORUM_RULES'])) ? $this->_rootref['L_FORUM_RULES'] : ((isset($user->lang['FORUM_RULES'])) ? $user->lang['FORUM_RULES'] : '{ FORUM_RULES }')); ?>:</strong>&nbsp;<?php echo (isset($this->_rootref['FORUM_RULES'])) ? $this->_rootref['FORUM_RULES'] : ''; ?>

		<?php } ?>

</div>
<?php } ?>


<div class="clearfix">
<?php if ($this->_rootref['S_DISPLAY_SEARCHBOX']) {  ?>

  <div class="pull-left">
	<form class="form-inline" method="get" id="topic-search" action="<?php echo (isset($this->_rootref['S_SEARCHBOX_ACTION'])) ? $this->_rootref['S_SEARCHBOX_ACTION'] : ''; ?>">
	 <fieldset>
	<div class="input-group input-group-sm">
      <input type="text" class="form-control" name="keywords" id="search_keywords" value="<?php echo ((isset($this->_rootref['L_SEARCH_TOPIC'])) ? $this->_rootref['L_SEARCH_TOPIC'] : ((isset($user->lang['SEARCH_TOPIC'])) ? $user->lang['SEARCH_TOPIC'] : '{ SEARCH_TOPIC }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_SEARCH_TOPIC'])) ? $this->_rootref['L_SEARCH_TOPIC'] : ((isset($user->lang['SEARCH_TOPIC'])) ? $user->lang['SEARCH_TOPIC'] : '{ SEARCH_TOPIC }')); ?>">
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
     <?php if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS']) {  if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a></li><?php } ?>

       <li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li>
	   <?php if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } } ?>

     </ul>
	
	<div class="visible-xs"> 
     <ul class="pagination pagination-sm">
	 <?php if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS']) {  ?>

	  <li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li>
	 <?php } ?>

	</ul>
	</div>
</div>

</div>

<div class="clearfix">
   <div class="pull-right">
        <div class="btn-group">
   			<?php if ($this->_rootref['U_EMAIL_TOPIC']) {  ?><a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_EMAIL_TOPIC'])) ? $this->_rootref['U_EMAIL_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_EMAIL_TOPIC'])) ? $this->_rootref['L_EMAIL_TOPIC'] : ((isset($user->lang['EMAIL_TOPIC'])) ? $user->lang['EMAIL_TOPIC'] : '{ EMAIL_TOPIC }')); ?>"><i class="fa fa-envelope"></i></a><?php } if ($this->_rootref['U_PRINT_TOPIC']) {  ?><a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_PRINT_TOPIC'])) ? $this->_rootref['U_PRINT_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_PRINT_TOPIC'])) ? $this->_rootref['L_PRINT_TOPIC'] : ((isset($user->lang['PRINT_TOPIC'])) ? $user->lang['PRINT_TOPIC'] : '{ PRINT_TOPIC }')); ?>" accesskey="p"><i class="fa fa-print"></i></a><?php } ?>

        </div>
 <?php if (! $this->_rootref['S_IS_BOT']) {  ?>

		<div class="btn-group">
			<?php if ($this->_rootref['U_WATCH_TOPIC']) {  ?><a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_WATCH_TOPIC'])) ? $this->_rootref['U_WATCH_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_WATCH_TOPIC'])) ? $this->_rootref['L_WATCH_TOPIC'] : ((isset($user->lang['WATCH_TOPIC'])) ? $user->lang['WATCH_TOPIC'] : '{ WATCH_TOPIC }')); ?>"><i <?php if ($this->_rootref['S_WATCHING_TOPIC']) {  ?>class="fa fa-eye-slash"<?php } else { ?>class="fa fa-eye"<?php } ?>> </i></a><?php } if ($this->_rootref['U_BOOKMARK_TOPIC']) {  ?><a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_BOOKMARK_TOPIC'])) ? $this->_rootref['U_BOOKMARK_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_BOOKMARK_TOPIC'])) ? $this->_rootref['L_BOOKMARK_TOPIC'] : ((isset($user->lang['BOOKMARK_TOPIC'])) ? $user->lang['BOOKMARK_TOPIC'] : '{ BOOKMARK_TOPIC }')); ?>"><i class="<?php echo (isset($this->_rootref['BOOKMARK_CLASS'])) ? $this->_rootref['BOOKMARK_CLASS'] : ''; ?>"></i></a><?php } if ($this->_rootref['U_BUMP_TOPIC']) {  ?><a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_BUMP_TOPIC'])) ? $this->_rootref['U_BUMP_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_BUMP_TOPIC'])) ? $this->_rootref['L_BUMP_TOPIC'] : ((isset($user->lang['BUMP_TOPIC'])) ? $user->lang['BUMP_TOPIC'] : '{ BUMP_TOPIC }')); ?>"><i class="fa fa-legal"></i></a><?php } ?>

		</div>
	<?php } ?>

   </div>
   
    <div class="pull-left">
   	<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_DISPLAY_REPLY_INFO']) {  if ($this->_rootref['S_IS_LOCKED']) {  ?>

    <a class="btn btn-danger" href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>" role="button"><i class="fa fa-lock"></i>&nbsp;<?php echo ((isset($this->_rootref['L_TOPIC_LOCKED_SHORT'])) ? $this->_rootref['L_TOPIC_LOCKED_SHORT'] : ((isset($user->lang['TOPIC_LOCKED_SHORT'])) ? $user->lang['TOPIC_LOCKED_SHORT'] : '{ TOPIC_LOCKED_SHORT }')); ?></a>
	<?php } else { ?>

	<a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>" role="button"><i class="fa fa-plus"></i>&nbsp;<?php echo ((isset($this->_rootref['L_REPLY'])) ? $this->_rootref['L_REPLY'] : ((isset($user->lang['REPLY'])) ? $user->lang['REPLY'] : '{ REPLY }')); ?></a>
    <?php } } ?>

   </div>
</div>

<div class="space10"></div>
 <div class="space10"></div>

<?php if ($this->_rootref['S_HAS_POLL']) {  ?>

<form method="post" action="<?php echo (isset($this->_rootref['S_POLL_ACTION'])) ? $this->_rootref['S_POLL_ACTION'] : ''; ?>">
<fieldset>
<div class="panel panel-default panel-poll">
 <div class="panel-heading">
    <h3 class=""><?php echo (isset($this->_rootref['POLL_QUESTION'])) ? $this->_rootref['POLL_QUESTION'] : ''; ?></h3>
	<?php if ($this->_rootref['S_CAN_VOTE'] && $this->_rootref['L_POLL_LENGTH']) {  ?>

	<div class="alert alert-info fade in">
     <i class="fa fa-bar-chart-o"></i> <?php echo ((isset($this->_rootref['L_POLL_LENGTH'])) ? $this->_rootref['L_POLL_LENGTH'] : ((isset($user->lang['POLL_LENGTH'])) ? $user->lang['POLL_LENGTH'] : '{ POLL_LENGTH }')); ?>

    </div>
	<?php } ?>

 </div>
<div class="panel-body">
<?php $_poll_option_count = (isset($this->_tpldata['poll_option'])) ? sizeof($this->_tpldata['poll_option']) : 0;if ($_poll_option_count) {for ($_poll_option_i = 0; $_poll_option_i < $_poll_option_count; ++$_poll_option_i){$_poll_option_val = &$this->_tpldata['poll_option'][$_poll_option_i]; ?>

  <div class="clearfix">
   <?php if ($this->_rootref['S_CAN_VOTE']) {  if ($this->_rootref['S_IS_MULTI_CHOICE']) {  ?>

   <div class="pull-left">
   <input type="checkbox" name="vote_id[]" id="vote_<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>" value="<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> checked="checked"<?php } ?>><label for="vote_<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"><?php echo $_poll_option_val['POLL_OPTION_CAPTION']; ?></label>
   </div>
   <?php } else { ?>

   <div class="pull-left">
   <input type="radio" name="vote_id[]" id="vote_<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>" value="<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> checked="checked"<?php } ?>><label for="vote_<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"><?php echo $_poll_option_val['POLL_OPTION_CAPTION']; ?></label>
   </div>
   <?php } } else { ?><label><?php echo $_poll_option_val['POLL_OPTION_CAPTION']; ?></label><?php } if ($this->_rootref['S_DISPLAY_RESULTS']) {  ?>

   <div class="pull-right">
   <span class="badge<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> badge-info<?php } ?>"<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> title="<?php echo ((isset($this->_rootref['L_POLL_VOTED_OPTION'])) ? $this->_rootref['L_POLL_VOTED_OPTION'] : ((isset($user->lang['POLL_VOTED_OPTION'])) ? $user->lang['POLL_VOTED_OPTION'] : '{ POLL_VOTED_OPTION }')); ?>"<?php } ?>><?php echo $_poll_option_val['POLL_OPTION_RESULT']; ?></span>
   </div>
   <?php } ?>

 </div>
  
	<div class="progress progress-striped<?php if ($_poll_option_val['POLL_OPTION_PCT'] == (100)) {  ?> active<?php } ?>" <?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?>title="<?php echo ((isset($this->_rootref['L_POLL_VOTED_OPTION'])) ? $this->_rootref['L_POLL_VOTED_OPTION'] : ((isset($user->lang['POLL_VOTED_OPTION'])) ? $user->lang['POLL_VOTED_OPTION'] : '{ POLL_VOTED_OPTION }')); ?>"<?php } ?>>
     <?php if ($this->_rootref['S_DISPLAY_RESULTS']) {  ?>

	   <div role="progressbar" aria-valuenow="<?php echo $_poll_option_val['POLL_OPTION_PERCENT']; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar<?php if ($_poll_option_val['POLL_OPTION_PCT'] < (20)) {  ?> progress-bar-danger<?php } else if ($_poll_option_val['POLL_OPTION_PCT'] < (40)) {  ?> progress-bar-warning<?php } else if ($_poll_option_val['POLL_OPTION_PCT'] < (60)) {  ?> progress-bar-info<?php } else if ($_poll_option_val['POLL_OPTION_PCT'] < (80)) {  ?> progress-bar-warning<?php } else { ?> progress-bar-success<?php } ?>" style="width:<?php echo $_poll_option_val['POLL_OPTION_PERCENT']; ?>">
	    <?php if ($_poll_option_val['POLL_OPTION_RESULT'] == 0) {  ?><span class="poll-na"><?php echo ((isset($this->_rootref['L_NO_VOTES_NA'])) ? $this->_rootref['L_NO_VOTES_NA'] : ((isset($user->lang['NO_VOTES_NA'])) ? $user->lang['NO_VOTES_NA'] : '{ NO_VOTES_NA }')); ?></span><?php } else { echo $_poll_option_val['POLL_OPTION_PERCENT']; } ?>

	   </div>
	  <?php } ?>

    </div>
<?php }} ?>

</div>
<div class="panel-footer">
  <div class="clearfix">
    <ul class="list-unstyled pull-left">
	<?php if (! $this->_rootref['S_DISPLAY_RESULTS']) {  ?>

    <li><a href="<?php echo (isset($this->_rootref['U_VIEW_RESULTS'])) ? $this->_rootref['U_VIEW_RESULTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_RESULTS'])) ? $this->_rootref['L_VIEW_RESULTS'] : ((isset($user->lang['VIEW_RESULTS'])) ? $user->lang['VIEW_RESULTS'] : '{ VIEW_RESULTS }')); ?></a></li>
	<?php } if ($this->_rootref['S_DISPLAY_RESULTS']) {  ?>

	<li><?php echo ((isset($this->_rootref['L_TOTAL_VOTES'])) ? $this->_rootref['L_TOTAL_VOTES'] : ((isset($user->lang['TOTAL_VOTES'])) ? $user->lang['TOTAL_VOTES'] : '{ TOTAL_VOTES }')); ?> : <?php echo (isset($this->_rootref['TOTAL_VOTES'])) ? $this->_rootref['TOTAL_VOTES'] : ''; ?></li>
	<?php } if ($this->_rootref['S_CAN_VOTE']) {  ?>

	<li><?php echo ((isset($this->_rootref['L_MAX_VOTES'])) ? $this->_rootref['L_MAX_VOTES'] : ((isset($user->lang['MAX_VOTES'])) ? $user->lang['MAX_VOTES'] : '{ MAX_VOTES }')); ?></li>
	<?php } ?>

	</ul>
	<?php if ($this->_rootref['S_CAN_VOTE']) {  ?>

	<div class="pull-right"><button type="submit" class="btn btn-default" name="update" value="<?php echo ((isset($this->_rootref['L_SUBMIT_VOTE'])) ? $this->_rootref['L_SUBMIT_VOTE'] : ((isset($user->lang['SUBMIT_VOTE'])) ? $user->lang['SUBMIT_VOTE'] : '{ SUBMIT_VOTE }')); ?>" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_CASTING_VOTE'])) ? $this->_rootref['L_CASTING_VOTE'] : ((isset($user->lang['CASTING_VOTE'])) ? $user->lang['CASTING_VOTE'] : '{ CASTING_VOTE }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>"><i class="fa fa-external-link"></i>&nbsp;<?php echo ((isset($this->_rootref['L_SUBMIT_VOTE'])) ? $this->_rootref['L_SUBMIT_VOTE'] : ((isset($user->lang['SUBMIT_VOTE'])) ? $user->lang['SUBMIT_VOTE'] : '{ SUBMIT_VOTE }')); ?></button></div>
	<?php } ?>

  </div>
</div>
    <?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	 <?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

</div>
</fieldset>
</form>
<?php } $_postrow_count = (isset($this->_tpldata['postrow'])) ? sizeof($this->_tpldata['postrow']) : 0;if ($_postrow_count) {for ($_postrow_i = 0; $_postrow_i < $_postrow_count; ++$_postrow_i){$_postrow_val = &$this->_tpldata['postrow'][$_postrow_i]; if ($_postrow_val['S_FIRST_UNREAD']) {  ?><a id="unread"></a><?php } ?>

<div id="p<?php echo $_postrow_val['POST_ID']; ?>" class="clearfix">	
 <article role="article">
    <?php if ($_postrow_val['S_IGNORE_POST']) {  ?>

	   <div class="ignore"><?php echo $_postrow_val['L_IGNORE_POST']; ?></div>
	<?php } else { ?>

  <div class="panel forum-answer <?php if ($_postrow_val['S_ONLINE'] && ! $_postrow_val['S_IGNORE_POST']) {  ?>mobile-online<?php } ?>">
    <div class="panel-heading">
	  <div class="clearfix">
        <?php if (! $_postrow_val['S_IGNORE_POST']) {  ?>

         <div id="profile<?php echo $_postrow_val['POST_ID']; ?>">
			<div class="avatar-over pull-left">
				<?php if ($_postrow_val['POSTER_AVATAR']) {  if ($_postrow_val['U_POST_AUTHOR']) {  ?><a href="javascript:void(0)" data-toggle="modal" data-target="#mini<?php echo $_postrow_val['POST_ID']; ?>" title="<?php echo ((isset($this->_rootref['L_USER_MINI_PROFILE'])) ? $this->_rootref['L_USER_MINI_PROFILE'] : ((isset($user->lang['USER_MINI_PROFILE'])) ? $user->lang['USER_MINI_PROFILE'] : '{ USER_MINI_PROFILE }')); ?>"><?php echo $_postrow_val['POSTER_AVATAR']; ?></a><?php } else { echo $_postrow_val['POSTER_AVATAR']; } } else { ?>

					<a href="javascript:void(0)" data-toggle="modal" data-target="#mini<?php echo $_postrow_val['POST_ID']; ?>" title="<?php echo ((isset($this->_rootref['L_USER_MINI_PROFILE'])) ? $this->_rootref['L_USER_MINI_PROFILE'] : ((isset($user->lang['USER_MINI_PROFILE'])) ? $user->lang['USER_MINI_PROFILE'] : '{ USER_MINI_PROFILE }')); ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/no_avatar.gif" alt=""></a>
				<?php } if ($_postrow_val['S_ONLINE'] && ! $_postrow_val['S_IGNORE_POST']) {  ?> 
				<span class="status"><i class="fa fa-circle text-online"></i></span>
				<?php } ?>

			</div>
         </div>
		<?php } ?>

		
		<div class="side-segment"><h3 style="border-bottom: 4px solid #e5e5e5;"><?php if ($_postrow_val['POST_ICON_IMG']) {  ?><img class="post-icon" src="<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_postrow_val['POST_ICON_IMG']; ?>" width="<?php echo $_postrow_val['POST_ICON_IMG_WIDTH']; ?>" height="<?php echo $_postrow_val['POST_ICON_IMG_HEIGHT']; ?>" alt=""/><?php } ?><a href="#p<?php echo $_postrow_val['POST_ID']; ?>"><?php echo $_postrow_val['POST_SUBJECT']; ?></a> <span class="pull-right post-id hidden-xs"><a href="<?php echo $_postrow_val['U_MINI_POST']; ?>" title="Post" >&#35;<?php echo $_postrow_val['POST_ID']; ?></a></span></h3></div>    
		<div class="text-muted pull-left">
		 <?php echo ((isset($this->_rootref['L_BY'])) ? $this->_rootref['L_BY'] : ((isset($user->lang['BY'])) ? $user->lang['BY'] : '{ BY }')); if (! $_postrow_val['U_POST_AUTHOR']) {  echo $_postrow_val['POST_AUTHOR_FULL']; ?> <?php } else { ?> <?php echo $_postrow_val['POST_AUTHOR_FULL']; } ?> <span class="hidden-xs">&#45; <i class="fa fa-clock-o"></i> <?php echo $_postrow_val['POST_DATE']; ?></span>
		 <ul class="user-info list-unstyled text-muted">
		  <li class="share-box">
				    <div class="modal fade" id="mini<?php echo $_postrow_val['POST_ID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						  <h4 class="modal-title"><?php echo ((isset($this->_rootref['L_USER_MINI_PROFILE'])) ? $this->_rootref['L_USER_MINI_PROFILE'] : ((isset($user->lang['USER_MINI_PROFILE'])) ? $user->lang['USER_MINI_PROFILE'] : '{ USER_MINI_PROFILE }')); ?></h4>
						</div>
						<div class="modal-body">
						  <div class="row profile-data">
							<!-- Left Side Start -->
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-center">
							  <!-- Profile Avatar Start -->
							  <div class="profile-avatar">
								<?php if ($_postrow_val['POSTER_AVATAR']) {  if ($_postrow_val['U_POST_AUTHOR']) {  ?><a href="<?php echo $_postrow_val['U_POST_AUTHOR']; ?>"><?php echo $_postrow_val['POSTER_AVATAR']; ?></a><?php } else { echo $_postrow_val['POSTER_AVATAR']; } } else { ?>

									   <img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/no_avatar.gif" alt="">
								<?php } ?>

							  </div>
							  <!-- Profile Avatar End --><?php if ($_postrow_val['RANK_TITLE'] && $_postrow_val['RANK_IMG']) {  ?>

							<div class="profile-rank text-center">
							<?php echo $_postrow_val['RANK_IMG']; ?>

							</div>
							<?php } if ($_postrow_val['U_POST_AUTHOR']) {  ?>

							 <a class="btn btn-sm btn-default" title="" href="<?php echo $_postrow_val['U_POST_AUTHOR']; ?>"><?php echo ((isset($this->_rootref['L_USER_MINI_PROFILE_VIEW_FULL'])) ? $this->_rootref['L_USER_MINI_PROFILE_VIEW_FULL'] : ((isset($user->lang['USER_MINI_PROFILE_VIEW_FULL'])) ? $user->lang['USER_MINI_PROFILE_VIEW_FULL'] : '{ USER_MINI_PROFILE_VIEW_FULL }')); ?></a>
							<?php } ?>

							</div>
							<!-- Left Side End --><!-- Right Side Start -->
							<div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
							 <h3><?php if (! $_postrow_val['U_POST_AUTHOR']) {  echo $_postrow_val['POST_AUTHOR_FULL']; ?> <?php } else { ?> <?php echo $_postrow_val['POST_AUTHOR_FULL']; } ?></h3>
							  <ul class="icon-list list-unstyled">
								<?php if ($_postrow_val['RANK_TITLE'] || $_postrow_val['RANK_IMG']) {  ?><li><i class="fa fa-sitemap"></i> <?php echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?>: <?php echo $_postrow_val['RANK_TITLE']; ?></li><?php } if ($_postrow_val['POSTER_POSTS'] != ('')) {  ?><li><i class="fa fa-comments"></i> <?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?>: <?php echo $_postrow_val['POSTER_POSTS']; ?></li><?php } if ($_postrow_val['POSTER_JOINED']) {  ?><li><i class="fa fa-calendar"></i> <?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>: <?php echo $_postrow_val['POSTER_JOINED']; ?></li><?php } if ($_postrow_val['POSTER_FROM']) {  ?><li><i class="fa fa-map-marker"></i> <?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?>: <?php echo $_postrow_val['POSTER_FROM']; ?></li><?php } ?>

								<li><i class="fa fa-bolt"></i> <?php echo ((isset($this->_rootref['L_USER_STATUS'])) ? $this->_rootref['L_USER_STATUS'] : ((isset($user->lang['USER_STATUS'])) ? $user->lang['USER_STATUS'] : '{ USER_STATUS }')); ?>:<?php if ($_postrow_val['S_ONLINE'] && ! $_postrow_val['S_IGNORE_POST']) {  ?> <?php echo ((isset($this->_rootref['L_ONLINE'])) ? $this->_rootref['L_ONLINE'] : ((isset($user->lang['ONLINE'])) ? $user->lang['ONLINE'] : '{ ONLINE }')); } else { ?> <?php echo ((isset($this->_rootref['L_OFF_LINE'])) ? $this->_rootref['L_OFF_LINE'] : ((isset($user->lang['OFF_LINE'])) ? $user->lang['OFF_LINE'] : '{ OFF_LINE }')); } ?></li>
								<?php $_custom_fields_count = (isset($_postrow_val['custom_fields'])) ? sizeof($_postrow_val['custom_fields']) : 0;if ($_custom_fields_count) {for ($_custom_fields_i = 0; $_custom_fields_i < $_custom_fields_count; ++$_custom_fields_i){$_custom_fields_val = &$_postrow_val['custom_fields'][$_custom_fields_i]; ?><li><i class="fa fa-star"></i> <?php echo $_custom_fields_val['PROFILE_FIELD_NAME']; ?>: <?php echo $_custom_fields_val['PROFILE_FIELD_VALUE']; ?></li><?php }} ?><!-- Use a construct like this to include admin defined profile fields. Replace FIELD1 with the name of your field. --><?php if ($_postrow_val['S_PROFILE_FIELD1']) {  ?>

								<li><i class="fa fa-star"></i> 
								  <?php echo $_postrow_val['PROFILE_FIELD1_NAME']; ?>: <?php echo $_postrow_val['PROFILE_FIELD1_VALUE']; ?>

								</li>
								<?php } ?>

							  </ul>
							</div>
							<!-- Right Side End -->
                         </div>
						</div>
						<div class="modal-footer">
						<?php if (! $this->_rootref['S_IS_BOT']) {  if ($_postrow_val['U_PM'] || $_postrow_val['U_EMAIL'] || $_postrow_val['U_WWW'] || $_postrow_val['U_MSN'] || $_postrow_val['U_ICQ'] || $_postrow_val['U_YIM'] || $_postrow_val['U_AIM'] || $_postrow_val['U_JABBER']) {  ?>

						
						  <div class="clearfix">
						  <ul class="mini-profile-contact">
							<?php if ($_postrow_val['U_PM']) {  ?><li><a class="default-contact" href="<?php echo $_postrow_val['U_PM']; ?>" title="<?php echo ((isset($this->_rootref['L_PRIVATE_MESSAGE'])) ? $this->_rootref['L_PRIVATE_MESSAGE'] : ((isset($user->lang['PRIVATE_MESSAGE'])) ? $user->lang['PRIVATE_MESSAGE'] : '{ PRIVATE_MESSAGE }')); ?>"><i class="fa fa-envelope"></i></a></li><?php } if ($_postrow_val['U_EMAIL']) {  ?><li><a class="default-contact" href="<?php echo $_postrow_val['U_EMAIL']; ?>" title="<?php echo ((isset($this->_rootref['L_SEND_EMAIL_USER'])) ? $this->_rootref['L_SEND_EMAIL_USER'] : ((isset($user->lang['SEND_EMAIL_USER'])) ? $user->lang['SEND_EMAIL_USER'] : '{ SEND_EMAIL_USER }')); ?> <?php echo $_postrow_val['POST_AUTHOR']; ?>"><i class="fa fa-send"></i></a></li><?php } if ($_postrow_val['U_WWW']) {  ?><li><a class="default-contact" href="<?php echo $_postrow_val['U_WWW']; ?>" title="<?php echo ((isset($this->_rootref['L_VISIT_WEBSITE'])) ? $this->_rootref['L_VISIT_WEBSITE'] : ((isset($user->lang['VISIT_WEBSITE'])) ? $user->lang['VISIT_WEBSITE'] : '{ VISIT_WEBSITE }')); ?>: <?php echo $_postrow_val['U_WWW']; ?>"><i class="fa fa-globe"></i></a></li><?php } if ($_postrow_val['U_MSN']) {  ?><li><a class="linkedin" href="<?php echo $_postrow_val['U_MSN']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_MSNM'])) ? $this->_rootref['L_MSNM'] : ((isset($user->lang['MSNM'])) ? $user->lang['MSNM'] : '{ MSNM }')); ?>"><i class="fa fa-windows"></i> </a></li><?php } ?><!-- remove style="display:none;" to make these set visible. All these are obsolete and should be replaced with Twitter,google+ for example.  --><?php if ($_postrow_val['U_ICQ']) {  ?><li><a style="display:none;" class="btn btn-xs" href="<?php echo $_postrow_val['U_ICQ']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_ICQ'])) ? $this->_rootref['L_ICQ'] : ((isset($user->lang['ICQ'])) ? $user->lang['ICQ'] : '{ ICQ }')); ?>"><i class="fa fa-comment"></i> ICQ</a></li><?php } if ($_postrow_val['U_YIM']) {  ?><li><a style="display:none;" class="btn btn-xs" href="<?php echo $_postrow_val['U_YIM']; ?>" onclick="popup(this.href, 780, 550); return false;" title="<?php echo ((isset($this->_rootref['L_YIM'])) ? $this->_rootref['L_YIM'] : ((isset($user->lang['YIM'])) ? $user->lang['YIM'] : '{ YIM }')); ?>"><i class="fa fa-comment"></i> YIM</a></li><?php } if ($_postrow_val['U_AIM']) {  ?><li><a style="display:none;" class="btn btn-xs" href="<?php echo $_postrow_val['U_AIM']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_AIM'])) ? $this->_rootref['L_AIM'] : ((isset($user->lang['AIM'])) ? $user->lang['AIM'] : '{ AIM }')); ?>"><i class="fa fa-comment"></i> AIM</a></li><?php } if ($_postrow_val['U_JABBER']) {  ?><li><a style="display:none;" class="btn btn-xs" href="<?php echo $_postrow_val['U_JABBER']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_JABBER'])) ? $this->_rootref['L_JABBER'] : ((isset($user->lang['JABBER'])) ? $user->lang['JABBER'] : '{ JABBER }')); ?>"><i class="fa fa-comment"></i> Jabber</a></li><?php } ?><!-- remove style="display:none;" to make these set visible. All these are obsolete and should be replaced with Twitter,google+, facebook from the phpbb team  -->
						 </ul>
						</div>
						 <?php } } ?>

						</div>
					  </div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				  </div><!-- /.modal -->
				</li>
		 </ul>
		</div>
		
		 <div class="pull-right">
			<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_REGISTERED_USER']) {  if ($_postrow_val['U_EDIT'] || $_postrow_val['U_DELETE'] || $_postrow_val['U_REPORT'] || $_postrow_val['U_WARN'] || $_postrow_val['U_INFO'] || $_postrow_val['U_QUOTE']) {  if ($_postrow_val['U_QUOTE']) {  ?>

				 <div class="btn-post-fix pull-right">
				  <a class="btn btn-default btn-sm" href="<?php echo $_postrow_val['U_QUOTE']; ?>" title="<?php echo ((isset($this->_rootref['L_REPLY_WITH_QUOTE'])) ? $this->_rootref['L_REPLY_WITH_QUOTE'] : ((isset($user->lang['REPLY_WITH_QUOTE'])) ? $user->lang['REPLY_WITH_QUOTE'] : '{ REPLY_WITH_QUOTE }')); ?>"><i class="fa fa-comments"></i></a>
				 </div>
				<?php } ?>

				
				<div class="btn-group btn-group-sm pull-right">
				 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> <i class="fa fa-level-down"></i></button>
				 <ul class="dropdown-menu dropdown-menu-post">
					<?php if ($_postrow_val['U_EDIT']) {  ?><li><a href="<?php echo $_postrow_val['U_EDIT']; ?>" title=""><i class="fa fa-pencil"></i> <?php echo ((isset($this->_rootref['L_EDIT_POST'])) ? $this->_rootref['L_EDIT_POST'] : ((isset($user->lang['EDIT_POST'])) ? $user->lang['EDIT_POST'] : '{ EDIT_POST }')); ?></a></li><?php } if ($_postrow_val['U_DELETE']) {  ?><li><a href="<?php echo $_postrow_val['U_DELETE']; ?>" title=""><i class="fa fa-times"></i> <?php echo ((isset($this->_rootref['L_DELETE_POST'])) ? $this->_rootref['L_DELETE_POST'] : ((isset($user->lang['DELETE_POST'])) ? $user->lang['DELETE_POST'] : '{ DELETE_POST }')); ?></a></li><?php } if ($_postrow_val['U_REPORT']) {  ?><li><a href="<?php echo $_postrow_val['U_REPORT']; ?>" title=""><i class="fa fa-exclamation-circle"></i> <?php echo ((isset($this->_rootref['L_REPORT_POST'])) ? $this->_rootref['L_REPORT_POST'] : ((isset($user->lang['REPORT_POST'])) ? $user->lang['REPORT_POST'] : '{ REPORT_POST }')); ?></a></li><?php } if ($_postrow_val['U_WARN']) {  ?><li><a href="<?php echo $_postrow_val['U_WARN']; ?>" title=""><i class="fa fa-minus-circle"></i> <?php echo ((isset($this->_rootref['L_WARN_USER'])) ? $this->_rootref['L_WARN_USER'] : ((isset($user->lang['WARN_USER'])) ? $user->lang['WARN_USER'] : '{ WARN_USER }')); ?></a></li><?php } if ($_postrow_val['U_INFO']) {  ?><li><a href="<?php echo $_postrow_val['U_INFO']; ?>" title=""><i class="fa fa-info-circle"></i> <?php echo ((isset($this->_rootref['L_INFORMATION'])) ? $this->_rootref['L_INFORMATION'] : ((isset($user->lang['INFORMATION'])) ? $user->lang['INFORMATION'] : '{ INFORMATION }')); ?></a></li><?php } ?>

				 </ul>
				</div>

			<?php } } ?>

		 </div>
		</div>
	</div>
			
    <div class="panel-body">
        <div class="clearfix">
			<div class="postbody">
                <div class="content">
					 <span class="post-date pull-left visible-xs">&#45; <i class="fa fa-clock-o"></i> <?php echo $_postrow_val['POST_DATE']; ?></span>
					 <span class="post-id pull-right visible-xs"><a href="<?php echo $_postrow_val['U_MINI_POST']; ?>" title="Post" >&#35;<?php echo $_postrow_val['POST_ID']; ?></a></span>
					 <?php if ($_postrow_val['S_POST_UNAPPROVED'] || $_postrow_val['S_POST_REPORTED']) {  ?>

						<div class="alert alert-danger fade in">
							<button class="close" data-dismiss="alert"><span class="awe-remove-circle"></span></button>
							<i class="fa fa-warning"></i> 
							<?php if ($_postrow_val['S_POST_UNAPPROVED']) {  ?><a href="<?php echo $_postrow_val['U_MCP_APPROVE']; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_UNAPPROVED'])) ? $this->_rootref['L_POST_UNAPPROVED'] : ((isset($user->lang['POST_UNAPPROVED'])) ? $user->lang['POST_UNAPPROVED'] : '{ POST_UNAPPROVED }')); ?></strong></a><br /><?php } if ($_postrow_val['S_POST_REPORTED']) {  ?><a href="<?php echo $_postrow_val['U_MCP_REPORT']; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_REPORTED'])) ? $this->_rootref['L_POST_REPORTED'] : ((isset($user->lang['POST_REPORTED'])) ? $user->lang['POST_REPORTED'] : '{ POST_REPORTED }')); ?></strong></a><?php } ?>

						</div>
					<?php } ?>

                        <?php echo $_postrow_val['MESSAGE']; ?>

					<?php if ($_postrow_val['S_HAS_ATTACHMENTS']) {  ?>

						<div class="attachbox">
							<h5><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></h5>
							<?php $_attachment_count = (isset($_postrow_val['attachment'])) ? sizeof($_postrow_val['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$_postrow_val['attachment'][$_attachment_i]; ?>

								<span><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></span>
							<?php }} ?>

						</div>
					<?php } if ($_postrow_val['S_DISPLAY_NOTICE']) {  ?><div class="rules"><?php echo ((isset($this->_rootref['L_DOWNLOAD_NOTICE'])) ? $this->_rootref['L_DOWNLOAD_NOTICE'] : ((isset($user->lang['DOWNLOAD_NOTICE'])) ? $user->lang['DOWNLOAD_NOTICE'] : '{ DOWNLOAD_NOTICE }')); ?></div><?php } if ($_postrow_val['EDITED_MESSAGE'] || $_postrow_val['EDIT_REASON'] || $_postrow_val['BUMPED_MESSAGE']) {  ?>

						<div class="notice text-muted">
						 <small><?php echo $_postrow_val['EDITED_MESSAGE']; ?></small>
						 <?php if ($_postrow_val['EDIT_REASON']) {  ?><small><strong><?php echo ((isset($this->_rootref['L_REASON'])) ? $this->_rootref['L_REASON'] : ((isset($user->lang['REASON'])) ? $user->lang['REASON'] : '{ REASON }')); ?>:</strong> <?php echo $_postrow_val['EDIT_REASON']; ?></small><?php } ?>

						 <div><small><?php echo $_postrow_val['BUMPED_MESSAGE']; ?></small></div>
						</div>
					<?php } if ($_postrow_val['SIGNATURE']) {  ?>

					<p class="separator text-center hidden-xs"><i class="fa fa-ellipsis-h fa-2x"></i></p>
					<div id="sig<?php echo $_postrow_val['POST_ID']; ?>" class="hidden-xs"><?php echo $_postrow_val['SIGNATURE']; ?></div>
					<?php } ?>

                </div>
			</div>
        </div>
    </div>
	<?php } if ($_postrow_val['S_LAST_ROW'] && $this->_rootref['S_QUICK_REPLY']) {  ?>

	 <div class="panel-footer">
		 <div class="clearfix">
            <div class="text-center">
             <button class="btn btn-primary btn-sm collapsed" data-toggle="collapse" data-target=".quick-reply"><i class="glyphicon glyphicon-edit"></i> <?php echo ((isset($this->_rootref['L_QUICKREPLY'])) ? $this->_rootref['L_QUICKREPLY'] : ((isset($user->lang['QUICKREPLY'])) ? $user->lang['QUICKREPLY'] : '{ QUICKREPLY }')); ?></a>
            </div>
            <div class="text-center">
                <div class="quick-reply collapse">
					<?php $this->_tpl_include('quickreply_editor.html'); ?>

                </div>
            </div>
          </div>
	 </div>
	 <?php } ?>

  </div>
  
 </article>
</div>
<?php }} ?>



<div class="clearfix">
	<div class="pull-left">
   	<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_DISPLAY_REPLY_INFO']) {  if ($this->_rootref['S_IS_LOCKED']) {  ?>

    <a class="btn btn-danger" href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>" role="button"><i class="fa fa-lock"></i>&nbsp;<?php echo ((isset($this->_rootref['L_TOPIC_LOCKED_SHORT'])) ? $this->_rootref['L_TOPIC_LOCKED_SHORT'] : ((isset($user->lang['TOPIC_LOCKED_SHORT'])) ? $user->lang['TOPIC_LOCKED_SHORT'] : '{ TOPIC_LOCKED_SHORT }')); ?></a>
	<?php } else { ?>

	<a class="btn btn-default" href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>" role="button"><i class="fa fa-plus"></i>&nbsp;<?php echo ((isset($this->_rootref['L_REPLY'])) ? $this->_rootref['L_REPLY'] : ((isset($user->lang['REPLY'])) ? $user->lang['REPLY'] : '{ REPLY }')); ?></a>
    <?php } } ?>

   </div>

   <div class="pull-right">
     <ul class="pagination pagination-sm hidden-xs">
	 <?php if ($this->_rootref['S_TOPIC_MOD']) {  ?><li><a title="" href="javascript:void(0);" data-target=".sorting-topic-mod" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_MODERATOR_OPTIONS'])) ? $this->_rootref['L_MODERATOR_OPTIONS'] : ((isset($user->lang['MODERATOR_OPTIONS'])) ? $user->lang['MODERATOR_OPTIONS'] : '{ MODERATOR_OPTIONS }')); ?></a></li><?php } if ($this->_rootref['S_NUM_POSTS'] > (1) || $this->_rootref['PREVIOUS_PAGE']) {  ?><li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li><?php } if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS']) {  if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a></li><?php } ?>

       <li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li>
	   <?php if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } } ?>

     </ul>
	<div class="visible-xs"> 
     <ul class="pagination pagination-sm">
	 <?php if ($this->_rootref['S_TOPIC_MOD']) {  ?><li><a title="" href="javascript:void(0);" data-target=".sorting-topic-mod" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_MODERATOR_OPTIONS'])) ? $this->_rootref['L_MODERATOR_OPTIONS'] : ((isset($user->lang['MODERATOR_OPTIONS'])) ? $user->lang['MODERATOR_OPTIONS'] : '{ MODERATOR_OPTIONS }')); ?></a></li><?php } if ($this->_rootref['PAGINATION'] || $this->_rootref['TOTAL_POSTS']) {  ?>

	  <li class="active"><a><?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?></a></li>
	   <?php if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } } ?>

	</ul>
	</div>
   </div>
</div>

<?php $this->_tpl_include('jump_links.html'); ?>

<div class="space10"></div>

<?php if ($this->_rootref['S_NUM_POSTS'] > (1) || $this->_rootref['PREVIOUS_PAGE']) {  ?>

<form class="form-horizontal" method="post" action="<?php echo (isset($this->_rootref['S_TOPIC_ACTION'])) ? $this->_rootref['S_TOPIC_ACTION'] : ''; ?>">
	<div class="controls-row">
                    <div class="sorting collapse">
					 <div class="panel panel-default">
					  <div class="panel-body">
                        <div class="row">
					<?php if (! $this->_rootref['S_IS_BOT']) {  ?>

					<form class="form-horizontal" method="post" action="<?php echo (isset($this->_rootref['S_TOPIC_ACTION'])) ? $this->_rootref['S_TOPIC_ACTION'] : ''; ?>">
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
</form>
<?php } if ($this->_rootref['S_TOPIC_MOD']) {  ?>

	<div class="controls-row">
       <div class="sorting-topic-mod collapse">
			<div class="panel panel-default">
				<div class="panel-body">
                   <div class="row">
					 <?php if (! $this->_rootref['S_IS_BOT']) {  ?>

					    <div class="col-md-6 col-sm-6"> 
                         <label for="f" accesskey="j"><?php echo ((isset($this->_rootref['L_JUMP_TO'])) ? $this->_rootref['L_JUMP_TO'] : ((isset($user->lang['JUMP_TO'])) ? $user->lang['JUMP_TO'] : '{ JUMP_TO }')); ?>:</label>
                            <div class="control-row">
                              <?php $this->_tpl_include('jumpbox_options.html'); ?>

                            </div>
						</div>
					 
	                    <div class="col-md-6 col-sm-6"> 
                          <form method="post" action="<?php echo (isset($this->_rootref['S_MOD_ACTION'])) ? $this->_rootref['S_MOD_ACTION'] : ''; ?>">
							<fieldset>
							<label for="quick-mod-select"><?php echo ((isset($this->_rootref['L_QUICK_MOD'])) ? $this->_rootref['L_QUICK_MOD'] : ((isset($user->lang['QUICK_MOD'])) ? $user->lang['QUICK_MOD'] : '{ QUICK_MOD }')); ?>:</label>
							 <div class="input-group">
								<?php echo (isset($this->_rootref['S_TOPIC_MOD'])) ? $this->_rootref['S_TOPIC_MOD'] : ''; ?>

							   <span class="input-group-btn">
								 <button class="btn btn-default" type="submit"><?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?></button>
							   </span>
							 </div>
								<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

							</fieldset>
						</form>
						</div>
	                 <?php } ?>

                    </div>
                </div>
			</div>
		</div>
	</div> 
<?php } if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

<div class="row">
<?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="panel panel-forum">
<div class="panel-heading"><i class="fa fa-users"></i> <?php if ($this->_rootref['U_VIEWONLINE']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEWONLINE'])) ? $this->_rootref['U_VIEWONLINE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?></a><?php } else { echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); } ?></div>
 <div class="panel-body">
	<p><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></p>
 </div> 
</div> 
</div> 
<?php } if ($this->_rootref['S_DISPLAY_POST_INFO']) {  ?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
<div class="panel panel-forum">
<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> <?php echo ((isset($this->_rootref['L_TOPIC_PERMISSIONS'])) ? $this->_rootref['L_TOPIC_PERMISSIONS'] : ((isset($user->lang['TOPIC_PERMISSIONS'])) ? $user->lang['TOPIC_PERMISSIONS'] : '{ TOPIC_PERMISSIONS }')); ?></div>
  <div class="panel-body">
	<p><?php $_rules_count = (isset($this->_tpldata['rules'])) ? sizeof($this->_tpldata['rules']) : 0;if ($_rules_count) {for ($_rules_i = 0; $_rules_i < $_rules_count; ++$_rules_i){$_rules_val = &$this->_tpldata['rules'][$_rules_i]; echo $_rules_val['RULE']; ?><br /><?php }} ?></p>
  </div> 
</div> 
 </div>
<?php } ?>

</div>
<?php } $this->_tpl_include('overall_footer.html'); ?>