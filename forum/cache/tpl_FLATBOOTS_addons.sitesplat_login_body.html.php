<?php if (!defined('IN_PHPBB')) exit; ?><section class="panel-login panel-w-form">
        <div class="container">
            <div class="row">
                <?php if ($this->_rootref['S_REGISTER_ENABLED']) {  ?>

				<div class="col-sm-6">
				<div class="signin-text">
					<span><?php echo ((isset($this->_rootref['L_CREATE_ACCOUNT'])) ? $this->_rootref['L_CREATE_ACCOUNT'] : ((isset($user->lang['CREATE_ACCOUNT'])) ? $user->lang['CREATE_ACCOUNT'] : '{ CREATE_ACCOUNT }')); ?></span>
				</div>
                    <p><?php echo ((isset($this->_rootref['L_LOGIN_INFO'])) ? $this->_rootref['L_LOGIN_INFO'] : ((isset($user->lang['LOGIN_INFO'])) ? $user->lang['LOGIN_INFO'] : '{ LOGIN_INFO }')); ?></p>
				    <p><a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> &#124; <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a></p>
					<p><a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>" class="btn btn-default"><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a></p>
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
				 <form role="form" method="post" action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>">
				  <fieldset>
					<div class="form-group">
					 <label class="sr-only" for="username"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label>
					<div class="form-icon">
					 <input type="text" class="form-control input-lg" name="username" id="username" placeholder="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>">
					 <span class="fa fa-user login-form-icon"></span>
					</div> 
				    </div> 
					<div class="form-group">
					  <label class="sr-only" for="password"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</label>
					  <div class="form-icon">
						<input type="password" class="form-control input-lg" name="password" id="password" placeholder="<?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>">
						<span class="fa fa-lock login-form-icon"></span>
					  </div> 
					</div>
				 <p>
				    <?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?>

					<div class="checkbox pull-right">
					  <label for="autologin"><input type="checkbox" name="autologin" id="autologin"><?php echo ((isset($this->_rootref['L_LOGIN_REMEMBER'])) ? $this->_rootref['L_LOGIN_REMEMBER'] : ((isset($user->lang['LOGIN_REMEMBER'])) ? $user->lang['LOGIN_REMEMBER'] : '{ LOGIN_REMEMBER }')); ?></label>
					</div>
				    <?php } ?>

					<button type="submit" class="btn btn-primary" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING_LOG_IN'])) ? $this->_rootref['L_LOADING_LOG_IN'] : ((isset($user->lang['LOADING_LOG_IN'])) ? $user->lang['LOADING_LOG_IN'] : '{ LOADING_LOG_IN }')); ?> <i class='fa-spin fa fa-spinner fa-lg'></i>"><?php echo ((isset($this->_rootref['L_LOGIN_ME_IN'])) ? $this->_rootref['L_LOGIN_ME_IN'] : ((isset($user->lang['LOGIN_ME_IN'])) ? $user->lang['LOGIN_ME_IN'] : '{ LOGIN_ME_IN }')); ?></button>
					<?php echo (isset($this->_rootref['S_LOGIN_REDIRECT'])) ? $this->_rootref['S_LOGIN_REDIRECT'] : ''; ?>

				  </p>
				  </fieldset>
				  </form>
			    </div>  
            </div>
        </div>
    </section>