<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<script>
/* Change language */
	function change_language(lang_iso)
	{
		document.forms['register'].change_lang.value = lang_iso;
		document.forms['register'].submit.click();
	}
	<?php if ($this->_rootref['CAPTCHA_TEMPLATE'] && $this->_rootref['S_CONFIRM_REFRESH']) {  ?>

	onload_functions.push('apply_onkeypress_event()');
	<?php } ?>

</script>

<div class="side-segment"><h3><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> - <?php echo ((isset($this->_rootref['L_REGISTRATION'])) ? $this->_rootref['L_REGISTRATION'] : ((isset($user->lang['REGISTRATION'])) ? $user->lang['REGISTRATION'] : '{ REGISTRATION }')); ?></h3></div>
<form role="form" method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>" id="register">
<fieldset>
<div class="well panel-w-form">
	<?php if ($this->_rootref['ERROR']) {  ?>

	<div class="alert alert-info">
        <?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?>

    </div>
	<?php } if ($this->_rootref['L_REG_COND']) {  ?>

	<p><?php echo ((isset($this->_rootref['L_REG_COND'])) ? $this->_rootref['L_REG_COND'] : ((isset($user->lang['REG_COND'])) ? $user->lang['REG_COND'] : '{ REG_COND }')); ?></p>
	<?php } ?>



	<div class="form-group">
		<label for="username" class="control-label"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_USERNAME_EXPLAIN'])) ? $this->_rootref['L_USERNAME_EXPLAIN'] : ((isset($user->lang['USERNAME_EXPLAIN'])) ? $user->lang['USERNAME_EXPLAIN'] : '{ USERNAME_EXPLAIN }')); ?></span>
		<div class="form-icon">
			<input class="form-control input-lg" type="text" name="username" id="username" size="25" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>" placeholder="Ex:John Doe"/>
		    <span class="fa fa-user login-form-icon"></span>
		 </div> 
		<div class="control-group"></div>
	</div>
	
 <div class="row">
   <div class="col-md-6">
	<div class="form-group">
		<label class="control-label" for="email"><?php echo ((isset($this->_rootref['L_EMAIL_ADDRESS'])) ? $this->_rootref['L_EMAIL_ADDRESS'] : ((isset($user->lang['EMAIL_ADDRESS'])) ? $user->lang['EMAIL_ADDRESS'] : '{ EMAIL_ADDRESS }')); ?>:</label><?php if ($this->_rootref['S_ALLOW_GRAVATAR']) {  ?><span class="help-block"><?php echo ((isset($this->_rootref['L_GRAVATAR_EXPLAIN'])) ? $this->_rootref['L_GRAVATAR_EXPLAIN'] : ((isset($user->lang['GRAVATAR_EXPLAIN'])) ? $user->lang['GRAVATAR_EXPLAIN'] : '{ GRAVATAR_EXPLAIN }')); ?></span><?php } ?>

          <div class="form-icon">
		    <input class="form-control input-lg" type="text" name="email" id="email" size="25" maxlength="100" value="<?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?>" placeholder="Ex:john@mail.com"/>
		    <span class="icon-moon-at login-form-icon"></span>
		  </div>
		  <div class="control-group"></div>
	</div> 
   </div> 

  <div class="col-md-6">
	<div class="form-group">
		<label class="control-label" for="email_confirm"><?php echo ((isset($this->_rootref['L_CONFIRM_EMAIL'])) ? $this->_rootref['L_CONFIRM_EMAIL'] : ((isset($user->lang['CONFIRM_EMAIL'])) ? $user->lang['CONFIRM_EMAIL'] : '{ CONFIRM_EMAIL }')); ?>:</label><?php if ($this->_rootref['S_ALLOW_GRAVATAR']) {  ?><span class="help-block"><?php echo ((isset($this->_rootref['L_GRAVATAR_EXPLAIN_CONFIRM'])) ? $this->_rootref['L_GRAVATAR_EXPLAIN_CONFIRM'] : ((isset($user->lang['GRAVATAR_EXPLAIN_CONFIRM'])) ? $user->lang['GRAVATAR_EXPLAIN_CONFIRM'] : '{ GRAVATAR_EXPLAIN_CONFIRM }')); ?></span><?php } ?>

          <div class="form-icon">
		    <input class="form-control input-lg" type="text" name="email_confirm" id="email_confirm" size="25" maxlength="100" value="<?php echo (isset($this->_rootref['EMAIL_CONFIRM'])) ? $this->_rootref['EMAIL_CONFIRM'] : ''; ?>" placeholder="Ex:john@mail.com"/>
             <span class="icon-moon-at login-form-icon"></span>		 
		 </div>
		  <div class="control-group"></div>
	</div> 
  </div> 
 </div> 
	
