<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<div class="clearfix">
<div class="side-segment"><h3><?php if ($this->_rootref['S_REPORT_POST']) {  echo ((isset($this->_rootref['L_REPORT_POST'])) ? $this->_rootref['L_REPORT_POST'] : ((isset($user->lang['REPORT_POST'])) ? $user->lang['REPORT_POST'] : '{ REPORT_POST }')); } else { echo ((isset($this->_rootref['L_REPORT_MESSAGE'])) ? $this->_rootref['L_REPORT_MESSAGE'] : ((isset($user->lang['REPORT_MESSAGE'])) ? $user->lang['REPORT_MESSAGE'] : '{ REPORT_MESSAGE }')); } ?></h3></div>	
<form method="post" action="<?php echo (isset($this->_rootref['S_REPORT_ACTION'])) ? $this->_rootref['S_REPORT_ACTION'] : ''; ?>" id="report">
<div class="well">
		<p><?php if ($this->_rootref['S_REPORT_POST']) {  echo ((isset($this->_rootref['L_REPORT_POST_EXPLAIN'])) ? $this->_rootref['L_REPORT_POST_EXPLAIN'] : ((isset($user->lang['REPORT_POST_EXPLAIN'])) ? $user->lang['REPORT_POST_EXPLAIN'] : '{ REPORT_POST_EXPLAIN }')); } else { echo ((isset($this->_rootref['L_REPORT_MESSAGE_EXPLAIN'])) ? $this->_rootref['L_REPORT_MESSAGE_EXPLAIN'] : ((isset($user->lang['REPORT_MESSAGE_EXPLAIN'])) ? $user->lang['REPORT_MESSAGE_EXPLAIN'] : '{ REPORT_MESSAGE_EXPLAIN }')); } ?></p>
		   <?php if ($this->_rootref['ERROR']) {  ?><p><?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?></p><?php } ?>

	<fieldset>
		    <div class="control-group"> 
	            <label class="control-label" for="reason_id"><?php echo ((isset($this->_rootref['L_REASON'])) ? $this->_rootref['L_REASON'] : ((isset($user->lang['REASON'])) ? $user->lang['REASON'] : '{ REASON }')); ?>:</label>
         	<div class="controls controls-row"> 
               <div class="selector"> <select class="selectpicker" data-container="body" data-width="auto" name="reason_id" id="reason_id" class="full"><?php $_reason_count = (isset($this->_tpldata['reason'])) ? sizeof($this->_tpldata['reason']) : 0;if ($_reason_count) {for ($_reason_i = 0; $_reason_i < $_reason_count; ++$_reason_i){$_reason_val = &$this->_tpldata['reason'][$_reason_i]; ?><option value="<?php echo $_reason_val['ID']; ?>"<?php if ($_reason_val['S_SELECTED']) {  ?> selected="selected"<?php } ?>><?php echo $_reason_val['DESCRIPTION']; ?></option><?php }} ?></select> </div>
	         </div> 
	        </div>
			
		<?php if ($this->_rootref['S_CAN_NOTIFY']) {  ?>

            <div class="control-group"> 
	            <label class="control-label" for="notify1"><?php echo ((isset($this->_rootref['L_REPORT_NOTIFY'])) ? $this->_rootref['L_REPORT_NOTIFY'] : ((isset($user->lang['REPORT_NOTIFY'])) ? $user->lang['REPORT_NOTIFY'] : '{ REPORT_NOTIFY }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_REPORT_NOTIFY_EXPLAIN'])) ? $this->_rootref['L_REPORT_NOTIFY_EXPLAIN'] : ((isset($user->lang['REPORT_NOTIFY_EXPLAIN'])) ? $user->lang['REPORT_NOTIFY_EXPLAIN'] : '{ REPORT_NOTIFY_EXPLAIN }')); ?></span>
         	<div class="controls controls-row"> 
              <input type="radio" name="notify" id="notify1" value="1" <?php if (! $this->_rootref['S_NOTIFY']) {  ?>checked="checked"<?php } ?>><label for="notify1"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label> 
			  <input type="radio" name="notify" id="notify0" value="0" <?php if ($this->_rootref['S_NOTIFY']) {  ?>checked="checked"<?php } ?>><label for="notify0"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label>
	         </div> 
	        </div>
		<?php } ?>

		
            <div class="control-group"> 
	          <label class="control-label" for="report_text"><?php echo ((isset($this->_rootref['L_MORE_INFO'])) ? $this->_rootref['L_MORE_INFO'] : ((isset($user->lang['MORE_INFO'])) ? $user->lang['MORE_INFO'] : '{ MORE_INFO }')); ?>:</label>
	        <div class="controls controls-row"> 
              <textarea placeholder="<?php echo ((isset($this->_rootref['L_MORE_INFO'])) ? $this->_rootref['L_MORE_INFO'] : ((isset($user->lang['MORE_INFO'])) ? $user->lang['MORE_INFO'] : '{ MORE_INFO }')); ?>...<?php echo ((isset($this->_rootref['L_CAN_LEAVE_BLANK'])) ? $this->_rootref['L_CAN_LEAVE_BLANK'] : ((isset($user->lang['CAN_LEAVE_BLANK'])) ? $user->lang['CAN_LEAVE_BLANK'] : '{ CAN_LEAVE_BLANK }')); ?>" rows="2" name="report_text" id="report_text" class="form-control"><?php echo (isset($this->_rootref['REPORT_TEXT'])) ? $this->_rootref['REPORT_TEXT'] : ''; ?></textarea>
	         </div> 
	        </div>		
		
		<?php if ($this->_rootref['CAPTCHA_TEMPLATE']) {  if (isset($this->_rootref['CAPTCHA_TEMPLATE'])) { $this->_tpl_include($this->_rootref['CAPTCHA_TEMPLATE']); } } ?>

	</fieldset>
</div>

<div class="form-actions">
	<fieldset>
		<button type="submit" name="cancel" class="btn btn-default" value="<?php echo ((isset($this->_rootref['L_CANCEL'])) ? $this->_rootref['L_CANCEL'] : ((isset($user->lang['CANCEL'])) ? $user->lang['CANCEL'] : '{ CANCEL }')); ?>"><?php echo ((isset($this->_rootref['L_CANCEL'])) ? $this->_rootref['L_CANCEL'] : ((isset($user->lang['CANCEL'])) ? $user->lang['CANCEL'] : '{ CANCEL }')); ?></button>
		<button type="submit" name="submit" class="btn btn-default" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
</div>
</form>
</div>
<?php $this->_tpl_include('overall_footer.html'); ?>