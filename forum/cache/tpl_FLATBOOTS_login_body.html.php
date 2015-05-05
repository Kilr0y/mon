<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<script>
	onload_functions.push('document.getElementById("<?php if ($this->_rootref['S_ADMIN_AUTH']) {  echo (isset($this->_rootref['PASSWORD_CREDENTIAL'])) ? $this->_rootref['PASSWORD_CREDENTIAL'] : ''; } else { echo (isset($this->_rootref['USERNAME_CREDENTIAL'])) ? $this->_rootref['USERNAME_CREDENTIAL'] : ''; } ?>").focus();');
</script>

    <?php if ($this->_rootref['LOGIN_EXPLAIN']) {  ?>

        <div class="alert alert-info fade in">
           <i class="fa fa-warning"></i> <strong> <?php echo (isset($this->_rootref['LOGIN_EXPLAIN'])) ? $this->_rootref['LOGIN_EXPLAIN'] : ''; ?></strong>
        </div>
    <?php } if ($this->_rootref['LOGIN_ERROR']) {  ?>

         <div class="alert alert-danger fade in">
           <i class="fa fa-warning"></i> <strong> <?php echo (isset($this->_rootref['LOGIN_ERROR'])) ? $this->_rootref['LOGIN_ERROR'] : ''; ?></strong>
         </div>
    <?php } ?>

	
    <section class="panel-login panel-w-form login-full">
            <div class="row">
                <?php if ($this->_rootref['S_REGISTER_ENABLED'] && ! $this->_rootref['S_ADMIN_AUTH']) {  ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT'])) ? $this->_rootref['L_CREATE_ACCOUNT'] : ((isset($user->lang['CREATE_ACCOUNT'])) ? $user->lang['CREATE_ACCOUNT'] : '{ CREATE_ACCOUNT }')); ?></span>
				</div>
                    <p><?php echo ((isset($this->_rootref['L_LOGIN_INFO'])) ? $this->_rootref['L_LOGIN_INFO'] : ((isset($user->lang['LOGIN_INFO'])) ? $user->lang['LOGIN_INFO'] : '{ LOGIN_INFO }')); ?></p>
				    <p><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> &#124; <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></p>
					<p><a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a></p>
                </div>
				<?php } else if ($this->_rootref['S_ADMIN_AUTH']) {  ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_ADMIN_TIPS'])) ? $this->_rootref['L_ADMIN_TIPS'] : ((isset($user->lang['ADMIN_TIPS'])) ? $user->lang['ADMIN_TIPS'] : '{ ADMIN_TIPS }')); ?></span>
				</div>
				    <p><?php echo ((isset($this->_rootref['L_ADMIN_TIP_INTRO'])) ? $this->_rootref['L_ADMIN_TIP_INTRO'] : ((isset($user->lang['ADMIN_TIP_INTRO'])) ? $user->lang['ADMIN_TIP_INTRO'] : '{ ADMIN_TIP_INTRO }')); ?></p>
                    <ul>
					<li><?php echo ((isset($this->_rootref['L_ADMIN_TIP_ONE'])) ? $this->_rootref['L_ADMIN_TIP_ONE'] : ((isset($user->lang['ADMIN_TIP_ONE'])) ? $user->lang['ADMIN_TIP_ONE'] : '{ ADMIN_TIP_ONE }')); ?></li>
				    <li><?php echo ((isset($this->_rootref['L_ADMIN_TIP_TWO'])) ? $this->_rootref['L_ADMIN_TIP_TWO'] : ((isset($user->lang['ADMIN_TIP_TWO'])) ? $user->lang['ADMIN_TIP_TWO'] : '{ ADMIN_TIP_TWO }')); ?></li>
					<li><?php echo ((isset($this->_rootref['L_ADMIN_TIP_THREE'])) ? $this->_rootref['L_ADMIN_TIP_THREE'] : ((isset($user->lang['ADMIN_TIP_THREE'])) ? $user->lang['ADMIN_TIP_THREE'] : '{ ADMIN_TIP_THREE }')); ?></li>
					</ul>
					<p><a href="<?php echo (isset($this->_rootref['U_SITESPLAT'])) ? $this->_rootref['U_SITESPLAT'] : ''; ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_ADMIN_CHECK_IT_BTN'])) ? $this->_rootref['L_ADMIN_CHECK_IT_BTN'] : ((isset($user->lang['ADMIN_CHECK_IT_BTN'])) ? $user->lang['ADMIN_CHECK_IT_BTN'] : '{ ADMIN_CHECK_IT_BTN }')); ?></a></p>
                </div>
				<?php } else { ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT_DISABLED'])) ? $this->_rootref['L_CREATE_ACCOUNT_DISABLED'] : ((isset($user->lang['CREATE_ACCOUNT_DISABLED'])) ? $user->lang['CREATE_ACCOUNT_DISABLED'] : '{ CREATE_ACCOUNT_DISABLED }')); ?></span>
				</div>
                    <p><?php echo ((isset($this->_rootref['L_REGISTRATION_DISABLED'])) ? $this->_rootref['L_REGISTRATION_DISABLED'] : ((isset($user->lang['REGISTRATION_DISABLED'])) ? $user->lang['REGISTRATION_DISABLED'] : '{ REGISTRATION_DISABLED }')); ?></p>
				    <p><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> &#124; <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></p>
					<p><a href="mailto:<?php echo (isset($this->_rootref['BOARD_EMAIL'])) ? $this->_rootref['BOARD_EMAIL'] : ''; ?>?subject=Registrations Closed&body=Dear Admin, %0A%0AI Just wanted to let you know that the board registrations are closed. %0A%0AThis might be an error and I would like to register. %0A%0APlease let me know if this is possible.%0A%0AThanks!" class="btn btn-default"><?php echo ((isset($this->_rootref['L_CONTACT_WEBMASTER'])) ? $this->_rootref['L_CONTACT_WEBMASTER'] : ((isset($user->lang['CONTACT_WEBMASTER'])) ? $user->lang['CONTACT_WEBMASTER'] : '{ CONTACT_WEBMASTER }')); ?></a></p>
                </div>
				<?php } ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_SIGN_IN_ACCOUNT'])) ? $this->_rootref['L_SIGN_IN_ACCOUNT'] : ((isset($user->lang['SIGN_IN_ACCOUNT'])) ? $user->lang['SIGN_IN_ACCOUNT'] : '{ SIGN_IN_ACCOUNT }')); ?></span>
				</div>
				 <form role="form" action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>" method="post" id="login">
				  <fieldset>
					<div class="form-group">
					<label class="sr-only" for="<?php echo (isset($this->_rootref['USERNAME_CREDENTIAL'])) ? $this->_rootref['USERNAME_CREDENTIAL'] : ''; ?>"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label>
					<div class="form-icon">
					 <input type="text" class="form-control input-lg" tabindex="1" name="<?php echo (isset($this->_rootref['USERNAME_CREDENTIAL'])) ? $this->_rootref['USERNAME_CREDENTIAL'] : ''; ?>" id="<?php echo (isset($this->_rootref['USERNAME_CREDENTIAL'])) ? $this->_rootref['USERNAME_CREDENTIAL'] : ''; ?>" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>">
					 <span class="fa fa-user login-form-icon"></span>
					</div> 
				    </div> 
					<div class="form-group">
					 <label class="sr-only" for="<?php echo (isset($this->_rootref['PASSWORD_CREDENTIAL'])) ? $this->_rootref['PASSWORD_CREDENTIAL'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</label>
					  <div class="form-icon">
						<input type="password" class="form-control input-lg" tabindex="2" id="<?php echo (isset($this->_rootref['PASSWORD_CREDENTIAL'])) ? $this->_rootref['PASSWORD_CREDENTIAL'] : ''; ?>" name="<?php echo (isset($this->_rootref['PASSWORD_CREDENTIAL'])) ? $this->_rootref['PASSWORD_CREDENTIAL'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>">
						<span class="fa fa-lock login-form-icon"></span>
					  </div> 
					</div>
				 <p>
				 <?php if ($this->_rootref['S_DISPLAY_FULL_LOGIN']) {  if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?>

					<div class="checkbox pull-right">                                              
					 <label for="autologin"><input type="checkbox" name="autologin" id="autologin" tabindex="4"><?php echo ((isset($this->_rootref['L_LOGIN_REMEMBER'])) ? $this->_rootref['L_LOGIN_REMEMBER'] : ((isset($user->lang['LOGIN_REMEMBER'])) ? $user->lang['LOGIN_REMEMBER'] : '{ LOGIN_REMEMBER }')); ?></label>
					 <label for="viewonline"><input type="checkbox" name="viewonline" id="viewonline" tabindex="5"><?php echo ((isset($this->_rootref['L_LOGIN_HIDE_ME'])) ? $this->_rootref['L_LOGIN_HIDE_ME'] : ((isset($user->lang['LOGIN_HIDE_ME'])) ? $user->lang['LOGIN_HIDE_ME'] : '{ LOGIN_HIDE_ME }')); ?></label>
					</div>
					<?php } } ?>

					<button type="submit" class="btn btn btn-primary" tabindex="6" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING_LOG_IN'])) ? $this->_rootref['L_LOADING_LOG_IN'] : ((isset($user->lang['LOADING_LOG_IN'])) ? $user->lang['LOADING_LOG_IN'] : '{ LOADING_LOG_IN }')); ?> <i class='fa-spin fa fa-spinner fa-lg'></i>"><?php echo ((isset($this->_rootref['L_LOGIN_ME_IN'])) ? $this->_rootref['L_LOGIN_ME_IN'] : ((isset($user->lang['LOGIN_ME_IN'])) ? $user->lang['LOGIN_ME_IN'] : '{ LOGIN_ME_IN }')); ?></button>
				  </p>
				  <?php if ($this->_rootref['S_DISPLAY_FULL_LOGIN'] && ( $this->_rootref['U_SEND_PASSWORD'] || $this->_rootref['U_RESEND_ACTIVATION'] )) {  if ($this->_rootref['U_SEND_PASSWORD']) {  ?><a href="<?php echo (isset($this->_rootref['U_SEND_PASSWORD'])) ? $this->_rootref['U_SEND_PASSWORD'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FORGOT_PASS'])) ? $this->_rootref['L_FORGOT_PASS'] : ((isset($user->lang['FORGOT_PASS'])) ? $user->lang['FORGOT_PASS'] : '{ FORGOT_PASS }')); ?></a><?php } if ($this->_rootref['U_RESEND_ACTIVATION']) {  ?> &#124; <a href="<?php echo (isset($this->_rootref['U_RESEND_ACTIVATION'])) ? $this->_rootref['U_RESEND_ACTIVATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RESEND_ACTIVATION'])) ? $this->_rootref['L_RESEND_ACTIVATION'] : ((isset($user->lang['RESEND_ACTIVATION'])) ? $user->lang['RESEND_ACTIVATION'] : '{ RESEND_ACTIVATION }')); ?></a><?php } } if ($this->_rootref['CAPTCHA_TEMPLATE'] && $this->_rootref['S_CONFIRM_CODE']) {  ?>

						<div class="space10"></div>
						<?php $this->_tpldata['DEFINE']['.']['CAPTCHA_TAB_INDEX'] = 3; if (isset($this->_rootref['CAPTCHA_TEMPLATE'])) { $this->_tpl_include($this->_rootref['CAPTCHA_TEMPLATE']); } } ?>

					
				  <?php echo (isset($this->_rootref['S_LOGIN_REDIRECT'])) ? $this->_rootref['S_LOGIN_REDIRECT'] : ''; ?>

					<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

				  </fieldset>
				  </form>
			    </div>  
            </div>
    </section>
	
<?php $this->_tpl_include('overall_footer.html'); ?>