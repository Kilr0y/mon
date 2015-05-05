<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<div class="side-segment"><h3><?php if ($this->_rootref['SEARCH_TITLE']) {  echo (isset($this->_rootref['SEARCH_TITLE'])) ? $this->_rootref['SEARCH_TITLE'] : ''; } else { echo (isset($this->_rootref['SEARCH_MATCHES'])) ? $this->_rootref['SEARCH_MATCHES'] : ''; } if ($this->_rootref['SEARCH_WORDS']) {  ?>: <a href="<?php echo (isset($this->_rootref['U_SEARCH_WORDS'])) ? $this->_rootref['U_SEARCH_WORDS'] : ''; ?>"><?php echo (isset($this->_rootref['SEARCH_WORDS'])) ? $this->_rootref['SEARCH_WORDS'] : ''; ?></a><?php } ?></h3></div>
<?php if ($this->_rootref['SEARCHED_QUERY']) {  ?><p><?php echo ((isset($this->_rootref['L_SEARCHED_QUERY'])) ? $this->_rootref['L_SEARCHED_QUERY'] : ((isset($user->lang['SEARCHED_QUERY'])) ? $user->lang['SEARCHED_QUERY'] : '{ SEARCHED_QUERY }')); ?>: <strong><?php echo (isset($this->_rootref['SEARCHED_QUERY'])) ? $this->_rootref['SEARCHED_QUERY'] : ''; ?></strong></p><?php } if ($this->_rootref['IGNORED_WORDS']) {  ?><p><?php echo ((isset($this->_rootref['L_IGNORED_TERMS'])) ? $this->_rootref['L_IGNORED_TERMS'] : ((isset($user->lang['IGNORED_TERMS'])) ? $user->lang['IGNORED_TERMS'] : '{ IGNORED_TERMS }')); ?>: <span class="badge badge-important"><?php echo (isset($this->_rootref['IGNORED_WORDS'])) ? $this->_rootref['IGNORED_WORDS'] : ''; ?></span></p><?php } if ($this->_rootref['SEARCH_TOPIC']) {  ?>

	<p><a href="<?php echo (isset($this->_rootref['U_SEARCH_TOPIC'])) ? $this->_rootref['U_SEARCH_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RETURN_TO'])) ? $this->_rootref['L_RETURN_TO'] : ((isset($user->lang['RETURN_TO'])) ? $user->lang['RETURN_TO'] : '{ RETURN_TO }')); ?>: <?php echo (isset($this->_rootref['SEARCH_TOPIC'])) ? $this->_rootref['SEARCH_TOPIC'] : ''; ?></a></p>
<?php } else { ?>

	<p><a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_SEARCH_ADV'])) ? $this->_rootref['L_SEARCH_ADV'] : ((isset($user->lang['SEARCH_ADV'])) ? $user->lang['SEARCH_ADV'] : '{ SEARCH_ADV }')); ?>"><?php echo ((isset($this->_rootref['L_RETURN_TO_SEARCH_ADV'])) ? $this->_rootref['L_RETURN_TO_SEARCH_ADV'] : ((isset($user->lang['RETURN_TO_SEARCH_ADV'])) ? $user->lang['RETURN_TO_SEARCH_ADV'] : '{ RETURN_TO_SEARCH_ADV }')); ?></a></p>
<?php } if ($this->_rootref['PAGINATION'] || $this->_rootref['SEARCH_MATCHES'] || $this->_rootref['PAGE_NUMBER']) {  ?>

<form method="post" action="<?php echo (isset($this->_rootref['S_SEARCH_ACTION'])) ? $this->_rootref['S_SEARCH_ACTION'] : ''; ?>">
 <div class="clearfix">
	<?php if ($this->_rootref['SEARCH_MATCHES']) {  ?>

	<div class="pull-left">
	<?php if ($this->_rootref['SEARCH_IN_RESULTS']) {  ?>

	<div class="input-group input-group-sm input-icon left">
	  <i class="fa fa-search"></i>
      <input type="text" class="form-control" size="" name="add_keywords" id="add_keywords" placeholder="<?php echo ((isset($this->_rootref['L_SEARCH_IN_RESULTS'])) ? $this->_rootref['L_SEARCH_IN_RESULTS'] : ((isset($user->lang['SEARCH_IN_RESULTS'])) ? $user->lang['SEARCH_IN_RESULTS'] : '{ SEARCH_IN_RESULTS }')); ?>">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" value="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></button>
	  </div>
    </div>
	<?php } ?>

	</div>
	<?php } ?>

	<div class="pull-right">
     <ul class="pagination pagination-sm hidden-xs">
	   <?php if ($this->_rootref['S_SHOW_TOPICS']) {  if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_FORUMS']) {  ?><li><a href="<?php echo (isset($this->_rootref['U_MARK_FORUMS'])) ? $this->_rootref['U_MARK_FORUMS'] : ''; ?>" accesskey="m"><?php echo ((isset($this->_rootref['L_MARK_TOPICS_READ'])) ? $this->_rootref['L_MARK_TOPICS_READ'] : ((isset($user->lang['MARK_TOPICS_READ'])) ? $user->lang['MARK_TOPICS_READ'] : '{ MARK_TOPICS_READ }')); ?></a></li><?php } } if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } ?>

	   <li class="active"><a><?php echo (isset($this->_rootref['SEARCH_MATCHES'])) ? $this->_rootref['SEARCH_MATCHES'] : ''; ?></a></li>
	   <?php if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

     </ul>
	
	<div class="visible-xs"> 
     <ul class="pagination pagination-sm">
	 <?php if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } ?>

	</ul>
	</div>
   </div>
	
 </div>
</form>
<?php } if ($this->_rootref['S_SHOW_TOPICS']) {  if (sizeof($this->_tpldata['searchresults'])) {  ?>

	<div class="panel panel-forum">
	<div class="panel-heading">
	 <i class="fa fa-bolt"></i> <?php echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); ?>

	</div>
	<div class="panel-inner">
    <table class="footable table table-striped table-primary table-hover">
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_TOPICS_POSTS_STATISTICS'])) ? $this->_rootref['L_TOPICS_POSTS_STATISTICS'] : ((isset($user->lang['TOPICS_POSTS_STATISTICS'])) ? $user->lang['TOPICS_POSTS_STATISTICS'] : '{ TOPICS_POSTS_STATISTICS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></th>
		</tr>
	</thead>		
	<tbody>
		<?php $_searchresults_count = (isset($this->_tpldata['searchresults'])) ? sizeof($this->_tpldata['searchresults']) : 0;if ($_searchresults_count) {for ($_searchresults_i = 0; $_searchresults_i < $_searchresults_count; ++$_searchresults_i){$_searchresults_val = &$this->_tpldata['searchresults'][$_searchresults_i]; ?>

		<tr>
			<td>
			<?php if ($_searchresults_val['TOPIC_ICON_IMG']) {  ?><i class="topic-icon" style="background-image: url(<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_searchresults_val['TOPIC_ICON_IMG']; ?>); background-repeat: no-repeat;" title="<?php echo $_searchresults_val['TOPIC_ICON_IMG_ALT']; ?>"></i><?php } ?>

			<span class="icon-wrapper">
				<i class="row-icon-font icon-moon-default2<?php if ($_searchresults_val['S_POST_ANNOUNCE']) {  ?> icon-moon-voice2<?php } if ($_searchresults_val['S_TOPIC_GLOBAL']) {  ?> icon-moon-podcast2<?php } if ($_searchresults_val['S_POST_STICKY']) {  ?> icon-moon-pushpin2<?php } if ($_searchresults_val['S_HAS_POLL']) {  ?> icon-moon-bars2<?php } if ($_searchresults_val['S_UNREAD_TOPIC']) {  ?> forum-unread<?php } else { ?> forum-read<?php } ?>" title="<?php echo $_searchresults_val['TOPIC_FOLDER_IMG_ALT']; ?>"></i>
			</span>
				<i class="row-icon-font-mini <?php if ($_searchresults_val['S_LOCKED']) {  ?>fa fa-lock forumview-lock<?php } ?>" title="<?php echo $_searchresults_val['TOPIC_ICON_IMG_ALT']; ?>"></i>
				<?php if ($_searchresults_val['S_UNREAD_TOPIC']) {  ?><a href="<?php echo $_searchresults_val['U_NEWEST_POST']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_FIRST_UNREAD'])) ? $this->_rootref['L_VIEW_FIRST_UNREAD'] : ((isset($user->lang['VIEW_FIRST_UNREAD'])) ? $user->lang['VIEW_FIRST_UNREAD'] : '{ VIEW_FIRST_UNREAD }')); ?>"><i class="fa fa-asterisk"></i></a> <?php } ?>

				<a href="<?php echo $_searchresults_val['U_VIEW_TOPIC']; ?>" class="topictitle"><?php echo $_searchresults_val['TOPIC_TITLE']; ?></a> <?php if ($_searchresults_val['ATTACH_ICON_IMG']) {  ?><i class="fa fa-paperclip fa-flip-horizontal" rel="tooltip" data-placement="top" data-original-title="<?php echo ((isset($this->_rootref['L_ATTACH_FORUM'])) ? $this->_rootref['L_ATTACH_FORUM'] : ((isset($user->lang['ATTACH_FORUM'])) ? $user->lang['ATTACH_FORUM'] : '{ ATTACH_FORUM }')); ?>"></i> <?php } if ($_searchresults_val['S_TOPIC_UNAPPROVED'] || $_searchresults_val['S_POSTS_UNAPPROVED']) {  ?><a href="<?php echo $_searchresults_val['U_MCP_QUEUE']; ?>" title="<?php echo ((isset($this->_rootref['L_TOPICS_ROW_NOT_APPROVED'])) ? $this->_rootref['L_TOPICS_ROW_NOT_APPROVED'] : ((isset($user->lang['TOPICS_ROW_NOT_APPROVED'])) ? $user->lang['TOPICS_ROW_NOT_APPROVED'] : '{ TOPICS_ROW_NOT_APPROVED }')); ?>"><i class="fa fa-question-circle"></i></a> <?php } if ($_searchresults_val['S_TOPIC_REPORTED']) {  ?><a href="<?php echo $_searchresults_val['U_MCP_REPORT']; ?>" title="<?php echo ((isset($this->_rootref['L_TOPICS_ROW_REPORTED'])) ? $this->_rootref['L_TOPICS_ROW_REPORTED'] : ((isset($user->lang['TOPICS_ROW_REPORTED'])) ? $user->lang['TOPICS_ROW_REPORTED'] : '{ TOPICS_ROW_REPORTED }')); ?>"><i class="fa fa-exclamation-circle text-danger"></i></a><?php } ?><br />
				<?php if ($_searchresults_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_searchresults_val['PAGINATION']; ?></span></strong><?php } ?>

				<?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_searchresults_val['TOPIC_AUTHOR_FULL']; ?> &#45; <small><?php echo $_searchresults_val['FIRST_POST_TIME']; ?></small>
				<?php if (! $_searchresults_val['S_TOPIC_GLOBAL']) {  ?><i class="fa fa-comments"></i> <?php echo ((isset($this->_rootref['L_IN'])) ? $this->_rootref['L_IN'] : ((isset($user->lang['IN'])) ? $user->lang['IN'] : '{ IN }')); ?> <a href="<?php echo $_searchresults_val['U_VIEW_FORUM']; ?>"><?php echo $_searchresults_val['FORUM_TITLE']; ?></a><?php } else { ?> (<?php echo ((isset($this->_rootref['L_GLOBAL'])) ? $this->_rootref['L_GLOBAL'] : ((isset($user->lang['GLOBAL'])) ? $user->lang['GLOBAL'] : '{ GLOBAL }')); ?>)<?php } ?>

			</td>
			<td class="stats-col"><?php echo $_searchresults_val['TOPIC_REPLIES']; ?> <?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?><br /> <?php echo $_searchresults_val['TOPIC_VIEWS']; ?> <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?></td>
			<td class="center"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_searchresults_val['LAST_POST_AUTHOR_FULL']; ?>

			<?php if (! $this->_rootref['S_IS_BOT']) {  ?><a rel="tooltip" data-placement="right" data-original-title="<?php echo ((isset($this->_rootref['L_FORUMLIST_LASTPOST'])) ? $this->_rootref['L_FORUMLIST_LASTPOST'] : ((isset($user->lang['FORUMLIST_LASTPOST'])) ? $user->lang['FORUMLIST_LASTPOST'] : '{ FORUMLIST_LASTPOST }')); ?>" href="<?php echo $_searchresults_val['U_LAST_POST']; ?>"><i class="mobile-post fa fa-sign-out"></i></a> <?php } ?>

			<br /><small><?php echo $_searchresults_val['LAST_POST_TIME']; ?></small>
			</td>
		</tr>
		<?php }} ?>

		 </tbody>
	</table>
	</div>
    </div>
	
	<?php } else { ?>

	<div class="alert alert-info fade in">
       <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
       <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo ((isset($this->_rootref['L_NO_SEARCH_RESULTS'])) ? $this->_rootref['L_NO_SEARCH_RESULTS'] : ((isset($user->lang['NO_SEARCH_RESULTS'])) ? $user->lang['NO_SEARCH_RESULTS'] : '{ NO_SEARCH_RESULTS }')); ?>

    </div> 
	<?php } } else { $_searchresults_count = (isset($this->_tpldata['searchresults'])) ? sizeof($this->_tpldata['searchresults']) : 0;if ($_searchresults_count) {for ($_searchresults_i = 0; $_searchresults_i < $_searchresults_count; ++$_searchresults_i){$_searchresults_val = &$this->_tpldata['searchresults'][$_searchresults_i]; ?>

<div class="clearfix">
	<div class="well well-sm">
	<?php if ($_searchresults_val['S_IGNORE_POST']) {  ?>

		<div class="postbody">
			<?php echo $_searchresults_val['L_IGNORE_POST']; ?>

		</div>
	<?php } else { ?>

		<div class="pull-left">
			<h4><a href="<?php echo $_searchresults_val['U_VIEW_POST']; ?>"><?php echo $_searchresults_val['POST_SUBJECT']; ?></a> </h4>
		<span class="text-muted"><i class="fa fa-user"></i> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_searchresults_val['POST_AUTHOR_FULL']; ?> &#166; <i class="fa fa-clock-o"></i> <?php echo $_searchresults_val['POST_DATE']; ?> &#166;</span> 
		<?php if ($_searchresults_val['FORUM_TITLE']) {  ?>

           <span class="text-muted"><i class="fa fa-folder"></i> <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_searchresults_val['U_VIEW_FORUM']; ?>"><?php echo $_searchresults_val['FORUM_TITLE']; ?></a> &#166; <i class="fa fa-folder-open"></i> <?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?>: <a href="<?php echo $_searchresults_val['U_VIEW_TOPIC']; ?>"><?php echo $_searchresults_val['TOPIC_TITLE']; ?></a> &#166;</span> 
			<?php } else { ?>

			<span class="text-muted"><i class="fa fa-plus"></i> <?php echo ((isset($this->_rootref['L_GLOBAL'])) ? $this->_rootref['L_GLOBAL'] : ((isset($user->lang['GLOBAL'])) ? $user->lang['GLOBAL'] : '{ GLOBAL }')); ?>: <a href="<?php echo $_searchresults_val['U_VIEW_TOPIC']; ?>"><?php echo $_searchresults_val['TOPIC_TITLE']; ?></a> &#166;</span> 
			<?php } ?>

			<span class="text-muted"><i class="fa fa-comments"></i> <?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?>: <strong><?php echo $_searchresults_val['TOPIC_REPLIES']; ?></strong> &#166; <i class="fa fa-eye"></i> <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?>: <strong><?php echo $_searchresults_val['TOPIC_VIEWS']; ?></strong> </span> 
		</div>
		<div class="space10"></div>
			<div class="content"><p><?php echo $_searchresults_val['MESSAGE']; ?></p></div>
	<?php } if (! $_searchresults_val['S_IGNORE_POST']) {  ?>

	<div class="clearfix">
		<div class="pull-right"><a href="<?php echo $_searchresults_val['U_VIEW_POST']; ?>"><?php echo ((isset($this->_rootref['L_JUMP_TO_POST'])) ? $this->_rootref['L_JUMP_TO_POST'] : ((isset($user->lang['JUMP_TO_POST'])) ? $user->lang['JUMP_TO_POST'] : '{ JUMP_TO_POST }')); ?></a></div>
	</div>
	<?php } ?>

    </div>
	</div>
	
	<?php }} else { ?>

	<div class="alert alert-info fade in">
       <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
       <i class="fa fa-warning"></i> <strong>Information!</strong> <?php echo ((isset($this->_rootref['L_NO_SEARCH_RESULTS'])) ? $this->_rootref['L_NO_SEARCH_RESULTS'] : ((isset($user->lang['NO_SEARCH_RESULTS'])) ? $user->lang['NO_SEARCH_RESULTS'] : '{ NO_SEARCH_RESULTS }')); ?>

    </div> 
	<?php } } if ($this->_rootref['PAGINATION'] || sizeof($this->_tpldata['searchresults']) || $this->_rootref['PAGE_NUMBER']) {  ?>

	<div class="pull-right">
     <ul class="pagination pagination-sm hidden-xs">
	 <?php if ($this->_rootref['S_SELECT_SORT_DAYS'] || $this->_rootref['S_SELECT_SORT_KEY']) {  ?>

	   <li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li>
	 <?php } if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } ?>

	   <li class="active"><a><?php echo (isset($this->_rootref['SEARCH_MATCHES'])) ? $this->_rootref['SEARCH_MATCHES'] : ''; ?></a></li>
	   <?php if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

     </ul>
	
	<div class="visible-xs"> 
     <ul class="pagination pagination-sm">
	 <?php if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?><li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } ?>

	</ul>
	</div>
   </div>
