<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>

<form id="mcp" method="post" action="<?php echo (isset($this->_rootref['S_MCP_ACTION'])) ? $this->_rootref['S_MCP_ACTION'] : ''; ?>">
<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h3></div>
	<p><?php echo ((isset($this->_rootref['L_EXPLAIN'])) ? $this->_rootref['L_EXPLAIN'] : ((isset($user->lang['EXPLAIN'])) ? $user->lang['EXPLAIN'] : '{ EXPLAIN }')); ?></p>
<div class="clearfix">
		<div class="pull-right">
            <ul class="pagination pagination-sm">
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL'])) ? $this->_rootref['TOTAL'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul>	
	    </div>
		
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
</div>


	<?php if (sizeof($this->_tpldata['postrow'])) {  ?>	
	<div class="panel panel-forum">
	     <div class="panel-heading">
		  <i class="fa fa-bar-chart-o"></i> <?php echo ((isset($this->_rootref['L_QUEUE'])) ? $this->_rootref['L_QUEUE'] : ((isset($user->lang['QUEUE'])) ? $user->lang['QUEUE'] : '{ QUEUE }')); ?>

		 </div>
		 <div class="panel-inner">
		<table class="footable table table-striped table-primary table-hover">
        <thead>
		<tr>
			<th data-class="expand"><?php if ($this->_rootref['S_TOPICS']) {  echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); } else { echo ((isset($this->_rootref['L_POST'])) ? $this->_rootref['L_POST'] : ((isset($user->lang['POST'])) ? $user->lang['POST'] : '{ POST }')); } ?></th>
			<th data-hide="phone"><?php if (! $this->_rootref['S_TOPICS']) {  echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> <?php } echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></th>
		    <th class="table-check"><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $_postrow_count = (isset($this->_tpldata['postrow'])) ? sizeof($this->_tpldata['postrow']) : 0;if ($_postrow_count) {for ($_postrow_i = 0; $_postrow_i < $_postrow_count; ++$_postrow_i){$_postrow_val = &$this->_tpldata['postrow'][$_postrow_i]; if ($_postrow_val['S_DELETED_TOPIC']) {  ?>

			<p><?php echo ((isset($this->_rootref['L_DELETED_TOPIC'])) ? $this->_rootref['L_DELETED_TOPIC'] : ((isset($user->lang['DELETED_TOPIC'])) ? $user->lang['DELETED_TOPIC'] : '{ DELETED_TOPIC }')); ?></p>
		<?php } else { ?>

	<tr>
		<td>
		<a href="<?php echo $_postrow_val['U_VIEW_DETAILS']; ?>" class="topictitle"><?php echo $_postrow_val['POST_SUBJECT']; ?></a> <br />
		 <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_postrow_val['POST_AUTHOR_FULL']; ?> &#45;
		 <small><?php echo $_postrow_val['POST_TIME']; ?></small>
		</td>
		<td>
		<?php if ($this->_rootref['S_TOPICS']) {  echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?>: <a href="<?php echo $_postrow_val['U_TOPIC']; ?>"><?php echo $_postrow_val['TOPIC_TITLE']; ?></a> <?php } ?><br>
		<?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_postrow_val['U_VIEWFORUM']; ?>"><?php echo $_postrow_val['FORUM_NAME']; ?></a>
		</td>
		<td class="table-check"><div class="checker"><input type="checkbox" name="post_id_list[]" value="<?php echo $_postrow_val['POST_ID']; ?>" id="<?php echo $_postrow_val['POST_ID']; ?>"><label for="<?php echo $_postrow_val['POST_ID']; ?>"></label></div></td>
	</tr>
		
		<?php } }} ?>

		</tbody>
	</table>
	 </div>
	</div>
	<?php } else { ?>

	<div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php if ($this->_rootref['S_TOPICS']) {  echo ((isset($this->_rootref['L_NO_TOPICS_QUEUE'])) ? $this->_rootref['L_NO_TOPICS_QUEUE'] : ((isset($user->lang['NO_TOPICS_QUEUE'])) ? $user->lang['NO_TOPICS_QUEUE'] : '{ NO_TOPICS_QUEUE }')); } else { echo ((isset($this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'] : ((isset($user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'] : '{ UNAPPROVED_POSTS_ZERO_TOTAL }')); } ?>

    </div> 
	<?php } ?>

	
    <div class="clearfix">
		<div class="pull-right">
            <ul class="pagination pagination-sm">
			 <li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></a></li>
	         <?php if ($this->_rootref['PREVIOUS_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a></li><?php } if ($this->_rootref['TOTAL']) {  ?><li class="active"><a><?php echo (isset($this->_rootref['TOTAL'])) ? $this->_rootref['TOTAL'] : ''; ?></a></li><?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?><li><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li> <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } else { ?> <li><a><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a></li><?php } } if ($this->_rootref['NEXT_PAGE']) {  ?><li><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a></li><?php } ?>

	        </ul> 	
	    </div>
	
	
	<?php if (sizeof($this->_tpldata['postrow'])) {  ?>

	<div class="pull-left">
	<fieldset>
	<div class="btn-group">
	 <button class="btn btn-default" type="submit" name="action[approve]" id="action[approve]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_APPROVE'])) ? $this->_rootref['L_APPROVE'] : ((isset($user->lang['APPROVE'])) ? $user->lang['APPROVE'] : '{ APPROVE }')); ?>"><i class="fa fa-thumbs-up"></i></button>
	 <button class="btn btn-default" type="submit" name="action[disapprove]" id="action[disapprove]" title="" data-original-title="<?php echo ((isset($this->_rootref['L_DISAPPROVE'])) ? $this->_rootref['L_DISAPPROVE'] : ((isset($user->lang['DISAPPROVE'])) ? $user->lang['DISAPPROVE'] : '{ DISAPPROVE }')); ?>"><i class="fa fa-thumbs-down"></i></button>
	</div>
	
	<div class="btn-group">
	<a href="javascript:;" onclick="marklist('mcp', 'post_id_list', true); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>"><i class="fa fa-check-square-o"></i></a>
	<a href="javascript:;" onclick="marklist('mcp', 'post_id_list', false); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?>"><i class="fa fa-square-o"></i></a>
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