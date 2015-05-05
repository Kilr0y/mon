<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>

<form id="ucp" method="post" action="<?php echo (isset($this->_rootref['S_UCP_ACTION'])) ? $this->_rootref['S_UCP_ACTION'] : ''; ?>"<?php echo (isset($this->_rootref['S_FORM_ENCTYPE'])) ? $this->_rootref['S_FORM_ENCTYPE'] : ''; ?>>
<div class="tab-pane active">
	<fieldset class="framed-ucp">
	 <legend><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></legend>
	   <p><?php echo ((isset($this->_rootref['L_PROFILE_INFO_NOTICE'])) ? $this->_rootref['L_PROFILE_INFO_NOTICE'] : ((isset($user->lang['PROFILE_INFO_NOTICE'])) ? $user->lang['PROFILE_INFO_NOTICE'] : '{ PROFILE_INFO_NOTICE }')); ?></p>
	
	<?php if ($this->_rootref['ERROR']) {  ?>

	<div class="alert alert-info fade in">
       <i class="fa fa-warning"></i> <strong><?php echo ((isset($this->_rootref['L_INFO_BOX'])) ? $this->_rootref['L_INFO_BOX'] : ((isset($user->lang['INFO_BOX'])) ? $user->lang['INFO_BOX'] : '{ INFO_BOX }')); ?></strong> <?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?>

    </div>
	<?php } ?>

	
