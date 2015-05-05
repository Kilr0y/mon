<?php if (!defined('IN_PHPBB')) exit; ?><div class="mastbottom">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
		      <p class="call-to-action"><?php echo ((isset($this->_rootref['L_CALL_TO_ACTION_FOOTER'])) ? $this->_rootref['L_CALL_TO_ACTION_FOOTER'] : ((isset($user->lang['CALL_TO_ACTION_FOOTER'])) ? $user->lang['CALL_TO_ACTION_FOOTER'] : '{ CALL_TO_ACTION_FOOTER }')); ?></p>
			</div>
			<div class="col-md-3">
			  <a href="http://goo.gl/LvmwlF" class="btn btn-xl btn-danger pull-right" title=""><?php echo ((isset($this->_rootref['L_PURCHASE_NOW_BTN'])) ? $this->_rootref['L_PURCHASE_NOW_BTN'] : ((isset($user->lang['PURCHASE_NOW_BTN'])) ? $user->lang['PURCHASE_NOW_BTN'] : '{ PURCHASE_NOW_BTN }')); ?></a>
			</div>
		</div>
	</div>
</div>