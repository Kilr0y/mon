<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_IN_SEARCH_POPUP']) {  $this->_tpl_include('simple_header_ACP.html'); $this->_tpl_include('memberlist_search.html'); ?>

	<form method="post" id="results" action="<?php echo (isset($this->_rootref['S_MODE_ACTION'])) ? $this->_rootref['S_MODE_ACTION'] : ''; ?>" onsubmit="insert_marked(this.user); return false">

<?php } else if ($this->_rootref['S_SEARCH_USER']) {  $this->_tpl_include('overall_header.html'); $this->_tpl_include('memberlist_search.html'); ?>

	<form method="post" action="<?php echo (isset($this->_rootref['S_MODE_ACTION'])) ? $this->_rootref['S_MODE_ACTION'] : ''; ?>">

<?php } else { $this->_tpl_include('overall_header.html'); ?>

	<form method="post" action="<?php echo (isset($this->_rootref['S_MODE_ACTION'])) ? $this->_rootref['S_MODE_ACTION'] : ''; ?>">

<?php } if ($this->_rootref['S_SHOW_GROUP']) {  ?>


		<div class="side-segment"><h3<?php if ($this->_rootref['GROUP_COLOR']) {  ?> style="color:#<?php echo (isset($this->_rootref['GROUP_COLOR'])) ? $this->_rootref['GROUP_COLOR'] : ''; ?>;"<?php } ?>><?php echo (isset($this->_rootref['GROUP_NAME'])) ? $this->_rootref['GROUP_NAME'] : ''; ?></h3></div> 
		<p><?php echo (isset($this->_rootref['GROUP_DESC'])) ? $this->_rootref['GROUP_DESC'] : ''; ?> <?php echo (isset($this->_rootref['GROUP_TYPE'])) ? $this->_rootref['GROUP_TYPE'] : ''; ?></p>
		<p>
			<?php if ($this->_rootref['AVATAR_IMG']) {  echo (isset($this->_rootref['AVATAR_IMG'])) ? $this->_rootref['AVATAR_IMG'] : ''; } if ($this->_rootref['RANK_IMG']) {  echo (isset($this->_rootref['RANK_IMG'])) ? $this->_rootref['RANK_IMG'] : ''; } if ($this->_rootref['GROUP_RANK']) {  echo (isset($this->_rootref['GROUP_RANK'])) ? $this->_rootref['GROUP_RANK'] : ''; } ?>

		</p>

	<?php } else { ?>

		<div class="side-segment"><h3><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; if ($this->_rootref['SEARCH_WORDS']) {  ?>: <a href="<?php echo (isset($this->_rootref['U_SEARCH_WORDS'])) ? $this->_rootref['U_SEARCH_WORDS'] : ''; ?>"><?php echo (isset($this->_rootref['SEARCH_WORDS'])) ? $this->_rootref['SEARCH_WORDS'] : ''; ?></a><?php } ?></h3></div> 
    <div class="clearfix">
		<div class="pull-left">
            <ul class="pagination pagination-sm members-search">
	        <?php if ($this->_rootref['U_FIND_MEMBER'] && ! $this->_rootref['S_SEARCH_USER']) {  ?><li class=""><a href="<?php echo (isset($this->_rootref['U_FIND_MEMBER'])) ? $this->_rootref['U_FIND_MEMBER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a></li><?php } else if ($this->_rootref['S_SEARCH_USER'] && $this->_rootref['U_HIDE_FIND_MEMBER'] && ! $this->_rootref['S_IN_SEARCH_POPUP']) {  ?><li class=""><a href="<?php echo (isset($this->_rootref['U_HIDE_FIND_MEMBER'])) ? $this->_rootref['U_HIDE_FIND_MEMBER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_HIDE_MEMBER_SEARCH'])) ? $this->_rootref['L_HIDE_MEMBER_SEARCH'] : ((isset($user->lang['HIDE_MEMBER_SEARCH'])) ? $user->lang['HIDE_MEMBER_SEARCH'] : '{ HIDE_MEMBER_SEARCH }')); ?></a></li><?php } $_first_char_count = (isset($this->_tpldata['first_char'])) ? sizeof($this->_tpldata['first_char']) : 0;if ($_first_char_count) {for ($_first_char_i = 0; $_first_char_i < $_first_char_count; ++$_first_char_i){$_first_char_val = &$this->_tpldata['first_char'][$_first_char_i]; ?>

					<li class=""><a href="<?php echo $_first_char_val['U_SORT']; ?>"><?php echo $_first_char_val['DESC']; ?></a></li>
				<?php }} ?>

			</ul>
		</div> 
	<script>
	head.ready(function () {
	  $('.members-search a[href="' +location.pathname + location.search +'"]').closest('li').addClass('active');
	});
	</script>
	</div> 	
		<div class="space10"></div> 	
	<?php } if ($this->_rootref['S_LEADERS_SET'] || ! $this->_rootref['S_SHOW_GROUP'] || ! sizeof($this->_tpldata['memberrow'])) {  ?>

	<div class="panel panel-forum">
	     <div class="panel-heading">
		  <i class="fa fa-group"></i> <?php echo ((isset($this->_rootref['L_MEMBERS'])) ? $this->_rootref['L_MEMBERS'] : ((isset($user->lang['MEMBERS'])) ? $user->lang['MEMBERS'] : '{ MEMBERS }')); ?>

		 </div>
		 <div class="panel-inner">
		<table id="memberlist" class="footable table table-striped table-primary table-hover">
		<thead>
	   <tr>
		<th data-class="expand"><a href="<?php echo (isset($this->_rootref['U_SORT_USERNAME'])) ? $this->_rootref['U_SORT_USERNAME'] : ''; ?>"><?php if ($this->_rootref['S_SHOW_GROUP'] && sizeof($this->_tpldata['memberrow'])) {  echo ((isset($this->_rootref['L_GROUP_LEADER'])) ? $this->_rootref['L_GROUP_LEADER'] : ((isset($user->lang['GROUP_LEADER'])) ? $user->lang['GROUP_LEADER'] : '{ GROUP_LEADER }')); } else { echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); } ?></a><?php echo ((isset($this->_rootref['L_COMMA_SEPARATOR'])) ? $this->_rootref['L_COMMA_SEPARATOR'] : ((isset($user->lang['COMMA_SEPARATOR'])) ? $user->lang['COMMA_SEPARATOR'] : '{ COMMA_SEPARATOR }')); ?><a href="<?php echo (isset($this->_rootref['U_SORT_RANK'])) ? $this->_rootref['U_SORT_RANK'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?></a></th>
		<th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_POSTS'])) ? $this->_rootref['U_SORT_POSTS'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></a></th>
		<th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_WEBSITE'])) ? $this->_rootref['U_SORT_WEBSITE'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_WEBSITE'])) ? $this->_rootref['L_WEBSITE'] : ((isset($user->lang['WEBSITE'])) ? $user->lang['WEBSITE'] : '{ WEBSITE }')); ?></a><?php echo ((isset($this->_rootref['L_COMMA_SEPARATOR'])) ? $this->_rootref['L_COMMA_SEPARATOR'] : ((isset($user->lang['COMMA_SEPARATOR'])) ? $user->lang['COMMA_SEPARATOR'] : '{ COMMA_SEPARATOR }')); ?><a href="<?php echo (isset($this->_rootref['U_SORT_LOCATION'])) ? $this->_rootref['U_SORT_LOCATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?></a></th>
		<th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_JOINED'])) ? $this->_rootref['U_SORT_JOINED'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></a></th>
        <?php if ($this->_rootref['U_SORT_ACTIVE']) {  ?>

        <th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_ACTIVE'])) ? $this->_rootref['U_SORT_ACTIVE'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_LAST_ACTIVE'])) ? $this->_rootref['L_LAST_ACTIVE'] : ((isset($user->lang['LAST_ACTIVE'])) ? $user->lang['LAST_ACTIVE'] : '{ LAST_ACTIVE }')); ?></a></th>
		<?php } ?>

		</tr>
		</thead>
		<tbody>
	<?php } $_memberrow_count = (isset($this->_tpldata['memberrow'])) ? sizeof($this->_tpldata['memberrow']) : 0;if ($_memberrow_count) {for ($_memberrow_i = 0; $_memberrow_i < $_memberrow_count; ++$_memberrow_i){$_memberrow_val = &$this->_tpldata['memberrow'][$_memberrow_i]; if ($this->_rootref['S_SHOW_GROUP']) {  if (! $_memberrow_val['S_GROUP_LEADER'] && ! $this->_tpldata['DEFINE']['.']['S_MEMBER_HEADER']) {  if ($this->_rootref['S_LEADERS_SET'] && $_memberrow_val['S_FIRST_ROW']) {  ?>

		<tr>
			<td colspan="<?php if ($this->_rootref['U_SORT_ACTIVE']) {  ?>5<?php } else { ?>4<?php } ?>">&nbsp;</td>
		</tr>
		<?php } if ($this->_rootref['S_LEADERS_SET']) {  ?>

		</tbody>
		</table>
		</div>
    </div>
<?php } ?>

   <div class="panel panel-forum">
	     <div class="panel-heading">
		  <i class="fa fa-group"></i> <?php echo ((isset($this->_rootref['L_MEMBERS'])) ? $this->_rootref['L_MEMBERS'] : ((isset($user->lang['MEMBERS'])) ? $user->lang['MEMBERS'] : '{ MEMBERS }')); ?>

		 </div>
		 <div class="panel-inner">
		<table class="footable table table-striped table-primary table-hover">
	<thead>
	<tr>
	<?php if (! $this->_rootref['S_LEADERS_SET']) {  ?>

		<th data-class="expand"><a href="<?php echo (isset($this->_rootref['U_SORT_USERNAME'])) ? $this->_rootref['U_SORT_USERNAME'] : ''; ?>"><?php if ($this->_rootref['S_SHOW_GROUP']) {  echo ((isset($this->_rootref['L_GROUP_MEMBERS'])) ? $this->_rootref['L_GROUP_MEMBERS'] : ((isset($user->lang['GROUP_MEMBERS'])) ? $user->lang['GROUP_MEMBERS'] : '{ GROUP_MEMBERS }')); } else { echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); } ?></a><span><?php echo ((isset($this->_rootref['L_COMMA_SEPARATOR'])) ? $this->_rootref['L_COMMA_SEPARATOR'] : ((isset($user->lang['COMMA_SEPARATOR'])) ? $user->lang['COMMA_SEPARATOR'] : '{ COMMA_SEPARATOR }')); ?><a href="<?php echo (isset($this->_rootref['U_SORT_RANK'])) ? $this->_rootref['U_SORT_RANK'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?></a></span></th>
		<th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_POSTS'])) ? $this->_rootref['U_SORT_POSTS'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></a></th>
		<th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_WEBSITE'])) ? $this->_rootref['U_SORT_WEBSITE'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_WEBSITE'])) ? $this->_rootref['L_WEBSITE'] : ((isset($user->lang['WEBSITE'])) ? $user->lang['WEBSITE'] : '{ WEBSITE }')); ?></a><?php echo ((isset($this->_rootref['L_COMMA_SEPARATOR'])) ? $this->_rootref['L_COMMA_SEPARATOR'] : ((isset($user->lang['COMMA_SEPARATOR'])) ? $user->lang['COMMA_SEPARATOR'] : '{ COMMA_SEPARATOR }')); ?><a href="<?php echo (isset($this->_rootref['U_SORT_LOCATION'])) ? $this->_rootref['U_SORT_LOCATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?></a></th>
	    <th data-hide="phone"><a href="<?php echo (isset($this->_rootref['U_SORT_JOINED'])) ? $this->_rootref['U_SORT_JOINED'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></a></th>
		<?php if ($this->_rootref['U_SORT_ACTIVE']) {  ?>

		<th><a href="<?php echo (isset($this->_rootref['U_SORT_ACTIVE'])) ? $this->_rootref['U_SORT_ACTIVE'] : ''; ?>#memberlist"><?php echo ((isset($this->_rootref['L_LAST_ACTIVE'])) ? $this->_rootref['L_LAST_ACTIVE'] : ((isset($user->lang['LAST_ACTIVE'])) ? $user->lang['LAST_ACTIVE'] : '{ LAST_ACTIVE }')); ?></a></th>
		<?php } } else if ($this->_rootref['S_SHOW_GROUP']) {  ?>

		<th><i class="fa fa-group"></i> <?php echo ((isset($this->_rootref['L_GROUP_MEMBERS'])) ? $this->_rootref['L_GROUP_MEMBERS'] : ((isset($user->lang['GROUP_MEMBERS'])) ? $user->lang['GROUP_MEMBERS'] : '{ GROUP_MEMBERS }')); ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<?php if ($this->_rootref['U_SORT_ACTIVE']) {  ?><th class="active">&nbsp;</th><?php } } ?>

	</tr>
	</thead>
	<tbody>
			<?php $this->_tpldata['DEFINE']['.']['S_MEMBER_HEADER'] = 1; } } ?>


	<tr>
		<td><?php if ($this->_rootref['S_IN_SEARCH_POPUP'] && ! $this->_rootref['S_SELECT_SINGLE']) {  ?><span><input type="checkbox" name="user" id="<?php echo $_memberrow_val['USERNAME']; ?>" value="<?php echo $_memberrow_val['USERNAME']; ?>"><label for="<?php echo $_memberrow_val['USERNAME']; ?>"></label></span> <?php } echo $_memberrow_val['USERNAME_FULL']; ?><br><?php if ($_memberrow_val['RANK_IMG']) {  echo $_memberrow_val['RANK_IMG']; } else { ?><small><?php echo $_memberrow_val['RANK_TITLE']; ?></small><?php } if ($this->_rootref['S_SELECT_SINGLE']) {  ?><br />[&nbsp;<a href="#" onclick="insert_single('<?php echo $_memberrow_val['A_USERNAME']; ?>'); return false;"><?php echo ((isset($this->_rootref['L_SELECT'])) ? $this->_rootref['L_SELECT'] : ((isset($user->lang['SELECT'])) ? $user->lang['SELECT'] : '{ SELECT }')); ?></a>&nbsp;]<?php } ?></td>
		<td><?php if ($_memberrow_val['POSTS'] && $this->_rootref['S_DISPLAY_SEARCH']) {  ?><a href="<?php echo $_memberrow_val['U_SEARCH_USER']; ?>" title="<?php echo ((isset($this->_rootref['L_SEARCH_USER_POSTS'])) ? $this->_rootref['L_SEARCH_USER_POSTS'] : ((isset($user->lang['SEARCH_USER_POSTS'])) ? $user->lang['SEARCH_USER_POSTS'] : '{ SEARCH_USER_POSTS }')); ?>"><?php echo $_memberrow_val['POSTS']; ?></a><?php } else { echo $_memberrow_val['POSTS']; } ?></td>
		<td><?php if ($_memberrow_val['U_WWW'] || $_memberrow_val['LOCATION']) {  if ($_memberrow_val['U_WWW']) {  ?><div><a href="<?php echo $_memberrow_val['U_WWW']; ?>" title="<?php echo ((isset($this->_rootref['L_VISIT_WEBSITE'])) ? $this->_rootref['L_VISIT_WEBSITE'] : ((isset($user->lang['VISIT_WEBSITE'])) ? $user->lang['VISIT_WEBSITE'] : '{ VISIT_WEBSITE }')); ?>: <?php echo $_memberrow_val['U_WWW']; ?>"><?php echo $_memberrow_val['U_SHORT_WWW']; ?></a></div><?php } if ($_memberrow_val['LOCATION']) {  ?><div><?php echo $_memberrow_val['LOCATION']; ?></div><?php } } else { ?>&nbsp;<?php } ?></td>
		<td><?php echo $_memberrow_val['JOINED']; ?></td>
        <?php if ($this->_rootref['S_VIEWONLINE']) {  ?>

        <td><?php echo $_memberrow_val['VISITED']; ?></td>
	    <?php } ?>

	</tr>
		<?php }} else { ?>

	<tr>
		<td colspan="<?php if ($this->_rootref['S_VIEWONLINE']) {  ?>5<?php } else { ?>4<?php } ?>"><?php echo ((isset($this->_rootref['L_NO_MEMBERS'])) ? $this->_rootref['L_NO_MEMBERS'] : ((isset($user->lang['NO_MEMBERS'])) ? $user->lang['NO_MEMBERS'] : '{ NO_MEMBERS }')); ?></td>
	</tr>
		<?php } ?>

	</tbody>
	</table>
	 </div>
  </div>
