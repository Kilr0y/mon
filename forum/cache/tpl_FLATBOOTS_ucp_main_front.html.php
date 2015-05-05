<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>

<div class="tab-pane active">
	
	<div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
       <?php echo ((isset($this->_rootref['L_UCP_WELCOME'])) ? $this->_rootref['L_UCP_WELCOME'] : ((isset($user->lang['UCP_WELCOME'])) ? $user->lang['UCP_WELCOME'] : '{ UCP_WELCOME }')); ?>

    </div> 
	
<?php if (sizeof($this->_tpldata['topicrow'])) {  ?>

	<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_IMPORTANT_NEWS'])) ? $this->_rootref['L_IMPORTANT_NEWS'] : ((isset($user->lang['IMPORTANT_NEWS'])) ? $user->lang['IMPORTANT_NEWS'] : '{ IMPORTANT_NEWS }')); ?></h3></div>
	
	<div class="panel panel-forum">
	<div class="panel-heading">
	 <i class="fa fa-bolt"></i> <?php echo ((isset($this->_rootref['L_IMPORTANT_NEWS'])) ? $this->_rootref['L_IMPORTANT_NEWS'] : ((isset($user->lang['IMPORTANT_NEWS'])) ? $user->lang['IMPORTANT_NEWS'] : '{ IMPORTANT_NEWS }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></th>
		</tr>
	</thead>
	<?php $_topicrow_count = (isset($this->_tpldata['topicrow'])) ? sizeof($this->_tpldata['topicrow']) : 0;if ($_topicrow_count) {for ($_topicrow_i = 0; $_topicrow_i < $_topicrow_count; ++$_topicrow_i){$_topicrow_val = &$this->_tpldata['topicrow'][$_topicrow_i]; ?>

		<tbody>
			<tr>
				<td>
				 <span class="icon-wrapper">
				 <i class="row-icon-font icon-moon-podcast2<?php if ($_topicrow_val['S_UNREAD']) {  ?> text-info<?php } else { ?> text-muted<?php } ?>" title="<?php echo $_topicrow_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
				 </span>
				 <i class="row-icon-font-mini <?php if ($_topicrow_val['S_LOCKED']) {  ?>fa fa-lock forumview-lock<?php } ?>" title="<?php echo $_topicrow_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
				 <?php if ($_topicrow_val['S_UNREAD']) {  ?><a href="<?php echo $_topicrow_val['U_NEWEST_POST']; ?>"><i class="fa fa-asterisk"></i></a><?php } ?><a href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>" class="topictitle"> <?php echo $_topicrow_val['TOPIC_TITLE']; ?></a><br>
				 <?php if ($_topicrow_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_topicrow_val['PAGINATION']; ?></span></strong><?php } if ($_topicrow_val['ATTACH_ICON_IMG']) {  echo $_topicrow_val['ATTACH_ICON_IMG']; ?> <?php } echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['TOPIC_AUTHOR_FULL']; ?><small> <?php echo $_topicrow_val['FIRST_POST_TIME']; ?></small>
				</td>
				<td class="center"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['LAST_POST_AUTHOR_FULL']; ?>

				<a rel="tooltip" data-placement="right" data-original-title="<?php echo ((isset($this->_rootref['L_FORUMLIST_LASTPOST'])) ? $this->_rootref['L_FORUMLIST_LASTPOST'] : ((isset($user->lang['FORUMLIST_LASTPOST'])) ? $user->lang['FORUMLIST_LASTPOST'] : '{ FORUMLIST_LASTPOST }')); ?>" href="<?php echo $_topicrow_val['U_LAST_POST']; ?>"><i class="fa fa-sign-out"></i></a> 
				<br /><small><?php echo $_topicrow_val['LAST_POST_TIME']; ?></small>
				</td>
			</tr>
		</tbody>
	<?php }} ?>

	</table>
	</div>
	</div>
<?php } ?>


<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_YOUR_DETAILS'])) ? $this->_rootref['L_YOUR_DETAILS'] : ((isset($user->lang['YOUR_DETAILS'])) ? $user->lang['YOUR_DETAILS'] : '{ YOUR_DETAILS }')); ?></h3></div>
  
    <section class="tile">
         <div class="tile-widget">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#users-tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
            </ul>
        </div>
            <div class="tile-body tab-content">
                <ul id="users-tab" class="tab-pane fade active in">
                  <li>
                    <span class="icon"><i class="fa fa-calendar fa-lg"></i></span>
					<span class="date"><?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?></span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_USER'])) ? $this->_rootref['L_USER'] : ((isset($user->lang['USER'])) ? $user->lang['USER'] : '{ USER }')); ?> <?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></span>
                  </li>
				  
				  <li>
				    <span class="icon"><i class="fa fa-eye fa-lg"></i></span>
                    <span class="date"><?php echo (isset($this->_rootref['LAST_VISIT_YOU'])) ? $this->_rootref['LAST_VISIT_YOU'] : ''; ?></span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_VISITED'])) ? $this->_rootref['L_VISITED'] : ((isset($user->lang['VISITED'])) ? $user->lang['VISITED'] : '{ VISITED }')); ?></span>
                  </li>
				  
				  <?php if ($this->_rootref['WARNINGS']) {  ?>

				  <li>
				    <span class="icon"><i class="fa fa-bolt fa-lg"></i></span>
                    <span class="date"><?php echo ((isset($this->_rootref['L_DAYS_AGO'])) ? $this->_rootref['L_DAYS_AGO'] : ((isset($user->lang['DAYS_AGO'])) ? $user->lang['DAYS_AGO'] : '{ DAYS_AGO }')); ?></span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_YOUR_WARNINGS'])) ? $this->_rootref['L_YOUR_WARNINGS'] : ((isset($user->lang['YOUR_WARNINGS'])) ? $user->lang['YOUR_WARNINGS'] : '{ YOUR_WARNINGS }')); ?>: <?php echo (isset($this->_rootref['WARNING_IMG'])) ? $this->_rootref['WARNING_IMG'] : ''; ?> [<?php echo (isset($this->_rootref['WARNINGS'])) ? $this->_rootref['WARNINGS'] : ''; ?>]</span>
                  </li>
				  <?php } ?>

				  
				  <li>
				    <span class="icon"><i class="fa fa-comments fa-lg"></i></span>
                    <span class="date">(<?php echo (isset($this->_rootref['POSTS_DAY'])) ? $this->_rootref['POSTS_DAY'] : ''; ?> / <?php echo (isset($this->_rootref['POSTS_PCT'])) ? $this->_rootref['POSTS_PCT'] : ''; ?>)</span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_TOTAL_POSTS'])) ? $this->_rootref['L_TOTAL_POSTS'] : ((isset($user->lang['TOTAL_POSTS'])) ? $user->lang['TOTAL_POSTS'] : '{ TOTAL_POSTS }')); ?>: <?php if ($this->_rootref['POSTS_PCT']) {  echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?> | <a href="<?php echo (isset($this->_rootref['U_SEARCH_USER'])) ? $this->_rootref['U_SEARCH_USER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_YOUR_POSTS'])) ? $this->_rootref['L_SEARCH_YOUR_POSTS'] : ((isset($user->lang['SEARCH_YOUR_POSTS'])) ? $user->lang['SEARCH_YOUR_POSTS'] : '{ SEARCH_YOUR_POSTS }')); ?></a><?php } } else { echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?> <?php } ?></span>
                  </li>
				  
				  <?php if ($this->_rootref['ACTIVE_FORUM'] != ('')) {  ?>

				  <li>
				    <span class="icon"><i class="fa fa-sitemap fa-lg"></i></span>
                    <span class="date">(<?php echo (isset($this->_rootref['ACTIVE_FORUM_POSTS'])) ? $this->_rootref['ACTIVE_FORUM_POSTS'] : ''; ?> / <?php echo (isset($this->_rootref['ACTIVE_FORUM_PCT'])) ? $this->_rootref['ACTIVE_FORUM_PCT'] : ''; ?>)</span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_ACTIVE_IN_FORUM'])) ? $this->_rootref['L_ACTIVE_IN_FORUM'] : ((isset($user->lang['ACTIVE_IN_FORUM'])) ? $user->lang['ACTIVE_IN_FORUM'] : '{ ACTIVE_IN_FORUM }')); ?>: <a href="<?php echo (isset($this->_rootref['U_ACTIVE_FORUM'])) ? $this->_rootref['U_ACTIVE_FORUM'] : ''; ?>"><?php echo (isset($this->_rootref['ACTIVE_FORUM'])) ? $this->_rootref['ACTIVE_FORUM'] : ''; ?></a></span>
                  </li>
				  <?php } if ($this->_rootref['ACTIVE_TOPIC'] != ('')) {  ?>

				  <li>
				    <span class="icon"><i class="fa fa-comment fa-lg"></i></span>
                    <span class="date">(<?php echo (isset($this->_rootref['ACTIVE_TOPIC_POSTS'])) ? $this->_rootref['ACTIVE_TOPIC_POSTS'] : ''; ?> / <?php echo (isset($this->_rootref['ACTIVE_TOPIC_PCT'])) ? $this->_rootref['ACTIVE_TOPIC_PCT'] : ''; ?>)</span>
                    <span class="subject"><?php echo ((isset($this->_rootref['L_ACTIVE_IN_TOPIC'])) ? $this->_rootref['L_ACTIVE_IN_TOPIC'] : ((isset($user->lang['ACTIVE_IN_TOPIC'])) ? $user->lang['ACTIVE_IN_TOPIC'] : '{ ACTIVE_IN_TOPIC }')); ?>: <a href="<?php echo (isset($this->_rootref['U_ACTIVE_TOPIC'])) ? $this->_rootref['U_ACTIVE_TOPIC'] : ''; ?>"><?php echo (isset($this->_rootref['ACTIVE_TOPIC'])) ? $this->_rootref['ACTIVE_TOPIC'] : ''; ?></a></span>
                  </li>
				  <?php } ?>


                </ul>
            </div>
        </section>
	
</div>

<?php $this->_tpl_include('ucp_footer.html'); ?>