<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_SIMPLE_MESSAGE']) {  $this->_tpl_include('simple_header.html'); } else { $this->_tpl_include('overall_header.html'); } ?>


<div class="side-segment"><h3><?php echo (isset($this->_rootref['MESSAGE_TITLE'])) ? $this->_rootref['MESSAGE_TITLE'] : ''; ?></h3></div>
<div class="well" id="message">
	<p><?php echo (isset($this->_rootref['MESSAGE_TEXT'])) ? $this->_rootref['MESSAGE_TEXT'] : ''; ?></p>
	<?php if ($this->_rootref['SCRIPT_NAME'] == ("search") && ! $this->_rootref['S_BOARD_DISABLED'] && ! $this->_rootref['S_NO_SEARCH'] && $this->_rootref['L_RETURN_TO_SEARCH_ADV']) {  ?>

	 <p><a class="btn-link" href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RETURN_TO_SEARCH_ADV'])) ? $this->_rootref['L_RETURN_TO_SEARCH_ADV'] : ((isset($user->lang['RETURN_TO_SEARCH_ADV'])) ? $user->lang['RETURN_TO_SEARCH_ADV'] : '{ RETURN_TO_SEARCH_ADV }')); ?></a></p>
	 <?php } ?>

</div>

<?php if ($this->_rootref['S_SIMPLE_MESSAGE']) {  $this->_tpl_include('simple_footer.html'); } else { $this->_tpl_include('overall_footer.html'); } ?>