<?php if ($this->_rootref['S_IN_SEARCH_POPUP'] && ! $this->_rootref['S_SELECT_SINGLE']) {  ?>

<div class="pull-left">
	<fieldset>
	<div class="btn-group">
	<a href="javascript:;" onclick="marklist('results', 'user', true); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>"><i class="fa fa-check-square-o"></i></a>
	<a href="javascript:;" onclick="marklist('results', 'user', false); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?>"><i class="fa fa-square-o"></i></a>
	</div>
	<button class="btn btn-default" type="submit" title="" data-original-title="<?php echo ((isset($this->_rootref['L_SELECT_MARKED'])) ? $this->_rootref['L_SELECT_MARKED'] : ((isset($user->lang['SELECT_MARKED'])) ? $user->lang['SELECT_MARKED'] : '{ SELECT_MARKED }')); ?>"> <?php echo ((isset($this->_rootref['L_SELECT_MARKED'])) ? $this->_rootref['L_SELECT_MARKED'] : ((isset($user->lang['SELECT_MARKED'])) ? $user->lang['SELECT_MARKED'] : '{ SELECT_MARKED }')); ?></button>
    </fieldset>
</div>
<?php } if ($this->_rootref['S_IN_SEARCH_POPUP']) {  ?>

</form>

<form method="post" id="sort-results" action="<?php echo (isset($this->_rootref['S_MODE_ACTION'])) ? $this->_rootref['S_MODE_ACTION'] : ''; ?>">
<?php } if ($this->_rootref['S_IN_SEARCH_POPUP'] && ! $this->_rootref['S_SEARCH_USER']) {  ?>

<fieldset>
	<label for="sk"><?php echo ((isset($this->_rootref['L_SELECT_SORT_METHOD'])) ? $this->_rootref['L_SELECT_SORT_METHOD'] : ((isset($user->lang['SELECT_SORT_METHOD'])) ? $user->lang['SELECT_SORT_METHOD'] : '{ SELECT_SORT_METHOD }')); ?>:</label> 
	<select class="selectpicker" data-container="body" data-width="auto" name="sk" id="sk"><?php echo (isset($this->_rootref['S_MODE_SELECT'])) ? $this->_rootref['S_MODE_SELECT'] : ''; ?></select>
	
	<label for="sd"><?php echo ((isset($this->_rootref['L_ORDER'])) ? $this->_rootref['L_ORDER'] : ((isset($user->lang['ORDER'])) ? $user->lang['ORDER'] : '{ ORDER }')); ?></label> 
	<select class="selectpicker" data-container="body" data-width="auto" name="sd" id="sd"><?php echo (isset($this->_rootref['S_ORDER_SELECT'])) ? $this->_rootref['S_ORDER_SELECT'] : ''; ?></select> 
	<button type="submit" name="sort" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
</fieldset>
<?php } ?>

</form>


<div class="clearfix">
    <div class="pull-right">
            <ul class="pagination pagination-sm">
			<?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } ?>

	         <li class="active"><a><?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?></a></li>
             <?php if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

			</ul>	
    </div>
 </div>

<?php if ($this->_rootref['S_IN_SEARCH_POPUP']) {  $this->_tpl_include('simple_footer.html'); } else { ?>

	<div class="row">
<?php $this->_tpl_include('jumpbox.html'); ?>

</div>

<?php $this->_tpl_include('jump_links.html'); $this->_tpl_include('overall_footer.html'); } ?>