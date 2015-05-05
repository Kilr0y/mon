<?php if (!defined('IN_PHPBB')) exit; ?><script>
onload_functions.push('apply_onkeypress_event()');
</script>

<fieldset>
	<?php if ($this->_rootref['ERROR']) {  ?>

	<div class="alert alert-info fade in">
       <?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?>

    </div>
	<?php } if ($this->_rootref['S_PRIVMSGS'] && ! $this->_rootref['S_SHOW_DRAFTS']) {  ?>

		<div class="clearfix">
		<?php if ($this->_rootref['S_ALLOW_MASS_PM']) {  if (sizeof($this->_tpldata['to_recipient'])) {  ?>

				<div class="controls controls-row">
					<label class="control-label"><?php echo ((isset($this->_rootref['L_TO'])) ? $this->_rootref['L_TO'] : ((isset($user->lang['TO'])) ? $user->lang['TO'] : '{ TO }')); ?>:</label>
					<div class="tagsinput">
						<?php $_to_recipient_count = (isset($this->_tpldata['to_recipient'])) ? sizeof($this->_tpldata['to_recipient']) : 0;if ($_to_recipient_count) {for ($_to_recipient_i = 0; $_to_recipient_i < $_to_recipient_count; ++$_to_recipient_i){$_to_recipient_val = &$this->_tpldata['to_recipient'][$_to_recipient_i]; if (! $_to_recipient_val['S_FIRST_ROW'] && $_to_recipient_val['S_ROW_COUNT'] % (4) == 0) {  ?></div><div class="tagsinput"><?php } if ($_to_recipient_val['IS_GROUP']) {  ?><span class="tag"><span><a href="<?php echo $_to_recipient_val['U_VIEW']; ?>"><strong><?php echo $_to_recipient_val['NAME']; ?></strong></a></span>&nbsp;<?php } else { ?><span class="tag"><span><?php echo $_to_recipient_val['NAME_FULL']; ?></span><?php } if (! $this->_rootref['S_EDIT_POST']) {  ?><input type="submit" name="remove_<?php echo $_to_recipient_val['TYPE']; ?>[<?php echo $_to_recipient_val['UG_ID']; ?>]" value="x" title="<?php echo ((isset($this->_rootref['L_USER_REMOVE_PLACEHOLDER'])) ? $this->_rootref['L_USER_REMOVE_PLACEHOLDER'] : ((isset($user->lang['USER_REMOVE_PLACEHOLDER'])) ? $user->lang['USER_REMOVE_PLACEHOLDER'] : '{ USER_REMOVE_PLACEHOLDER }')); ?>" class="btn-link" /></span>&nbsp;<?php } }} ?>

					</div>
				</div>
				<div class="space10"></div>
			<?php } if (sizeof($this->_tpldata['bcc_recipient'])) {  ?>

				<div class="controls controls-row">
					<label class="control-label"><?php echo ((isset($this->_rootref['L_BCC'])) ? $this->_rootref['L_BCC'] : ((isset($user->lang['BCC'])) ? $user->lang['BCC'] : '{ BCC }')); ?>:</label>
					<div class="tagsinput">
						<?php $_bcc_recipient_count = (isset($this->_tpldata['bcc_recipient'])) ? sizeof($this->_tpldata['bcc_recipient']) : 0;if ($_bcc_recipient_count) {for ($_bcc_recipient_i = 0; $_bcc_recipient_i < $_bcc_recipient_count; ++$_bcc_recipient_i){$_bcc_recipient_val = &$this->_tpldata['bcc_recipient'][$_bcc_recipient_i]; if (! $_bcc_recipient_val['S_FIRST_ROW'] && $_bcc_recipient_val['S_ROW_COUNT'] % (4) == 0) {  ?></div><div class="tagsinput"><?php } if ($_bcc_recipient_val['IS_GROUP']) {  ?><span class="tag"><span><a href="<?php echo $_bcc_recipient_val['U_VIEW']; ?>"><strong><?php echo $_bcc_recipient_val['NAME']; ?></strong></a></span><?php } else { ?><span class="tag"><span><?php echo $_bcc_recipient_val['NAME_FULL']; ?></span><?php } if (! $this->_rootref['S_EDIT_POST']) {  ?><input type="submit" name="remove_<?php echo $_bcc_recipient_val['TYPE']; ?>[<?php echo $_bcc_recipient_val['UG_ID']; ?>]" value="x" title="<?php echo ((isset($this->_rootref['L_GROUP_REMOVE_PLACEHOLDER'])) ? $this->_rootref['L_GROUP_REMOVE_PLACEHOLDER'] : ((isset($user->lang['GROUP_REMOVE_PLACEHOLDER'])) ? $user->lang['GROUP_REMOVE_PLACEHOLDER'] : '{ GROUP_REMOVE_PLACEHOLDER }')); ?>" class="btn-link" /></span>&nbsp;<?php } }} ?>

					</div>
				</div>
				<div class="space10"></div>
			<?php } if (! $this->_rootref['S_EDIT_POST']) {  ?>

			
		<div class="controls controls-row">
			<div class="input-group col-md-6">
			<input type="text" placeholder="" id="username_list" name="username_list" class="form-control" tabindex="1"> 
			<span class="input-group-btn">
			<button class="btn btn-default" name="add_to" value="<?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?>" type="submit" title="<?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?>"><i class="fa fa-plus"></i> <?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?></button>
            <button class="btn btn-default" name="add_bcc" value="<?php echo ((isset($this->_rootref['L_ADD_BCC'])) ? $this->_rootref['L_ADD_BCC'] : ((isset($user->lang['ADD_BCC'])) ? $user->lang['ADD_BCC'] : '{ ADD_BCC }')); ?>" type="submit" title="<?php echo ((isset($this->_rootref['L_ADD_BCC'])) ? $this->_rootref['L_ADD_BCC'] : ((isset($user->lang['ADD_BCC'])) ? $user->lang['ADD_BCC'] : '{ ADD_BCC }')); ?>"><i class="fa fa-plus"></i> [BCC]</button>
			<a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" class="btn btn-default" onclick="find_username(this.href); return false;" rel="tooltip" data-placement="right" title="<?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?>"><i class="fa fa-user"></i></a>
			</span>
			</div>
		</div>

			<?php } } else { ?>

			<div>
				<div><label class="control-label" for="username_list"><?php echo ((isset($this->_rootref['L_TO'])) ? $this->_rootref['L_TO'] : ((isset($user->lang['TO'])) ? $user->lang['TO'] : '{ TO }')); ?>:</label><?php if (! $this->_rootref['S_EDIT_POST']) {  ?><br /><span><a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" onclick="find_username(this.href); return false"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a></span><?php } ?></div>
				<?php if (sizeof($this->_tpldata['to_recipient'])) {  ?>

					<div id="tagsinput" class="tagsinput">
						<?php $_to_recipient_count = (isset($this->_tpldata['to_recipient'])) ? sizeof($this->_tpldata['to_recipient']) : 0;if ($_to_recipient_count) {for ($_to_recipient_i = 0; $_to_recipient_i < $_to_recipient_count; ++$_to_recipient_i){$_to_recipient_val = &$this->_tpldata['to_recipient'][$_to_recipient_i]; if (! $_to_recipient_val['S_FIRST_ROW'] && $_to_recipient_val['S_ROW_COUNT'] % (4) == 0) {  ?></div><div id="tagsinput" class="tagsinput"><?php } if ($_to_recipient_val['IS_GROUP']) {  ?><span class="tag"><span><a href="<?php echo $_to_recipient_val['U_VIEW']; ?>"><strong><?php echo $_to_recipient_val['NAME']; ?></strong></a></span><?php } else { ?><span class="tag"><span><?php echo $_to_recipient_val['NAME_FULL']; ?></span><?php } if (! $this->_rootref['S_EDIT_POST']) {  ?><input type="submit" name="remove_<?php echo $_to_recipient_val['TYPE']; ?>[<?php echo $_to_recipient_val['UG_ID']; ?>]" value="x" class="btn-link" /></span>&nbsp;<?php } }} ?>

					</div>
				<?php } if (! $this->_rootref['S_EDIT_POST']) {  ?>

				<div><input class="inputbox" type="text" name="username_list" id="username_list" size="20" value="" /> <input type="submit" name="add_to" value="<?php echo ((isset($this->_rootref['L_ADD'])) ? $this->_rootref['L_ADD'] : ((isset($user->lang['ADD'])) ? $user->lang['ADD'] : '{ ADD }')); ?>" class="btn" /></div>
				<?php } ?>

			</div>
		<?php } ?>

		</div>

		<?php if ($this->_rootref['S_GROUP_OPTIONS']) {  ?>

			<div class="control-group"> 
			<label class="control-label" for="group_list"><?php echo ((isset($this->_rootref['L_USERGROUPS'])) ? $this->_rootref['L_USERGROUPS'] : ((isset($user->lang['USERGROUPS'])) ? $user->lang['USERGROUPS'] : '{ USERGROUPS }')); ?>:</label>
				<div class="controls controls-row"> 
					<div class="selector"> 
					<select class="selectpicker" data-selected-text-format="count" data-container="body" name="group_list[]" id="group_list" multiple="multiple" size="4"><?php echo (isset($this->_rootref['S_GROUP_OPTIONS'])) ? $this->_rootref['S_GROUP_OPTIONS'] : ''; ?></select>
					</div>
				</div>
			</div>
		<?php } } if ($this->_rootref['S_DELETE_ALLOWED']) {  ?>

	<div class="control-group"> 
	   <label class="control-label" for="delete"><?php echo ((isset($this->_rootref['L_DELETE_POST'])) ? $this->_rootref['L_DELETE_POST'] : ((isset($user->lang['DELETE_POST'])) ? $user->lang['DELETE_POST'] : '{ DELETE_POST }')); ?>:</label>
	<div class="controls controls-row"> 
       <div class="radio"><input type="checkbox" name="delete" id="delete"><label for="delete"><?php echo ((isset($this->_rootref['L_DELETE_POST_WARN'])) ? $this->_rootref['L_DELETE_POST_WARN'] : ((isset($user->lang['DELETE_POST_WARN'])) ? $user->lang['DELETE_POST_WARN'] : '{ DELETE_POST_WARN }')); ?></label></div>
	</div> 
	</div>
	<?php } if ($this->_rootref['S_SHOW_TOPIC_ICONS'] || $this->_rootref['S_SHOW_PM_ICONS']) {  ?>

	<div class="control-group"> 
	   <label class="control-label" for="icon"><?php echo ((isset($this->_rootref['L_ICON'])) ? $this->_rootref['L_ICON'] : ((isset($user->lang['ICON'])) ? $user->lang['ICON'] : '{ ICON }')); ?>:</label>
	<div class="controls controls-row"> 
      <div class="radio"><input type="radio" name="icon" id="icon" value="0" checked="checked" tabindex="1"><label for="icon"><?php if ($this->_rootref['S_SHOW_TOPIC_ICONS']) {  echo ((isset($this->_rootref['L_NO_TOPIC_ICON'])) ? $this->_rootref['L_NO_TOPIC_ICON'] : ((isset($user->lang['NO_TOPIC_ICON'])) ? $user->lang['NO_TOPIC_ICON'] : '{ NO_TOPIC_ICON }')); } else { echo ((isset($this->_rootref['L_NO_PM_ICON'])) ? $this->_rootref['L_NO_PM_ICON'] : ((isset($user->lang['NO_PM_ICON'])) ? $user->lang['NO_PM_ICON'] : '{ NO_PM_ICON }')); } ?></label></div>
    <?php $_topic_icon_count = (isset($this->_tpldata['topic_icon'])) ? sizeof($this->_tpldata['topic_icon']) : 0;if ($_topic_icon_count) {for ($_topic_icon_i = 0; $_topic_icon_i < $_topic_icon_count; ++$_topic_icon_i){$_topic_icon_val = &$this->_tpldata['topic_icon'][$_topic_icon_i]; ?><div class="radio"><input type="radio" name="icon" id="icon-<?php echo $_topic_icon_val['ICON_ID']; ?>" value="<?php echo $_topic_icon_val['ICON_ID']; ?>" <?php echo $_topic_icon_val['S_ICON_CHECKED']; ?> tabindex="1"><label for="icon-<?php echo $_topic_icon_val['ICON_ID']; ?>"><img src="<?php echo $_topic_icon_val['ICON_IMG']; ?>" width="<?php echo $_topic_icon_val['ICON_WIDTH']; ?>" height="<?php echo $_topic_icon_val['ICON_HEIGHT']; ?>" alt="" title="" /></label></div><?php }} ?>

	</div> 
	</div>
	<?php } if (! $this->_rootref['S_PRIVMSGS'] && $this->_rootref['S_DISPLAY_USERNAME']) {  ?>

	<div class="control-group"> 
	   <label class="control-label" for="username"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label>
	<div class="controls controls-row"> 
	<div class="input-icon left">
	  <i class="fa fa-user"></i>
       <input type="text" class="form-control input-sm" placeholder="" tabindex="1" name="username" id="username" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>">
	 </div> 
	</div> 
	</div>
	<?php } if ($this->_rootref['S_POST_ACTION'] || $this->_rootref['S_PRIVMSGS'] || $this->_rootref['S_EDIT_DRAFT']) {  ?>


	<div class="control-group"> 
	<label class="control-label" for="subject"><?php echo ((isset($this->_rootref['L_SUBJECT'])) ? $this->_rootref['L_SUBJECT'] : ((isset($user->lang['SUBJECT'])) ? $user->lang['SUBJECT'] : '{ SUBJECT }')); ?>:</label>
	<div class="row">
	 <div class="<?php if ($this->_rootref['S_EDIT_DRAFT']) {  ?>col-md-12<?php } else { ?>col-xs-12 col-lg-8<?php } ?>">
       <input type="text" class="form-control input-sm" placeholder="<?php echo ((isset($this->_rootref['L_SUBJECT'])) ? $this->_rootref['L_SUBJECT'] : ((isset($user->lang['SUBJECT'])) ? $user->lang['SUBJECT'] : '{ SUBJECT }')); ?>:" name="subject" id="subject" maxlength="<?php if ($this->_rootref['S_NEW_MESSAGE']) {  ?>60<?php } else { ?>64<?php } ?>" tabindex="2" value="<?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; echo (isset($this->_rootref['DRAFT_SUBJECT'])) ? $this->_rootref['DRAFT_SUBJECT'] : ''; ?>">
	 </div> 
	 </div> 
	 </div>
	 
	<?php if ($this->_rootref['CAPTCHA_TEMPLATE'] && $this->_rootref['S_CONFIRM_CODE']) {  $this->_tpldata['DEFINE']['.']['CAPTCHA_TAB_INDEX'] = 3; if (isset($this->_rootref['CAPTCHA_TEMPLATE'])) { $this->_tpl_include($this->_rootref['CAPTCHA_TEMPLATE']); } } } $this->_tpl_include('posting_buttons.html'); ?>

	
	 <div class="space10"></div>
	
 <div class="row">
    <div class="<?php if ($this->_rootref['S_EDIT_DRAFT']) {  ?>col-md-12<?php } else { ?>col-md-8<?php } ?>"> 
      <textarea class="form-control" rows="10" <?php if ($this->_rootref['S_UCP_ACTION'] && ! $this->_rootref['S_PRIVMSGS'] && ! $this->_rootref['S_EDIT_DRAFT']) {  ?>name="signature" id="signature" <?php } else { ?>name="message" id="message"<?php } ?> tabindex="4" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);" onfocus="initInsertions();" placeholder="<?php echo ((isset($this->_rootref['L_POST_IT_UP_PLACEHOLDER'])) ? $this->_rootref['L_POST_IT_UP_PLACEHOLDER'] : ((isset($user->lang['POST_IT_UP_PLACEHOLDER'])) ? $user->lang['POST_IT_UP_PLACEHOLDER'] : '{ POST_IT_UP_PLACEHOLDER }')); ?>" class="form-control"><?php echo (isset($this->_rootref['MESSAGE'])) ? $this->_rootref['MESSAGE'] : ''; echo (isset($this->_rootref['DRAFT_MESSAGE'])) ? $this->_rootref['DRAFT_MESSAGE'] : ''; echo (isset($this->_rootref['SIGNATURE'])) ? $this->_rootref['SIGNATURE'] : ''; ?></textarea>
	</div>

	<div class="col-md-4">
		<?php if ($this->_rootref['S_SMILIES_ALLOWED'] && sizeof($this->_tpldata['smiley'])) {  ?>

			<strong><?php echo ((isset($this->_rootref['L_SMILIES'])) ? $this->_rootref['L_SMILIES'] : ((isset($user->lang['SMILIES'])) ? $user->lang['SMILIES'] : '{ SMILIES }')); ?>

		  <?php if ($this->_rootref['S_SHOW_SMILEY_LINK'] && $this->_rootref['S_SMILIES_ALLOWED']) {  ?>

			<a class="btn-link btn-xs" href="<?php echo (isset($this->_rootref['U_MORE_SMILIES'])) ? $this->_rootref['U_MORE_SMILIES'] : ''; ?>" onclick="popup(this.href, 450, 350, '_phpbbsmilies'); return false;" title="<?php echo ((isset($this->_rootref['L_MORE_SMILIES'])) ? $this->_rootref['L_MORE_SMILIES'] : ((isset($user->lang['MORE_SMILIES'])) ? $user->lang['MORE_SMILIES'] : '{ MORE_SMILIES }')); ?>"><i class="fa fa-plus"></i></a>
		  <?php } ?>

			</strong><br />
			<?php $_smiley_count = (isset($this->_tpldata['smiley'])) ? sizeof($this->_tpldata['smiley']) : 0;if ($_smiley_count) {for ($_smiley_i = 0; $_smiley_i < $_smiley_count; ++$_smiley_i){$_smiley_val = &$this->_tpldata['smiley'][$_smiley_i]; ?>

				<a href="#" onclick="insert_text('<?php echo $_smiley_val['A_SMILEY_CODE']; ?>', true); return false;"><img src="<?php echo $_smiley_val['SMILEY_IMG']; ?>" width="<?php echo $_smiley_val['SMILEY_WIDTH']; ?>" height="<?php echo $_smiley_val['SMILEY_HEIGHT']; ?>" alt="<?php echo $_smiley_val['SMILEY_CODE']; ?>" title="<?php echo $_smiley_val['SMILEY_DESC']; ?>" /></a>
			<?php }} } if ($this->_rootref['BBCODE_STATUS']) {  if (sizeof($this->_tpldata['smiley'])) {  ?><hr /><?php } ?>

		<?php echo (isset($this->_rootref['BBCODE_STATUS'])) ? $this->_rootref['BBCODE_STATUS'] : ''; ?><br />
		<?php if ($this->_rootref['S_BBCODE_ALLOWED']) {  ?>

			<?php echo (isset($this->_rootref['IMG_STATUS'])) ? $this->_rootref['IMG_STATUS'] : ''; ?><br />
			<?php echo (isset($this->_rootref['FLASH_STATUS'])) ? $this->_rootref['FLASH_STATUS'] : ''; ?><br />
			<?php echo (isset($this->_rootref['URL_STATUS'])) ? $this->_rootref['URL_STATUS'] : ''; ?><br />
		<?php } ?>

		<?php echo (isset($this->_rootref['SMILIES_STATUS'])) ? $this->_rootref['SMILIES_STATUS'] : ''; ?>

		<?php } if ($this->_rootref['S_EDIT_DRAFT'] || $this->_rootref['S_DISPLAY_REVIEW']) {  if ($this->_rootref['S_DISPLAY_REVIEW']) {  ?><hr /><?php } if ($this->_rootref['S_EDIT_DRAFT']) {  ?><strong><a href="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_BACK_TO_DRAFTS'])) ? $this->_rootref['L_BACK_TO_DRAFTS'] : ((isset($user->lang['BACK_TO_DRAFTS'])) ? $user->lang['BACK_TO_DRAFTS'] : '{ BACK_TO_DRAFTS }')); ?></a></strong><?php } if ($this->_rootref['S_DISPLAY_REVIEW']) {  ?><strong><a href="#review"><?php echo ((isset($this->_rootref['L_TOPIC_REVIEW'])) ? $this->_rootref['L_TOPIC_REVIEW'] : ((isset($user->lang['TOPIC_REVIEW'])) ? $user->lang['TOPIC_REVIEW'] : '{ TOPIC_REVIEW }')); ?></a></strong><?php } } ?>

	</div>
 </div>
</fieldset>

<?php if ($this->_tpldata['DEFINE']['.']['EXTRA_POSTING_OPTIONS'] == (1)) {  if (! $this->_rootref['S_SHOW_DRAFTS']) {  ?>

		
	</div>
	<?php } if ($this->_rootref['S_HAS_ATTACHMENTS']) {  ?>

	<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_POSTED_ATTACHMENTS'])) ? $this->_rootref['L_POSTED_ATTACHMENTS'] : ((isset($user->lang['POSTED_ATTACHMENTS'])) ? $user->lang['POSTED_ATTACHMENTS'] : '{ POSTED_ATTACHMENTS }')); ?></h3></div>
	<div class="well">
		<fieldset>
			<?php $_attach_row_count = (isset($this->_tpldata['attach_row'])) ? sizeof($this->_tpldata['attach_row']) : 0;if ($_attach_row_count) {for ($_attach_row_i = 0; $_attach_row_i < $_attach_row_count; ++$_attach_row_i){$_attach_row_val = &$this->_tpldata['attach_row'][$_attach_row_i]; ?>

	    <div class="control-group"> 
	         <label class="control-label" for="comment_list_<?php echo $_attach_row_val['ASSOC_INDEX']; ?>"><?php echo ((isset($this->_rootref['L_FILE_COMMENT'])) ? $this->_rootref['L_FILE_COMMENT'] : ((isset($user->lang['FILE_COMMENT'])) ? $user->lang['FILE_COMMENT'] : '{ FILE_COMMENT }')); ?>:</label>
			<textarea class="form-control" name="comment_list[<?php echo $_attach_row_val['ASSOC_INDEX']; ?>]" id="comment_list_<?php echo $_attach_row_val['ASSOC_INDEX']; ?>" placeholder="<?php echo ((isset($this->_rootref['L_FILE_COMMENT_PLACEHOLDER'])) ? $this->_rootref['L_FILE_COMMENT_PLACEHOLDER'] : ((isset($user->lang['FILE_COMMENT_PLACEHOLDER'])) ? $user->lang['FILE_COMMENT_PLACEHOLDER'] : '{ FILE_COMMENT_PLACEHOLDER }')); ?>"><?php echo $_attach_row_val['FILE_COMMENT']; ?></textarea>
			
		   <div class="controls controls-row">
			<span class="help-block"><i class="fa fa-file"></i> <a href="<?php echo $_attach_row_val['U_VIEW_ATTACHMENT']; ?>"><?php echo $_attach_row_val['FILENAME']; ?></a></span>
			 <div class="btn-group btn-group-sm"> 
				<?php if ($this->_rootref['S_INLINE_ATTACHMENT_OPTIONS']) {  ?>

				<button type="button" value="<?php echo ((isset($this->_rootref['L_PLACE_INLINE'])) ? $this->_rootref['L_PLACE_INLINE'] : ((isset($user->lang['PLACE_INLINE'])) ? $user->lang['PLACE_INLINE'] : '{ PLACE_INLINE }')); ?>" onclick="attach_inline(<?php echo $_attach_row_val['ASSOC_INDEX']; ?>, '<?php echo $_attach_row_val['A_FILENAME']; ?>');" class="btn btn-default"><i class="fa fa-indent"></i> <?php echo ((isset($this->_rootref['L_PLACE_INLINE'])) ? $this->_rootref['L_PLACE_INLINE'] : ((isset($user->lang['PLACE_INLINE'])) ? $user->lang['PLACE_INLINE'] : '{ PLACE_INLINE }')); ?></button>
				<?php } ?>

				<button type="submit" name="delete_file[<?php echo $_attach_row_val['ASSOC_INDEX']; ?>]" value="<?php echo ((isset($this->_rootref['L_DELETE_FILE'])) ? $this->_rootref['L_DELETE_FILE'] : ((isset($user->lang['DELETE_FILE'])) ? $user->lang['DELETE_FILE'] : '{ DELETE_FILE }')); ?>" class="btn btn-default"><i class="fa fa-times"></i> <?php echo ((isset($this->_rootref['L_DELETE_FILE'])) ? $this->_rootref['L_DELETE_FILE'] : ((isset($user->lang['DELETE_FILE'])) ? $user->lang['DELETE_FILE'] : '{ DELETE_FILE }')); ?></button>
			 </div>
			  <div class="space10"></div>
	        </div>
			
		</div>
			<?php echo $_attach_row_val['S_HIDDEN']; ?>

			<?php }} ?>

		</fieldset>
	</div>
	<?php } if (! $this->_rootref['S_SHOW_DRAFTS'] && ! $this->_tpldata['DEFINE']['.']['SIG_EDIT'] == (1)) {  ?>

		<fieldset class="form-actions">
			<?php echo (isset($this->_rootref['S_HIDDEN_ADDRESS_FIELD'])) ? $this->_rootref['S_HIDDEN_ADDRESS_FIELD'] : ''; ?>

			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

			<?php if ($this->_rootref['S_HAS_DRAFTS']) {  ?><button type="submit" class="btn btn-default" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>" accesskey="d" tabindex="8" name="load" value="<?php echo ((isset($this->_rootref['L_LOAD_DRAFT'])) ? $this->_rootref['L_LOAD_DRAFT'] : ((isset($user->lang['LOAD_DRAFT'])) ? $user->lang['LOAD_DRAFT'] : '{ LOAD_DRAFT }')); ?>" onclick="load_draft = true;"><?php echo ((isset($this->_rootref['L_LOAD_DRAFT'])) ? $this->_rootref['L_LOAD_DRAFT'] : ((isset($user->lang['LOAD_DRAFT'])) ? $user->lang['LOAD_DRAFT'] : '{ LOAD_DRAFT }')); ?></button><?php } ?>&#32;
			<?php if ($this->_rootref['S_SAVE_ALLOWED']) {  ?><button type="submit" class="btn btn-default" data-loading-text="<?php echo ((isset($this->_rootref['L_SAVING'])) ? $this->_rootref['L_SAVING'] : ((isset($user->lang['SAVING'])) ? $user->lang['SAVING'] : '{ SAVING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>" accesskey="k" tabindex="7" name="save" value="<?php echo ((isset($this->_rootref['L_SAVE_DRAFT'])) ? $this->_rootref['L_SAVE_DRAFT'] : ((isset($user->lang['SAVE_DRAFT'])) ? $user->lang['SAVE_DRAFT'] : '{ SAVE_DRAFT }')); ?>"><?php echo ((isset($this->_rootref['L_SAVE_DRAFT'])) ? $this->_rootref['L_SAVE_DRAFT'] : ((isset($user->lang['SAVE_DRAFT'])) ? $user->lang['SAVE_DRAFT'] : '{ SAVE_DRAFT }')); ?></button><?php } ?>

			<button type="submit" class="btn btn-default" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>" tabindex="5" name="preview" value="<?php echo ((isset($this->_rootref['L_PREVIEW'])) ? $this->_rootref['L_PREVIEW'] : ((isset($user->lang['PREVIEW'])) ? $user->lang['PREVIEW'] : '{ PREVIEW }')); ?>" <?php if (! $this->_rootref['S_PRIVMSGS']) {  ?> onclick="document.getElementById('postform').action += '#preview';"<?php } ?> ><?php echo ((isset($this->_rootref['L_PREVIEW'])) ? $this->_rootref['L_PREVIEW'] : ((isset($user->lang['PREVIEW'])) ? $user->lang['PREVIEW'] : '{ PREVIEW }')); ?></button>
			<button type="submit" class="btn btn-default" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>" accesskey="s" tabindex="6" name="post" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" ><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		</fieldset>
	<?php } ?>

	
<div class="space10"></div>

		<div class="panel has-nav-tabs panel-default"><!-- panel has-nav-tabs no-border with tab start tag here posting_layout.html -->
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#options-panel-below"><span><?php echo ((isset($this->_rootref['L_OPTIONS'])) ? $this->_rootref['L_OPTIONS'] : ((isset($user->lang['OPTIONS'])) ? $user->lang['OPTIONS'] : '{ OPTIONS }')); ?></span></a></li>
				<?php if ($this->_rootref['S_SHOW_ATTACH_BOX']) {  ?><li class=""><a data-toggle="tab" href="#posting-attach-body-html"><span><?php echo ((isset($this->_rootref['L_ADD_ATTACHMENT'])) ? $this->_rootref['L_ADD_ATTACHMENT'] : ((isset($user->lang['ADD_ATTACHMENT'])) ? $user->lang['ADD_ATTACHMENT'] : '{ ADD_ATTACHMENT }')); ?></span></a></li><?php } if ($this->_rootref['S_SHOW_POLL_BOX'] || $this->_rootref['S_POLL_DELETE']) {  ?><li class=""><a data-toggle="tab" href="#posting-poll-html"><span><?php echo ((isset($this->_rootref['L_ADD_POLL'])) ? $this->_rootref['L_ADD_POLL'] : ((isset($user->lang['ADD_POLL'])) ? $user->lang['ADD_POLL'] : '{ ADD_POLL }')); ?></span></a></li><?php } ?>

			</ul>
		
		
    <div class="tab-content panel-content">
	   <?php if (! $this->_rootref['S_SHOW_DRAFTS'] && ! $this->_tpldata['DEFINE']['.']['SIG_EDIT'] == (1)) {  ?>

		<div class="panel-body tab-pane active" id="options-panel-below">
		<fieldset>
			<?php if ($this->_rootref['S_BBCODE_ALLOWED']) {  ?>

			<input type="checkbox" name="disable_bbcode" id="disable_bbcode"<?php echo (isset($this->_rootref['S_BBCODE_CHECKED'])) ? $this->_rootref['S_BBCODE_CHECKED'] : ''; ?>><label class="check-control" for="disable_bbcode"><?php echo ((isset($this->_rootref['L_DISABLE_BBCODE'])) ? $this->_rootref['L_DISABLE_BBCODE'] : ((isset($user->lang['DISABLE_BBCODE'])) ? $user->lang['DISABLE_BBCODE'] : '{ DISABLE_BBCODE }')); ?></label>
			<?php } if ($this->_rootref['S_SMILIES_ALLOWED']) {  ?>

			<input type="checkbox" name="disable_smilies" id="disable_smilies"<?php echo (isset($this->_rootref['S_SMILIES_CHECKED'])) ? $this->_rootref['S_SMILIES_CHECKED'] : ''; ?>><label class="check-control" for="disable_smilies"><?php echo ((isset($this->_rootref['L_DISABLE_SMILIES'])) ? $this->_rootref['L_DISABLE_SMILIES'] : ((isset($user->lang['DISABLE_SMILIES'])) ? $user->lang['DISABLE_SMILIES'] : '{ DISABLE_SMILIES }')); ?></label>
			<?php } if ($this->_rootref['S_LINKS_ALLOWED']) {  ?>

			<input type="checkbox" name="disable_magic_url" id="disable_magic_url"<?php echo (isset($this->_rootref['S_MAGIC_URL_CHECKED'])) ? $this->_rootref['S_MAGIC_URL_CHECKED'] : ''; ?>><label class="check-control" for="disable_magic_url"><?php echo ((isset($this->_rootref['L_DISABLE_MAGIC_URL'])) ? $this->_rootref['L_DISABLE_MAGIC_URL'] : ((isset($user->lang['DISABLE_MAGIC_URL'])) ? $user->lang['DISABLE_MAGIC_URL'] : '{ DISABLE_MAGIC_URL }')); ?></label>
			<?php } if ($this->_rootref['S_SIG_ALLOWED']) {  ?>

			<input type="checkbox" name="attach_sig" id="attach_sig"<?php echo (isset($this->_rootref['S_SIGNATURE_CHECKED'])) ? $this->_rootref['S_SIGNATURE_CHECKED'] : ''; ?>><label class="check-control" for="attach_sig"><?php echo ((isset($this->_rootref['L_ATTACH_SIG'])) ? $this->_rootref['L_ATTACH_SIG'] : ((isset($user->lang['ATTACH_SIG'])) ? $user->lang['ATTACH_SIG'] : '{ ATTACH_SIG }')); ?></label>
			<?php } if ($this->_rootref['S_NOTIFY_ALLOWED']) {  ?>

			<input type="checkbox" name="notify" id="notify"<?php echo (isset($this->_rootref['S_NOTIFY_CHECKED'])) ? $this->_rootref['S_NOTIFY_CHECKED'] : ''; ?>><label class="check-control" for="notify"><?php echo ((isset($this->_rootref['L_NOTIFY_REPLY'])) ? $this->_rootref['L_NOTIFY_REPLY'] : ((isset($user->lang['NOTIFY_REPLY'])) ? $user->lang['NOTIFY_REPLY'] : '{ NOTIFY_REPLY }')); ?></label>
			<?php } if ($this->_rootref['S_LOCK_TOPIC_ALLOWED']) {  ?>

			<input type="checkbox" name="lock_topic" id="lock_topic"<?php echo (isset($this->_rootref['S_LOCK_TOPIC_CHECKED'])) ? $this->_rootref['S_LOCK_TOPIC_CHECKED'] : ''; ?>><label class="check-control" for="lock_topic"><?php echo ((isset($this->_rootref['L_LOCK_TOPIC'])) ? $this->_rootref['L_LOCK_TOPIC'] : ((isset($user->lang['LOCK_TOPIC'])) ? $user->lang['LOCK_TOPIC'] : '{ LOCK_TOPIC }')); ?></label>
			<?php } if ($this->_rootref['S_LOCK_POST_ALLOWED']) {  ?>

			<input type="checkbox" name="lock_post" id="lock_post"<?php echo (isset($this->_rootref['S_LOCK_POST_CHECKED'])) ? $this->_rootref['S_LOCK_POST_CHECKED'] : ''; ?>><label class="check-control" for="lock_post"><?php echo ((isset($this->_rootref['L_LOCK_POST'])) ? $this->_rootref['L_LOCK_POST'] : ((isset($user->lang['LOCK_POST'])) ? $user->lang['LOCK_POST'] : '{ LOCK_POST }')); ?> [<?php echo ((isset($this->_rootref['L_LOCK_POST_EXPLAIN'])) ? $this->_rootref['L_LOCK_POST_EXPLAIN'] : ((isset($user->lang['LOCK_POST_EXPLAIN'])) ? $user->lang['LOCK_POST_EXPLAIN'] : '{ LOCK_POST_EXPLAIN }')); ?>]</label>
			<?php } if ($this->_rootref['S_TYPE_TOGGLE'] || $this->_rootref['S_TOPIC_TYPE_ANNOUNCE'] || $this->_rootref['S_TOPIC_TYPE_STICKY']) {  ?>

			<hr class="dashed" />
			<?php } if ($this->_rootref['S_TYPE_TOGGLE']) {  ?>

		    <div class="control-group"> 
	         <label class="control-label" for="topic_type-0"><?php if ($this->_rootref['S_EDIT_POST']) {  echo ((isset($this->_rootref['L_CHANGE_TOPIC_TO'])) ? $this->_rootref['L_CHANGE_TOPIC_TO'] : ((isset($user->lang['CHANGE_TOPIC_TO'])) ? $user->lang['CHANGE_TOPIC_TO'] : '{ CHANGE_TOPIC_TO }')); } else { echo ((isset($this->_rootref['L_POST_TOPIC_AS'])) ? $this->_rootref['L_POST_TOPIC_AS'] : ((isset($user->lang['POST_TOPIC_AS'])) ? $user->lang['POST_TOPIC_AS'] : '{ POST_TOPIC_AS }')); } ?>:</label>
	         <div class="controls controls-row"> 
             <?php $_topic_type_count = (isset($this->_tpldata['topic_type'])) ? sizeof($this->_tpldata['topic_type']) : 0;if ($_topic_type_count) {for ($_topic_type_i = 0; $_topic_type_i < $_topic_type_count; ++$_topic_type_i){$_topic_type_val = &$this->_tpldata['topic_type'][$_topic_type_i]; ?>

			  <input type="radio" name="topic_type" id="topic_type-<?php echo $_topic_type_val['VALUE']; ?>" value="<?php echo $_topic_type_val['VALUE']; ?>"<?php echo $_topic_type_val['S_CHECKED']; ?>><label class="radio-inline" for="topic_type-<?php echo $_topic_type_val['VALUE']; ?>"><?php echo $_topic_type_val['L_TOPIC_TYPE']; ?></label>
			 <?php }} ?>

	         </div> 
			 <div class="space10"></div>
	        </div>
			<?php } if ($this->_rootref['S_TOPIC_TYPE_ANNOUNCE'] || $this->_rootref['S_TOPIC_TYPE_STICKY']) {  ?>

			<div class="control-group"> 
	         <label class="control-label" for="topic_time_limit"><?php echo ((isset($this->_rootref['L_STICK_TOPIC_FOR'])) ? $this->_rootref['L_STICK_TOPIC_FOR'] : ((isset($user->lang['STICK_TOPIC_FOR'])) ? $user->lang['STICK_TOPIC_FOR'] : '{ STICK_TOPIC_FOR }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_STICK_TOPIC_FOR_EXPLAIN'])) ? $this->_rootref['L_STICK_TOPIC_FOR_EXPLAIN'] : ((isset($user->lang['STICK_TOPIC_FOR_EXPLAIN'])) ? $user->lang['STICK_TOPIC_FOR_EXPLAIN'] : '{ STICK_TOPIC_FOR_EXPLAIN }')); ?></span>
			<div class="input-group col-xs-8 col-sm-2 col-md-2">
		       <input type="text" class="form-control input-sm" placeholder="" name="topic_time_limit" id="topic_time_limit" maxlength="3" value="<?php echo (isset($this->_rootref['TOPIC_TIME_LIMIT'])) ? $this->_rootref['TOPIC_TIME_LIMIT'] : ''; ?>">
		      <span class="input-group-addon"><?php echo ((isset($this->_rootref['L_DAYS'])) ? $this->_rootref['L_DAYS'] : ((isset($user->lang['DAYS'])) ? $user->lang['DAYS'] : '{ DAYS }')); ?></span>
	         </div>
			 <div class="space10"></div>
	       </div>
			<?php } if ($this->_rootref['S_EDIT_REASON']) {  ?>

			<div class="control-group"> 
	         <label class="control-label" for="edit_reason"><?php echo ((isset($this->_rootref['L_EDIT_REASON'])) ? $this->_rootref['L_EDIT_REASON'] : ((isset($user->lang['EDIT_REASON'])) ? $user->lang['EDIT_REASON'] : '{ EDIT_REASON }')); ?>:</label>
	        <div class="row"> 
			<div class="col-xs-8 col-sm-5 col-md-5"> 
             <input type="text" class="form-control input-sm" placeholder="<?php echo ((isset($this->_rootref['L_EDIT_LINK_PLACEHOLDER'])) ? $this->_rootref['L_EDIT_LINK_PLACEHOLDER'] : ((isset($user->lang['EDIT_LINK_PLACEHOLDER'])) ? $user->lang['EDIT_LINK_PLACEHOLDER'] : '{ EDIT_LINK_PLACEHOLDER }')); ?>" name="edit_reason" id="edit_reason" value="<?php echo (isset($this->_rootref['EDIT_REASON'])) ? $this->_rootref['EDIT_REASON'] : ''; ?>">
	        </div>
			</div>
			</div>
			<?php } ?>

		</fieldset>
		<?php } } ?>