<div class="row">
   <div class="col-md-6">
	<div class="form-group">
		<label class="control-label" for="new_password"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_PASSWORD_EXPLAIN'] : ((isset($user->lang['PASSWORD_EXPLAIN'])) ? $user->lang['PASSWORD_EXPLAIN'] : '{ PASSWORD_EXPLAIN }')); ?></span>
          <div class="form-icon">
		    <input class="form-control input-lg" type="password" name="new_password" id="new_password" size="25" value="<?php echo (isset($this->_rootref['PASSWORD'])) ? $this->_rootref['PASSWORD'] : ''; ?>" placeholder="Ex:ASDFasdf123"/>
		  <span class="fa fa-key login-form-icon"></span>
		  </div>
		  <div class="control-group"></div>
	</div> 
   </div>
   
   <div class="col-md-6">
	<div class="form-group">
		<label class="control-label" for="password_confirm"><?php echo ((isset($this->_rootref['L_CONFIRM_PASSWORD'])) ? $this->_rootref['L_CONFIRM_PASSWORD'] : ((isset($user->lang['CONFIRM_PASSWORD'])) ? $user->lang['CONFIRM_PASSWORD'] : '{ CONFIRM_PASSWORD }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_PASSWORD_EXPLAIN_CONFIRM'])) ? $this->_rootref['L_PASSWORD_EXPLAIN_CONFIRM'] : ((isset($user->lang['PASSWORD_EXPLAIN_CONFIRM'])) ? $user->lang['PASSWORD_EXPLAIN_CONFIRM'] : '{ PASSWORD_EXPLAIN_CONFIRM }')); ?></span>
          <div class="form-icon">
		    <input class="form-control input-lg" type="password" name="password_confirm" id="password_confirm" size="25" value="<?php echo (isset($this->_rootref['PASSWORD_CONFIRM'])) ? $this->_rootref['PASSWORD_CONFIRM'] : ''; ?>" placeholder="Ex:ASDFasdf123"/>
		   <span class="fa fa-key login-form-icon"></span>
		  </div>
		  <div class="control-group"></div>
	</div> 
   </div>
</div>

<div class="row">
   <div class="col-md-6">
    <div class="form-group"> 
	   <label class="control-label" for="tz"><?php echo ((isset($this->_rootref['L_TIMEZONE'])) ? $this->_rootref['L_TIMEZONE'] : ((isset($user->lang['TIMEZONE'])) ? $user->lang['TIMEZONE'] : '{ TIMEZONE }')); ?>:</label>
	   <div>
	    <select class="selectpicker" data-container="body" name="tz" id="tz"><?php echo (isset($this->_rootref['S_TZ_OPTIONS'])) ? $this->_rootref['S_TZ_OPTIONS'] : ''; ?></select>
	  </div>
	  <div class="control-group"></div>
	</div>
   </div>
	
   <div class="col-md-6">
	<div class="form-group"> 
	   <label class="control-label" for="lang"><?php echo ((isset($this->_rootref['L_LANGUAGE'])) ? $this->_rootref['L_LANGUAGE'] : ((isset($user->lang['LANGUAGE'])) ? $user->lang['LANGUAGE'] : '{ LANGUAGE }')); ?>:</label>
       <div>
	    <select class="selectpicker" data-container="body" name="lang" id="lang" onchange="change_language(this.value); return false;" tabindex="6" title="<?php echo ((isset($this->_rootref['L_LANGUAGE'])) ? $this->_rootref['L_LANGUAGE'] : ((isset($user->lang['LANGUAGE'])) ? $user->lang['LANGUAGE'] : '{ LANGUAGE }')); ?>"><?php echo (isset($this->_rootref['S_LANG_OPTIONS'])) ? $this->_rootref['S_LANG_OPTIONS'] : ''; ?></select>
	</div> 
	<div class="control-group"></div>
	</div>
  </div>
