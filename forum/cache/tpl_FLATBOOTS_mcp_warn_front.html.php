<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>

<form method="post" id="mcp" action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">
<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_WARN_USER'])) ? $this->_rootref['L_WARN_USER'] : ((isset($user->lang['WARN_USER'])) ? $user->lang['WARN_USER'] : '{ WARN_USER }')); ?></h3></div>
<div class="well">
	<fieldset>
	<div class="control-group"> 
	   <label class="control-label" for="username"><?php echo ((isset($this->_rootref['L_SELECT_USER'])) ? $this->_rootref['L_SELECT_USER'] : ((isset($user->lang['SELECT_USER'])) ? $user->lang['SELECT_USER'] : '{ SELECT_USER }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" name="username" id="username">
	   <strong><a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" onclick="find_username(this.href); return false;"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a></strong>
	</div> 
	</div>
	</fieldset>
</div>

<fieldset class="form-actions">
		<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default"><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button>
		<button type="submit" name="submituser" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
</form>

<div class="space10"></div>

<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_MOST_WARNINGS'])) ? $this->_rootref['L_MOST_WARNINGS'] : ((isset($user->lang['MOST_WARNINGS'])) ? $user->lang['MOST_WARNINGS'] : '{ MOST_WARNINGS }')); ?></h3></div>
	<?php if (sizeof($this->_tpldata['highest'])) {  ?>

	<div class="panel panel-forum">
	<div class="panel-heading">
	 <i class="fa fa-warning"></i> <?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
		<thead>
			<tr>
				<th data-class="expand"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></th>
				<th data-hide="phone"><?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?></th>
				<th data-hide="phone"><?php echo ((isset($this->_rootref['L_LATEST_WARNING_TIME'])) ? $this->_rootref['L_LATEST_WARNING_TIME'] : ((isset($user->lang['LATEST_WARNING_TIME'])) ? $user->lang['LATEST_WARNING_TIME'] : '{ LATEST_WARNING_TIME }')); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php $_highest_count = (isset($this->_tpldata['highest'])) ? sizeof($this->_tpldata['highest']) : 0;if ($_highest_count) {for ($_highest_i = 0; $_highest_i < $_highest_count; ++$_highest_i){$_highest_val = &$this->_tpldata['highest'][$_highest_i]; ?>

			<tr>
				<td><?php echo $_highest_val['USERNAME_FULL']; ?></td>
				<td><?php echo $_highest_val['WARNINGS']; ?> [<a href="<?php echo $_highest_val['U_NOTES']; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NOTES'])) ? $this->_rootref['L_VIEW_NOTES'] : ((isset($user->lang['VIEW_NOTES'])) ? $user->lang['VIEW_NOTES'] : '{ VIEW_NOTES }')); ?></a>]</td>
				<td><?php echo $_highest_val['WARNING_TIME']; ?></td>
			</tr>
		<?php }} ?>

		</tbody>
		</table>
		</div>
	</div>
	<?php } else { ?>

	<div class="alert alert-info fade in">
         <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo ((isset($this->_rootref['L_WARNINGS_ZERO_TOTAL'])) ? $this->_rootref['L_WARNINGS_ZERO_TOTAL'] : ((isset($user->lang['WARNINGS_ZERO_TOTAL'])) ? $user->lang['WARNINGS_ZERO_TOTAL'] : '{ WARNINGS_ZERO_TOTAL }')); ?>

    </div> 
	<?php } ?>


<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_LATEST_WARNINGS'])) ? $this->_rootref['L_LATEST_WARNINGS'] : ((isset($user->lang['LATEST_WARNINGS'])) ? $user->lang['LATEST_WARNINGS'] : '{ LATEST_WARNINGS }')); ?></h3></div>
	<?php if (sizeof($this->_tpldata['latest'])) {  ?>

	<div class="panel panel-forum">
	<div class="panel-heading">
	 <i class="fa fa-warning"></i> <?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?>

	</div>
	<div class="panel-inner">
	<table class="footable table table-striped table-primary table-hover">
		<thead>
			<tr>
				<th data-class="expand"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></th>
				<th data-hide="phone"><?php echo ((isset($this->_rootref['L_TOTAL_WARNINGS'])) ? $this->_rootref['L_TOTAL_WARNINGS'] : ((isset($user->lang['TOTAL_WARNINGS'])) ? $user->lang['TOTAL_WARNINGS'] : '{ TOTAL_WARNINGS }')); ?></th>
				<th data-hide="phone"><?php echo ((isset($this->_rootref['L_TIME'])) ? $this->_rootref['L_TIME'] : ((isset($user->lang['TIME'])) ? $user->lang['TIME'] : '{ TIME }')); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php $_latest_count = (isset($this->_tpldata['latest'])) ? sizeof($this->_tpldata['latest']) : 0;if ($_latest_count) {for ($_latest_i = 0; $_latest_i < $_latest_count; ++$_latest_i){$_latest_val = &$this->_tpldata['latest'][$_latest_i]; ?>

			<tr>
				<td><?php echo $_latest_val['USERNAME_FULL']; ?></td>
				<td><?php echo $_latest_val['WARNINGS']; ?> [<a href="<?php echo $_latest_val['U_NOTES']; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NOTES'])) ? $this->_rootref['L_VIEW_NOTES'] : ((isset($user->lang['VIEW_NOTES'])) ? $user->lang['VIEW_NOTES'] : '{ VIEW_NOTES }')); ?></a>]</td>
				<td><?php echo $_latest_val['WARNING_TIME']; ?></td>
			</tr>
		<?php }} ?>

		</tbody>
		</table>
		</div>
	</div>
	<?php } else { ?>

	<div class="alert alert-info fade in">
         <button data-dismiss="alert" class="close" type="button" aria-hidden="true"><i class="awe-remove-circle"></i></button>
        <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo ((isset($this->_rootref['L_WARNINGS_ZERO_TOTAL'])) ? $this->_rootref['L_WARNINGS_ZERO_TOTAL'] : ((isset($user->lang['WARNINGS_ZERO_TOTAL'])) ? $user->lang['WARNINGS_ZERO_TOTAL'] : '{ WARNINGS_ZERO_TOTAL }')); ?>

    </div> 
	<?php } $this->_tpl_include('mcp_footer.html'); ?>