<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>

<form method="post" id="mcp" action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">
<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h3></div>
<div class="well">
<div class="row">
    <div class="col-md-2">
	  <?php if ($this->_rootref['AVATAR_IMG']) {  echo (isset($this->_rootref['AVATAR_IMG'])) ? $this->_rootref['AVATAR_IMG'] : ''; } else { ?><div class="fileinput-new thumbnail" style="width: 100px; height: 100px;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/no_avatar.gif" alt="" /></div><?php } ?>

    </div>

      <ul class="list-unstyled">
	    <li><i class="fa fa-user text-muted"></i><?php if ($this->_rootref['USER_COLOR']) {  ?><span style="color: #<?php echo (isset($this->_rootref['USER_COLOR'])) ? $this->_rootref['USER_COLOR'] : ''; ?>"> <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?></span><?php } else { ?> <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; } ?></li>
        <li><i class="fa fa-calendar text-muted"></i> <?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>: <?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?></li>
        <li><i class="fa fa-comments text-muted"></i> <?php echo ((isset($this->_rootref['L_TOTAL_POSTS'])) ? $this->_rootref['L_TOTAL_POSTS'] : ((isset($user->lang['TOTAL_POSTS'])) ? $user->lang['TOTAL_POSTS'] : '{ TOTAL_POSTS }')); ?>: <?php echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?></li>
        <li><i class="fa fa-warning text-muted"></i> <?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?>: <?php echo (isset($this->_rootref['WARNINGS'])) ? $this->_rootref['WARNINGS'] : ''; ?></li>
		<?php if ($this->_rootref['RANK_TITLE']) {  ?><li> <?php echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; ?></li><?php } ?>

      </ul>
</div>
</div>

<div class="well">
        <div class="control-group"> 
	          <label class="control-label" for="usernote"><?php echo ((isset($this->_rootref['L_ADD_FEEDBACK'])) ? $this->_rootref['L_ADD_FEEDBACK'] : ((isset($user->lang['ADD_FEEDBACK'])) ? $user->lang['ADD_FEEDBACK'] : '{ ADD_FEEDBACK }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_ADD_FEEDBACK_EXPLAIN'])) ? $this->_rootref['L_ADD_FEEDBACK_EXPLAIN'] : ((isset($user->lang['ADD_FEEDBACK_EXPLAIN'])) ? $user->lang['ADD_FEEDBACK_EXPLAIN'] : '{ ADD_FEEDBACK_EXPLAIN }')); ?></span>
	        <div class="controls controls-row"> 
              <textarea placeholder="<?php echo ((isset($this->_rootref['L_ADD_FEEDBACK'])) ? $this->_rootref['L_ADD_FEEDBACK'] : ((isset($user->lang['ADD_FEEDBACK'])) ? $user->lang['ADD_FEEDBACK'] : '{ ADD_FEEDBACK }')); ?>..." rows="2"  name="usernote" id="usernote" class="form-control"></textarea>
	         </div> 
	    </div>
</div>



<fieldset class="form-actions">
	<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

	<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default"><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button>
	<button type="submit" name="action[add_feedback]" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>

<div class="space10"></div>

<div class="row">

	<div class="col-md-6">
	<div class="input-group input-group-sm">
	   <input class="form-control" type="text" class="medium" size="" name="keywords" id="search_keywords" placeholder="<?php echo ((isset($this->_rootref['L_SEARCH_KEYWORDS'])) ? $this->_rootref['L_SEARCH_KEYWORDS'] : ((isset($user->lang['SEARCH_KEYWORDS'])) ? $user->lang['SEARCH_KEYWORDS'] : '{ SEARCH_KEYWORDS }')); ?>:">
	<span class="input-group-btn">
	  <button type="submit" class="btn btn-default"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></button>
    </span>
	</div>
	</div>
	
	   <div class="col-md-6">
            <ul class="pagination pagination-sm pull-right">
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL_REPORTS']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul>
	    </div>
		
</div>

