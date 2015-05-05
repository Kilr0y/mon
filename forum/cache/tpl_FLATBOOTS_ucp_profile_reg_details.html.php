<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>

<form id="ucp" method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>"<?php echo (isset($this->_rootref['S_FORM_ENCTYPE'])) ? $this->_rootref['S_FORM_ENCTYPE'] : ''; ?>>
<div class="tab-pane active">
	<fieldset class="framed-ucp">
	 <legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
	 
	 <?php if ($this->_rootref['S_FORCE_PASSWORD']) {  ?>

		<p><?php echo ((isset($this->_rootref['L_FORCE_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_FORCE_PASSWORD_EXPLAIN'] : ((isset($user->lang['FORCE_PASSWORD_EXPLAIN'])) ? $user->lang['FORCE_PASSWORD_EXPLAIN'] : '{ FORCE_PASSWORD_EXPLAIN }')); ?></p>
	<?php } if ($this->_rootref['ERROR']) {  ?>

	<div class="alert alert-info fade in">
       <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?>

    </div>
	<?php } ?>

   
    <div class="control-group"> 
	<label class="control-label"<?php if ($this->_rootref['S_CHANGE_USERNAME']) {  ?>for="username"<?php } ?>><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_USERNAME_EXPLAIN'])) ? $this->_rootref['L_USERNAME_EXPLAIN'] : ((isset($user->lang['USERNAME_EXPLAIN'])) ? $user->lang['USERNAME_EXPLAIN'] : '{ USERNAME_EXPLAIN }')); ?></span>
	<div class="controls controls-row"> 
       <?php if ($this->_rootref['S_CHANGE_USERNAME']) {  ?><input class="form-control input-sm" type="text" name="username" id="username" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>"><?php } else { ?><input class="form-control input-sm" type="text" disabled="" placeholder="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?> **Username change is not allowed**"><?php } ?>

	</div> 
	</div> 
   
    <div class="control-group"> 
	<label class="control-label" for="email"><?php echo ((isset($this->_rootref['L_EMAIL_ADDRESS'])) ? $this->_rootref['L_EMAIL_ADDRESS'] : ((isset($user->lang['EMAIL_ADDRESS'])) ? $user->lang['EMAIL_ADDRESS'] : '{ EMAIL_ADDRESS }')); ?>:</label>
	<div class="controls controls-row"> 
    <?php if ($this->_rootref['S_CHANGE_EMAIL']) {  ?><input class="form-control input-sm" type="text" name="email" id="email" maxlength="100" value="<?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_EMAIL_ADDRESS'])) ? $this->_rootref['L_EMAIL_ADDRESS'] : ((isset($user->lang['EMAIL_ADDRESS'])) ? $user->lang['EMAIL_ADDRESS'] : '{ EMAIL_ADDRESS }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_EMAIL_ADDRESS'])) ? $this->_rootref['L_EMAIL_ADDRESS'] : ((isset($user->lang['EMAIL_ADDRESS'])) ? $user->lang['EMAIL_ADDRESS'] : '{ EMAIL_ADDRESS }')); ?>"><?php } else { ?><input class="form-control input-sm" type="text" disabled="" placeholder="<?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?>"><?php } if ($this->_rootref['S_CHANGE_EMAIL']) {  ?>

       <label class="control-label" for="email_confirm"><?php echo ((isset($this->_rootref['L_CONFIRM_EMAIL'])) ? $this->_rootref['L_CONFIRM_EMAIL'] : ((isset($user->lang['CONFIRM_EMAIL'])) ? $user->lang['CONFIRM_EMAIL'] : '{ CONFIRM_EMAIL }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_CONFIRM_EMAIL_EXPLAIN'])) ? $this->_rootref['L_CONFIRM_EMAIL_EXPLAIN'] : ((isset($user->lang['CONFIRM_EMAIL_EXPLAIN'])) ? $user->lang['CONFIRM_EMAIL_EXPLAIN'] : '{ CONFIRM_EMAIL_EXPLAIN }')); ?></span>
       <input type="text" name="email_confirm" id="email_confirm" maxlength="100" value="<?php echo (isset($this->_rootref['CONFIRM_EMAIL'])) ? $this->_rootref['CONFIRM_EMAIL'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_CONFIRM_EMAIL'])) ? $this->_rootref['L_CONFIRM_EMAIL'] : ((isset($user->lang['CONFIRM_EMAIL'])) ? $user->lang['CONFIRM_EMAIL'] : '{ CONFIRM_EMAIL }')); ?>" class="form-control">
	<?php } ?>

	</div> 
	</div> 
	
	<?php if ($this->_rootref['S_CHANGE_PASSWORD']) {  ?>

    <div class="control-group"> 
	 <label for="new_password" class="control-label"><?php echo ((isset($this->_rootref['L_NEW_PASSWORD'])) ? $this->_rootref['L_NEW_PASSWORD'] : ((isset($user->lang['NEW_PASSWORD'])) ? $user->lang['NEW_PASSWORD'] : '{ NEW_PASSWORD }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_CHANGE_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_CHANGE_PASSWORD_EXPLAIN'] : ((isset($user->lang['CHANGE_PASSWORD_EXPLAIN'])) ? $user->lang['CHANGE_PASSWORD_EXPLAIN'] : '{ CHANGE_PASSWORD_EXPLAIN }')); ?></span>
	<div class="controls controls-row"> 
        <input type="password" name="new_password" id="new_password" maxlength="255" value="<?php echo (isset($this->_rootref['NEW_PASSWORD'])) ? $this->_rootref['NEW_PASSWORD'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_CHANGE_PASSWORD'])) ? $this->_rootref['L_CHANGE_PASSWORD'] : ((isset($user->lang['CHANGE_PASSWORD'])) ? $user->lang['CHANGE_PASSWORD'] : '{ CHANGE_PASSWORD }')); ?>" class="form-control input-sm">
     
	 <label for="password_confirm" class="control-label"><?php echo ((isset($this->_rootref['L_CONFIRM_PASSWORD'])) ? $this->_rootref['L_CONFIRM_PASSWORD'] : ((isset($user->lang['CONFIRM_PASSWORD'])) ? $user->lang['CONFIRM_PASSWORD'] : '{ CONFIRM_PASSWORD }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_CONFIRM_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_CONFIRM_PASSWORD_EXPLAIN'] : ((isset($user->lang['CONFIRM_PASSWORD_EXPLAIN'])) ? $user->lang['CONFIRM_PASSWORD_EXPLAIN'] : '{ CONFIRM_PASSWORD_EXPLAIN }')); ?></span>
	    <input type="password" name="password_confirm" id="password_confirm" maxlength="255" value="<?php echo (isset($this->_rootref['PASSWORD_CONFIRM'])) ? $this->_rootref['PASSWORD_CONFIRM'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_CONFIRM_PASSWORD'])) ? $this->_rootref['L_CONFIRM_PASSWORD'] : ((isset($user->lang['CONFIRM_PASSWORD'])) ? $user->lang['CONFIRM_PASSWORD'] : '{ CONFIRM_PASSWORD }')); ?>" class="form-control input-sm">
	</div> 
	</div> 
    <?php } ?>


	</fieldset>

	<div class="space10"> </div>

	<fieldset class="framed-ucp">
	 <legend><?php echo ((isset($this->_rootref['L_CURRENT_PASSWORD'])) ? $this->_rootref['L_CURRENT_PASSWORD'] : ((isset($user->lang['CURRENT_PASSWORD'])) ? $user->lang['CURRENT_PASSWORD'] : '{ CURRENT_PASSWORD }')); ?>:</legend>
    <div class="controls controls-row"> 
      <label for="cur_password" class="control-label"><?php echo ((isset($this->_rootref['L_CURRENT_PASSWORD'])) ? $this->_rootref['L_CURRENT_PASSWORD'] : ((isset($user->lang['CURRENT_PASSWORD'])) ? $user->lang['CURRENT_PASSWORD'] : '{ CURRENT_PASSWORD }')); ?>:</label><span class="help-block"><?php if ($this->_rootref['S_CHANGE_PASSWORD']) {  echo ((isset($this->_rootref['L_CURRENT_CHANGE_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_CURRENT_CHANGE_PASSWORD_EXPLAIN'] : ((isset($user->lang['CURRENT_CHANGE_PASSWORD_EXPLAIN'])) ? $user->lang['CURRENT_CHANGE_PASSWORD_EXPLAIN'] : '{ CURRENT_CHANGE_PASSWORD_EXPLAIN }')); } else { echo ((isset($this->_rootref['L_CURRENT_PASSWORD_EXPLAIN'])) ? $this->_rootref['L_CURRENT_PASSWORD_EXPLAIN'] : ((isset($user->lang['CURRENT_PASSWORD_EXPLAIN'])) ? $user->lang['CURRENT_PASSWORD_EXPLAIN'] : '{ CURRENT_PASSWORD_EXPLAIN }')); } ?></span>
     <div class="controls">
        <input type="password" name="cur_password" id="cur_password" maxlength="255" value="<?php echo (isset($this->_rootref['CUR_PASSWORD'])) ? $this->_rootref['CUR_PASSWORD'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_CURRENT_PASSWORD'])) ? $this->_rootref['L_CURRENT_PASSWORD'] : ((isset($user->lang['CURRENT_PASSWORD'])) ? $user->lang['CURRENT_PASSWORD'] : '{ CURRENT_PASSWORD }')); ?>" placeholder="<?php echo ((isset($this->_rootref['L_CURRENT_PASSWORD'])) ? $this->_rootref['L_CURRENT_PASSWORD'] : ((isset($user->lang['CURRENT_PASSWORD'])) ? $user->lang['CURRENT_PASSWORD'] : '{ CURRENT_PASSWORD }')); ?>" class="form-control input-sm">
     </div>
    </div>
	</fieldset>
    
	<div class="space10"></div>
	<div class="form-actions"> 
	<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

	<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default" ><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button>
	<button type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="btn btn-default" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</div>
</div>
</form>

<?php $this->_tpl_include('ucp_footer.html'); ?>