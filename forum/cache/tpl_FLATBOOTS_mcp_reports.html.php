<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>

<form id="mcp" method="post" action="<?php echo (isset($this->_rootref['S_MCP_ACTION'])) ? $this->_rootref['S_MCP_ACTION'] : ''; ?>">
<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h3></div>
 <p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>
<div class="clearfix">
		<div class="pull-right">
            <ul class="pagination pagination-sm">
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul>	
	    </div>
		
	<?php if (! $this->_rootref['S_PM']) {  ?>

	<div class="row">
	  <fieldset class="form-group col-md-3">
	  <div class="input-group">
		<select class="selectpicker" data-container="body" data-width="auto" data-style="btn btn-default form-control" name="f" id="fo"><?php echo (isset($this->_rootref['S_FORUM_OPTIONS'])) ? $this->_rootref['S_FORUM_OPTIONS'] : ''; ?></select>  
		<span class="input-group-btn">
		<button type="submit" name="sort" class="btn btn-default"><?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?></button>
		</span>
		</div>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	 </fieldset>
   </div>
   <?php } ?>

</div>
	
	<?php if (sizeof($this->_tpldata['postrow'])) {  ?>

	<div class="panel panel-forum">
	     <div class="panel-heading">
		  <i class="fa fa-list-ol"></i> <?php echo ((isset($this->_rootref['L_REPORTS'])) ? $this->_rootref['L_REPORTS'] : ((isset($user->lang['REPORTS'])) ? $user->lang['REPORTS'] : '{ REPORTS }')); ?>

		 </div>
		 <div class="panel-inner">
		<table class="footable table table-striped table-primary table-hover">
        <thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_REPORTER'])) ? $this->_rootref['L_REPORTER'] : ((isset($user->lang['REPORTER'])) ? $user->lang['REPORTER'] : '{ REPORTER }')); if (! $this->_rootref['S_PM']) {  ?> <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); } ?></th>
		    <th class="table-check"><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $_postrow_count = (isset($this->_tpldata['postrow'])) ? sizeof($this->_tpldata['postrow']) : 0;if ($_postrow_count) {for ($_postrow_i = 0; $_postrow_i < $_postrow_count; ++$_postrow_i){$_postrow_val = &$this->_tpldata['postrow'][$_postrow_i]; ?>

	<tr>
		<?php if ($this->_rootref['S_PM']) {  ?>

		<td>
		   <a href="<?php echo $_postrow_val['U_VIEW_DETAILS']; ?>" class="topictitle"><?php echo $_postrow_val['PM_SUBJECT']; ?></a> <?php echo $_postrow_val['ATTACH_ICON_IMG']; ?><br />
		   <?php echo ((isset($this->_rootref['L_MESSAGE_BY_AUTHOR'])) ? $this->_rootref['L_MESSAGE_BY_AUTHOR'] : ((isset($user->lang['MESSAGE_BY_AUTHOR'])) ? $user->lang['MESSAGE_BY_AUTHOR'] : '{ MESSAGE_BY_AUTHOR }')); ?> <?php echo $_postrow_val['PM_AUTHOR_FULL']; ?> <?php echo ((isset($this->_rootref['L_MESSAGE_TO'])) ? $this->_rootref['L_MESSAGE_TO'] : ((isset($user->lang['MESSAGE_TO'])) ? $user->lang['MESSAGE_TO'] : '{ MESSAGE_TO }')); ?> <?php echo $_postrow_val['RECIPIENTS']; ?> &#45;
		   <small><?php echo $_postrow_val['PM_TIME']; ?></small>
		</td>
		
		<td>
		<?php echo $_postrow_val['REPORTER_FULL']; ?><br>
		<small><?php echo $_postrow_val['REPORT_TIME']; ?></small>
		</td>
		<?php } else { ?>

		
		<td>
		<a href="<?php echo $_postrow_val['U_VIEW_DETAILS']; ?>"><?php echo $_postrow_val['POST_SUBJECT']; ?></a> <?php echo $_postrow_val['ATTACH_ICON_IMG']; ?><br />
	    <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_postrow_val['POST_AUTHOR_FULL']; ?> &#45;
		<small><?php echo $_postrow_val['POST_TIME']; ?></small>
		</td>
		
		<td>
		<?php echo $_postrow_val['REPORTER_FULL']; ?> &#45;
		<small><?php echo $_postrow_val['REPORT_TIME']; ?></small><br />
		<?php if ($_postrow_val['U_VIEWFORUM']) {  echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_postrow_val['U_VIEWFORUM']; ?>"><?php echo $_postrow_val['FORUM_NAME']; ?></a><?php } else { echo $_postrow_val['FORUM_NAME']; } ?>

		</td>
		<?php } ?>

		<td class="table-check"><div class="checker"><input type="checkbox" name="report_id_list[]" value="<?php echo $_postrow_val['REPORT_ID']; ?>" id="report_id_list[]"><label for="report_id_list[]"></label></div></td>
	</tr>
			
		<?php }} ?>

			</tbody>
	</table>
	</div>
</div>
	<?php } else { ?>

	<div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo ((isset($this->_rootref['L_NO_REPORTS'])) ? $this->_rootref['L_NO_REPORTS'] : ((isset($user->lang['NO_REPORTS'])) ? $user->lang['NO_REPORTS'] : '{ NO_REPORTS }')); ?>

    </div> 
	<?php } ?>


	<div class="clearfix">
		<div class="pull-right">
            <ul class="pagination pagination-sm">
			<li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li>
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul> 	
	    </div>
		
	<?php if (sizeof($this->_tpldata['postrow'])) {  ?>

	<div class="pull-left">
	<fieldset>
	<div class="btn-group">
	 <button class="btn btn-default" type="submit" name="action[delete]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_DELETE_REPORTS'])) ? $this->_rootref['L_DELETE_REPORTS'] : ((isset($user->lang['DELETE_REPORTS'])) ? $user->lang['DELETE_REPORTS'] : '{ DELETE_REPORTS }')); ?>"><i class="fa fa-trash-o"></i></button>
	 <?php if (! $this->_rootref['S_CLOSED']) {  ?>

	 <button class="btn btn-default" type="submit" name="action[close]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_CLOSE_REPORTS'])) ? $this->_rootref['L_CLOSE_REPORTS'] : ((isset($user->lang['CLOSE_REPORTS'])) ? $user->lang['CLOSE_REPORTS'] : '{ CLOSE_REPORTS }')); ?>"><i class="fa fa-lock"></i></button>
	 <?php } ?>

	</div>
	
	<div class="btn-group">
	<a href="javascript:;" onclick="marklist('mcp', 'report_id_list', true); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>"><i class="fa fa-check-square-o"></i></a>
	<a href="javascript:;" onclick="marklist('mcp', 'report_id_list', false); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?>"><i class="fa fa-square-o"></i></a>
	</div>
    </fieldset>
	</div>
    <?php } ?>

	</div>

<div class="space10"></div>
	
<div class="hidden-xs">
	<fieldset class="controls-row">
                    <div class="sorting collapse">
					 <div class="panel panel-default">
					  <div class="panel-body">
					  <div class="row">
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
					</div>
            <!-- // Widget --> 
	</fieldset> 
</div>
</form>
<?php $this->_tpl_include('mcp_footer.html'); ?>