</div>
	
	<?php if (sizeof($this->_tpldata['profile_fields'])) {  ?>

		<strong><?php echo ((isset($this->_rootref['L_ITEMS_REQUIRED'])) ? $this->_rootref['L_ITEMS_REQUIRED'] : ((isset($user->lang['ITEMS_REQUIRED'])) ? $user->lang['ITEMS_REQUIRED'] : '{ ITEMS_REQUIRED }')); ?></strong>
	<?php $_profile_fields_count = (isset($this->_tpldata['profile_fields'])) ? sizeof($this->_tpldata['profile_fields']) : 0;if ($_profile_fields_count) {for ($_profile_fields_i = 0; $_profile_fields_i < $_profile_fields_count; ++$_profile_fields_i){$_profile_fields_val = &$this->_tpldata['profile_fields'][$_profile_fields_i]; ?>


	<div class="clearfix">
	  <?php if ($_profile_fields_val['ERROR']) {  ?><span class="error"><?php echo $_profile_fields_val['ERROR']; ?></span><?php } ?>

		<label class="control-label" <?php if ($_profile_fields_val['FIELD_ID']) {  ?> for="<?php echo $_profile_fields_val['FIELD_ID']; ?>"<?php } ?>><?php echo $_profile_fields_val['LANG_NAME']; ?>:<?php if ($_profile_fields_val['S_REQUIRED']) {  ?> *<?php } ?></label><?php if ($_profile_fields_val['LANG_EXPLAIN']) {  ?><span class="help-block"><?php echo $_profile_fields_val['LANG_EXPLAIN']; ?></span><?php } ?>

		  <?php echo $_profile_fields_val['FIELD']; ?>

	</div> 
		
	<?php }} } ?>

</div>
</fieldset>


<?php if ($this->_rootref['CAPTCHA_TEMPLATE']) {  $this->_tpldata['DEFINE']['.']['CAPTCHA_TAB_INDEX'] = 8; if (isset($this->_rootref['CAPTCHA_TEMPLATE'])) { $this->_tpl_include($this->_rootref['CAPTCHA_TEMPLATE']); } } if ($this->_rootref['S_COPPA']) {  ?>

	<div class="alert alert-info fade in">
		<button class="close" data-dismiss="alert"><span class="awe-remove-circle"></span></button>
		<strong><?php echo ((isset($this->_rootref['L_COPPA_COMPLIANCE'])) ? $this->_rootref['L_COPPA_COMPLIANCE'] : ((isset($user->lang['COPPA_COMPLIANCE'])) ? $user->lang['COPPA_COMPLIANCE'] : '{ COPPA_COMPLIANCE }')); ?></strong> <br><?php echo ((isset($this->_rootref['L_COPPA_EXPLAIN'])) ? $this->_rootref['L_COPPA_EXPLAIN'] : ((isset($user->lang['COPPA_EXPLAIN'])) ? $user->lang['COPPA_EXPLAIN'] : '{ COPPA_EXPLAIN }')); ?>

	</div>
<?php } ?>


	<fieldset class="form-actions">
		<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

		<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default"><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button>
		<button type="submit" class="btn btn-default" tabindex="9" name="submit" id="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_REG_CREATING'])) ? $this->_rootref['L_REG_CREATING'] : ((isset($user->lang['REG_CREATING'])) ? $user->lang['REG_CREATING'] : '{ REG_CREATING }')); ?> <i class='fa fa-spin fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>

</form>

<?php $this->_tpl_include('overall_footer.html'); ?>