<!-- I REFUSE TO USE THIS OLD STUFF 
	
    <div class="control-group"> 
	   <label for="icq" class="control-label"><?php echo ((isset($this->_rootref['L_UCP_ICQ'])) ? $this->_rootref['L_UCP_ICQ'] : ((isset($user->lang['UCP_ICQ'])) ? $user->lang['UCP_ICQ'] : '{ UCP_ICQ }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="icq" id="icq" maxlength="15" value="<?php echo (isset($this->_rootref['ICQ'])) ? $this->_rootref['ICQ'] : ''; ?>" placeholder="Ex:669490231" class="form-control input-sm">
	</div> 
	</div> 	
	
    <div class="control-group"> 
	    <label for="aim" class="control-label"><?php echo ((isset($this->_rootref['L_UCP_AIM'])) ? $this->_rootref['L_UCP_AIM'] : ((isset($user->lang['UCP_AIM'])) ? $user->lang['UCP_AIM'] : '{ UCP_AIM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="aim" id="aim" maxlength="255" value="<?php echo (isset($this->_rootref['AIM'])) ? $this->_rootref['AIM'] : ''; ?>" placeholder="AOL email" class="form-control input-sm">
	</div> 
	</div> 
	
    <div class="control-group"> 
	   <label for="msn" class="control-label"><?php echo ((isset($this->_rootref['L_UCP_MSNM'])) ? $this->_rootref['L_UCP_MSNM'] : ((isset($user->lang['UCP_MSNM'])) ? $user->lang['UCP_MSNM'] : '{ UCP_MSNM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="msn" id="msn" maxlength="255" value="<?php echo (isset($this->_rootref['MSN'])) ? $this->_rootref['MSN'] : ''; ?>" placeholder="MSN e-mail address" class="form-control input-sm">
	</div> 
	</div> 
	
    <div class="control-group"> 
	   	<label for="yim" class="control-label"><?php echo ((isset($this->_rootref['L_UCP_YIM'])) ? $this->_rootref['L_UCP_YIM'] : ((isset($user->lang['UCP_YIM'])) ? $user->lang['UCP_YIM'] : '{ UCP_YIM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="yim" id="yim" maxlength="255" value="<?php echo (isset($this->_rootref['YIM'])) ? $this->_rootref['YIM'] : ''; ?>" placeholder="Yahoo e-mail address" class="form-control input-sm">
	</div> 
	</div> 
	
    <div class="control-group"> 
	    <label for="jabber" class="control-label"><?php echo ((isset($this->_rootref['L_UCP_JABBER'])) ? $this->_rootref['L_UCP_JABBER'] : ((isset($user->lang['UCP_JABBER'])) ? $user->lang['UCP_JABBER'] : '{ UCP_JABBER }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="jabber" id="jabber" maxlength="255" value="<?php echo (isset($this->_rootref['JABBER'])) ? $this->_rootref['JABBER'] : ''; ?>" placeholder="Jabber e-mail address" class="form-control input-sm">
	</div> 
	</div> 
	
	I REFUSE TO USE THIS OLD STUFF  -->

    <div class="control-group"> 
	    <label for="website" class="control-label"><?php echo ((isset($this->_rootref['L_WEBSITE'])) ? $this->_rootref['L_WEBSITE'] : ((isset($user->lang['WEBSITE'])) ? $user->lang['WEBSITE'] : '{ WEBSITE }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="website" id="website" maxlength="255" value="<?php echo (isset($this->_rootref['WEBSITE'])) ? $this->_rootref['WEBSITE'] : ''; ?>" placeholder="http://www.your-website.com/" class="form-control input-sm">
	</div> 
	</div> 

    <div class="control-group"> 
	    <label for="location" class="control-label"><?php echo ((isset($this->_rootref['L_LOCATION'])) ? $this->_rootref['L_LOCATION'] : ((isset($user->lang['LOCATION'])) ? $user->lang['LOCATION'] : '{ LOCATION }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" name="location" id="location" maxlength="255" value="<?php echo (isset($this->_rootref['LOCATION'])) ? $this->_rootref['LOCATION'] : ''; ?>" placeholder="Your location" class="form-control input-sm">
	</div> 
	</div> 

    <div class="control-group"> 
	    <label for="occupation" class="control-label"><?php echo ((isset($this->_rootref['L_OCCUPATION'])) ? $this->_rootref['L_OCCUPATION'] : ((isset($user->lang['OCCUPATION'])) ? $user->lang['OCCUPATION'] : '{ OCCUPATION }')); ?>:</label>
	<div class="controls controls-row"> 
       <textarea class="form-control input-sm" name="occupation" id="occupation" rows="2" placeholder="Describe your occupation with 4 words..."><?php echo (isset($this->_rootref['OCCUPATION'])) ? $this->_rootref['OCCUPATION'] : ''; ?></textarea>
	</div> 
	</div> 

    <div class="control-group"> 
	    <label for="interests" class="control-label"><?php echo ((isset($this->_rootref['L_INTERESTS'])) ? $this->_rootref['L_INTERESTS'] : ((isset($user->lang['INTERESTS'])) ? $user->lang['INTERESTS'] : '{ INTERESTS }')); ?>:</label>
	<div class="controls controls-row"> 
       <textarea class="form-control input-sm" name="interests" id="interests" rows="2" placeholder="Describe your interests with 4 words..."><?php echo (isset($this->_rootref['INTERESTS'])) ? $this->_rootref['INTERESTS'] : ''; ?></textarea>
	</div> 
	</div> 
	
 <?php if ($this->_rootref['S_BIRTHDAYS_ENABLED']) {  ?>

    <div class="control-group"> 
        <label for="width" class="control-label"><?php echo ((isset($this->_rootref['L_BIRTHDAY'])) ? $this->_rootref['L_BIRTHDAY'] : ((isset($user->lang['BIRTHDAY'])) ? $user->lang['BIRTHDAY'] : '{ BIRTHDAY }')); ?>:</label><span class="help-block"><?php echo ((isset($this->_rootref['L_BIRTHDAY_EXPLAIN'])) ? $this->_rootref['L_BIRTHDAY_EXPLAIN'] : ((isset($user->lang['BIRTHDAY_EXPLAIN'])) ? $user->lang['BIRTHDAY_EXPLAIN'] : '{ BIRTHDAY_EXPLAIN }')); ?></span>
    <div class="controls controls-row"> 
    
	<div class="clearfix"> 
     <div class="col-md-2">
            <label for="bday_day" class="control-label"><?php echo ((isset($this->_rootref['L_DAY'])) ? $this->_rootref['L_DAY'] : ((isset($user->lang['DAY'])) ? $user->lang['DAY'] : '{ DAY }')); ?></label>
        <div class="controls">
            <div class="selector"><select data-width="auto" name="bday_day" id="bday_day" data-container="body" class="selectpicker"><?php echo (isset($this->_rootref['S_BIRTHDAY_DAY_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_DAY_OPTIONS'] : ''; ?></select></div>  
        </div>
     </div>
     <div class="col-md-2">
            <label for="bday_month" class="control-label"><?php echo ((isset($this->_rootref['L_MONTH'])) ? $this->_rootref['L_MONTH'] : ((isset($user->lang['MONTH'])) ? $user->lang['MONTH'] : '{ MONTH }')); ?></label>
        <div class="controls">
			<div class="selector"><select data-width="auto" name="bday_month" id="bday_month" data-container="body" class="selectpicker"><?php echo (isset($this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'] : ''; ?></select></div>
        </div>
     </div>
     <div class="col-md-2">
           <label for="bday_year" class="control-label"><?php echo ((isset($this->_rootref['L_YEAR'])) ? $this->_rootref['L_YEAR'] : ((isset($user->lang['YEAR'])) ? $user->lang['YEAR'] : '{ YEAR }')); ?></label>
        <div class="controls">
			 <div class="selector"><select data-width="auto" name="bday_year" id="bday_year" data-container="body" class="selectpicker"><?php echo (isset($this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'] : ''; ?></select></div>
        </div>
     </div>
	</div>
	 
    </div> 
	</div> 
 <?php } $_profile_fields_count = (isset($this->_tpldata['profile_fields'])) ? sizeof($this->_tpldata['profile_fields']) : 0;if ($_profile_fields_count) {for ($_profile_fields_i = 0; $_profile_fields_i < $_profile_fields_count; ++$_profile_fields_i){$_profile_fields_val = &$this->_tpldata['profile_fields'][$_profile_fields_i]; ?>

	<div id="cprofile" class="control-group"> 
	    <label class="control-label" <?php if ($_profile_fields_val['FIELD_ID']) {  ?> for="<?php echo $_profile_fields_val['FIELD_ID']; ?>"<?php } ?>><?php echo $_profile_fields_val['LANG_NAME']; ?>:<?php if ($_profile_fields_val['S_REQUIRED']) {  ?> *<?php } ?></label><?php if ($_profile_fields_val['LANG_EXPLAIN']) {  ?><span class="help-block"><?php echo $_profile_fields_val['LANG_EXPLAIN']; ?></span><?php } ?>

	<div class="controls controls-row"> 
       <?php echo $_profile_fields_val['FIELD']; ?>

	</div> 
	<?php if ($_profile_fields_val['ERROR']) {  ?><span class="error"><?php echo $_profile_fields_val['ERROR']; ?></span><?php } ?>

	</div> 
	<?php }} ?>

	</fieldset>

</div>

    <div class="space10"></div>
	<div class="form-actions"> 
	<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

	<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default"><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button> 
	<button type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="btn btn-default" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_LOADING'])) ? $this->_rootref['L_LOADING'] : ((isset($user->lang['LOADING'])) ? $user->lang['LOADING'] : '{ LOADING }')); ?><i class='fa fa-spin fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?></button>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</div>
	
</form>

<?php $this->_tpl_include('ucp_footer.html'); ?>