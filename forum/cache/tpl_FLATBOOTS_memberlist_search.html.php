<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_IN_SEARCH_POPUP']) {  ?><!-- You should retain this javascript in your own template! -->
<script>
function insert_user(user)
{
	opener.document.forms['<?php echo (isset($this->_rootref['S_FORM_NAME'])) ? $this->_rootref['S_FORM_NAME'] : ''; ?>'].<?php echo (isset($this->_rootref['S_FIELD_NAME'])) ? $this->_rootref['S_FIELD_NAME'] : ''; ?>.value = ( opener.document.forms['<?php echo (isset($this->_rootref['S_FORM_NAME'])) ? $this->_rootref['S_FORM_NAME'] : ''; ?>'].<?php echo (isset($this->_rootref['S_FIELD_NAME'])) ? $this->_rootref['S_FIELD_NAME'] : ''; ?>.value.length && opener.document.forms['<?php echo (isset($this->_rootref['S_FORM_NAME'])) ? $this->_rootref['S_FORM_NAME'] : ''; ?>'].<?php echo (isset($this->_rootref['S_FIELD_NAME'])) ? $this->_rootref['S_FIELD_NAME'] : ''; ?>.type == "textarea" ) ? opener.document.forms['<?php echo (isset($this->_rootref['S_FORM_NAME'])) ? $this->_rootref['S_FORM_NAME'] : ''; ?>'].<?php echo (isset($this->_rootref['S_FIELD_NAME'])) ? $this->_rootref['S_FIELD_NAME'] : ''; ?>.value + "\n" + user : user;
}

function insert_marked(users)
{
	if (typeof(users.length) == "undefined")
	{
		if (users.checked)
		{
			insert_user(users.value);
		}
	}
	else if (users.length > 0)
	{
		for (i = 0; i < users.length; i++)
		{
			if (users[i].checked)
			{
				insert_user(users[i].value);
			}
		}
	}

	self.close();
}

function insert_single(user)
{
	opener.document.forms['<?php echo (isset($this->_rootref['S_FORM_NAME'])) ? $this->_rootref['S_FORM_NAME'] : ''; ?>'].<?php echo (isset($this->_rootref['S_FIELD_NAME'])) ? $this->_rootref['S_FIELD_NAME'] : ''; ?>.value = user;
	self.close();
}
</script>
<script src="<?php echo (isset($this->_rootref['T_SUPER_TEMPLATE_PATH'])) ? $this->_rootref['T_SUPER_TEMPLATE_PATH'] : ''; ?>/forum_fn.js"></script>
<?php } ?>


  <div class="side-segment"><h3><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></h3></div>