<div class="panel panel-forum">
	<div class="panel-heading">
	 <i class="fa fa-edit"></i> <?php echo ((isset($this->_rootref['L_NOTE'])) ? $this->_rootref['L_NOTE'] : ((isset($user->lang['NOTE'])) ? $user->lang['NOTE'] : '{ NOTE }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
	<thead>
	<tr>
		<th data-hide="phone"><i class="fa fa-book"></i> <?php echo ((isset($this->_rootref['L_ACTION_NOTE'])) ? $this->_rootref['L_ACTION_NOTE'] : ((isset($user->lang['ACTION_NOTE'])) ? $user->lang['ACTION_NOTE'] : '{ ACTION_NOTE }')); ?></th>
		<th data-class="expand"><i class="fa fa-user"></i> <?php echo ((isset($this->_rootref['L_REPORT_BY'])) ? $this->_rootref['L_REPORT_BY'] : ((isset($user->lang['REPORT_BY'])) ? $user->lang['REPORT_BY'] : '{ REPORT_BY }')); ?></th>
		<th data-hide="phone"><i class="icon-moon-ipcontrol"></i> <?php echo ((isset($this->_rootref['L_IP'])) ? $this->_rootref['L_IP'] : ((isset($user->lang['IP'])) ? $user->lang['IP'] : '{ IP }')); ?></th>
		<th data-hide="phone"><i class="fa fa-clock-o"></i> <?php echo ((isset($this->_rootref['L_TIME'])) ? $this->_rootref['L_TIME'] : ((isset($user->lang['TIME'])) ? $user->lang['TIME'] : '{ TIME }')); ?></th>
		<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>

        <th><i class="fa fa-check-square-o"></i> <?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
		<?php } ?>

	</tr>
	</thead>
	<tbody>
	<?php $_usernotes_count = (isset($this->_tpldata['usernotes'])) ? sizeof($this->_tpldata['usernotes']) : 0;if ($_usernotes_count) {for ($_usernotes_i = 0; $_usernotes_i < $_usernotes_count; ++$_usernotes_i){$_usernotes_val = &$this->_tpldata['usernotes'][$_usernotes_i]; ?>

	<tr>
	    <td><?php echo $_usernotes_val['ACTION']; ?></td>
		<td><?php echo $_usernotes_val['REPORT_BY']; ?></td>
		<td><?php echo $_usernotes_val['IP']; ?></td>
		<td><?php echo $_usernotes_val['REPORT_AT']; ?></td>
	<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>

	    <td class="table-check"><div class="checker"><input type="checkbox" name="marknote[]" id="note-<?php echo $_usernotes_val['ID']; ?>" value="<?php echo $_usernotes_val['ID']; ?>"><label for="note-<?php echo $_usernotes_val['ID']; ?>"></label></div></td>
	<?php } ?>

	</tr>
	<?php }} else { ?>

	<tr>
		<td colspan="<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>5<?php } else { ?>4<?php } ?>" ><?php echo ((isset($this->_rootref['L_NO_ENTRIES'])) ? $this->_rootref['L_NO_ENTRIES'] : ((isset($user->lang['NO_ENTRIES'])) ? $user->lang['NO_ENTRIES'] : '{ NO_ENTRIES }')); ?></td>
	</tr>
	<?php } ?>

	</tbody>
	</table>
	</div>
</div>
	
	<div class="clearfix">
        <div class="pull-right">
            <ul class="pagination pagination-sm">
			 <li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li>
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL_REPORTS']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul> 	
	    </div>
   
  
  <?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>

  
   <div class="pull-left">
	<fieldset>
	<div class="btn-group">
	 <button class="btn btn-default" type="submit" name="action[del_all]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_DELETE_ALL'])) ? $this->_rootref['L_DELETE_ALL'] : ((isset($user->lang['DELETE_ALL'])) ? $user->lang['DELETE_ALL'] : '{ DELETE_ALL }')); ?>"><i class="fa fa-trash-o"></i></button>
	 <button class="btn btn-default" type="submit" name="action[del_marked]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_DELETE_MARKED'])) ? $this->_rootref['L_DELETE_MARKED'] : ((isset($user->lang['DELETE_MARKED'])) ? $user->lang['DELETE_MARKED'] : '{ DELETE_MARKED }')); ?>"><i class="fa fa-times"></i></button>
	</div>
	
	<div class="btn-group">
	<a href="javascript:;" onclick="marklist('mcp', 'marknote', true); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>"><i class="fa fa-check-square-o"></i></a>
	<a href="javascript:;" onclick="marklist('mcp', 'marknote', false); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?>"><i class="fa fa-square-o"></i></a>
	</div>
    </fieldset>
	</div>
	</div>
<?php } ?>

  
     <div class="space10"></div>
  
<div class="hidden-xs">
	<fieldset class="controls-row">
                    <div class="sorting collapse">
					 <div class="panel panel-default">
					  <div class="panel-body">
                        <div class="col-md-12 col-sm-12">
						<div class="col-md-4 col-sm-4"> 
                         <label for="bday_day"><?php echo ((isset($this->_rootref['L_DISPLAY'])) ? $this->_rootref['L_DISPLAY'] : ((isset($user->lang['DISPLAY'])) ? $user->lang['DISPLAY'] : '{ DISPLAY }')); ?>:</label>
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
                        </div>
                      </div>
					 </div>
					</div>
	</fieldset> 
</div>
	
</form>

<?php $this->_tpl_include('mcp_footer.html'); ?>