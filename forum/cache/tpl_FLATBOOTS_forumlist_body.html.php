<?php if (!defined('IN_PHPBB')) exit; $_forumrow_count = (isset($this->_tpldata['forumrow'])) ? sizeof($this->_tpldata['forumrow']) : 0;if ($_forumrow_count) {for ($_forumrow_i = 0; $_forumrow_i < $_forumrow_count; ++$_forumrow_i){$_forumrow_val = &$this->_tpldata['forumrow'][$_forumrow_i]; if (( $_forumrow_val['S_IS_CAT'] && ! $_forumrow_val['S_FIRST_ROW'] ) || $_forumrow_val['S_NO_CAT']) {  ?>

	    
		<!-- Table footer not used at the moment
			<tfoot>
             <tr>
                <th>Game Name</th>
                <th>Publisher</th>
                <th>Platform</th>
             </tr>
            </tfoot>
		Table footer not used at the moment -->
			
		</table>
		</div>
		</div>
	<?php } if ($_forumrow_val['S_IS_CAT'] || $_forumrow_val['S_FIRST_ROW'] || $_forumrow_val['S_NO_CAT']) {  ?>

	   <div class="panel panel-forum">
	     <div class="panel-heading">
		  <?php if ($_forumrow_val['S_IS_CAT']) {  ?><a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a><?php } else if ($_forumrow_val['S_IS_LINK']) {  echo ((isset($this->_rootref['L_LINKS'])) ? $this->_rootref['L_LINKS'] : ((isset($user->lang['LINKS'])) ? $user->lang['LINKS'] : '{ LINKS }')); } else { echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); } ?>

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
	<?php } if (! $_forumrow_val['S_IS_CAT']) {  ?>

	    <tr>
			<td title="<?php echo $_forumrow_val['FORUM_FOLDER_IMG_ALT']; ?>">
			<?php if ($_forumrow_val['FORUM_IMAGE']) {  ?>

			<span class="forum-image"><?php echo $_forumrow_val['FORUM_IMAGE']; ?></span>
			<?php } else { ?>

			<span class="icon-wrapper">
			 <i class="row-icon-font icon-moon-default <?php if ($_forumrow_val['S_IS_LINK']) {  ?> icon-moon-link2<?php } if ($_forumrow_val['S_UNREAD_FORUM']) {  ?> forum-unread<?php } else { ?> forum-read<?php } ?>" title="<?php echo $_forumrow_val['FORUM_FOLDER_IMG_ALT']; ?>"></i>
			</span>
			<?php } ?>

			<i class="row-icon-font-mini <?php if ($_forumrow_val['S_LOCKED_FORUM']) {  ?>icon-moon-lock forum-list-lock<?php } ?>" title="<?php echo $_forumrow_val['FORUM_FOLDER_IMG_ALT']; ?>"></i>
			<?php if ($this->_rootref['S_ENABLE_FEEDS'] && $_forumrow_val['S_FEED_ENABLED']) {  ?> <a class="btn-rss pull-right hidden-xs hidden-sm" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo $_forumrow_val['FORUM_NAME']; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo $_forumrow_val['FORUM_ID']; ?>"><i class="fa fa-rss rss-color-forum"></i></a><?php } ?>

			  <span class="desc-wrapper">
				<a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>" class="forumtitle"><?php echo $_forumrow_val['FORUM_NAME']; ?></a><br />
				<?php if ($_forumrow_val['FORUM_DESC']) {  ?><span class="description"><?php echo $_forumrow_val['FORUM_DESC']; ?></span><br /><?php } if ($_forumrow_val['MODERATORS']) {  ?>

				<span class="forum-mods"><strong><?php echo $_forumrow_val['L_MODERATOR_STR']; ?>:</strong> <?php echo $_forumrow_val['MODERATORS']; ?></span>
				<?php } if ($_forumrow_val['SUBFORUMS'] && $_forumrow_val['S_LIST_SUBFORUMS']) {  ?><span class="subforums"><strong><?php echo $_forumrow_val['L_SUBFORUM_STR']; ?></strong> <?php echo $_forumrow_val['SUBFORUMS']; ?></span><?php } ?>

			  </span>
			</td>
			<?php if ($_forumrow_val['CLICKS']) {  ?>

			<td colspan="2"><span class="stats-wrapper"><?php echo ((isset($this->_rootref['L_FORUM_REDIRECTS'])) ? $this->_rootref['L_FORUM_REDIRECTS'] : ((isset($user->lang['FORUM_REDIRECTS'])) ? $user->lang['FORUM_REDIRECTS'] : '{ FORUM_REDIRECTS }')); ?> <?php echo $_forumrow_val['CLICKS']; ?></span></td>	
			<?php } else if (! $_forumrow_val['S_IS_LINK']) {  ?>

			<td class="stats-col">
			 <span class="stats-wrapper">
			 <?php echo $_forumrow_val['TOPICS']; ?> <?php echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); ?> <br /><?php echo $_forumrow_val['POSTS']; ?> <?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?> 
			 <?php if ($_forumrow_val['U_UNAPPROVED_TOPICS']) {  ?><a href="<?php echo $_forumrow_val['U_UNAPPROVED_TOPICS']; ?>"><i class="fa fa-question-circle" rel="tooltip" title="<?php echo ((isset($this->_rootref['L_FORUMLIST_UNAPPROVED'])) ? $this->_rootref['L_FORUMLIST_UNAPPROVED'] : ((isset($user->lang['FORUMLIST_UNAPPROVED'])) ? $user->lang['FORUMLIST_UNAPPROVED'] : '{ FORUMLIST_UNAPPROVED }')); ?>"></i></a><?php } ?>

			 </span>
			</td>	
			<td>
			  <span class="last-wrapper">
				<?php if ($_forumrow_val['LAST_POST_TIME']) {  echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_forumrow_val['LAST_POSTER_FULL']; ?>

				<?php if (! $this->_rootref['S_IS_BOT']) {  ?><a class="moderator-item" href="<?php echo $_forumrow_val['U_LAST_POST']; ?>" title="<?php echo ((isset($this->_rootref['L_FORUMLIST_LASTPOST'])) ? $this->_rootref['L_FORUMLIST_LASTPOST'] : ((isset($user->lang['FORUMLIST_LASTPOST'])) ? $user->lang['FORUMLIST_LASTPOST'] : '{ FORUMLIST_LASTPOST }')); ?>"><i class="mobile-post fa fa-sign-out"></i></a><?php } ?>

				<br /><span class="forum-time"><?php echo $_forumrow_val['LAST_POST_TIME']; ?></span><?php } else { echo ((isset($this->_rootref['L_NO_POSTS'])) ? $this->_rootref['L_NO_POSTS'] : ((isset($user->lang['NO_POSTS'])) ? $user->lang['NO_POSTS'] : '{ NO_POSTS }')); ?>&nbsp;<?php } ?>

			  </span>
			</td>
			<?php } ?>

		</tr>
	<?php } if ($_forumrow_val['S_LAST_ROW']) {  ?>

	 </tbody>
	</table>
	</div>
	</div>
	<?php } }} else { ?>

	<div class="well">
		<strong><?php echo ((isset($this->_rootref['L_NO_FORUMS'])) ? $this->_rootref['L_NO_FORUMS'] : ((isset($user->lang['NO_FORUMS'])) ? $user->lang['NO_FORUMS'] : '{ NO_FORUMS }')); ?></strong>
	</div>
<?php } ?>