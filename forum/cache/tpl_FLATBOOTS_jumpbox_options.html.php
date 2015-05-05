<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_DISPLAY_JUMPBOX']) {  ?>

<form role="form" method="post" id="jumpbox" action="<?php echo (isset($this->_rootref['S_JUMPBOX_ACTION'])) ? $this->_rootref['S_JUMPBOX_ACTION'] : ''; ?>" onsubmit="if(this.f.value == -1){return false;}">
	<?php if ($this->_tpldata['DEFINE']['.']['CUSTOM_FIELDSET_CLASS']) {  ?>

	<fieldset class="<?php echo (isset($this->_tpldata['DEFINE']['.']['CUSTOM_FIELDSET_CLASS'])) ? $this->_tpldata['DEFINE']['.']['CUSTOM_FIELDSET_CLASS'] : ''; ?>">
	<?php } else { ?>

	<fieldset>
	<?php } ?>

		<div class="input-group">
			<select class="selectpicker" data-style="btn btn-default form-control" data-width="auto" data-container="body" name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1){ document.forms['jumpbox'].submit() }">
			<?php $_jumpbox_forums_count = (isset($this->_tpldata['jumpbox_forums'])) ? sizeof($this->_tpldata['jumpbox_forums']) : 0;if ($_jumpbox_forums_count) {for ($_jumpbox_forums_i = 0; $_jumpbox_forums_i < $_jumpbox_forums_count; ++$_jumpbox_forums_i){$_jumpbox_forums_val = &$this->_tpldata['jumpbox_forums'][$_jumpbox_forums_i]; if ($_jumpbox_forums_val['S_FORUM_COUNT'] == (1)) {  ?><option value="-1">------------------</option><?php } ?>

				<option value="<?php echo $_jumpbox_forums_val['FORUM_ID']; ?>"<?php echo $_jumpbox_forums_val['SELECTED']; ?>><?php $_level_count = (isset($_jumpbox_forums_val['level'])) ? sizeof($_jumpbox_forums_val['level']) : 0;if ($_level_count) {for ($_level_i = 0; $_level_i < $_level_count; ++$_level_i){$_level_val = &$_jumpbox_forums_val['level'][$_level_i]; ?>&nbsp; &nbsp;<?php }} echo $_jumpbox_forums_val['FORUM_NAME']; ?></option>
			<?php }} ?>

			</select>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?></button>
		</span>
		</div>
	</fieldset>
</form>
<?php } else { } ?>