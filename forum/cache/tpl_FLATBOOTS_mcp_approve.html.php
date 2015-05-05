<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<div class="clearfix">
<form id="confirm" action="<?php echo (isset($this->_rootref['S_CONFIRM_ACTION'])) ? $this->_rootref['S_CONFIRM_ACTION'] : ''; ?>" method="post">
<div class="side-segment"><h3><?php echo (isset($this->_rootref['MESSAGE_TITLE'])) ? $this->_rootref['MESSAGE_TITLE'] : ''; ?></h3></div>
<div class="well">
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

		<?php if ($this->_rootref['ADDITIONAL_MSG']) {  echo (isset($this->_rootref['ADDITIONAL_MSG'])) ? $this->_rootref['ADDITIONAL_MSG'] : ''; } ?>

		<fieldset>
		<?php if (! $this->_rootref['S_APPROVE']) {  ?>

		 <div class="control-group"> 
	            <label class="control-label" for="reason_id"><?php echo ((isset($this->_rootref['L_DISAPPROVE_REASON'])) ? $this->_rootref['L_DISAPPROVE_REASON'] : ((isset($user->lang['DISAPPROVE_REASON'])) ? $user->lang['DISAPPROVE_REASON'] : '{ DISAPPROVE_REASON }')); ?>:</label>
         	<div class="controls controls-row"> 
               <div class="selector">  
			   <select class="selectpicker" data-container="body" data-width="auto" name="reason_id">
				<?php $_reason_count = (isset($this->_tpldata['reason'])) ? sizeof($this->_tpldata['reason']) : 0;if ($_reason_count) {for ($_reason_i = 0; $_reason_i < $_reason_count; ++$_reason_i){$_reason_val = &$this->_tpldata['reason'][$_reason_i]; ?><option value="<?php echo $_reason_val['ID']; ?>"<?php if ($_reason_val['S_SELECTED']) {  ?> selected="selected"<?php } ?>><?php echo $_reason_val['DESCRIPTION']; ?></option><?php }} ?>

			   </select>
			   </div>
	         </div> 
	    </div>
		<div class="space10"></div>
	          <label class="control-label" for="reason"><?php echo ((isset($this->_rootref['L_MORE_INFO'])) ? $this->_rootref['L_MORE_INFO'] : ((isset($user->lang['MORE_INFO'])) ? $user->lang['MORE_INFO'] : '{ MORE_INFO }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_CAN_LEAVE_BLANK'])) ? $this->_rootref['L_CAN_LEAVE_BLANK'] : ((isset($user->lang['CAN_LEAVE_BLANK'])) ? $user->lang['CAN_LEAVE_BLANK'] : '{ CAN_LEAVE_BLANK }')); ?></span>
	        <div class="controls controls-row"> 
              <textarea placeholder="<?php echo ((isset($this->_rootref['L_MORE_INFO'])) ? $this->_rootref['L_MORE_INFO'] : ((isset($user->lang['MORE_INFO'])) ? $user->lang['MORE_INFO'] : '{ MORE_INFO }')); ?>...<?php echo ((isset($this->_rootref['L_CAN_LEAVE_BLANK'])) ? $this->_rootref['L_CAN_LEAVE_BLANK'] : ((isset($user->lang['CAN_LEAVE_BLANK'])) ? $user->lang['CAN_LEAVE_BLANK'] : '{ CAN_LEAVE_BLANK }')); ?>" rows="2"  name="reason" id="reason" class="form-control"><?php echo (isset($this->_rootref['REASON'])) ? $this->_rootref['REASON'] : ''; ?></textarea>
			 </div> 
		<?php } if ($this->_rootref['S_NOTIFY_POSTER']) {  ?>

		<div class="control-group">
         	<div class="controls controls-row"> 
              <input type="checkbox" name="notify_poster" id="notify_poster" checked="checked"><label class="checkbox-inline" for="notify_poster"><?php if ($this->_rootref['S_APPROVE']) {  echo ((isset($this->_rootref['L_NOTIFY_POSTER_APPROVAL'])) ? $this->_rootref['L_NOTIFY_POSTER_APPROVAL'] : ((isset($user->lang['NOTIFY_POSTER_APPROVAL'])) ? $user->lang['NOTIFY_POSTER_APPROVAL'] : '{ NOTIFY_POSTER_APPROVAL }')); } else { echo ((isset($this->_rootref['L_NOTIFY_POSTER_DISAPPROVAL'])) ? $this->_rootref['L_NOTIFY_POSTER_DISAPPROVAL'] : ((isset($user->lang['NOTIFY_POSTER_DISAPPROVAL'])) ? $user->lang['NOTIFY_POSTER_DISAPPROVAL'] : '{ NOTIFY_POSTER_DISAPPROVAL }')); } ?></label> 
	         </div> 
	    </div>
		<?php } ?>

		<div class="space10"></div>
			<p><?php echo (isset($this->_rootref['MESSAGE_TEXT'])) ? $this->_rootref['MESSAGE_TEXT'] : ''; ?></p>
		</fieldset>

		<fieldset>
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<button type="submit" name="cancel" value="<?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_CANCEL'])) ? $this->_rootref['L_CANCEL'] : ((isset($user->lang['CANCEL'])) ? $user->lang['CANCEL'] : '{ CANCEL }')); ?></button>
			<button type="submit" name="confirm" value="<?php echo (isset($this->_rootref['YES_VALUE'])) ? $this->_rootref['YES_VALUE'] : ''; ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		</fieldset>
</div>
</form>
</div>
<?php $this->_tpl_include('overall_footer.html'); ?>