<?php } ?>



<div class="row">
<?php $this->_tpl_include('jumpbox.html'); ?>

</div>

<?php $this->_tpl_include('jump_links.html'); ?>


<div class="hidden-xs">
<?php if ($this->_rootref['PAGINATION'] || sizeof($this->_tpldata['searchresults']) || $this->_rootref['S_SELECT_SORT_KEY'] || $this->_rootref['S_SELECT_SORT_DAYS']) {  ?>

<form class="form-horizontal" method="post" action="<?php echo (isset($this->_rootref['S_FORUM_ACTION'])) ? $this->_rootref['S_FORUM_ACTION'] : ''; ?>">
	<fieldset class="controls-row">
                    <div class="sorting collapse">
					 <div class="panel panel-default">
					  <div class="panel-body">
                        <div class="col-md-12 col-sm-12">
					<?php if ($this->_rootref['S_SELECT_SORT_DAYS'] || $this->_rootref['S_SELECT_SORT_KEY']) {  ?>

						<div class="col-md-4 col-sm-4"> 
                         <?php if ($this->_rootref['S_SHOW_TOPICS']) {  ?><label for="bday_day"><?php echo ((isset($this->_rootref['L_DISPLAY_POSTS'])) ? $this->_rootref['L_DISPLAY_POSTS'] : ((isset($user->lang['DISPLAY_POSTS'])) ? $user->lang['DISPLAY_POSTS'] : '{ DISPLAY_POSTS }')); ?>:</label><?php } else { ?><label for="bday_day"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?></label><?php } if ($this->_rootref['S_SELECT_SORT_KEY']) {  ?>

                            <div class="control-row">
                              <?php echo (isset($this->_rootref['S_SELECT_SORT_DAYS'])) ? $this->_rootref['S_SELECT_SORT_DAYS'] : ''; ?>

                            </div>
						</div>
	 
	                    <div class="col-md-4 col-sm-4"> 
                          <label for="bday_day"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?> </label>
                            <div class="control-row">
                              <?php echo (isset($this->_rootref['S_SELECT_SORT_KEY'])) ? $this->_rootref['S_SELECT_SORT_KEY'] : ''; ?>

                            </div>
						</div>
											
						<div class="col-md-4 col-sm-4"> 
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
	                <?php } } ?>

                        </div>
                      </div>
					 </div>
					</div>
            <!-- // Widget --> 
	</fieldset> 
</form>
<?php } ?>

</div>


<?php $this->_tpl_include('overall_footer.html'); ?>