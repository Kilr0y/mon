<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); if ($this->_rootref['S_SHOW_UNAPPROVED']) {  ?>

<form id="mcp_queue" method="post" action="<?php echo (isset($this->_rootref['S_MCP_QUEUE_ACTION'])) ? $this->_rootref['S_MCP_QUEUE_ACTION'] : ''; ?>">
 <div class="tab-pane active">
	  <div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_LATEST_UNAPPROVED'])) ? $this->_rootref['L_LATEST_UNAPPROVED'] : ((isset($user->lang['LATEST_UNAPPROVED'])) ? $user->lang['LATEST_UNAPPROVED'] : '{ LATEST_UNAPPROVED }')); ?></h3></div>
		<?php if ($this->_rootref['S_HAS_UNAPPROVED_POSTS']) {  ?><p><?php echo ((isset($this->_rootref['L_UNAPPROVED_TOTAL'])) ? $this->_rootref['L_UNAPPROVED_TOTAL'] : ((isset($user->lang['UNAPPROVED_TOTAL'])) ? $user->lang['UNAPPROVED_TOTAL'] : '{ UNAPPROVED_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['unapproved'])) {  ?>	
 <div class="panel panel-forum">
   <div class="panel-heading">
	 <i class="fa fa-bar-chart-o"></i> <?php echo ((isset($this->_rootref['L_LATEST_UNAPPROVED'])) ? $this->_rootref['L_LATEST_UNAPPROVED'] : ((isset($user->lang['LATEST_UNAPPROVED'])) ? $user->lang['LATEST_UNAPPROVED'] : '{ LATEST_UNAPPROVED }')); ?>

	</div>
	<div class="panel-inner">
    <table class="footable table table-striped table-primary table-hover">
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php $_unapproved_count = (isset($this->_tpldata['unapproved'])) ? sizeof($this->_tpldata['unapproved']) : 0;if ($_unapproved_count) {for ($_unapproved_i = 0; $_unapproved_i < $_unapproved_count; ++$_unapproved_i){$_unapproved_val = &$this->_tpldata['unapproved'][$_unapproved_i]; ?>

	    <tr>
			<td>
			    <a href="<?php echo $_unapproved_val['U_POST_DETAILS']; ?>" class="topictitle"> <?php echo $_unapproved_val['SUBJECT']; ?></a> <?php echo $_unapproved_val['ATTACH_ICON_IMG']; ?><br />
			    <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_unapproved_val['AUTHOR_FULL']; ?> &#45; <small><?php echo $_unapproved_val['POST_TIME']; ?></small>
			</td>
			<td>
				<?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?>: <a href="<?php echo $_unapproved_val['U_TOPIC']; ?>"><?php echo $_unapproved_val['TOPIC_TITLE']; ?></a> [<a href="<?php echo $_unapproved_val['U_MCP_TOPIC']; ?>"><?php echo ((isset($this->_rootref['L_MODERATE'])) ? $this->_rootref['L_MODERATE'] : ((isset($user->lang['MODERATE'])) ? $user->lang['MODERATE'] : '{ MODERATE }')); ?></a>]<br />
				<?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <?php if ($_unapproved_val['U_FORUM']) {  ?><a href="<?php echo $_unapproved_val['U_FORUM']; ?>"><?php echo $_unapproved_val['FORUM_NAME']; ?></a><?php } else { echo $_unapproved_val['FORUM_NAME']; } if ($_unapproved_val['U_MCP_FORUM']) {  ?> [<a href="<?php echo $_unapproved_val['U_MCP_FORUM']; ?>"><?php echo ((isset($this->_rootref['L_MODERATE'])) ? $this->_rootref['L_MODERATE'] : ((isset($user->lang['MODERATE'])) ? $user->lang['MODERATE'] : '{ MODERATE }')); ?></a>]<?php } ?>

			</td>
			<td><input type="checkbox" id="un-<?php echo $_unapproved_val['POST_ID']; ?>" name="post_id_list[]" value="<?php echo $_unapproved_val['POST_ID']; ?>"><label for="un-<?php echo $_unapproved_val['POST_ID']; ?>"></label></td>
		</tr>			
	<?php }} ?>

	</tbody>
	</table>
	</div>
	</div>
	<?php } else { ?>

	<div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo ((isset($this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $this->_rootref['L_UNAPPROVED_POSTS_ZERO_TOTAL'] : ((isset($user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'])) ? $user->lang['UNAPPROVED_POSTS_ZERO_TOTAL'] : '{ UNAPPROVED_POSTS_ZERO_TOTAL }')); ?>

     </div> 
	<?php } ?>

	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</div>

<?php if (sizeof($this->_tpldata['unapproved'])) {  ?>

<div class="clearfix">
	<div class="pull-left">
	<fieldset>
	<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

	<div class="btn-group">
	 <button class="btn btn-default" type="submit" name="action[approve]" id="action[approve]" value="<?php echo ((isset($this->_rootref['L_APPROVE'])) ? $this->_rootref['L_APPROVE'] : ((isset($user->lang['APPROVE'])) ? $user->lang['APPROVE'] : '{ APPROVE }')); ?>" title="" data-original-title="<?php echo ((isset($this->_rootref['L_APPROVE'])) ? $this->_rootref['L_APPROVE'] : ((isset($user->lang['APPROVE'])) ? $user->lang['APPROVE'] : '{ APPROVE }')); ?>"><i class="fa fa-thumbs-up"></i></button>
	 <button class="btn btn-default" type="submit" name="action[disapprove]" id="action[disapprove]" value="<?php echo ((isset($this->_rootref['L_DISAPPROVE'])) ? $this->_rootref['L_DISAPPROVE'] : ((isset($user->lang['DISAPPROVE'])) ? $user->lang['DISAPPROVE'] : '{ DISAPPROVE }')); ?>" title="" data-original-title="<?php echo ((isset($this->_rootref['L_DISAPPROVE'])) ? $this->_rootref['L_DISAPPROVE'] : ((isset($user->lang['DISAPPROVE'])) ? $user->lang['DISAPPROVE'] : '{ DISAPPROVE }')); ?>"><i class="fa fa-thumbs-down"></i></button>
	</div>
	
	<div class="btn-group">
	<a href="javascript:;" onclick="marklist('mcp_queue', 'post_id_list', true); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?>"><i class="fa fa-check-square-o"></i></a>
	<a href="javascript:;" onclick="marklist('mcp_queue', 'post_id_list', false); return false;" class="btn btn-default" title="" data-original-title="<?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?>"><i class="fa fa-square-o"></i></a>
	</div>
    </fieldset>
	</div>
</div>
<?php } ?>

</form>
<?php } ?>


<div class="space10"></div>

<?php if ($this->_rootref['S_SHOW_REPORTS']) {  ?>

		<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_LATEST_REPORTED'])) ? $this->_rootref['L_LATEST_REPORTED'] : ((isset($user->lang['LATEST_REPORTED'])) ? $user->lang['LATEST_REPORTED'] : '{ LATEST_REPORTED }')); ?></h3></div>
		<?php if ($this->_rootref['S_HAS_REPORTS']) {  ?><p><?php echo ((isset($this->_rootref['L_REPORTS_TOTAL'])) ? $this->_rootref['L_REPORTS_TOTAL'] : ((isset($user->lang['REPORTS_TOTAL'])) ? $user->lang['REPORTS_TOTAL'] : '{ REPORTS_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['report'])) {  ?>

	 <div class="panel panel-forum">
	 <div class="panel-heading">
	 <i class="fa fa-bar-chart-o"></i> <?php echo ((isset($this->_rootref['L_LATEST_REPORTED'])) ? $this->_rootref['L_LATEST_REPORTED'] : ((isset($user->lang['LATEST_REPORTED'])) ? $user->lang['LATEST_REPORTED'] : '{ LATEST_REPORTED }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_REPORTER'])) ? $this->_rootref['L_REPORTER'] : ((isset($user->lang['REPORTER'])) ? $user->lang['REPORTER'] : '{ REPORTER }')); ?> &amp; <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></th>
		</tr>
	</thead>		
	<tbody>
	<?php $_report_count = (isset($this->_tpldata['report'])) ? sizeof($this->_tpldata['report']) : 0;if ($_report_count) {for ($_report_i = 0; $_report_i < $_report_count; ++$_report_i){$_report_val = &$this->_tpldata['report'][$_report_i]; ?>

			 <tr>
				<td>
				<a href="<?php echo $_report_val['U_POST_DETAILS']; ?>#reports" class="topictitle"><?php echo $_report_val['SUBJECT']; ?></a> <?php echo $_report_val['ATTACH_ICON_IMG']; ?><br />
				<?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_report_val['AUTHOR_FULL']; ?> &#45; <small> <?php echo $_report_val['POST_TIME']; ?></small>
				</td>
			
				<td class="center">
				<?php echo ((isset($this->_rootref['L_REPORTED'])) ? $this->_rootref['L_REPORTED'] : ((isset($user->lang['REPORTED'])) ? $user->lang['REPORTED'] : '{ REPORTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_report_val['REPORTER_FULL']; ?> <?php echo ((isset($this->_rootref['L_REPORTED_ON_DATE'])) ? $this->_rootref['L_REPORTED_ON_DATE'] : ((isset($user->lang['REPORTED_ON_DATE'])) ? $user->lang['REPORTED_ON_DATE'] : '{ REPORTED_ON_DATE }')); ?> <small><?php echo $_report_val['REPORT_TIME']; ?></small> <br />
				<?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_report_val['U_FORUM']; ?>"><?php echo $_report_val['FORUM_NAME']; ?></a>
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
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong>  <?php echo ((isset($this->_rootref['L_REPORTS_ZERO_TOTAL'])) ? $this->_rootref['L_REPORTS_ZERO_TOTAL'] : ((isset($user->lang['REPORTS_ZERO_TOTAL'])) ? $user->lang['REPORTS_ZERO_TOTAL'] : '{ REPORTS_ZERO_TOTAL }')); ?>

    </div> 
	<?php } } if ($this->_rootref['S_SHOW_PM_REPORTS']) {  ?>

		<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_LATEST_REPORTED_PMS'])) ? $this->_rootref['L_LATEST_REPORTED_PMS'] : ((isset($user->lang['LATEST_REPORTED_PMS'])) ? $user->lang['LATEST_REPORTED_PMS'] : '{ LATEST_REPORTED_PMS }')); ?></h3></div>
		<?php if ($this->_rootref['S_HAS_PM_REPORTS']) {  ?><p><?php echo ((isset($this->_rootref['L_PM_REPORTS_TOTAL'])) ? $this->_rootref['L_PM_REPORTS_TOTAL'] : ((isset($user->lang['PM_REPORTS_TOTAL'])) ? $user->lang['PM_REPORTS_TOTAL'] : '{ PM_REPORTS_TOTAL }')); ?></p><?php } if (sizeof($this->_tpldata['pm_report'])) {  ?>

 <div class="panel panel-forum">
    <div class="panel-heading">
	 <i class="fa fa-bolt"></i> <?php echo ((isset($this->_rootref['L_LATEST_REPORTED_PMS'])) ? $this->_rootref['L_LATEST_REPORTED_PMS'] : ((isset($user->lang['LATEST_REPORTED_PMS'])) ? $user->lang['LATEST_REPORTED_PMS'] : '{ LATEST_REPORTED_PMS }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
	<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_VIEW_DETAILS'])) ? $this->_rootref['L_VIEW_DETAILS'] : ((isset($user->lang['VIEW_DETAILS'])) ? $user->lang['VIEW_DETAILS'] : '{ VIEW_DETAILS }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_REPORTER'])) ? $this->_rootref['L_REPORTER'] : ((isset($user->lang['REPORTER'])) ? $user->lang['REPORTER'] : '{ REPORTER }')); ?></th>
		</tr>
	</thead>		
	<tbody>
	<?php $_pm_report_count = (isset($this->_tpldata['pm_report'])) ? sizeof($this->_tpldata['pm_report']) : 0;if ($_pm_report_count) {for ($_pm_report_i = 0; $_pm_report_i < $_pm_report_count; ++$_pm_report_i){$_pm_report_val = &$this->_tpldata['pm_report'][$_pm_report_i]; ?>

		<tr>
			<td>
			<a href="<?php echo $_pm_report_val['U_PM_DETAILS']; ?>" class="topictitle"><?php echo $_pm_report_val['PM_SUBJECT']; ?></a> <?php echo $_pm_report_val['ATTACH_ICON_IMG']; ?><br />
			<?php echo ((isset($this->_rootref['L_MESSAGE_BY_AUTHOR'])) ? $this->_rootref['L_MESSAGE_BY_AUTHOR'] : ((isset($user->lang['MESSAGE_BY_AUTHOR'])) ? $user->lang['MESSAGE_BY_AUTHOR'] : '{ MESSAGE_BY_AUTHOR }')); ?> <?php echo $_pm_report_val['PM_AUTHOR_FULL']; ?> <?php echo ((isset($this->_rootref['L_MESSAGE_TO'])) ? $this->_rootref['L_MESSAGE_TO'] : ((isset($user->lang['MESSAGE_TO'])) ? $user->lang['MESSAGE_TO'] : '{ MESSAGE_TO }')); ?> <?php echo $_pm_report_val['RECIPIENTS']; ?> &#45;
			<small><?php echo $_pm_report_val['PM_TIME']; ?></small>
			</td>
			
			<td class="center">
			<?php echo ((isset($this->_rootref['L_REPORTED'])) ? $this->_rootref['L_REPORTED'] : ((isset($user->lang['REPORTED'])) ? $user->lang['REPORTED'] : '{ REPORTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_pm_report_val['REPORTER_FULL']; ?> 
			<br /><?php echo ((isset($this->_rootref['L_REPORTED_ON_DATE'])) ? $this->_rootref['L_REPORTED_ON_DATE'] : ((isset($user->lang['REPORTED_ON_DATE'])) ? $user->lang['REPORTED_ON_DATE'] : '{ REPORTED_ON_DATE }')); ?> <small><?php echo $_pm_report_val['REPORT_TIME']; ?></small>
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
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong>  <?php echo ((isset($this->_rootref['L_PM_REPORTS_ZERO_TOTAL'])) ? $this->_rootref['L_PM_REPORTS_ZERO_TOTAL'] : ((isset($user->lang['PM_REPORTS_ZERO_TOTAL'])) ? $user->lang['PM_REPORTS_ZERO_TOTAL'] : '{ PM_REPORTS_ZERO_TOTAL }')); ?>

     </div> 
	<?php } } if ($this->_rootref['S_SHOW_LOGS']) {  ?>


	<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_LATEST_LOGS'])) ? $this->_rootref['L_LATEST_LOGS'] : ((isset($user->lang['LATEST_LOGS'])) ? $user->lang['LATEST_LOGS'] : '{ LATEST_LOGS }')); ?></h3></div>
 <div class="panel panel-forum">
    <div class="panel-heading">
	 <i class="fa fa-bolt"></i> <?php echo ((isset($this->_rootref['L_LATEST_LOGS'])) ? $this->_rootref['L_LATEST_LOGS'] : ((isset($user->lang['LATEST_LOGS'])) ? $user->lang['LATEST_LOGS'] : '{ LATEST_LOGS }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
		<thead>
		<tr>
			<th data-class="expand"><?php echo ((isset($this->_rootref['L_ACTION'])) ? $this->_rootref['L_ACTION'] : ((isset($user->lang['ACTION'])) ? $user->lang['ACTION'] : '{ ACTION }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_MCP_DETAIL_U_IP'])) ? $this->_rootref['L_MCP_DETAIL_U_IP'] : ((isset($user->lang['MCP_DETAIL_U_IP'])) ? $user->lang['MCP_DETAIL_U_IP'] : '{ MCP_DETAIL_U_IP }')); ?></th>
			<th data-hide="phone" class="large12"><?php echo ((isset($this->_rootref['L_MCP_DETAILS_LOG'])) ? $this->_rootref['L_MCP_DETAILS_LOG'] : ((isset($user->lang['MCP_DETAILS_LOG'])) ? $user->lang['MCP_DETAILS_LOG'] : '{ MCP_DETAILS_LOG }')); ?></th>
			<th data-hide="phone"><?php echo ((isset($this->_rootref['L_TIME'])) ? $this->_rootref['L_TIME'] : ((isset($user->lang['TIME'])) ? $user->lang['TIME'] : '{ TIME }')); ?></th>
		</tr>
		</thead>
		<tbody>
	<?php $_log_count = (isset($this->_tpldata['log'])) ? sizeof($this->_tpldata['log']) : 0;if ($_log_count) {for ($_log_i = 0; $_log_i < $_log_count; ++$_log_i){$_log_val = &$this->_tpldata['log'][$_log_i]; ?>

		<tr>
			<td><?php echo $_log_val['ACTION']; ?></td>
			<td><?php echo $_log_val['USERNAME']; ?> <?php echo $_log_val['IP']; ?></td>
			<td >
			<?php if ($_log_val['U_VIEW_TOPIC']) {  ?><a href="<?php echo $_log_val['U_VIEW_TOPIC']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC'])) ? $this->_rootref['L_VIEW_TOPIC'] : ((isset($user->lang['VIEW_TOPIC'])) ? $user->lang['VIEW_TOPIC'] : '{ VIEW_TOPIC }')); ?></a><?php } ?><br>
			<?php if ($_log_val['U_VIEWLOGS']) {  ?><a href="<?php echo $_log_val['U_VIEWLOGS']; ?>"><?php echo ((isset($this->_rootref['L_VIEW_TOPIC_LOGS'])) ? $this->_rootref['L_VIEW_TOPIC_LOGS'] : ((isset($user->lang['VIEW_TOPIC_LOGS'])) ? $user->lang['VIEW_TOPIC_LOGS'] : '{ VIEW_TOPIC_LOGS }')); ?></a><?php } ?>

			</td>
			<td><small><?php echo $_log_val['TIME']; ?></small></td>
		</tr>
	<?php }} else { ?>

		<tr>
			<td colspan="0"><?php echo ((isset($this->_rootref['L_NO_ENTRIES'])) ? $this->_rootref['L_NO_ENTRIES'] : ((isset($user->lang['NO_ENTRIES'])) ? $user->lang['NO_ENTRIES'] : '{ NO_ENTRIES }')); ?></td>
		</tr>
	<?php } ?>

		</tbody>
	</table>
	</div>
</div>
<?php } $this->_tpl_include('mcp_footer.html'); ?>