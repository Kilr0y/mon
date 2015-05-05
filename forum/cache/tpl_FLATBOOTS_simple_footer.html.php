<?php if (!defined('IN_PHPBB')) exit; ?></main>
	</div><!-- page-body id in header -->
  </div> <!-- padding_0_40 in header -->
 </div> <!-- content-forum in header -->
</div> <!-- wrap - corners container in header -->

<div class="container">
  <div class="copyright">
	<small class="pull-left">
		<?php if ($this->_rootref['TRANSLATION_INFO']) {  echo (isset($this->_rootref['TRANSLATION_INFO'])) ? $this->_rootref['TRANSLATION_INFO'] : ''; } if ($this->_rootref['DEBUG_OUTPUT']) {  echo (isset($this->_rootref['DEBUG_OUTPUT'])) ? $this->_rootref['DEBUG_OUTPUT'] : ''; } ?>

		| <?php echo ((isset($this->_rootref['L_BBOOTS_VERSION'])) ? $this->_rootref['L_BBOOTS_VERSION'] : ((isset($user->lang['BBOOTS_VERSION'])) ? $user->lang['BBOOTS_VERSION'] : '{ BBOOTS_VERSION }')); ?>

	</small>
	<small class="pull-right">
		<?php echo (isset($this->_rootref['S_TIMEZONE'])) ? $this->_rootref['S_TIMEZONE'] : ''; ?>

	</small>
  </div>
</div>

<!-- injected via a module or an include -->
<script>
    // some function that depends on bootstrap and jquery
	head.ready(function () {
	   $.fn.tooltip&&$('[rel="tooltip"]').tooltip();$.fn.popover&&$('[rel="popover"]').popover();$(".selectpicker").selectpicker();$(".selectpicker").tooltip("disable");$(".btn-group [title]").tooltip({container:"body"});$("button[data-loading-text]").click(function(){var e=$(this);e.button("loading");setTimeout(function(){e.button("reset")},3e3)});jQuery(function(e){e("a").tooltip({html:true,container:"body"})});$(".btn-group [title]").tooltip({container:"body"})
    });
</script>

</body>
</html>