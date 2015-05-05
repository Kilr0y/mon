<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_TYPE'] == (1)) {  ?>

	<div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_CONFIRMATION'])) ? $this->_rootref['L_CONFIRMATION'] : ((isset($user->lang['CONFIRMATION'])) ? $user->lang['CONFIRMATION'] : '{ CONFIRMATION }')); ?></h3></div>
<div class="well">
	<p><?php echo ((isset($this->_rootref['L_CONFIRM_EXPLAIN'])) ? $this->_rootref['L_CONFIRM_EXPLAIN'] : ((isset($user->lang['CONFIRM_EXPLAIN'])) ? $user->lang['CONFIRM_EXPLAIN'] : '{ CONFIRM_EXPLAIN }')); ?></p>
	<fieldset>
<?php } ?>

<label class="control-label" for="confirm_code"><?php echo ((isset($this->_rootref['L_CONFIRM_CODE'])) ? $this->_rootref['L_CONFIRM_CODE'] : ((isset($user->lang['CONFIRM_CODE'])) ? $user->lang['CONFIRM_CODE'] : '{ CONFIRM_CODE }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_CONFIRM_CODE_EXPLAIN'])) ? $this->_rootref['L_CONFIRM_CODE_EXPLAIN'] : ((isset($user->lang['CONFIRM_CODE_EXPLAIN'])) ? $user->lang['CONFIRM_CODE_EXPLAIN'] : '{ CONFIRM_CODE_EXPLAIN }')); ?></span>
<img src="<?php echo (isset($this->_rootref['CONFIRM_IMAGE_LINK'])) ? $this->_rootref['CONFIRM_IMAGE_LINK'] : ''; ?>" alt="<?php echo ((isset($this->_rootref['L_CONFIRM_CODE'])) ? $this->_rootref['L_CONFIRM_CODE'] : ((isset($user->lang['CONFIRM_CODE'])) ? $user->lang['CONFIRM_CODE'] : '{ CONFIRM_CODE }')); ?>" />
<div class="space10"></div>
<div class="<?php if ($this->_rootref['S_CONFIRM_REFRESH']) {  ?>input-group<?php } else { ?>nothing<?php } ?>">
     <input class="form-control" type="text" name="confirm_code" id="confirm_code" maxlength="8" tabindex="<?php echo (isset($this->_tpldata['DEFINE']['.']['CAPTCHA_TAB_INDEX'])) ? $this->_tpldata['DEFINE']['.']['CAPTCHA_TAB_INDEX'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_CONFIRM_CODE'])) ? $this->_rootref['L_CONFIRM_CODE'] : ((isset($user->lang['CONFIRM_CODE'])) ? $user->lang['CONFIRM_CODE'] : '{ CONFIRM_CODE }')); ?>" placeholder="Ex:1GHn387U">
	<?php if ($this->_rootref['S_CONFIRM_REFRESH']) {  ?>

    <div class="input-group-btn">
	 <button type="submit" name="refresh_vc" id="refresh_vc" class="btn btn-default" value="<?php echo ((isset($this->_rootref['L_VC_REFRESH'])) ? $this->_rootref['L_VC_REFRESH'] : ((isset($user->lang['VC_REFRESH'])) ? $user->lang['VC_REFRESH'] : '{ VC_REFRESH }')); ?>" title="<?php echo ((isset($this->_rootref['L_VC_REFRESH'])) ? $this->_rootref['L_VC_REFRESH'] : ((isset($user->lang['VC_REFRESH'])) ? $user->lang['VC_REFRESH'] : '{ VC_REFRESH }')); ?>" ><i class="fa fa-retweet"></i></button>
    </div>
	<?php } ?>

</div>
<input type="hidden" name="confirm_id" id="confirm_id" value="<?php echo (isset($this->_rootref['CONFIRM_ID'])) ? $this->_rootref['CONFIRM_ID'] : ''; ?>" />
<?php if ($this->_rootref['S_TYPE'] == (1)) {  ?>

	</fieldset>
</div>
<?php } ?>