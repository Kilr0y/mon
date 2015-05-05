<?php if (!defined('IN_PHPBB')) exit; ?><div class="masthead flat-header">
    <div class="wrapper-head">
	 <div class="container">
       <h1><?php echo ((isset($this->_rootref['L_FLATBOOTS_INTRO'])) ? $this->_rootref['L_FLATBOOTS_INTRO'] : ((isset($user->lang['FLATBOOTS_INTRO'])) ? $user->lang['FLATBOOTS_INTRO'] : '{ FLATBOOTS_INTRO }')); ?>&nbsp;<a class="label label-call" href="http://getbootstrap.com/"><?php echo ((isset($this->_rootref['L_BOOTSTRAP_VERSION'])) ? $this->_rootref['L_BOOTSTRAP_VERSION'] : ((isset($user->lang['BOOTSTRAP_VERSION'])) ? $user->lang['BOOTSTRAP_VERSION'] : '{ BOOTSTRAP_VERSION }')); ?></a></h1>
       <p><?php echo ((isset($this->_rootref['L_FLATBOOTS_EXPLAIN'])) ? $this->_rootref['L_FLATBOOTS_EXPLAIN'] : ((isset($user->lang['FLATBOOTS_EXPLAIN'])) ? $user->lang['FLATBOOTS_EXPLAIN'] : '{ FLATBOOTS_EXPLAIN }')); ?></p>
     </div>
	</div>
</div>