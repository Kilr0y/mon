<?php if (!defined('IN_PHPBB')) exit; ?></div>
 </div>
<!-- col-md-12 ucp_header
</div>
-->
	<div class="clear"></div>

	</div>
	</div>
</div>
</div>
<?php if ($this->_rootref['S_COMPOSE_PM']) {  ?>

<div><?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?></div>
</form>
</div>
<?php } $this->_tpl_include('jumpbox.html'); $this->_tpl_include('overall_footer.html'); ?>