<?php if (!defined('IN_PHPBB')) exit; ?><div class="panel-body tab-pane" id="posting-poll-html">

	<?php if ($this->_rootref['S_SHOW_POLL_BOX']) {  ?>

	<p><?php echo ((isset($this->_rootref['L_ADD_POLL_EXPLAIN'])) ? $this->_rootref['L_ADD_POLL_EXPLAIN'] : ((isset($user->lang['ADD_POLL_EXPLAIN'])) ? $user->lang['ADD_POLL_EXPLAIN'] : '{ ADD_POLL_EXPLAIN }')); ?></p>
	<?php } ?>


	<fieldset>
	<?php if ($this->_rootref['S_SHOW_POLL_BOX']) {  if ($this->_rootref['S_POLL_DELETE']) {  ?>	
		<div class="control-group"> 
		 <label class="control-label" for="poll_delete"><?php echo ((isset($this->_rootref['L_DELETE_POLL'])) ? $this->_rootref['L_DELETE_POLL'] : ((isset($user->lang['DELETE_POLL'])) ? $user->lang['DELETE_POLL'] : '{ DELETE_POLL }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_POLL_DELETE_HELPER'])) ? $this->_rootref['L_POLL_DELETE_HELPER'] : ((isset($user->lang['POLL_DELETE_HELPER'])) ? $user->lang['POLL_DELETE_HELPER'] : '{ POLL_DELETE_HELPER }')); ?></span>
	    <div class="controls controls-row"> 
        <input type="checkbox" name="poll_delete" id="poll_delete"<?php if ($this->_rootref['S_POLL_DELETE_CHECKED']) {  ?> checked="checked"<?php } ?>><label class="checkbox-inline" for="poll_delete"><?php echo ((isset($this->_rootref['L_POLL_DELETE'])) ? $this->_rootref['L_POLL_DELETE'] : ((isset($user->lang['POLL_DELETE'])) ? $user->lang['POLL_DELETE'] : '{ POLL_DELETE }')); ?></label>
	    </div> 
	     <div class="space10"></div>
		</div>
		<?php } ?>


		<div class="control-group"> 
	   <label class="control-label" for="poll_title"><?php echo ((isset($this->_rootref['L_POLL_QUESTION'])) ? $this->_rootref['L_POLL_QUESTION'] : ((isset($user->lang['POLL_QUESTION'])) ? $user->lang['POLL_QUESTION'] : '{ POLL_QUESTION }')); ?>:</label>
	    <div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="poll_title" id="poll_title" maxlength="255" value="<?php echo (isset($this->_rootref['POLL_TITLE'])) ? $this->_rootref['POLL_TITLE'] : ''; ?>">
	    </div> 
	    </div>
		
	   <div class="control-group"> 
	   <label class="control-label" for="poll_option_text"><?php echo ((isset($this->_rootref['L_POLL_OPTIONS'])) ? $this->_rootref['L_POLL_OPTIONS'] : ((isset($user->lang['POLL_OPTIONS'])) ? $user->lang['POLL_OPTIONS'] : '{ POLL_OPTIONS }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_POLL_OPTIONS_EXPLAIN'])) ? $this->_rootref['L_POLL_OPTIONS_EXPLAIN'] : ((isset($user->lang['POLL_OPTIONS_EXPLAIN'])) ? $user->lang['POLL_OPTIONS_EXPLAIN'] : '{ POLL_OPTIONS_EXPLAIN }')); ?></span>
	    <div class="controls controls-row"> 
        <textarea placeholder="" rows="4" name="poll_option_text" id="poll_option_text" class="form-control"><?php echo (isset($this->_rootref['POLL_OPTIONS'])) ? $this->_rootref['POLL_OPTIONS'] : ''; ?></textarea>
	    </div> 
	    </div>
		
		<div class="control-group"> 
	         <label class="control-label" for="poll_max_options"><?php echo ((isset($this->_rootref['L_POLL_MAX_OPTIONS'])) ? $this->_rootref['L_POLL_MAX_OPTIONS'] : ((isset($user->lang['POLL_MAX_OPTIONS'])) ? $user->lang['POLL_MAX_OPTIONS'] : '{ POLL_MAX_OPTIONS }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_POLL_MAX_OPTIONS_EXPLAIN'])) ? $this->_rootref['L_POLL_MAX_OPTIONS_EXPLAIN'] : ((isset($user->lang['POLL_MAX_OPTIONS_EXPLAIN'])) ? $user->lang['POLL_MAX_OPTIONS_EXPLAIN'] : '{ POLL_MAX_OPTIONS_EXPLAIN }')); ?></span>
			<div class="input-group col-xs-8 col-sm-2 col-md-2">
		       <input type="text" name="poll_max_options" id="poll_max_options" size="3" maxlength="3" value="<?php echo (isset($this->_rootref['POLL_MAX_OPTIONS'])) ? $this->_rootref['POLL_MAX_OPTIONS'] : ''; ?>" placeholder="" class="form-control input-sm">
		      <span class="input-group-addon"><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></span>
	         </div>
			 <div class="space10"></div>
	    </div>
		
		<div class="control-group"> 
	         <label class="control-label" for="poll_length"><?php echo ((isset($this->_rootref['L_POLL_FOR'])) ? $this->_rootref['L_POLL_FOR'] : ((isset($user->lang['POLL_FOR'])) ? $user->lang['POLL_FOR'] : '{ POLL_FOR }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_POLL_FOR_EXPLAIN'])) ? $this->_rootref['L_POLL_FOR_EXPLAIN'] : ((isset($user->lang['POLL_FOR_EXPLAIN'])) ? $user->lang['POLL_FOR_EXPLAIN'] : '{ POLL_FOR_EXPLAIN }')); ?></span>
			<div class="input-group col-xs-8 col-sm-2 col-md-2">
		       <input type="text" name="poll_length" id="poll_length" size="3" maxlength="3" value="<?php echo (isset($this->_rootref['POLL_LENGTH'])) ? $this->_rootref['POLL_LENGTH'] : ''; ?>" placeholder="" class="form-control input-sm">
		      <span class="input-group-addon"><?php echo ((isset($this->_rootref['L_DAYS'])) ? $this->_rootref['L_DAYS'] : ((isset($user->lang['DAYS'])) ? $user->lang['DAYS'] : '{ DAYS }')); ?></span>
	         </div>
			 <div class="space10"></div>
	    </div>

		<?php if ($this->_rootref['S_POLL_VOTE_CHANGE']) {  ?>

	    <div class="control-group"> 
	     <label class="control-label" for="poll_vote_change"><?php echo ((isset($this->_rootref['L_POLL_VOTE_CHANGE'])) ? $this->_rootref['L_POLL_VOTE_CHANGE'] : ((isset($user->lang['POLL_VOTE_CHANGE'])) ? $user->lang['POLL_VOTE_CHANGE'] : '{ POLL_VOTE_CHANGE }')); ?>:</label>
	    <div class="controls controls-row"> 
         <input type="checkbox" id="poll_vote_change" name="poll_vote_change"<?php echo (isset($this->_rootref['VOTE_CHANGE_CHECKED'])) ? $this->_rootref['VOTE_CHANGE_CHECKED'] : ''; ?>><label class="checkbox-inline" for="poll_vote_change"><?php echo ((isset($this->_rootref['L_POLL_VOTE_CHANGE_EXPLAIN'])) ? $this->_rootref['L_POLL_VOTE_CHANGE_EXPLAIN'] : ((isset($user->lang['POLL_VOTE_CHANGE_EXPLAIN'])) ? $user->lang['POLL_VOTE_CHANGE_EXPLAIN'] : '{ POLL_VOTE_CHANGE_EXPLAIN }')); ?></label>
	     </div> 
		  <div class="space10"></div>
	    </div>
		<?php } } else if ($this->_rootref['S_POLL_DELETE']) {  ?>

		<div class="control-group"> 
	    <div class="controls controls-row"> 
         <input type="checkbox" name="poll_delete" id="poll_delete"<?php if ($this->_rootref['S_POLL_DELETE_CHECKED']) {  ?> checked="checked"<?php } ?>><label class="checkbox-inline" for="poll_delete"><?php echo ((isset($this->_rootref['L_POLL_DELETE'])) ? $this->_rootref['L_POLL_DELETE'] : ((isset($user->lang['POLL_DELETE'])) ? $user->lang['POLL_DELETE'] : '{ POLL_DELETE }')); ?></label>
	     </div> 
	    </div>
	<?php } ?>

	</fieldset>

</div>