<form method="post" action="<?php echo (isset($this->_rootref['S_MODE_ACTION'])) ? $this->_rootref['S_MODE_ACTION'] : ''; ?>" id="search_memberlist">
<div class="clearfix">
<div class="well">

	<p><?php echo ((isset($this->_rootref['L_FIND_USERNAME_EXPLAIN'])) ? $this->_rootref['L_FIND_USERNAME_EXPLAIN'] : ((isset($user->lang['FIND_USERNAME_EXPLAIN'])) ? $user->lang['FIND_USERNAME_EXPLAIN'] : '{ FIND_USERNAME_EXPLAIN }')); ?></p>

	<div class="row">
	<div class="col-md-6">
	<fieldset>
	
	<div class="control-group"> 
	   <label class="control-label" for="username"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="<?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>" name="username" id="username" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>">
	</div> 
	</div>
	
	<?php if ($this->_rootref['S_EMAIL_SEARCH_ALLOWED']) {  ?>

	<div class="control-group"> 
	   <label class="control-label" for="email"><?php echo ((isset($this->_rootref['L_EMAIL'])) ? $this->_rootref['L_EMAIL'] : ((isset($user->lang['EMAIL'])) ? $user->lang['EMAIL'] : '{ EMAIL }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="<?php echo ((isset($this->_rootref['L_EMAIL'])) ? $this->_rootref['L_EMAIL'] : ((isset($user->lang['EMAIL'])) ? $user->lang['EMAIL'] : '{ EMAIL }')); ?>" name="email" id="email" value="<?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?>">
	</div> 
	</div>
	<?php } ?>


	<div class="control-group"> 
	   <label class="control-label" for="icq"><?php echo ((isset($this->_rootref['L_ICQ'])) ? $this->_rootref['L_ICQ'] : ((isset($user->lang['ICQ'])) ? $user->lang['ICQ'] : '{ ICQ }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="icq" id="icq" value="<?php echo (isset($this->_rootref['ICQ'])) ? $this->_rootref['ICQ'] : ''; ?>">
	</div> 
	</div>


	<div class="control-group"> 
	   <label class="control-label" for="aim"><?php echo ((isset($this->_rootref['L_AIM'])) ? $this->_rootref['L_AIM'] : ((isset($user->lang['AIM'])) ? $user->lang['AIM'] : '{ AIM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="aim" id="aim" value="<?php echo (isset($this->_rootref['AIM'])) ? $this->_rootref['AIM'] : ''; ?>">
	</div> 
	</div>
	
	<div class="control-group"> 
	   <label class="control-label" for="yahoo"><?php echo ((isset($this->_rootref['L_YIM'])) ? $this->_rootref['L_YIM'] : ((isset($user->lang['YIM'])) ? $user->lang['YIM'] : '{ YIM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="yahoo" id="yahoo" value="<?php echo (isset($this->_rootref['YAHOO'])) ? $this->_rootref['YAHOO'] : ''; ?>">
	</div> 
	</div>
	
	<div class="control-group"> 
	   <label class="control-label" for="jabber"><?php echo ((isset($this->_rootref['L_JABBER'])) ? $this->_rootref['L_JABBER'] : ((isset($user->lang['JABBER'])) ? $user->lang['JABBER'] : '{ JABBER }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="jabber" id="jabber" value="<?php echo (isset($this->_rootref['JABBER'])) ? $this->_rootref['JABBER'] : ''; ?>">
	</div> 
	</div>
	
	<div class="control-group"> 
	   <label class="control-label" for="msn"><?php echo ((isset($this->_rootref['L_MSNM'])) ? $this->_rootref['L_MSNM'] : ((isset($user->lang['MSNM'])) ? $user->lang['MSNM'] : '{ MSNM }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="" name="msn" id="msn" value="<?php echo (isset($this->_rootref['MSNM'])) ? $this->_rootref['MSNM'] : ''; ?>">
	</div> 
	</div>
	
	</fieldset>
    </div>
	
	<div class="col-md-6">
	<fieldset>
	
	<div class="control-group"> 
	   <label class="control-label" for="joined"><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
		<select class="selectpicker" data-style="btn btn-default form-control" data-width="auto" name="joined_select"><?php echo (isset($this->_rootref['S_JOINED_TIME_OPTIONS'])) ? $this->_rootref['S_JOINED_TIME_OPTIONS'] : ''; ?></select>
		<input type="text" class="form-control" placeholder="YYYY-MM-DD, e.g. 2004-02-29" name="joined" id="joined" value="<?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?>">
	</div>
	</div>
	
	
	<?php if ($this->_rootref['S_VIEWONLINE']) {  ?>

	<div class="control-group"> 
	   <label class="control-label" for="active"><?php echo ((isset($this->_rootref['L_LAST_ACTIVE'])) ? $this->_rootref['L_LAST_ACTIVE'] : ((isset($user->lang['LAST_ACTIVE'])) ? $user->lang['LAST_ACTIVE'] : '{ LAST_ACTIVE }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
		<select class="selectpicker" data-style="btn btn-default form-control" data-width="auto" name="active_select"><?php echo (isset($this->_rootref['S_ACTIVE_TIME_OPTIONS'])) ? $this->_rootref['S_ACTIVE_TIME_OPTIONS'] : ''; ?></select>
		<input type="text" class="form-control input-sm" placeholder="YYYY-MM-DD, e.g. 2004-02-29" name="active" id="active" value="<?php echo (isset($this->_rootref['ACTIVE'])) ? $this->_rootref['ACTIVE'] : ''; ?>">
	</div>
	</div>
	<?php } ?>


	<div class="control-group"> 
	   <label class="control-label" for="count"><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
		<select class="selectpicker" data-style="btn btn-default form-control" data-width="auto" name="count_select"><?php echo (isset($this->_rootref['S_COUNT_OPTIONS'])) ? $this->_rootref['S_COUNT_OPTIONS'] : ''; ?></select>
		<input type="text" class="form-control input-sm" placeholder="e.g. 12" name="count" id="count" value="<?php echo (isset($this->_rootref['COUNT'])) ? $this->_rootref['COUNT'] : ''; ?>">
	</div>
	</div>

	<?php if ($this->_rootref['S_IP_SEARCH_ALLOWED']) {  ?>

    <div class="control-group"> 
	   <label class="control-label" for="ip"><?php echo ((isset($this->_rootref['L_POST_IP'])) ? $this->_rootref['L_POST_IP'] : ((isset($user->lang['POST_IP'])) ? $user->lang['POST_IP'] : '{ POST_IP }')); ?>:</label>
	<div class="controls controls-row"> 
       <input type="text" class="form-control input-sm" placeholder="216.161.111.33" name="ip" id="ip" value="<?php echo (isset($this->_rootref['IP'])) ? $this->_rootref['IP'] : ''; ?>">
	</div> 
	</div>
    <?php } ?>

	
    <div class="control-group"> 
	   <label class="control-label" for="search_group_id"><?php echo ((isset($this->_rootref['L_GROUP'])) ? $this->_rootref['L_GROUP'] : ((isset($user->lang['GROUP'])) ? $user->lang['GROUP'] : '{ GROUP }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
      <select class="selectpicker" name="search_group_id" id="search_group_id"><?php echo (isset($this->_rootref['S_GROUP_SELECT'])) ? $this->_rootref['S_GROUP_SELECT'] : ''; ?></select>
	</div> 
	</div>

	<div class="control-group"> 
	   <label class="control-label" for="sk"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
      <select class="selectpicker" data-width="auto" name="sk" id="sk"><?php echo (isset($this->_rootref['S_SORT_OPTIONS'])) ? $this->_rootref['S_SORT_OPTIONS'] : ''; ?></select>
	</div> 
	</div>
	
	<div class="control-group"> 
	   <label class="control-label" for="sk"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?>:</label>
	<div class="input-group col-md-12 col-sm-12 col-xs-12">
      <select class="selectpicker" data-width="auto" name="sd"><?php echo (isset($this->_rootref['S_ORDER_SELECT'])) ? $this->_rootref['S_ORDER_SELECT'] : ''; ?></select>
	</div> 
	</div>
	
	</fieldset>
	</div>
</div>
	


</div>
	<fieldset class="form-actions">
		<button type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="btn btn-default"><?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?></button>
		<button type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>" class="btn btn-default" autocomplete="off" data-loading-text="<?php echo ((isset($this->_rootref['L_SEARCHING'])) ? $this->_rootref['L_SEARCHING'] : ((isset($user->lang['SEARCHING'])) ? $user->lang['SEARCHING'] : '{ SEARCHING }')); ?> <i class='fa-spin fa fa-spinner fa-lg icon-white'></i>"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></button>
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
</div>
</form>
<div class="space10"></div>