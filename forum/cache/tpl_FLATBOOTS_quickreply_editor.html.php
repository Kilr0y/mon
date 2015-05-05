<?php if (!defined('IN_PHPBB')) exit; ?><form role="form" method="post" action="<?php echo (isset($this->_rootref['U_QR_ACTION'])) ? $this->_rootref['U_QR_ACTION'] : ''; ?>">
    <div class="widget-content">			
	 <div class="space10"></div>
		<label class="sr-only" for="subject"><?php echo ((isset($this->_rootref['L_SUBJECT'])) ? $this->_rootref['L_SUBJECT'] : ((isset($user->lang['SUBJECT'])) ? $user->lang['SUBJECT'] : '{ SUBJECT }')); ?>:</label>
        <div class="form-group">
         <input class="form-control input-sm" type="text" name="subject" id="subject" value="<?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; ?>"/>
        </div> 
         <label class="sr-only" for="<?php echo ((isset($this->_rootref['L_MESSAGE'])) ? $this->_rootref['L_MESSAGE'] : ((isset($user->lang['MESSAGE'])) ? $user->lang['MESSAGE'] : '{ MESSAGE }')); ?>"><?php echo ((isset($this->_rootref['L_MESSAGE'])) ? $this->_rootref['L_MESSAGE'] : ((isset($user->lang['MESSAGE'])) ? $user->lang['MESSAGE'] : '{ MESSAGE }')); ?>:</label>  
	    <div class="form-group">
		 <textarea class="form-control" name="message" id="<?php echo ((isset($this->_rootref['L_MESSAGE'])) ? $this->_rootref['L_MESSAGE'] : ((isset($user->lang['MESSAGE'])) ? $user->lang['MESSAGE'] : '{ MESSAGE }')); ?>" rows="3"  placeholder="<?php echo ((isset($this->_rootref['L_MESSAGE_ENTER_PLACEHOLDER'])) ? $this->_rootref['L_MESSAGE_ENTER_PLACEHOLDER'] : ((isset($user->lang['MESSAGE_ENTER_PLACEHOLDER'])) ? $user->lang['MESSAGE_ENTER_PLACEHOLDER'] : '{ MESSAGE_ENTER_PLACEHOLDER }')); ?>"></textarea>
        </div>
    </div>
    <div class="widget-footer"> 
	  <div class="form-group">
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

		<?php echo (isset($this->_rootref['QR_HIDDEN_FIELDS'])) ? $this->_rootref['QR_HIDDEN_FIELDS'] : ''; ?>

		<button type="submit" class="btn btn-default" id="load" name="post" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa-spin fa fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
		<button type="submit" class="btn btn-default" id="load" name="full_editor" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa-spin fa fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_FULL_EDITOR'])) ? $this->_rootref['L_FULL_EDITOR'] : ((isset($user->lang['FULL_EDITOR'])) ? $user->lang['FULL_EDITOR'] : '{ FULL_EDITOR }')); ?></button>
     </div>
	</div>
</form>