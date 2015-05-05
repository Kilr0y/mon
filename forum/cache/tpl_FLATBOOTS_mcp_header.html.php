<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<h2><?php echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?></h2>
<?php if ($this->_rootref['U_MCP']) {  ?>

	<p>
		[ <a href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?></a><?php if ($this->_rootref['U_MCP_FORUM']) {  ?> | <a href="<?php echo (isset($this->_rootref['U_MCP_FORUM'])) ? $this->_rootref['U_MCP_FORUM'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MODERATE_FORUM'])) ? $this->_rootref['L_MODERATE_FORUM'] : ((isset($user->lang['MODERATE_FORUM'])) ? $user->lang['MODERATE_FORUM'] : '{ MODERATE_FORUM }')); ?></a><?php } if ($this->_rootref['U_MCP_TOPIC']) {  ?> | <a href="<?php echo (isset($this->_rootref['U_MCP_TOPIC'])) ? $this->_rootref['U_MCP_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MODERATE_TOPIC'])) ? $this->_rootref['L_MODERATE_TOPIC'] : ((isset($user->lang['MODERATE_TOPIC'])) ? $user->lang['MODERATE_TOPIC'] : '{ MODERATE_TOPIC }')); ?></a><?php } if ($this->_rootref['U_MCP_POST']) {  ?> | <a href="<?php echo (isset($this->_rootref['U_MCP_POST'])) ? $this->_rootref['U_MCP_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MODERATE_POST'])) ? $this->_rootref['L_MODERATE_POST'] : ((isset($user->lang['MODERATE_POST'])) ? $user->lang['MODERATE_POST'] : '{ MODERATE_POST }')); ?></a><?php } ?> ]
	</p>
<?php } ?>

<div class="panel has-nav-tabs no-border">
	<ul class="nav nav-tabs">
		<?php $_l_block1_count = (isset($this->_tpldata['l_block1'])) ? sizeof($this->_tpldata['l_block1']) : 0;if ($_l_block1_count) {for ($_l_block1_i = 0; $_l_block1_i < $_l_block1_count; ++$_l_block1_i){$_l_block1_val = &$this->_tpldata['l_block1'][$_l_block1_i]; ?>

		<li<?php if ($_l_block1_val['S_SELECTED']) {  ?> class="active"<?php } ?>><a href="<?php echo $_l_block1_val['U_TITLE']; ?>"><?php echo $_l_block1_val['L_TITLE']; ?></a></li>
		<?php }} ?>

	</ul>

<div class="panel-content">
 <div class="panel-body">
  <div class="row">
  
  <!-- col-md-12 ends in mcp_footer
   <div class="col-md-12">
   -->
  
    <div class="col-md-3">
		<div class="list-group">
			<?php $_l_block1_count = (isset($this->_tpldata['l_block1'])) ? sizeof($this->_tpldata['l_block1']) : 0;if ($_l_block1_count) {for ($_l_block1_i = 0; $_l_block1_i < $_l_block1_count; ++$_l_block1_i){$_l_block1_val = &$this->_tpldata['l_block1'][$_l_block1_i]; if ($_l_block1_val['S_SELECTED']) {  $_l_block2_count = (isset($_l_block1_val['l_block2'])) ? sizeof($_l_block1_val['l_block2']) : 0;if ($_l_block2_count) {for ($_l_block2_i = 0; $_l_block2_i < $_l_block2_count; ++$_l_block2_i){$_l_block2_val = &$_l_block1_val['l_block2'][$_l_block2_i]; if ($_l_block2_val['S_SELECTED']) {  ?>

				 <a class="list-group-item active" href="<?php echo $_l_block2_val['U_TITLE']; ?>"><?php echo $_l_block2_val['L_TITLE']; if ($_l_block2_val['ADD_ITEM']) {  ?> (<?php echo $_l_block2_val['ADD_ITEM']; ?>)<?php } ?></a>
				<?php } else { ?>

				 <a class="list-group-item" href="<?php echo $_l_block2_val['U_TITLE']; ?>"><?php echo $_l_block2_val['L_TITLE']; if ($_l_block2_val['ADD_ITEM']) {  ?> (<?php echo $_l_block2_val['ADD_ITEM']; ?>)<?php } ?></a>
				<?php } }} } }} ?>

		</div>
	</div>

   <div class="col-md-9">
	<div class="tab-content">
		<?php if ($this->_rootref['MESSAGE']) {  ?>

		<div class="content">
			<h2><?php echo ((isset($this->_rootref['L_MESSAGE'])) ? $this->_rootref['L_MESSAGE'] : ((isset($user->lang['MESSAGE'])) ? $user->lang['MESSAGE'] : '{ MESSAGE }')); ?></h2>
			<p class="error"><?php echo (isset($this->_rootref['MESSAGE'])) ? $this->_rootref['MESSAGE'] : ''; ?></p>
			<p><?php $_return_links_count = (isset($this->_tpldata['return_links'])) ? sizeof($this->_tpldata['return_links']) : 0;if ($_return_links_count) {for ($_return_links_i = 0; $_return_links_i < $_return_links_count; ++$_return_links_i){$_return_links_val = &$this->_tpldata['return_links'][$_return_links_i]; echo $_return_links_val['MESSAGE_LINK']; ?><br /><br /><?php }} ?></p>
		</div>
		<?php } if ($this->_rootref['CONFIRM_MESSAGE']) {  ?>

		<form id="confirm" method="post" action="<?php echo (isset($this->_rootref['S_CONFIRM_ACTION'])) ? $this->_rootref['S_CONFIRM_ACTION'] : ''; ?>"<?php echo (isset($this->_rootref['S_FORM_ENCTYPE'])) ? $this->_rootref['S_FORM_ENCTYPE'] : ''; ?>>
			<div class="well">
				<h2><?php echo ((isset($this->_rootref['L_PLEASE_CONFIRM'])) ? $this->_rootref['L_PLEASE_CONFIRM'] : ((isset($user->lang['PLEASE_CONFIRM'])) ? $user->lang['PLEASE_CONFIRM'] : '{ PLEASE_CONFIRM }')); ?></h2>
				<p><?php echo (isset($this->_rootref['CONFIRM_MESSAGE'])) ? $this->_rootref['CONFIRM_MESSAGE'] : ''; ?></p>
				<fieldset>
					<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

					<button class="btn btn-default" type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?>"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></button>
					<button class="btn btn-default" type="cancel" value="<?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?>"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></button>
				</fieldset>
			</div>
		</form>
	<?php } ?>